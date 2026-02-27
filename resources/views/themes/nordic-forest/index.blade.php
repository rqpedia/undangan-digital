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
            --forest-dark: #14221c;
            --forest-mid: #2d4a3e;
            --moss: #a3b18a;
            --cream: #f1f5f9;
            --accent: #bc6c25;
            --glass: rgba(20, 34, 28, 0.85);
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-sans {
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
            background-color: var(--forest-dark);
            color: var(--cream);
            overflow: hidden;
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
            padding: 4rem 1.5rem;
        }

        .texture-overlay {
            position: fixed;
            inset: 0;
            opacity: 0.05;
            pointer-events: none;
            z-index: 1;
            background-image: url('https://www.transparenttextures.com/patterns/p6.png');
        }

        .nordic-card {
            background: var(--glass);
            border: 1px solid rgba(163, 177, 138, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 4px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .btn-nordic {
            background: transparent;
            color: var(--moss);
            border: 1px solid var(--moss);
            padding: 12px 35px;
            transition: all 0.4s ease;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 10px;
            font-weight: bold;
        }

        .btn-nordic:hover {
            background: var(--moss);
            color: var(--forest-dark);
        }

        .swiper-slide img {
            filter: sepia(20%) contrast(1.1);
            border: 1px solid rgba(163, 177, 138, 0.3);
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        #tsparticles {
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
        }

        @keyframes gold-flow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .gold-border-animated {
            position: relative;
            background: linear-gradient(30deg, #c5a059, #fffcf7, #c5a059);
            background-size: 200% 200%;
            animation: gold-flow 4s ease infinite;
        }

        /* Efek sudut tambahan agar lebih mewah */
        .corner-accent::before,
        .corner-accent::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #c5a059;
            z-index: 30;
            transition: all 0.5s ease;
        }

        .animate-zoom-in {
            animation: zoomIn 0.3s ease-out;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .swiper-slide-shadow-left,
        .swiper-slide-shadow-right {
            border-radius: 0.75rem;
        }

        @keyframes gold-flow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .gold-border-animated {
            position: relative;
            background: linear-gradient(30deg, #c5a059, #fffcf7, #c5a059);
            background-size: 200% 200%;
            animation: gold-flow 4s ease infinite;
        }

        /* Efek sudut tambahan agar lebih mewah */
        .corner-accent::before,
        .corner-accent::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #c5a059;
            z-index: 30;
            transition: all 0.5s ease;
        }

        #global-ornaments {
            /* Mencegah ornamen menghalangi klik pada tombol di bawahnya */
            pointer-events: none;
        }

        /* Animasi ayunan halus untuk kesan hidup */
        .animate-floral {
            animation: sway 4s ease-in-out infinite alternate;
        }

        @keyframes sway {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            100% {
                transform: translate(3px, 3px) rotate(1deg);
            }
        }

        .delay-1 {
            animation-delay: 0.5s;
        }

        .delay-2 {
            animation-delay: 1s;
        }

        .delay-3 {
            animation-delay: 1.5s;
        }
    </style>
</head>

<body class="font-sans">
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
    <div id="global-ornaments"
        class="fixed inset-0 pointer-events-none z-[9999] overflow-hidden opacity-0 transition-opacity duration-1000">
        <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 animate-floral">
            <svg class="w-full h-full">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div
            class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-1">
            <svg class="w-full h-full" style="transform: scaleX(-1);">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div
            class="absolute bottom-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-2">
            <svg class="w-full h-full" style="transform: scaleY(-1);">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div
            class="absolute bottom-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-3">
            <svg class="w-full h-full" style="transform: rotate(180deg);">
                <use href="#corner-ornament" />
            </svg>
        </div>
    </div>
    <div class="texture-overlay"></div>
    <div id="tsparticles"></div>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#0d1612] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-[#0d1612]/75 backdrop-blur-[2px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0d1612]/30 to-[#0d1612]/80"></div>
            </div>
        @endif
        <div class="absolute top-6 md:top-10 opacity-30 z-10">
            <i data-lucide="trees" class="w-12 h-12 md:w-16 md:h-16 text-moss"></i>
        </div>
        <div class="text-center px-6 z-20 flex flex-col items-center justify-center h-full w-full" data-aos="fade-up">
            <p
                class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase text-moss font-bold">
                The Union of Two Souls
            </p>
            <div class="flex flex-col items-center mb-6 md:mb-10">
                <h1 class="font-script text-5xl md:text-9xl text-white leading-tight drop-shadow-lg">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif text-lg md:text-2xl my-2 md:my-4 text-moss italic">and</span>
                <h1 class="font-script text-5xl md:text-9xl text-white leading-tight drop-shadow-lg">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="mb-8 md:mb-12">
                <p class="font-serif italic text-slate-400 text-xs md:text-sm mb-1">Exclusive Invitation for:</p>
                <h2 class="text-xl md:text-3xl font-serif text-white tracking-wide mb-4 md:mb-6">
                    {{ $guestName }}
                </h2>
                <div class="w-10 h-[1px] bg-moss/50 mx-auto"></div>
            </div>
            <button onclick="openInvitation()"
                class="btn-nordic px-10 py-3 text-xs tracking-widest uppercase shadow-2xl transition-transform hover:scale-105 active:scale-95">
                Open Invitation
            </button>
        </div>
        <div class="absolute bottom-6 md:bottom-10 opacity-30 rotate-180 z-10">
            <i data-lucide="trees" class="w-12 h-12 md:w-16 md:h-16 text-moss"></i>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-forest-dark/80 text-moss p-3 rounded-full border border-moss/30 cursor-pointer hidden">
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
                $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
                $heroUrl = $heroFile
                    ? asset('storage/' . $heroFile->file_path)
                    : 'https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&q=80';
            @endphp
            <section class="snap-section flex items-center justify-center py-10 min-h-screen relative overflow-hidden"
                style="background: linear-gradient(rgba(20,34,28,0.7), rgba(20,34,28,0.9)), url('{{ $heroUrl }}'); background-size: cover; background-position: center;">
                <div data-aos="fade-up" class="text-center px-4 z-10 relative">
                    <div
                        class="mb-6 md:mb-10 tracking-[0.3em] md:tracking-[0.6em] text-[9px] md:text-[10px] uppercase text-moss font-bold">
                        A Forest Tale
                    </div>
                    <div class="flex flex-col items-center mb-8 md:mb-10">
                        <h2 class="font-script text-5xl md:text-8xl text-white leading-tight drop-shadow-xl">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif italic text-moss text-lg md:text-xl my-1 md:my-2">and</span>
                        <h2 class="font-script text-5xl md:text-8xl text-white leading-tight drop-shadow-xl">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif text-lg md:text-xl tracking-[0.2em] md:tracking-[0.3em] text-white mb-10 md:mb-12">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d . m . Y') }}
                    </p>

                    {{-- Countdown Wrapper --}}
                    <div class="flex justify-center gap-4 md:gap-10 border-t border-white/10 pt-8 md:pt-10">
                        <div class="text-center">
                            <span id="days" class="text-2xl md:text-4xl font-serif text-moss block">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-slate-400 font-medium">Days</span>
                        </div>
                        <div class="text-center">
                            <span id="hours" class="text-2xl md:text-4xl font-serif text-moss block">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-slate-400 font-medium">Hours</span>
                        </div>
                        <div class="text-center">
                            <span id="minutes" class="text-2xl md:text-4xl font-serif text-moss block">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-slate-400 font-medium">Mins</span>
                        </div>
                        <div class="text-center"> {{-- Opsional: Tambahkan Seconds agar user tahu countdown jalan --}}
                            <span id="seconds" class="text-2xl md:text-4xl font-serif text-moss block">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-slate-400 font-medium">Secs</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-10 md:py-20 relative overflow-hidden bg-[#031a14]">
                {{-- Ornamen Sudut (Dikecilkan di HP) --}}


                <div class="max-w-4xl mx-auto w-full text-center relative z-10">
                    {{-- Quote lebih rapat --}}
                    <div class="italic text-slate-400 text-xs md:text-base font-serif mb-8 md:mb-20 px-6"
                        data-aos="fade-up">
                        "He has put affection and mercy between your hearts. A journey that starts in nature, bound by
                        heaven."
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-24 items-center">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center" data-aos="fade-up">
                            <div class="relative group">
                                <div class="absolute -inset-1 gold-border-animated opacity-30 blur-sm rounded-sm">
                                </div>
                                {{-- Ukuran dikecilkan dari w-40 h-52 ke w-32 h-44 di HP --}}
                                <div class="relative w-32 h-44 md:w-56 md:h-72 p-1 bg-[#042119] rounded-sm">
                                    <div
                                        class="absolute top-0 left-0 w-6 h-6 border-t-2 border-l-2 border-gold-luxury/50 z-20">
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-6 h-6 border-b-2 border-r-2 border-gold-luxury/50 z-20">
                                    </div>
                                    <img src="{{ $invitation->groom_photo ? (str_contains($invitation->groom_photo, 'http') ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo)) : '...' }}"
                                        class="w-full h-full object-cover rounded-sm grayscale-[30%]" alt="Groom">
                                </div>
                            </div>
                            <h3 class="font-script text-2xl md:text-4xl text-white mt-4 mb-1">
                                {{ $invitation->groom_name }}</h3>
                            <p
                                class="font-serif italic text-moss text-[9px] md:text-xs uppercase tracking-widest leading-tight">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>

                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center" data-aos="fade-up">
                            <div class="relative group">
                                <div class="absolute -inset-1 gold-border-animated opacity-30 blur-sm rounded-sm">
                                </div>
                                <div class="relative w-32 h-44 md:w-56 md:h-72 p-1 bg-[#042119] rounded-sm">
                                    <div
                                        class="absolute top-0 left-0 w-6 h-6 border-t-2 border-l-2 border-gold-luxury/50 z-20">
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-6 h-6 border-b-2 border-r-2 border-gold-luxury/50 z-20">
                                    </div>
                                    <img src="{{ $invitation->bride_photo ? (str_contains($invitation->bride_photo, 'http') ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo)) : '...' }}"
                                        class="w-full h-full object-cover rounded-sm grayscale-[30%]" alt="Bride">
                                </div>
                            </div>
                            <h3 class="font-script text-2xl md:text-4xl text-white mt-4 mb-1">
                                {{ $invitation->bride_name }}</h3>
                            <p
                                class="font-serif italic text-moss text-[9px] md:text-xs uppercase tracking-widest leading-tight">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-10 bg-black/20 relative overflow-hidden">
                {{-- Ornaments --}}


                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2
                        class="font-serif text-lg md:text-3xl mb-8 md:mb-16 text-white uppercase tracking-[0.2em] md:tracking-[0.4em]">
                        The Sacred Ceremony
                    </h2>

                    {{-- Gap lebih kecil di HP --}}
                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-4 md:gap-10">
                        @foreach ($invitation->events as $event)
                            <div class="nordic-card p-5 md:p-12 flex flex-col items-center border-t border-moss bg-white/5 backdrop-blur-sm"
                                data-aos="zoom-in">
                                <h3
                                    class="font-serif text-base md:text-xl font-bold text-moss mb-4 md:mb-8 uppercase tracking-widest">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-4 md:space-y-6 mb-6 md:mb-10 w-full">
                                    <div>
                                        <span
                                            class="block text-slate-500 text-[8px] md:text-[10px] uppercase font-bold mb-1">Date
                                            & Time</span>
                                        <p class="text-white text-sm md:text-lg font-serif">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                        </p>
                                        <p class="text-white text-[11px] md:text-sm">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                            {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') . ' WIB' : 'Selesai' }}
                                        </p>
                                    </div>

                                    <div>
                                        <span
                                            class="block text-slate-500 text-[8px] md:text-[10px] uppercase font-bold mb-1">Location</span>
                                        <p class="font-bold text-white mb-0.5 text-xs md:text-base">
                                            {{ $event->location_name }}
                                        </p>
                                        <p
                                            class="text-[10px] md:text-xs text-slate-400 leading-snug max-w-[200px] mx-auto italic">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-nordic w-full max-w-[200px] md:max-w-full py-2.5 text-[9px] md:text-xs tracking-wider uppercase">
                                        Open Google Maps
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Nordic Sacred Style --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-10 md:py-24 relative overflow-hidden bg-[#031a14]">
                    {{-- Ornamen Sudut (Dikecilkan di HP) --}}


                    <div class="max-w-5xl mx-auto relative z-10">
                        {{-- Header (Lebih rapat di HP) --}}
                        <div class="text-center mb-10 md:mb-20">
                            <h2 class="font-serif text-lg md:text-3xl text-white uppercase tracking-[0.3em] mb-2"
                                data-aos="fade-down">
                                Our Love Story
                            </h2>
                            <div class="w-12 h-[1px] bg-moss mx-auto"></div>
                        </div>

                        <div class="relative">
                            {{-- Central Line (Hanya muncul di desktop) --}}
                            <div
                                class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-[1px] bg-moss/20">
                            </div>

                            <div class="space-y-10 md:space-y-24">
                                @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                    <div
                                        class="flex flex-col md:flex-row items-center gap-6 md:gap-0 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">

                                        {{-- Image Side --}}
                                        <div class="w-full md:w-1/2 px-4 md:px-10"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                            <div class="relative group mx-auto max-w-[280px] md:max-w-full">
                                                <div
                                                    class="absolute -inset-1.5 border border-moss/20 rounded-lg group-hover:border-moss/50 transition-all duration-700">
                                                </div>
                                                <div
                                                    class="relative overflow-hidden rounded-md shadow-xl bg-[#042119]">
                                                    {{-- Image: Menggunakan h-auto w-auto untuk ukuran asli --}}
                                                    <img src="{{ asset('storage/' . $story->image) }}"
                                                        class="w-full h-auto object-contain transition-all duration-1000"
                                                        alt="{{ $story->title }}">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Dot (Desktop Only) --}}
                                        <div class="hidden md:flex w-[2px] justify-center relative z-20">
                                            <div
                                                class="w-3 h-3 rounded-full bg-moss border-4 border-[#031a14] shadow-sm">
                                            </div>
                                        </div>

                                        {{-- Content Side --}}
                                        <div class="w-full md:w-1/2 px-4 md:px-10 {{ $index % 2 == 0 ? 'md:text-left' : 'md:text-right' }}"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                                            <span
                                                class="font-serif text-moss text-[9px] md:text-xs tracking-widest uppercase font-bold block mb-1">
                                                {{ $story->date }}
                                            </span>
                                            <h4
                                                class="font-serif text-base md:text-xl text-white uppercase tracking-wider mb-3">
                                                {{ $story->title }}
                                            </h4>
                                            <div
                                                class="nordic-card p-4 md:p-6 bg-white/5 backdrop-blur-sm border-l-2 {{ $index % 2 == 0 ? 'border-moss' : 'md:border-l-0 md:border-r-2 border-moss text-left md:text-right' }}">
                                                <p
                                                    class="text-slate-400 text-[11px] md:text-sm leading-relaxed italic">
                                                    "{{ $story->description }}"
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gallery && count($invitation->galleries) > 0)
                <section class="snap-section px-4 bg-[#031a14] py-16 relative overflow-hidden">
                    {{-- Ornaments --}}


                    <div class="w-full text-center relative z-10">
                        <h2 class="font-serif text-3xl md:text-4xl mb-12 text-white uppercase tracking-[0.5em]"
                            data-aos="fade-up">
                            Gallery
                        </h2>

                        <div class="mx-auto w-full">
                            {{-- Slide per view 'auto' sangat penting di sini --}}
                            <div class="swiper mySwiper !pb-14">
                                <div class="swiper-wrapper flex items-center">
                                    @foreach ($invitation->galleries as $photo)
                                        {{-- !w-auto memastikan slide mengikuti lebar alami gambar --}}
                                        <div class="swiper-slide !w-auto flex justify-center items-center px-2">
                                            <div
                                                class="p-2 gold-border bg-emerald-deep/50 shadow-2xl overflow-hidden rounded-sm">
                                                {{-- h-[50vh] menjaga tinggi konsisten di HP, w-auto menjaga rasio asli --}}
                                                <img src="{{ asset('storage/' . $photo->url) }}"
                                                    class="w-auto h-auto max-w-[85vw] max-h-[55vh] md:max-h-[70vh] object-contain block mx-auto rounded-sm transition-transform duration-500 hover:scale-105"
                                                    alt="Gallery Moment"
                                                    onclick="openLightbox('{{ asset('storage/' . $photo->url) }}')">
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
                <section class="snap-section px-6 bg-black/10">

                    <div class="max-w-md mx-auto w-full text-center">
                        <h2 class="font-serif text-3xl mb-6 text-white uppercase tracking-[0.4em]" data-aos="fade-up">
                            Wedding Gift</h2>
                        <p class="font-serif italic text-slate-400 mb-12 text-sm" data-aos="fade-up">
                            Your presence is enough, but if you wish to send a token of love, you may do so here:
                        </p>
                        <div class="nordic-card p-10 relative overflow-hidden" data-aos="zoom-in">
                            <div class="mb-8">
                                <i data-lucide="heart" class="w-8 h-8 mx-auto text-moss opacity-40"></i>
                            </div>
                            <div class="space-y-8">
                                <div class="border-b border-white/5 pb-6">
                                    <p class="text-moss font-bold mb-2 uppercase tracking-widest text-[10px]">
                                        {{ $invitation->bank_name_1 }}</p>
                                    <h3 class="text-2xl font-serif text-white mb-2 tracking-widest">
                                        {{ $invitation->bank_account_1 }}</h3>
                                    <p class="text-xs text-slate-400 mb-6 italic">a.n
                                        {{ $invitation->bank_owner_1 }}
                                    </p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                        class="btn-nordic !py-2 !px-8 !text-[9px]">
                                        Copy Number
                                    </button>
                                </div>
                                @if ($invitation->bank_name_2)
                                    <div>
                                        <p class="text-moss font-bold mb-2 uppercase tracking-widest text-[10px]">
                                            {{ $invitation->bank_name_2 }}</p>
                                        <h3 class="text-2xl font-serif text-white mb-2 tracking-widest">
                                            {{ $invitation->bank_account_2 }}</h3>
                                        <p class="text-xs text-slate-400 mb-6 italic">a.n
                                            {{ $invitation->bank_owner_2 }}</p>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                            class="btn-nordic !py-2 !px-8 !text-[9px]">
                                            Copy Number
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-8 md:py-20 relative z-30 overflow-hidden">


                <div class="max-w-2xl mx-auto w-full relative z-10">
                    <h2
                        class="font-serif text-2xl md:text-3xl text-center mb-6 md:mb-10 text-white tracking-[0.2em] md:tracking-[0.3em] uppercase">
                        R.S.V.P</h2>

                    <form id="comment-form" class="nordic-card p-5 md:p-8 mb-6 bg-white/[0.03] backdrop-blur-sm">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            <div class="text-center pb-3 border-b border-white/10">
                                <p class="text-[8px] font-bold text-moss uppercase tracking-widest mb-0.5">GUEST
                                    NAME
                                </p>
                                <p class="text-lg font-serif text-white">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden peer" checked>
                                    <label for="hadir"
                                        class="block w-full py-3 text-center cursor-pointer transition-all border border-white/20 text-slate-400 font-bold uppercase text-[9px] tracking-widest peer-checked:bg-moss peer-checked:text-forest-dark peer-checked:border-moss">
                                        ATTENDING
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden peer">
                                    <label for="tidak"
                                        class="block w-full py-3 text-center cursor-pointer transition-all border border-white/20 text-slate-400 font-bold uppercase text-[9px] tracking-widest peer-checked:bg-accent peer-checked:text-white peer-checked:border-accent">
                                        ABSENT
                                    </label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Wishes for the couple..."
                                class="w-full p-3 text-xs bg-black/20 border border-white/10 focus:border-moss outline-none text-white italic rounded-none"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-nordic w-full text-[10px] uppercase tracking-widest py-3 font-bold">
                                Send Wishes
                            </button>
                        </div>
                    </form>

                    <div id="comment-list" class="space-y-3 max-h-[40vh] overflow-y-auto pr-1 scrollbar-hide">
                        @forelse($invitation->comments->where('parent_id', null)->sortByDesc('created_at') as $comment)
                            <div class="bg-white/5 p-4 border-l-2 border-moss/40 mb-3">
                                <div class="flex justify-between items-center mb-1.5">
                                    <h4 class="font-bold text-[10px] text-white uppercase tracking-tight">
                                        {{ $comment->name }}</h4>
                                    <span
                                        class="text-[8px] font-bold italic px-1.5 py-0.5 rounded {{ $comment->presence == 'Hadir' ? 'bg-moss text-forest-dark' : 'bg-white/10 text-slate-400' }}">
                                        {{ $comment->presence }}
                                    </span>
                                </div>
                                <p class="text-slate-300 text-[11px] leading-relaxed italic">
                                    "{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-2 p-2 bg-black/20 border-l border-accent/40">
                                        <p class="text-[8px] font-bold text-accent uppercase tracking-widest mb-0.5">
                                            Reply:</p>
                                        <p class="text-slate-400 text-[10px] leading-tight">{{ $comment->reply }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-4 opacity-40">
                                <p class="text-white text-[10px] italic uppercase tracking-widest">No messages yet
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">

                <div class="max-w-md mx-auto px-10">
                    <i data-lucide="tree-pine" class="w-12 h-12 text-moss mx-auto mb-8 opacity-20"></i>
                    <h3 class="font-script text-6xl text-white mb-8">Thank You</h3>
                    <p class="font-serif italic text-slate-400 text-sm leading-relaxed mb-20">
                        Like the ancient pines, may our love grow tall and strong through every season.
                    </p>
                    <div class="opacity-30 text-[9px] tracking-[0.5em] uppercase font-bold text-moss">The Nordic
                        Edition</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script>
        // --- 1. Konfigurasi Global & Inisialisasi ---
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 1200,
                once: true
            });
            lucide.createIcons();
            initParticles();
            initSwiper(); // Pastikan ini dipanggil
            initCountdown();
        });

        const music = document.getElementById('bg-music');
        let isPlaying = false;

        // --- 2. Fungsi Partikel ---
        function initParticles() {
            if (typeof tsParticles !== 'undefined') {
                tsParticles.load("tsparticles", {
                    fpsLimit: 60,
                    particles: {
                        number: {
                            value: 25,
                            density: {
                                enable: true,
                                area: 800
                            }
                        },
                        color: {
                            value: "#a3b18a"
                        },
                        shape: {
                            type: "circle"
                        },
                        opacity: {
                            value: {
                                min: 0.1,
                                max: 0.3
                            },
                            animation: {
                                enable: true,
                                speed: 0.5
                            }
                        },
                        size: {
                            value: {
                                min: 1,
                                max: 2
                            }
                        },
                        move: {
                            enable: true,
                            speed: 0.5,
                            direction: "bottom",
                            random: true,
                            outModes: {
                                default: "out"
                            }
                        }
                    },
                    detectRetina: true
                });
            }
        }

        // --- 3. Slider Gallery (Fixed for Mobile & Aspect Ratio) ---
        function initSwiper() {
            new Swiper(".mySwiper", {
                slidesPerView: "auto", // KUNCI UTAMA: lebar slide mengikuti isi (gambar asli)
                centeredSlides: true,
                spaceBetween: 20,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

            // Inisialisasi jika ada mySwiper lain (opsional)
            if (document.querySelector('.mySwiper')) {
                new Swiper(".mySwiper", {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                });
            }
        }

        // --- 4. Lightbox Functions ---
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');
            img.src = src;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Stop scroll saat buka foto
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // --- 5. Kontrol Undangan & Musik ---
        function openInvitation() {
            const elem = document.documentElement;
            const p = (e) => e.requestFullscreen ? e.requestFullscreen() : (e.webkitRequestFullscreen ? e
                .webkitRequestFullscreen() : e.msRequestFullscreen?.());
            p(elem);

            const cover = document.getElementById('wedding-cover');
            const ornaments = document.getElementById('global-ornaments')
            cover.style.transform = 'translateY(-100%)';

            setTimeout(() => {
                cover.style.display = 'none';
                document.getElementById('main-content').classList.remove('hidden');
                if (music) {
                    music.play().catch(e => console.log("Autoplay blocked"));
                    document.getElementById('music-control').classList.remove('hidden');
                    isPlaying = true;
                }
                if (ornaments) {
                    ornaments.classList.remove('opacity-0');
                    ornaments.classList.add('opacity-100'); // Pastikan Tailwind opacity-100 ada
                }
                AOS.refresh();
            }, 1000);
        }

        function toggleMusic() {
            const icon = document.getElementById('music-icon');
            isPlaying ? music.pause() : music.play();
            icon.setAttribute('data-lucide', isPlaying ? 'music-2' : 'music');
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        // --- 6. Fitur Pendukung (Copy & Countdown) ---
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerText;
                btn.innerText = "COPIED!";
                btn.classList.add('bg-moss', 'text-forest-dark');
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.remove('bg-moss', 'text-forest-dark');
                }, 2000);
            });
        }

        function initCountdown() {
            const rawDate = "{{ $data['date'] }}";
            // Ganti spasi dengan T agar aman di browser Safari/iOS
            const targetDate = new Date(rawDate.replace(' ', 'T')).getTime();

            const update = () => {
                const now = new Date().getTime();
                const diff = targetDate - now;

                if (diff <= 0) {
                    const els = ['days', 'hours', 'minutes', 'seconds'];
                    els.forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.innerText = "00";
                    });
                    return;
                }

                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((diff % (1000 * 60)) / 1000);

                if (document.getElementById('days')) document.getElementById('days').innerText = d.toString().padStart(
                    2, '0');
                if (document.getElementById('hours')) document.getElementById('hours').innerText = h.toString()
                    .padStart(2, '0');
                if (document.getElementById('minutes')) document.getElementById('minutes').innerText = m.toString()
                    .padStart(2, '0');
                if (document.getElementById('seconds')) document.getElementById('seconds').innerText = s.toString()
                    .padStart(2, '0');
            };

            update();
            setInterval(update, 1000);
        }

        // --- 7. Form RSVP AJAX ---
        document.getElementById('comment-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presence = document.querySelector('input[name="presence"]:checked')?.value || "Hadir";

            if (!message.trim()) return;

            const originalBtnText = btn.innerHTML;
            btn.innerText = "SENDING...";
            btn.disabled = true;

            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
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
                <div class="bg-white/10 p-5 border-l-4 border-moss mb-4 transition-all animate-fade-in-up">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-[11px] text-white uppercase tracking-tight">${name}</h4>
                        <span class="text-[9px] text-moss font-bold italic">${presence}</span>
                    </div>
                    <p class="text-slate-300 text-xs italic">"${message}"</p>
                    <p class="text-[8px] text-slate-500 mt-2">Just now</p>
                </div>`;
                    list.insertAdjacentHTML('afterbegin', html);
                    document.getElementById('c_message').value = "";
                })
                .catch(() => alert("Gagal mengirim pesan."))
                .finally(() => {
                    btn.innerHTML = originalBtnText;
                    btn.disabled = false;
                });
        });
        // --- 8. Inject Ornament ke Semua Section ---
    </script>
</body>

</html>
