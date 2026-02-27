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
            --rustic-brown: #8d6e63;
            --rustic-dark: #4e342e;
            --rustic-clay: #a1887f;
            --rustic-beige: #f5f5f5;
            --text-dark: #3e2723;
            --card-white: rgba(255, 255, 255, 0.85);
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
            background-color: #d7ccc8;
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
            background-color: #efebe9;
            background-image: url('https://www.transparenttextures.com/patterns/recycled-paper.png');
        }

        .luxury-card {
            background: var(--card-white);
            border: 1px solid #d7ccc8;
            border-radius: 4px;
            box-shadow: 0 12px 40px rgba(62, 39, 35, 0.1);
        }

        .btn-rustic {
            background: var(--rustic-dark);
            color: #d7ccc8;
            font-weight: 500;
            border-radius: 0px;
            padding: 12px 35px;
            transition: all 0.4s ease;
            border: 1px solid var(--rustic-dark);
            cursor: pointer;
            letter-spacing: 2px;
        }

        .btn-rustic:hover {
            background: transparent;
            color: var(--rustic-dark);
        }

        .presence-input:checked+label {
            background: var(--rustic-dark);
            color: white;
            border-color: var(--rustic-dark);
        }

        .hero-bg {
            background: linear-gradient(rgba(78, 52, 46, 0.4), rgba(78, 52, 46, 0.4)),
                url('https://images.unsplash.com/photo-1510076857177-7470076d4098?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .particle {
            position: absolute;
            background-color: #a1887f;
            border-radius: 50%;
            animation: float-up 15s linear infinite;
            z-index: 1;
            opacity: 0.3;
            pointer-events: none;
        }

        @keyframes float-up {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            20% {
                opacity: 0.4;
            }

            100% {
                transform: translateY(-10vh) translateX(100px);
                opacity: 0;
            }
        }

        .swiper-pagination-bullet-active {
            background: var(--rustic-dark) !important;
        }
    </style>
</head>

<body class="font-sans-light">
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
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="particle-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#efebe9] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">

        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-stone-100/50 backdrop-blur-[1px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#efebe9]/20 to-[#efebe9]/90"></div>
            </div>
        @endif

        <div class="absolute inset-0 opacity-10 z-10 pointer-events-none"
            style="background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png');"></div>

        <div class="text-center px-4 z-20 relative" data-aos="fade-up">
            <div
                class="mb-3 md:mb-4 tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase text-stone-600 font-bold">
                The Wedding of
            </div>

            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-5xl md:text-8xl text-[var(--rustic-dark)] drop-shadow-sm leading-tight">
                    {{ $data['groom'] }}
                </h1>

                <div class="w-8 md:w-12 h-[1px] bg-stone-400 my-3 md:my-6"></div>

                <h1 class="font-script text-5xl md:text-8xl text-[var(--rustic-dark)] drop-shadow-sm leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>

            <div class="mb-8 md:mb-10">
                <p class="font-serif-elegant italic text-stone-500 text-xs md:text-sm mb-1 md:mb-2">Special Invitation
                    for:</p>
                <h2 class="text-2xl md:text-3xl font-serif-elegant text-[var(--text-dark)] mb-4 tracking-wide">
                    {{ $guestName }}
                </h2>
            </div>

            <button onclick="openInvitation()"
                class="btn-rustic uppercase text-[9px] md:text-[10px] tracking-[0.2em] px-8 md:px-10 py-2.5 md:py-3 shadow-lg">
                Open Invitation
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/50 text-[var(--rustic-dark)] p-3 rounded-full shadow-sm cursor-pointer hidden border border-stone-200">
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
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-zinc-900">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-zinc-800"></div>
                    @endif
                    <div class="absolute inset-0 bg-black/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60"></div>
                </div>
                <div data-aos="zoom-out" class="text-center text-white z-10 relative px-4">
                    <div
                        class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase font-bold opacity-80">
                        Our Journey Begins
                    </div>
                    <div class="flex flex-col items-center mb-6 md:mb-8">
                        <h2 class="font-script text-5xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif-elegant text-lg md:text-2xl my-1 md:my-2 italic opacity-60">and</span>
                        <h2 class="font-script text-5xl md:text-8xl text-white drop-shadow-2xl leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p class="font-serif-elegant text-sm md:text-xl mb-8 md:mb-10 tracking-[0.2em] drop-shadow-md">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d.m.Y') }}
                    </p>
                    <div
                        class="flex justify-center gap-4 md:gap-8 bg-black/40 backdrop-blur-xl p-4 md:p-6 rounded-sm border border-white/20 shadow-2xl inline-flex mx-auto">
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="days" class="text-xl md:text-3xl font-serif-elegant">00</span>
                            <span class="text-[7px] md:text-[8px] uppercase tracking-tighter opacity-70">Days</span>
                        </div>
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="hours" class="text-xl md:text-3xl font-serif-elegant">00</span>
                            <span class="text-[7px] md:text-[8px] uppercase tracking-tighter opacity-70">Hours</span>
                        </div>
                        <div class="flex flex-col items-center min-w-[50px]">
                            <span id="minutes" class="text-xl md:text-3xl font-serif-elegant">00</span>
                            <span class="text-[7px] md:text-[8px] uppercase tracking-tighter opacity-70">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 md:px-6 py-12">
                <div class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                        <div class="flex flex-col items-center">
                            <div
                                class="relative w-40 h-56 md:w-52 md:h-72 mb-4 md:mb-8 p-1.5 bg-white shadow-lg rotate-[-2deg]">
                                <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->groom_name) }}"
                                    class="w-full h-full object-cover grayscale">
                            </div>
                            <h3 class="font-script text-4xl md:text-5xl text-[var(--rustic-dark)] mb-1 md:mb-2">
                                {{ $invitation->groom_name }}</h3>
                            <p
                                class="font-serif-elegant text-stone-500 text-[10px] md:text-xs tracking-wider uppercase">
                                {{ $invitation->groom_info }}</p>
                        </div>

                        <div class="flex flex-col items-center">
                            <div
                                class="relative w-40 h-56 md:w-52 md:h-72 mb-4 md:mb-8 p-1.5 bg-white shadow-lg rotate-[2deg]">
                                <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->bride_name) }}"
                                    class="w-full h-full object-cover grayscale">
                            </div>
                            <h3 class="font-script text-4xl md:text-5xl text-[var(--rustic-dark)] mb-1 md:mb-2">
                                {{ $invitation->bride_name }}</h3>
                            <p
                                class="font-serif-elegant text-stone-500 text-[10px] md:text-xs tracking-wider uppercase">
                                {{ $invitation->bride_info }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 md:px-6 bg-[#efebe9] py-12">
                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2
                        class="font-serif-elegant text-xl md:text-3xl mb-8 md:mb-12 text-[var(--rustic-dark)] tracking-[0.2em] uppercase">
                        The Celebration
                    </h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 md:gap-12">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-10 flex flex-col items-center border-t-4 border-t-[var(--rustic-brown)] bg-white shadow-sm">
                                <h3
                                    class="font-serif-elegant text-lg md:text-xl font-bold text-[var(--rustic-dark)] mb-4 md:mb-6 uppercase tracking-widest">
                                    {{ $event->event_name }}
                                </h3>
                                <div class="space-y-2 md:space-y-3 mb-6 md:mb-8">
                                    <p class="text-stone-600 font-serif-elegant text-base md:text-lg">
                                        {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                    </p>
                                    <p class="text-stone-400 text-xs md:text-sm tracking-widest">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - Selesai
                                    </p>
                                    <div class="pt-3 border-t border-stone-100">
                                        <p class="font-bold text-stone-700 uppercase text-[10px] md:text-xs mb-1">
                                            {{ $event->location_name }}
                                        </p>
                                        <p class="text-[10px] md:text-[11px] text-stone-400 italic leading-relaxed">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-rustic !py-2.5 !px-6 text-[8px] md:text-[9px] w-full text-center">View
                                        Map</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Rustic Earthy Style --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 md:px-6 py-12 md:py-20 bg-[#efebe9] relative overflow-hidden">
                    {{-- Ornamen Sudut (Dikecilkan untuk HP) --}}
                    <div
                        class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>

                    <div class="max-w-5xl mx-auto relative z-10">
                        {{-- Header: Margin dikurangi --}}
                        <div class="text-center mb-12 md:mb-16">
                            <h2 class="font-serif-elegant text-2xl md:text-3xl text-[var(--rustic-dark)] tracking-[0.2em] uppercase"
                                data-aos="fade-down">
                                How It Started
                            </h2>
                            <div class="w-10 h-[1.5px] bg-[var(--rustic-brown)] mx-auto mt-3 opacity-60"></div>
                        </div>

                        <div class="relative">
                            {{-- Garis Tengah Desktop --}}
                            <div
                                class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-[1px] bg-[var(--rustic-brown)] opacity-20">
                            </div>

                            <div class="space-y-12 md:space-y-20">
                                @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                    <div
                                        class="flex flex-col md:flex-row items-center gap-6 md:gap-0 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">

                                        {{-- Image Side --}}
                                        <div class="w-full md:w-1/2 px-4 md:px-10"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                            <div class="relative flex justify-center">
                                                <div
                                                    class="bg-white p-2 shadow-sm rotate-{{ $index % 2 == 0 ? '1' : '-1' }} inline-block">
                                                    {{-- Gambar asli: Tanpa aspect-ratio paksaan, menggunakan h-auto --}}
                                                    <div class="max-w-xs md:max-w-sm">
                                                        <img src="{{ asset('storage/' . $story->image) }}"
                                                            class="w-full h-auto block rounded-sm shadow-inner"
                                                            alt="{{ $story->title }}">
                                                    </div>
                                                    <div class="mt-2 text-center">
                                                        <span
                                                            class="font-serif-elegant text-[9px] tracking-[0.1em] text-stone-400 uppercase">
                                                            {{ $story->date }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Content Side --}}
                                        <div class="w-full md:w-1/2 px-4 md:px-10 {{ $index % 2 == 0 ? 'md:text-left' : 'md:text-right' }}"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                                            <div class="relative">
                                                {{-- Background Number diperkecil --}}
                                                <span
                                                    class="absolute -top-6 {{ $index % 2 == 0 ? '-left-2' : '-right-2' }} text-5xl font-serif-elegant text-[var(--rustic-brown)] opacity-10">
                                                    {{ $index + 1 }}
                                                </span>

                                                <h4
                                                    class="font-serif-elegant text-lg md:text-xl text-[var(--rustic-dark)] uppercase tracking-widest mb-3 relative z-10">
                                                    {{ $story->title }}
                                                </h4>

                                                <div
                                                    class="luxury-card p-5 md:p-6 bg-white/50 backdrop-blur-sm border-t-2 border-[var(--rustic-brown)] shadow-sm">
                                                    <p
                                                        class="text-stone-600 text-xs md:text-sm leading-relaxed italic font-light">
                                                        "{{ $story->description }}"
                                                    </p>
                                                </div>

                                                {{-- Accent Dot Desktop --}}
                                                <div
                                                    class="hidden md:block absolute top-1/2 {{ $index % 2 == 0 ? '-left-[41px]' : '-right-[41px]' }} -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-[var(--rustic-brown)] border-[3px] border-[#efebe9] z-30">
                                                </div>
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
                <section class="snap-section px-4 py-12 bg-stone-50">
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
                        <h2
                            class="font-serif-elegant text-3xl mb-8 text-[var(--rustic-dark)] tracking-[0.2em] uppercase">
                            Gallery</h2>
                        <div class="mx-auto w-full max-w-6xl">
                            <div class="swiper mySwiper !pb-14">
                                <div class="swiper-wrapper items-center">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide !w-auto">
                                            <div class="flex flex-col items-center justify-center h-full">
                                                <div
                                                    class="bg-white p-2 md:p-3 shadow-xl border border-stone-200 rounded-sm transform transition hover:rotate-1">
                                                    <img src="{{ str_contains($photo->url, 'http') ? $photo->url : asset('storage/' . $photo->url) }}"
                                                        class="max-w-[85vw] md:max-w-none max-h-[50vh] md:max-h-[65vh] w-auto h-auto block rounded-sm shadow-inner"
                                                        alt="Gallery" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next !hidden md:!flex !text-stone-400"></div>
                                <div class="swiper-button-prev !hidden md:!flex !text-stone-400"></div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @if ($invitation->show_gift)
                <section class="snap-section px-6 bg-[#d7ccc8]/20">
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
                        <div class="mb-10" data-aos="fade-up">
                            <i data-lucide="gift"
                                class="w-10 h-10 mx-auto text-[var(--rustic-brown)] mb-4 opacity-50"></i>
                            <h2
                                class="font-serif-elegant text-3xl text-[var(--rustic-dark)] uppercase tracking-[0.2em]">
                                Wedding Gift</h2>
                            <p class="font-serif-elegant italic text-stone-500 text-sm mt-4">Doa restu Anda adalah kado
                                terindah, namun jika Anda ingin memberikan tanda kasih, dapat melalui:</p>
                        </div>
                        <div class="space-y-6">
                            <div class="luxury-card p-8 relative overflow-hidden group" data-aos="zoom-in">
                                <div
                                    class="absolute top-0 right-0 p-2 opacity-10 group-hover:opacity-20 transition-opacity">
                                    <i data-lucide="credit-card" class="w-12 h-12"></i>
                                </div>
                                <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                                    {{ $invitation->bank_name_1 }}</p>
                                <h3 class="text-xl font-serif-elegant text-[var(--rustic-dark)] mb-1 tracking-widest"
                                    id="acc_num_1">{{ $invitation->bank_account_1 }}</h3>
                                <p class="text-xs text-stone-500 mb-6 italic">a.n {{ $invitation->bank_owner_1 }}</p>
                                <button onclick="copyAccount('{{ $invitation->bank_account_1 }}', this)"
                                    class="btn-rustic !py-2 !px-6 !text-[9px] w-full">
                                    SALIN NOMOR
                                </button>
                            </div>
                            @if ($invitation->bank_name_2)
                                <div class="luxury-card p-8 relative overflow-hidden group" data-aos="zoom-in"
                                    data-aos-delay="200">
                                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                                        {{ $invitation->bank_name_2 }}</p>
                                    <h3
                                        class="text-xl font-serif-elegant text-[var(--rustic-dark)] mb-1 tracking-widest">
                                        {{ $invitation->bank_account_2 }}</h3>
                                    <p class="text-xs text-stone-500 mb-6 italic">a.n {{ $invitation->bank_owner_2 }}
                                    </p>
                                    <button onclick="copyAccount('{{ $invitation->bank_account_2 }}', this)"
                                        class="btn-rustic !py-2 !px-6 !text-[9px] w-full">
                                        SALIN NOMOR
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 md:px-6 py-10 md:py-20 relative overflow-hidden">
                {{-- Ornamen Sudut - Dikecilkan untuk HP --}}
                <div class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0"
                    style="transform: scaleY(-1);">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-20 h-20 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-40 z-0"
                    style="transform: rotate(180deg);">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-xl mx-auto w-full relative z-10">
                    {{-- Card RSVP - Padding dikurangi dari p-8 ke p-6 --}}
                    <div class="luxury-card p-5 md:p-8 bg-white/60 backdrop-blur-sm border border-stone-100 shadow-sm">
                        <h2
                            class="font-serif-elegant text-xl md:text-2xl text-center mb-6 md:mb-8 text-[var(--rustic-dark)] uppercase tracking-widest">
                            RSVP
                        </h2>

                        <form id="comment-form" class="space-y-4 md:space-y-6">
                            @csrf
                            <div class="text-center pb-3 border-b border-stone-200">
                                <p class="text-[8px] font-bold text-stone-400 uppercase tracking-widest mb-0.5">Tamu
                                    Undangan</p>
                                <p class="text-lg md:text-xl font-serif-elegant text-[var(--rustic-dark)]">
                                    {{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-stone-200 block text-center py-2.5 text-[9px] md:text-[10px] uppercase font-bold cursor-pointer transition-all text-stone-400 bg-white/50">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-stone-200 block text-center py-2.5 text-[9px] md:text-[10px] uppercase font-bold cursor-pointer transition-all text-stone-400 bg-white/50">Absen</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="3" placeholder="Tulis doa dan ucapan..."
                                class="w-full p-3 text-xs md:text-sm bg-white/80 border border-stone-200 focus:border-[var(--rustic-dark)] outline-none text-stone-600 transition-all font-serif-elegant italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-rustic w-full py-3 text-[9px] md:text-[10px] uppercase tracking-widest">Kirim
                                Ucapan</button>
                        </form>
                    </div>

                    {{-- Comment List - Dibuat sedikit lebih ringkas --}}
                    <div id="comment-list" class="mt-6 space-y-3 max-h-[30vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/40 p-4 rounded-sm border-l-2 border-[var(--rustic-brown)] shadow-sm">
                                <div class="flex justify-between items-center mb-1.5">
                                    <h4
                                        class="font-bold text-[9px] text-[var(--rustic-dark)] uppercase tracking-tighter">
                                        {{ $comment->name }}
                                    </h4>
                                    <span
                                        class="text-[7px] px-1.5 py-0.5 bg-white/60 text-stone-500 rounded-sm uppercase">{{ $comment->presence }}</span>
                                </div>
                                <p
                                    class="text-stone-600 text-[10px] md:text-[11px] italic leading-relaxed font-serif-elegant">
                                    "{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-3 p-2 bg-[#d7ccc8]/30 border-l border-[var(--rustic-dark)]">
                                        <p
                                            class="text-[8px] font-bold text-[var(--rustic-dark)] uppercase mb-0.5 tracking-widest">
                                            Balasan:</p>
                                        <p class="text-stone-700 text-[10px] leading-relaxed">{{ $comment->reply }}
                                        </p>
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
                    <h3 class="font-script text-6xl text-[var(--rustic-dark)] mb-6">Thank You</h3>
                    <div class="w-8 h-[1px] bg-stone-300 mx-auto mb-6"></div>
                    <p
                        class="font-serif-elegant italic text-stone-400 text-xs leading-relaxed mb-12 uppercase tracking-widest">
                        May your presence be a blessing for our new beginning.
                    </p>
                    <div class="opacity-30 text-[8px] tracking-[0.5em] uppercase font-bold text-stone-800">The Rustic
                        Brown Edition</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true
        });
        lucide.createIcons();
        new Swiper(".mySwiper", {
            effect: "coverflow",
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 5,
                stretch: 0,
                depth: 100,
                modifier: 2,
                slideShadows: true
            },
            pagination: {
                el: ".swiper-pagination"
            },
        });

        function createParticle() {
            const container = document.getElementById('particle-container');
            if (!container) return;
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = Math.random() * 100 + 'vw';
            const size = Math.random() * 4 + 2 + 'px';
            particle.style.width = size;
            particle.style.height = size;
            particle.style.animationDuration = Math.random() * 10 + 10 + 's';
            container.appendChild(particle);
            setTimeout(() => {
                particle.remove();
            }, 20000);
        }
        setInterval(createParticle, 800);

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

        function copyAccount(text, btn) {
            const originalText = btn.innerText;
            navigator.clipboard.writeText(text).then(() => {
                btn.innerText = "BERHASIL DISALIN!";
                btn.style.background = "#5d4037";
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.style.background = "";
                }, 2000);
            }).catch(err => {
                alert("Gagal menyalin teks.");
            });
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
            submitBtn.disabled = true;
            submitBtn.innerText = "MENGIRIM...";
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        name,
                        presence,
                        message
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const list = document.getElementById('comment-list');
                    const html = `
                    <div class="bg-white/70 p-5 rounded-2xl border-l-4 border-[var(--sakura-main)] shadow-sm animate-fade-in">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="font-bold text-[11px] text-[var(--sakura-dark)] uppercase">${name}</h4>
                            <span class="text-[9px] px-2 py-1 bg-pink-100 text-[var(--sakura-dark)] rounded-full font-bold">${presence}</span>
                        </div>
                        <p class="text-stone-500 text-xs italic">"${message}"</p>
                    </div>`;
                    list.insertAdjacentHTML('afterbegin', html);
                    document.getElementById('c_message').value = "";
                    submitBtn.disabled = false;
                    submitBtn.innerText = "KIRIM UCAPAN";
                    alert("Terima kasih atas ucapannya!");
                })
                .catch(err => {
                    alert("Gagal mengirim pesan.");
                    submitBtn.disabled = false;
                    submitBtn.innerText = "KIRIM UCAPAN";
                });
        });
    </script>
</body>

</html>
