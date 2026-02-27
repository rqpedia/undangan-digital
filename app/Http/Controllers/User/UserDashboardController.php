<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Invitation;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\LoveStory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\InvitationAttachment;

class UserDashboardController extends Controller
{
    private function rejectAdmin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->to('/super-admin/dashboard');
        }
        return null;
    }

    private function getUserPackageLimit()
    {
        return Auth::user()->package_price ?? 1000000;
    }

    public function index()
    {
        if ($response = $this->rejectAdmin()) return $response;

        $user = Auth::user();
        $userInvitation = Invitation::with(['theme', 'events', 'galleries', 'comments', 'attachments', 'loveStories'])
            ->where('user_id', $user->id)
            ->first();

        $themes = Theme::where('price', '<=', $this->getUserPackageLimit())
            ->orderBy('price', 'asc')
            ->get();

        return view('user.dashboard', compact('userInvitation', 'themes'));
    }

    public function destroyComment($id)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $invitation = Invitation::where('user_id', Auth::id())->firstOrFail();
        $comment = $invitation->comments()->findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Ucapan tamu berhasil dihapus!');
    }

    public function preview($slug)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $theme = Theme::where('slug', $slug)->firstOrFail();
        
        if ($theme->price > $this->getUserPackageLimit()) {
            return redirect()->route('user.index')->with('error', 'Paket Anda tidak mencukupi untuk tema ini.');
        }

        $invitation = Invitation::with(['events', 'galleries', 'attachments', 'loveStories'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$invitation) {
            return redirect()->route('user.index')->with('error', 'Silakan isi data undangan Anda terlebih dahulu.');
        }

        $viewPath = $theme->view_path;
        if (!view()->exists($viewPath)) {
            return "File view [resources/views/" . str_replace('.', '/', $viewPath) . ".blade.php] TIDAK DITEMUKAN.";
        }

        return view($viewPath, compact('theme', 'invitation'))->with('isPreview', true);
    }

    public function selectTheme(Request $request)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $request->validate(['theme_id' => 'required|exists:themes,id']);
        $theme = Theme::findOrFail($request->theme_id);

        if ($theme->price > $this->getUserPackageLimit()) {
            return back()->with('error', 'Akses ditolak. Tema ini di luar paket Anda.');
        }

        $invitation = Invitation::where('user_id', Auth::id())->first();

        if ($invitation) {
            $invitation->update(['theme_id' => $theme->id]);
            return redirect()->route('user.index')->with('success', 'Tema undangan berhasil diperbarui!');
        }

        return redirect()->route('user.create', ['theme_id' => $theme->id]);
    }

    public function create()
    {
        if ($response = $this->rejectAdmin()) return $response;

        if (Invitation::where('user_id', Auth::id())->exists()) {
            return redirect()->route('user.index')->with('error', 'Anda sudah memiliki data undangan.');
        }

        $themes = Theme::where('price', '<=', $this->getUserPackageLimit())->get();
        return view('user.create_invitation', compact('themes'));
    }

    public function store(Request $request)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $request->validate([
            'theme_id'      => 'required|exists:themes,id',
            'groom_name'    => 'required|string|max:255',
            'bride_name'    => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:invitations,slug',
            'wedding_date'  => 'required|date',
            'location'      => 'required|string',
            'events'        => 'required|array|min:1',
            'photos.*'      => 'image|mimes:jpeg,png,jpg|max:5120',
            'cover_photo'   => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'hero_photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'show_story'    => 'nullable|boolean',
            'stories'       => 'nullable|array',
            'stories.*.date' => 'required_if:show_story,1|nullable|string|max:255',
            'stories.*.title' => 'required_if:show_story,1|nullable|string|max:255',
            'stories.*.description' => 'required_if:show_story,1|nullable|string',
        ]);

        return DB::transaction(function () use ($request) {
            $invitation = Invitation::create([
                'user_id'         => Auth::id(),
                'theme_id'        => $request->theme_id,
                'slug'            => Str::slug($request->slug),
                'groom_name'      => $request->groom_name,
                'groom_info'      => $request->groom_info,
                'bride_name'      => $request->bride_name,
                'bride_info'      => $request->bride_info,
                'wedding_date'    => $request->wedding_date,
                'location'        => $request->location,
                'show_couple'     => $request->boolean('show_couple'),
                'show_event'      => $request->boolean('show_event'),
                'show_gallery'    => $request->boolean('show_gallery'),
                'show_gift'       => $request->boolean('show_gift'),
                'show_rsvp'       => $request->boolean('show_rsvp'),
                'show_story'      => $request->boolean('show_story'),
                'bank_name_1'     => $request->bank_name_1,
                'bank_account_1'  => $request->bank_account_1,
                'bank_owner_1'    => $request->bank_owner_1,
                'groom_photo'     => $request->hasFile('groom_photo') ? $request->file('groom_photo')->store('mempelai', 'public') : null,
                'bride_photo'     => $request->hasFile('bride_photo') ? $request->file('bride_photo')->store('mempelai', 'public') : null,
                'music_file'      => $request->hasFile('music_file') ? $request->file('music_file')->store('music', 'public') : null,
            ]);

            if ($request->hasFile('cover_photo')) {
                $invitation->attachments()->create([
                    'file_path' => $request->file('cover_photo')->store('covers', 'public'),
                    'file_type' => 'cover'
                ]);
            }

            if ($request->hasFile('hero_photo')) {
                $invitation->attachments()->create([
                    'file_path' => $request->file('hero_photo')->store('heroes', 'public'),
                    'file_type' => 'hero'
                ]);
            }

            foreach ($request->events as $eventData) {
                $invitation->events()->create([
                    'event_name'      => $eventData['event_name'] ?? 'Acara',
                    'date'            => $eventData['date'] ?? $request->wedding_date,
                    'start_time'      => $eventData['start_time'] ?? '08:00',
                    'end_time'        => $eventData['end_time'] ?? null,
                    'location_name'   => $eventData['location_name'] ?? 'Lokasi Acara',
                    'address'         => $eventData['address'] ?? '-',
                    'google_maps_url' => $eventData['google_maps_url'] ?? null,
                ]);
            }

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $invitation->galleries()->create(['url' => $photo->store('galleries', 'public')]);
                }
            }

            if ($request->boolean('show_story') && $request->has('stories')) {
                foreach ($request->stories as $index => $storyData) {
                    if (!empty($storyData['title'])) {
                        $imagePath = null;
                        if ($request->hasFile("stories.{$index}.image")) {
                            $imagePath = $request->file("stories.{$index}.image")->store('stories', 'public');
                        }
                        $invitation->loveStories()->create([
                            'date'        => $storyData['date'],
                            'title'       => $storyData['title'],
                            'description' => $storyData['description'],
                            'image'       => $imagePath,
                            'sort_order'  => $index,
                        ]);
                    }
                }
            }

            return redirect()->route('user.index')->with('success', 'Undangan berhasil dipublikasikan!');
        });
    }

    public function edit($id)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $invitation = Invitation::with(['galleries', 'events', 'attachments', 'loveStories'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $themes = Theme::where('price', '<=', $this->getUserPackageLimit())->get();

        return view('user.edit_invitation', compact('themes', 'invitation'));
    }

    public function update(Request $request, $id)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $invitation = Invitation::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'theme_id'     => 'required|exists:themes,id',
            'groom_name'   => 'required|string|max:255',
            'bride_name'   => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:invitations,slug,' . $invitation->id,
            'wedding_date' => 'required|date',
            'location'     => 'required|string',
            'events'       => 'required|array|min:1',
            'photos.*'     => 'image|mimes:jpeg,png,jpg|max:5120',
            'cover_photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'hero_photo'   => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'show_story'   => 'nullable|boolean',
            'stories'      => 'nullable|array',
            'stories.*.date' => 'required_if:show_story,1|nullable|string|max:255',
            'stories.*.title' => 'required_if:show_story,1|nullable|string|max:255',
        ]);

        return DB::transaction(function () use ($request, $invitation) {
            $data = [
                'theme_id'        => $request->theme_id,
                'groom_name'      => $request->groom_name,
                'groom_info'      => $request->groom_info,
                'bride_name'      => $request->bride_name,
                'bride_info'      => $request->bride_info,
                'slug'            => Str::slug($request->slug),
                'wedding_date'    => $request->wedding_date,
                'location'        => $request->location,
                'show_couple'     => $request->boolean('show_couple'),
                'show_event'      => $request->boolean('show_event'),
                'show_gallery'    => $request->boolean('show_gallery'),
                'show_gift'       => $request->boolean('show_gift'),
                'show_rsvp'       => $request->boolean('show_rsvp'),
                'show_story'      => $request->boolean('show_story'),
                'bank_name_1'     => $request->bank_name_1,
                'bank_account_1'  => $request->bank_account_1,
                'bank_owner_1'    => $request->bank_owner_1,
            ];

            if ($request->hasFile('groom_photo')) {
                if ($invitation->groom_photo) Storage::disk('public')->delete($invitation->groom_photo);
                $data['groom_photo'] = $request->file('groom_photo')->store('mempelai', 'public');
            }
            if ($request->hasFile('bride_photo')) {
                if ($invitation->bride_photo) Storage::disk('public')->delete($invitation->bride_photo);
                $data['bride_photo'] = $request->file('bride_photo')->store('mempelai', 'public');
            }
            if ($request->hasFile('music_file')) {
                if ($invitation->music_file) Storage::disk('public')->delete($invitation->music_file);
                $data['music_file'] = $request->file('music_file')->store('music', 'public');
            }

            $invitation->update($data);

            $this->updateAttachment($invitation, $request, 'cover_photo', 'cover', 'covers');
            $this->updateAttachment($invitation, $request, 'hero_photo', 'hero', 'heroes');

            // Update Events
            $invitation->events()->delete();
            foreach ($request->events as $eventData) {
                $invitation->events()->create([
                    'event_name'      => $eventData['event_name'] ?? 'Acara',
                    'date'            => $eventData['date'] ?? $request->wedding_date,
                    'start_time'      => $eventData['start_time'] ?? '08:00',
                    'end_time'        => $eventData['end_time'] ?? null,
                    'location_name'   => $eventData['location_name'] ?? 'Lokasi Acara',
                    'address'         => $eventData['address'] ?? '-',
                    'google_maps_url' => $eventData['google_maps_url'] ?? null,
                ]);
            }

            // Update Gallery
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $invitation->galleries()->create(['url' => $photo->store('galleries', 'public')]);
                }
            }

            // Update Love Stories (Bersih & Aman dari variabel undefined)
            if ($request->boolean('show_story') && $request->has('stories')) {
                // Simpan image path lama sebelum didelete datanya
                $oldStories = $invitation->loveStories->pluck('image', 'id')->toArray();
                
                $invitation->loveStories()->delete();

                foreach ($request->stories as $index => $storyData) {
                    if (!empty($storyData['title'])) {
                        // Cek apakah ada upload baru
                        if ($request->hasFile("stories.{$index}.image")) {
                            $imagePath = $request->file("stories.{$index}.image")->store('stories', 'public');
                        } else {
                            // Gunakan image lama jika ada (dikirim lewat hidden input)
                            $imagePath = $storyData['existing_image'] ?? null;
                        }

                        $invitation->loveStories()->create([
                            'date'        => $storyData['date'],
                            'title'       => $storyData['title'],
                            'description' => $storyData['description'],
                            'image'       => $imagePath,
                            'sort_order'  => $index,
                        ]);
                    }
                }
            }

            return redirect()->route('user.index')->with('success', 'Undangan diperbarui!');
        });
    }

    private function updateAttachment($invitation, $request, $inputName, $type, $folder)
    {
        if ($request->hasFile($inputName)) {
            $oldAttachment = $invitation->attachments()->where('file_type', $type)->first();
            if ($oldAttachment) {
                Storage::disk('public')->delete($oldAttachment->file_path);
                $oldAttachment->delete();
            }
            $invitation->attachments()->create([
                'file_path' => $request->file($inputName)->store($folder, 'public'),
                'file_type' => $type
            ]);
        }
    }

    public function destroy($id)
    {
        if ($response = $this->rejectAdmin()) return $response;

        $invitation = Invitation::with(['galleries', 'attachments', 'loveStories'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $files = $invitation->galleries->pluck('url')->toArray();
        $attachmentFiles = $invitation->attachments->pluck('file_path')->toArray();
        $storyFiles = $invitation->loveStories->pluck('image')->filter()->toArray();
        
        $allFiles = array_merge($files, $attachmentFiles, $storyFiles);
        if ($invitation->music_file) $allFiles[] = $invitation->music_file;
        if ($invitation->groom_photo) $allFiles[] = $invitation->groom_photo;
        if ($invitation->bride_photo) $allFiles[] = $invitation->bride_photo;

        Storage::disk('public')->delete($allFiles);
        $invitation->delete();

        return redirect()->route('user.index')->with('success', 'Undangan dihapus!');
    }

    public function destroyPhoto($id)
{
    if ($response = $this->rejectAdmin()) return $response;

    $gallery = Gallery::findOrFail($id);

    // Pastikan user hanya bisa hapus fotonya sendiri
    if ($gallery->invitation->user_id !== Auth::id()) {
        return response()->json(['message' => 'Akses ditolak.'], 403);
    }

    // Hapus file
    if ($gallery->url) {
        Storage::disk('public')->delete($gallery->url);
    }
    
    $gallery->delete();

    // Jika request datang dari AJAX (Fetch), kirim JSON
    if (request()->ajax() || request()->wantsJson()) {
        return response()->json(['success' => true, 'message' => 'Foto dihapus!']);
    }

    // Fallback untuk request biasa
    return back()->with('success', 'Foto dihapus!');
}

    public function replyComment(Request $request, $id)
    {
        $request->validate(['reply' => 'required|string|max:1000']);
        $invitation = Invitation::where('user_id', Auth::id())->firstOrFail();
        $comment = $invitation->comments()->findOrFail($id);
        $comment->update(['reply' => $request->reply]);
        return back()->with('success', 'Balasan dikirim!');
    }
}