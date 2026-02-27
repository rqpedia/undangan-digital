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
            --sakura-pink: #fce4ec;
            --sakura-dark: #f06292;
            --sakura-main: #f8bbd0;
            --sakura-leaf: #81c784;
            --text-dark: #4a4a4a;
            --card-white: rgba(255, 255, 255, 0.9);
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
            background-color: var(--sakura-pink);
            overflow: hidden;
            color: var(--text-dark);
        }

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
            background-color: var(--sakura-pink);
            background-image: url('https://www.transparenttextures.com/patterns/cream-paper.png');
        }

        .luxury-card {
            background: var(--card-white);
            border: 2px solid var(--sakura-main);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(240, 98, 146, 0.15);
        }

        .btn-sakura {
            background: linear-gradient(135deg, var(--sakura-main), var(--sakura-dark));
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(240, 98, 146, 0.3);
            cursor: pointer;
        }

        .btn-sakura:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(240, 98, 146, 0.4);
        }

        .presence-input:checked+label {
            background: var(--sakura-dark);
            color: white;
            border-color: var(--sakura-dark);
        }

        .hero-bg {
            background: linear-gradient(rgba(252, 228, 236, 0.6), rgba(252, 228, 236, 0.8)),
                url('https://images.unsplash.com/photo-1522383225653-ed111181a951?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .petal {
            position: absolute;
            background-color: #ffc0cb;
            border-radius: 150% 0 150% 0;
            animation: petal-fall 10s linear infinite;
            z-index: 1;
            opacity: 0.6;
        }

        @keyframes petal-fall {
            0% {
                transform: translateY(-10vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .swiper-pagination-bullet-active {
            background: var(--sakura-dark) !important;
        }

        @keyframes slow-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes soft-pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.4;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        .animate-spin-soft {
            animation: slow-spin 12s linear infinite;
        }

        .animate-pulse-soft {
            animation: soft-pulse 4s ease-in-out infinite;
        }

        @keyframes petal-fall-1 {
            0% {
                transform: translate(0, -10vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.8;
            }

            100% {
                transform: translate(5vw, 110vh) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes petal-fall-2 {
            0% {
                transform: translate(-5vw, -5vh) rotate(0deg);
                opacity: 0;
            }

            15% {
                opacity: 0.7;
            }

            100% {
                transform: translate(10vw, 105vh) rotate(-360deg);
                opacity: 0;
            }
        }

        @keyframes petal-fall-3 {
            0% {
                transform: translate(10vw, -15vh) rotate(0deg);
                opacity: 0;
            }

            20% {
                opacity: 0.6;
            }

            100% {
                transform: translate(-10vw, 120vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Animasi spin (sudah ada, pastikan tidak tertimpa) */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }
    </style>
</head>

<body class="font-sans-light">
    <svg style="display: none;">
        <symbol id="petal-small" viewBox="0 0 100 100">
            <g fill="currentColor">
                <path d="M50 50 Q50 20 65 10 Q80 20 50 50 Z" />
                <path d="M50 50 Q80 35 90 50 Q80 65 50 50 Z" />
                <path d="M50 50 Q65 80 50 90 Q35 80 50 50 Z" />
                <path d="M50 50 Q20 65 10 50 Q20 35 50 50 Z" />
                <path d="M50 50 Q20 20 35 10 Q50 20 50 50 Z" />
            </g>
            <circle cx="50" cy="50" r="4" fill="white" opacity="0.4" />
        </symbol>
        <symbol id="sakura-large" viewBox="0 0 100 100">
            <g fill="currentColor">
                <path d="M50 50 Q50 20 65 10 Q80 20 50 50 Z" opacity="0.9" />
                <path d="M50 50 Q80 35 90 50 Q80 65 50 50 Z" opacity="0.7" />
                <path d="M50 50 Q65 80 50 90 Q35 80 50 50 Z" opacity="0.9" />
                <path d="M50 50 Q20 65 10 50 Q20 35 50 50 Z" opacity="0.7" />
                <path d="M50 50 Q20 20 35 10 Q50 20 50 50 Z" opacity="0.8" />
            </g>
            <circle cx="50" cy="50" r="5" fill="white" opacity="0.5" />
        </symbol>
    </svg>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="petal-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#fff0f5] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-white/40 backdrop-blur-[1px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#fff0f5]/20 to-[#fff0f5]/80"></div>
            </div>
        @endif
        <div class="text-center px-6 z-20 relative" data-aos="zoom-in">
            <div
                class="mb-3 md:mb-4 tracking-[0.2em] md:tracking-[0.3em] text-[10px] md:text-xs uppercase text-pink-500 font-bold drop-shadow-sm">
                The Wedding of
            </div>
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-5xl md:text-8xl text-[var(--sakura-dark)] leading-tight drop-shadow-md">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-xl md:text-2xl my-1 md:my-2 text-pink-400 italic">&</span>
                <h1 class="font-script text-5xl md:text-8xl text-[var(--sakura-dark)] leading-tight drop-shadow-md">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="mb-8 md:mb-10">
                <p class="font-serif-elegant italic text-stone-600 text-sm md:text-lg mb-1">Dear Beloved Guest:</p>
                <h2 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)] tracking-tight mb-4">
                    {{ $guestName }}
                </h2>
                <div class="w-12 md:w-16 h-[2px] bg-[var(--sakura-main)] mx-auto shadow-sm"></div>
            </div>
            <button onclick="openInvitation()"
                class="btn-sakura uppercase tracking-widest text-[9px] md:text-[10px] px-10 py-3 shadow-lg transition-transform active:scale-95">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/80 text-[var(--sakura-dark)] p-3 rounded-full shadow-lg cursor-pointer hidden border border-[var(--sakura-main)]">
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
            @endphp
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-pink-50">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-pink-100"></div>
                    @endif
                    <div class="absolute inset-0 bg-white/30 backdrop-blur-[1px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-pink-50/40 via-transparent to-pink-100/60">
                    </div>
                </div>

                <div data-aos="fade-up" class="text-center px-4 w-full z-10 relative">
                    <div
                        class="mb-3 md:mb-6 tracking-[0.2em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase text-[var(--sakura-dark)] font-bold drop-shadow-sm">
                        The Bloom of Love
                    </div>

                    <div class="flex flex-col items-center mb-4 md:mb-8">
                        <h2
                            class="font-script text-5xl md:text-8xl text-[var(--sakura-dark)] leading-tight drop-shadow-md">
                            {{ $data['groom'] }}
                        </h2>
                        <span
                            class="font-serif-elegant text-xl md:text-3xl text-pink-500 italic my-0.5 md:my-2">&</span>
                        <h2
                            class="font-script text-5xl md:text-8xl text-[var(--sakura-dark)] leading-tight drop-shadow-md">
                            {{ $data['bride'] }}
                        </h2>
                    </div>

                    <p
                        class="font-serif-elegant text-base md:text-2xl text-[var(--text-dark)] mb-6 md:mb-10 tracking-wide">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}
                    </p>

                    <div
                        class="flex justify-center gap-3 md:gap-8 bg-white/70 backdrop-blur-md p-4 md:p-8 rounded-xl md:rounded-3xl border border-white/80 mx-auto max-w-[260px] md:max-w-none shadow-lg shadow-pink-200/20">
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="days"
                                class="text-xl md:text-4xl font-serif-elegant text-[var(--sakura-dark)]">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase text-pink-500 font-bold tracking-widest">Hari</span>
                        </div>
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="hours"
                                class="text-xl md:text-4xl font-serif-elegant text-[var(--sakura-dark)]">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase text-pink-500 font-bold tracking-widest">Jam</span>
                        </div>
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="minutes"
                                class="text-xl md:text-4xl font-serif-elegant text-[var(--sakura-dark)]">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase text-pink-500 font-bold tracking-widest">Menit</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-12 md:px-6">
                {{-- Bunga Sakura Besar Berputar (yang sudah ada) --}}
                <div
                    class="absolute -top-10 -left-10 w-40 h-40 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-48 h-48 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute top-1/4 -right-5 w-20 h-20 text-[var(--sakura-dark)] opacity-10 animate-[spin_15s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                {{-- Efek Kelopak Bunga Berguguran (Baru Ditambahkan) --}}
                <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-40"
                    style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-12 h-12 text-[var(--sakura-dark)] opacity-30"
                    style="left: 35%; animation: petal-fall-2 18s linear infinite; animation-delay: 2s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-10 h-10 text-[var(--sakura-dark)] opacity-50"
                    style="left: 55%; animation: petal-fall-3 15s linear infinite; animation-delay: 5s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-7 h-7 text-[var(--sakura-dark)] opacity-40"
                    style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-60"
                    style="left: 85%; animation: petal-fall-2 14s linear infinite; animation-delay: 7s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                </div>
                <div class="max-w-4xl mx-auto w-full text-center" data-aos="fade-up">
                    <div
                        class="italic text-stone-500 text-xs md:text-sm leading-relaxed font-serif-elegant mb-12 md:mb-16 px-4">
                        "Cinta bukan tentang berapa hari, bulan, atau tahun kalian bersama..."
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-56 md:h-56 mb-6 group">
                                <div
                                    class="absolute -inset-3 border-[0.5px] border-[var(--sakura-dark)] rounded-full opacity-30 animate-[spin_10s_linear_infinite]">
                                </div>
                                <div
                                    class="absolute -inset-5 border-[1px] border-[var(--sakura-dark)] rounded-full opacity-10 animate-[ping_3s_linear_infinite]">
                                </div>
                                <div
                                    class="absolute inset-0 rounded-full border-[6px] border-white shadow-[0_10px_25px_-5px_rgba(0,0,0,0.1)] z-10 overflow-hidden bg-white">
                                    <div
                                        class="absolute top-0 right-0 w-8 h-8 text-[var(--sakura-dark)] opacity-40 z-20">
                                        <i data-lucide="flower-2" class="w-full h-full p-1"></i>
                                    </div>
                                    <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->groom_name) . '&background=f8bbd0&color=fff' }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-[var(--sakura-dark)] mb-1">
                                {{ $invitation->groom_name }}</h3>
                            <p class="font-serif-elegant text-stone-500 text-xs md:text-sm px-4">
                                {{ $invitation->groom_info }}</p>
                        </div>
                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-40 h-40 md:w-56 md:h-56 mb-6 group">
                                <div
                                    class="absolute -inset-3 border-[0.5px] border-[var(--sakura-dark)] rounded-full opacity-30 animate-[spin_10s_linear_infinite_reverse]">
                                </div>
                                <div
                                    class="absolute -inset-5 border-[1px] border-[var(--sakura-dark)] rounded-full opacity-10 animate-[ping_3s_linear_infinite]">
                                </div>
                                <div
                                    class="absolute inset-0 rounded-full border-[6px] border-white shadow-[0_10px_25px_-5px_rgba(0,0,0,0.1)] z-10 overflow-hidden bg-white">
                                    <div class="absolute top-0 left-0 w-8 h-8 text-[var(--sakura-dark)] opacity-40 z-20"
                                        style="transform: scaleX(-1);">
                                        <i data-lucide="flower-2" class="w-full h-full p-1"></i>
                                    </div>
                                    <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->bride_name) . '&background=f8bbd0&color=fff' }}"
                                        class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-[var(--sakura-dark)] mb-1">
                                {{ $invitation->bride_name }}</h3>
                            <p class="font-serif-elegant text-stone-500 text-xs md:text-sm px-4">
                                {{ $invitation->bride_info }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-10 md:px-6">
                {{-- Bunga Sakura Besar Berputar (yang sudah ada) --}}
                <div
                    class="absolute -top-10 -left-10 w-40 h-40 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-48 h-48 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute top-1/4 -right-5 w-20 h-20 text-[var(--sakura-dark)] opacity-10 animate-[spin_15s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                {{-- Efek Kelopak Bunga Berguguran (Baru Ditambahkan) --}}
                <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-40"
                    style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-12 h-12 text-[var(--sakura-dark)] opacity-30"
                    style="left: 35%; animation: petal-fall-2 18s linear infinite; animation-delay: 2s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-10 h-10 text-[var(--sakura-dark)] opacity-50"
                    style="left: 55%; animation: petal-fall-3 15s linear infinite; animation-delay: 5s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-7 h-7 text-[var(--sakura-dark)] opacity-40"
                    style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-60"
                    style="left: 85%; animation: petal-fall-2 14s linear infinite; animation-delay: 7s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="max-w-5xl mx-auto w-full text-center">
                    <h2 class="font-serif-elegant text-2xl md:text-4xl mb-8 md:mb-12 text-[var(--sakura-dark)]">Momen
                        Bahagia</h2>
                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 md:gap-8">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-8 flex flex-col items-center bg-white/80 shadow-sm rounded-2xl">
                                <h3
                                    class="font-serif-elegant text-xl md:text-2xl font-bold text-[var(--sakura-dark)] mb-4 uppercase tracking-wider">
                                    {{ $event->event_name }}</h3>
                                <div class="space-y-1 mb-6">
                                    <p class="text-stone-600 font-bold text-base md:text-lg">
                                        {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</p>
                                    <p class="text-xs md:text-sm text-stone-500">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - Selesai</p>
                                    <div class="pt-3">
                                        <p
                                            class="font-bold text-[var(--sakura-leaf)] uppercase text-[10px] tracking-widest mb-1">
                                            {{ $event->location_name }}</p>
                                        <p class="text-[11px] text-stone-400 leading-snug px-2">{{ $event->address }}
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-sakura !py-2.5 text-[9px] w-full max-w-[200px] text-center">Lihat
                                        Lokasi</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Sakura Luxury Timeline --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-24 relative overflow-hidden bg-[#FFF9FA]">
                    {{-- Soft Glow Background --}}
                    <div
                        class="absolute top-1/4 -left-20 w-80 h-80 bg-[var(--sakura-dark)]/10 rounded-full blur-[120px]">
                    </div>
                    <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-pink-200/20 rounded-full blur-[120px]">
                    </div>
                    <div class="max-w-6xl mx-auto relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-24">
                            <span
                                class="text-[var(--sakura-dark)] font-bold text-[10px] tracking-[0.5em] uppercase mb-4 block opacity-60">
                                Memories of Us
                            </span>
                            <h2 class="font-serif-elegant text-5xl md:text-7xl text-stone-800 mb-6">
                                Our <span class="text-[var(--sakura-dark)] italic">Journey</span>
                            </h2>
                            <div
                                class="w-24 h-[1px] bg-gradient-to-r from-transparent via-[var(--sakura-dark)] to-transparent mx-auto">
                            </div>
                        </div>
                        <div class="relative">
                            {{-- Central Line (Timeline) --}}
                            <div
                                class="absolute left-4 md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-[var(--sakura-dark)]/30 to-transparent">
                            </div>
                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group mb-20 md:mb-32">
                                    {{-- Bullet: Sakura Flower Icon --}}
                                    <div
                                        class="flex items-center justify-center w-10 h-10 md:w-14 md:h-14 rounded-full border border-[var(--sakura-dark)]/30 bg-white text-[var(--sakura-dark)] absolute left-0 md:left-1/2 md:-translate-x-1/2 z-20 shadow-sm transition-all duration-500 group-hover:scale-125 group-hover:bg-[var(--sakura-dark)] group-hover:text-white">
                                        <svg class="w-6 h-6 md:w-8 md:h-8 p-1">
                                            <use href="#petal-small" />
                                        </svg>
                                    </div>
                                    {{-- Card Content --}}
                                    <div class="w-[calc(100%-3.5rem)] md:w-[calc(50%-4rem)] ml-auto md:ml-0">
                                        <div class="relative group">
                                            {{-- Pink Glow Hover Effect --}}
                                            <div
                                                class="absolute -inset-0.5 bg-gradient-to-r from-[var(--sakura-dark)] to-pink-200 rounded-[2.5rem] opacity-0 group-hover:opacity-30 transition duration-1000 blur">
                                            </div>
                                            <div
                                                class="relative bg-white/60 backdrop-blur-xl p-6 md:p-10 rounded-[2.5rem] border border-white flex flex-col gap-6 shadow-sm group-hover:shadow-xl transition-all duration-500">
                                                {{-- Date Tag --}}
                                                <div class="inline-flex items-center gap-2">
                                                    <div class="h-[1px] w-6 bg-[var(--sakura-dark)]"></div>
                                                    <span
                                                        class="text-[var(--sakura-dark)] font-bold text-lg tracking-tight">{{ $story->date }}</span>
                                                </div>
                                                <h4
                                                    class="font-serif-elegant text-3xl md:text-4xl text-stone-800 group-hover:text-[var(--sakura-dark)] transition-colors duration-500">
                                                    {{ $story->title }}
                                                </h4>
                                                @if ($story->image)
                                                    <div
                                                        class="relative rounded-3xl overflow-hidden aspect-[4/3] md:aspect-video shadow-lg">
                                                        <div
                                                            class="absolute inset-0 bg-[var(--sakura-dark)]/5 group-hover:bg-transparent transition-colors duration-700 z-10">
                                                        </div>
                                                        <img src="{{ asset('storage/' . $story->image) }}"
                                                            class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                                                    </div>
                                                @endif
                                                <div class="relative mt-2">
                                                    {{-- Decorative Background Text (Watermark) --}}
                                                    <div
                                                        class="absolute -top-12 left-0 font-serif-elegant text-8xl text-[var(--sakura-dark)] opacity-[0.03] select-none italic pointer-events-none">
                                                        Story
                                                    </div>
                                                    {{-- Main Description --}}
                                                    <div class="relative z-10">
                                                        <p
                                                            class="font-serif italic text-lg md:text-xl leading-relaxed tracking-wide text-transparent bg-clip-text bg-gradient-to-br from-stone-700 via-stone-600 to-[var(--sakura-dark)]">
                                                            {{ $story->description }}
                                                        </p>
                                                    </div>
                                                    {{-- Luxury Divider & Signature --}}
                                                    <div class="mt-8 flex items-center gap-6">
                                                        {{-- Custom Elegant Line --}}
                                                        <div class="relative flex-1 h-[1px]">
                                                            <div
                                                                class="absolute inset-0 bg-gradient-to-r from-[var(--sakura-dark)]/40 via-[var(--sakura-dark)]/10 to-transparent">
                                                            </div>
                                                            {{-- Glowing Pulse Dot --}}
                                                            <div
                                                                class="absolute -left-1 -top-[2px] w-[5px] h-[5px] rounded-full bg-[var(--sakura-dark)] shadow-[0_0_10px_var(--sakura-dark)]">
                                                            </div>
                                                        </div>
                                                        {{-- Aesthetic Ornament --}}
                                                        <div
                                                            class="flex items-center gap-2 px-3 py-1 rounded-full border border-[var(--sakura-dark)]/20 bg-[var(--sakura-dark)]/5">
                                                            <svg
                                                                class="w-3 h-3 text-[var(--sakura-dark)] animate-spin-slow">
                                                                <use href="#petal-small" />
                                                            </svg>
                                                            <span
                                                                class="font-montserrat text-[9px] tracking-[0.3em] uppercase text-[var(--sakura-dark)] font-bold">
                                                                Chapter {{ $loop->iteration }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Corner Icon --}}
                                                <div
                                                    class="absolute top-6 right-8 opacity-5 group-hover:opacity-20 transition-opacity">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="currentColor" class="text-[var(--sakura-dark)]">
                                                        <path
                                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                    </svg>
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
                    {{-- Bunga Sakura Besar Berputar (yang sudah ada) --}}
                    <div
                        class="absolute -top-10 -left-10 w-40 h-40 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    <div
                        class="absolute -bottom-10 -right-10 w-48 h-48 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    <div
                        class="absolute top-1/4 -right-5 w-20 h-20 text-[var(--sakura-dark)] opacity-10 animate-[spin_15s_linear_infinite] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    {{-- Efek Kelopak Bunga Berguguran (Baru Ditambahkan) --}}
                    <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-40"
                        style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-12 h-12 text-[var(--sakura-dark)] opacity-30"
                        style="left: 35%; animation: petal-fall-2 18s linear infinite; animation-delay: 2s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-10 h-10 text-[var(--sakura-dark)] opacity-50"
                        style="left: 55%; animation: petal-fall-3 15s linear infinite; animation-delay: 5s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-7 h-7 text-[var(--sakura-dark)] opacity-40"
                        style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-60"
                        style="left: 85%; animation: petal-fall-2 14s linear infinite; animation-delay: 7s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="w-full text-center">
                        <h2 class="font-serif-elegant text-4xl mb-2 text-white">Our Moments</h2>
                        <p class="text-xs text-cyan-500 mb-10 tracking-[0.3em] uppercase">Captured Memories</p>
                        <div class="mx-auto w-full md:max-w-4xl">
                            <div class="swiper mySwiper !pb-12">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $photo->url) }}" class="mx-auto"
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
                    {{-- Bunga Sakura Besar Berputar (yang sudah ada) --}}
                    <div
                        class="absolute -top-10 -left-10 w-40 h-40 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    <div
                        class="absolute -bottom-10 -right-10 w-48 h-48 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    <div
                        class="absolute top-1/4 -right-5 w-20 h-20 text-[var(--sakura-dark)] opacity-10 animate-[spin_15s_linear_infinite] z-0">
                        <svg class="w-full h-full">
                            <use href="#sakura-large" />
                        </svg>
                    </div>
                    {{-- Efek Kelopak Bunga Berguguran (Baru Ditambahkan) --}}
                    <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-40"
                        style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-12 h-12 text-[var(--sakura-dark)] opacity-30"
                        style="left: 35%; animation: petal-fall-2 18s linear infinite; animation-delay: 2s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-10 h-10 text-[var(--sakura-dark)] opacity-50"
                        style="left: 55%; animation: petal-fall-3 15s linear infinite; animation-delay: 5s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-7 h-7 text-[var(--sakura-dark)] opacity-40"
                        style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-60"
                        style="left: 85%; animation: petal-fall-2 14s linear infinite; animation-delay: 7s;">
                        <svg class="w-full h-full">
                            <use href="#petal-small" />
                        </svg>
                    </div>
                    <div class="max-w-xl mx-auto w-full text-center">
                        <div data-aos="fade-up">
                            <h2 class="font-serif-elegant text-4xl mb-2 text-[var(--sakura-dark)]">Digital Gift</h2>
                            <p class="text-[10px] tracking-[0.3em] uppercase text-pink-400 mb-10 font-bold">Tanda Kasih
                            </p>
                        </div>
                        <div class="space-y-6">
                            @if ($invitation->bank_account_1)
                                <div class="luxury-card p-8 bg-white/80 relative overflow-hidden group"
                                    data-aos="zoom-in">
                                    <div
                                        class="absolute -top-2 -right-2 opacity-20 group-hover:rotate-12 transition-transform">
                                        <i data-lucide="flower-2" class="w-12 h-12 text-[var(--sakura-dark)]"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <p
                                            class="text-[var(--sakura-dark)] font-black tracking-widest mb-4 uppercase text-sm italic">
                                            {{ $invitation->bank_name_1 }}</p>
                                        <div class="mb-6">
                                            <p class="text-stone-400 text-[9px] uppercase tracking-[0.2em] mb-1">Nomor
                                                Rekening</p>
                                            <h3 class="text-2xl font-bold text-stone-700 mb-1 tracking-wider">
                                                {{ $invitation->bank_account_1 }}</h3>
                                            <p class="text-xs font-medium text-pink-400 uppercase tracking-wide">A/N
                                                {{ $invitation->bank_owner_1 }}</p>
                                        </div>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                            class="btn-sakura !py-2 !px-8 text-[9px] uppercase tracking-widest flex items-center justify-center gap-2 mx-auto">
                                            <i data-lucide="copy" class="w-3 h-3"></i> Salin Rekening
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if ($invitation->bank_account_2)
                                <div class="luxury-card p-8 bg-white/80 relative overflow-hidden group"
                                    data-aos="zoom-in" data-aos-delay="200">
                                    <div
                                        class="absolute -top-2 -right-2 opacity-20 group-hover:rotate-12 transition-transform">
                                        <i data-lucide="flower-2" class="w-12 h-12 text-[var(--sakura-dark)]"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <p
                                            class="text-[var(--sakura-dark)] font-black tracking-widest mb-4 uppercase text-sm italic">
                                            {{ $invitation->bank_name_2 }}</p>
                                        <div class="mb-6">
                                            <p class="text-stone-400 text-[9px] uppercase tracking-[0.2em] mb-1">Nomor
                                                Rekening</p>
                                            <h3 class="text-2xl font-bold text-stone-700 mb-1 tracking-wider">
                                                {{ $invitation->bank_account_2 }}</h3>
                                            <p class="text-xs font-medium text-pink-400 uppercase tracking-wide">A/N
                                                {{ $invitation->bank_owner_2 }}</p>
                                        </div>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                            class="btn-sakura !py-2 !px-8 text-[9px] uppercase tracking-widest flex items-center justify-center gap-2 mx-auto">
                                            <i data-lucide="copy" class="w-3 h-3"></i> Salin Rekening
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 md:px-6 py-10 md:py-20 relative overflow-hidden">
                {{-- Ornamen Sakura (Dikecilkan untuk HP agar tidak menutupi teks) --}}
                <div
                    class="absolute -top-5 -left-5 w-24 h-24 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute -bottom-5 -right-5 w-28 h-28 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>

                {{-- Efek Kelopak Tetap Ada namun sedikit lebih transparan di HP --}}
                <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-20"
                    style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-20"
                    style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>

                <div class="max-w-xl mx-auto w-full relative z-10">
                    {{-- Judul dikecilkan --}}
                    <h2
                        class="font-serif-elegant text-2xl md:text-4xl text-center mb-6 md:mb-10 text-[var(--sakura-dark)]">
                        Konfirmasi & Doa</h2>

                    <form id="comment-form"
                        class="luxury-card p-5 md:p-8 mb-6 bg-white/90 rounded-2xl shadow-sm border border-pink-50">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            <div class="text-center pb-3 border-b border-pink-100">
                                <p class="text-[8px] font-bold text-pink-300 uppercase tracking-widest mb-0.5">Nama
                                    Tamu</p>
                                <p class="text-lg md:text-xl font-serif-elegant text-[var(--sakura-dark)]">
                                    {{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border-2 border-pink-50 block text-center py-2.5 text-[9px] font-bold uppercase rounded-xl cursor-pointer transition-all text-pink-300 bg-white">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border-2 border-pink-50 block text-center py-2.5 text-[9px] font-bold uppercase rounded-xl cursor-pointer transition-all text-pink-300 bg-white">Absen</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Tulis ucapan..."
                                class="w-full p-3 text-xs bg-pink-50/30 border border-pink-100 rounded-xl focus:ring-1 focus:ring-[var(--sakura-main)] outline-none text-stone-600 transition-all font-serif-elegant italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-sakura w-full py-3 text-[10px] uppercase tracking-[0.15em] font-bold">Kirim
                                Ucapan</button>
                        </div>
                    </form>

                    {{-- Comment List: max-height disesuaikan agar proporsional di HP --}}
                    <div id="comment-list" class="space-y-3 max-h-[35vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div
                                class="comment-item bg-white/60 p-4 rounded-xl border-l-4 border-[var(--sakura-main)] shadow-sm">
                                <div class="flex justify-between items-center mb-1.5">
                                    <h4
                                        class="font-bold text-[9px] md:text-[11px] text-[var(--sakura-dark)] uppercase">
                                        {{ $comment->name }}
                                    </h4>
                                    <span
                                        class="text-[8px] px-2 py-0.5 bg-pink-100 text-[var(--sakura-dark)] rounded-full font-bold">
                                        {{ $comment->presence }}
                                    </span>
                                </div>
                                <p class="text-stone-500 text-[10px] md:text-xs italic leading-relaxed">
                                    "{{ $comment->message }}"</p>

                                @if (!empty(trim($comment->reply)))
                                    <div
                                        class="mt-3 ml-3 p-2 bg-pink-50/50 rounded-lg border-l-2 border-[var(--sakura-dark)]/30">
                                        <p class="text-[8px] font-bold text-[var(--sakura-dark)] uppercase mb-0.5">
                                            Balasan:</p>
                                        <p class="text-stone-500 text-[10px]">{{ $comment->reply }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">
                {{-- Bunga Sakura Besar Berputar (yang sudah ada) --}}
                <div
                    class="absolute -top-10 -left-10 w-40 h-40 md:w-72 md:h-72 text-[var(--sakura-dark)] opacity-10 animate-[spin_20s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-48 h-48 md:w-80 md:h-80 text-[var(--sakura-dark)] opacity-10 animate-[spin_25s_linear_infinite_reverse] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                <div
                    class="absolute top-1/4 -right-5 w-20 h-20 text-[var(--sakura-dark)] opacity-10 animate-[spin_15s_linear_infinite] z-0">
                    <svg class="w-full h-full">
                        <use href="#sakura-large" />
                    </svg>
                </div>
                {{-- Efek Kelopak Bunga Berguguran (Baru Ditambahkan) --}}
                <div class="absolute w-8 h-8 text-[var(--sakura-dark)] opacity-40"
                    style="left: 15%; animation: petal-fall-1 12s linear infinite;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-12 h-12 text-[var(--sakura-dark)] opacity-30"
                    style="left: 35%; animation: petal-fall-2 18s linear infinite; animation-delay: 2s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-10 h-10 text-[var(--sakura-dark)] opacity-50"
                    style="left: 55%; animation: petal-fall-3 15s linear infinite; animation-delay: 5s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-7 h-7 text-[var(--sakura-dark)] opacity-40"
                    style="left: 75%; animation: petal-fall-1 20s linear infinite; animation-delay: 1s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="absolute w-6 h-6 text-[var(--sakura-dark)] opacity-60"
                    style="left: 85%; animation: petal-fall-2 14s linear infinite; animation-delay: 7s;">
                    <svg class="w-full h-full">
                        <use href="#petal-small" />
                    </svg>
                </div>
                <div class="max-w-md mx-auto px-10">
                    <h3 class="font-script text-5xl text-[var(--sakura-dark)] mb-8">Terima Kasih</h3>
                    <p class="font-serif-elegant italic text-stone-500 text-sm leading-relaxed mb-20">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir.
                    </p>
                    <div class="opacity-40 text-[9px] tracking-[0.4em] uppercase font-bold text-pink-400">Sakura Dream
                        Theme</div>
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
        new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });

        function createPetal() {
            const container = document.getElementById('petal-container');
            if (!container) return;
            const petal = document.createElement('div');
            petal.classList.add('petal');
            petal.style.left = Math.random() * 100 + 'vw';
            petal.style.width = Math.random() * 15 + 10 + 'px';
            petal.style.height = petal.style.width;
            petal.style.animationDuration = Math.random() * 5 + 5 + 's';
            container.appendChild(petal);
            setTimeout(() => {
                petal.remove();
            }, 10000);
        }
        setInterval(createPetal, 600);

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

        let isPlaying = true;

        function toggleMusic() {
            const music = document.getElementById('bg-music');
            const icon = document.getElementById('music-icon');
            if (isPlaying) {
                music.pause();
                icon.setAttribute('data-lucide', 'music-2');
            } else {
                music.play();
                icon.setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(val, btn) {
            navigator.clipboard.writeText(val).then(() => {
                const originalText = btn.innerHTML;
                btn.innerHTML = `<i data-lucide="check" class="w-3 h-3"></i> TERSALIN!`;
                lucide.createIcons();
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    lucide.createIcons();
                }, 2000);
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
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('c_name').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const message = document.getElementById('c_message').value;
            const submitBtn = document.getElementById('c_submit');
            const commentList = document.getElementById('comment-list');
            if (!message.trim()) return;
            submitBtn.disabled = true;
            const originalBtnText = submitBtn.innerText;
            submitBtn.innerText = "MENGIRIM...";
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        name: name,
                        presence: presence,
                        message: message
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) throw new Error(data.message || 'Terjadi kesalahan');
                    return data;
                })
                .then(data => {
                    const newCommentHtml = `
            <div class="comment-item bg-white/70 p-5 rounded-2xl border-l-4 border-[var(--sakura-main)] shadow-sm animate-fade-in" style="animation: fadeIn 0.5s ease forwards">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-bold text-[11px] text-[var(--sakura-dark)] uppercase">${name}</h4>
                    <span class="text-[9px] px-2 py-1 bg-pink-100 text-[var(--sakura-dark)] rounded-full font-bold">${presence}</span>
                </div>
                <p class="text-stone-500 text-xs italic leading-relaxed">"${message}"</p>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newCommentHtml);
                    document.getElementById('c_message').value = "";
                    alert("Terima kasih! Ucapan Anda telah terkirim.");
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal mengirim pesan: " + err.message);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = originalBtnText;
                });
        });
        const style = document.createElement('style');
        style.innerHTML = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
        document.head.appendChild(style);
    </script>
</body>

</html>
