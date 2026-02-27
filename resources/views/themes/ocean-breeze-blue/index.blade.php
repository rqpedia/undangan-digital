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
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&family=Great+Vibes&family=Montserrat:wght@300;500&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --ocean-deep: #0f172a;
            --ocean-blue: #0ea5e9;
            --ocean-cyan: #22d3ee;
            --sand-light: #f8fafc;
            --text-muted: #94a3b8;
            --card-glass: rgba(30, 41, 59, 0.7);
        }

        .font-serif-elegant {
            font-family: 'Playfair Display', serif;
        }

        .font-sans-light {
            font-family: 'Poppins', sans-serif;
        }

        .font-script {
            font-family: 'Great Vibes', cursive;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--ocean-deep);
            overflow: hidden;
            color: var(--sand-light);
        }

        .snap-container {
            height: 100vh;
            width: 100%;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            position: relative;
            z-index: 10;
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
            background-color: transparent;
        }

        .texture-bg {
            position: fixed;
            inset: 0;
            opacity: 0.1;
            pointer-events: none;
            z-index: 1;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
        }

        .svg-ocean {
            fill: var(--ocean-blue);
            filter: drop-shadow(0 0 8px rgba(34, 211, 238, 0.4));
        }

        .ocean-corner {
            position: absolute;
            width: 150px;
            opacity: 0.4;
            z-index: 10;
            pointer-events: none;
        }

        .luxury-card {
            background: var(--card-glass);
            border: 1px solid rgba(34, 211, 238, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .btn-ocean {
            background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-cyan));
            color: white;
            font-weight: 700;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.4);
            letter-spacing: 0.1em;
        }

        .presence-input:checked+label {
            background: var(--ocean-blue);
            color: white;
            border-color: var(--ocean-blue);
        }

        .hero-bg {
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.85)),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .swiper-slide img {
            border: 2px solid var(--ocean-blue) !important;
            border-radius: 10px;
        }

        #tsparticles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 2;
            pointer-events: none;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin 6s linear infinite;
        }

        .rotating-border {
            position: absolute;
            inset: -4px;
            /* Jarak bingkai dari foto */
            border-radius: 50%;
            background: conic-gradient(from 0deg, transparent, #06b6d4, transparent 40%);
            -webkit-mask: radial-gradient(farthest-side, transparent calc(100% - 3px), black calc(100% - 2px));
            mask: radial-gradient(farthest-side, transparent calc(100% - 3px), black calc(100% - 2px));
        }

        #global-ornaments {
            /* Memastikan filter drop-shadow bekerja pada SVG use */
            filter: drop-shadow(0 0 10px rgba(6, 182, 212, 0.5));
        }

        /* Animasi Fade-In Khusus */
        .opacity-100 {
            opacity: 1 !important;
        }

        /* Opsional: Tambahkan sedikit animasi 'glitch' pelan pada ornamen */
        #global-ornaments svg {
            animation: cyber-pulse 4s infinite alternate;
        }

        .ornaments-hidden {
            opacity: 0 !important;
            transform: scale(1.1);
            /* Sedikit efek zoom out saat hilang */
        }

        @keyframes cyber-pulse {
            0% {
                opacity: 0.3;
                filter: brightness(1);
            }

            100% {
                opacity: 0.6;
                filter: brightness(1.5) drop-shadow(0 0 15px rgba(6, 182, 212, 0.8));
            }
        }

        @keyframes cyberGlow {
            0% {
                filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.6)) drop-shadow(0 0 2px rgba(6, 182, 212, 0.4));
                opacity: 0.8;
                transform: scale(1);
            }

            100% {
                /* Efek berpendar lebih kuat */
                filter: drop-shadow(0 0 18px rgba(6, 182, 212, 1)) drop-shadow(0 0 6px rgba(6, 182, 212, 0.8));
                opacity: 1;
                /* Sedikit membesar seperti detak jantung */
                transform: scale(1.05);
            }
        }

        /* Animasi Pulsasi Pelan untuk Blur Background */
        @keyframes pulseSlow {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
        }

        .animate-cyber-glow {
            /* Menjalankan animasi selama 2 detik, halus, dan terus menerus */
            animation: cyberGlow 2s ease-in-out infinite alternate;
        }

        .animate-pulse-slow {
            animation: pulseSlow 4s ease-in-out infinite;
        }
    </style>
</head>

<body class="font-sans-light">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="corner-cyber" viewBox="0 0 100 100">
            <path d="M2 90 V2 H90" fill="none" stroke="currentColor" stroke-width="0.5" stroke-dasharray="2 4"
                opacity="0.5" />
            <path d="M2 20 V2 H20" fill="none" stroke="currentColor" stroke-width="1.5" />
            <rect x="30" y="1" width="15" height="2" fill="currentColor" />
            <rect x="1" y="30" width="2" height="15" fill="currentColor" />
            <rect x="5" y="5" width="4" height="4" fill="currentColor" transform="rotate(45 7 7)" />
            <circle cx="95" cy="2" r="1.5" fill="currentColor" />
            <circle cx="2" cy="95" r="1.5" fill="currentColor" />
        </symbol>
    </svg>
    <div id="global-ornaments"
        class="fixed inset-0 pointer-events-none z-[9999] overflow-hidden opacity-0 transition-opacity duration-1000">
        <div class="absolute top-0 left-0 w-40 h-40 md:w-64 md:h-64 text-cyan-500/30 z-0"
            style="filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.4));">
            <svg class="w-full h-full">
                <use href="#corner-cyber" />
            </svg>
        </div>
        <div class="absolute top-0 right-0 w-40 h-40 md:w-64 md:h-64 text-cyan-500/30 z-0"
            style="transform: scaleX(-1); filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.4));">
            <svg class="w-full h-full">
                <use href="#corner-cyber" />
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 w-40 h-40 md:w-64 md:h-64 text-cyan-500/30 z-0"
            style="transform: scaleY(-1); filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.4));">
            <svg class="w-full h-full">
                <use href="#corner-cyber" />
            </svg>
        </div>
        <div class="absolute bottom-0 right-0 w-40 h-40 md:w-64 md:h-64 text-cyan-500/30 z-0"
            style="transform: rotate(180deg); filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.4));">
            <svg class="w-full h-full">
                <use href="#corner-cyber" />
            </svg>
        </div>
    </div>
    <div class="texture-bg"></div>
    <div id="tsparticles"></div>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#0c1220] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-[#0c1220]/80 backdrop-blur-[1px]"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#0c1220] via-transparent to-[#0c1220]/50"></div>
            </div>
        @endif
        <div class="text-center px-4 z-20" data-aos="fade-up">
            <div
                class="mb-2 md:mb-4 tracking-[0.3em] md:tracking-[0.4em] text-[10px] md:text-xs uppercase text-cyan-400 font-bold">
                The Wedding of
            </div>
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-4xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-xl md:text-2xl my-1 md:my-2 text-cyan-500 italic">&</span>
                <h1 class="font-script text-4xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="mb-6 md:mb-10">
                <p class="font-serif-elegant italic text-slate-300 text-sm md:text-lg mb-1 md:mb-2">Dear Valued Guest:
                </p>
                <h2 class="text-xl md:text-3xl font-bold text-white tracking-tight mb-3 md:mb-4 drop-shadow-md">
                    {{ $guestName }}
                </h2>
                <div class="w-12 md:w-16 h-[1px] md:h-[2px] bg-cyan-500 mx-auto"></div>
            </div>
            <button onclick="openInvitation()"
                class="btn-ocean uppercase tracking-widest text-[9px] md:text-[10px] px-6 py-3 md:px-8 md:py-4 shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                Open Invitation
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-slate-900/80 text-cyan-400 p-3 rounded-full shadow-lg cursor-pointer hidden border border-cyan-400/30 backdrop-blur-sm">
        <span id="music-icon-container">
            <i data-lucide="music" class="w-5 h-5"></i>
        </span>
    </div>
    @if ($invitation->music_file)
        <audio id="bg-music" loop>
            <source src="{{ asset('storage/' . $invitation->music_file) }}" type="audio/mpeg">
        </audio>
    @endif
    <div id="main-content" class="hidden">
        <div class="snap-container scrollbar-hide">
            @php
                $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
            @endphp
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-[#0c1220]">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-[#0c1220]"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0c1220]/60 via-transparent to-[#0c1220]">
                    </div>
                    <div class="absolute inset-0 bg-cyan-950/20 backdrop-blur-[1px]"></div>
                </div>
                <div data-aos="fade-up" class="text-center z-10 relative px-4">
                    <div
                        class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[9px] md:text-[10px] uppercase text-cyan-400 font-bold drop-shadow-md">
                        Deep Sea Love Celebration
                    </div>
                    <div class="flex flex-col items-center mb-6 md:mb-8">
                        <h2 class="font-script text-5xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <span
                            class="font-serif-elegant text-xl md:text-3xl text-cyan-500 italic my-1 md:my-2 drop-shadow-md">&</span>
                        <h2 class="font-script text-5xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-elegant text-lg md:text-2xl text-white mb-8 md:mb-10 tracking-widest drop-shadow-md">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}
                    </p>
                    <div
                        class="flex justify-center gap-4 md:gap-8 bg-slate-900/60 backdrop-blur-lg p-4 md:p-6 rounded-2xl border border-cyan-400/30 shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                        <div class="flex flex-col items-center">
                            <span id="days"
                                class="text-2xl md:text-3xl font-serif-elegant text-cyan-400">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-tighter text-slate-300 font-bold">Days</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span id="hours"
                                class="text-2xl md:text-3xl font-serif-elegant text-cyan-400">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-tighter text-slate-300 font-bold">Hours</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span id="minutes"
                                class="text-2xl md:text-3xl font-serif-elegant text-cyan-400">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-tighter text-slate-300 font-bold">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-12 md:px-6">
                <div class="max-w-4xl mx-auto w-full text-center" data-aos="fade-up">
                    <div
                        class="italic text-slate-400 text-xs md:text-base leading-relaxed font-serif-elegant mb-10 md:mb-16 px-2">
                        "And among His signs is that He created for you from yourselves mates..."
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-56 md:h-56 mb-4 md:mb-6 group">
                                <div class="rotating-border animate-spin-slow"></div>
                                <div
                                    class="absolute inset-0 rounded-full border-2 border-cyan-500 p-2 overflow-hidden">
                                    <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : '...' }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-white mb-1">{{ $invitation->groom_name }}
                            </h3>
                            <p class="font-serif-elegant italic text-cyan-500 text-xs md:text-sm">
                                {{ $invitation->groom_info }}</p>
                        </div>
                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-56 md:h-56 mb-4 md:mb-6 group">
                                <div class="rotating-border animate-spin-slow" style="animation-delay: -3s;"></div>
                                <div
                                    class="absolute inset-0 rounded-full border-2 border-cyan-500 p-2 overflow-hidden">
                                    <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : '...' }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-white mb-1">{{ $invitation->bride_name }}
                            </h3>
                            <p class="font-serif-elegant italic text-cyan-500 text-xs md:text-sm">
                                {{ $invitation->bride_info }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-12 md:px-6 relative">
                <div class="max-w-5xl mx-auto w-full text-center">
                    <h2 class="font-serif-elegant text-2xl md:text-4xl mb-8 md:mb-12 text-white">Event Schedule</h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 md:gap-8">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-10 flex flex-col items-center border-b-4 border-cyan-500 relative overflow-hidden group">

                                <div class="absolute top-4 right-4 z-20">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-0 bg-cyan-500/10 rounded-full blur-lg animate-pulse-slow">
                                        </div>

                                        <i data-lucide="heart"
                                            class="relative w-5 h-5 md:w-6 md:h-6 text-cyan-400 animate-cyber-glow"
                                            style="filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.8)); fill: rgba(6, 182, 212, 0.1);">
                                        </i>
                                    </div>
                                </div>

                                <h3
                                    class="font-serif-elegant text-xl md:text-2xl font-bold text-cyan-400 mb-4 md:mb-6 uppercase tracking-wider">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-3 mb-6">
                                    <div class="flex flex-col items-center gap-0">
                                        <span
                                            class="text-[8px] uppercase font-bold text-slate-500 tracking-[0.2em]">Date</span>
                                        <p class="text-white text-sm md:text-base">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                        </p>
                                    </div>

                                    <div class="flex flex-col items-center gap-0">
                                        <span
                                            class="text-[8px] uppercase font-bold text-slate-500 tracking-[0.2em]">Time</span>
                                        <p class="text-white text-sm md:text-base">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                            {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') . ' WIB' : 'Selesai' }}
                                        </p>
                                    </div>

                                    <div class="pt-2">
                                        <p
                                            class="font-bold text-cyan-400 uppercase text-[10px] md:text-xs tracking-widest mb-1">
                                            {{ $event->location_name }}
                                        </p>
                                        <p class="text-[11px] md:text-[12px] text-slate-400 leading-tight">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-ocean !py-2 md:!py-3 text-[9px] md:text-[10px] w-full text-center relative z-10">
                                        View Location
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-12 md:py-24 relative overflow-hidden bg-[#020617]">
                    <div class="absolute inset-0 opacity-10"
                        style="background-image: radial-gradient(#06b6d4 0.5px, transparent 0.5px); background-size: 20px 20px;">
                    </div>
                    <div
                        class="absolute top-1/4 -left-20 w-60 h-60 md:w-80 md:h-80 bg-cyan-500/10 rounded-full blur-[100px] md:blur-[120px]">
                    </div>
                    <div
                        class="absolute bottom-1/4 -right-20 w-60 h-60 md:w-80 md:h-80 bg-blue-500/10 rounded-full blur-[100px] md:blur-[120px]">
                    </div>

                    <div class="max-w-6xl mx-auto relative z-10">
                        <div class="text-center mb-12 md:mb-24">
                            <span
                                class="text-cyan-400 font-black text-[8px] md:text-[10px] tracking-[0.4em] md:tracking-[0.5em] uppercase mb-2 md:mb-4 block">
                                Archive: Our Memories
                            </span>
                            <h2 class="font-serif-elegant text-3xl md:text-7xl text-white mb-4 drop-shadow-2xl">
                                Our <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Journey</span>
                            </h2>
                            <div
                                class="w-16 md:w-24 h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent mx-auto">
                            </div>
                        </div>

                        <div class="relative">
                            <div
                                class="absolute left-4 md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-cyan-500/50 to-transparent">
                            </div>

                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group mb-12 md:mb-32">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-14 md:h-14 rounded-full border border-cyan-500 bg-slate-950 text-cyan-400 absolute left-0 md:left-1/2 md:-translate-x-1/2 z-20 shadow-[0_0_15px_rgba(6,182,212,0.4)] transition-transform duration-500 group-hover:scale-110">
                                        <span
                                            class="text-[10px] md:text-sm font-black tracking-tighter">{{ sprintf('%02d', $index + 1) }}</span>
                                    </div>

                                    <div class="w-[calc(100%-2.5rem)] md:w-[calc(50%-4rem)] ml-auto md:ml-0">
                                        <div class="relative group">
                                            <div
                                                class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-[1.5rem] md:rounded-[2.5rem] opacity-10 group-hover:opacity-100 transition duration-1000 blur">
                                            </div>

                                            <div
                                                class="relative bg-slate-900/80 backdrop-blur-xl p-5 md:p-10 rounded-[1.5rem] md:rounded-[2.5rem] border border-white/10 flex flex-col gap-4 md:gap-6 overflow-hidden">

                                                <div class="absolute top-4 right-5 md:top-6 md:right-8 z-10">
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-0 bg-cyan-500/10 rounded-full blur-lg animate-pulse-slow">
                                                        </div>
                                                        <i data-lucide="heart"
                                                            class="relative w-5 h-5 md:w-6 md:h-6 text-cyan-400 animate-cyber-glow"
                                                            style="filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.8)); fill: rgba(6, 182, 212, 0.1);">
                                                        </i>
                                                    </div>
                                                </div>

                                                <div class="inline-flex items-center gap-2">
                                                    <div class="h-[1px] w-4 bg-cyan-500"></div>
                                                    <span
                                                        class="text-cyan-400 font-black text-sm md:text-lg tracking-tighter">{{ $story->date }}</span>
                                                </div>

                                                <h4
                                                    class="font-serif-elegant text-xl md:text-4xl text-white group-hover:text-cyan-300 transition-colors duration-500 leading-tight pr-8 md:pr-10">
                                                    {{ $story->title }}
                                                </h4>

                                                {{-- Cek Gambar Story --}}
                                                @if ($story->image)
                                                    <div
                                                        class="relative rounded-xl md:rounded-3xl overflow-hidden bg-black/20 shadow-2xl border border-white/5">
                                                        <img src="{{ asset('storage/' . $story->image) }}"
                                                            class="w-full h-auto max-h-[300px] md:max-h-none object-contain transition-transform duration-[1.5s] group-hover:scale-105">
                                                    </div>
                                                @endif

                                                <div class="relative">
                                                    <p
                                                        class="relative text-slate-300 text-xs md:text-base leading-relaxed font-light tracking-wide text-justify md:text-left">
                                                        <span
                                                            class="first-letter:text-2xl md:first-letter:text-3xl first-letter:font-serif-elegant first-letter:text-cyan-400 first-letter:mr-1 first-letter:float-left">
                                                            {{ $story->description }}
                                                        </span>
                                                    </p>
                                                </div>

                                                <div class="mt-2 flex items-center gap-2">
                                                    <div
                                                        class="h-[1px] w-8 bg-gradient-to-r from-cyan-500 to-transparent">
                                                    </div>
                                                    <div class="flex gap-1">
                                                        <div class="w-1 h-1 bg-cyan-500/50 rounded-full"></div>
                                                        <div class="w-1 h-1 bg-cyan-500/20 rounded-full"></div>
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
                <section class="snap-section px-4">
                    <div class="w-full text-center">

                        <div class="flex justify-center mb-4">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-cyan-500/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <i data-lucide="heart"
                                    class="relative w-8 h-8 md:w-10 md:h-10 text-cyan-400 mx-auto animate-cyber-glow"
                                    style="filter: drop-shadow(0 0 15px rgba(6, 182, 212, 0.9)) drop-shadow(0 0 5px rgba(6, 182, 212, 0.7)); fill: rgba(6, 182, 212, 0.1);">
                                </i>
                            </div>
                        </div>

                        <h2 class="font-serif-elegant text-4xl mb-2 text-white">Our Moments</h2>
                        <p class="text-xs text-cyan-500 mb-10 tracking-[0.3em] uppercase">Captured Memories</p>

                        <div class="mx-auto w-full md:max-w-4xl">
                            <div class="swiper mySwiper !pb-12">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide px-2">
                                            <div
                                                class="relative rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                                                <img src="{{ asset('storage/' . $photo->url) }}"
                                                    class="w-full h-auto mx-auto object-cover" alt="Gallery Photo"
                                                    loading="lazy">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent">
                                                </div>
                                            </div>
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
                    <div class="max-w-md mx-auto w-full text-center">
                        <div data-aos="fade-up">
                            <h2 class="font-serif-elegant text-4xl mb-2 text-white">Wedding Gift</h2>
                            <p class="text-xs text-cyan-500 mb-4 tracking-[0.3em] uppercase">Tanda Kasih</p>

                            <div class="flex justify-center mb-10">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-cyan-500/20 blur-md rounded-full animate-pulse">
                                    </div>
                                    <i data-lucide="heart" class="relative w-6 h-6 text-cyan-400 opacity-80"></i>
                                </div>
                            </div>

                            <p class="font-serif-elegant italic text-slate-400 text-sm leading-relaxed mb-8 px-4">
                                "Your presence is enough, but if you wish to send a token of love, you may do so here:"
                            </p>
                        </div>
                        <div class="luxury-card p-10 relative overflow-hidden group" data-aos="zoom-in">
                            <div
                                class="absolute -right-6 -bottom-6 opacity-5 group-hover:rotate-12 transition-transform duration-500">
                                <i data-lucide="heart"
                                    class="relative w-8 h-8 md:w-10 md:h-10 text-cyan-400 mx-auto animate-cyber-glow"
                                    style="filter: drop-shadow(0 0 15px rgba(6, 182, 212, 0.9)) drop-shadow(0 0 5px rgba(6, 182, 212, 0.7)); fill: rgba(6, 182, 212, 0.1);">
                                </i>
                            </div>
                            <div class="space-y-10 relative z-10">
                                <div class="{{ $invitation->bank_name_2 ? 'border-b border-white/10 pb-10' : '' }}">
                                    <div
                                        class="inline-block bg-cyan-500/10 px-4 py-1 rounded-full border border-cyan-500/20 mb-4">
                                        <span class="text-cyan-400 font-bold tracking-widest text-[10px] uppercase">
                                            {{ $invitation->bank_name_1 }}
                                        </span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2 tracking-widest">
                                        {{ $invitation->bank_account_1 }}
                                    </h3>
                                    <p class="text-xs text-slate-400 mb-6 italic">
                                        a.n {{ $invitation->bank_owner_1 }}
                                    </p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                        class="btn-ocean !py-2 !px-8 !text-[9px] uppercase tracking-widest">
                                        Copy Number
                                    </button>
                                </div>
                                @if ($invitation->bank_name_2)
                                    <div>
                                        <div
                                            class="inline-block bg-cyan-500/10 px-4 py-1 rounded-full border border-cyan-500/20 mb-4">
                                            <span
                                                class="text-cyan-400 font-bold tracking-widest text-[10px] uppercase">
                                                {{ $invitation->bank_name_2 }}
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-white mb-2 tracking-widest">
                                            {{ $invitation->bank_account_2 }}
                                        </h3>
                                        <p class="text-xs text-slate-400 mb-6 italic">
                                            a.n {{ $invitation->bank_owner_2 }}
                                        </p>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                            class="btn-ocean !py-2 !px-8 !text-[9px] uppercase tracking-widest">
                                            Copy Number
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-8 md:px-6 md:py-16">
                <div class="max-w-2xl mx-auto w-full">
                    <div class="flex items-center justify-center gap-4 mb-8">
                        <h2 class="font-serif-elegant text-2xl md:text-4xl text-white">R.S.V.P</h2>
                        <div class="h-[1px] w-8 bg-gradient-to-r from-cyan-500 to-transparent hidden md:block"></div>
                        <i data-lucide="heart" class="w-6 h-6 md:w-8 md:h-8 text-cyan-400/50 animate-bounce-slow"></i>
                    </div>

                    <form id="comment-form" class="luxury-card p-5 md:p-8 mb-6">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            <div class="text-center pb-3 border-b border-white/10">
                                <p
                                    class="text-[8px] md:text-[9px] font-bold text-cyan-500 uppercase tracking-widest mb-1">
                                    Nama Tamu Undangan</p>
                                <p class="text-lg md:text-xl font-serif-elegant text-white">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-white/20 block text-center py-2.5 text-[9px] md:text-[10px] font-bold uppercase rounded-lg cursor-pointer transition-all text-slate-400">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-white/20 block text-center py-2.5 text-[9px] md:text-[10px] font-bold uppercase rounded-lg cursor-pointer transition-all text-slate-400">Berhalangan</label>
                                </div>
                            </div>
                            <textarea id="c_message" rows="3" placeholder="kirim ucapan untuk kedua mempelai ....."
                                class="w-full p-3 text-xs md:text-sm bg-slate-950/50 border border-white/10 rounded-lg focus:border-cyan-400 outline-none text-white transition-all"
                                required></textarea>
                            <button type="submit" id="c_submit"
                                class="btn-ocean w-full py-3 text-[10px] md:text-[11px] uppercase tracking-wider">
                                Kirim Ucapan
                            </button>
                        </div>
                    </form>
                    <div id="comment-list"
                        class="space-y-3 max-h-[35vh] md:max-h-[40vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/5 p-4 rounded-xl border-l-2 md:border-l-4 border-cyan-500">
                                <div class="flex justify-between items-center mb-1">
                                    <h4
                                        class="font-bold text-[10px] md:text-[11px] text-white uppercase tracking-tight">
                                        {{ $comment->name }}
                                    </h4>
                                    <span class="text-[8px] md:text-[9px] text-cyan-400 font-bold italic">
                                        {{ $comment->presence }}
                                    </span>
                                </div>
                                <p class="text-slate-300 text-[11px] md:text-xs italic leading-relaxed">
                                    "{{ $comment->message }}"</p>
                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-3 p-2.5 bg-cyan-950/30 rounded-lg border-l border-cyan-500/50">
                                        <p class="text-[8px] font-bold text-cyan-400 uppercase mb-0.5">Mempelai:</p>
                                        <p class="text-slate-400 text-[10px] md:text-[11px] leading-snug">
                                            {{ $comment->reply }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section flex flex-col justify-between items-center min-h-screen py-12 text-center">
                <div class="pt-10"></div>

                <div class="max-w-md mx-auto px-10 flex-grow flex flex-col justify-center items-center">

                    <div class="w-16 md:w-24 mb-6 relative group">
                        <div
                            class="absolute inset-0 bg-cyan-500/20 rounded-full blur-xl opacity-70 group-hover:opacity-100 transition-opacity animate-pulse-slow">
                        </div>
                        <i data-lucide="heart"
                            class="relative w-8 h-8 md:w-10 md:h-10 text-cyan-400 mx-auto animate-cyber-glow"
                            style="filter: drop-shadow(0 0 15px rgba(6, 182, 212, 0.9)) drop-shadow(0 0 5px rgba(6, 182, 212, 0.7)); fill: rgba(6, 182, 212, 0.1);">
                        </i>
                    </div>

                    <h3 class="font-script text-5xl md:text-6xl text-white mb-6">Thank You</h3>
                    <p class="font-serif-elegant italic text-slate-400 text-xs md:text-sm leading-relaxed mb-10">
                        The sea is vast, but our love is deeper. We look forward to seeing you at our celebration.
                    </p>
                </div>

                <div class="w-full pb-6">
                    <div
                        class="opacity-40 text-[8px] md:text-[9px] tracking-[0.3em] md:tracking-[0.4em] uppercase font-bold text-cyan-400 px-4">
                        Crafted by RQ Pedia Digital Creative.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        lucide.createIcons();
        tsParticles.load("tsparticles", {
            fpsLimit: 60,
            particles: {
                number: {
                    value: 40,
                    density: {
                        enable: true,
                        area: 800
                    }
                },
                color: {
                    value: "#22d3ee"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: {
                        min: 0.1,
                        max: 0.5
                    },
                    animation: {
                        enable: true,
                        speed: 1,
                        sync: false
                    }
                },
                size: {
                    value: {
                        min: 1,
                        max: 4
                    },
                    animation: {
                        enable: true,
                        speed: 2,
                        sync: false
                    }
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: "top",
                    random: true,
                    straight: false,
                    outModes: {
                        default: "out"
                    },
                }
            },
            interactivity: {
                detectOn: "canvas",
                events: {
                    onHover: {
                        enable: true,
                        mode: "bubble"
                    }
                },
                modes: {
                    bubble: {
                        size: 6,
                        distance: 200,
                        duration: 2,
                        opacity: 0.8
                    }
                }
            },
            detectRetina: true
        });
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 3500
            }
        });
        let isPlaying = false;
        const music = document.getElementById('bg-music');
        const musicControl = document.getElementById('music-control');
        const musicIcon = document.getElementById('music-icon');

        function openInvitation() {
            // 1. Fullscreen Logic
            const elem = document.documentElement;
            if (elem.requestFullscreen) elem.requestFullscreen();
            else if (elem.webkitRequestFullscreen) elem.webkitRequestFullscreen();
            else if (elem.msRequestFullscreen) elem.msRequestFullscreen();
            // 2. Animasi Cover Menghilang
            const cover = document.getElementById('wedding-cover');
            cover.style.transform = 'translateY(-100%)';
            // 3. Tampilkan Konten Utama & ORNAMEN
            setTimeout(() => {
                cover.style.display = 'none';
                document.getElementById('main-content').classList.remove('hidden');
                // --- BAGIAN PERBAIKAN: Memunculkan Ornamen ---
                const ornaments = document.getElementById('global-ornaments');
                if (ornaments) {
                    ornaments.classList.remove('opacity-0');
                    // Kita tidak pakai .add('opacity-100') di sini agar tidak konflik dengan Intersection Observer
                }
                // --------------------------------------------
                if (music) {
                    music.play().catch(e => console.log("Autoplay blocked"));
                    document.getElementById('music-control').classList.remove('hidden');
                    isPlaying = true;
                }
                AOS.refresh();
                // --- BAGIAN PERBAIKAN: Intersection Observer untuk Hero ---
                const heroSection = document.querySelector('.hero-bg');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            // Sembunyikan jika di Hero
                            ornaments.style.opacity = "0";
                            ornaments.style.visibility = "hidden";
                        } else {
                            // Tampilkan jika keluar dari Hero
                            ornaments.style.opacity = "1";
                            ornaments.style.visibility = "visible";
                        }
                    });
                }, {
                    threshold: 0.1
                });
                if (heroSection && ornaments) observer.observe(heroSection);
                // --------------------------------------------------------
            }, 1000);
        }

        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerText;
                btn.innerText = "COPIED!";
                btn.classList.add('opacity-70');
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.remove('opacity-70');
                }, 2000);
            });
        }

        function toggleMusic() {
            const music = document.getElementById('bg-music');
            const iconContainer = document.getElementById('music-icon-container');
            if (music.paused) {
                // Jika sedang mati, maka hidupkan
                music.play();
                // Ganti icon ke 'music' (ikon nada)
                iconContainer.innerHTML = '<i data-lucide="music" class="w-5 h-5"></i>';
            } else {
                // Jika sedang bunyi, maka matikan
                music.pause();
                // Ganti icon ke 'music-2' atau 'volume-x' (ikon mati)
                iconContainer.innerHTML = '<i data-lucide="music-2" class="w-5 h-5 opacity-50"></i>';
            }
            // Penting: Render ulang icon Lucide yang baru dimasukkan
            lucide.createIcons();
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
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const btnSubmit = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const token = document.querySelector('input[name="_token"]').value;
            btnSubmit.innerText = "SENDING...";
            btnSubmit.disabled = true;
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        name: name,
                        message: message,
                        presence: presence
                    })
                })
                .then(res => res.json())
                .then(data => {
                    const list = document.getElementById('comment-list');
                    const html = `<div class="bg-white/5 p-5 rounded-xl border-l-4 border-cyan-500 shadow-sm">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-[11px] text-white uppercase tracking-tight">${name}</h4>
                        <span class="text-[9px] text-cyan-400 font-bold italic">${presence}</span>
                    </div>
                    <p class="text-slate-300 text-xs italic leading-relaxed">"${message}"</p>
                </div>`;
                    list.insertAdjacentHTML('afterbegin', html);
                    document.getElementById('c_message').value = "";
                    alert("Ucapan berhasil dikirim!");
                })
                .catch(err => alert("Failed to send."))
                .finally(() => {
                    btnSubmit.innerText = "Kirim Ucapan";
                    btnSubmit.disabled = false;
                });
        });
    </script>
</body>

</html>
