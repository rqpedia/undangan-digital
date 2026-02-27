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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;1,600&family=Montserrat:wght@300;400;600&family=Pinyon+Script&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --emerald-deep: #062c21;
            --emerald-vibrant: #0a4d3c;
            --gold-luxury: #d4af37;
            --gold-light: #f1d592;
            --white-ivory: #fcfaf2;
            --glass: rgba(6, 44, 33, 0.8);
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Montserrat', sans-serif;
        }

        .font-script {
            font-family: 'Pinyon Script', cursive;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--emerald-deep);
            color: var(--white-ivory);
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
            z-index: 20;
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
            pointer-events: auto;
        }

        .emerald-overlay {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 5;
            background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, 0.4) 100%);
        }

        #tsparticles {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none !important;
        }

        .luxury-card {
            background: var(--glass);
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(15px);
            border-radius: 20px 0 20px 0;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }

        .btn-emerald {
            background: linear-gradient(135deg, var(--gold-luxury), var(--gold-light));
            color: var(--emerald-deep);
            padding: 14px 40px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.3em;
            font-size: 11px;
            font-weight: 700;
            border-radius: 2px;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
            cursor: pointer;
        }

        .btn-emerald:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
            letter-spacing: 0.4em;
        }

        .presence-options input:checked+label {
            background: var(--gold-luxury);
            color: var(--emerald-deep);
            border-color: var(--gold-light);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
            transform: scale(1.02);
        }

        .presence-options label {
            transition: all 0.3s ease;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        #c_message,
        #c_name {
            color: #ffffff !important;
            background-color: rgba(6, 44, 33, 0.6) !important;
        }

        #c_message:focus {
            background-color: var(--emerald-vibrant) !important;
            border-color: var(--gold-luxury) !important;
        }

        .comment-item {
            background: linear-gradient(to right, rgba(10, 77, 60, 0.2), rgba(6, 44, 33, 0.4));
            border-left: 3px solid var(--gold-luxury);
            transition: transform 0.3s ease;
        }

        .comment-item:hover {
            transform: translateX(5px);
            background: rgba(10, 77, 60, 0.3);
        }

        .gold-border {
            position: relative;
        }

        .gold-border::after {
            content: '';
            position: absolute;
            inset: -2px;
            border: 1px solid var(--gold-luxury);
            border-radius: inherit;
            opacity: 0.5;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        #comment-list::-webkit-scrollbar {
            width: 3px;
        }

        #comment-list::-webkit-scrollbar-thumb {
            background: var(--gold-luxury);
            border-radius: 10px;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
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
    <div class="emerald-overlay"></div>
    <div id="tsparticles"></div>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#031a14] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-[#031a14]/70 backdrop-blur-[1px]"></div>
            </div>
        @endif
        <div class="text-center px-6 z-20" data-aos="fade-up">
            <div class="mb-6 md:mb-8 flex justify-center" data-aos="zoom-in">
                <div
                    class="w-12 h-12 md:w-16 md:h-16 border border-gold-luxury rotate-45 flex items-center justify-center">
                    <span class="font-serif text-xl md:text-2xl text-gold-luxury -rotate-45">E&G</span>
                </div>
            </div>
            <p
                class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase text-gold-luxury font-bold italic">
                The Wedding Invitation
            </p>
            <div class="flex flex-col items-center mb-6 md:mb-10">
                <h1 class="font-script text-5xl md:text-9xl text-white leading-tight">{{ $data['groom'] }}</h1>
                <div class="flex items-center gap-3 md:gap-4 my-2 md:my-4">
                    <div class="w-6 md:w-8 h-[1px] bg-gold-luxury"></div>
                    <span class="font-serif text-xl md:text-2xl text-white italic">&</span>
                    <div class="w-6 md:w-8 h-[1px] bg-gold-luxury"></div>
                </div>
                <h1 class="font-script text-5xl md:text-9xl text-white leading-tight">{{ $data['bride'] }}</h1>
            </div>
            <div class="mb-8 md:mb-12">
                <p class="font-sans text-stone-400 text-[9px] md:text-[10px] uppercase tracking-widest mb-2">Dear
                    Distinguished Guest,</p>
                <h2 class="text-2xl md:text-4xl font-serif text-white tracking-wide mb-6 md:mb-8">{{ $guestName }}
                </h2>
            </div>
            <button onclick="openInvitation()"
                class="btn-emerald px-8 py-3 text-xs md:text-sm tracking-widest uppercase shadow-lg">
                Enter Experience
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-emerald-deep text-gold-luxury p-4 rounded-full border border-gold-luxury/30 cursor-pointer hidden shadow-2xl">
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
                    : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80';
            @endphp
            <section class="snap-section flex items-center justify-center py-10 min-h-screen relative overflow-hidden"
                style="background: linear-gradient(rgba(6,44,33,0.8), rgba(6,44,33,0.9)), url('{{ $heroUrl }}'); background-size: cover; background-position: center;">
                <div data-aos="fade-up" class="text-center px-4 w-full z-10">
                    <div
                        class="mb-8 md:mb-12 tracking-[0.4em] md:tracking-[0.8em] text-[9px] md:text-[10px] uppercase text-gold-luxury font-bold">
                        Save The Date
                    </div>
                    <div class="flex flex-col items-center mb-8 md:mb-10">
                        <h2 class="font-script text-5xl md:text-6xl text-white leading-tight drop-shadow-lg">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif italic text-gold-light text-xl md:text-2xl my-2 md:my-4">and</span>
                        <h2 class="font-script text-5xl md:text-6xl text-white leading-tight drop-shadow-lg">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif text-lg md:text-2xl tracking-[0.2em] md:tracking-[0.4em] text-white border-y border-gold-luxury/30 py-3 md:py-4 mb-10 md:mb-12 inline-block px-6">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d . m . Y') }}
                    </p>
                    <div class="flex justify-center gap-6 md:gap-12">
                        <div class="text-center">
                            <span id="days"
                                class="text-3xl md:text-5xl font-serif text-gold-luxury block">00</span>
                            <span class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Days</span>
                        </div>
                        <div class="text-center">
                            <span id="hours"
                                class="text-3xl md:text-5xl font-serif text-gold-luxury block">00</span>
                            <span
                                class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Hours</span>
                        </div>
                        <div class="text-center">
                            <span id="minutes"
                                class="text-3xl md:text-5xl font-serif text-gold-luxury block">00</span>
                            <span class="text-[8px] md:text-[9px] uppercase tracking-widest text-stone-300">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 bg-[#042119] py-10 md:py-20 relative overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-1 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-6xl mx-auto w-full text-center relative z-10">
                    {{-- Quote Section --}}
                    <div class="mb-8 md:mb-16" data-aos="fade-up">
                        <i data-lucide="quote" class="w-5 h-5 md:w-8 md:h-8 text-gold-luxury/30 mx-auto mb-3"></i>
                        <p class="italic text-white text-sm md:text-xl font-serif leading-relaxed px-4 md:px-20">
                            "And of His signs is that He created for you from yourselves mates that you may find
                            tranquility in them; and He placed between you affection and mercy."
                        </p>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-20">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center w-full md:w-1/2" data-aos="fade-right">
                            <div class="relative group">
                                <div class="absolute -inset-1 gold-border-animated opacity-30 rounded-sm"></div>
                                <div class="relative w-32 h-44 md:w-56 md:h-72 p-1 bg-[#042119] rounded-sm">
                                    <img src="{{ $invitation->groom_photo ? (str_contains($invitation->groom_photo, 'http') ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo)) : '...' }}"
                                        class="w-full h-full object-cover rounded-sm grayscale-[20%]" alt="Groom">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-5xl text-gold-luxury mt-4 mb-1">
                                {{ $invitation->groom_name }}</h3>
                            <p
                                class="font-sans text-[8px] md:text-[10px] uppercase tracking-[0.15em] text-stone-400 px-6">
                                {{ $invitation->groom_info }}</p>
                        </div>

                        {{-- Divider Mobile (Garis Horizontal Tipis) --}}
                        <div class="md:hidden w-16 h-px bg-gold-luxury/30 my-2"></div>

                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center w-full md:w-1/2" data-aos="fade-left">
                            <div class="relative group">
                                <div class="absolute -inset-1 gold-border-animated opacity-30 rounded-sm"></div>
                                <div class="relative w-32 h-44 md:w-56 md:h-72 p-1 bg-[#042119] rounded-sm">
                                    <img src="{{ $invitation->bride_photo ? (str_contains($invitation->bride_photo, 'http') ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo)) : '...' }}"
                                        class="w-full h-full object-cover rounded-sm grayscale-[20%]" alt="Bride">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-5xl text-gold-luxury mt-4 mb-1">
                                {{ $invitation->bride_name }}</h3>
                            <p
                                class="font-sans text-[8px] md:text-[10px] uppercase tracking-[0.15em] text-stone-400 px-6">
                                {{ $invitation->bride_info }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-10 bg-[#042119] relative overflow-hidden">
                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2
                        class="font-serif text-xl md:text-4xl mb-8 md:mb-16 text-white uppercase tracking-[0.2em] md:tracking-[0.5em]">
                        The Celebration
                    </h2>

                    <div class="grid md:grid-cols-2 gap-4 md:gap-8">
                        @foreach ($invitation->events as $event)
                            <div class="luxury-card p-5 md:p-10 flex flex-col items-center border-b-2 md:border-b-4 border-gold-luxury bg-white/5 backdrop-blur-sm"
                                data-aos="fade-up">
                                <h3
                                    class="font-serif text-lg md:text-2xl font-bold text-gold-luxury mb-4 md:mb-8 uppercase tracking-widest">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-4 mb-6 text-center">
                                    <div class="flex flex-col items-center">
                                        <i data-lucide="calendar"
                                            class="w-3.5 h-3.5 md:w-5 md:h-5 text-gold-light mb-1"></i>
                                        <p class="text-white text-sm md:text-lg font-serif italic">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</p>
                                        <p class="text-gold-light/80 text-[10px] md:text-sm">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB -
                                            Selesai</p>
                                    </div>

                                    <div class="flex flex-col items-center px-4">
                                        <i data-lucide="map-pin"
                                            class="w-3.5 h-3.5 md:w-5 md:h-5 text-gold-light mb-1"></i>
                                        <p class="font-bold text-white text-xs md:text-base mb-1">
                                            {{ $event->location_name }}</p>
                                        <p class="text-[9px] md:text-xs text-stone-400 italic leading-snug">
                                            {{ $event->address }}</p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-emerald w-full py-2.5 text-[9px] md:text-xs tracking-widest uppercase font-bold transition-all">
                                        View Location
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Emerald Gold Luxury --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-10 md:py-20 bg-[#042119] relative overflow-hidden">
                    {{-- Ornamen Dikecilkan untuk Mobile --}}
                    <div
                        class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral delay-3 rotate-180">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>

                    <div class="max-w-5xl mx-auto relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-10 md:mb-16">
                            <h2 class="font-serif text-xl md:text-3xl text-white uppercase tracking-[0.2em] md:tracking-[0.4em] mb-3"
                                data-aos="fade-down">
                                Our Love Story
                            </h2>
                            <div class="w-16 h-[1px] bg-gold-luxury mx-auto opacity-50"></div>
                        </div>

                        <div class="space-y-12 md:space-y-24 relative">
                            {{-- Garis Tengah (Hanya Desktop) --}}
                            <div
                                class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-gold-luxury/20 to-transparent">
                            </div>

                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="flex flex-col md:flex-row items-center gap-6 md:gap-0 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">

                                    {{-- Visual Side (Ukuran Asli) --}}
                                    <div class="w-full md:w-1/2 px-4 md:px-10"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                        <div class="relative group mx-auto max-w-[280px] md:max-w-full">
                                            {{-- Bingkai Tipis --}}
                                            <div class="absolute -inset-1.5 border border-gold-luxury/20 rounded-lg">
                                            </div>

                                            <div
                                                class="relative overflow-hidden rounded-md shadow-xl border border-white/5 bg-[#052d22]">
                                                {{-- img-fluid: Mengikuti rasio asli gambar --}}
                                                <img src="{{ asset('storage/' . $story->image) }}"
                                                    class="w-full h-auto object-contain grayscale-[30%] group-hover:grayscale-0 transition-all duration-700"
                                                    alt="{{ $story->title }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Content Side --}}
                                    <div class="w-full md:w-1/2 px-4 md:px-10 text-center {{ $index % 2 == 0 ? 'md:text-left' : 'md:text-right' }}"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">

                                        <div
                                            class="inline-block px-3 py-0.5 mb-4 border border-gold-luxury/30 rounded-full">
                                            <span
                                                class="font-serif text-gold-light text-[9px] md:text-xs tracking-widest uppercase">
                                                {{ $story->date }}
                                            </span>
                                        </div>

                                        <h4
                                            class="font-serif text-lg md:text-2xl text-white uppercase tracking-wider mb-4">
                                            {{ $story->title }}
                                        </h4>

                                        {{-- Bubble Description --}}
                                        <div
                                            class="relative p-5 bg-white/5 backdrop-blur-sm rounded-xl border-l-2 md:border-l-0 {{ $index % 2 == 0 ? 'md:border-l-2' : 'md:border-r-2' }} border-gold-luxury/50">
                                            <p
                                                class="text-stone-300 text-xs md:text-sm leading-relaxed font-serif italic">
                                                "{{ $story->description }}"
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gallery && count($invitation->galleries) > 0)
                <section class="snap-section px-4 bg-[#031a14]">
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
                    <div class="w-full text-center">
                        <h2 class="font-serif text-4xl mb-12 text-white uppercase tracking-[0.5em]"
                            data-aos="fade-up">Gallery</h2>
                        <div class="mx-auto w-full max-w-2xl px-4">
                            <div class="swiper mySwiper !pb-14">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide flex justify-center items-center">
                                            <div class="p-2 gold-border bg-emerald-deep/50 inline-block shadow-2xl">
                                                <img src="{{ asset('storage/' . $photo->url) }}"
                                                    class="w-auto h-auto max-w-full max-h-[60vh] md:max-h-[70vh] object-contain rounded-sm"
                                                    alt="Gallery Moment">
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
                <section class="snap-section px-6 bg-[#042119]">
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
                    <div class="max-w-md mx-auto w-full text-center">
                        <h2 class="font-serif text-4xl mb-6 text-white uppercase tracking-[0.4em]" data-aos="fade-up">
                            Wedding Gift</h2>
                        <p class="font-serif italic text-stone-400 mb-12 text-sm" data-aos="fade-up">Doa restu Anda
                            merupakan karunia terindah, namun jika ingin memberikan tanda kasih, Anda dapat
                            menyalurkannya melalui:</p>
                        <div class="luxury-card p-10 relative overflow-hidden" data-aos="zoom-in">
                            <div class="mb-8">
                                <i data-lucide="credit-card"
                                    class="w-10 h-10 mx-auto text-gold-luxury opacity-60"></i>
                            </div>
                            <p class="text-gold-light font-bold mb-2 uppercase tracking-[0.3em] text-[10px]">
                                {{ $invitation->bank_name_1 ?? 'Bank Name' }}</p>
                            <h3 class="text-2xl font-serif text-white mb-2 tracking-widest" id="acc_number">
                                {{ $invitation->bank_account_1 ?? '0000000000' }}</h3>
                            <p class="text-sm text-stone-400 mb-10 italic">a.n
                                {{ $invitation->bank_owner_1 ?? 'Nama Pemilik' }}</p>
                            <button onclick="copyAccount('{{ $invitation->bank_account_1 }}', this)"
                                class="btn-emerald !py-3 w-full text-[9px]">
                                Copy Account Number
                            </button>
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-8 md:py-20 relative z-30 overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div
                    class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral delay-1 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-2xl mx-auto w-full relative z-10">
                    <h2
                        class="font-serif text-2xl md:text-4xl text-center mb-6 md:mb-12 text-white tracking-[0.3em] uppercase">
                        R.S.V.P</h2>

                    <form id="comment-form"
                        class="luxury-card p-5 md:p-8 mb-6 relative z-40 bg-white/5 backdrop-blur-sm border border-white/10">
                        @csrf
                        <div class="space-y-4">
                            <div class="text-center pb-4 border-b border-gold-luxury/10">
                                <p class="text-[8px] font-bold text-gold-luxury uppercase tracking-[0.3em] mb-1">
                                    Honored Guest</p>
                                <p class="text-xl font-serif text-white">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3 presence-options">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden peer" checked>
                                    <label for="hadir"
                                        class="block text-center py-3 text-[9px] font-bold uppercase cursor-pointer text-stone-400 bg-emerald-900/20 border border-white/5 rounded-lg peer-checked:bg-emerald-800/40 peer-checked:text-white peer-checked:border-gold-luxury/50 transition-all">
                                        Joyfully Attend
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Absen"
                                        class="hidden peer">
                                    <label for="tidak"
                                        class="block text-center py-3 text-[9px] font-bold uppercase cursor-pointer text-stone-400 bg-emerald-900/20 border border-white/5 rounded-lg peer-checked:bg-red-900/30 peer-checked:text-white peer-checked:border-red-500/50 transition-all">
                                        Decline
                                    </label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Leave your warm wishes..."
                                class="w-full p-3 text-xs bg-black/20 border border-gold-luxury/20 focus:border-gold-luxury outline-none text-white transition-all italic block rounded-md"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-emerald w-full py-3 text-[10px] uppercase font-bold tracking-widest">
                                Confirm Presence
                            </button>
                        </div>
                    </form>

                    {{-- Comment List --}}
                    <div id="comment-list" class="space-y-3 max-h-[35vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->where('parent_id', null)->sortByDesc('created_at') as $comment)
                            <div
                                class="comment-item p-4 rounded-lg bg-white/[0.03] border-l-2 border-gold-luxury/30 shadow-md">
                                <div class="flex justify-between items-start mb-1.5">
                                    <div class="flex-grow pr-2">
                                        <h4
                                            class="font-bold text-[10px] text-gold-light uppercase tracking-tight truncate max-w-[150px]">
                                            {{ $comment->name }}
                                        </h4>
                                        <p class="text-[7px] text-stone-500 uppercase">
                                            {{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <span
                                        class="text-[7px] {{ $comment->presence == 'Hadir' ? 'bg-emerald-800/40 text-emerald-200 border-emerald-500/30' : 'bg-red-900/30 text-red-200 border-red-500/30' }} px-2 py-0.5 rounded-full border font-bold uppercase">
                                        {{ $comment->presence }}
                                    </span>
                                </div>
                                <p class="text-stone-300 text-[11px] italic leading-snug">"{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-2.5 ml-2 p-2 bg-black/20 rounded border-l border-gold-luxury/20">
                                        <p class="text-[8px] font-bold text-gold-luxury uppercase mb-0.5">Reply:</p>
                                        <p class="text-stone-400 text-[10px] leading-tight">{{ $comment->reply }}</p>
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
                    <div
                        class="w-12 h-12 border border-gold-luxury/30 rotate-45 flex items-center justify-center mx-auto mb-10 opacity-40">
                        <i data-lucide="crown" class="w-5 h-5 text-gold-luxury -rotate-45"></i>
                    </div>
                    <h3 class="font-script text-5xl text-white mb-6">Thank You</h3>
                    <p class="font-serif italic text-stone-400 text-lg leading-relaxed mb-16">
                        Your presence is the greatest gift of all as we embark on this new chapter together.
                    </p>
                    <div class="opacity-40 text-[9px] tracking-[0.8em] uppercase font-bold text-gold-luxury">The
                        Emerald Collection</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 1500,
            once: true
        });
        lucide.createIcons();
        tsParticles.load("tsparticles", {
            particles: {
                number: {
                    value: 40,
                    density: {
                        enable: true,
                        area: 800
                    }
                },
                color: {
                    value: "#d4af37"
                },
                opacity: {
                    value: {
                        min: 0.1,
                        max: 0.5
                    },
                    animation: {
                        enable: true,
                        speed: 1
                    }
                },
                size: {
                    value: {
                        min: 1,
                        max: 2.5
                    }
                },
                move: {
                    enable: true,
                    speed: 0.8,
                    direction: "top",
                    random: true,
                    straight: false,
                    outModes: {
                        default: "out"
                    },
                }
            }
        });
        let isPlaying = false;
        const music = document.getElementById('bg-music');

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
                document.getElementById('music-icon').setAttribute('data-lucide', 'music-2');
            } else {
                music.play();
                document.getElementById('music-icon').setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyAccount(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerHTML;
                btn.innerHTML = "Copied!";
                setTimeout(() => {
                    btn.innerHTML = originalText;
                }, 2000);
            });
        }
        new Swiper(".mySwiper", {
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });
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
            const list = document.getElementById('comment-list');
            btnSubmit.innerHTML = `<span class="animate-pulse">Sending...</span>`;
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
                    if (!res.ok) throw new Error(data.message || 'Error occurred');
                    return data;
                })
                .then(data => {
                    const badgeClass = presence === 'Hadir' ? 'bg-emerald-800 text-emerald-200' :
                        'bg-red-900/40 text-red-200';
                    const newCommentHtml = `
                    <div class="comment-item p-5 rounded-lg border-r border-gold-luxury/10 shadow-lg animate-fade-in backdrop-blur-sm">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-[11px] text-gold-light uppercase tracking-wider">${name}</h4>
                                <p class="text-[8px] text-stone-500 uppercase">Just Now</p>
                            </div>
                            <span class="text-[8px] ${badgeClass} px-2 py-1 rounded-full border border-current opacity-70 font-bold uppercase tracking-tighter">
                                ${presence}
                            </span>
                        </div>
                        <p class="text-stone-300 text-xs italic leading-relaxed">"${message}"</p>
                    </div>`;
                    list.insertAdjacentHTML('afterbegin', newCommentHtml);
                    document.getElementById('c_message').value = "";
                    list.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch(err => alert("Failed: " + err.message))
                .finally(() => {
                    btnSubmit.innerHTML = "Confirm Presence";
                    btnSubmit.disabled = false;
                });
        });
    </script>
</body>

</html>
