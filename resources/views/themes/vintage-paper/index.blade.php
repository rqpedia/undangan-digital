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
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --paper-dark: #d4c4a8;
            --paper-light: #f2e8cf;
            --ink-black: #2b2d42;
            --vintage-gold: #9d813b;
            --sepia-text: #5e503f;
            --sand-warm: #fdfaf0;
        }

        .font-vintage-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-classic-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-script {
            font-family: 'Great Vibes', cursive;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--paper-light);
            overflow: hidden;
            color: var(--sepia-text);
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
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 4rem 1rem;
            background-color: var(--paper-light);
            background-image: url('https://www.transparenttextures.com/patterns/pinstriped-suit.png'),
                url('https://www.transparenttextures.com/patterns/felt.png');
            border: 20px solid transparent;
            border-image: url('https://www.transparenttextures.com/patterns/exclusive-paper.png') 30 round;
        }

        .section-auto {
            scroll-snap-align: start;
            min-height: 100vh;
            height: auto !important;
            display: flex;
            flex-direction: column;
            padding: 5rem 1rem;
            background-image: url('https://www.transparenttextures.com/patterns/felt.png');
        }

        .vintage-border {
            border: 1px solid var(--vintage-gold);
            outline: 4px double var(--vintage-gold);
            outline-offset: -10px;
            padding: 40px;
        }

        .luxury-card {
            background: rgba(255, 253, 240, 0.7);
            border: 1px solid var(--vintage-gold);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-vintage {
            background: var(--sepia-text);
            color: var(--paper-light);
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            letter-spacing: 3px;
            padding: 12px 35px;
            transition: all 0.4s ease;
            border: 1px solid var(--vintage-gold);
            text-transform: uppercase;
            cursor: pointer;
        }

        .btn-vintage:hover {
            background: var(--ink-black);
            transform: translateY(-2px);
        }

        .presence-input:checked+label {
            background: var(--sepia-text);
            color: white;
            border-color: var(--sepia-text);
        }

        .hero-bg {
            background: linear-gradient(rgba(242, 232, 207, 0.8), rgba(242, 232, 207, 0.9)),
                url('https://images.unsplash.com/photo-1532431114424-469076f8a7a9?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .dust {
            position: absolute;
            background: var(--vintage-gold);
            border-radius: 50%;
            opacity: 0.2;
            animation: float 15s linear infinite;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-10vh) translateX(20px);
                opacity: 0;
            }
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .swiper-pagination-bullet-active {
            background: var(--vintage-gold) !important;
        }
    </style>
</head>

<body class="font-classic-serif">
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
        class="fixed inset-0 pointer-events-none z-50 overflow-hidden opacity-0 transition-opacity duration-700">
        <div class="absolute top-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 animate-floral">
            <svg class="w-full h-full">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div class="absolute top-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-1">
            <svg class="w-full h-full" style="transform: scaleX(-1);">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-2">
            <svg class="w-full h-full" style="transform: scaleY(-1);">
                <use href="#corner-ornament" />
            </svg>
        </div>
        <div class="absolute bottom-0 right-0 w-32 h-32 text-[var(--gold-soft)] opacity-40 animate-floral delay-3">
            <svg class="w-full h-full" style="transform: rotate(180deg);">
                <use href="#corner-ornament" />
            </svg>
        </div>
    </div>
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="dust-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#e3d5ba] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">

        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}"
                    class="w-full h-full object-cover grayscale-[30%] sepia-[20%]" alt="Wedding Cover">
                {{-- Overlay sedikit lebih solid di mobile untuk meningkatkan keterbacaan --}}
                <div class="absolute inset-0 bg-[#e3d5ba]/70 backdrop-blur-[0.5px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#e3d5ba]/10 to-[#e3d5ba]/90"></div>
            </div>
        @endif

        <div class="vintage-border text-center px-8 z-20 relative w-full" data-aos="zoom-in">
            {{-- Subtitle --}}
            <div
                class="mb-2 md:mb-4 tracking-[0.3em] md:tracking-[0.5em] text-[8px] md:text-[10px] uppercase text-stone-700 font-bold drop-shadow-sm">
                The Wedding of
            </div>

            {{-- Nama Pengantin: Dikecilkan dari 5xl ke 4xl di HP --}}
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1
                    class="font-vintage-serif text-4xl md:text-7xl text-[var(--ink-black)] font-bold italic drop-shadow-md leading-tight">
                    {{ $data['groom'] }}
                </h1>
                <div class="my-1 md:my-2 font-script text-3xl md:text-4xl text-[var(--vintage-gold)] drop-shadow-sm">
                    &
                </div>
                <h1
                    class="font-vintage-serif text-4xl md:text-7xl text-[var(--ink-black)] font-bold italic drop-shadow-md leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>

            {{-- Section Kepada Yth --}}
            <div class="mb-6 md:mb-10">
                <p class="font-classic-serif italic text-stone-600 mb-1 text-sm md:text-lg">Kepada Yth.</p>
                <h2
                    class="text-2xl md:text-3xl font-vintage-serif text-[var(--sepia-text)] mb-6 md:mb-8 tracking-wide px-4">
                    {{ $guestName }}
                </h2>
            </div>

            {{-- Button --}}
            <button onclick="openInvitation()"
                class="btn-vintage px-8 py-3 text-[10px] md:text-xs tracking-widest shadow-xl transition-all hover:scale-105 active:scale-95 bg-stone-800 text-[#e3d5ba] rounded-sm uppercase font-bold">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-[var(--paper-dark)] text-[var(--ink-black)] p-3 rounded-none border border-[var(--vintage-gold)] shadow-lg cursor-pointer hidden">
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
            <section id="hero-section"
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-[#e3d5ba]">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}"
                            class="w-full h-full object-cover grayscale-[20%] sepia-[30%] brightness-[0.8]"
                            alt="Hero Background">
                    @endif
                    <div class="absolute inset-0 bg-[#e3d5ba]/50 backdrop-blur-[0.5px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#e3d5ba]/90">
                    </div>
                </div>

                <div data-aos="fade-up" class="text-center z-10 relative px-6 w-full">
                    <div class="mb-4 tracking-[0.3em] text-[10px] md:text-[12px] uppercase text-stone-700 font-bold">
                        The Wedding Anniversary
                    </div>
                    <div class="flex flex-col items-center mb-4 md:mb-6">
                        <h2
                            class="font-vintage-serif text-4xl md:text-7xl text-[var(--ink-black)] italic leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <div class="font-script text-3xl md:text-4xl text-[var(--vintage-gold)] my-1">&</div>
                        <h2
                            class="font-vintage-serif text-4xl md:text-7xl text-[var(--ink-black)] italic leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>

                    <div class="h-[1px] w-24 bg-[var(--vintage-gold)] mx-auto my-4 shadow-sm opacity-60"></div>

                    <p class="font-classic-serif text-lg md:text-2xl tracking-[0.1em] text-[var(--sepia-text)] mb-8">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}
                    </p>

                    {{-- Countdown: Lebih ringkas --}}
                    <div
                        class="flex justify-center gap-4 md:gap-8 bg-[#fdfaf5]/60 backdrop-blur-md p-4 md:p-6 rounded-lg border border-[#d4c3a1] shadow-xl max-w-[280px] md:max-w-none mx-auto">
                        @foreach (['days' => 'Hari', 'hours' => 'Jam', 'minutes' => 'Menit'] as $id => $label)
                            <div class="flex flex-col min-w-[60px]">
                                <span id="{{ $id }}"
                                    class="text-2xl md:text-4xl font-vintage-serif text-[var(--ink-black)]">00</span>
                                <span
                                    class="text-[8px] md:text-[10px] uppercase font-bold text-stone-600 tracking-tighter">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-16 bg-[#fdfaf5]">
                <div class="max-w-4xl mx-auto w-full text-center" data-aos="fade-up">
                    <img src="https://www.transparenttextures.com/patterns/vintage-speckles.png"
                        class="mx-auto mb-6 w-12 md:w-16 opacity-30">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                        @foreach ([['name' => $invitation->groom_name, 'photo' => $invitation->groom_photo, 'info' => $invitation->groom_info, 'label' => 'Putra dari'], ['name' => $invitation->bride_name, 'photo' => $invitation->bride_photo, 'info' => $invitation->bride_info, 'label' => 'Putri dari']] as $person)
                            <div class="flex flex-col items-center">
                                <div
                                    class="relative p-1.5 border border-stone-300 bg-white mb-4 shadow-md rotate-[-1deg] even:rotate-[1deg]">
                                    <div
                                        class="w-40 h-56 md:w-48 md:h-64 overflow-hidden grayscale-[40%] hover:grayscale-0 transition-all">
                                        <img src="{{ $person['photo'] ? asset('storage/' . $person['photo']) : 'https://ui-avatars.com/api/?name=' . urlencode($person['name']) }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <h3 class="font-vintage-serif text-2xl md:text-3xl text-[var(--ink-black)] mb-1">
                                    {{ $person['name'] }}
                                </h3>
                                <p class="font-classic-serif text-xs md:text-base italic text-stone-500 px-6">
                                    {{ $person['label'] }} {{ $person['info'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-12 bg-[#e3d5ba]/20">
                <h2
                    class="font-vintage-serif text-3xl md:text-4xl mb-8 md:mb-12 text-[var(--ink-black)] italic text-center">
                    Acara</h2>

                <div
                    class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-6 w-full max-w-4xl mx-auto">
                    @foreach ($invitation->events as $event)
                        <div
                            class="luxury-card p-6 md:p-8 text-center border-double border-[3px] md:border-4 border-[var(--vintage-gold)] bg-white/50">
                            <h3
                                class="font-vintage-serif text-xl md:text-2xl mb-3 text-[var(--sepia-text)] uppercase tracking-wide">
                                {{ $event->event_name }}
                            </h3>

                            <p class="font-bold text-stone-700 text-sm md:text-base mb-1">
                                {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                            </p>
                            <p class="text-stone-500 text-[11px] md:text-sm mb-4">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} — Selesai
                            </p>

                            <div class="h-[1px] w-1/2 mx-auto bg-stone-200 my-4"></div>

                            <p class="font-bold text-[var(--ink-black)] text-xs md:text-sm mb-1 uppercase">
                                {{ $event->location_name }}</p>
                            <p class="text-[10px] md:text-xs text-stone-500 mb-6 italic leading-relaxed px-2">
                                {{ $event->address }}</p>

                            @if (!empty($event->google_maps_url))
                                <a href="{{ $event->google_maps_url }}" target="_blank"
                                    class="btn-vintage inline-block !py-2 !px-6 !text-[9px] !rounded-none border border-stone-800 bg-stone-800 text-white uppercase font-bold tracking-widest">
                                    Buka Maps
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
            {{-- Section Love Story - Elegant Floral Responsive --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 md:px-6 py-20 relative overflow-hidden bg-[#fdfaf5]">
                    {{-- Background Texture --}}
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
                        style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');">
                    </div>

                    <div class="max-w-5xl mx-auto relative z-10">
                        <div class="text-center mb-16">
                            <h2 class="font-vintage-serif text-3xl md:text-5xl mb-3 text-[var(--ink-black)] italic"
                                data-aos="fade-down">
                                Our Love Journey
                            </h2>
                            <div class="flex items-center justify-center gap-4 mb-2" data-aos="fade-up">
                                <div class="h-[1px] w-12 bg-[var(--vintage-gold)]"></div>
                                <p class="text-[10px] md:text-xs text-stone-500 tracking-[0.3em] uppercase font-bold">
                                    Kisah Indah Kami</p>
                                <div class="h-[1px] w-12 bg-[var(--vintage-gold)]"></div>
                            </div>
                        </div>

                        {{-- Timeline Container --}}
                        <div
                            class="relative before:absolute before:inset-0 before:left-4 md:before:left-1/2 before:-translate-x-px before:h-full before:w-[1px] before:bg-dashed before:border-l before:border-stone-300">

                            @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                <div
                                    class="relative flex items-start justify-between md:justify-normal {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} mb-16 md:mb-24">

                                    {{-- Dot Indicator: Bergaya Vintage Seal --}}
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-12 md:h-12 rounded-full border border-stone-300 bg-[#e3d5ba] text-[var(--ink-black)] absolute left-0 md:left-1/2 md:-translate-x-1/2 z-10 shadow-md">
                                        <span
                                            class="font-vintage-serif text-xs md:text-sm font-bold">{{ $index + 1 }}</span>
                                    </div>

                                    {{-- Content Card --}}
                                    <div class="w-[calc(100%-3rem)] md:w-[calc(50%-3rem)] ml-auto md:ml-0"
                                        data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                        <div
                                            class="bg-white p-3 md:p-4 shadow-xl border border-stone-100 rounded-sm transform transition-transform hover:-translate-y-1">

                                            {{-- Image: Menggunakan aspect-auto untuk menampilkan ukuran asli/proporsional --}}
                                            @if ($story->image)
                                                <div class="mb-4 overflow-hidden bg-stone-50 border border-stone-100">
                                                    <img src="{{ asset('storage/' . $story->image) }}"
                                                        alt="{{ $story->title }}"
                                                        class="w-full h-auto object-contain transition-transform duration-700 hover:scale-105">
                                                </div>
                                            @endif

                                            <div class="px-2 pb-2">
                                                <span
                                                    class="text-[var(--vintage-gold)] font-bold tracking-tighter text-sm md:text-base block mb-1">
                                                    {{ $story->date }}
                                                </span>
                                                <h4
                                                    class="font-vintage-serif text-lg md:text-xl text-[var(--ink-black)] mb-3 leading-tight uppercase">
                                                    {{ $story->title }}
                                                </h4>
                                                <div class="h-[1px] w-10 bg-stone-200 mb-3"></div>
                                                <p
                                                    class="text-stone-600 text-[11px] md:text-sm leading-relaxed italic">
                                                    "{{ $story->description }}"
                                                </p>
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
                        <h2 class="font-serif-elegant text-4xl mb-2 text-white">Our Moments</h2>
                        <p class="text-xs text-white-500 mb-10 tracking-[0.3em] uppercase">Captured Memories</p>
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
                    <div class="max-w-md mx-auto w-full text-center">
                        <h2 class="font-vintage-serif text-4xl mb-4 text-[var(--ink-black)] italic">Wedding Gift</h2>
                        <p class="font-classic-serif italic text-stone-500 mb-10 text-sm">Doa restu Anda adalah karunia
                            terindah, namun jika Anda ingin memberikan tanda kasih, dapat melalui:</p>
                        <div
                            class="luxury-card p-10 border-double border-4 border-[var(--vintage-gold)] bg-white/50 relative overflow-hidden">
                            <div class="mb-6"><i data-lucide="gift"
                                    class="w-8 h-8 mx-auto text-[var(--sepia-text)] opacity-60"></i></div>
                            <p class="text-[var(--sepia-text)] font-bold mb-2 uppercase tracking-[0.2em] text-xs">
                                {{ $invitation->bank_name_1 }}</p>
                            <h3 class="text-3xl font-vintage-serif text-[var(--ink-black)] mb-2 tracking-tighter">
                                {{ $invitation->bank_account_1 }}</h3>
                            <p class="text-sm text-stone-500 mb-8 italic">a.n {{ $invitation->bank_owner_1 }}</p>
                            <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                class="btn-vintage !py-2 !px-8 !text-[10px]">Salin Rekening</button>
                        </div>
                    </div>
                </section>
            @endif
            <section class="section-auto px-4 md:px-6 py-10" id="rsvp-section">
                <div class="max-w-2xl mx-auto w-full">
                    {{-- Judul: Ukuran dikurangi di mobile --}}
                    <h2
                        class="font-vintage-serif text-2xl md:text-4xl text-center mb-6 md:mb-10 text-[var(--ink-black)] italic uppercase tracking-widest">
                        Wishes & RSVP
                    </h2>

                    {{-- Form: Padding dikurangi (p-5) dan border lebih halus --}}
                    <form id="comment-form"
                        class="luxury-card p-5 md:p-8 mb-8 md:mb-12 border border-stone-300 bg-white/80">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            {{-- Nama Tamu --}}
                            <div class="text-center pb-3 border-b border-stone-100">
                                <p
                                    class="text-[8px] md:text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">
                                    Nama Tamu</p>
                                <p class="text-lg md:text-xl font-vintage-serif text-[var(--sepia-text)]">
                                    {{ $guestName }}</p>
                                <input type="hidden" id="c_name" name="name" value="{{ $guestName }}">
                            </div>

                            {{-- Radio Buttons: Teks lebih kecil --}}
                            <div class="grid grid-cols-2 gap-3 md:gap-4">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-stone-200 block text-center py-2.5 text-[9px] md:text-[11px] font-bold uppercase cursor-pointer transition-all hover:bg-stone-50">
                                        Akan Hadir
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-stone-200 block text-center py-2.5 text-[9px] md:text-[11px] font-bold uppercase cursor-pointer transition-all hover:bg-stone-50">
                                        Berhalangan
                                    </label>
                                </div>
                            </div>

                            {{-- Textarea: Garis bawah lebih tipis --}}
                            <textarea id="c_message" name="message" rows="3" placeholder="Tulis doa restu Anda..."
                                class="w-full p-2 text-xs md:text-sm bg-transparent border-b border-stone-300 focus:border-[var(--vintage-gold)] outline-none text-stone-700 italic placeholder:not-italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-vintage w-full py-3 text-[10px] md:text-xs uppercase tracking-widest font-bold">
                                <span id="btn-text">Kirim Ucapan</span>
                            </button>
                        </div>
                    </form>

                    {{-- Comment List: Max height dikurangi agar tidak terlalu panjang di HP --}}
                    <div class="space-y-3 max-h-[400px] md:max-h-[600px] overflow-y-auto pr-1 scrollbar-hide"
                        id="comment-list">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="luxury-card p-4 border-l-2 border-l-[var(--vintage-gold)] bg-white/50">
                                <div class="flex justify-between items-start mb-1">
                                    <div>
                                        <h4
                                            class="font-bold text-[var(--ink-black)] text-[10px] md:text-sm uppercase tracking-tight">
                                            {{ $comment->name }}
                                        </h4>
                                        <span
                                            class="text-[8px] bg-stone-100 px-1.5 py-0.5 uppercase font-semibold text-stone-500">
                                            {{ $comment->presence }}
                                        </span>
                                    </div>
                                    <span
                                        class="text-[8px] text-stone-400 italic">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>

                                <p class="text-[11px] md:text-sm text-stone-600 italic leading-relaxed">
                                    "{{ $comment->message }}"</p>

                                @if (!empty(trim($comment->reply)))
                                    <div class="mt-3 ml-4 p-3 bg-[#fdfaf5] border-l border-[var(--vintage-gold)]">
                                        <p
                                            class="text-[8px] font-bold text-[var(--sepia-text)] uppercase mb-1 flex items-center gap-1">
                                            <i data-lucide="message-square" class="w-2 h-2"></i> Balasan:
                                        </p>
                                        <p class="text-stone-600 text-[10px] leading-relaxed">{{ $comment->reply }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center bg-[#1a1a1a] !text-[#d4c4a8] border-none">
                <div class="vintage-border !outline-[#5e503f] !border-[#5e503f] p-12" data-aos="zoom-in">
                    <h3 class="font-script text-5xl text-[var(--vintage-gold)] mb-8">Terima Kasih</h3>
                    <p class="font-classic-serif text-lg tracking-[0.2em] opacity-80 max-w-xs mx-auto italic">Doa restu
                        Anda adalah kado terindah bagi kami.</p>
                    <div class="mt-20 opacity-40 text-[9px] tracking-[0.6em] uppercase">The Vintage Paper Edition</div>
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
            effect: "creative",
            creativeEffect: {
                prev: {
                    shadow: true,
                    translate: [0, 0, -400]
                },
                next: {
                    translate: ["100%", 0, 0]
                },
            },
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });
        document.addEventListener('DOMContentLoaded', function() {
            const hero = document.getElementById('hero-section');
            const ornaments = document.getElementById('global-ornaments');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    // Jika Hero sudah TIDAK terlihat (isIntersecting = false)
                    if (!entry.isIntersecting) {
                        ornaments.classList.remove('opacity-0');
                        ornaments.classList.add('opacity-100');
                    } else {
                        // Jika masih di Hero, sembunyikan ornamen
                        ornaments.classList.remove('opacity-100');
                        ornaments.classList.add('opacity-0');
                    }
                });
            }, {
                threshold: 0.1
            }); // Trigger ketika hanya 10% hero yang tersisa

            if (hero && ornaments) {
                observer.observe(hero);
            }
        });

        function createDust() {
            const container = document.getElementById('dust-container');
            if (!container) return;
            const dust = document.createElement('div');
            dust.classList.add('dust');
            const size = Math.random() * 3 + 1 + 'px';
            dust.style.width = size;
            dust.style.height = size;
            dust.style.left = Math.random() * 100 + 'vw';
            dust.style.animationDuration = Math.random() * 10 + 10 + 's';
            container.appendChild(dust);
            setTimeout(() => {
                dust.remove();
            }, 15000);
        }
        setInterval(createDust, 400);

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
                icon.setAttribute('data-lucide', 'play');
            } else {
                music.play();
                icon.setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text);
            const originalText = btn.innerText;
            btn.innerText = "Tersalin!";
            setTimeout(() => {
                btn.innerText = originalText;
            }, 2000);
        }
        const target = new Date("{{ $data['date'] }}").getTime();
        setInterval(() => {
            const now = new Date().getTime();
            const d = target - now;
            if (d > 0) {
                document.getElementById('days').innerText = Math.floor(d / (86400000)).toString().padStart(2, '0');
                document.getElementById('hours').innerText = Math.floor((d % 86400000) / 3600000).toString()
                    .padStart(2, '0');
                document.getElementById('minutes').innerText = Math.floor((d % 3600000) / 60000).toString()
                    .padStart(2, '0');
            }
        }, 1000);
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('c_submit');
            const btnText = document.getElementById('btn-text');
            const name = document.getElementById('c_name').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const message = document.getElementById('c_message').value;
            submitBtn.disabled = true;
            btnText.innerText = "MENGIRIM...";
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
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengirim pesan');
                    return response.json();
                })
                .then(data => {
                    const commentList = document.getElementById('comment-list');
                    const newCommentHtml = `
            <div class="luxury-card p-5 border-l-4 border-l-[var(--vintage-gold)] transition-all hover:translate-x-1 animate-fade-in">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h4 class="font-bold text-[var(--ink-black)] text-sm uppercase tracking-tight">${name}</h4>
                        <span class="text-[9px] bg-stone-200 px-2 py-1 uppercase tracking-tighter">${presence}</span>
                    </div>
                    <span class="text-[9px] text-stone-400 italic">Baru saja</span>
                </div>
                <p class="text-sm text-stone-600 italic leading-relaxed">"${message}"</p>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newCommentHtml);
                    document.getElementById('c_message').value = "";
                    alert("Terima kasih atas ucapan dan doanya!");
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Maaf, terjadi kesalahan. Silakan coba lagi.");
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    btnText.innerText = "KIRIM UCAPAN";
                });
        });
    </script>
</body>

</html>
