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
            --lavender-light: #f3e5f5;
            --lavender-dark: #7b1fa2;
            --lavender-main: #ce93d8;
            --lavender-leaf: #9575cd;
            --text-dark: #37474f;
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
            background-color: var(--lavender-light);
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
            background-color: var(--lavender-light);
            background-image: url('https://www.transparenttextures.com/patterns/pinstriped-suit.png');
        }

        .luxury-card {
            background: var(--card-white);
            border: 2px solid var(--lavender-main);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(123, 31, 162, 0.1);
        }

        .btn-lavender {
            background: linear-gradient(135deg, var(--lavender-main), var(--lavender-dark));
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(123, 31, 162, 0.3);
            cursor: pointer;
        }

        .btn-lavender:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(123, 31, 162, 0.4);
        }

        .presence-input:checked+label {
            background: var(--lavender-dark);
            color: white;
            border-color: var(--lavender-dark);
        }

        .hero-bg {
            background: linear-gradient(rgba(243, 229, 245, 0.7), rgba(243, 229, 245, 0.85)),
                url('https://images.unsplash.com/photo-1596205737402-9ca28f964030?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .petal {
            position: absolute;
            background-color: #e1bee7;
            border-radius: 50% 0 50% 0;
            animation: petal-fall 10s linear infinite;
            z-index: 1;
            opacity: 0.5;
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
            background: var(--lavender-dark) !important;
        }

        @keyframes orbit-rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-soft {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1);
            }

            50% {
                opacity: 0.6;
                transform: scale(1.05);
            }
        }

        .animate-orbit {
            animation: orbit-rotate 15s linear infinite;
        }

        .animate-orbit-reverse {
            animation: orbit-rotate 20s linear infinite reverse;
        }

        .animate-pulse-soft {
            animation: pulse-soft 4s ease-in-out infinite;
        }

        @keyframes lavender-fall {
            0% {
                transform: translateY(-100%) rotate(0deg) translateX(0);
                opacity: 0;
            }

            15% {
                opacity: 0.6;
            }

            50% {
                transform: translateY(50vh) rotate(20deg) translateX(20px);
            }

            100% {
                transform: translateY(110vh) rotate(45deg) translateX(-20px);
                opacity: 0;
            }
        }

        .lavender-particle {
            position: absolute;
            pointer-events: none;
            z-index: 0;
            top: -10%;
            color: var(--lavender-dark);
        }

        @keyframes lavender-fall {
            0% {
                transform: translateY(-100%) rotate(0deg);
                opacity: 0;
            }

            15% {
                opacity: 0.6;
            }

            100% {
                transform: translateY(110vh) rotate(45deg);
                opacity: 0;
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
            animation: spin-slow 15s linear infinite;
        }

        .animate-spin-slow-reverse {
            animation: spin-slow 20s linear infinite reverse;
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
            animation: spin-slow 10s linear infinite;
        }
    </style>
</head>

<body class="font-sans-light">
    <svg style="display: none;">
        <symbol id="lavender-stem" viewBox="0 0 40 100">
            <path d="M20 100 V30" stroke="currentColor" stroke-width="1.5" fill="none" opacity="0.4" />
            <g fill="currentColor">
                <ellipse cx="20" cy="25" rx="4" ry="7" opacity="0.8" />
                <ellipse cx="15" cy="35" rx="3" ry="6" opacity="0.6" />
                <ellipse cx="25" cy="35" rx="3" ry="6" opacity="0.6" />
                <ellipse cx="18" cy="45" rx="3" ry="6" opacity="0.7" />
                <ellipse cx="22" cy="45" rx="3" ry="6" opacity="0.7" />
                <ellipse cx="20" cy="55" rx="2.5" ry="5" opacity="0.5" />
            </g>
        </symbol>
        <symbol id="wisteria-corner" viewBox="0 0 100 100">
            <path d="M0 0 Q30 5 40 40 T50 100" fill="none" stroke="currentColor" stroke-width="1"
                opacity="0.3" />
            <g fill="currentColor">
                <ellipse cx="40" cy="35" rx="5" ry="7" opacity="0.9" />
                <ellipse cx="35" cy="45" rx="4.5" ry="6.5" opacity="0.8" />
                <ellipse cx="45" cy="48" rx="4.5" ry="6.5" opacity="0.7" />
                <ellipse cx="40" cy="58" rx="4" ry="6" opacity="0.6" />
                <ellipse cx="36" cy="68" rx="3.5" ry="5.5" opacity="0.5" />
                <ellipse cx="42" cy="75" rx="3" ry="5" opacity="0.4" />
                <ellipse cx="39" cy="85" rx="2" ry="4" opacity="0.3" />
                <path d="M5 5 Q15 0 25 10 T35 5" fill="none" stroke="currentColor" stroke-width="0.8"
                    opacity="0.4" />
            </g>
        </symbol>
    </svg>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="petal-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#f8f0fb] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-white/40 backdrop-blur-[1px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#f8f0fb]/20 to-[#f8f0fb]/80"></div>
            </div>
        @endif

        <div class="text-center px-6 z-20 relative w-full" data-aos="zoom-in">
            {{-- Label: Ukuran text-xs diturunkan ke 10px di HP --}}
            <div
                class="mb-3 md:mb-4 tracking-[0.2em] md:tracking-[0.3em] text-[10px] md:text-xs uppercase text-purple-500 font-bold drop-shadow-sm">
                The Wedding of
            </div>

            {{-- Nama Mempelai: Dikecilkan drastis dari 6xl ke 4xl di HP --}}
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-4xl md:text-8xl text-[var(--lavender-dark)] leading-tight drop-shadow-md">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-lg md:text-2xl my-1 md:my-2 text-purple-400 italic">&</span>
                <h1 class="font-script text-4xl md:text-8xl text-[var(--lavender-dark)] leading-tight drop-shadow-md">
                    {{ $data['bride'] }}
                </h1>
            </div>

            {{-- Section Tamu: Jarak antar elemen dipersempit --}}
            <div class="mb-8 md:mb-10">
                <p class="font-serif-elegant italic text-slate-600 text-sm md:text-lg mb-1 md:mb-2">Dear Beloved Guest:
                </p>
                <h2
                    class="text-xl md:text-3xl font-bold text-[var(--text-dark)] tracking-tight mb-3 md:mb-4 drop-shadow-sm leading-tight">
                    {{ $guestName }}
                </h2>
                <div class="w-12 h-[2px] bg-[var(--lavender-main)] mx-auto shadow-sm"></div>
            </div>

            {{-- Button: Lebih compact --}}
            <button onclick="openInvitation()"
                class="btn-lavender uppercase tracking-widest text-[9px] md:text-[10px] px-8 md:px-10 py-3 shadow-lg transition-transform active:scale-95">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/80 text-[var(--lavender-dark)] p-3 rounded-full shadow-lg cursor-pointer hidden border border-[var(--lavender-main)]">
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
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-[#f3e5f5]">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-[#f3e5f5]"></div>
                    @endif
                    <div class="absolute inset-0 bg-white/20 backdrop-blur-[1px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-purple-50/30 via-transparent to-purple-100/60">
                    </div>
                </div>

                <div data-aos="fade-up" class="text-center z-10 relative px-4">
                    <div
                        class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[9px] md:text-[10px] uppercase text-[var(--lavender-dark)] font-bold drop-shadow-sm">
                        A Beautiful Beginning
                    </div>
                    {{-- Nama di Hero: Dikecilkan drastis --}}
                    <div class="flex flex-col items-center mb-6 md:mb-8">
                        <h2 class="font-script text-5xl md:text-8xl text-[var(--lavender-dark)] drop-shadow-md">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif-elegant text-xl md:text-3xl text-purple-500 italic my-1">&</span>
                        <h2 class="font-script text-5xl md:text-8xl text-[var(--lavender-dark)] drop-shadow-md">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-elegant text-lg md:text-2xl text-[var(--text-dark)] mb-8 md:mb-10 tracking-wide">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}
                    </p>
                    {{-- Countdown: Padding diperkecil --}}
                    <div
                        class="flex justify-center gap-4 md:gap-10 bg-white/70 backdrop-blur-md p-4 md:p-6 rounded-2xl md:rounded-3xl border border-white/80 shadow-xl shadow-purple-200/20">
                        @foreach (['days' => 'Hari', 'hours' => 'Jam', 'minutes' => 'Menit'] as $id => $label)
                            <div class="flex flex-col items-center min-w-[50px]">
                                <span id="{{ $id }}"
                                    class="text-2xl md:text-3xl font-serif-elegant text-[var(--lavender-dark)]">00</span>
                                <span
                                    class="text-[8px] uppercase text-purple-500 font-bold tracking-widest">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="snap-section px-4 md:px-6 py-12 relative overflow-hidden">
                {{-- Ornamen Wisteria: Dikecilkan ukurannya --}}
                <div
                    class="absolute -top-2 -left-2 w-24 h-24 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute -top-2 -right-2 w-24 h-24 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    {{-- Quote: Font size dikecilkan agar tidak makan tempat --}}
                    <div
                        class="italic text-slate-500 text-xs md:text-sm leading-relaxed font-serif-elegant mb-10 md:mb-16 px-4">
                        "And among His signs is this, that He created for you mates from among yourselves, that you may
                        dwell in tranquility with them."
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">
                        {{-- Foto Mempelai: Ukuran diperkecil dari w-56 ke w-40 di HP --}}
                        @foreach (['groom', 'bride'] as $type)
                            <div class="flex flex-col items-center">
                                <div class="relative w-40 h-40 md:w-56 md:h-56 mb-4 md:mb-6 group">
                                    <div
                                        class="absolute -inset-3 border border-dashed border-[var(--lavender-dark)] rounded-full opacity-20 {{ $type == 'groom' ? 'animate-orbit' : 'animate-orbit-reverse' }}">
                                    </div>
                                    <div
                                        class="absolute inset-0 rounded-full border-4 border-white p-1 shadow-lg bg-white overflow-hidden z-10">
                                        <img src="{{ $invitation->{$type . '_photo'} ? asset('storage/' . $invitation->{$type . '_photo'}) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->{$type . '_name'}) . '&background=ce93d8&color=fff' }}"
                                            class="w-full h-full object-cover rounded-full">
                                    </div>
                                </div>
                                <h3 class="font-script text-3xl md:text-4xl text-[var(--lavender-dark)] mb-1">
                                    {{ $invitation->{$type . '_name'} }}
                                </h3>
                                <p class="font-serif-elegant text-slate-500 text-[11px] md:text-sm px-6">
                                    {{ $invitation->{$type . '_info'} }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="snap-section px-4 md:px-6 py-12">
                <div class="max-w-5xl mx-auto w-full text-center">
                    <h2
                        class="font-serif-elegant text-2xl md:text-4xl mb-8 md:mb-12 text-[var(--lavender-dark)] uppercase tracking-widest">
                        Agenda Acara</h2>
                    {{-- Card Agenda: Padding p-8 ke p-6 --}}
                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-8 flex flex-col items-center bg-white/80 shadow-lg border border-purple-50">
                                <div class="w-10 h-10 bg-purple-50 rounded-full flex items-center justify-center mb-3">
                                    <i data-lucide="calendar-heart" class="text-[var(--lavender-dark)] w-5 h-5"></i>
                                </div>
                                <h3
                                    class="font-serif-elegant text-xl md:text-2xl font-bold text-[var(--lavender-dark)] mb-4 uppercase tracking-wider">
                                    {{ $event->event_name }}
                                </h3>
                                <div class="space-y-1 mb-6">
                                    <p class="text-slate-600 font-bold text-base">
                                        {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                    </p>
                                    <p class="text-slate-500 text-sm">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - Selesai
                                    </p>
                                    <div class="pt-3">
                                        <p
                                            class="font-bold text-[var(--lavender-leaf)] uppercase text-[10px] tracking-widest mb-1">
                                            {{ $event->location_name }}
                                        </p>
                                        <p class="text-[11px] text-slate-400 px-4">{{ $event->address }}</p>
                                    </div>
                                </div>
                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-lavender !py-2.5 text-[9px] w-full max-w-[200px] text-center">Petunjuk
                                        Lokasi</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-16 md:py-24 relative overflow-hidden bg-[#FBFBFF]">
                    {{-- Soft Glow Background --}}
                    <div
                        class="absolute top-1/4 -left-20 w-60 h-60 md:w-80 md:h-80 bg-[var(--lavender-dark)]/10 rounded-full blur-[100px]">
                    </div>
                    <div
                        class="absolute bottom-1/4 -right-20 w-60 h-60 md:w-80 md:h-80 bg-purple-200/20 rounded-full blur-[100px]">
                    </div>

                    <div class="max-w-5xl mx-auto relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-12 md:mb-20">
                            <span
                                class="text-[var(--lavender-dark)] font-bold text-[9px] md:text-[10px] tracking-[0.4em] md:tracking-[0.5em] uppercase mb-2 block opacity-70">
                                Aromatic Memories
                            </span>
                            <h2 class="font-serif-elegant text-4xl md:text-6xl text-stone-800 mb-4 md:mb-6">
                                Our <span class="text-[var(--lavender-dark)] italic">Story</span>
                            </h2>
                            <div
                                class="w-16 md:w-24 h-[1px] bg-gradient-to-r from-transparent via-[var(--lavender-dark)] to-transparent mx-auto">
                            </div>
                        </div>

                        <div class="relative">
                            {{-- Timeline Line --}}
                            <div
                                class="absolute left-3 md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-[0.5px] bg-[var(--lavender-dark)]/20">
                            </div>

                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex items-start justify-between md:justify-normal md:odd:flex-row-reverse group mb-12 md:mb-24">

                                    {{-- Bullet: Lavender Icon --}}
                                    <div
                                        class="flex items-center justify-center w-7 h-7 md:w-12 md:h-12 rounded-full border border-[var(--lavender-dark)]/40 bg-white text-[var(--lavender-dark)] absolute left-0 md:left-1/2 md:-translate-x-1/2 z-20 shadow-sm group-hover:bg-[var(--lavender-dark)] group-hover:text-white transition-all duration-500">
                                        <svg class="w-4 h-4 md:w-6 md:h-6">
                                            <use href="#lavender-particle" />
                                        </svg>
                                    </div>

                                    {{-- Card Content --}}
                                    <div class="w-[calc(100%-2.5rem)] md:w-[calc(50%-3rem)] ml-auto md:ml-0">
                                        <div
                                            class="relative bg-white/60 backdrop-blur-md p-5 md:p-8 rounded-3xl border border-white shadow-sm hover:shadow-md transition-all duration-500 overflow-hidden">

                                            {{-- Date Tag --}}
                                            <div class="inline-flex items-center gap-2 mb-3">
                                                <div class="h-[1px] w-4 bg-[var(--lavender-dark)]/50"></div>
                                                <span
                                                    class="text-[var(--lavender-dark)] font-bold text-sm md:text-base tracking-tight">
                                                    {{ $story->date }}
                                                </span>
                                            </div>

                                            <h4
                                                class="font-serif-elegant text-xl md:text-2xl text-stone-800 mb-4 leading-tight group-hover:text-[var(--lavender-dark)] transition-colors">
                                                {{ $story->title }}
                                            </h4>

                                            @if ($story->image)
                                                <div
                                                    class="relative rounded-2xl overflow-hidden mb-4 bg-stone-50 border border-stone-100 shadow-inner">
                                                    {{-- Menampilkan Gambar Ukuran Asli (Tanpa Potong) --}}
                                                    <img src="{{ asset('storage/' . $story->image) }}"
                                                        class="w-full h-auto max-h-[400px] object-contain mx-auto transition-transform duration-700 group-hover:scale-105"
                                                        alt="{{ $story->title }}">
                                                </div>
                                            @endif

                                            <div class="relative">
                                                {{-- Watermark Memoir dikecilkan di HP --}}
                                                <div
                                                    class="absolute -top-6 left-0 font-serif-elegant text-5xl md:text-7xl text-[var(--lavender-dark)] opacity-[0.03] select-none italic pointer-events-none">
                                                    Memoir
                                                </div>
                                                <p
                                                    class="relative z-10 font-serif italic text-sm md:text-base leading-relaxed text-slate-600">
                                                    {{ $story->description }}
                                                </p>
                                            </div>

                                            {{-- Chapter Label --}}
                                            <div class="mt-6 flex items-center justify-end">
                                                <div
                                                    class="flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--lavender-dark)]/5 border border-[var(--lavender-dark)]/10">
                                                    <span
                                                        class="text-[8px] md:text-[9px] tracking-widest uppercase text-[var(--lavender-dark)] font-bold">
                                                        Chapter {{ $loop->iteration }}
                                                    </span>
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
                    <div
                        class="absolute -top-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -top-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: scaleX(-1);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: scaleY(-1);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                        <div class="lavender-particle absolute w-4 h-12 text-[var(--lavender-dark)] opacity-40"
                            style="left: 15%; animation: lavender-fall 12s linear infinite;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                        <div class="lavender-particle absolute w-6 h-16 text-[var(--lavender-dark)] opacity-30"
                            style="left: 45%; animation: lavender-fall 18s linear infinite; animation-delay: 3s;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                        <div class="lavender-particle absolute w-3 h-10 text-[var(--lavender-dark)] opacity-50"
                            style="left: 75%; animation: lavender-fall 15s linear infinite; animation-delay: 6s;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                    </div>
                    <div class="lavender-particle w-6 h-16"
                        style="left: 85%; animation: lavender-fall 16s linear infinite; animation-delay: 4s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
                        </svg>
                    </div>
                    <div class="lavender-particle w-4 h-10"
                        style="left: 15%; animation: lavender-fall 20s linear infinite; animation-delay: 8s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
                        </svg>
                    </div>
                    <div class="lavender-particle w-5 h-14"
                        style="left: 75%; animation: lavender-fall 13s linear infinite; animation-delay: 3s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
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
                    <div
                        class="absolute -top-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -top-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: scaleX(-1);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: scaleY(-1);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#wisteria-corner" />
                        </svg>
                    </div>
                    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                        <div class="lavender-particle absolute w-4 h-12 text-[var(--lavender-dark)] opacity-40"
                            style="left: 15%; animation: lavender-fall 12s linear infinite;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                        <div class="lavender-particle absolute w-6 h-16 text-[var(--lavender-dark)] opacity-30"
                            style="left: 45%; animation: lavender-fall 18s linear infinite; animation-delay: 3s;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                        <div class="lavender-particle absolute w-3 h-10 text-[var(--lavender-dark)] opacity-50"
                            style="left: 75%; animation: lavender-fall 15s linear infinite; animation-delay: 6s;">
                            <svg class="w-full h-full">
                                <use href="#lavender-particle" />
                            </svg>
                        </div>
                    </div>
                    <div class="lavender-particle w-6 h-16"
                        style="left: 85%; animation: lavender-fall 16s linear infinite; animation-delay: 4s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
                        </svg>
                    </div>
                    <div class="lavender-particle w-4 h-10"
                        style="left: 15%; animation: lavender-fall 20s linear infinite; animation-delay: 8s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
                        </svg>
                    </div>
                    <div class="lavender-particle w-5 h-14"
                        style="left: 75%; animation: lavender-fall 13s linear infinite; animation-delay: 3s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-stem" />
                        </svg>
                    </div>
                    <div class="max-w-xl mx-auto w-full text-center">
                        <div data-aos="fade-up">
                            <h2 class="font-serif-elegant text-4xl mb-2 text-[var(--lavender-dark)]">Digital Gift</h2>
                            <p class="text-[10px] tracking-[0.3em] uppercase text-purple-400 mb-10 font-bold">Wedding
                                Gift</p>
                        </div>
                        <div class="space-y-6">
                            @if ($invitation->bank_account_1)
                                <div class="luxury-card p-8 bg-white/80 relative overflow-hidden group"
                                    data-aos="zoom-in">
                                    <div class="absolute -top-2 -right-2 opacity-20">
                                        <i data-lucide="sparkles" class="w-12 h-12 text-[var(--lavender-dark)]"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <p
                                            class="text-[var(--lavender-dark)] font-black tracking-widest mb-4 uppercase text-sm italic">
                                            {{ $invitation->bank_name_1 }}</p>
                                        <div class="mb-6">
                                            <p class="text-slate-400 text-[9px] uppercase tracking-[0.2em] mb-1">Nomor
                                                Rekening</p>
                                            <h3 class="text-2xl font-bold text-slate-700 mb-1 tracking-wider">
                                                {{ $invitation->bank_account_1 }}</h3>
                                            <p class="text-xs font-medium text-purple-400 uppercase tracking-wide">A/N
                                                {{ $invitation->bank_owner_1 }}</p>
                                        </div>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                            class="btn-lavender !py-2 !px-8 text-[9px] uppercase tracking-widest flex items-center justify-center gap-2 mx-auto">
                                            <i data-lucide="copy" class="w-3 h-3"></i> Salin Nomor
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-12 md:px-6 relative overflow-hidden bg-white">
                {{-- Decorative Corners - Dikecilkan untuk HP --}}
                <div
                    class="absolute -top-2 -left-2 w-24 h-24 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-10 z-0">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute -top-2 -right-2 w-24 h-24 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-10 z-0"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>

                {{-- Lavender Particles - Hanya muncul di Desktop agar tidak mengganggu fokus input di HP --}}
                <div class="hidden md:block absolute inset-0 pointer-events-none overflow-hidden z-0">
                    <div class="lavender-particle absolute w-4 h-12 text-[var(--lavender-dark)] opacity-40"
                        style="left: 15%; animation: lavender-fall 12s linear infinite;">
                        <svg class="w-full h-full">
                            <use href="#lavender-particle" />
                        </svg>
                    </div>
                </div>

                <div class="max-w-xl mx-auto w-full relative z-10">
                    {{-- Header --}}
                    <div class="text-center mb-8">
                        <h2 class="font-serif-elegant text-3xl md:text-4xl text-[var(--lavender-dark)] mb-2">Konfirmasi
                            & Doa</h2>
                        <p class="text-[10px] md:text-xs text-slate-400 tracking-widest uppercase">Kehadiran Anda
                            adalah kado terindah</p>
                    </div>

                    {{-- Form --}}
                    <form id="comment-form"
                        class="luxury-card p-5 md:p-8 mb-6 bg-white/90 backdrop-blur-sm border border-purple-50 shadow-sm rounded-3xl">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            {{-- Nama Tamu --}}
                            <div class="text-center pb-3 border-b border-purple-50">
                                <p class="text-[8px] font-bold text-purple-300 uppercase tracking-[0.2em] mb-1">Nama
                                    Tamu</p>
                                <p class="text-lg font-serif-elegant text-[var(--lavender-dark)]">{{ $guestName }}
                                </p>
                                <input type="hidden" id="c_name" name="name" value="{{ $guestName }}">
                            </div>

                            {{-- Presence Toggle --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-purple-100 block text-center py-2.5 text-[9px] md:text-[10px] font-bold uppercase rounded-xl cursor-pointer transition-all text-purple-300">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-purple-100 block text-center py-2.5 text-[9px] md:text-[10px] font-bold uppercase rounded-xl cursor-pointer transition-all text-purple-300">Berhalangan</label>
                                </div>
                            </div>

                            {{-- Textarea --}}
                            <textarea id="c_message" name="message" rows="3" placeholder="Tulis ucapan dan doa..."
                                class="w-full p-4 text-xs md:text-sm bg-purple-50/30 border border-purple-100 rounded-2xl focus:ring-1 focus:ring-[var(--lavender-main)] outline-none text-slate-600 transition-all placeholder:text-slate-300"
                                required></textarea>

                            {{-- Submit Button --}}
                            <button type="submit" id="c_submit"
                                class="btn-lavender w-full py-3 md:py-4 text-[10px] md:text-[11px] uppercase tracking-widest font-bold rounded-xl shadow-md active:scale-95 transition-transform">
                                <span id="btn-text">Kirim Ucapan</span>
                            </button>
                        </div>
                    </form>

                    {{-- Comment List --}}
                    <div id="comment-list" class="space-y-3 max-h-[35vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/60 p-4 rounded-2xl border border-purple-50 shadow-sm transition-all">
                                <div class="flex justify-between items-center mb-1.5">
                                    <h4
                                        class="font-bold text-[10px] text-[var(--lavender-dark)] uppercase tracking-tight">
                                        {{ $comment->name }}
                                    </h4>
                                    <span
                                        class="text-[8px] px-2 py-0.5 bg-purple-50 text-[var(--lavender-dark)] rounded-full font-bold border border-purple-100">
                                        {{ $comment->presence }}
                                    </span>
                                </div>
                                <p class="text-slate-500 text-[11px] italic leading-relaxed">"{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div
                                        class="mt-3 ml-2 p-3 bg-white/50 rounded-xl border-l-2 border-[var(--lavender-dark)]/20">
                                        <div class="flex items-center gap-1.5 mb-1">
                                            <p class="text-[8px] font-bold text-[var(--lavender-dark)] uppercase">
                                                Balasan:</p>
                                        </div>
                                        <p class="text-slate-500 text-[10px] leading-snug">{{ $comment->reply }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">
                <div
                    class="absolute -top-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute -top-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute -bottom-4 -left-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                    style="transform: scaleY(-1);">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute -bottom-4 -right-4 w-40 h-40 md:w-72 md:h-72 text-[var(--lavender-dark)] opacity-20 z-0"
                    style="transform: rotate(180deg);">
                    <svg class="w-full h-full">
                        <use href="#wisteria-corner" />
                    </svg>
                </div>
                <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                    <div class="lavender-particle absolute w-4 h-12 text-[var(--lavender-dark)] opacity-40"
                        style="left: 15%; animation: lavender-fall 12s linear infinite;">
                        <svg class="w-full h-full">
                            <use href="#lavender-particle" />
                        </svg>
                    </div>
                    <div class="lavender-particle absolute w-6 h-16 text-[var(--lavender-dark)] opacity-30"
                        style="left: 45%; animation: lavender-fall 18s linear infinite; animation-delay: 3s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-particle" />
                        </svg>
                    </div>
                    <div class="lavender-particle absolute w-3 h-10 text-[var(--lavender-dark)] opacity-50"
                        style="left: 75%; animation: lavender-fall 15s linear infinite; animation-delay: 6s;">
                        <svg class="w-full h-full">
                            <use href="#lavender-particle" />
                        </svg>
                    </div>
                </div>
                <div class="lavender-particle w-6 h-16"
                    style="left: 85%; animation: lavender-fall 16s linear infinite; animation-delay: 4s;">
                    <svg class="w-full h-full">
                        <use href="#lavender-stem" />
                    </svg>
                </div>
                <div class="lavender-particle w-4 h-10"
                    style="left: 15%; animation: lavender-fall 20s linear infinite; animation-delay: 8s;">
                    <svg class="w-full h-full">
                        <use href="#lavender-stem" />
                    </svg>
                </div>
                <div class="lavender-particle w-5 h-14"
                    style="left: 75%; animation: lavender-fall 13s linear infinite; animation-delay: 3s;">
                    <svg class="w-full h-full">
                        <use href="#lavender-stem" />
                    </svg>
                </div>
                <div class="max-w-md mx-auto px-10">
                    <i data-lucide="heart"
                        class="w-10 h-10 text-[var(--lavender-main)] mx-auto mb-6 fill-current"></i>
                    <h3 class="font-script text-5xl text-[var(--lavender-dark)] mb-8">Terima Kasih</h3>
                    <p class="font-serif-elegant italic text-slate-500 text-sm leading-relaxed mb-20">
                        Kami sangat menantikan kehadiran Anda di hari bahagia kami.
                    </p>
                    <div class="opacity-40 text-[9px] tracking-[0.4em] uppercase font-bold text-purple-400">Lavender
                        Mist Theme</div>
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
            petal.style.width = Math.random() * 12 + 8 + 'px';
            petal.style.height = petal.style.width;
            petal.style.animationDuration = Math.random() * 5 + 5 + 's';
            container.appendChild(petal);
            setTimeout(() => {
                petal.remove();
            }, 10000);
        }
        setInterval(createPetal, 700);

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
            e.stopPropagation();
            const submitBtn = document.getElementById('c_submit');
            const btnText = document.getElementById('btn-text');
            const messageInput = document.getElementById('c_message');
            const name = document.getElementById('c_name').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const message = messageInput.value;
            submitBtn.disabled = true;
            btnText.innerText = "MENGIRIM...";
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        name: name,
                        presence: presence,
                        message: message
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        throw new Error(data.message || 'Terjadi kesalahan sistem');
                    }
                    return data;
                })
                .then(data => {
                    const list = document.getElementById('comment-list');
                    const newComment = `
            <div class="bg-white/70 p-5 rounded-2xl border-l-4 border-[var(--lavender-main)] shadow-sm animate-fade-in">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-bold text-[11px] text-[var(--lavender-dark)] uppercase">${name}</h4>
                    <span class="text-[9px] px-2 py-1 bg-purple-100 text-[var(--lavender-dark)] rounded-full font-bold">${presence}</span>
                </div>
                <p class="text-slate-500 text-xs italic">"${message}"</p>
            </div>`;
                    list.insertAdjacentHTML('afterbegin', newComment);
                    messageInput.value = "";
                    alert("Terima kasih! Ucapan Anda telah tersimpan.");
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal mengirim pesan: " + err.message);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    btnText.innerText = "KIRIM UCAPAN";
                });
        });
    </script>
</body>

</html>
