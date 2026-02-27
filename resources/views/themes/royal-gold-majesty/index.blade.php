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
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&family=Great+Vibes&family=Montserrat:wght@300;500;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --gold-primary: #c5a059;
            --gold-light: #e2c792;
            --gold-dark: #8c6d31;
            --royal-black: #1a1a1a;
            --bg-ivory: #fcfaf5;
            --text-main: #333333;
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

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--bg-ivory);
            overflow: hidden;
            color: var(--text-main);
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
            background-image: url('https://www.transparenttextures.com/patterns/handmade-paper.png');
        }

        .luxury-card {
            background: white;
            border: 1px solid var(--gold-light);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .btn-royal {
            background: var(--royal-black);
            color: var(--gold-light);
            font-weight: 500;
            padding: 14px 35px;
            border: 1px solid var(--gold-primary);
            transition: all 0.4s ease;
            letter-spacing: 3px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 10px;
        }

        .btn-royal:hover {
            background: var(--gold-primary);
            color: white;
            transform: translateY(-2px);
        }

        .presence-input:checked+label {
            background: var(--gold-primary);
            color: white;
            border-color: var(--gold-dark);
        }

        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .gold-dust {
            position: absolute;
            background: radial-gradient(circle, #fff7d1 0%, #d4af37 100%);
            border-radius: 50%;
            animation: dust-fall 7s linear infinite;
            z-index: 1;
            opacity: 0.6;
        }

        @keyframes dust-fall {
            0% {
                transform: translateY(-10vh) rotate(0deg);
                opacity: 0;
            }

            20% {
                opacity: 1;
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
            background: var(--gold-primary) !important;
        }

        .frame-decoration {
            position: absolute;
            inset: 20px;
            border: 1px solid var(--gold-light);
            pointer-events: none;
            z-index: 5;
            opacity: 0.5;
        }
    </style>
</head>

<body class="font-sans-light">
    @php $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan')); @endphp
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" id="dust-container"></div>
    @php
        $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-[#1a1a1a] flex flex-col items-center justify-center transition-all duration-1000 overflow-hidden">
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}" class="w-full h-full object-cover"
                    alt="Wedding Cover">
                <div class="absolute inset-0 bg-gradient-to-b from-[#1a1a1a]/80 via-[#1a1a1a]/40 to-[#1a1a1a]/90"></div>
                <div class="absolute inset-0 shadow-[inset_0_0_150px_rgba(0,0,0,0.7)]"></div>
            </div>
        @endif
        <div class="text-center px-6 z-20 relative" data-aos="fade-up">
            <div
                class="mb-4 md:mb-6 tracking-[0.3em] md:tracking-[0.5em] text-[9px] md:text-[10px] uppercase text-[#c5a059] font-bold">
                The Wedding of
            </div>
            <div class="flex flex-col items-center mb-6 md:mb-10">
                <h1 class="font-script text-5xl md:text-9xl text-[#c5a059] leading-tight drop-shadow-2xl">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-xl md:text-2xl my-2 md:my-4 text-white italic">&</span>
                <h1 class="font-script text-5xl md:text-9xl text-[#c5a059] leading-tight drop-shadow-2xl">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="mb-8 md:mb-12">
                <p class="font-serif-elegant italic text-gray-300 text-sm md:text-lg mb-1">Special Invitation for:</p>
                <h2
                    class="text-xl md:text-3xl font-montserrat font-light text-white tracking-widest uppercase mb-4 md:mb-6 drop-shadow-md">
                    {{ $guestName }}
                </h2>
                <div class="w-16 md:w-24 h-[1px] bg-[#c5a059] mx-auto shadow-[0_0_8px_rgba(197,160,89,0.5)]"></div>
            </div>
            <button onclick="openInvitation()"
                class="btn-royal px-10 py-3 text-xs md:text-base tracking-widest uppercase transition-all hover:scale-105 active:scale-95 shadow-xl">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/10 backdrop-blur-md text-[#c5a059] p-4 rounded-full shadow-2xl cursor-pointer hidden border border-[#c5a059]/30">
        <i data-lucide="music" id="music-icon" class="w-5 h-5"></i>
    </div>
    @if ($invitation->music_file)
        <audio id="bg-music" loop>
            <source src="{{ asset('storage/' . $invitation->music_file) }}" type="audio/mpeg">
        </audio>
    @endif
    <div id="main-content" class="hidden">
        <div class="snap-container scrollbar-hide">
            <section
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen px-4 overflow-hidden">
                <div class="absolute inset-0 z-0">
                    @php
                        // Mencari data hero langsung dari attachment yang dikirim route
                        $currentHero = $invitation->attachments->where('file_type', 'hero')->first();
                    @endphp

                    @if ($currentHero)
                        <img src="{{ asset('storage/' . $currentHero->file_path) }}"
                            class="w-full h-full object-cover opacity-90" alt="Hero Background">
                    @else
                        <div class="w-full h-full bg-stone-200"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-stone-100/40"></div>
                </div>
                <div data-aos="zoom-out" data-aos-duration="2000" class="text-center text-white px-4 z-10 relative">
                    <div
                        class="mb-3 md:mb-6 tracking-[0.3em] md:tracking-[0.6em] text-[8px] md:text-[10px] uppercase font-montserrat text-[#c5a059] font-bold">
                        Royal Celebration
                    </div>
                    <div class="flex flex-col items-center mb-4 md:mb-8">
                        <h2 class="font-script text-5xl md:text-9xl text-[#c5a059] leading-tight drop-shadow-2xl">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif-luxury text-lg md:text-2xl text-stone-300 italic my-0 md:my-2">&</span>
                        <h2 class="font-script text-5xl md:text-9xl text-[#c5a059] leading-tight drop-shadow-2xl">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p
                        class="font-serif-elegant text-sm md:text-2xl tracking-[0.1em] md:tracking-[0.2em] mb-6 md:mb-12 border-y border-[#c5a059]/30 py-3 inline-block px-8 md:px-10">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d . m . Y') }}
                    </p>

                    <div class="flex justify-center gap-6 md:gap-14">
                        <div class="flex flex-col items-center">
                            <span id="days" class="text-2xl md:text-5xl font-light font-montserrat">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase tracking-widest text-[#c5a059] mt-1">Days</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span id="hours" class="text-2xl md:text-5xl font-light font-montserrat">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase tracking-widest text-[#c5a059] mt-1">Hours</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span id="minutes" class="text-2xl md:text-5xl font-light font-montserrat">00</span>
                            <span
                                class="text-[7px] md:text-[9px] uppercase tracking-widest text-[#c5a059] mt-1">Mins</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-6 py-10 md:py-12">
                <div class="max-w-4xl mx-auto w-full text-center" data-aos="fade-up">
                    <div
                        class="italic text-stone-400 text-[10px] md:text-sm font-serif-elegant mb-8 md:mb-20 px-2 max-w-2xl mx-auto leading-relaxed md:leading-loose">
                        "Ar-Rum: 21 - Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu
                        isteri-isteri dari jenismu sendiri..."
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-20 items-center">
                        <div class="flex flex-col items-center">
                            <div class="relative p-1 border border-[#c5a059] mb-4">
                                <div class="w-40 h-56 md:w-64 md:h-80 overflow-hidden">
                                    <img src="{{ asset('storage/' . $invitation->groom_photo) }}"
                                        class="w-full h-full object-cover grayscale">
                                </div>
                            </div>
                            <h3
                                class="font-serif-elegant text-xl md:text-3xl text-[#8c6d31] mb-1 uppercase tracking-widest">
                                {{ $invitation->groom_name }}
                            </h3>
                            <p class="font-sans-light text-stone-500 text-[9px] md:text-xs tracking-widest uppercase">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="relative p-1 border border-[#c5a059] mb-4">
                                <div class="w-40 h-56 md:w-64 md:h-80 overflow-hidden">
                                    <img src="{{ asset('storage/' . $invitation->bride_photo) }}"
                                        class="w-full h-full object-cover grayscale">
                                </div>
                            </div>
                            <h3
                                class="font-serif-elegant text-xl md:text-3xl text-[#8c6d31] mb-1 uppercase tracking-widest">
                                {{ $invitation->bride_name }}
                            </h3>
                            <p class="font-sans-light text-stone-500 text-[9px] md:text-xs tracking-widest uppercase">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-6 py-10 md:py-12">
                <div class="max-w-5xl mx-auto w-full">
                    <div class="text-center mb-6 md:mb-16">
                        <h2 class="font-serif-elegant text-xl md:text-4xl text-[#8c6d31] uppercase tracking-[0.2em]">
                            Save The Date
                        </h2>
                    </div>
                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-5 md:gap-12">
                        @foreach ($invitation->events as $event)
                            <div
                                class="luxury-card p-6 md:p-12 text-center border-t-2 md:border-t-4 border-t-[#c5a059] bg-white shadow-sm">
                                <h3
                                    class="font-montserrat text-[9px] md:text-sm font-bold text-[#8c6d31] mb-3 md:mb-8 uppercase tracking-[0.2em]">
                                    {{ $event->event_name }}
                                </h3>
                                <div class="space-y-2 md:space-y-4 mb-6 md:mb-10">
                                    <p class="text-lg md:text-2xl font-serif-elegant text-stone-800 leading-tight">
                                        {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                    </p>
                                    <p
                                        class="text-stone-400 font-light tracking-widest uppercase text-[9px] md:text-xs">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} — Selesai
                                    </p>
                                    <div class="pt-3 md:pt-6">
                                        <p
                                            class="font-bold text-stone-800 text-[11px] md:text-sm mb-1 uppercase tracking-widest">
                                            {{ $event->location_name }}
                                        </p>
                                        <p class="text-[9px] md:text-xs text-stone-400 leading-relaxed px-2">
                                            {{ $event->address }}
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="btn-royal inline-block w-full py-2.5 text-[10px] uppercase font-bold tracking-widest">
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
                <section class="snap-section px-4">
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
                    <div class="max-w-2xl mx-auto w-full text-center">
                        <div class="mb-12" data-aos="fade-up">
                            <h2 class="font-serif-elegant text-4xl text-[#8c6d31] uppercase tracking-widest mb-4">
                                Wedding Gift</h2>
                            <div class="w-24 h-[1px] bg-[#c5a059] mx-auto mb-6"></div>
                            <p
                                class="font-serif-elegant italic text-stone-400 text-sm leading-relaxed max-w-md mx-auto">
                                Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika Anda ingin
                                memberikan tanda kasih, kami menyediakan sarana berikut:
                            </p>
                        </div>
                        <div class="grid md:grid-cols-{{ $invitation->bank_name_2 ? '2' : '1' }} gap-8">
                            <div class="luxury-card p-10 bg-white group hover:border-[#c5a059] transition-all duration-500"
                                data-aos="zoom-in">
                                <div class="mb-6 flex justify-center">
                                    <i data-lucide="credit-card" class="text-[#c5a059] w-8 h-8 opacity-50"></i>
                                </div>
                                <p
                                    class="font-montserrat text-[10px] font-bold text-[#8c6d31] uppercase tracking-[0.3em] mb-4">
                                    {{ $invitation->bank_name_1 }}</p>
                                <h3 class="text-2xl font-serif-elegant text-stone-800 mb-2 tracking-wider"
                                    id="acc_1">{{ $invitation->bank_account_1 }}</h3>
                                <p class="text-xs text-stone-400 mb-8 uppercase tracking-widest">a.n
                                    {{ $invitation->bank_owner_1 }}</p>
                                <button onclick="copyToClipboard('{{ $invitation->bank_account_1 }}', this)"
                                    class="btn-royal py-3 px-8 text-[9px] w-full">
                                    Copy Account Number
                                </button>
                            </div>
                            @if ($invitation->bank_name_2)
                                <div class="luxury-card p-10 bg-white group hover:border-[#c5a059] transition-all duration-500"
                                    data-aos="zoom-in" data-aos-delay="200">
                                    <div class="mb-6 flex justify-center">
                                        <i data-lucide="wallet" class="text-[#c5a059] w-8 h-8 opacity-50"></i>
                                    </div>
                                    <p
                                        class="font-montserrat text-[10px] font-bold text-[#8c6d31] uppercase tracking-[0.3em] mb-4">
                                        {{ $invitation->bank_name_2 }}</p>
                                    <h3 class="text-2xl font-serif-elegant text-stone-800 mb-2 tracking-wider"
                                        id="acc_2">{{ $invitation->bank_account_2 }}</h3>
                                    <p class="text-xs text-stone-400 mb-8 uppercase tracking-widest">a.n
                                        {{ $invitation->bank_owner_2 }}</p>
                                    <button onclick="copyToClipboard('{{ $invitation->bank_account_2 }}', this)"
                                        class="btn-royal py-3 px-8 text-[9px] w-full">
                                        Copy Account Number
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 md:px-6 py-8 md:py-12">
                <div class="max-w-2xl mx-auto w-full">
                    <h2
                        class="font-serif-elegant text-2xl md:text-4xl text-center mb-6 md:mb-12 text-[#8c6d31] uppercase tracking-widest">
                        Wishes & RSVP
                    </h2>

                    <form id="comment-form"
                        class="luxury-card p-6 md:p-10 bg-white shadow-xl mb-8 md:mb-12 border border-stone-100">
                        @csrf
                        <div class="space-y-5 md:space-y-8">
                            <div class="text-center pb-4 border-b border-stone-100">
                                <p
                                    class="text-[9px] md:text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">
                                    Guest Name
                                </p>
                                <p class="text-xl md:text-2xl font-serif-elegant text-stone-800">{{ $guestName }}
                                </p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3 md:gap-6">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="border border-stone-200 block text-center py-3 md:py-4 text-[9px] md:text-[10px] font-bold uppercase tracking-widest cursor-pointer transition-all hover:border-[#c5a059]">
                                        I Will Attend
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="border border-stone-200 block text-center py-3 md:py-4 text-[9px] md:text-[10px] font-bold uppercase tracking-widest cursor-pointer transition-all hover:border-[#c5a059]">
                                        Decline
                                    </label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="3" placeholder="Your warm wishes..."
                                class="w-full p-4 text-xs md:text-sm bg-stone-50 border border-stone-100 focus:border-[#c5a059] outline-none text-stone-600 transition-all italic"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="btn-royal w-full py-3 text-[10px] md:text-xs">
                                Send Message
                            </button>
                        </div>
                    </form>

                    <div id="comment-list"
                        class="space-y-4 md:space-y-6 max-h-[35vh] md:max-h-[40vh] overflow-y-auto pr-2 scrollbar-hide">
                        @forelse($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="comment-item relative group" data-aos="fade-up">
                                <div
                                    class="bg-white p-4 md:p-6 border border-stone-100 shadow-sm transition-all duration-300 hover:shadow-md">
                                    <div class="flex justify-between items-start mb-2 md:mb-3">
                                        <div>
                                            <h4
                                                class="font-montserrat font-bold text-[10px] md:text-[11px] text-[#8c6d31] uppercase tracking-widest">
                                                {{ $comment->name }}
                                            </h4>
                                            <span class="text-[8px] text-stone-400 uppercase tracking-tighter">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <span
                                            class="text-[7px] md:text-[8px] px-2 md:px-3 py-1 border border-[#c5a059]/30 text-[#8c6d31] font-bold uppercase tracking-widest">
                                            {{ $comment->presence }}
                                        </span>
                                    </div>
                                    <p
                                        class="text-stone-600 text-xs md:text-sm italic font-serif-elegant leading-relaxed">
                                        "{{ $comment->message }}"
                                    </p>

                                    @if (!empty(trim($comment->reply)))
                                        <div
                                            class="mt-4 md:mt-6 ml-4 md:ml-6 p-4 md:p-5 bg-stone-50 border-l-2 border-[#c5a059] relative">
                                            <div
                                                class="absolute -top-2.5 left-3 bg-[#c5a059] text-white text-[7px] md:text-[8px] px-2 py-0.5 uppercase tracking-widest font-bold">
                                                The Couple's Reply
                                            </div>
                                            <p class="text-stone-500 text-[10px] md:text-xs leading-relaxed">
                                                {{ $comment->reply }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div id="empty-comment"
                                class="text-center py-6 md:py-10 opacity-50 italic text-xs md:text-sm">
                                Belum ada ucapan. Jadilah yang pertama memberikan doa restu.
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
            <footer class="snap-section text-center">
                <div class="max-w-md mx-auto px-10">
                    <h3 class="font-script text-5xl text-[#c5a059] mb-10">Thank You</h3>
                    <p class="font-serif-elegant italic text-stone-400 text-sm leading-relaxed mb-24">
                        Your presence will be the greatest gift of all.
                    </p>

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

        function createDust() {
            const container = document.getElementById('dust-container');
            if (!container) return;
            const dust = document.createElement('div');
            dust.classList.add('gold-dust');
            dust.style.left = Math.random() * 100 + 'vw';
            const size = Math.random() * 4 + 2 + 'px';
            dust.style.width = size;
            dust.style.height = size;
            dust.style.animationDuration = Math.random() * 4 + 4 + 's';
            container.appendChild(dust);
            setTimeout(() => {
                dust.remove();
            }, 7000);
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
                icon.setAttribute('data-lucide', 'music-2');
            } else {
                music.play();
                icon.setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerText;
                btn.innerText = "COPIED SUCCESSFULLY!";
                btn.style.background = "#c5a059";
                btn.style.color = "white";
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.style.background = "";
                    btn.style.color = "";
                }, 2000);
            }).catch(err => {
                alert("Failed to copy number.");
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
            const emptyState = document.getElementById('empty-comment');
            if (!message.trim()) return;
            submitBtn.disabled = true;
            const originalBtnText = submitBtn.innerText;
            submitBtn.innerText = "SENDING...";
            fetch("{{ route('comments.store', $invitation->slug) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        name,
                        presence,
                        message
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) throw new Error(data.message || 'Terjadi kesalahan');
                    return data;
                })
                .then(data => {
                    if (emptyState) emptyState.remove();
                    const newCommentHtml = `
            <div class="comment-item relative group" style="opacity: 0; transform: translateY(20px); transition: all 0.5s ease;">
                <div class="bg-white p-6 border border-stone-100 shadow-sm">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h4 class="font-montserrat font-bold text-[11px] text-[#8c6d31] uppercase tracking-widest">${name}</h4>
                            <span class="text-[9px] text-stone-400 uppercase tracking-tighter">Just now</span>
                        </div>
                        <span class="text-[8px] px-3 py-1 border border-[#c5a059]/30 text-[#8c6d31] font-bold uppercase tracking-widest">
                            ${presence}
                        </span>
                    </div>
                    <p class="text-stone-600 text-sm italic font-serif-elegant leading-relaxed">"${message}"</p>
                </div>
            </div>
        `;
                    commentList.insertAdjacentHTML('afterbegin', newCommentHtml);
                    setTimeout(() => {
                        const firstChild = commentList.querySelector('.comment-item');
                        firstChild.style.opacity = "1";
                        firstChild.style.transform = "translateY(0)";
                    }, 100);
                    document.getElementById('c_message').value = "";
                    console.log("Comment sent successfully");
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
    </script>
</body>

</html>
