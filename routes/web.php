<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Models\Invitation;
use App\Models\Theme;
use App\Models\User;
use App\Models\Comment;

Route::get('/', function () {
    $themes = Theme::where('is_active', 1)->get(); 
    return view('welcome', compact('themes'));
})->name('home');

Route::middleware('guest:web')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('super-admin')->name('super.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/fetch-transactions', [SuperAdminController::class, 'fetchTransactions'])
             ->name('fetch.transactions');
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [SuperAdminController::class, 'users'])->name('users.index');
        Route::patch('/users/{id}/validate', [SuperAdminController::class, 'validateUser'])->name('users.validate');
        Route::delete('/users/{id}/destroy', [SuperAdminController::class, 'destroyUser'])->name('users.destroy');
        Route::put('/users/{id}/reset-password', [SuperAdminController::class, 'resetUserPassword'])->name('users.reset_password');
        
        // Settings Routes
        Route::get('/settings', [SuperAdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [SuperAdminController::class, 'updateSettings'])->name('settings.update');

        Route::get('/themes', [SuperAdminController::class, 'themes'])->name('themes.index');
        Route::post('/themes/store', [SuperAdminController::class, 'storeTheme'])->name('themes.store');
        Route::put('/themes/{theme}', [SuperAdminController::class, 'updateTheme'])->name('themes.update');
        Route::delete('/themes/{theme}', [SuperAdminController::class, 'destroyTheme'])->name('themes.destroy');
        Route::get('/themes/{slug}/preview', [SuperAdminController::class, 'previewTheme'])->name('themes.preview');
        Route::post('/logout', [LoginController::class, 'logoutAdmin'])->name('logout');
    });
});

Route::middleware(['auth:web'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('index'); 
    Route::get('/create', [UserDashboardController::class, 'create'])->name('create');
    Route::post('/store', [UserDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserDashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserDashboardController::class, 'update'])->name('update');
    
    Route::get('/themes', [UserDashboardController::class, 'index'])->name('themes.index'); 
    Route::post('/themes/select', [UserDashboardController::class, 'selectTheme'])->name('themes.select');
    
    Route::post('/events/store/{id}', [EventController::class, 'store'])->name('events.store');
    Route::delete('/gallery/{id}', [UserDashboardController::class, 'destroyPhoto'])->name('gallery.destroy');
    Route::delete('/invitation/{id}', [UserDashboardController::class, 'destroy'])->name('destroy');
    Route::delete('/comments/{id}', [UserDashboardController::class, 'destroyComment'])->name('comments.destroy');
    Route::post('/comments/{id}/reply', [UserDashboardController::class, 'replyComment'])->name('comments.reply');
});

Route::get('/preview/{slug}', function ($slug) {
    $theme = Theme::where('slug', $slug)->firstOrFail();
    $invitation = new \stdClass();
    $invitation->title = "The Wedding of Naruto & Hinata";
    $invitation->slug = "preview-tema";
    $invitation->groom_name = "Uzumaki Naruto";
    $invitation->groom_info = "Putra dari Bpk. Namikaze Minato & Ibu Uzumaki Kushina";
    $invitation->bride_name = "Hyuga Hinata";
    $invitation->bride_info = "Putri Pertama sekaligus penerus Kepala Keluarga Clan Hyuga";
    $invitation->wedding_date = "2026-12-12";
    $invitation->music_file = 'dummy/mp3/B.mp3';
    $invitation->groom_photo = 'dummy/foto/D.jpg';
    $invitation->bride_photo = 'dummy/foto/C.jpg';
    $invitation->cover_photo = 'dummy/foto/AC.jpg';
    $invitation->hero_photo = 'dummy/foto/story3.jpg';
    $invitation->show_story = true;
    $invitation->attachments = collect([
        (object)[
            'file_type' => 'cover',
            'file_path' => 'dummy/foto/AC.jpg'
        ],
        (object)[
            'file_type' => 'hero',
            'file_path' => 'dummy/foto/story3.jpg'
        ]
    ]);
    $invitation->loveStories = collect([
    (object)[
        'title' => 'Di PDS 4',
        'date' => '2013',
        'description' => 'Di PDS 4 Kamu menamparku karena kematian Neji.',
        'image' => 'dummy/foto/story1.jpg', // Pastikan file ini ada atau sesuaikan path-nya
        'sort_order' => 1
    ],
    (object)[
        'title' => 'Janji Di Bulan',
        'date' => '2018',
        'description' => 'Di Bulan Kita Mengikat janji setelah aku mengalahkan Toneri.',
        'image' => 'dummy/foto/story2.jpg',
        'sort_order' => 2
    ],
    (object)[
        'title' => 'Langkah Menuju Selamanya',
        'date' => 'Desember 2026',
        'description' => 'Kini, tidak ada lagi keraguan. Di bawah restu langit dan bumi, kita menyatukan dua takdir menjadi satu janji suci yang abadi.',
        'image' => 'dummy/foto/story3.jpg',
        'sort_order' => 3
    ],
]);
    $invitation->url = url('/preview/' . $slug);
    $event1 = (object)['event_name' => "Akad Nikah", 'date' => "2026-12-12", 'start_time' => "08:00", 'end_time' => "10:00", 'location_name' => "Masjid Agung", 'address' => "Jl. Kenangan No. 123, Kota Cinta", 'google_maps_url' => "#", 'url' => "#"];
    $event2 = (object)['event_name' => "Resepsi", 'date' => "2026-12-12", 'start_time' => "11:00", 'end_time' => "20:00", 'location_name' => "Gedung Serbaguna", 'address' => "Jl. Bahagia No. 456, Kota Cinta", 'google_maps_url' => "#", 'url' => "#"];
    $invitation->events = collect([$event1, $event2]);
    $invitation->galleries = collect([
        (object)['url' => 'dummy/foto/story1.jpg'],
        (object)['url' => 'dummy/foto/story2.jpg'],
        (object)['url' => 'dummy/foto/story3.jpg'],
        (object)['url' => 'dummy/foto/B.jpg'],
        (object)['url' => 'dummy/foto/story4.png'],
        (object)['url' => 'dummy/foto/AC.jpg'],
        ]);
    $invitation->comments = collect([
    (object)[
        'id' => 1,
        'invitation_id' => 1,
        'name' => 'Kakashi Hatake',
        'message' => 'Selamat untuk muridku yang paling berisik! Semoga menjadi keluarga yang sakinah.',
        'reply' => 'Terima kasih Guru Kakashi, datang ya!',
        'presence' => 'Hadir',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    (object)[
        'id' => 2,
        'invitation_id' => 1,
        'name' => 'Capt. Jack Sparrow',
        'message' => 'Lautan memanggil, tapi pernikahan kalian jauh lebih indah! Selamat menempuh hidup baru.',
        'reply' => 'Terima kasih banyak Kapten! Jangan lupa bawa Black Pearl-nya ya.',
        'presence' => 'Hadir',
        'created_at' => now()->subMinutes(5),
        'updated_at' => now()->subMinutes(5),
    ],
    (object)[
        'id' => 3,
        'invitation_id' => 1,
        'name' => 'Sasuke Uchiha',
        'message' => 'Hn. Selamat.',
        'reply' => 'Pulanglah kamu wahai Bang Toyib!',
        'presence' => 'Hadir',
        'created_at' => now()->subMinutes(10),
        'updated_at' => now()->subMinutes(10),
    ],
    (object)[
        'id' => 4,
        'invitation_id' => 1,
        'name' => 'Davy Jones',
        'message' => 'Maaf saya sedang sibuk menjaga Flying Dutchman, tapi doa saya menyertai kalian berdua.',
        'reply' => null,
        'presence' => 'Tidak Hadir',
        'created_at' => now()->subHours(1),
        'updated_at' => now()->subHours(1),
    ],
]); 
    $invitation->bank_name_1 = "BCA"; $invitation->bank_account_1 = "123456789"; $invitation->bank_owner_1 = "Uzumaki Naruto";
    $invitation->show_couple = 1; $invitation->show_event = 1; $invitation->show_gallery = 1; $invitation->show_gift = 1; $invitation->show_rsvp = 1;
    $data = ['groom' => 'Uzumaki Naruto', 'bride' => 'Hyuga Hinata', 'date' => '2026-12-12'];
    $extraFields = ['bank_name_2', 'bank_account_2', 'bank_owner_2', 'maps_url', 'video_url', 'quote', 'quote_src', 'cover_photo', 'instagram_groom', 'instagram_bride'];
    foreach ($extraFields as $field) { if (!isset($invitation->$field)) $invitation->$field = null; }
    return view($theme->view_path, compact('theme', 'invitation', 'data'));
})->name('theme.preview');

Route::get('/v/{slug}', function($slug) {
    $invitation = Invitation::with(['theme', 'galleries', 'comments', 'events'])->where('slug', $slug)->firstOrFail();
    $viewPath = Str::finish($invitation->theme->view_path, '.index');
    if (!view()->exists($viewPath)) $viewPath = $invitation->theme->view_path;
    $data = ['groom' => $invitation->groom_name, 'bride' => $invitation->bride_name, 'date' => $invitation->wedding_date, 'location' => $invitation->location, 'slug' => $invitation->slug];
    return view($viewPath, compact('invitation', 'data'));
})->name('invitation.show');

Route::post('/v/{slug}/comment', function(Request $request, $slug) {
    $invitation = Invitation::where('slug', $slug)->firstOrFail();
    $request->validate(['name' => 'required', 'message' => 'required', 'presence' => 'required']);
    $comment = Comment::create([
        'invitation_id' => $invitation->id, 'name' => $request->name,
        'message' => $request->message, 'presence' => $request->presence,
    ]);
    return $request->expectsJson() 
        ? response()->json(['status' => 'success', 'data' => $comment]) 
        : back()->with('success', 'Ucapan terkirim!');
})->name('comments.store');

Route::view('/kebijakan-privasi', 'pages.policy')->name('policy');
Route::view('/faq', 'pages.faq')->name('faq');
Route::get('/register/pending/{user}', fn(User $user) => view('auth.pending', compact('user')))->name('register.pending');
//Route::delete('/dashboard/gallery/destroy/{id}', [UserDashboardController::class, 'destroyPhoto'])->name('user.gallery.destroy');