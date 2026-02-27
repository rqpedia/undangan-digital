<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Undangan Pernikahan {{ $data['groom'] }} & {{ $data['bride'] }}</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Undangan Pernikahan {{ $data['groom'] }} & {{ $data['bride'] }}">
    @if (isset($coverFile) && $coverFile)
        <meta property="og:image" content="{{ asset('storage/' . $coverFile->file_path) }}">
    @else
        <meta property="og:image" content="{{ asset('img/rqpedia1.png') }}">
    @endif
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Undangan Pernikahan {{ $data['groom'] }} & {{ $data['bride'] }}">
    @if (isset($coverFile) && $coverFile)
        <meta property="og:image" content="{{ asset('storage/' . $coverFile->file_path) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $coverFile->file_path) }}">
    @else
        <meta property="og:image" content="{{ asset('img/rqpedia1.png') }}">
        <meta name="twitter:image" content="{{ asset('img/rqpedia1.png') }}">
    @endif
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&family=Great+Vibes&family=Montserrat:wght@300;500&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --floral-white: #fffcf7;
            --gold-soft: #c5a059;
            --olive-leaf: #6b705c;
            --text-dark: #3d3d3d;
            /* Tambahkan variabel untuk gambar background agar mudah diganti */
            --bg-pattern: url('https://www.transparenttextures.com/patterns/cream-paper.png');
        }

        /* --- Base Reset --- */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--floral-white);
            color: var(--text-dark);
            overflow: hidden;
        }

        /* --- Typography --- */
        .font-serif-elegant {
            font-family: 'Playfair Display', serif;
        }

        .font-sans-light {
            font-family: 'Poppins', sans-serif;
        }

        .font-script {
            font-family: 'Great Vibes', cursive;
        }

        /* --- Layout & Containers --- */
        .snap-container {
            height: 100vh;
            width: 100%;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 2rem 1rem;
            /* Efek Background Transparan/Tekstur */
            background-color: var(--floral-white);
            background-image: var(--bg-pattern);
            background-repeat: repeat;
            background-attachment: fixed;
        }

        /* --- Components --- */
        .floral-card {
            background: rgba(255, 255, 255, 0.9);
            /* Sedikit transparan agar tekstur bg terlihat */
            border: 1px solid #e9e0d2;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(197, 160, 89, 0.1);
            backdrop-filter: blur(5px);
            /* Opsional: efek blur pada kartu */
        }

        .btn-gold {
            background: var(--gold-soft);
            color: white;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.3);
            cursor: pointer;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        /* --- Swiper & Media --- */
        .swiper-slide img {
            max-width: 100%;
            max-height: 60vh;
            border-radius: 12px;
            border: 6px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            object-fit: contain;
        }

        @media (min-width: 768px) {
            .swiper-slide img {
                max-height: 70vh;
            }
        }

        /* --- Animations --- */
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes floral-float {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.25;
            }

            50% {
                transform: translate(10px, 10px) scale(1.05);
                opacity: 0.5;
            }
        }

        /* Keadaan Default (Belum Dipilih) */
        .presence-input+label {
            background-color: white;
            color: var(--text-dark);
            border: 1px solid #e9e0d2;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Keadaan Aktif (Dipilih) */
        .presence-input:checked+label {
            background-color: var(--gold-soft) !important;
            color: white !important;
            border-color: var(--gold-soft) !important;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.4);
            transform: translateY(-2px);
            /* Membuat tombol terasa terangkat */
        }

        /* Efek Hover untuk interaksi tambahan */
        .presence-input+label:hover {
            background-color: #fdfaf5;
            border-color: var(--gold-soft);
        }

        .animate-spin-very-slow {
            animation: spin-slow 25s linear infinite;
        }

        .animate-spin-very-slow-reverse {
            animation: spin-slow 25s linear infinite reverse;
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }

        .animate-floral {
            animation: floral-float 8s ease-in-out infinite;
        }

        /* Animation Delays */
        .delay-1 {
            animation-delay: -2s;
        }

        .delay-2 {
            animation-delay: -4s;
        }

        .delay-3 {
            animation-delay: -6s;
        }

        /* Utility */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="font-sans-light scrollbar-hide">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="wreath-frame" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="48" fill="none" stroke="currentColor" stroke-width="0.5"
                stroke-dasharray="4 4" />
            <path fill="currentColor"
                d="M50 2 L54 10 L46 10 Z M98 50 L90 46 L90 54 Z M50 98 L46 90 L54 90 Z M2 50 L10 54 L10 46 Z" />
            <circle cx="50" cy="5" r="2" fill="currentColor" />
            <circle cx="95" cy="50" r="2" fill="currentColor" />
            <circle cx="50" cy="95" r="2" fill="currentColor" />
            <circle cx="5" cy="50" r="2" fill="currentColor" />
        </symbol>
        <symbol id="corner-ornament" viewBox="0 0 100 100">
            <path d="M100 2 L2 2 L2 100" fill="none" stroke="currentColor" stroke-width="2.5" />
            <path d="M5 5 Q 25 5 25 25 Q 5 25 5 5" fill="none" stroke="currentColor" stroke-width="1.5" />
            <path d="M2 2 L35 35" fill="none" stroke="currentColor" stroke-width="1" opacity="0.6" />
            <path d="M25 10 Q 60 10 65 2" fill="none" stroke="currentColor" stroke-width="1.5" />
            <path d="M10 25 Q 10 60 2 65" fill="none" stroke="currentColor" stroke-width="1.5" />
            <circle cx="25" cy="25" r="2" fill="currentColor" />
            <circle cx="45" cy="5" r="1.5" fill="currentColor" opacity="0.7" />
            <circle cx="5" cy="45" r="1.5" fill="currentColor" opacity="0.7" />
        </symbol>
    </svg>
    @php
        $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan'));
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#faf7f2] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden text-center px-6">

        @php
            $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
        @endphp

        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Cover Image">
                <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
            </div>
        @endif

        {{-- Kontainer Utama: Diberi margin-top negatif (mt-[-10%]) di mobile agar naik ke atas --}}
        <div class="relative z-20 w-full mt-[-15%] md:mt-0 {{ $coverFile ? 'text-white' : '' }}" data-aos="fade-up">

            <div
                class="mb-2 md:mb-4 tracking-[0.3em] text-[10px] md:text-xs uppercase {{ $coverFile ? 'text-stone-200' : 'text-stone-500' }} font-medium">
                The Wedding of
            </div>

            {{-- Nama Mempelai: Ukuran dikecilkan drastis untuk mobile --}}
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-5xl md:text-8xl text-[#c5a059] drop-shadow-lg leading-tight">
                    {{ $data['groom'] }}
                </h1>
                <span
                    class="font-serif-elegant text-xl md:text-2xl my-1 md:my-2 {{ $coverFile ? 'text-stone-200' : 'text-stone-400' }} italic">
                    &
                </span>
                <h1 class="font-script text-5xl md:text-8xl text-[#c5a059] drop-shadow-lg leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>

            <div class="mb-8 md:mb-10">
                <p
                    class="font-serif-elegant italic {{ $coverFile ? 'text-stone-200' : 'text-stone-500' }} text-sm md:text-lg mb-1">
                    Kepada Yth:
                </p>
                <h2
                    class="text-2xl md:text-3xl font-bold {{ $coverFile ? 'text-white' : 'text-stone-800' }} tracking-tight mb-3 drop-shadow-md">
                    {{ $guestName }}
                </h2>
                <div class="w-10 h-[1px] bg-[#c5a059] mx-auto mb-4"></div>
            </div>

            <button onclick="openInvitation()"
                class="btn-gold font-bold uppercase tracking-widest text-[10px] md:text-xs shadow-2xl px-8 py-3">
                Buka Undangan
            </button>
        </div>

        {{-- Ornamen Sudut (Dikecilkan ukurannya di mobile) --}}
        <svg
            class="floral-svg w-24 h-24 md:w-48 md:h-48 absolute top-[-10px] left-[-10px] rotate-180 text-[#d4c3a3] z-10 opacity-60">
            <use href="#floral-ornament" />
        </svg>
        <svg
            class="floral-svg w-24 h-24 md:w-48 md:h-48 absolute bottom-[-10px] right-[-10px] text-[#d4c3a3] z-10 opacity-60">
            <use href="#floral-ornament" />
        </svg>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/90 text-[#c5a059] p-3 rounded-full shadow-lg cursor-pointer hidden border border-[#e9e0d2]">
        <i data-lucide="music" id="music-icon" class="w-5 h-5"></i>
    </div>
    @if ($invitation->music_file)
        <audio id="bg-music" loop>
            <source src="{{ asset('storage/' . $invitation->music_file) }}" type="audio/mpeg">
        </audio>
    @endif
    <div id="main-content" class="hidden">
        <div class="snap-container scrollbar-hide">
            @php
                $heroPhoto = $invitation->attachments->where('file_type', 'hero')->first();
                $heroUrl = $heroPhoto ? asset('storage/' . $heroPhoto->file_path) : asset('images/default-hero.jpg');
            @endphp
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat"
                style="background-image: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url('{{ $heroUrl }}');">
                <div data-aos="fade-up" class="text-center z-10">
                    <div class="mb-4 tracking-[0.4em] text-[10px] uppercase text-stone-500 font-bold">Menyambut
                        Pernikahan</div>
                    <div class="flex flex-col items-center mb-4 md:mb-6">
                        {{-- Mobile: text-4xl (sedang) atau 5xl (besar), Desktop: text-8xl --}}
                        <h2
                            class="font-script text-4xl sm:text-5xl md:text-8xl text-[#c5a059] leading-tight text-center">
                            {{ $data['groom'] }}
                        </h2>

                        {{-- Ampersand (&) dibuat lebih kecil --}}
                        <span class="font-serif-elegant text-xl md:text-3xl text-stone-400 italic my-1 md:my-2">
                            &
                        </span>

                        <h2
                            class="font-script text-4xl sm:text-5xl md:text-8xl text-[#c5a059] leading-tight text-center">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p class="font-serif-elegant text-2xl text-stone-700 mb-8">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}</p>
                    <div class="flex justify-center gap-6 mt-4">
                        <div class="flex flex-col items-center">
                            <span id="days" class="text-3xl font-serif-elegant text-stone-800">00</span>
                            <span class="text-[9px] uppercase tracking-widest text-stone-400 font-bold">Hari</span>
                        </div>
                        <div class="w-[1px] h-10 bg-stone-200"></div>
                        <div class="flex flex-col items-center">
                            <span id="hours" class="text-3xl font-serif-elegant text-stone-800">00</span>
                            <span class="text-[9px] uppercase tracking-widest text-stone-400 font-bold">Jam</span>
                        </div>
                        <div class="w-[1px] h-10 bg-stone-200"></div>
                        <div class="flex flex-col items-center">
                            <span id="minutes" class="text-3xl font-serif-elegant text-stone-800">00</span>
                            <span class="text-[9px] uppercase tracking-widest text-stone-400 font-bold">Menit</span>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="snap-section px-4 py-10 relative overflow-hidden min-h-screen flex items-center bg-[#fdfaf5]">
                {{-- Ornamen Sudut (Dikecilkan di Mobile) --}}
                <div class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    {{-- Ikon Daun --}}
                    <svg
                        class="w-8 h-8 md:w-10 md:h-10 mx-auto mb-4 md:mb-6 text-[#6b705c] opacity-50 animate-bounce-slow">
                        <use href="#icon-leaf" />
                    </svg>

                    {{-- Kutipan Ayat (Font disesuaikan) --}}
                    <div
                        class="italic text-stone-500 text-[11px] md:text-base leading-relaxed font-serif-elegant mb-8 md:mb-12 px-6">
                        "Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan..."
                    </div>

                    {{-- Grid Pasangan --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-10 items-center">

                        {{-- Pria --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-64 md:h-64 mb-4 flex items-center justify-center">
                                {{-- Bingkai --}}
                                <svg
                                    class="absolute inset-0 w-full h-full text-[#c5a059] scale-[1.35] md:scale-125 z-20 pointer-events-none animate-spin-very-slow">
                                    <use href="#wreath-frame" />
                                </svg>
                                {{-- Foto --}}
                                <div
                                    class="relative w-32 h-32 md:w-56 md:h-56 rounded-full overflow-hidden border-[3px] border-white shadow-lg z-10">
                                    <img src="{{ asset('storage/' . $invitation->groom_photo) }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-[#c5a059] mb-1">
                                {{ $invitation->groom_name }}</h3>
                            <p class="font-serif-elegant italic text-stone-600 text-[10px] md:text-sm px-4">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>

                        {{-- Wanita --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-64 md:h-64 mb-4 flex items-center justify-center">
                                <svg
                                    class="absolute inset-0 w-full h-full text-[#c5a059] scale-[1.35] md:scale-125 z-20 pointer-events-none animate-spin-very-slow-reverse">
                                    <use href="#wreath-frame" />
                                </svg>
                                <div
                                    class="relative w-32 h-32 md:w-56 md:h-56 rounded-full overflow-hidden border-[3px] border-white shadow-lg z-10">
                                    <img src="{{ asset('storage/' . $invitation->bride_photo) }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-[#c5a059] mb-1">
                                {{ $invitation->bride_name }}</h3>
                            <p class="font-serif-elegant italic text-stone-600 text-[10px] md:text-sm px-4">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>

                    </div>
                </div>
            </section>
            <section
                class="snap-section px-4 md:px-6 py-12 relative overflow-hidden min-h-screen flex items-center bg-[#fdfaf5]">
                {{-- Ornamen Sudut (Dikecilkan untuk HP agar tidak menabrak kartu) --}}
                <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2 class="font-serif-elegant text-3xl md:text-4xl mb-8 md:mb-12 text-stone-800"
                        data-aos="fade-down">
                        Acara
                    </h2>

                    {{-- Grid: Di HP otomatis 1 kolom, di Desktop menyesuaikan jumlah event --}}
                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 md:gap-10">
                        @foreach ($invitation->events as $event)
                            <div class="floral-card p-6 md:p-10 flex flex-col items-center border-t-4 border-t-[#c5a059] bg-white/80 backdrop-blur-sm shadow-sm"
                                data-aos="zoom-in">

                                <h3
                                    class="font-serif-elegant text-xl md:text-2xl font-bold text-stone-700 mb-4 md:mb-6 uppercase tracking-wide">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-4 mb-6 md:mb-8 w-full">
                                    {{-- Tanggal --}}
                                    <div class="flex flex-col items-center gap-1">
                                        <span
                                            class="text-[9px] md:text-[10px] uppercase font-bold text-stone-400 tracking-[0.2em]">Tanggal</span>
                                        <p class="text-stone-700 font-semibold text-sm md:text-base">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                        </p>
                                    </div>

                                    {{-- Waktu --}}
                                    <div class="flex flex-col items-center gap-1">
                                        <span
                                            class="text-[9px] md:text-[10px] uppercase font-bold text-stone-400 tracking-[0.2em]">Waktu</span>
                                        <p class="text-stone-700 font-semibold text-sm md:text-base">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                            {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') . ' WIB' : 'Selesai' }}
                                        </p>
                                    </div>

                                    {{-- Lokasi --}}
                                    <div class="pt-2 md:pt-4 border-t border-stone-100 w-full">
                                        <p
                                            class="font-bold text-[#c5a059] uppercase text-[10px] md:text-xs tracking-widest mb-1 md:mb-2">
                                            {{ $event->location_name }}
                                        </p>
                                        <p class="text-[11px] md:text-[12px] text-stone-500 leading-relaxed px-2">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-gold !py-2.5 md:!py-3 text-[9px] md:text-[10px] w-full tracking-widest uppercase font-bold">
                                        Buka Google Maps
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Elegant Floral Responsive --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 md:px-6 py-20 relative overflow-hidden bg-[#fffcf7]">
                    {{-- Ornamen Sudut --}}
                    <div
                        class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0 pointer-events-none">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0 pointer-events-none"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="max-w-5xl mx-auto relative z-10">
                        <div class="text-center mb-16 px-4">
                            <h2 class="font-serif-elegant text-3xl md:text-5xl mb-3 text-stone-800"
                                data-aos="fade-down">Our Love Journey</h2>
                            <p class="text-[10px] md:text-xs text-stone-400 mb-6 tracking-[0.3em] uppercase"
                                data-aos="fade-up">Kisah Indah Kami</p>
                            <div
                                class="w-24 h-[1px] bg-gradient-to-r from-transparent via-[#c5a059] to-transparent mx-auto">
                            </div>
                        </div>
                        {{-- Timeline Container --}}
                        <div
                            class="relative before:absolute before:inset-0 before:left-4 md:before:left-1/2 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-[#c5a059]/40 before:to-transparent">
                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex items-center justify-between md:justify-normal {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} mb-12 md:mb-20">
                                    {{-- Dot Indicator --}}
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full border-2 border-[#c5a059] bg-[#fffcf7] text-[#c5a059] absolute left-0 md:left-1/2 md:-translate-x-1/2 z-10 shadow-sm">
                                        <span
                                            class="font-serif-elegant text-[10px] md:text-xs font-bold">{{ $index + 1 }}</span>
                                    </div>
                                    {{-- Content Card --}}
                                    <div class="w-[calc(100%-3rem)] md:w-[calc(50%-2.5rem)] ml-auto md:ml-0"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                        <div
                                            class="floral-card group overflow-hidden border-b-4 border-[#c5a059] bg-white shadow-sm hover:shadow-xl transition-all duration-500 rounded-xl md:rounded-2xl">
                                            {{-- Grid Layout: Tumpuk di Mobile, Sampingan di Desktop --}}
                                            <div
                                                class="flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                                                @if ($story->image)
                                                    <div
                                                        class="w-full {{ $story->image ? 'md:w-2/5' : '' }} h-48 md:h-auto overflow-hidden">
                                                        <img src="{{ asset('storage/' . $story->image) }}"
                                                            alt="{{ $story->title }}"
                                                            class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                                    </div>
                                                @endif
                                                <div class="p-6 md:p-8 flex-1">
                                                    <span
                                                        class="text-[#c5a059] font-serif-elegant font-bold tracking-widest text-base md:text-lg block mb-1">{{ $story->date }}</span>
                                                    <h4
                                                        class="font-serif-elegant text-lg md:text-xl text-stone-700 mb-3 uppercase tracking-wider">
                                                        {{ $story->title }}</h4>
                                                    <div class="relative">
                                                        <span
                                                            class="absolute -top-3 -left-2 text-3xl font-serif text-stone-100 select-none">“</span>
                                                        <p
                                                            class="text-stone-500 text-xs md:text-sm leading-relaxed italic relative z-10">
                                                            {{ $story->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gallery && count($invitation->galleries) > 0)
                <section class="snap-section px-4 relative overflow-hidden bg-[#fffcf7]">
                    <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: scaleX(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: scaleY(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: rotate(180deg);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="w-full text-center relative z-10">
                        <h2 class="font-serif-elegant text-4xl mb-2 text-stone-800" data-aos="fade-up">Our Moments
                        </h2>
                        <p class="text-xs text-stone-400 mb-10 tracking-[0.2em] uppercase">Captured Memories</p>
                        <div class="mx-auto w-full md:max-w-4xl" data-aos="fade-up">
                            <div class="swiper mySwiper !pb-12">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $photo->url) }}"
                                                class="mx-auto rounded-lg shadow-md border-4 border-white"
                                                alt="Gallery Photo" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gift)
                <section class="snap-section px-6">
                    <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: scaleX(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: scaleY(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full" style="transform: rotate(180deg);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="max-w-xl mx-auto w-full text-center">
                        <h2 class="font-serif-elegant text-4xl mb-10 text-stone-800" data-aos="fade-up">Wedding Gift
                        </h2>
                        <p class="text-sm text-stone-500 mb-8 italic">Doa restu Anda sudah lebih dari cukup, namun bagi
                            Anda yang ingin memberikan tanda kasih:</p>
                        <div class="space-y-6">
                            @if ($invitation->bank_account_1)
                                <div class="floral-card p-8 bg-white" data-aos="zoom-in">
                                    <p class="text-[#c5a059] font-bold tracking-widest mb-4 uppercase text-xs">
                                        {{ $invitation->bank_name_1 }}</p>
                                    <h3 class="text-2xl font-serif-elegant text-stone-800 mb-1" id="rek-1">
                                        {{ $invitation->bank_account_1 }}</h3>
                                    <p class="text-xs text-stone-400 mb-6 uppercase tracking-widest">A/N
                                        {{ $invitation->bank_owner_1 }}</p>
                                    <button onclick="copyToClipboard('rek-1')"
                                        class="border border-[#c5a059] text-[#c5a059] px-6 py-2 rounded-full text-[10px] font-bold uppercase hover:bg-[#c5a059] hover:text-white transition-all">Salin
                                        Rekening</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            {{-- Ganti items-center menjadi items-start agar konten mulai dari atas --}}
            <section
                class="snap-section px-4 md:px-6 relative overflow-hidden min-h-screen flex items-start pt-16 md:items-center md:pt-0">

                {{-- Ornamen Sudut (Dikecilkan di HP) --}}
                <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                {{-- Kontainer Utama --}}
                <div class="max-w-2xl mx-auto w-full relative z-10">
                    {{-- Judul dengan margin yang lebih rapat --}}
                    <h2 class="font-serif-elegant text-2xl md:text-4xl text-center mb-4 md:mb-10 text-stone-800">Buku
                        Tamu</h2>

                    <form id="comment-form"
                        class="floral-card p-5 md:p-8 mb-4 bg-white/50 backdrop-blur-sm border-t-2 border-[#c5a059]">
                        @csrf
                        <div class="space-y-3 md:space-y-5">
                            <div class="text-center pb-2 border-b border-stone-100">
                                <p
                                    class="text-[8px] md:text-[9px] font-bold text-stone-400 uppercase tracking-widest mb-0.5">
                                    Nama Tamu</p>
                                <p class="text-sm md:text-lg font-serif-elegant text-[#c5a059]">{{ $guestName }}
                                </p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3 md:gap-4">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-stone-200 block text-center py-2 md:py-3 text-[9px] md:text-[10px] font-bold uppercase tracking-widest rounded-lg cursor-pointer transition-all">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-stone-200 block text-center py-2 md:py-3 text-[9px] md:text-[10px] font-bold uppercase tracking-widest rounded-lg cursor-pointer transition-all">Absen</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Tulis ucapan..."
                                class="w-full p-3 text-xs md:text-sm bg-white/80 border border-stone-200 rounded-lg focus:ring-1 focus:ring-[#c5a059] outline-none transition-all"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-gold w-full py-2.5 text-[10px] md:text-[11px] font-bold uppercase tracking-[0.2em]">Kirim
                                Ucapan</button>
                        </div>
                    </form>

                    {{-- Daftar Komentar (Tinggi disesuaikan agar tidak 'off-screen') --}}
                    <div id="comment-list"
                        class="space-y-3 max-h-[35vh] md:max-h-[40vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/70 p-4 rounded-xl border-l-4 border-[#c5a059] shadow-sm">
                                {{-- Header Komentar --}}
                                <div class="flex justify-between items-center mb-1">
                                    <h4
                                        class="font-bold text-[10px] md:text-[11px] text-stone-800 uppercase tracking-tight">
                                        {{ $comment->name }}
                                    </h4>
                                    <span class="text-[8px] md:text-[9px] text-[#c5a059] font-bold italic">
                                        {{ $comment->presence }}
                                    </span>
                                </div>

                                {{-- Isi Pesan --}}
                                <p class="text-stone-600 text-[11px] md:text-xs italic leading-relaxed">
                                    "{{ $comment->message }}"
                                </p>

                                {{-- Logika Balasan (Tambahkan ini kembali) --}}
                                @if (!empty(trim($comment->reply)))
                                    <div
                                        class="mt-3 ml-3 p-3 bg-stone-100/80 rounded-lg border-l-2 border-stone-300 relative">
                                        {{-- Label Balasan --}}
                                        <div class="flex items-center gap-2 mb-1">
                                            <h5 class="text-[8px] font-bold text-stone-700 uppercase tracking-widest">
                                                Balasan</h5>
                                            <span
                                                class="bg-[#c5a059]/10 text-[#c5a059] text-[7px] px-1.5 py-0.5 rounded font-bold uppercase">Mempelai</span>
                                        </div>
                                        {{-- Isi Balasan --}}
                                        <p class="text-stone-500 text-[10px] md:text-[11px] leading-snug">
                                            {{ $comment->reply }}
                                        </p>
                                    </div>
                                @endif

                                {{-- Waktu Komentar (Opsional) --}}
                                <p class="text-[7px] text-stone-400 mt-2 uppercase tracking-tighter">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">
                <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full" style="transform: scaleY(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full" style="transform: rotate(180deg);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="max-w-md mx-auto px-10">
                    <h3 class="font-script text-6xl text-[#c5a059] mb-8">Thank You</h3>
                    <p class="font-serif-elegant italic text-stone-500 text-sm leading-relaxed mb-20">Merupakan
                        kehormatan besar bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.
                    </p>
                    <div class="opacity-40 text-[9px] tracking-[0.3em] uppercase font-bold text-stone-400">RQ Pedia
                        Digital Invitation</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        lucide.createIcons();
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false
            }
        });
        let isPlaying = false;
        const music = document.getElementById('bg-music');
        const musicControl = document.getElementById('music-control');
        const musicIcon = document.getElementById('music-icon');

        function openInvitation() {
            // 1. Memicu Auto Fullscreen (Harus di awal interaksi klik)
            const elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen(); // Untuk Safari
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen(); // Untuk IE/Edge
            }

            // 2. Animasi Cover
            const cover = document.getElementById('wedding-cover');
            cover.style.transform = 'translateY(-100%)';

            setTimeout(() => {
                cover.style.display = 'none';
                document.getElementById('main-content').classList.remove('hidden');

                // 3. Kontrol Musik
                const music = document.getElementById('bg-music');
                if (music) {
                    music.play();
                    document.getElementById('music-control').classList.remove('hidden');
                    isPlaying = true; // Memastikan status isPlaying sinkron
                }

                // 4. Refresh AOS untuk animasi section berikutnya
                AOS.refresh();

                // 5. Memunculkan Ornamen Global (Jika Anda menggunakan ID global-ornaments tadi)
                const ornaments = document.getElementById('global-ornaments');
                if (ornaments) {
                    ornaments.classList.remove('hidden');
                }
            }, 1000);
        }

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.setAttribute('data-lucide', 'music-2');
            } else {
                music.play();
                musicIcon.setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(id) {
            const textElement = document.getElementById(id);
            if (!textElement) return;
            const text = textElement.innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Berhasil disalin!');
            });
        }
        const targetDate = new Date("{{ $data['date'] }}").getTime();
        const countdown = setInterval(() => {
            const now = new Date().getTime();
            const diff = targetDate - now;
            if (diff > 0) {
                document.getElementById('days').innerText = Math.floor(diff / (1000 * 60 * 60 * 24)).toString()
                    .padStart(2, '0');
                document.getElementById('hours').innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 *
                    60 * 60)).toString().padStart(2, '0');
                document.getElementById('minutes').innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
                    .toString().padStart(2, '0');
            } else {
                clearInterval(countdown);
            }
        }, 1000);
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const btnSubmit = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presenceEl = document.querySelector('input[name="presence"]:checked');
            const presence = presenceEl ? presenceEl.value : 'Hadir';
            const token = document.querySelector('input[name="_token"]').value;
            if (!message.trim()) {
                alert("Harap tuliskan pesan Anda.");
                return;
            }
            btnSubmit.innerText = "MENGIRIM...";
            btnSubmit.disabled = true;
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        name,
                        message,
                        presence
                    })
                })
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) throw new Error(data.message || 'Error');
                    return data;
                })
                .then(data => {
                    const list = document.getElementById('comment-list');
                    const html = `
                <div class="bg-white p-5 rounded-xl border-l-4 border-[#c5a059] shadow-sm animate-fade-in mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-[11px] text-stone-800 uppercase tracking-tight">${name}</h4>
                        <span class="text-[9px] text-[#c5a059] font-bold italic">${presence}</span>
                    </div>
                    <p class="text-stone-600 text-xs italic leading-relaxed">"${message}"</p>
                    <p class="text-[8px] text-stone-400 mt-2 uppercase tracking-tighter">Baru saja</p>
                </div>`;
                    list.insertAdjacentHTML('afterbegin', html);
                    document.getElementById('c_message').value = "";
                    alert("Pesan dan RSVP Anda berhasil dikirim!");
                    list.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch((err) => {
                    console.error(err);
                    alert("Gagal mengirim pesan. Silakan coba lagi.");
                })
                .finally(() => {
                    btnSubmit.innerText = "Kirim Ucapan";
                    btnSubmit.disabled = false;
                });
        });
    </script>
</body>

</html>
