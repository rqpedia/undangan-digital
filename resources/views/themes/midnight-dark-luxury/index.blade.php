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
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;600&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* 1. Variables & Global */
        :root {
            --dark-deep: #050505;
            --dark-card: #0f1115;
            --gold-primary: #c5a059;
            --gold-light: #e2c792;
            --gold-dark: #8e6d2f;
            --gold-soft: rgba(255, 166, 0, 0.4);
            /* Disesuaikan untuk transparansi */
            --text-main: #e5e5e5;
            --text-dim: #9ca3af;
            --grad-gold: linear-gradient(135deg, var(--gold-dark), var(--gold-primary), var(--gold-light));
        }

        body {
            background-color: var(--dark-deep);
            color: var(--text-main);
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            overflow: hidden;
        }

        /* 2. Typography */
        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }

        .font-accent {
            font-family: 'Cinzel', serif;
        }

        .font-script {
            font-family: 'Great Vibes', cursive;
        }

        /* 3. Containers & Layout */
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
            background-image: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%);
        }

        /* 4. Components */
        .luxury-card {
            background: rgba(15, 17, 21, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(197, 160, 89, 0.2);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .btn-gold {
            background: var(--grad-gold);
            background-size: 200% auto;
            color: #000;
            font-weight: 700;
            border-radius: 8px;
            transition: 0.5s;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
        }

        .btn-gold:hover {
            background-position: right center;
            transform: translateY(-2px);
        }

        .presence-input:checked+label {
            background: var(--gold-primary);
            color: black;
            border-color: var(--gold-primary);
            box-shadow: 0 0 15px rgba(197, 160, 89, 0.4);
        }

        .gold-divider {
            height: 1px;
            width: 100px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
        }

        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        /* 5. Animations & Effects */
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-very-slow {
            animation: spin-slow 60s linear infinite;
        }

        /* Memastikan konten di dalam grup hover tetap stabil */
        .group:hover .animate-spin-very-slow {
            opacity: 1;
            color: var(--gold-primary);
            transition: all 0.5s ease;
        }

        .group .relative.z-10 {
            transform: rotate(0deg) !important;
        }

        /* Utility */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .gallery-swiper .swiper-slide {
            width: 80%;
            /* Gambar akan mengambil 80% lebar layar HP */
        }

        @media (min-width: 768px) {
            .gallery-swiper .swiper-slide {
                width: 50%;
                /* Di desktop lebih kecil sedikit agar tidak memenuhi layar */
            }
        }
    </style>
</head>

<body class="antialiased">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
        <symbol id="frame-circle" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="48" fill="none" stroke="currentColor" stroke-width="0.5"
                stroke-dasharray="4 4" />
            <circle cx="50" cy="50" r="44" fill="none" stroke="currentColor" stroke-width="1" />
            <circle cx="50" cy="6" r="2" fill="currentColor" />
            <circle cx="50" cy="94" r="2" fill="currentColor" />
            <circle cx="6" cy="50" r="2" fill="currentColor" />
            <circle cx="94" cy="50" r="2" fill="currentColor" />
        </symbol>
    </svg>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-black flex flex-col items-center justify-center transition-all duration-1000">
        @php
            $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
        @endphp
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Cover Background">
                <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]"></div>
            </div>
        @endif
        <div
            class="absolute inset-0 opacity-40 bg-[url('https://www.transparenttextures.com/patterns/dark-matter.png')] z-[1]">
        </div>
        <div class="text-center px-6 z-20" data-aos="zoom-in">
            <p
                class="font-accent tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] text-stone-500 mb-6 md:mb-8 uppercase">
                The Wedding Celebration Of</p>
            <div class="space-y-1 md:space-y-2 mb-8 md:mb-12">
                <h1 class="font-script text-5xl md:text-9xl text-[var(--gold-primary)] leading-tight drop-shadow-2xl">
                    {{ $data['groom'] }}</h1>
                <p class="font-serif-luxury text-xl md:text-2xl text-stone-400 italic">&</p>
                <h1 class="font-script text-5xl md:text-9xl text-[var(--gold-primary)] leading-tight drop-shadow-2xl">
                    {{ $data['bride'] }}</h1>
            </div>
            <div class="mb-8 md:mb-12">
                <p class="font-serif-luxury italic text-stone-500 text-sm md:text-base mb-2">Dear Honorable Guest,</p>
                <h2
                    class="text-2xl md:text-3xl font-accent text-white tracking-wide mb-4 md:mb-6 leading-tight drop-shadow-md">
                    {{ $guestName }}</h2>
                <div class="gold-divider mx-auto w-16 md:w-24"></div>
            </div>
            <button onclick="openInvitation()"
                class="btn-gold px-8 md:px-10 py-3 md:py-4 text-[10px] md:text-xs shadow-2xl">
                Open Invitation
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-8 right-8 z-50 bg-black/60 backdrop-blur-md text-[var(--gold-primary)] p-4 rounded-full border border-[var(--gold-primary)]/30 cursor-pointer hidden">
        <i data-lucide="music" id="music-icon" class="w-5 h-5"></i>
    </div>
    @if ($invitation->music_file)
        <audio id="bg-music" loop>
            <source src="{{ asset('storage/' . $invitation->music_file) }}" type="audio/mpeg">
        </audio>
    @endif
    <div id="main-content" class="hidden">
        <div class="snap-container scrollbar-hide">
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen py-10 px-4 overflow-hidden">
                @php
                    $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
                @endphp
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-stone-900"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/80"></div>
                </div>
                <div data-aos="fade-up" class="text-center w-full z-10 relative">
                    <h2
                        class="font-accent tracking-[0.3em] md:tracking-[0.6em] text-[8px] md:text-[10px] text-[var(--gold-primary)] mb-4 md:mb-6 uppercase font-bold drop-shadow-md">
                        The Journey Begins
                    </h2>
                    <div class="flex flex-col items-center mb-6 md:mb-10">
                        <h2
                            class="font-script text-6xl md:text-9xl text-[var(--gold-primary)] leading-tight drop-shadow-2xl">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif-luxury text-xl md:text-2xl text-stone-300 italic my-1 md:my-2">&</span>
                        <h2
                            class="font-script text-6xl md:text-9xl text-[var(--gold-primary)] leading-tight drop-shadow-2xl">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-luxury text-xl md:text-3xl text-white mb-8 md:mb-12 tracking-[0.15em] md:tracking-widest drop-shadow-lg">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d.m.Y') }}
                    </p>
                    <div
                        class="flex justify-center gap-6 md:gap-12 bg-black/40 backdrop-blur-md py-6 px-8 rounded-[2rem] max-w-sm mx-auto border border-white/10 shadow-2xl">
                        <div class="flex flex-col">
                            <span id="days"
                                class="text-2xl md:text-4xl font-serif-luxury text-[var(--gold-light)]">00</span>
                            <span class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Days</span>
                        </div>
                        <div class="flex flex-col">
                            <span id="hours"
                                class="text-2xl md:text-4xl font-serif-luxury text-[var(--gold-light)]">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Hours</span>
                        </div>
                        <div class="flex flex-col">
                            <span id="minutes"
                                class="text-2xl md:text-4xl font-serif-luxury text-[var(--gold-light)]">00</span>
                            <span class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="snap-section px-4 py-8 md:px-6 md:py-20 relative overflow-hidden flex items-center min-h-screen md:min-h-0">
                {{-- Ornamen Sudut (Dikecilkan di HP) --}}
                <div
                    class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0 animate-floral delay-1">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto text-center relative z-10 w-full" data-aos="fade-up">
                    <i data-lucide="quote"
                        class="w-5 h-5 md:w-8 md:h-8 mx-auto text-[var(--gold-primary)] opacity-40 mb-4 md:mb-8"></i>

                    {{-- Teks Ayat Dikecilkan --}}
                    <p
                        class="italic text-stone-400 font-serif-luxury text-sm md:text-xl leading-relaxed mb-8 md:mb-16 px-6">
                        "And among His signs is this, that He created for you mates..."
                    </p>

                    {{-- Grid Pasangan --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-24 items-start">

                        {{-- Pria --}}
                        <div class="group flex flex-col items-center">
                            {{-- Container Foto dikecilkan dari w-56 ke w-40 di HP --}}
                            <div
                                class="relative flex items-center justify-center w-40 h-40 md:w-72 md:h-72 mb-4 md:mb-8">
                                <div
                                    class="absolute inset-0 text-[var(--gold-soft)] opacity-60 animate-spin-very-slow scale-110">
                                    <svg class="w-full h-full">
                                        <use href="#frame-circle" />
                                    </svg>
                                </div>
                                {{-- Foto dikecilkan dari w-48 ke w-32 di HP --}}
                                <div
                                    class="relative w-32 h-32 md:w-64 md:h-64 overflow-hidden rounded-full border-[3px] border-white shadow-xl z-10">
                                    <img src="{{ asset('storage/' . $invitation->groom_photo) }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-5xl text-[var(--gold-primary)] mb-1">
                                {{ $invitation->groom_name }}
                            </h3>
                            <p
                                class="text-[9px] md:text-xs tracking-widest text-stone-500 uppercase px-4 leading-loose">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>

                        {{-- Wanita --}}
                        <div class="group flex flex-col items-center">
                            <div
                                class="relative flex items-center justify-center w-40 h-40 md:w-72 md:h-72 mb-4 md:mb-8">
                                <div
                                    class="absolute inset-0 text-[var(--gold-soft)] opacity-60 animate-spin-very-slow scale-110">
                                    <svg class="w-full h-full">
                                        <use href="#frame-circle" />
                                    </svg>
                                </div>
                                <div
                                    class="relative w-32 h-32 md:w-64 md:h-64 overflow-hidden rounded-full border-[3px] border-white shadow-xl z-10">
                                    <img src="{{ asset('storage/' . $invitation->bride_photo) }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-5xl text-[var(--gold-primary)] mb-1">
                                {{ $invitation->bride_name }}
                            </h3>
                            <p
                                class="text-[9px] md:text-xs tracking-widest text-stone-500 uppercase px-4 leading-loose">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>

                    </div>
                </div>
            </section>
            <section
                class="snap-section px-4 py-10 md:px-6 md:py-20 relative overflow-hidden flex items-center min-h-screen md:min-h-0">
                {{-- Ornamen Sudut (Dikecilkan drastis di HP) --}}
                <div
                    class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-30 z-0 animate-floral delay-1">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-5xl mx-auto w-full text-center relative z-10 mt-[-5%] md:mt-0">
                    <h2
                        class="font-accent text-xl md:text-3xl mb-8 md:mb-16 tracking-[0.3em] text-[var(--gold-primary)] uppercase">
                        The Holy Union
                    </h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-5 md:gap-10">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-10 flex flex-col items-center group transition-all bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl shadow-xl">

                                {{-- Icon Calendar --}}
                                <div
                                    class="w-10 h-10 md:w-12 md:h-12 rounded-full border border-[var(--gold-primary)]/30 flex items-center justify-center mb-4">
                                    <i data-lucide="calendar"
                                        class="w-4 h-4 md:w-5 md:h-5 text-[var(--gold-primary)]"></i>
                                </div>

                                <h3
                                    class="font-serif-luxury text-lg md:text-2xl font-bold text-white mb-4 uppercase tracking-[0.15em]">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-4 md:space-y-6 mb-6 md:mb-10 text-stone-300">
                                    {{-- Tanggal & Waktu --}}
                                    <div class="border-b border-white/10 pb-3">
                                        <p
                                            class="text-[8px] md:text-[10px] font-bold text-[var(--gold-primary)] uppercase tracking-[0.2em] mb-1">
                                            When</p>
                                        <p class="text-white text-sm md:text-base font-medium">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                        </p>
                                        <p class="text-[11px] md:text-sm text-stone-400">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                            {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') . ' WIB' : 'Finish' }}
                                        </p>
                                    </div>

                                    {{-- Lokasi --}}
                                    <div>
                                        <p
                                            class="text-[8px] md:text-[10px] font-bold text-[var(--gold-primary)] uppercase tracking-[0.2em] mb-1">
                                            Where</p>
                                        <p class="text-white font-bold mb-1 text-sm md:text-base">
                                            {{ $event->location_name }}
                                        </p>
                                        <p
                                            class="text-[10px] md:text-xs leading-relaxed max-w-[200px] mx-auto italic text-stone-400">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="inline-block border border-[var(--gold-primary)] text-[var(--gold-primary)] px-6 py-2.5 text-[9px] w-full rounded-full hover:bg-[var(--gold-primary)] hover:text-black transition-all font-bold uppercase tracking-widest">
                                        View Map Location
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Minimalist Luxury (Responsive Optimized) --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-6 py-20 relative overflow-hidden bg-[#020617]">
                    {{-- Header: Dibuat lebih slim --}}
                    <div class="max-w-4xl mx-auto text-center mb-16 md:mb-24">
                        <h2 class="font-accent text-2xl md:text-3xl mb-2 tracking-[0.5em] text-[var(--gold-primary)] uppercase"
                            data-aos="fade-down">
                            Our Journey
                        </h2>
                        <div class="w-12 h-[1px] bg-[var(--gold-primary)] mx-auto opacity-50"></div>
                    </div>
                    <div class="max-w-5xl mx-auto relative">
                        {{-- Garis Tengah Tipis (Hanya Desktop) --}}
                        <div
                            class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-[0.5px] bg-[var(--gold-primary)]/20">
                        </div>
                        <div class="space-y-12 md:space-y-24">
                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex flex-col md:flex-row items-center gap-8 md:gap-0 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">
                                    {{-- Dot Progress --}}
                                    <div
                                        class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center justify-center w-4 h-4 rounded-full bg-[#020617] border border-[var(--gold-primary)] z-10">
                                        <div class="w-1.5 h-1.5 bg-[var(--gold-primary)] rounded-full animate-pulse">
                                        </div>
                                    </div>
                                    {{-- Content Side --}}
                                    <div class="w-full md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-16' : 'md:pl-16' }}"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                        <div
                                            class="space-y-4 text-center {{ $index % 2 == 0 ? 'md:text-right' : 'md:text-left' }}">
                                            <span
                                                class="text-[var(--gold-primary)] font-accent text-[10px] tracking-[0.3em] uppercase opacity-80">
                                                {{ $story->date }}
                                            </span>
                                            <h4
                                                class="font-serif-luxury text-xl md:text-2xl text-white uppercase tracking-wider">
                                                {{ $story->title }}
                                            </h4>
                                            <p class="text-stone-400 text-sm leading-relaxed font-light italic">
                                                "{{ $story->description }}"
                                            </p>
                                        </div>
                                    </div>
                                    {{-- Image Side --}}
                                    <div class="w-full md:w-1/2 {{ $index % 2 == 0 ? 'md:pl-16' : 'md:pr-16' }}"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                                        <div
                                            class="relative group overflow-hidden rounded-sm border border-white/10 p-1 bg-white/5">
                                            <div class="relative aspect-[16/9] overflow-hidden">
                                                <img src="{{ asset('storage/' . $story->image) }}"
                                                    alt="{{ $story->title }}"
                                                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                            </div>
                                            {{-- Border Accent --}}
                                            <div
                                                class="absolute inset-0 border border-[var(--gold-primary)]/20 pointer-events-none group-hover:border-[var(--gold-primary)]/50 transition-colors">
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
                <section
                    class="snap-section px-4 py-6 relative overflow-hidden flex flex-col justify-center min-h-screen">
                    {{-- Ornaments --}}
                    <div class="absolute top-0 left-0 w-24 h-24 text-[var(--gold-soft)] opacity-20 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>

                    <div class="w-full text-center relative z-10">
                        <h2
                            class="font-accent text-xl md:text-3xl mb-1 tracking-[0.3em] text-[var(--gold-primary)] uppercase">
                            Our Moments</h2>
                        <p class="text-[8px] md:text-[10px] text-stone-500 mb-6 md:mb-10 tracking-[0.4em] uppercase">
                            Captured Memories</p>

                        <div class="w-full max-w-5xl mx-auto">
                            {{-- Swiper dengan class gallery-swiper --}}
                            <div class="swiper gallery-swiper pb-12">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div
                                            class="swiper-slide flex items-center justify-center opacity-40 transition-opacity duration-500 [.swiper-slide-active]:opacity-100">
                                            <div class="relative group mx-auto">
                                                <div
                                                    class="absolute -inset-1 bg-gradient-to-b from-[var(--gold-soft)] to-transparent opacity-20 rounded-2xl blur">
                                                </div>
                                                <div
                                                    class="relative bg-stone-900/40 backdrop-blur-sm rounded-xl overflow-hidden border border-white/10 p-1 shadow-2xl">

                                                    {{-- Tambahkan pembungkus anchor ini --}}
                                                    <a href="{{ asset('storage/' . $photo->url) }}"
                                                        data-fancybox="gallery" data-caption="Our Precious Moment">
                                                        <img src="{{ asset('storage/' . $photo->url) }}"
                                                            class="w-full h-auto max-h-[55vh] md:max-h-[65vh] object-contain rounded-lg cursor-zoom-in"
                                                            alt="Gallery">
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- Navigasi --}}
                                <div class="swiper-pagination !bottom-2"></div>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-center gap-2 text-stone-500 animate-pulse">
                            <span class="w-8 h-[1px] bg-stone-700"></span>
                            <p class="text-[9px] uppercase tracking-widest">Swipe to Explore</p>
                            <span class="w-8 h-[1px] bg-stone-700"></span>
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gift)
                <section class="snap-section px-6">
                    <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div
                        class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-1">
                        <svg class="w-full h-full" style="transform: scaleX(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-2">
                        <svg class="w-full h-full" style="transform: scaleY(-1);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-3">
                        <svg class="w-full h-full" style="transform: rotate(180deg);">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="max-w-2xl mx-auto w-full text-center">
                        <div class="mb-12">
                            <h2 class="font-accent text-3xl mb-4 tracking-widest text-[var(--gold-primary)] uppercase">
                                Love Gift</h2>
                            <p class="text-stone-500 text-xs italic max-w-xs mx-auto">
                                Your presence is the greatest gift. If you wish to send a token of love, you may do so
                                through:
                            </p>
                        </div>
                        <div class="grid md:grid-cols-{{ $invitation->bank_name_2 ? '2' : '1' }} gap-8">
                            <div class="luxury-card p-8 border-t-2 border-t-[var(--gold-primary)]">
                                <p
                                    class="text-[10px] font-bold text-[var(--gold-primary)] uppercase tracking-widest mb-6">
                                    {{ $invitation->bank_name_1 }}</p>
                                <h3 class="text-2xl font-accent text-white mb-2 tracking-widest">
                                    {{ $invitation->bank_account_1 }}</h3>
                                <p class="text-[10px] text-stone-500 mb-8 uppercase italic">a.n
                                    {{ $invitation->bank_owner_1 }}</p>
                                <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                    class="btn-gold px-6 py-2 text-[9px] w-full">Copy Number</button>
                            </div>
                            @if ($invitation->bank_name_2)
                                <div class="luxury-card p-8 border-t-2 border-t-[var(--gold-primary)]">
                                    <p
                                        class="text-[10px] font-bold text-[var(--gold-primary)] uppercase tracking-widest mb-6">
                                        {{ $invitation->bank_name_2 }}</p>
                                    <h3 class="text-2xl font-accent text-white mb-2 tracking-widest">
                                        {{ $invitation->bank_account_2 }}</h3>
                                    <p class="text-[10px] text-stone-500 mb-8 uppercase italic">a.n
                                        {{ $invitation->bank_owner_2 }}</p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                        class="btn-gold px-6 py-2 text-[9px] w-full">Copy Number</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section
                class="snap-section px-4 pt-16 pb-8 md:px-6 relative flex items-start justify-center min-h-screen md:items-center">
                {{-- Background Ornaments --}}
                <div class="absolute top-0 right-0 w-24 h-24 text-[var(--gold-soft)] opacity-20 z-0"><svg
                        class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg></div>

                <div class="max-w-xl mx-auto w-full relative z-10">
                    <h2
                        class="font-accent text-xl md:text-2xl text-center mb-6 tracking-widest text-[var(--gold-primary)] uppercase">
                        R.S.V.P</h2>

                    <form id="comment-form"
                        class="luxury-card p-5 md:p-10 mb-6 bg-black/20 backdrop-blur-md border-t border-white/10">
                        @csrf
                        <div class="space-y-4">
                            <div class="text-center">
                                <p class="text-[8px] font-bold text-stone-500 uppercase tracking-[0.2em] mb-1">Guest
                                    Name</p>
                                <p class="text-lg font-serif-luxury text-white tracking-wide">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-white/10 block text-center py-2.5 text-[9px] font-bold uppercase rounded-lg cursor-pointer transition-all text-stone-500 hover:bg-white/5">Attending</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-white/10 block text-center py-2.5 text-[9px] font-bold uppercase rounded-lg cursor-pointer transition-all text-stone-500 hover:bg-white/5">Absent</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Your wishes..."
                                class="w-full p-3 text-xs bg-black/40 border border-white/10 rounded-lg focus:border-[var(--gold-primary)] outline-none text-white transition-all italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-gold w-full py-3 text-[10px] tracking-widest font-bold">SEND WISHES</button>
                        </div>
                    </form>

                    {{-- List Komentar Dikecilkan --}}
                    <div id="comment-list" class="space-y-3 max-h-[30vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/5 p-4 rounded-xl border border-white/5 shadow-sm">
                                <div class="flex justify-between items-center mb-1.5">
                                    <h4
                                        class="font-bold text-[10px] text-[var(--gold-primary)] uppercase tracking-tight">
                                        {{ $comment->name }}</h4>
                                    <span
                                        class="text-[7px] text-stone-500 font-bold uppercase bg-white/5 px-2 py-0.5 rounded">{{ $comment->presence }}</span>
                                </div>
                                <p class="text-stone-300 text-[11px] italic leading-relaxed">"{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div
                                        class="mt-3 ml-3 p-3 bg-white/5 rounded-lg border-l border-[var(--gold-primary)]/50">
                                        <p class="text-[9px] font-bold text-[var(--gold-primary)] uppercase mb-1">
                                            Reply:</p>
                                        <p class="text-stone-400 text-[10px] leading-snug">{{ $comment->reply }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">
                <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-1">
                    <svg class="w-full h-full" style="transform: scaleX(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-2">
                    <svg class="w-full h-full" style="transform: scaleY(-1);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-3">
                    <svg class="w-full h-full" style="transform: rotate(180deg);">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="max-w-md mx-auto px-10">
                    <h3 class="font-script text-5xl text-[var(--gold-primary)] mb-10">Thank You</h3>
                    <p class="font-serif-luxury italic text-stone-400 text-sm leading-relaxed mb-24">
                        It is a profound honor for us to share this milestone with you. Thank you for your presence and
                        prayers.
                    </p>
                    <div class="space-y-4 opacity-40">
                        <div class="gold-divider mx-auto w-24"></div>
                        <p class="text-[8px] tracking-[0.5em] uppercase font-bold text-stone-500">Exclusively Designed
                            by RQ Pedia Digital</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // 1. Inisialisasi AOS & Lucide
        AOS.init({
            duration: 1200,
            once: true
        });
        lucide.createIcons();

        // 2. Inisialisasi Semua Swiper dalam satu blok DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {

            // Swiper untuk Header/Hero (Slider biasa)
            const mainSwiper = new Swiper('.mySwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false
                }
            });
            Fancybox.bind("[data-fancybox='gallery']", {
                dragToClose: true,
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [],
                        right: ["zoom", "close"],
                    },
                },
                Images: {
                    Panzoom: {
                        maxScale: 2,
                    },
                },
            });

            // Swiper untuk Galeri (Coverflow)
            const gallerySwiper = new Swiper(".gallery-swiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                loop: true,
                speed: 1000,
                coverflowEffect: {
                    rotate: 20,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: false,
                },
                pagination: {
                    el: ".swiper-pagination", // Pastikan class ini ada di dalam div galeri
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });

        // 3. Kontrol Musik & Undangan
        let isPlaying = false;
        const music = document.getElementById('bg-music');
        const musicControl = document.getElementById('music-control');
        const musicIcon = document.getElementById('music-icon');

        function openInvitation() {
            // Fullscreen Logic
            const elem = document.documentElement;
            if (elem.requestFullscreen) elem.requestFullscreen();
            else if (elem.webkitRequestFullscreen) elem.webkitRequestFullscreen();
            else if (elem.msRequestFullscreen) elem.msRequestFullscreen();

            // Animasi Cover
            const cover = document.getElementById('wedding-cover');
            cover.style.transform = 'translateY(-100%)';

            setTimeout(() => {
                cover.style.display = 'none';
                document.getElementById('main-content').classList.remove('hidden');

                if (music) {
                    music.play().catch(e => console.log("Autoplay dicegah browser"));
                    musicControl.classList.remove('hidden');
                    isPlaying = true;
                }

                AOS.refresh();
                const ornaments = document.getElementById('global-ornaments');
                if (ornaments) ornaments.classList.remove('hidden');
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

        // 4. Utilitas (Copy & Countdown)
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const oldText = btn.innerText;
                btn.innerText = "COPIED!";
                setTimeout(() => btn.innerText = oldText, 2000);
            });
        }

        const targetDate = new Date("{{ $data['date'] }}").getTime();
        setInterval(() => {
            const now = new Date().getTime();
            const diff = targetDate - now;
            if (diff > 0) {
                document.getElementById('days').innerText = Math.floor(diff / (1000 * 60 * 60 * 24)).toString()
                    .padStart(2, '0');
                document.getElementById('hours').innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 *
                    60 * 60)).toString().padStart(2, '0');
                document.getElementById('minutes').innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
                    .toString().padStart(2, '0');
            }
        }, 1000);

        // 5. RSVP Form Handler
        const commentForm = document.getElementById('comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const btnSubmit = document.getElementById('c_submit');
                const name = document.getElementById('c_name').value;
                const message = document.getElementById('c_message').value;
                const presence = document.querySelector('input[name="presence"]:checked').value;
                const token = document.querySelector('input[name="_token"]').value;

                btnSubmit.innerText = "SENDING WISHES...";
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
                    .then(res => res.json())
                    .then(data => {
                        const list = document.getElementById('comment-list');
                        const html = `
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5 mb-3 shadow-sm">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="font-bold text-[10px] text-[var(--gold-primary)] uppercase">${name}</h4>
                            <span class="text-[7px] bg-white/10 px-2 py-1 rounded-full text-stone-400 uppercase">${presence}</span>
                        </div>
                        <p class="text-stone-300 text-[11px] italic">"${message}"</p>
                    </div>`;
                        list.insertAdjacentHTML('afterbegin', html);
                        document.getElementById('c_message').value = "";
                        alert("Thank you for your wishes!");
                    })
                    .catch(err => alert("Failed to send message."))
                    .finally(() => {
                        btnSubmit.innerText = "SEND WEDDING WISHES";
                        btnSubmit.disabled = false;
                    });
            });
        }
    </script>
</body>

</html>
