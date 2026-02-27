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
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,400;1,400&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --scandi-bg: #F8F5F2;
            --scandi-accent: #8E867E;
            --scandi-dark: #2D2D2D;
            --scandi-soft: #EAE3DB;
            --text-main: #4A4A4A;
        }

        .font-serif-elegant {
            font-family: 'Playfair Display', serif;
        }

        .font-sans-clean {
            font-family: 'Inter', sans-serif;
        }

        .font-accent {
            font-family: 'Cinzel', serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--scandi-bg);
            overflow: hidden;
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
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
            padding: 2rem 1.5rem;
        }

        .scandi-card {
            background: white;
            border: 1px solid var(--scandi-soft);
            border-radius: 2px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .btn-scandi {
            background: var(--scandi-dark);
            color: white;
            font-weight: 500;
            border-radius: 0px;
            padding: 14px 40px;
            transition: all 0.4s ease;
            border: 1px solid var(--scandi-dark);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-size: 10px;
            cursor: pointer;
        }

        .btn-scandi:hover {
            background: transparent;
            color: var(--scandi-dark);
        }

        .presence-input:checked+label {
            background: var(--scandi-accent);
            color: white;
            border-color: var(--scandi-accent);
        }

        .hero-bg {
            background: linear-gradient(rgba(248, 245, 242, 0.85), rgba(248, 245, 242, 0.95)),
                url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .swiper-pagination-bullet-active {
            background: var(--scandi-dark) !important;
        }

        .img-frame {
            padding: 10px;
            background: white;
            border: 1px solid var(--scandi-soft);
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
        class="fixed inset-0 z-[100] bg-[#F8F5F2] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @php
            $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
        @endphp
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Cover">
                {{-- Overlay sedikit lebih gelap agar teks putih/gelap lebih terbaca di HP --}}
                <div class="absolute inset-0 bg-white/50 backdrop-blur-[1px]"></div>
            </div>
        @endif

        <div class="text-center px-6 z-20 w-full max-w-sm mx-auto" data-aos="fade-up">
            {{-- Jarak antar elemen dikurangi (mb-4) agar muat di layar HP pendek --}}
            <div
                class="mb-4 tracking-[0.4em] text-[9px] md:text-[10px] uppercase text-stone-500 font-semibold drop-shadow-sm">
                The Wedding of
            </div>

            <div class="flex flex-col items-center mb-8">
                {{-- Ukuran font dikecilkan untuk HP (text-3xl) dan membesar di desktop --}}
                <h1
                    class="font-accent text-3xl md:text-5xl tracking-[0.15em] text-stone-800 drop-shadow-sm leading-tight">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-lg my-2 md:my-4 text-stone-500 italic">&</span>
                <h1
                    class="font-accent text-3xl md:text-5xl tracking-[0.15em] text-stone-800 drop-shadow-sm leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>

            <div class="mb-8">
                <p
                    class="font-sans-clean uppercase tracking-[0.2em] text-stone-500 text-[9px] mb-2 font-bold opacity-80">
                    Special Invitation For
                </p>
                {{-- Nama tamu dibuat lebih proporsional --}}
                <h2 class="text-xl md:text-2xl font-light text-stone-800 tracking-wide mb-4">
                    {{ $guestName }}
                </h2>
                <div class="w-6 h-[1px] bg-stone-400 mx-auto opacity-50"></div>
            </div>

            {{-- Ukuran button disesuaikan agar pas dengan jempol --}}
            <button onclick="openInvitation()"
                class="btn-scandi relative overflow-hidden group scale-90 md:scale-100 transition-transform">
                <span class="relative z-10 text-[11px] md:text-xs tracking-widest uppercase">Open Invitation</span>
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/80 backdrop-blur-md text-stone-500 p-3 rounded-full shadow-sm cursor-pointer hidden border border-stone-100">
        <i data-lucide="music" id="music-icon" class="w-4 h-4"></i>
    </div>
    @if ($invitation->music_file)
        <audio id="bg-music" loop>
            <source src="{{ asset('storage/' . $invitation->music_file) }}" type="audio/mpeg">
        </audio>
    @endif
    <div id="main-content" class="hidden">
        <div class="snap-container scrollbar-hide">
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen py-10 px-4 overflow-hidden bg-[#F8F5F2]">
                @php
                    $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
                @endphp
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}"
                            class="w-full h-full object-cover opacity-60" alt="Hero Background">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-white/30 via-transparent to-[#F8F5F2]"></div>
                </div>
                <div data-aos="fade-up" class="text-center w-full max-w-lg mx-auto z-10 relative">
                    <div
                        class="mb-6 md:mb-10 tracking-[0.4em] md:tracking-[0.6em] text-[8px] md:text-[9px] uppercase text-stone-600 font-bold">
                        The Celebration
                    </div>
                    <div class="flex flex-col items-center mb-8 md:mb-12">
                        <h2 class="font-accent text-4xl md:text-6xl text-stone-900 leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <span
                            class="font-serif-elegant text-base md:text-lg text-stone- stone-500 my-1 md:my-2">&</span>
                        <h2 class="font-accent text-4xl md:text-6xl text-stone-900 leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-elegant text-lg md:text-xl text-stone-700 mb-8 md:mb-12 tracking-[0.2em] md:tracking-[0.3em] uppercase drop-shadow-sm">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d . m . Y') }}
                    </p>
                    <div
                        class="flex justify-center gap-6 md:gap-10 bg-white/40 backdrop-blur-md py-4 px-8 rounded-2xl inline-flex mx-auto border border-white/60 shadow-sm">
                        <div class="flex flex-col items-center border-b border-stone-300 px-1 md:px-2 pb-1">
                            <span id="days" class="text-xl md:text-2xl font-light text-stone-900">00</span>
                            <span class="text-[7px] md:text-[8px] uppercase tracking-widest text-stone-500">Days</span>
                        </div>
                        <div class="flex flex-col items-center border-b border-stone-300 px-1 md:px-2 pb-1">
                            <span id="hours" class="text-xl md:text-2xl font-light text-stone-900">00</span>
                            <span
                                class="text-[7px] md:text-[8px] uppercase tracking-widest text-stone-500">Hours</span>
                        </div>
                        <div class="flex flex-col items-center border-b border-stone-300 px-1 md:px-2 pb-1">
                            <span id="minutes" class="text-xl md:text-2xl font-light text-stone-900">00</span>
                            <span class="text-[7px] md:text-[8px] uppercase tracking-widest text-stone-500">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-6 py-12 relative bg-white flex flex-col justify-center min-h-screen">
                {{-- Ornamen dikecilkan (w-20) agar tidak menumpuk teks di HP --}}
                <div class="absolute top-0 left-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 scale-y-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 rotate-180">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    <p
                        class="italic text-stone-400 text-[11px] md:text-sm font-serif-elegant mb-10 md:mb-16 max-w-[280px] md:max-w-md mx-auto leading-relaxed">
                        "He has placed between you affection and mercy."
                    </p>

                    {{-- Gap dikurangi (gap-10) untuk tampilan vertikal di HP --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center">
                            <div
                                class="img-frame w-36 h-48 md:w-48 md:h-64 mb-4 grayscale hover:grayscale-0 transition-all duration-1000 shadow-xl border-4 border-white">
                                <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->groom_name) . '&background=EAE3DB&color=4A4A4A' }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="font-accent text-xl md:text-2xl text-stone-800 mb-1 uppercase tracking-wider">
                                {{ $invitation->groom_name }}</h3>
                            <p class="font-sans-clean text-[9px] uppercase tracking-[0.2em] text-stone-400">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>

                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center">
                            <div
                                class="img-frame w-36 h-48 md:w-48 md:h-64 mb-4 grayscale hover:grayscale-0 transition-all duration-1000 shadow-xl border-4 border-white">
                                <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->bride_name) . '&background=EAE3DB&color=4A4A4A' }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="font-accent text-xl md:text-2xl text-stone-800 mb-1 uppercase tracking-wider">
                                {{ $invitation->bride_name }}</h3>
                            <p class="font-sans-clean text-[9px] uppercase tracking-[0.2em] text-stone-400">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="snap-section px-6 py-12 relative bg-stone-50 flex flex-col justify-center min-h-screen overflow-hidden">
                {{-- Background Decoration --}}
                <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
                    style="background-image: radial-gradient(var(--gold-primary) 1px, transparent 1px); background-size: 20px 20px;">
                </div>

                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2
                        class="font-accent text-2xl md:text-3xl mb-8 md:mb-16 text-stone-800 tracking-[0.4em] uppercase">
                        The Event</h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 md:gap-8">
                        @foreach ($invitation->events as $event)
                            <div
                                class="bg-white p-8 md:p-12 shadow-sm border border-stone-100 flex flex-col items-center transition-transform hover:scale-[1.01]">
                                <h3
                                    class="font-accent text-[11px] font-bold text-stone-800 mb-6 uppercase tracking-[0.3em] border-b border-stone-100 pb-2">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-6 mb-8 w-full">
                                    <div class="flex flex-col items-center">
                                        <p class="text-stone-800 text-base md:text-lg font-light tracking-wide">
                                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                        </p>
                                        <p
                                            class="text-[var(--gold-primary)] text-[10px] mt-1 font-bold tracking-widest uppercase">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} — Selesai
                                        </p>
                                    </div>

                                    <div class="w-10 h-[1px] bg-stone-200 mx-auto"></div>

                                    <div class="px-2">
                                        <p class="font-bold text-stone-700 uppercase text-[9px] tracking-widest mb-1">
                                            {{ $event->location_name }}
                                        </p>
                                        <p
                                            class="text-[9px] text-stone-400 leading-relaxed uppercase max-w-[200px] mx-auto">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="bg-stone-800 text-white px-8 py-3 text-[8px] uppercase tracking-[0.2em] hover:bg-stone-700 transition-all shadow-md">
                                        Google Maps
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
                <section class="snap-section px-4 bg-white">
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
                    <div class="w-full text-center">
                        <h2 class="font-accent text-2xl mb-12 text-stone-800 tracking-widest uppercase">Moments</h2>
                        <div class="mx-auto w-full md:max-w-2xl">
                            <div class="swiper mySwiper !pb-12">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide">
                                            <div class="img-frame inline-block">
                                                <img src="{{ asset('storage/' . $photo->url) }}"
                                                    class="mx-auto grayscale hover:grayscale-0 transition-all duration-1000"
                                                    alt="Gallery">
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
                <section class="snap-section px-6 bg-white">
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
                    <div class="max-w-md mx-auto w-full text-center">
                        <div class="mb-12" data-aos="fade-up">
                            <h2 class="font-accent text-3xl text-stone-800 tracking-widest uppercase mb-4">Wedding Gift
                            </h2>
                            <p
                                class="font-serif-elegant italic text-stone-400 text-xs leading-relaxed uppercase tracking-widest max-w-xs mx-auto">
                                Your presence is enough, but if you wish to give, we provide a digital way:
                            </p>
                        </div>
                        <div class="space-y-4">
                            <div class="scandi-card p-10 group transition-all duration-500 hover:border-stone-400"
                                data-aos="fade-up">
                                <p class="text-[8px] font-bold text-stone-400 uppercase tracking-[0.3em] mb-4">
                                    {{ $invitation->bank_name_1 }}</p>
                                <h3 class="text-xl font-light text-stone-800 mb-1 tracking-[0.2em]">
                                    {{ $invitation->bank_account_1 }}</h3>
                                <p class="text-[9px] text-stone-400 mb-8 uppercase tracking-widest">a.n
                                    {{ $invitation->bank_owner_1 }}</p>
                                <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                    class="text-[9px] uppercase tracking-[0.3em] border-b border-stone-800 pb-1 hover:text-stone-400 hover:border-stone-400 transition-all">
                                    Copy Account
                                </button>
                            </div>
                            @if ($invitation->bank_name_2)
                                <div class="scandi-card p-10 group transition-all duration-500 hover:border-stone-400"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <p class="text-[8px] font-bold text-stone-400 uppercase tracking-[0.3em] mb-4">
                                        {{ $invitation->bank_name_2 }}</p>
                                    <h3 class="text-xl font-light text-stone-800 mb-1 tracking-[0.2em]">
                                        {{ $invitation->bank_account_2 }}</h3>
                                    <p class="text-[9px] text-stone-400 mb-8 uppercase tracking-widest">a.n
                                        {{ $invitation->bank_owner_2 }}</p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                        class="text-[9px] uppercase tracking-[0.3em] border-b border-stone-800 pb-1 hover:text-stone-400 hover:border-stone-400 transition-all">
                                        Copy Account
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section
                class="snap-section px-4 py-10 relative bg-stone-50 flex flex-col justify-center min-h-screen overflow-hidden">
                {{-- Ornamen dikecilkan jadi w-20 agar tidak bertabrakan dengan konten --}}
                <div class="absolute top-0 left-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 scale-y-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-20 h-20 text-[var(--gold-soft)] opacity-30 z-0 rotate-180">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-md mx-auto w-full relative z-10 px-2">
                    <h2 class="font-accent text-2xl text-center mb-6 text-stone-800 tracking-[0.3em] uppercase">Wishes
                    </h2>

                    {{-- Card: Padding dikurangi dari p-10 menjadi p-6 --}}
                    <form id="comment-form" class="bg-white shadow-sm border border-stone-100 p-6 mb-8">
                        @csrf
                        <div class="space-y-4">
                            <div class="text-center pb-2 border-b border-stone-50">
                                <p class="text-[7px] font-bold text-stone-400 uppercase tracking-widest mb-1">Guest
                                    Name</p>
                                <p class="text-base font-light text-stone-800">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 border border-stone-100">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="block text-center py-3 text-[8px] font-bold uppercase cursor-pointer transition-all text-stone-400 border-r border-stone-100">Attending</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="block text-center py-3 text-[8px] font-bold uppercase cursor-pointer transition-all text-stone-400">Absent</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="3" placeholder="YOUR MESSAGE..."
                                class="w-full p-3 text-[10px] bg-stone-50 border-none outline-none text-stone-600 focus:ring-1 focus:ring-stone-100 italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-scandi w-full py-3 text-[10px] tracking-widest uppercase">
                                Send Wishes
                            </button>
                        </div>
                    </form>

                    {{-- List Komentar: Tinggi maksimal dikurangi agar proporsional --}}
                    <div id="comment-list" class="space-y-6 max-h-[30vh] overflow-y-auto pr-2 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="comment-item border-b border-stone-100 pb-4 last:border-0">
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="font-bold text-[8px] text-stone-800 uppercase tracking-widest">
                                        {{ $comment->name }}</h4>
                                    <span
                                        class="text-[6px] text-stone-400 italic uppercase">{{ $comment->presence }}</span>
                                </div>
                                <p class="text-stone-500 text-[11px] font-light leading-relaxed">
                                    "{{ $comment->message }}"</p>

                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-4 p-3 bg-stone-50 border-l border-stone-200">
                                        <p class="text-[6px] font-bold text-stone-400 uppercase mb-1 tracking-widest">
                                            Reply:</p>
                                        <p class="text-stone-600 text-[10px] font-light leading-snug">
                                            {{ $comment->reply }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center bg-white">
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
                    <h3 class="font-accent text-4xl text-stone-800 mb-8 tracking-widest">Thank You</h3>
                    <p
                        class="font-serif-elegant italic text-stone-400 text-sm mb-20 tracking-[0.2em] uppercase leading-relaxed">
                        We are looking forward to celebrate our joy with you.
                    </p>
                    <div class="opacity-20 text-[7px] tracking-[0.6em] uppercase font-bold text-stone-800">RQ Pedia
                        Digital</div>
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

        function copyToClipboard(text, element) {
            const originalText = element.innerText;
            navigator.clipboard.writeText(text).then(() => {
                element.innerText = "COPIED!";
                element.classList.add('text-stone-400');
                setTimeout(() => {
                    element.innerText = originalText;
                    element.classList.remove('text-stone-400');
                }, 2000);
            }).catch(err => {
                alert("Failed to copy.");
            });
        }

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.setAttribute('data-lucide', 'play');
            } else {
                music.play();
                musicIcon.setAttribute('data-lucide', 'music');
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
            const btnSubmit = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const token = document.querySelector('input[name="_token"]').value;
            const commentList = document.getElementById('comment-list');
            if (!message.trim()) return;
            const originalBtnText = btnSubmit.innerText;
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
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) throw new Error(data.message || 'Error');
                    return data;
                })
                .then(data => {
                    const newCommentHtml = `
            <div class="comment-item border-b border-stone-200 pb-6 opacity-0 translate-y-4 transition-all duration-700 ease-out" id="new-comment">
                <div class="flex justify-between items-baseline mb-2">
                    <h4 class="font-bold text-[9px] text-stone-800 uppercase tracking-widest">${name}</h4>
                    <span class="text-[7px] text-stone-400 italic uppercase">${presence}</span>
                </div>
                <p class="text-stone-500 text-xs font-light italic">"${message}"</p>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newCommentHtml);
                    setTimeout(() => {
                        const el = document.getElementById('new-comment');
                        el.classList.remove('opacity-0', 'translate-y-4');
                        el.id = "";
                    }, 100);
                    document.getElementById('c_message').value = "";
                    commentList.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch(err => {
                    console.error(err);
                    alert("Maaf, gagal mengirim pesan. Silakan coba lagi.");
                })
                .finally(() => {
                    btnSubmit.innerText = originalBtnText;
                    btnSubmit.disabled = false;
                });
        });
    </script>
</body>

</html>
