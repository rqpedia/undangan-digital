@extends('layouts.app')
@section('content')
    <div class="max-w-6xl mx-auto px-4 pb-20">
        {{-- 1. Header Section --}}
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-black uppercase tracking-tighter text-zinc-900">
                Edit <span class="text-amber-500">Undangan Anda</span>
            </h2>
            <p class="text-zinc-500 text-sm mt-2 font-medium">Perbarui informasi hari bahagia Anda di sini</p>
        </div>

        {{-- 2. Error Alert Container (Otomatis muncul jika ada error) --}}
        @if ($errors->any())
            <div class="max-w-3xl mx-auto mb-8 p-6 bg-red-50 border-l-4 border-red-500 rounded-2xl shadow-sm">
                <div class="flex items-center gap-3 mb-2 text-red-700">
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    <span class="font-black uppercase tracking-widest text-[11px]">Terjadi Kesalahan:</span>
                </div>
                <ul class="space-y-1 ml-8">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600 text-[10px] font-bold uppercase tracking-tight list-disc">
                            {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.update', $invitation->id) }}" method="POST" enctype="multipart/form-data"
            id="editInvitationForm">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-zinc-900 text-white rounded-full flex items-center justify-center text-[10px] font-black">
                                1
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Ganti Tema
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Klik untuk memilih desain
                                    undangan</p>
                            </div>
                        </div>

                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    {{-- Isi Konten Tema --}}
                    <div class="p-4 pt-0 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4 mt-4">
                            @foreach ($themes as $theme)
                                <label class="relative cursor-pointer group/item">
                                    <input type="radio" name="theme_id" value="{{ $theme->id }}"
                                        class="peer absolute opacity-0"
                                        {{ old('theme_id', $invitation->theme_id) == $theme->id ? 'checked' : '' }}
                                        required>

                                    <div
                                        class="bg-white p-1.5 rounded-[1.2rem] border-2 border-zinc-100 peer-checked:border-amber-500 peer-checked:shadow-md transition-all duration-300">
                                        <div class="aspect-[4/5] bg-zinc-100 rounded-[0.8rem] overflow-hidden">
                                            <img src="{{ asset('storage/' . $theme->thumbnail) }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover/item:scale-110">
                                        </div>
                                        <div class="pt-2 pb-1 text-center">
                                            <h4
                                                class="font-bold text-zinc-900 uppercase text-[9px] tracking-tight truncate px-1">
                                                {{ $theme->name }}
                                            </h4>
                                        </div>
                                    </div>

                                    {{-- Check Indicator --}}
                                    <div
                                        class="absolute -top-1 -right-1 bg-amber-500 text-white p-1 rounded-full opacity-0 scale-50 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-10 shadow-md border-2 border-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                2
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Pengaturan Foto Utama
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Kelola foto cover dan
                                    background utama</p>
                            </div>
                        </div>

                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    {{-- Isi Konten Foto --}}
                    <div class="p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="grid grid-cols-2 gap-4 md:gap-8 mt-6">

                            {{-- Foto 1: Cover --}}
                            <div class="flex flex-col items-center">
                                <label
                                    class="text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-3 text-center leading-tight">1.
                                    Foto Cover<br>(Tampilan Depan)</label>
                                <div
                                    class="relative group aspect-square w-full rounded-[1.5rem] md:rounded-[2rem] overflow-hidden border-2 border-dashed border-zinc-200 hover:border-amber-500 transition-all bg-white shadow-sm">
                                    @php
                                        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
                                    @endphp
                                    <img id="preview_cover"
                                        src="{{ $coverFile ? asset('storage/' . $coverFile->file_path) : 'https://placehold.co/800x800?text=Upload+Cover' }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                    <label
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all flex flex-col items-center justify-center cursor-pointer text-white backdrop-blur-[2px]">
                                        <i data-lucide="image-plus" class="w-6 h-6 mb-1"></i>
                                        <span class="text-[8px] font-black uppercase tracking-widest">Ganti</span>
                                        <input type="file" name="cover_photo" class="hidden" accept="image/*"
                                            onchange="previewUpdate(this, 'preview_cover')">
                                    </label>
                                </div>
                            </div>

                            {{-- Foto 2: Hero --}}
                            <div class="flex flex-col items-center">
                                <label
                                    class="text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-3 text-center leading-tight">2.
                                    Foto Hero<br>(Background Utama)</label>
                                <div
                                    class="relative group aspect-square w-full rounded-[1.5rem] md:rounded-[2rem] overflow-hidden border-2 border-dashed border-zinc-200 hover:border-amber-500 transition-all bg-white shadow-sm">
                                    @php
                                        $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
                                    @endphp
                                    <img id="preview_hero"
                                        src="{{ $heroFile ? asset('storage/' . $heroFile->file_path) : 'https://placehold.co/800x800?text=Upload+Hero' }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                    <label
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all flex flex-col items-center justify-center cursor-pointer text-white backdrop-blur-[2px]">
                                        <i data-lucide="camera" class="w-6 h-6 mb-1"></i>
                                        <span class="text-[8px] font-black uppercase tracking-widest">Ganti</span>
                                        <input type="file" name="hero_photo" class="hidden" accept="image/*"
                                            onchange="previewUpdate(this, 'preview_hero')">
                                    </label>
                                </div>
                            </div>

                        </div>

                        {{-- Footer Info --}}
                        <div class="mt-6 pt-4 border-t border-zinc-100 text-center">
                            <p class="text-[8px] text-zinc-400 font-bold uppercase tracking-[0.1em]">
                                Rasio Rekomendasi <span class="text-zinc-900">1:1 (SQUARE)</span> &bull; Max <span
                                    class="text-amber-600">5MB</span>
                            </p>
                        </div>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                3
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Informasi & Foto Mempelai
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Data pengantin, tanggal, dan
                                    custom link</p>
                            </div>
                        </div>

                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    {{-- Isi Konten --}}
                    <div class="p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30">

                        {{-- Grid Foto Mempelai --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            {{-- Mempelai Pria/Wanita 1 --}}
                            <div
                                class="flex flex-col items-center p-5 bg-white rounded-[1.5rem] border border-zinc-100 group/item shadow-sm">
                                <div
                                    class="w-20 h-20 rounded-full bg-zinc-50 border-4 border-zinc-50 shadow-inner overflow-hidden mb-4 relative">
                                    <img id="preview_groom"
                                        src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=Groom' }}"
                                        class="w-full h-full object-cover">
                                    <label
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover/item:opacity-100 transition-all flex items-center justify-center cursor-pointer">
                                        <i data-lucide="camera" class="w-5 h-5 text-white"></i>
                                        <input type="file" name="groom_photo" class="hidden" accept="image/*"
                                            onchange="previewProfile(this, 'preview_groom')">
                                    </label>
                                </div>
                                <div class="w-full space-y-3">
                                    <input type="text" name="groom_name" placeholder="Nama Mempelai"
                                        value="{{ old('groom_name', $invitation->groom_name) }}" required
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-2.5 text-[11px] font-bold shadow-sm focus:ring-2 focus:ring-amber-500">
                                    <textarea name="groom_info" placeholder="Nama Orang Tua / Info Lain"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-2.5 text-[11px] font-bold shadow-sm focus:ring-2 focus:ring-amber-500"
                                        rows="2">{{ old('groom_info', $invitation->groom_info) }}</textarea>
                                </div>
                            </div>

                            {{-- Mempelai Pria/Wanita 2 --}}
                            <div
                                class="flex flex-col items-center p-5 bg-white rounded-[1.5rem] border border-zinc-100 group/item shadow-sm">
                                <div
                                    class="w-20 h-20 rounded-full bg-zinc-50 border-4 border-zinc-50 shadow-inner overflow-hidden mb-4 relative">
                                    <img id="preview_bride"
                                        src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=Bride' }}"
                                        class="w-full h-full object-cover">
                                    <label
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover/item:opacity-100 transition-all flex items-center justify-center cursor-pointer">
                                        <i data-lucide="camera" class="w-5 h-5 text-white"></i>
                                        <input type="file" name="bride_photo" class="hidden" accept="image/*"
                                            onchange="previewProfile(this, 'preview_bride')">
                                    </label>
                                </div>
                                <div class="w-full space-y-3">
                                    <input type="text" name="bride_name" placeholder="Nama Mempelai"
                                        value="{{ old('bride_name', $invitation->bride_name) }}" required
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-2.5 text-[11px] font-bold shadow-sm focus:ring-2 focus:ring-amber-500">
                                    <textarea name="bride_info" placeholder="Nama Orang Tua / Info Lain"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-2.5 text-[11px] font-bold shadow-sm focus:ring-2 focus:ring-amber-500"
                                        rows="2">{{ old('bride_info', $invitation->bride_info) }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Detail Utama --}}
                        <div class="mt-6 space-y-4">
                            {{-- Slug URL --}}
                            <div class="relative flex items-center">
                                <span
                                    class="absolute left-4 text-zinc-400 text-[10px] font-black uppercase tracking-tight border-r border-zinc-200 pr-3">rqpedia.id/v/</span>
                                <input type="text" name="slug" id="slug_input"
                                    value="{{ old('slug', $invitation->slug) }}" required
                                    class="w-full bg-white border border-zinc-100 rounded-xl pl-32 pr-4 py-3 text-xs font-bold focus:ring-2 focus:ring-amber-500">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                {{-- Tanggal --}}
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Tanggal
                                        Acara</label>
                                    <input type="date" name="wedding_date"
                                        value="{{ old('wedding_date', $invitation->wedding_date) }}" required
                                        class="w-full bg-white border border-zinc-100 rounded-xl px-4 py-3 text-xs font-bold">
                                </div>
                                {{-- Lokasi --}}
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Kota
                                        Lokasi</label>
                                    <input type="text" name="location"
                                        value="{{ old('location', $invitation->location) }}" required
                                        class="w-full bg-white border border-zinc-100 rounded-xl px-4 py-3 text-xs font-bold"
                                        placeholder="Contoh: Jakarta">
                                </div>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                4
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Rangkaian Acara
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Atur jadwal akad, resepsi, dll
                                </p>
                            </div>
                        </div>

                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    {{-- Isi Konten Acara --}}
                    <div class="p-4 md:p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30">

                        {{-- Wrapper untuk Baris Acara --}}
                        <div id="event-wrapper" class="space-y-4 mt-6">
                            @php
                                $events = old('events') ?? $invitation->events;
                            @endphp
                            @foreach ($events as $index => $event)
                                <div
                                    class="event-item bg-white p-5 rounded-[1.5rem] border border-zinc-100 relative group/item shadow-sm">
                                    @if (isset($event->id))
                                        <input type="hidden" name="events[{{ $index }}][id]"
                                            value="{{ $event->id }}">
                                    @endif

                                    {{-- Tombol Hapus: Lebih kecil dan rapi --}}
                                    <button type="button" onclick="removeEvent(this)"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white w-7 h-7 rounded-full shadow-lg z-10 flex items-center justify-center transition-transform hover:scale-110 {{ count($events) <= 1 ? 'hidden' : '' }}">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        {{-- Nama Acara --}}
                                        <div class="md:col-span-2">
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Jenis
                                                Acara</label>
                                            <input type="text" name="events[{{ $index }}][event_name]"
                                                value="{{ old("events.$index.event_name", is_array($event) ? $event['event_name'] ?? '' : $event->event_name) }}"
                                                required
                                                class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold"
                                                placeholder="Contoh: Akad Nikah / Resepsi">
                                        </div>

                                        {{-- Tanggal & Jam --}}
                                        <div>
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Tanggal</label>
                                            <input type="date" name="events[{{ $index }}][date]"
                                                value="{{ old("events.$index.date", is_array($event) ? $event['date'] ?? '' : $event->date) }}"
                                                required
                                                class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold">
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div>
                                                <label
                                                    class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Mulai</label>
                                                <input type="time" name="events[{{ $index }}][start_time]"
                                                    value="{{ old("events.$index.start_time", is_array($event) ? $event['start_time'] ?? '' : ($event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : '')) }}"
                                                    required
                                                    class="w-full bg-zinc-50 border-none rounded-xl px-3 py-3 text-xs font-bold">
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Selesai</label>
                                                <input type="time" name="events[{{ $index }}][end_time]"
                                                    value="{{ old("events.$index.end_time", is_array($event) ? $event['end_time'] ?? '' : ($event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') : '')) }}"
                                                    class="w-full bg-zinc-50 border-none rounded-xl px-3 py-3 text-xs font-bold">
                                            </div>
                                        </div>

                                        {{-- Lokasi & Maps --}}
                                        <div class="md:col-span-2 space-y-3">
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Tempat
                                                & Alamat</label>
                                            <input type="text" name="events[{{ $index }}][location_name]"
                                                value="{{ old("events.$index.location_name", is_array($event) ? $event['location_name'] ?? '' : $event->location_name) }}"
                                                class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold"
                                                placeholder="Nama Gedung / Kediaman">

                                            <textarea name="events[{{ $index }}][address]"
                                                class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold" rows="2"
                                                placeholder="Alamat lengkap...">{{ old("events.$index.address", is_array($event) ? $event['address'] ?? '' : $event->address) }}</textarea>

                                            <div
                                                class="flex items-center bg-amber-50/50 rounded-xl px-4 border border-amber-100">
                                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-amber-600 mr-2"></i>
                                                <input type="url" name="events[{{ $index }}][google_maps_url]"
                                                    value="{{ old("events.$index.google_maps_url", is_array($event) ? $event['google_maps_url'] ?? '' : $event->google_maps_url) }}"
                                                    placeholder="Link Google Maps"
                                                    class="w-full bg-transparent border-none py-3 text-[10px] font-bold italic focus:ring-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Tombol Tambah: Ditempatkan di bagian bawah list --}}
                        <div class="mt-6">
                            <button type="button" onclick="addEventRow()"
                                class="w-full py-4 bg-zinc-900 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-amber-500 transition-all flex items-center justify-center gap-2 shadow-lg active:scale-[0.98]">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                                Tambah Rangkaian Acara
                            </button>
                        </div>

                    </div>
                </details>
            </div>

            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown dengan Toggle --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                4.5
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Cerita Cinta (Love Story)
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Timeline perjalanan cinta Anda
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            {{-- Toggle Switch --}}
                            <label class="inline-flex items-center cursor-pointer" onclick="event.stopPropagation()">
                                <input type="hidden" name="show_story" value="0">
                                <input type="checkbox" name="show_story" value="1" class="sr-only peer"
                                    {{ old('show_story', $invitation->show_story) ? 'checked' : '' }}
                                    onchange="toggleSection('story-section', this.checked)">
                                <div
                                    class="w-9 h-5 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 relative">
                                </div>
                            </label>
                            {{-- Icon Panah --}}
                            <div
                                class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>

                    {{-- Isi Konten Cerita --}}
                    <div id="story-section"
                        class="p-4 md:p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30 {{ old('show_story', $invitation->show_story) ? '' : 'hidden' }}">

                        <div id="story-wrapper" class="space-y-4 mt-6">
                            @php
                                $stories = $invitation->loveStories->count() > 0 ? $invitation->loveStories : [null];
                            @endphp

                            @foreach ($stories as $index => $story)
                                <div
                                    class="story-item bg-white p-5 rounded-[1.5rem] border border-zinc-100 relative group/item shadow-sm">
                                    {{-- Tombol Hapus --}}
                                    <button type="button" onclick="removeStory(this)"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white w-7 h-7 rounded-full shadow-lg z-10 flex items-center justify-center transition-transform hover:scale-110 delete-story-btn {{ count($stories) <= 1 ? 'hidden' : '' }}">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>

                                    <div class="space-y-4">
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label
                                                    class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Waktu</label>
                                                <input type="text" name="stories[{{ $index }}][date]"
                                                    value="{{ $story ? $story->date : '' }}"
                                                    placeholder="Contoh: Awal 2022"
                                                    class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner">
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Judul
                                                    Momen</label>
                                                <input type="text" name="stories[{{ $index }}][title]"
                                                    value="{{ $story ? $story->title : '' }}"
                                                    placeholder="Contoh: Pertama Bertemu"
                                                    class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner">
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-1.5 ml-1">Isi
                                                Cerita</label>
                                            <textarea name="stories[{{ $index }}][description]"
                                                class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner" rows="2"
                                                placeholder="Ceritakan momen singkatnya...">{{ $story ? $story->description : '' }}</textarea>
                                        </div>

                                        {{-- Upload Foto Momen --}}
                                        <div class="pt-2">
                                            <div class="flex items-center gap-3">
                                                @if ($story && $story->image)
                                                    <div
                                                        class="relative group w-12 h-12 rounded-lg overflow-hidden border border-zinc-200 flex-shrink-0 shadow-sm">
                                                        <img src="{{ asset('storage/' . $story->image) }}"
                                                            class="w-full h-full object-cover">
                                                        <input type="hidden"
                                                            name="stories[{{ $index }}][existing_image]"
                                                            value="{{ $story->image }}">
                                                    </div>
                                                @endif
                                                <div class="flex-1">
                                                    <input type="file" name="stories[{{ $index }}][image]"
                                                        accept="image/*"
                                                        class="block w-full text-[10px] text-zinc-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-all">
                                                </div>
                                            </div>
                                            <p class="text-[7px] text-zinc-400 mt-2 italic leading-none">Rekomendasi rasio
                                                horizontal (5:4)</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Tombol Tambah --}}
                        <button type="button" onclick="addStoryRow()"
                            class="w-full mt-6 py-4 border-2 border-dashed border-zinc-200 rounded-[1.5rem] text-zinc-400 text-[10px] font-black uppercase tracking-widest hover:border-amber-500 hover:text-amber-500 transition-all flex items-center justify-center gap-2">
                            <i data-lucide="plus-circle" class="w-4 h-4"></i> Tambah Momen Cerita
                        </button>
                    </div>
                </details>
            </div>

            {{-- MODULE 5: GALERI FOTO (Dengan Toggle) --}}
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                5
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Galeri Foto
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Koleksi momen bahagia</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            {{-- Toggle Gallery Khusus --}}
                            <label class="inline-flex items-center cursor-pointer" onclick="event.stopPropagation()">
                                <input type="checkbox" name="show_gallery" value="1" class="sr-only peer"
                                    {{ old('show_gallery', $invitation->show_gallery) ? 'checked' : '' }}
                                    onchange="toggleSection('gallery-section', this.checked)">
                                <div
                                    class="w-9 h-5 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 relative">
                                </div>
                            </label>
                            <div
                                class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>

                    <div id="gallery-section"
                        class="p-4 md:p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30 {{ old('show_gallery', $invitation->show_gallery) ? '' : 'hidden' }}">
                        <div class="mt-6">
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-3 mb-4">
                                @foreach ($invitation->galleries as $gallery)
                                    <div class="relative group aspect-square rounded-2xl overflow-hidden border border-zinc-100 shadow-sm"
                                        id="gallery-item-{{ $gallery->id }}">
                                        <img src="{{ asset('storage/' . $gallery->url) }}"
                                            class="w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-red-600/80 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center backdrop-blur-[2px]">
                                            <button type="button" onclick="confirmDeleteGallery('{{ $gallery->id }}')"
                                                class="bg-white text-red-600 p-1.5 rounded-lg shadow-lg">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="relative group">
                                <input type="file" name="photos[]" multiple accept="image/*" id="photo-input"
                                    class="hidden" onchange="previewGallery(this)">
                                <label for="photo-input"
                                    class="flex flex-col items-center justify-center w-full bg-white border-2 border-dashed border-zinc-200 rounded-[1.5rem] py-8 cursor-pointer group-hover:border-amber-500 transition-all">
                                    <i data-lucide="image-plus"
                                        class="w-6 h-6 text-zinc-300 group-hover:text-amber-500 mb-2"></i>
                                    <span class="text-[9px] font-black uppercase tracking-widest text-zinc-400">Upload Foto
                                        Baru</span>
                                </label>
                                <div id="preview-container" class="grid grid-cols-3 md:grid-cols-5 gap-3 mt-4"></div>
                            </div>
                        </div>
                    </div>
                </details>
            </div>



            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown dengan Toggle --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                6
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Hadiah Digital (Amplop)
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Kelola nomor rekening &
                                    e-wallet</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            {{-- Toggle Aktifkan --}}
                            <label class="inline-flex items-center cursor-pointer" onclick="event.stopPropagation()">
                                <input type="checkbox" name="show_gift" value="1" class="sr-only peer"
                                    {{ old('show_gift', $invitation->show_gift) ? 'checked' : '' }}
                                    onchange="toggleSection('gift-section', this.checked)">
                                <div
                                    class="w-9 h-5 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 relative">
                                </div>
                            </label>
                            {{-- Icon Panah --}}
                            <div
                                class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>

                    {{-- Isi Konten Hadiah --}}
                    <div id="gift-section"
                        class="p-4 md:p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30 {{ old('show_gift', $invitation->show_gift) ? '' : 'hidden' }}">
                        <div class="mt-6 bg-white p-6 rounded-[1.5rem] border border-zinc-100 shadow-sm">
                            <div class="flex items-center gap-2 mb-6 text-amber-600">
                                <i data-lucide="wallet" class="w-4 h-4"></i>
                                <span class="text-[9px] font-black uppercase tracking-[0.2em]">Informasi Rekening
                                    Utama</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                {{-- Nama Bank --}}
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Bank
                                        / E-Wallet</label>
                                    <input type="text" name="bank_name_1"
                                        value="{{ old('bank_name_1', $invitation->bank_name_1) }}"
                                        placeholder="Contoh: BCA / Dana"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner focus:ring-2 focus:ring-amber-500 transition-all">
                                </div>

                                {{-- No Rekening --}}
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">No.
                                        Rekening</label>
                                    <input type="text" name="bank_account_1"
                                        value="{{ old('bank_account_1', $invitation->bank_account_1) }}"
                                        placeholder="000-000-000"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner focus:ring-2 focus:ring-amber-500 transition-all">
                                </div>

                                {{-- Pemilik --}}
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Atas
                                        Nama</label>
                                    <input type="text" name="bank_owner_1"
                                        value="{{ old('bank_owner_1', $invitation->bank_owner_1) }}"
                                        placeholder="Nama Lengkap"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-4 py-3 text-xs font-bold shadow-inner focus:ring-2 focus:ring-amber-500 transition-all">
                                </div>
                            </div>

                            {{-- Alert Info --}}
                            <div class="mt-6 flex items-start gap-3 bg-zinc-50 p-4 rounded-xl border border-zinc-100">
                                <i data-lucide="info" class="w-4 h-4 text-zinc-400 mt-0.5"></i>
                                <p class="text-[9px] text-zinc-500 leading-relaxed uppercase tracking-tight">
                                    Informasi ini akan muncul pada fitur <b>Kirim Hadiah</b> di halaman undangan untuk
                                    memudahkan tamu memberikan amplop digital.
                                </p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            {{-- MODULE 6: MUSIK LATAR (Selalu Aktif/Tersedia) --}}
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                6
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Musik Latar
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Audio pengiring undangan</p>
                            </div>
                        </div>
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    <div class="p-4 md:p-6 pt-0 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="mt-6 pb-2">
                            <label
                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-3 ml-1">File
                                Musik (.mp3)</label>

                            @if ($invitation->music_file)
                                <div
                                    class="flex items-center gap-3 bg-white p-3 rounded-xl mb-4 border border-zinc-100 shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center">
                                        <i data-lucide="music" class="w-4 h-4"></i>
                                    </div>
                                    <div class="flex-1 truncate">
                                        <p class="text-[10px] font-bold text-zinc-700 leading-none mb-1">
                                            {{ basename($invitation->music_file) }}</p>
                                        <p class="text-[8px] text-zinc-400 uppercase tracking-tighter font-black">Aktif
                                            saat ini</p>
                                    </div>
                                </div>
                            @endif

                            <div class="relative">
                                <input type="file" name="music_file" accept="audio/mpeg"
                                    class="block w-full text-[10px] text-zinc-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-zinc-900 file:text-white hover:file:bg-amber-500 file:transition-all cursor-pointer">
                            </div>
                            <div class="mt-4 flex items-center gap-2 px-1">
                                <i data-lucide="info" class="w-3 h-3 text-amber-500"></i>
                                <p class="text-[7px] text-zinc-400 uppercase tracking-tight font-bold">Maksimal 2MB untuk
                                    performa terbaik</p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            <br />
            <div
                class="flex w-full bg-white rounded-[2rem] border border-zinc-100 shadow-2xl shadow-zinc-200 overflow-hidden">
                {{-- Sisi Kiri: Batal --}}
                <a href="{{ url('/dashboard') }}"
                    class="flex-1 bg-white text-zinc-400 py-6 text-[10px] font-black uppercase tracking-[0.3em] hover:bg-zinc-50 hover:text-zinc-900 transition-all duration-300 flex items-center justify-center border-r border-zinc-100 group">
                    <i data-lucide="x"
                        class="w-3.5 h-3.5 mr-2 text-zinc-300 group-hover:text-zinc-900 transition-colors"></i>
                    Batal
                </a>

                {{-- Sisi Kanan: Simpan --}}
                <button type="submit"
                    class="flex-[2] bg-zinc-900 text-white py-6 text-[10px] font-black uppercase tracking-[0.3em] hover:bg-zinc-800 transition-all duration-300 flex items-center justify-center gap-3 group active:scale-[0.99]">
                    <span>Simpan Perubahan</span>
                    <div class="w-6 h-6 bg-white/10 rounded-lg flex items-center justify-center">
                        <i data-lucide="save"
                            class="w-3.5 h-3.5 text-amber-400 group-hover:scale-110 transition-transform"></i>
                    </div>
                </button>
            </div>
    </div>
    </form>
    </div>
    @foreach ($invitation->galleries as $gallery)
        <form id="delete-gallery-{{ $gallery->id }}" action="{{ route('user.gallery.destroy', $gallery->id) }}"
            method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
    <script>
        function previewMainCover(input) {
            const preview = document.getElementById('preview_cover');
            const maxSize = 5 * 1024 * 1024;
            if (input.files && input.files[0]) {
                if (input.files[0].size > maxSize) {
                    alert("Maaf, file terlalu besar! Maksimal ukuran adalah 5MB.");
                    input.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.add('animate-pulse');
                    setTimeout(() => preview.classList.remove('animate-pulse'), 500);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewUpdate(input, previewId) {
            const preview = document.getElementById(previewId);
            const maxSize = 5 * 1024 * 1024;
            if (input.files && input.files[0]) {
                if (input.files[0].size > maxSize) {
                    alert("File terlalu besar! Maksimal 5MB.");
                    input.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        const gudangFile = new DataTransfer();
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
            const slugInput = document.getElementById('slug_input');
            if (slugInput) {
                slugInput.addEventListener('input', function() {
                    this.value = this.value.toLowerCase()
                        .replace(/[^a-z0-9-]/g, '-')
                        .replace(/-+/g, '-');
                });
            }
            let eventIdx = {{ count($events) }};
            window.addEventRow = function() {
                const wrapper = document.getElementById('event-wrapper');
                const div = document.createElement('div');
                div.className =
                    "event-item bg-zinc-50 p-6 rounded-[2rem] border border-zinc-100 relative animate-in slide-in-from-bottom-4 duration-500";
                div.innerHTML = `
                <button type="button" onclick="removeEvent(this)" class="absolute -top-2 -right-2 bg-red-500 text-white p-2 rounded-full shadow-lg z-10">
                    <i data-lucide="x" class="w-3 h-3"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Jenis Acara</label>
                        <input type="text" name="events[${eventIdx}][event_name]" required class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Tanggal Acara</label>
                        <input type="date" name="events[${eventIdx}][date]" required class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Jam Mulai</label>
                        <input type="time" name="events[${eventIdx}][start_time]" required class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Jam Selesai</label>
                        <input type="time" name="events[${eventIdx}][end_time]" class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Tempat & Alamat</label>
                        <input type="text" name="events[${eventIdx}][location_name]" placeholder="Nama Gedung" class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm mb-3">
                        <textarea name="events[${eventIdx}][address]" placeholder="Alamat lengkap..." class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm mb-4" rows="2"></textarea>
                        <div class="flex items-center bg-amber-50 rounded-2xl px-4 border border-amber-100">
                            <i data-lucide="map-pin" class="w-4 h-4 text-amber-600 mr-2"></i>
                            <input type="url" name="events[${eventIdx}][maps_url]" placeholder="Link Google Maps" class="w-full bg-transparent border-none py-4 text-xs font-bold italic focus:ring-0">
                        </div>
                    </div>
                </div>`;
                wrapper.appendChild(div);
                if (typeof lucide !== 'undefined') lucide.createIcons();
                eventIdx++;
                toggleDeleteButtons();
            };
            window.removeEvent = function(btn) {
                const items = document.querySelectorAll('.event-item');
                if (items.length > 1) {
                    if (confirm('Hapus acara ini?')) {
                        btn.closest('.event-item').remove();
                        toggleDeleteButtons();
                    }
                }
            };

            function toggleDeleteButtons() {
                const items = document.querySelectorAll('.event-item');
                items.forEach(item => {
                    const btn = item.querySelector('button[onclick="removeEvent(this)"]');
                    if (btn) {
                        if (items.length === 1) btn.classList.add('hidden');
                        else btn.classList.remove('hidden');
                    }
                });
            }
            window.previewGallery = function(input) {
                const container = document.getElementById('preview-container');
                if (input.files) {
                    Array.from(input.files).forEach(file => {
                        gudangFile.items.add(file);
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const div = document.createElement('div');
                            div.className =
                                "relative aspect-square rounded-xl overflow-hidden border-2 border-amber-500 shadow-md animate-in zoom-in-50 duration-300";
                            div.innerHTML =
                                `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                            container.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    });
                    input.files = gudangFile.files;
                }
            };
            window.toggleSection = function(sectionId, isChecked) {
                const section = document.getElementById(sectionId);
                if (section) {
                    if (isChecked) section.classList.remove('hidden');
                    else section.classList.add('hidden');
                }
            };
        });

        function previewProfile(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => document.getElementById(previewId).src = e.target.result;
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function confirmDeleteGallery(id) {
            if (!confirm('Hapus foto ini secara permanen dari server?')) return;

            const item = document.getElementById(`gallery-item-${id}`);
            // Ambil token dari input CSRF Laravel yang biasanya ada di form utama
            const token = document.querySelector('input[name="_token"]').value;

            // Sesuaikan URL dengan route kamu, biasanya: /dashboard/gallery/destroy/{id}
            const url = `/dashboard/gallery/destroy/${id}`;

            try {
                const response = await fetch(url, {
                    method: 'DELETE', // Gunakan method DELETE
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    // Beri efek visual sebelum dihapus
                    item.style.transform = 'scale(0)';
                    item.style.opacity = '0';
                    item.style.transition = 'all 0.3s ease';

                    setTimeout(() => {
                        item.remove();
                    }, 300);
                } else {
                    alert("Gagal: " + (result.message || "Terjadi kesalahan server"));
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Terjadi kesalahan jaringan.");
            }
        }

        function addStoryRow() {
            const wrapper = document.getElementById('story-wrapper');
            const index = wrapper.getElementsByClassName('story-item').length;

            const template = `
        <div class="story-item bg-zinc-50 p-6 md:p-8 rounded-[2rem] border border-zinc-100 relative group animate-in fade-in slide-in-from-top-4 duration-300">
            <button type="button" onclick="removeStory(this)" 
                class="absolute -top-2 -right-2 bg-red-500 text-white p-2 rounded-full shadow-lg z-10 delete-story-btn">
                <i data-lucide="x" class="w-3 h-3"></i>
            </button>

            <div class="max-w-2xl mx-auto space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Tahun / Waktu</label>
                        <input type="text" name="stories[${index}][date]" placeholder="Contoh: Awal 2022"
                            class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Judul Momen</label>
                        <input type="text" name="stories[${index}][title]" placeholder="Contoh: Pertama Bertemu"
                            class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>
                <div>
                    <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Isi Cerita</label>
                    <textarea name="stories[${index}][description]" class="w-full bg-white border-none rounded-2xl px-6 py-4 text-sm font-bold shadow-sm outline-none focus:ring-2 focus:ring-amber-500" 
                        rows="3" placeholder="Ceritakan momen singkatnya..."></textarea>
                </div>
                <div>
                    <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2">Foto Momen (Opsional)</label>
                    <input type="file" name="stories[${index}][image]" accept="image/*"
                        class="block w-full text-[11px] text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                </div>
            </div>
        </div>
    `;

            wrapper.insertAdjacentHTML('beforeend', template);
            if (window.lucide) lucide.createIcons();
            updateDeleteButtons();
        }

        function removeStory(btn) {
            const item = btn.closest('.story-item');
            item.remove();
            updateDeleteButtons();
            reindexStories();
        }

        function reindexStories() {
            const items = document.querySelectorAll('.story-item');
            items.forEach((item, idx) => {
                item.querySelectorAll('input, textarea').forEach(input => {
                    const name = input.getAttribute('name');
                    if (name) {
                        input.setAttribute('name', name.replace(/stories\[\d+\]/, `stories[${idx}]`));
                    }
                });
            });
        }

        function updateDeleteButtons() {
            const items = document.querySelectorAll('.story-item');
            items.forEach(item => {
                const btn = item.querySelector('.delete-story-btn');
                if (items.length <= 1) btn.classList.add('hidden');
                else btn.classList.remove('hidden');
            });
        }

        function toggleSection(id, isChecked) {
            document.getElementById(id).classList.toggle('hidden', !isChecked);
        }
    </script>
@endsection
