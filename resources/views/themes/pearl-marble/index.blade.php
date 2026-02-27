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
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Cormorant+Garamond:ital,wght@0,300;0,600;1,400&family=Montserrat:wght@200;400;600&family=Alex+Brush&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --pearl-white: #fcfcfc;
            --stone-700: #444444;
            --stone-400: #a8a29e;
        }

        .font-serif-pearl {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-script {
            font-family: 'Alex Brush', cursive;
        }

        .font-sans-clean {
            font-family: 'Montserrat', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--pearl-white);
            overflow: hidden;
            color: var(--stone-700);
        }

        .snap-container {
            height: 100vh;
            width: 100%;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
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
            background-image: url('https://www.transparenttextures.com/patterns/marble-similar.png');
        }

        .btn-pearl {
            background: white;
            color: #333;
            border: 1px solid #ddd;
            padding: 12px 35px;
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .btn-pearl:hover {
            background: #333;
            color: white;
        }

        .pearl-particle {
            position: absolute;
            background: radial-gradient(circle, #ffffff 0%, #f1f2f6 100%);
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.5;
            animation: pearl-float 10s infinite ease-in-out;
            z-index: 1;
        }

        @keyframes pearl-float {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-30px) scale(1.1);
            }
        }

        .hero-bg {
            background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)),
                url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .presence-input:checked+label {
            background: #333;
            color: white;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="font-sans-clean">
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
    </svg>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div id="pearl-container" class="fixed inset-0 pointer-events-none z-0"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-white flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-white/60 backdrop-blur-[1px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-white/30 via-transparent to-white/80"></div>
            </div>
        @endif
        <div class="text-center px-6 z-20 relative" data-aos="fade-up">
            <div
                class="mb-4 md:mb-8 tracking-[0.4em] md:tracking-[0.8em] text-[9px] md:text-[10px] uppercase text-stone-500 font-bold">
                The Wedding of</div>
            <div class="flex flex-col items-center">
                <h1 class="font-cinzel text-4xl md:text-7xl text-stone-800 leading-tight drop-shadow-sm">
                    {{ $data['groom'] }}
                </h1>
                <div class="font-script text-2xl md:text-4xl text-stone-400 my-2 md:my-4">&</div>
                <h1 class="font-cinzel text-4xl md:text-7xl text-stone-800 leading-tight drop-shadow-sm">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="h-[1px] w-12 md:w-16 bg-stone-300 mx-auto my-6 md:my-10"></div>
            <div class="mb-8 md:mb-12">
                <p class="font-serif-pearl italic text-stone-500 text-sm md:text-base mb-1">Special Invitation for:</p>
                <h2
                    class="text-xl md:text-2xl font-cinzel text-stone-700 tracking-[0.15em] md:tracking-[0.2em] uppercase leading-tight">
                    {{ $guestName }}
                </h2>
            </div>
            <button onclick="openInvitation()"
                class="btn-pearl px-10 py-3 text-xs tracking-widest uppercase transition-all hover:scale-105 active:scale-95 shadow-lg">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white shadow-lg p-4 rounded-full cursor-pointer hidden border border-stone-50">
        <i data-lucide="disc" id="music-icon" class="w-5 h-5 text-stone-600"></i>
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
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-stone-200"></div>
                    @endif
                    <div class="absolute inset-0 bg-stone-900/10"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-stone-100/40"></div>
                </div>
                <div class="text-center bg-white/60 backdrop-blur-xl px-8 py-16 md:px-20 md:py-24 border border-white/80 w-full max-w-[360px] md:max-w-3xl mx-auto shadow-2xl shadow-stone-900/10 rounded-t-[200px] rounded-b-3xl z-10 relative"
                    data-aos="zoom-in">
                    <div class="flex flex-col items-center mb-8">
                        <h2 class="font-cinzel text-3xl md:text-7xl text-stone-800 tracking-wide leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <div class="font-script text-xl md:text-3xl text-stone-400 my-3">
                            &
                        </div>
                        <h2 class="font-cinzel text-3xl md:text-7xl text-stone-800 tracking-wide leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-pearl text-sm md:text-xl tracking-[0.3em] text-stone-600 mb-10 border-t border-b border-stone-300/50 py-3 inline-block px-6 uppercase">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d.m.Y') }}
                    </p>
                    <div class="flex justify-center gap-6 md:gap-12 text-stone-700 font-cinzel">
                        <div class="flex flex-col">
                            <span id="days" class="text-2xl md:text-4xl">00</span>
                            <span
                                class="text-[7px] md:text-[8px] tracking-[0.2em] text-stone-500 font-bold uppercase">Days</span>
                        </div>
                        <div class="flex flex-col">
                            <span id="hours" class="text-2xl md:text-4xl">00</span>
                            <span
                                class="text-[7px] md:text-[8px] tracking-[0.2em] text-stone-500 font-bold uppercase">Hrs</span>
                        </div>
                        <div class="flex flex-col">
                            <span id="minutes" class="text-2xl md:text-4xl">00</span>
                            <span
                                class="text-[7px] md:text-[8px] tracking-[0.2em] text-stone-500 font-bold uppercase">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
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
                <div class="max-w-4xl mx-auto w-full grid md:grid-cols-2 gap-12 items-center" data-aos="fade-up">
                    <div class="text-center space-y-6">
                        <div class="w-48 h-64 mx-auto overflow-hidden border-[10px] border-white shadow-sm">
                            <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->groom_name) . '&background=f0f0f0&color=333' }}"
                                class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                        <div>
                            <h3 class="font-cinzel text-3xl text-stone-800 mb-2">{{ $invitation->groom_name }}</h3>
                            <p class="font-serif-pearl italic text-stone-400">{{ $invitation->groom_info }}</p>
                        </div>
                    </div>
                    <div class="text-center space-y-6">
                        <div class="w-48 h-64 mx-auto overflow-hidden border-[10px] border-white shadow-sm">
                            <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->bride_name) . '&background=f0f0f0&color=333' }}"
                                class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                        <div>
                            <h3 class="font-cinzel text-3xl text-stone-800 mb-2">{{ $invitation->bride_name }}</h3>
                            <p class="font-serif-pearl italic text-stone-400">{{ $invitation->bride_info }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
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
                <div class="max-w-4xl mx-auto w-full grid md:grid-cols-2 gap-6">
                    @foreach ($invitation->events as $event)
                        <div class="bg-white/60 p-10 text-center border border-white shadow-sm">
                            <h3 class="font-cinzel text-xs mb-6 tracking-[0.3em] text-stone-400 uppercase">
                                {{ $event->event_name }}</h3>
                            <p class="font-serif-pearl text-2xl mb-2">
                                {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-[11px] text-stone-400 mb-8">{{ $event->address }}</p>
                            <a href="{{ $event->google_maps_url }}" target="_blank"
                                class="btn-pearl text-[9px]">Google
                                Maps</a>
                        </div>
                    @endforeach
                </div>
            </section>
            {{-- Section Love Story - Pearl & Stone Minimalist --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section
                    class="snap-section relative flex items-center justify-center min-h-screen py-20 px-4 overflow-hidden bg-stone-50/50">
                    {{-- Ornamen Sudut --}}
                    <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 z-0 animate-floral delay-3"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>

                    <div class="max-w-6xl mx-auto relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-16 md:mb-24">
                            <h2 class="font-cinzel text-xs md:text-sm tracking-[0.5em] text-stone-400 uppercase mb-4"
                                data-aos="fade-down">
                                The Journey of Us
                            </h2>
                            <div class="w-12 h-[1px] bg-stone-200 mx-auto"></div>
                        </div>

                        <div class="space-y-20 md:space-y-32">
                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="flex flex-col md:flex-row items-center gap-8 md:gap-16 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">

                                    {{-- Image Side --}}
                                    <div class="w-full md:w-1/2 flex justify-center"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                        <div
                                            class="relative p-2 md:p-3 bg-white shadow-md border border-stone-100 transform rotate-1 hover:rotate-0 transition-transform duration-500">
                                            {{-- Ukuran Gambar: Maksimal 250px di HP, Maksimal 450px di Desktop --}}
                                            <div class="max-w-[250px] md:max-w-[450px]">
                                                <img src="{{ asset('storage/' . $story->image) }}"
                                                    class="w-full h-auto object-contain grayscale hover:grayscale-0 transition-all duration-1000"
                                                    alt="{{ $story->title }}">
                                            </div>

                                            {{-- Date Label --}}
                                            <div
                                                class="absolute -bottom-4 {{ $index % 2 == 0 ? '-left-3' : '-right-3' }} bg-stone-800 px-4 py-1.5 shadow-lg">
                                                <p
                                                    class="font-cinzel text-[8px] md:text-[10px] tracking-widest text-white">
                                                    {{ $story->date }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Content Side --}}
                                    <div class="w-full md:w-1/2 {{ $index % 2 == 0 ? 'md:text-left' : 'md:text-right' }} text-center"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                                        <h3
                                            class="font-serif-pearl text-2xl md:text-3xl text-stone-800 mb-4 md:mb-6 leading-relaxed">
                                            {{ $story->title }}
                                        </h3>
                                        <div
                                            class="bg-white/80 backdrop-blur-sm p-6 md:p-8 border border-white shadow-sm inline-block w-full">
                                            <p
                                                class="text-stone-500 text-sm md:text-base leading-[1.8] italic font-light">
                                                "{{ $story->description }}"
                                            </p>
                                        </div>
                                        <div
                                            class="mt-6 flex {{ $index % 2 == 0 ? 'justify-center md:justify-start' : 'justify-center md:justify-end' }}">
                                            <div class="w-8 h-[1px] bg-stone-300"></div>
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
                    class="snap-section relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
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
                <section
                    class="snap-section relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
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
                        <div data-aos="fade-up">
                            <div class="mb-6 tracking-[0.5em] text-[10px] uppercase text-stone-400">Wedding Gift</div>
                            <h2 class="font-cinzel text-3xl text-stone-800 mb-8">Tanda Kasih</h2>
                            <p class="font-serif-pearl italic text-stone-400 text-sm leading-relaxed mb-10 px-4">
                                "Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika Anda ingin
                                memberikan tanda kasih, Anda dapat mengirimkannya melalui:"
                            </p>
                        </div>
                        <div class="bg-white p-10 border border-stone-100 shadow-sm relative group"
                            data-aos="zoom-in">
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[2px] bg-stone-800"></div>
                            <div class="space-y-10">
                                <div class="{{ $invitation->bank_name_2 ? 'border-b border-stone-50 pb-10' : '' }}">
                                    <p class="font-cinzel text-[10px] tracking-widest text-stone-400 mb-3 uppercase">
                                        {{ $invitation->bank_name_1 }}
                                    </p>
                                    <h3 class="text-2xl font-cinzel text-stone-800 mb-2 tracking-[0.1em]">
                                        {{ $invitation->bank_account_1 }}
                                    </h3>
                                    <p class="text-[11px] text-stone-400 mb-8 font-serif-pearl italic uppercase">
                                        a.n {{ $invitation->bank_owner_1 }}
                                    </p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                        class="btn-pearl !py-2 !px-8 !text-[9px] !tracking-[0.3em]">
                                        SALIN NOMOR
                                    </button>
                                </div>
                                @if ($invitation->bank_name_2)
                                    <div>
                                        <p
                                            class="font-cinzel text-[10px] tracking-widest text-stone-400 mb-3 uppercase">
                                            {{ $invitation->bank_name_2 }}
                                        </p>
                                        <h3 class="text-2xl font-cinzel text-stone-800 mb-2 tracking-[0.1em]">
                                            {{ $invitation->bank_account_2 }}
                                        </h3>
                                        <p class="text-[11px] text-stone-400 mb-8 font-serif-pearl italic uppercase">
                                            a.n {{ $invitation->bank_owner_2 }}
                                        </p>
                                        <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                            class="btn-pearl !py-2 !px-8 !text-[9px] !tracking-[0.3em]">
                                            SALIN NOMOR
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
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
                <div class="max-w-xl mx-auto w-full">
                    <form id="comment-form" class="bg-white p-8 shadow-sm border border-stone-50 mb-8">
                        @csrf
                        <div class="space-y-6">
                            <div class="text-center pb-4 border-b border-stone-50">
                                <h4 class="font-cinzel text-lg">{{ $guestName }}</h4>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="block text-center border border-stone-100 py-3 text-[10px] uppercase cursor-pointer transition-all">Hadir</label>
                                </div>
                                <div class="flex-1">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="block text-center border border-stone-100 py-3 text-[10px] uppercase cursor-pointer transition-all">Absen</label>
                                </div>
                            </div>
                            <textarea id="c_message" rows="3" placeholder="Tulis ucapan & doa restu..."
                                class="w-full bg-stone-50 p-4 text-sm outline-none font-serif-pearl italic focus:ring-1 focus:ring-stone-200"
                                required></textarea>
                            <button type="submit" id="c_submit"
                                class="btn-pearl w-full flex justify-center items-center gap-2">
                                <span id="btn-text">Kirim Ucapan</span>
                            </button>
                        </div>
                    </form>
                    <div id="comment-list" class="space-y-6 max-h-[40vh] overflow-y-auto pr-2 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="comment-item border-b border-stone-50 pb-4" data-aos="fade-up">
                                <div class="flex justify-between items-center mb-1">
                                    <div class="flex items-center gap-2">
                                        <h5 class="font-cinzel text-[10px] tracking-widest uppercase font-bold">
                                            {{ $comment->name }}</h5>
                                        <span
                                            class="px-2 py-0.5 bg-stone-100 text-[8px] text-stone-500 rounded-full">{{ $comment->presence }}</span>
                                    </div>
                                    <span
                                        class="text-[8px] text-stone-300">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-xs text-stone-500 italic font-serif-pearl">"{{ $comment->message }}"
                                </p>
                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-4 p-3 bg-stone-50/50 border-l-2 border-stone-200">
                                        <p class="text-[10px] text-stone-500 leading-relaxed">
                                            <span
                                                class="font-bold text-[8px] uppercase tracking-wider block mb-1 text-stone-400">Balasan
                                                dari Pengantin:</span>
                                            {{ $comment->reply }}
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
                <div class="flex flex-col items-center" data-aos="fade-up">
                    <div class="font-cinzel text-[10px] tracking-[0.5em] text-stone-300 mb-8">FOREVER & ALWAYS</div>
                    <h3 class="font-script text-6xl md:text-8xl text-stone-800">{{ $data['groom'] }}</h3>
                    <div class="font-serif-pearl italic text-2xl text-stone-300 my-2">&</div>
                    <h3 class="font-script text-6xl md:text-8xl text-stone-800">{{ $data['bride'] }}</h3>
                    <div class="h-[1px] w-12 bg-stone-100 mt-12 mb-4"></div>
                    <p class="text-[9px] uppercase tracking-[0.3em] opacity-30">The Pearl Marble Edition</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 1500,
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

        function createPearls() {
            const container = document.getElementById('pearl-container');
            const pearl = document.createElement('div');
            pearl.classList.add('pearl-particle');
            const size = Math.random() * 6 + 4 + 'px';
            pearl.style.width = size;
            pearl.style.height = size;
            pearl.style.left = Math.random() * 100 + 'vw';
            pearl.style.top = Math.random() * 100 + 'vh';
            container.appendChild(pearl);
            if (container.children.length > 20) container.removeChild(container.children[0]);
        }
        setInterval(createPearls, 2000);

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

        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerText;
                btn.innerText = "BERHASIL DISALIN";
                btn.style.background = "#333";
                btn.style.color = "white";
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.style.background = "white";
                    btn.style.color = "#333";
                }, 2000);
            });
        }
        let isPlaying = true;

        function toggleMusic() {
            const music = document.getElementById('bg-music');
            if (isPlaying) {
                music.pause();
            } else {
                music.play();
            }
            isPlaying = !isPlaying;
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
            const submitBtn = document.getElementById('c_submit');
            const btnText = document.getElementById('btn-text');
            const commentList = document.getElementById('comment-list');
            const formData = {
                name: document.getElementById('c_name').value,
                presence: document.querySelector('input[name="presence"]:checked').value,
                message: document.getElementById('c_message').value
            };
            if (!formData.message.trim()) return;
            submitBtn.disabled = true;
            btnText.innerText = "MENGIRIM...";
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('c_message').value = "";
                    submitBtn.disabled = false;
                    btnText.innerText = "Kirim Ucapan";
                    const newComment = `
            <div class="comment-item border-b border-stone-50 pb-4" style="animation: fadeIn 0.8s ease forwards">
                <div class="flex justify-between items-center mb-1">
                    <div class="flex items-center gap-2">
                        <h5 class="font-cinzel text-[10px] tracking-widest uppercase font-bold">${formData.name}</h5>
                        <span class="px-2 py-0.5 bg-stone-100 text-[8px] text-stone-500 rounded-full">${formData.presence}</span>
                    </div>
                    <span class="text-[8px] text-stone-300">Baru saja</span>
                </div>
                <p class="text-xs text-stone-500 italic font-serif-pearl">"${formData.message}"</p>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newComment);
                    commentList.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal mengirim pesan, silakan coba lagi.');
                    submitBtn.disabled = false;
                    btnText.innerText = "Kirim Ucapan";
                });
        });
    </script>
</body>

</html>
