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
        href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;500&family=Birthstone&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --terra-main: #b85c38;
            --terra-dark: #803d29;
            --terra-light: #e07a5f;
            --sand-warm: #f4f1de;
            --text-clay: #3d405b;
            --card-cream: rgba(255, 252, 242, 0.9);
        }

        .font-serif-elegant {
            font-family: 'Crimson Pro', serif;
        }

        .font-sans-light {
            font-family: 'Montserrat', sans-serif;
        }

        .font-script {
            font-family: 'Birthstone', cursive;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--sand-warm);
            overflow: hidden;
            color: var(--text-clay);
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
            padding: 2rem 1rem;
            background-color: var(--sand-warm);
            background-image: url('https://www.transparenttextures.com/patterns/sandpaper.png');
        }

        .luxury-card {
            background: var(--card-cream);
            border: 1px solid rgba(184, 92, 56, 0.2);
            border-radius: 4px;
            box-shadow: 0 12px 30px rgba(128, 61, 41, 0.08);
        }

        .btn-terra {
            background: var(--terra-main);
            color: white;
            font-weight: 500;
            letter-spacing: 2px;
            padding: 12px 35px;
            transition: all 0.4s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(184, 92, 56, 0.2);
        }

        .btn-terra:hover {
            background: var(--terra-dark);
            transform: scale(1.05);
        }

        .presence-input:checked+label {
            background: var(--terra-main);
            color: white;
            border-color: var(--terra-main);
        }

        .hero-bg {
            background: linear-gradient(rgba(244, 241, 222, 0.6), rgba(244, 241, 222, 0.8)),
                url('https://images.unsplash.com/photo-1525253013412-55c1a69a5738?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .leaf {
            position: absolute;
            color: var(--terra-light);
            opacity: 0.3;
            animation: fall 10s linear infinite;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes fall {
            0% {
                transform: translateY(-10vh) rotate(0deg);
                opacity: 0;
            }

            20% {
                opacity: 0.4;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .swiper-pagination-bullet-active {
            background: var(--terra-main) !important;
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
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="leaf-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#efe9e1] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">

        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                {{-- Overlay sedikit lebih gelap di mobile agar teks putih/terang lebih kontras --}}
                <div class="absolute inset-0 bg-stone-900/30 backdrop-blur-[0.5px]"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#efe9e1]/10 to-[#efe9e1]/90"></div>
            </div>
        @endif

        <div class="text-center px-8 z-20 relative w-full" data-aos="fade-up">
            {{-- Subtitle dikecilkan --}}
            <div
                class="mb-2 tracking-[0.3em] text-[8px] md:text-[10px] uppercase text-[var(--terra-main)] font-bold drop-shadow-sm">
                The Wedding Celebration of
            </div>

            {{-- Nama Pengantin: Ukuran diatur ulang agar tidak bertumpuk di HP --}}
            <div class="flex flex-col items-center mb-6">
                <h1
                    class="font-serif-elegant text-4xl md:text-7xl text-[var(--terra-dark)] font-bold uppercase tracking-tighter md:tracking-tight drop-shadow-md leading-tight">
                    {{ $data['groom'] }}
                </h1>

                {{-- Garis pemisah lebih mungil --}}
                <div class="h-[1px] w-8 md:w-12 bg-[var(--terra-main)] my-3 md:my-4 shadow-sm opacity-60"></div>

                <h1
                    class="font-serif-elegant text-4xl md:text-7xl text-[var(--terra-dark)] font-bold uppercase tracking-tighter md:tracking-tight drop-shadow-md leading-tight">
                    {{ $data['bride'] }}
                </h1>
            </div>

            {{-- Section Nama Tamu lebih compact --}}
            <div class="mb-8">
                <p class="font-serif italic text-xs md:text-base text-stone-600 mb-1 drop-shadow-sm">Dear honored
                    guest,</p>
                <h2
                    class="text-2xl md:text-3xl font-serif-elegant text-[var(--text-clay)] mb-6 tracking-wide leading-tight">
                    {{ $guestName }}
                </h2>
            </div>

            {{-- Tombol Open Invitation --}}
            <button onclick="openInvitation()"
                class="btn-terra text-[9px] md:text-[10px] uppercase px-8 md:px-10 py-3 tracking-widest shadow-xl transition-all active:scale-90 hover:brightness-110">
                Open Invitation
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-[var(--sand-warm)] text-[var(--terra-main)] p-3 rounded-full shadow-lg cursor-pointer hidden border border-[var(--terra-main)]/30">
        <i data-lucide="disc" id="music-icon" class="w-5 h-5"></i>
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
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-[#F4F1EE]">
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-[#E5D3C5]"></div>
                    @endif
                    <div class="absolute inset-0 bg-stone-900/20 backdrop-blur-[0.5px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-[#F4F1EE]/40 via-transparent to-[#F4F1EE]/60">
                    </div>
                </div>

                <div data-aos="fade-up" class="text-center z-10 relative px-6 w-full">
                    <div
                        class="mb-4 tracking-[0.3em] text-[9px] md:text-[11px] uppercase text-[var(--terra-main)] font-bold drop-shadow-sm">
                        Save The Date
                    </div>
                    <div class="flex flex-col items-center mb-6 md:mb-8">
                        <h2
                            class="font-serif-elegant text-4xl md:text-7xl text-[var(--terra-dark)] uppercase drop-shadow-md leading-tight">
                            {{ $data['groom'] }}
                        </h2>
                        <p class="font-script text-3xl md:text-4xl text-[var(--terra-light)] my-1 md:my-2">&</p>
                        <h2
                            class="font-serif-elegant text-4xl md:text-7xl text-[var(--terra-dark)] uppercase drop-shadow-md leading-tight">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-elegant text-lg md:text-xl tracking-[0.2em] text-[var(--text-clay)] mb-8 border-y border-[var(--terra-main)]/20 py-2 inline-block px-6">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d . m . Y') }}
                    </p>

                    {{-- Countdown Box: Lebih Ringkas di HP --}}
                    <div
                        class="flex justify-center gap-4 md:gap-8 bg-white/40 backdrop-blur-md p-4 md:p-6 rounded-2xl border border-white/50 shadow-sm max-w-xs mx-auto md:max-w-none">
                        @foreach (['days' => 'Days', 'hours' => 'Hours', 'minutes' => 'Mins'] as $id => $label)
                            <div class="flex flex-col min-w-[50px]">
                                <span id="{{ $id }}"
                                    class="text-2xl md:text-3xl font-serif-elegant text-[var(--terra-dark)]">00</span>
                                <span
                                    class="text-[7px] md:text-[8px] uppercase tracking-widest text-stone-500">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-16 relative overflow-hidden bg-white">
                {{-- Ornament: Dikecilkan di HP --}}
                <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    <div
                        class="italic text-stone-500 text-xs md:text-sm font-serif-elegant mb-12 px-6 leading-relaxed">
                        "Two souls with but a single thought; two hearts that beat as one."
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12">
                        @foreach ([['name' => $invitation->groom_name, 'photo' => $invitation->groom_photo, 'info' => $invitation->groom_info, 'label' => 'Putra dari'], ['name' => $invitation->bride_name, 'photo' => $invitation->bride_photo, 'info' => $invitation->bride_info, 'label' => 'Putri dari']] as $person)
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-36 h-48 md:w-48 md:h-64 mb-4 md:mb-6 grayscale hover:grayscale-0 transition-all duration-700 border-[6px] md:border-8 border-white shadow-md overflow-hidden rounded-sm">
                                    <img src="{{ $person['photo'] ? asset('storage/' . $person['photo']) : 'https://ui-avatars.com/api/?name=' . urlencode($person['name']) }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <h3
                                    class="font-serif-elegant text-2xl md:text-3xl text-[var(--terra-dark)] mb-1 uppercase tracking-tight">
                                    {{ $person['name'] }}
                                </h3>
                                <p class="text-[9px] md:text-xs text-stone-400 uppercase tracking-widest mb-1">
                                    {{ $person['label'] }}</p>
                                <p class="font-serif-elegant text-sm md:text-base text-stone-600 italic px-4">
                                    {{ $person['info'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-16 relative flex flex-col items-center justify-center bg-[#F9F8F6]">
                <h2
                    class="font-serif-elegant text-2xl md:text-4xl mb-10 text-[var(--terra-dark)] uppercase tracking-[0.2em] text-center">
                    The Wedding Event
                </h2>

                <div
                    class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-4 w-full max-w-5xl">
                    @foreach ($invitation->events as $event)
                        <div
                            class="luxury-card p-6 md:p-10 flex flex-col items-center text-center bg-white/80 backdrop-blur-sm rounded-3xl border border-stone-100 shadow-sm">
                            <div
                                class="w-10 h-10 bg-[var(--terra-main)]/10 rounded-full flex items-center justify-center mb-4">
                                <i data-lucide="map-pin" class="text-[var(--terra-main)] w-5 h-5"></i>
                            </div>
                            <h3
                                class="font-serif-elegant text-lg md:text-xl font-bold text-[var(--terra-dark)] mb-2 uppercase tracking-normal">
                                {{ $event->event_name }}
                            </h3>
                            <div class="h-[1px] w-8 bg-stone-200 mb-4"></div>

                            <p class="text-stone-700 text-sm font-bold mb-1">
                                {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                            </p>
                            <p class="text-stone-400 text-xs mb-4">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB - Selesai
                            </p>

                            <div class="bg-stone-50 p-3 rounded-xl w-full mb-6 border border-stone-100/50">
                                <p class="font-bold text-[var(--terra-main)] text-[10px] md:text-xs mb-1 uppercase">
                                    {{ $event->location_name }}
                                </p>
                                <p class="text-[10px] md:text-[11px] text-stone-500 leading-relaxed">
                                    {{ $event->address }}</p>
                            </div>

                            @if (!empty($event->google_maps_url))
                                <a href="{{ $event->google_maps_url }}" target="_blank"
                                    class="w-full md:w-auto border border-[var(--terra-main)] text-[var(--terra-main)] px-8 py-2.5 text-[10px] uppercase tracking-widest hover:bg-[var(--terra-main)] hover:text-white transition-all rounded-lg font-bold">
                                    Buka Google Maps
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
                <section class="snap-section px-4">
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
                    <div class="max-w-md mx-auto w-full text-center">
                        <h2 class="font-serif-elegant text-4xl mb-12 text-[var(--terra-dark)] uppercase">Wedding Gift
                        </h2>
                        <div class="luxury-card p-10 bg-[#fffdfa] border-dashed border-2">
                            <p class="text-[var(--terra-main)] font-bold mb-6 uppercase text-xs tracking-widest">
                                {{ $invitation->bank_name_1 }}</p>
                            <h3 class="text-2xl font-serif-elegant text-stone-700 mb-2">
                                {{ $invitation->bank_account_1 }}</h3>
                            <p class="text-xs text-stone-400 mb-8 italic">a.n {{ $invitation->bank_owner_1 }}</p>
                            <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                class="btn-terra !py-2 !px-6 text-[9px] uppercase">Salin Rekening</button>
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-12 relative z-30 bg-white/50">
                {{-- Ornament: Dikecilkan dan transparansi dikurangi agar teks lebih fokus --}}
                <div
                    class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-[var(--gold-soft)] opacity-20 z-0 animate-floral delay-1"
                    style="transform: scaleX(-1);">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-2xl mx-auto w-full relative z-10">
                    <h2
                        class="font-serif-elegant text-2xl md:text-4xl text-center mb-8 text-[var(--terra-dark)] uppercase tracking-[0.2em]">
                        Wishes & RSVP
                    </h2>

                    {{-- Form: Padding dikurangi dan radius disesuaikan --}}
                    <form id="comment-form"
                        class="p-5 md:p-8 mb-8 bg-white shadow-sm border-t-4 border-t-[var(--terra-main)] rounded-b-2xl">
                        @csrf
                        <div class="space-y-4 md:space-y-6">
                            {{-- Nama Tamu --}}
                            <div class="text-center pb-3 border-b border-stone-50">
                                <p class="text-[8px] font-bold text-stone-300 uppercase tracking-widest mb-1">Nama Tamu
                                </p>
                                <p class="text-lg font-serif-elegant text-[var(--terra-dark)]">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            {{-- Presence Filter --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-stone-100 block text-center py-2.5 text-[9px] font-bold uppercase cursor-pointer transition-all text-stone-400 rounded-lg">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-stone-100 block text-center py-2.5 text-[9px] font-bold uppercase cursor-pointer transition-all text-stone-400 rounded-lg">Berhalangan</label>
                                </div>
                            </div>

                            {{-- Textarea --}}
                            <textarea id="c_message" rows="3" placeholder="Tulis ucapan hangat Anda..."
                                class="w-full p-4 text-xs bg-stone-50/50 border border-stone-100 rounded-xl focus:ring-1 focus:ring-[var(--terra-main)] outline-none text-stone-600 transition-all italic placeholder:not-italic"
                                required></textarea>

                            {{-- Button --}}
                            <button type="submit" id="c_submit"
                                class="btn-terra w-full py-3 text-[10px] md:text-[11px] uppercase tracking-[0.2em] font-bold rounded-lg shadow-md active:scale-95 transition-transform">
                                Kirim Ucapan
                            </button>
                        </div>
                    </form>

                    {{-- Comment List: Scroll area dioptimalkan --}}
                    <div id="comment-list"
                        class="space-y-3 max-h-[40vh] md:max-h-[45vh] overflow-y-auto pr-1 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="bg-white/80 p-4 border border-stone-100 shadow-sm rounded-xl">
                                <div class="flex justify-between items-start mb-1.5">
                                    <div class="flex flex-col">
                                        <h4
                                            class="font-bold text-[10px] text-[var(--terra-dark)] uppercase tracking-tight">
                                            {{ $comment->name }}
                                        </h4>
                                        <span
                                            class="text-[8px] text-[var(--terra-light)] font-bold uppercase tracking-wider">
                                            {{ $comment->presence }}
                                        </span>
                                    </div>
                                    <span
                                        class="text-[7px] text-stone-400">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-stone-600 text-[11px] italic leading-relaxed">"{{ $comment->message }}"
                                </p>

                                @if (!empty(trim($comment->reply)))
                                    <div
                                        class="mt-3 ml-4 p-3 bg-stone-50 border-l-2 border-[var(--terra-main)] rounded-r-lg">
                                        <p class="text-[8px] font-bold text-[var(--terra-dark)] uppercase mb-1">Balasan
                                            Mempelai:</p>
                                        <p class="text-stone-600 text-[10px] leading-relaxed">{{ $comment->reply }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center bg-[#2d2d2d] !text-stone-300">
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
                <i data-lucide="flower-2" class="w-8 h-8 text-[var(--terra-light)] mx-auto mb-6"></i>
                <h3 class="font-script text-6xl text-[var(--terra-light)] mb-8 italic">Thank You</h3>
                <p class="font-serif-elegant text-sm tracking-widest opacity-60 px-10">We can't wait to celebrate our
                    love with you.</p>
                <div class="mt-20 opacity-30 text-[8px] tracking-[0.5em] uppercase font-bold">Terracotta Warmth Edition
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
            effect: "cards",
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });

        function createLeaf() {
            const container = document.getElementById('leaf-container');
            if (!container) return;
            const leaf = document.createElement('div');
            leaf.classList.add('leaf');
            leaf.style.left = Math.random() * 100 + 'vw';
            leaf.style.fontSize = Math.random() * 20 + 10 + 'px';
            leaf.innerHTML = '🍂';
            leaf.style.animationDuration = Math.random() * 7 + 7 + 's';
            container.appendChild(leaf);
            setTimeout(() => {
                leaf.remove();
            }, 12000);
        }
        setInterval(createLeaf, 1000);

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
                icon.setAttribute('data-lucide', 'disc');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(val, btn) {
            navigator.clipboard.writeText(val).then(() => {
                const original = btn.innerText;
                btn.innerText = "COPIED!";
                setTimeout(() => {
                    btn.innerText = original;
                }, 2000);
            });
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
            const btn = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presenceEl = document.querySelector('input[name="presence"]:checked');
            const presence = presenceEl ? presenceEl.value : "Hadir";
            if (!message.trim()) return;
            const originalBtnText = btn.innerHTML;
            btn.innerText = "SENDING WISHES...";
            btn.disabled = true;
            const targetUrl = window.location.pathname + '/comment';
            fetch(targetUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
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
                    if (!res.ok) throw new Error(data.message || 'Error occurred');
                    return data;
                })
                .then(data => {
                    const commentList = document.getElementById('comment-list');
                    const presenceClass = presence === 'Hadir' ?
                        'bg-emerald-800 text-emerald-200' :
                        'bg-red-900/40 text-red-200';
                    const newCommentHtml = `
            <div class="comment-item p-5 rounded-lg border-r border-gold-luxury/10 shadow-lg bg-emerald-deep/20 mb-4 transition-all duration-700 transform translate-y-0">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h4 class="font-bold text-[11px] text-gold-light uppercase tracking-wider">${name}</h4>
                        <p class="text-[8px] text-stone-500 uppercase">Just now</p>
                    </div>
                    <span class="text-[8px] ${presenceClass} px-2 py-1 rounded-full border border-current opacity-70 font-bold uppercase tracking-tighter">
                        ${presence}
                    </span>
                </div>
                <p class="text-stone-300 text-xs italic leading-relaxed">"${message}"</p>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newCommentHtml);
                    document.getElementById('c_message').value = "";
                    commentList.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch(err => {
                    console.error(err);
                    alert("Failed to send wishes. Please check your connection.");
                })
                .finally(() => {
                    btn.innerHTML = originalBtnText;
                    btn.disabled = false;
                });
        });
    </script>
</body>

</html>
