@extends('layouts.app')
@section('content')
    <div class="max-w-3xl mx-auto px-4 pb-24">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-black uppercase tracking-tighter text-zinc-900">Buat <span
                    class="text-amber-500">Undangan</span></h2>
            <p class="text-zinc-500 text-sm mt-2">Isi data di bawah, undangan langsung jadi dalam sekejap.</p>
        </div>
        @if ($errors->any())
            <div class="mb-8 bg-red-50 border border-red-200 text-red-600 px-6 py-4 rounded-[2rem] text-xs font-bold">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" id="invitationForm"
            class="space-y-8">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="show_couple" value="1">
            <input type="hidden" name="show_event" value="1">
            <input type="hidden" name="show_rsvp" value="1">
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                1
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Pilih Desain
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Pilih tema visual undangan
                                </p>
                            </div>
                        </div>
                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>
                    {{-- Isi Konten Grid --}}
                    <div class="p-4 md:p-8 pt-0 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mt-6">
                            @foreach ($themes as $theme)
                                <label class="relative cursor-pointer group">
                                    <input type="radio" name="theme_id" value="{{ $theme->id }}"
                                        class="peer absolute opacity-0" required
                                        {{ old('theme_id', $invitation->theme_id ?? '') == $theme->id || $loop->first ? 'checked' : '' }}>
                                    {{-- Card Desain --}}
                                    <div
                                        class="bg-white p-2 rounded-[1.5rem] border-2 border-transparent peer-checked:border-amber-500 peer-checked:shadow-lg transition-all duration-300 relative z-0">
                                        {{-- Image Container --}}
                                        <div class="aspect-[4/5] bg-zinc-100 rounded-[1.1rem] overflow-hidden mb-3">
                                            <img src="{{ asset('storage/' . $theme->thumbnail) }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                        {{-- Title --}}
                                        <div class="text-center pb-1">
                                            <h4
                                                class="font-black text-zinc-900 uppercase text-[9px] tracking-widest truncate px-1">
                                                {{ $theme->name }}
                                            </h4>
                                        </div>
                                    </div>
                                    {{-- Check Badge --}}
                                    <div
                                        class="absolute -top-1 -right-1 bg-amber-500 text-white w-6 h-6 rounded-full opacity-0 scale-50 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-10 shadow-lg flex items-center justify-center border-2 border-white">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[4]"></i>
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
                                    Foto Utama Undangan
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Sampul depan & Background
                                    utama
                                </p>
                            </div>
                        </div>
                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>
                    {{-- Isi Konten Foto --}}
                    <div class="p-6 md:p-10 pt-2 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
                            {{-- Foto Sampul --}}
                            <div class="relative group">
                                <label
                                    class="block text-[8px] font-black uppercase tracking-[0.2em] text-zinc-400 mb-4 text-center">
                                    1. Foto Sampul (Luar)
                                </label>
                                <div id="cover_preview_container"
                                    class="aspect-square rounded-[2.5rem] bg-white border-2 border-dashed border-zinc-200 flex flex-col items-center justify-center overflow-hidden relative transition-all hover:border-amber-500 shadow-sm">
                                    <img id="preview_cover" class="hidden w-full h-full object-cover">
                                    <div id="cover_placeholder" class="text-center p-4">
                                        <div
                                            class="w-12 h-12 bg-zinc-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="image-plus" class="w-6 h-6 text-zinc-300"></i>
                                        </div>
                                        <p class="text-[9px] font-black uppercase text-zinc-400 tracking-widest">Rasio
                                            1:1
                                        </p>
                                    </div>
                                    <label class="absolute inset-0 cursor-pointer">
                                        <input type="file" name="cover_photo" class="hidden" accept="image/*"
                                            onchange="previewMaster(this, 'preview_cover', 'cover_placeholder', 'cover_preview_container')">
                                    </label>
                                </div>
                                <p class="mt-4 text-[7px] font-bold text-center text-zinc-400 uppercase tracking-tighter">
                                    *
                                    Muncul di amplop depan</p>
                            </div>
                            {{-- Foto Hero --}}
                            <div class="relative group">
                                <label
                                    class="block text-[8px] font-black uppercase tracking-[0.2em] text-zinc-400 mb-4 text-center">
                                    2. Foto Hero (Dalam)
                                </label>
                                <div id="hero_preview_container"
                                    class="aspect-square rounded-[2.5rem] bg-white border-2 border-dashed border-zinc-200 flex flex-col items-center justify-center overflow-hidden relative transition-all hover:border-amber-500 shadow-sm">
                                    <img id="preview_hero" class="hidden w-full h-full object-cover">
                                    <div id="hero_placeholder" class="text-center p-4">
                                        <div
                                            class="w-12 h-12 bg-zinc-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="camera" class="w-6 h-6 text-zinc-300"></i>
                                        </div>
                                        <p class="text-[9px] font-black uppercase text-zinc-400 tracking-widest">
                                            Portrait/Bebas</p>
                                    </div>
                                    <label class="absolute inset-0 cursor-pointer">
                                        <input type="file" name="hero_photo" class="hidden" accept="image/*"
                                            onchange="previewMaster(this, 'preview_hero', 'hero_placeholder', 'hero_preview_container')">
                                    </label>
                                </div>
                                <p class="mt-4 text-[7px] font-bold text-center text-zinc-400 uppercase tracking-tighter">
                                    *
                                    Muncul sebagai background utama</p>
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
                                3
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Informasi Mempelai & Acara
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Slug URL, identitas, dan
                                    waktu
                                    utama</p>
                            </div>
                        </div>
                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>
                    {{-- Isi Konten --}}
                    <div class="p-6 md:p-10 pt-4 border-t border-zinc-50 bg-zinc-50/30">
                        {{-- Bagian 1: Link Undangan --}}
                        <div class="mb-10 bg-white p-6 rounded-[2rem] border border-zinc-100 shadow-sm">
                            <label
                                class="block text-[9px] font-black uppercase tracking-[0.2em] text-zinc-400 mb-3 ml-1">Alamat
                                Link Undangan</label>
                            <div class="relative flex items-center">
                                <div
                                    class="absolute left-5 text-zinc-400 text-[10px] font-black tracking-tight border-r border-zinc-100 pr-3 h-5 flex items-center">
                                    rqpedia.id/v/
                                </div>
                                <input type="text" name="slug" id="slug" placeholder="nama-mempelai" required
                                    value="{{ old('slug', $invitation->slug ?? '') }}"
                                    class="w-full bg-zinc-50 border-none rounded-xl pl-28 pr-6 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                            </div>
                            <p class="text-[7px] text-zinc-400 mt-3 ml-1 uppercase font-bold tracking-tighter">*
                                Gunakan
                                tanda hubung (-) sebagai spasi</p>
                        </div>
                        {{-- Bagian 2: Grid Mempelai --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            {{-- Mempelai Pria --}}
                            <div class="space-y-4 text-center">
                                <div class="flex flex-col items-center mb-2">
                                    <div
                                        class="w-24 h-24 rounded-[2rem] bg-white border-2 border-dashed border-zinc-200 overflow-hidden relative group hover:border-amber-500 transition-all shadow-sm">
                                        <img id="preview_groom" class="hidden w-full h-full object-cover">
                                        <label
                                            class="absolute inset-0 flex items-center justify-center cursor-pointer bg-black/0 group-hover:bg-black/5 transition-colors">
                                            <i data-lucide="camera" class="w-5 h-5 text-zinc-300"></i>
                                            <input type="file" name="groom_photo" class="hidden" accept="image/*"
                                                onchange="previewProfile(this, 'preview_groom')">
                                        </label>
                                    </div>
                                    <span
                                        class="text-[8px] font-black uppercase tracking-widest text-zinc-400 mt-3">Mempelai
                                        Pria</span>
                                </div>
                                <input type="text" name="groom_name" placeholder="Nama Lengkap Pria" required
                                    value="{{ old('groom_name', $invitation->groom_name ?? '') }}"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3.5 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none shadow-sm">
                                <textarea name="groom_info" placeholder="Putra ke-berapa? (Bapak A & Ibu B)"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3 text-[10px] font-medium focus:ring-2 focus:ring-amber-500 outline-none shadow-sm"
                                    rows="2">{{ old('groom_info', $invitation->groom_info ?? '') }}</textarea>
                            </div>
                            {{-- Mempelai Wanita --}}
                            <div class="space-y-4 text-center">
                                <div class="flex flex-col items-center mb-2">
                                    <div
                                        class="w-24 h-24 rounded-[2rem] bg-white border-2 border-dashed border-zinc-200 overflow-hidden relative group hover:border-amber-500 transition-all shadow-sm">
                                        <img id="preview_bride" class="hidden w-full h-full object-cover">
                                        <label
                                            class="absolute inset-0 flex items-center justify-center cursor-pointer bg-black/0 group-hover:bg-black/5 transition-colors">
                                            <i data-lucide="camera" class="w-5 h-5 text-zinc-300"></i>
                                            <input type="file" name="bride_photo" class="hidden" accept="image/*"
                                                onchange="previewProfile(this, 'preview_bride')">
                                        </label>
                                    </div>
                                    <span
                                        class="text-[8px] font-black uppercase tracking-widest text-zinc-400 mt-3">Mempelai
                                        Wanita</span>
                                </div>
                                <input type="text" name="bride_name" placeholder="Nama Lengkap Wanita" required
                                    value="{{ old('bride_name', $invitation->bride_name ?? '') }}"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3.5 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none shadow-sm">
                                <textarea name="bride_info" placeholder="Putri ke-berapa? (Bapak C & Ibu D)"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3 text-[10px] font-medium focus:ring-2 focus:ring-amber-500 outline-none shadow-sm"
                                    rows="2">{{ old('bride_info', $invitation->bride_info ?? '') }}</textarea>
                            </div>
                        </div>
                        {{-- Bagian 3: Waktu & Lokasi Utama --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-10 pt-8 border-t border-zinc-100">
                            <div>
                                <label
                                    class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Tanggal
                                    Utama</label>
                                <input type="date" name="wedding_date" required
                                    value="{{ old('wedding_date', $invitation->wedding_date ?? '') }}"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3.5 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none shadow-sm">
                            </div>
                            <div>
                                <label
                                    class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Lokasi
                                    Utama (Kota)</label>
                                <input type="text" name="location" placeholder="Contoh: Jakarta Selatan" required
                                    value="{{ old('location', $invitation->location ?? '') }}"
                                    class="w-full bg-white border border-zinc-100 rounded-xl px-5 py-3.5 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none shadow-sm">
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
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">Jadwal Acara
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Atur detail akad, resepsi,
                                    dll
                                </p>
                            </div>
                        </div>

                        {{-- Icon Panah --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>

                    {{-- Isi Konten --}}
                    <div class="p-4 md:p-8 pt-2 border-t border-zinc-50 bg-zinc-50/30">
                        <div id="event-wrapper" class="space-y-6 mt-4">
                            {{-- Item Acara 1 (Default) --}}
                            <div
                                class="event-item bg-white p-6 rounded-[2.5rem] border border-zinc-100 relative group shadow-sm">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- Nama Acara --}}
                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Nama
                                            Acara</label>
                                        <input type="text" name="events[0][event_name]"
                                            placeholder="Contoh: Akad Nikah atau Pemberkatan" required
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                    </div>

                                    {{-- Tanggal --}}
                                    <div>
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Tanggal</label>
                                        <input type="date" name="events[0][date]" required
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                    </div>

                                    {{-- Jam --}}
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Mulai</label>
                                            <input type="time" name="events[0][start_time]" required
                                                class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Selesai</label>
                                            <input type="time" name="events[0][end_time]"
                                                class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                        </div>
                                    </div>

                                    {{-- Lokasi --}}
                                    <div class="md:col-span-2 space-y-4 pt-4 border-t border-zinc-50">
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 ml-1">Detail
                                            Lokasi & Maps</label>
                                        <input type="text" name="events[0][location_name]"
                                            placeholder="Nama Gedung / Kediaman" required
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">

                                        <div class="relative flex items-center">
                                            <i data-lucide="map-pin" class="absolute left-5 w-4 h-4 text-amber-500"></i>
                                            <input type="url" name="events[0][google_maps_url]"
                                                placeholder="Link Google Maps"
                                                class="w-full bg-zinc-50 border-none rounded-xl pl-12 pr-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                        </div>

                                        <textarea name="events[0][address]" placeholder="Alamat Lengkap" required
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"
                                            rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Tambah Acara (Pindah ke dalam) --}}
                        {{-- Ganti bagian tombol di bawah #event-wrapper atau #story-wrapper dengan ini --}}

                        <div class="mt-8 flex justify-center relative z-30">
                            <button type="button" {{-- Kita tambahkan preventDefault dan stopPropagation agar tidak konflik dengan elemen details --}}
                                onclick="event.preventDefault(); event.stopPropagation(); addEventRow();"
                                class="group flex items-center gap-3 bg-white border-2 border-dashed border-zinc-200 hover:border-amber-500 px-8 py-4 rounded-2xl transition-all active:scale-95 shadow-sm cursor-pointer pointer-events-auto">

                                <div
                                    class="w-8 h-8 bg-zinc-900 group-hover:bg-amber-500 text-white rounded-lg flex items-center justify-center transition-colors shadow-lg">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                </div>

                                <span
                                    class="text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400 group-hover:text-zinc-900 transition-colors">
                                    Tambah Data Baru
                                </span>
                            </button>
                        </div>

                        <p class="mt-6 text-[8px] text-zinc-400 italic font-bold text-center uppercase tracking-[0.1em]">
                            * Pastikan link Google Maps valid agar tamu tidak tersesat
                        </p>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    {{-- Header Dropdown (Sekarang lebih bersih tanpa tombol) --}}
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                8
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">Love Story
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Timeline perjalanan cinta
                                    kalian</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            {{-- Toggle Aktif/Nonaktif --}}
                            <label class="relative inline-flex items-center cursor-pointer"
                                onclick="event.stopPropagation()">
                                <input type="hidden" name="show_story" value="0">
                                {{-- Default OFF --}}
                                <input type="checkbox" name="show_story" id="toggle_story" value="1"
                                    class="sr-only peer" onchange="toggleStorySection(this.checked)">
                                <div
                                    class="w-10 h-5 bg-zinc-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 shadow-inner">
                                </div>
                            </label>

                            {{-- Chevron: Beri id 'chevron_story' dan class 'hidden' --}}
                            <div id="chevron_story"
                                class="hidden w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>

                    {{-- Isi Konten --}}
                    <div id="story_section"
                        class="p-4 md:p-8 pt-2 border-t border-zinc-50 bg-zinc-50/30 transition-all duration-500">

                        <div id="story-wrapper" class="space-y-6 mt-4">
                            {{-- Item Cerita 1 --}}
                            <div
                                class="story-item bg-white p-6 rounded-[2.5rem] border border-zinc-100 relative group shadow-sm">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Tahun
                                            / Waktu</label>
                                        <input type="text" name="stories[0][date]" placeholder="Contoh: awal 2022"
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                    </div>
                                    <div>
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Judul
                                            Momen</label>
                                        <input type="text" name="stories[0][title]"
                                            placeholder="Contoh: Pertama Bertemu"
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Isi
                                            Cerita</label>
                                        <textarea name="stories[0][description]" placeholder="Ceritakan singkat momen berkesan kalian..."
                                            class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="md:col-span-2 pt-4 border-t border-zinc-50">
                                        <div class="flex items-center gap-5">
                                            <div
                                                class="w-20 h-20 bg-zinc-50 rounded-[1.5rem] border-2 border-dashed border-zinc-200 flex items-center justify-center overflow-hidden flex-shrink-0 relative">
                                                <img id="preview_0" class="hidden w-full h-full object-cover">
                                                <i id="icon_0" data-lucide="image" class="w-6 h-6 text-zinc-300"></i>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <input type="file" name="stories[0][image]" accept="image/*"
                                                    onchange="previewImage(this, 0)"
                                                    class="text-[9px] text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-zinc-900 file:text-white cursor-pointer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TOMBOL TAMBAH (Dipindahkan ke dalam sini) --}}
                        <div class="mt-8 flex flex-col items-center gap-4">
                            <button type="button" onclick="addStoryRow()"
                                class="group flex items-center gap-3 bg-white border-2 border-dashed border-zinc-200 hover:border-amber-500 px-8 py-4 rounded-2xl transition-all active:scale-95">
                                <div
                                    class="w-8 h-8 bg-zinc-900 group-hover:bg-amber-500 text-white rounded-lg flex items-center justify-center transition-colors">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                </div>
                                <span
                                    class="text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400 group-hover:text-zinc-900 transition-colors">Tambah
                                    Cerita Baru</span>
                            </button>

                            <p class="text-[8px] text-zinc-400 italic font-bold uppercase tracking-widest">
                                * Cerita akan ditampilkan secara otomatis sebagai timeline vertikal
                            </p>
                        </div>

                    </div>
                </details>
            </div>
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
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">Galeri Foto
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Abadikan momen dalam gambar
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            {{-- Toggle Switch --}}
                            <label class="relative inline-flex items-center cursor-pointer"
                                onclick="event.stopPropagation()">
                                <input type="hidden" name="show_gallery" value="0">

                                {{-- Tambahkan id dan onchange --}}
                                <input type="checkbox" name="show_gallery" id="toggle_gallery" value="1"
                                    class="sr-only peer" onchange="toggleGallerySection(this.checked)">

                                <div
                                    class="w-10 h-5 bg-zinc-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 shadow-inner">
                                </div>
                            </label>

                            {{-- Chevron: Beri id 'chevron_gallery' dan class 'hidden' secara default --}}
                            <div id="chevron_gallery"
                                class="hidden w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>
                    <div class="p-6 md:p-10 pt-4 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="bg-white p-6 rounded-[2rem] border border-zinc-100 shadow-sm">
                            <label
                                class="block text-[9px] font-black uppercase tracking-[0.2em] text-zinc-400 mb-6 ml-1 text-center">
                                Upload Foto Galeri (Max 10 Foto • @5MB)
                            </label>
                            <div id="gallery-container" class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                {{-- Upload Placeholder --}}
                                <label id="upload-placeholder"
                                    class="aspect-square bg-zinc-50 border-2 border-dashed border-zinc-200 rounded-[2rem] flex flex-col items-center justify-center cursor-pointer hover:bg-zinc-100 hover:border-amber-500 transition-all group">
                                    <div
                                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                        <i data-lucide="plus"
                                            class="w-5 h-5 text-zinc-300 group-hover:text-amber-500"></i>
                                    </div>
                                    <input type="file" id="photo-input" name="photos[]" multiple accept="image/*"
                                        class="hidden">
                                </label>
                            </div>
                            <div class="mt-8 flex items-center justify-between px-2">
                                <p id="photo-counter"
                                    class="text-[9px] text-zinc-400 font-black uppercase tracking-widest">
                                    0 / 10 Foto Terpilih
                                </p>
                                <div class="flex items-center gap-1.5 text-amber-500">
                                    <i data-lucide="info" class="w-3 h-3"></i>
                                    <span class="text-[8px] font-bold uppercase italic tracking-tighter">Drag to
                                        reorder
                                        ready</span>
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
                                5
                            </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">
                                    Amplop Digital
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Aktifkan untuk menerima
                                    hadiah
                                    online</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            {{-- Toggle Switch --}}
                            <label class="relative inline-flex items-center cursor-pointer"
                                onclick="event.stopPropagation()">
                                <input type="hidden" name="show_gift" value="0">
                                <input type="checkbox" name="show_gift" id="toggle_gift" value="1"
                                    class="sr-only peer" onchange="toggleGiftSection(this.checked)">

                                <div
                                    class="w-10 h-5 bg-zinc-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500 shadow-inner">
                                </div>
                            </label>

                            {{-- Chevron: Kita beri ID agar bisa disembunyikan --}}
                            <div id="chevron_gift"
                                class="hidden w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </summary>
                    {{-- Isi Konten --}}
                    <div id="gift_content"
                        class="p-6 md:p-10 pt-4 border-t border-zinc-50 bg-zinc-50/30 transition-all duration-300">
                        <div class="bg-white p-6 rounded-[2rem] border border-zinc-100 shadow-sm space-y-4">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center">
                                    <i data-lucide="credit-card" class="w-4 h-4 text-amber-400"></i>
                                </div>
                                <span class="text-[10px] font-black uppercase tracking-widest text-zinc-900">
                                    Data Rekening
                                </span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Nama
                                        Bank / Dompet Digital
                                    </label>
                                    <input type="text" name="bank_name_1"
                                        placeholder="Contoh: BCA, Mandiri, atau Dana"
                                        value="{{ old('bank_name_1', $invitation->bank_name_1 ?? '') }}"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                </div>
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">
                                        Nomor Rekening
                                    </label>
                                    <input type="text" name="bank_account_1" placeholder="Masukkan angka saja"
                                        value="{{ old('bank_account_1', $invitation->bank_account_1 ?? '') }}"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                </div>
                                <div>
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">
                                        Atas Nama (Pemilik)
                                    </label>
                                    <input type="text" name="bank_owner_1" placeholder="Contoh: Ahmad Subardjo"
                                        value="{{ old('bank_owner_1', $invitation->bank_owner_1 ?? '') }}"
                                        class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner">
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-zinc-50 flex items-start gap-3">
                                <i data-lucide="info" class="w-3.5 h-3.5 text-zinc-300 mt-0.5"></i>
                                <p
                                    class="text-[8px] text-zinc-400 font-medium leading-relaxed italic uppercase tracking-tighter">
                                    * Fitur ini akan memunculkan tombol "Hadiah Digital" di dalam undangan. Kosongkan jika
                                    tidak ingin digunakan. </p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <details
                    class="group bg-white border border-zinc-100 rounded-[2rem] overflow-hidden transition-all duration-300 open:shadow-xl open:ring-4 open:ring-zinc-50">
                    <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-sm">
                                7 </span>
                            <div class="flex flex-col">
                                <h3 class="font-black uppercase tracking-widest text-[11px] text-zinc-900">Musik Latar
                                </h3>
                                <p class="text-[9px] text-zinc-400 uppercase tracking-tight">Atur suasana dengan audio .mp3
                                </p>
                            </div>
                        </div>
                        <div
                            class="w-8 h-8 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-open:rotate-180 transition-transform duration-300">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </summary>
                    <div class="p-6 md:p-10 pt-4 border-t border-zinc-50 bg-zinc-50/30">
                        <div class="bg-white p-8 rounded-[2rem] border border-zinc-100 shadow-sm">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500">
                                    <i data-lucide="music" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <label
                                        class="block text-[10px] font-black uppercase tracking-widest text-zinc-900">Pilih
                                        File Musik</label>
                                    <p class="text-[8px] text-zinc-400 font-bold uppercase tracking-tighter mt-0.5"> Format
                                        file yang didukung hanya .mp3</p>
                                </div>
                            </div>
                            <div class="relative group">
                                <input type="file" name="music_file" accept="audio/mpeg"
                                    class="w-full bg-zinc-50 border-2 border-dashed border-zinc-200 rounded-2xl px-6 py-8 text-xs font-bold file:mr-6 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-zinc-900 file:text-white file:cursor-pointer hover:border-amber-500 transition-all cursor-pointer">
                            </div>
                            <div class="mt-6 flex items-start gap-3 bg-zinc-50/50 p-4 rounded-xl border border-zinc-100">
                                <i data-lucide="volume-2" class="w-4 h-4 text-zinc-400"></i>
                                <p class="text-[9px] text-zinc-500 font-medium leading-relaxed uppercase tracking-tight">
                                    Musik akan diputar secara otomatis (Autoplay) saat tamu membuka undangan Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
            <div class="flex flex-col gap-6 w-full">
                <button type="submit" id="submitBtn"
                    class="w-full bg-zinc-900 text-white py-6 rounded-[2rem] text-[11px] font-black uppercase tracking-[0.4em] hover:bg-amber-500 transition-all shadow-xl shadow-zinc-900/10">
                    Simpan & Terbitkan Undangan </button>
                <a href="{{ route('user.index') }}"
                    class="w-full bg-zinc-100 text-zinc-400 py-4 rounded-[2rem] text-[10px] font-black uppercase tracking-widest text-center hover:bg-rose-50 hover:text-rose-500 transition-all">
                    Batalkan </a>
            </div>
        </form>
    </div>
    <script>
        // 1. GLOBAL VARIABLES
        let storyIdx = document.querySelectorAll('.story-item').length;
        let eventIdx = document.querySelectorAll('.event-item').length;
        let fileListContainer = new DataTransfer(); // Pindah ke global agar bisa diakses fungsi hapus

        // 2. FUNGSI UPDATE UI GALERI (Pindah ke global)
        function updateGalleryUI() {
            const counterText = document.getElementById('photo-counter');
            const placeholder = document.getElementById('upload-placeholder');
            if (!counterText || !placeholder) return;

            const count = fileListContainer.files.length;
            counterText.innerText = `${count} / 10 Foto Terpilih`;
            placeholder.style.display = count >= 10 ? 'none' : 'flex';
        }

        // 3. FUNGSI PREVIEW & MASTER
        function previewImage(input, index) {
            const preview = document.getElementById(`preview_${index}`);
            const icon = document.getElementById(`icon_${index}`);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (icon) icon.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewMaster(input, imgID, placeholderID, containerID) {
            const preview = document.getElementById(imgID);
            const placeholder = document.getElementById(placeholderID);
            const container = document.getElementById(containerID);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                    container.classList.remove('border-dashed');
                    container.classList.add('border-solid', 'border-zinc-100');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 4. FUNGSI TOGGLE SECTION
        function toggleStorySection(isChecked) {
            const section = document.getElementById('story_section');
            const chevron = document.getElementById('chevron_story');
            const btnAdd = document.getElementById('btn_add_story');
            const details = document.getElementById('toggle_story').closest('details');
            const summary = details.querySelector('summary');

            if (isChecked) {
                // JIKA ON
                if (section) {
                    section.classList.remove('hidden');
                    setTimeout(() => {
                        section.classList.remove('opacity-0');
                        section.classList.add('opacity-100');
                    }, 10);
                }
                if (chevron) chevron.classList.remove('hidden');
                if (btnAdd) btnAdd.classList.remove('opacity-50', 'pointer-events-none');
                summary.classList.replace('cursor-default', 'cursor-pointer');
            } else {
                // JIKA OFF
                details.removeAttribute('open'); // Tutup otomatis

                if (section) {
                    section.classList.add('opacity-0');
                    section.classList.remove('opacity-100');
                    setTimeout(() => section.classList.add('hidden'), 300);
                }
                if (chevron) chevron.classList.add('hidden');
                if (btnAdd) btnAdd.classList.add('opacity-50', 'pointer-events-none');
                summary.classList.replace('cursor-pointer', 'cursor-default');
            }
        }

        // LOGIKA GLOBAL: Mencegah dropdown terbuka jika toggle OFF
        // Taruh ini satu kali saja di file JS Anda, ini akan berlaku untuk semua section
        document.addEventListener('click', function(e) {
            const summary = e.target.closest('summary');
            if (!summary) return;

            const details = summary.closest('details');
            const toggle = details.querySelector('input[type="checkbox"]');

            // Jika ada toggle dan statusnya OFF, serta yang diklik BUKAN label toggle-nya
            if (toggle && !toggle.checked && !e.target.closest('label')) {
                e.preventDefault();
                e.stopPropagation();
            }
        }, true);

        // 5. FUNGSI TAMBAH BARIS (STORY & EVENT)

        function addStoryRow() {
            const wrapper = document.getElementById('story-wrapper');
            if (!wrapper) return;

            // Gunakan storyIdx untuk membuat ID unik di setiap baris baru
            const html =
                ` <div class="story-item bg-white p-6 rounded-[2.5rem] border border-zinc-100 relative group shadow-sm animate-in fade-in slide-in-from-top-4 duration-300"> <button type="button" onclick="this.closest('.story-item').remove()" class="absolute -top-2 -right-2 bg-rose-500 text-white w-8 h-8 rounded-full shadow-lg flex items-center justify-center hover:bg-rose-600 transition-colors z-10"> <i data-lucide="x" class="w-4 h-4"></i> </button> <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <div> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Tahun / Waktu</label> <input type="text" name="stories[${storyIdx}][date]" placeholder="Contoh: awal 2022" class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> <div> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Judul Momen</label> <input type="text" name="stories[${storyIdx}][title]" placeholder="Contoh: Pertama Bertemu" class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> <div class="md:col-span-2"> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Isi Cerita</label> <textarea name="stories[${storyIdx}][description]" placeholder="Ceritakan singkat momen berkesan kalian..." class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner" rows="3"></textarea> </div> <div class="md:col-span-2 pt-4 border-t border-zinc-50"> <div class="flex items-center gap-5"> <div class="w-20 h-20 bg-zinc-50 rounded-[1.5rem] border-2 border-dashed border-zinc-200 flex items-center justify-center overflow-hidden flex-shrink-0 relative"> <img id="preview_${storyIdx}" class="hidden w-full h-full object-cover"> <i id="icon_${storyIdx}" data-lucide="image" class="w-6 h-6 text-zinc-300"></i> </div> <div class="flex flex-col gap-2"> <input type="file" name="stories[${storyIdx}][image]" accept="image/*" onchange="previewImage(this, '${storyIdx}')" class="text-[9px] text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-zinc-900 file:text-white cursor-pointer"> </div> </div> </div> </div> </div>`;

            wrapper.insertAdjacentHTML('beforeend', html);

            // Refresh icon agar Lucide merender icon baru (X dan Image)
            if (window.lucide) {
                lucide.createIcons();
            }

            // Naikkan index agar baris berikutnya punya ID berbeda
            storyIdx++;
        }

        function addEventRow() {
            const wrapper = document.getElementById('event-wrapper');
            if (!wrapper) return;

            const div = document.createElement('div');
            div.className =
                "event-item bg-white p-6 rounded-[2.5rem] border border-zinc-100 relative group shadow-sm mt-6 animate-in fade-in slide-in-from-top-4 duration-300";
            div.innerHTML =
                ` <button type="button" onclick="this.parentElement.remove()" class="absolute -top-2 -right-2 bg-red-500 text-white p-2 rounded-full shadow-lg z-10 hover:bg-red-600 transition-colors"> <i data-lucide="x" class="w-3 h-3"></i> </button> <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> {{-- Nama Acara --}} <div class="md:col-span-2"> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Nama Acara</label> <input type="text" name="events[${eventIdx}][event_name]" placeholder="Contoh: Akad Nikah atau Pemberkatan" required class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> {{-- Tanggal --}} <div> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Tanggal</label> <input type="date" name="events[${eventIdx}][date]" required class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> {{-- Jam --}} <div class="grid grid-cols-2 gap-4"> <div> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Mulai</label> <input type="time" name="events[${eventIdx}][start_time]" required class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> <div> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Selesai</label> <input type="time" name="events[${eventIdx}][end_time]" class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> </div> {{-- Lokasi --}} <div class="md:col-span-2 space-y-4 pt-4 border-t border-zinc-50"> <label class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 ml-1">Detail Lokasi & Maps</label> <input type="text" name="events[${eventIdx}][location_name]" placeholder="Nama Gedung / Kediaman" required class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> <div class="relative flex items-center"> <i data-lucide="map-pin" class="absolute left-5 w-4 h-4 text-amber-500"></i> <input type="url" name="events[${eventIdx}][google_maps_url]" placeholder="Link Google Maps" class="w-full bg-zinc-50 border-none rounded-xl pl-12 pr-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner"> </div> <textarea name="events[${eventIdx}][address]" placeholder="Alamat Lengkap" required class="w-full bg-zinc-50 border-none rounded-xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all shadow-inner" rows="2"></textarea> </div> </div>`;

            wrapper.appendChild(div);

            // Penting: Render ulang icon Lucide untuk elemen baru
            if (window.lucide) lucide.createIcons();
            eventIdx++;
        }

        // 6. INITIALIZATION
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();

            // Gallery Upload Logic
            const photoInput = document.getElementById('photo-input');
            const galleryContainer = document.getElementById('gallery-container');
            const placeholder = document.getElementById('upload-placeholder');

            if (photoInput) {
                photoInput.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    if (fileListContainer.files.length + files.length > 10) {
                        alert("Maksimal 10 foto.");
                        return;
                    }

                    files.forEach(file => {
                        fileListContainer.items.add(file);
                        const reader = new FileReader();
                        reader.onload = (ev) => {
                            const div = document.createElement('div');
                            div.className =
                                "relative aspect-square rounded-[2rem] overflow-hidden group shadow-md";
                            div.innerHTML =
                                ` <img src="${ev.target.result}" class="w-full h-full object-cover"> <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center"> <button type="button" class="remove-photo bg-red-500 text-white p-2 rounded-xl"> <i data-lucide="trash-2" class="w-4 h-4"></i> </button> </div>`;

                            div.querySelector('.remove-photo').onclick = () => {
                                const newDT = new DataTransfer();
                                Array.from(fileListContainer.files).forEach(f => {
                                    if (f.name !== file.name || f.size !== file
                                        .size) newDT.items.add(f);
                                });
                                fileListContainer = newDT;
                                photoInput.files = fileListContainer.files;
                                div.remove();
                                updateGalleryUI();
                            };

                            galleryContainer.insertBefore(div, placeholder);
                            if (window.lucide) lucide.createIcons();
                            updateGalleryUI();
                        };
                        reader.readAsDataURL(file);
                    });
                    photoInput.files = fileListContainer.files;
                });
            }

            // Script lainnya (Slug, Form submit, dll) tetap di sini...
            const form = document.getElementById('invitationForm');
            if (form) {
                form.onsubmit = () => {
                    const btn = document.getElementById('submitBtn');
                    btn.disabled = true;
                    btn.innerHTML = `Memproses...`;
                };
            }
        });

        function previewProfile(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Menghilangkan class hidden agar gambar muncul

                    // Opsional: Sembunyikan icon kamera saat gambar sudah ada
                    const icon = input.previousElementSibling;
                    if (icon && icon.tagName === 'I') {
                        icon.style.display = 'none';
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function toggleGiftSection(isChecked) {
            // Pastikan ID ini sesuai dengan yang ada di elemen <div id="gift_section"> Anda
            const section = document.getElementById('gift_section');
            const chevron = document.getElementById('chevron_gift');
            const details = chevron.closest('details');

            if (isChecked) {
                // Jika ON: Aktifkan akses
                if (section) {
                    section.classList.remove('hidden');
                    setTimeout(() => {
                        section.classList.remove('opacity-0');
                        section.classList.add('opacity-100');
                    }, 10);
                }
                if (chevron) chevron.classList.remove('hidden');
            } else {
                // Jika OFF: Tutup dropdown & sembunyikan akses
                if (details.hasAttribute('open')) {
                    details.removeAttribute('open');
                }

                if (section) {
                    section.classList.add('opacity-0');
                    section.classList.remove('opacity-100');
                    setTimeout(() => section.classList.add('hidden'), 300);
                }

                if (chevron) chevron.classList.add('hidden');
            }
        }

        function toggleGallerySection(isChecked) {
            const section = document.getElementById('gallery_section');
            const chevron = document.getElementById('chevron_gallery');
            const details = document.getElementById('toggle_gallery').closest('details');
            const summary = details.querySelector('summary');

            if (isChecked) {
                // --- JIKA ON ---
                if (section) {
                    section.classList.remove('hidden');
                    setTimeout(() => {
                        section.classList.remove('opacity-0');
                        section.classList.add('opacity-100');
                    }, 10);
                }
                if (chevron) chevron.classList.remove('hidden');

                // Kembalikan cursor pointer
                summary.classList.replace('cursor-default', 'cursor-pointer');
            } else {
                // --- JIKA OFF ---
                // 1. Tutup dropdown otomatis jika sedang terbuka
                details.removeAttribute('open');

                // 2. Sembunyikan konten
                if (section) {
                    section.classList.add('opacity-0');
                    section.classList.remove('opacity-100');
                    setTimeout(() => section.classList.add('hidden'), 300);
                }

                // 3. Hilangkan ikon panah
                if (chevron) chevron.classList.add('hidden');

                // 4. Ubah cursor agar user tahu area ini tidak bisa diklik
                summary.classList.replace('cursor-pointer', 'cursor-default');
            }
        }

        // Tambahkan listener ini sekali saja untuk semua details yang memiliki toggle
        document.querySelectorAll('details').forEach(detail => {
            detail.addEventListener('click', function(e) {
                // Cari checkbox di dalam details ini
                const toggle = this.querySelector('input[type="checkbox"]');

                // Jika ada toggle dan statusnya sedang tidak dicentang (OFF)
                // Serta yang diklik BUKAN label/input toggle-nya
                if (toggle && !toggle.checked && !e.target.closest('label')) {
                    e.preventDefault(); // Cegah details agar tidak terbuka
                }
            });
        });
    </script>
@endsection
