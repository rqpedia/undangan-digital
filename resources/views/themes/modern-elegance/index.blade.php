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
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --bg-color: #f0f0f0;
            --shadow-dark: #bebebe;
            --shadow-light: #ffffff;
            --amber-gold: #b45309;
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
            background-color: var(--bg-color);
            overflow: hidden;
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
            padding: 4rem 1rem;
        }

        .neumorph-card {
            background: var(--bg-color);
            border-radius: 30px;
            box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .neumorph-inset {
            background: var(--bg-color);
            border-radius: 20px;
            box-shadow: inset 6px 6px 12px var(--shadow-dark), inset -6px -6px 12px var(--shadow-light);
        }

        .neumorph-button {
            background: var(--bg-color);
            border-radius: 50px;
            box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .neumorph-button:active {
            box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);
            transform: scale(0.95);
        }

        .swiper {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 50px;
        }

        @media (min-width: 768px) {
            .swiper {
                max-width: 1000px !important;
            }

            .swiper-slide img {
                max-height: 70vh !important;
                width: auto !important;
                object-fit: contain;
            }
        }

        @media (max-width: 767px) {
            .swiper {
                max-width: 400px;
            }
        }

        .swiper-pagination-bullet-active {
            background: var(--amber-gold) !important;
        }

        .presence-input:checked+label {
            background: var(--amber-gold);
            color: white;
            box-shadow: inset 4px 4px 8px #78350f;
        }

        .hero-bg {
            background: linear-gradient(rgba(240, 240, 240, 0.75), rgba(240, 240, 240, 0.85)),
                url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Animasi Berputar Berlawanan Arah */
        @keyframes spin-slow-reverse {
            from {
                transform: rotate(360deg);
            }

            to {
                transform: rotate(0deg);
            }
        }

        .animate-spin-very-slow {
            /* 20 detik untuk satu putaran penuh agar terlihat elegan */
            animation: spin-slow 20s linear infinite;
        }

        .animate-spin-very-slow-reverse {
            animation: spin-slow-reverse 20s linear infinite;
        }
    </style>
</head>

<body class="font-sans-light text-zinc-800">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="wreath-frame" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="48" fill="none" stroke="currentColor" stroke-width="0.5" />
            <circle cx="50" cy="50" r="44" fill="none" stroke="currentColor" stroke-width="1"
                stroke-dasharray="10 5" />
            <rect x="47" y="0" width="6" height="6" fill="currentColor" transform="rotate(45 50 3)" />
            <rect x="47" y="94" width="6" height="6" fill="currentColor" transform="rotate(45 50 97)" />
            <rect x="2" y="47" width="6" height="6" fill="currentColor" transform="rotate(45 5 50)" />
            <rect x="92" y="47" width="6" height="6" fill="currentColor" transform="rotate(45 95 50)" />
        </symbol>
        <symbol id="corner-ornament" viewBox="0 0 120 120">
            <path d="M4 110 V30 C4 10 20 4 40 4 H110" fill="none" stroke="currentColor" stroke-width="1.5" />
            <path d="M40 4 Q60 4 65 20 Q65 35 50 35 Q35 35 35 20 Q35 10 45 10" fill="none" stroke="currentColor"
                stroke-width="0.8" />
            <path d="M4 30 Q4 50 20 55 Q35 55 35 40 Q35 25 20 25 Q10 25 10 35" fill="none" stroke="currentColor"
                stroke-width="0.8" />
            <path d="M15 15 L25 25 M10 10 L15 15" stroke="currentColor" stroke-width="1" stroke-linecap="round" />
            <circle cx="50" cy="50" r="1.5" fill="currentColor" />
            <circle cx="70" cy="15" r="2" fill="currentColor" />
            <circle cx="15" cy="70" r="2" fill="currentColor" />
            <path d="M110 4 Q120 4 115 10" fill="none" stroke="currentColor" stroke-width="0.5" />
            <path d="M4 110 Q4 120 10 115" fill="none" stroke="currentColor" stroke-width="0.5" />
        </symbol>
    </svg>
    @php
        $guestName = ucwords(str_replace(['+', '-'], ' ', request('to') ?? 'Tamu Undangan'));
    @endphp
    <div id="wedding-cover"
        class="fixed inset-0 z-[100] bg-zinc-900 flex flex-col items-center justify-center text-white transition-all duration-1000 overflow-hidden">
        @php
            $coverFile = $invitation->attachments->where('file_type', 'cover')->first();
        @endphp
        @if ($coverFile)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $coverFile->file_path) }}"
                    class="w-full h-full object-cover opacity-60" alt="Cover">
                <div class="absolute inset-0 bg-black/50 backdrop-blur-[1px]"></div>
            </div>
        @endif
        <div class="text-center px-4 md:px-6 z-20" data-aos="zoom-in">
            <div
                class="mb-3 md:mb-4 tracking-[0.3em] md:tracking-[0.5em] text-[9px] md:text-[10px] uppercase text-amber-500 font-bold">
                The Wedding of
            </div>
            <div class="flex flex-col items-center mb-6 md:mb-8">
                <h1 class="font-script text-4xl md:text-8xl text-white leading-tight drop-shadow-lg">
                    {{ $data['groom'] }}
                </h1>
                <span class="font-serif-elegant text-xl md:text-2xl my-1 md:my-2 text-amber-500 italic">&</span>
                <h1 class="font-script text-4xl md:text-8xl text-white leading-tight drop-shadow-lg">
                    {{ $data['bride'] }}
                </h1>
            </div>
            <div class="mb-8 md:mb-10">
                <p class="font-serif-elegant italic text-zinc-300 text-sm md:text-lg mb-1 md:mb-2">Kepada
                    Bapak/Ibu/Saudara/i:</p>
                <h2 class="text-xl md:text-3xl font-bold text-amber-500 tracking-tight mb-3 px-2 line-clamp-2">
                    {{ $guestName }}
                </h2>
                <div
                    class="inline-block px-3 py-1 bg-white/10 rounded-full text-[8px] md:text-[9px] uppercase tracking-widest text-zinc-300 backdrop-blur-sm">
                    Di Tempat
                </div>
            </div>
            <button onclick="openInvitation()"
                class="neumorph-button bg-amber-700 !shadow-none border-none text-white px-8 md:px-12 py-3 md:py-4 text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] md:tracking-[0.3em] animate-float">
                Buka Undangan
            </button>
        </div>
    </div>
    <div id="music-control" onclick="toggleMusic()"
        class="fixed bottom-6 right-6 z-50 bg-white/90 text-amber-800 p-4 rounded-full shadow-2xl cursor-pointer hidden border border-amber-100">
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
                class="snap-section hero-bg relative flex items-center justify-center min-h-screen overflow-hidden bg-zinc-50">
                @php
                    $heroFile = $invitation->attachments->where('file_type', 'hero')->first();
                @endphp
                <div class="absolute inset-0 z-0">
                    @if ($heroFile)
                        <img src="{{ asset('storage/' . $heroFile->file_path) }}" class="w-full h-full object-cover"
                            alt="Hero Background">
                    @endif
                    <div class="absolute inset-0 bg-white/40 backdrop-blur-[1px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-white/20 via-transparent to-zinc-50"></div>
                </div>
                <div data-aos="fade-up" class="text-center z-10 relative px-4">
                    <div class="mb-4 tracking-[0.4em] text-[10px] uppercase text-zinc-600 font-bold">
                        Pernikahan Dari
                    </div>
                    <div class="flex flex-col items-center mb-6">
                        <h2 class="font-script text-5xl md:text-8xl text-amber-900 drop-shadow-sm">
                            {{ $data['groom'] }}
                        </h2>
                        <span class="font-serif-elegant text-3xl text-amber-600 italic my-2">&</span>
                        <h2 class="font-script text-5xl md:text-8xl text-amber-900 drop-shadow-sm">
                            {{ $data['bride'] }}
                        </h2>
                    </div>
                    <p class="font-serif-elegant text-2xl italic text-zinc-800 mb-8 drop-shadow-sm">
                        {{ \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }}
                    </p>
                    <div class="flex justify-center gap-4 mt-4">
                        <div
                            class="neumorph-card w-16 h-16 md:w-20 md:h-20 flex flex-col items-center justify-center bg-zinc-50/80 backdrop-blur-sm shadow-xl rounded-2xl border border-white/50">
                            <span id="days" class="text-xl font-bold text-amber-900">00</span>
                            <span class="text-[8px] uppercase font-bold text-zinc-500">Hari</span>
                        </div>
                        <div
                            class="neumorph-card w-16 h-16 md:w-20 md:h-20 flex flex-col items-center justify-center bg-zinc-50/80 backdrop-blur-sm shadow-xl rounded-2xl border border-white/50">
                            <span id="hours" class="text-xl font-bold text-amber-900">00</span>
                            <span class="text-[8px] uppercase font-bold text-zinc-500">Jam</span>
                        </div>
                        <div
                            class="neumorph-card w-16 h-16 md:w-20 md:h-20 flex flex-col items-center justify-center bg-zinc-50/80 backdrop-blur-sm shadow-xl rounded-2xl border border-white/50">
                            <span id="minutes" class="text-xl font-bold text-amber-900">00</span>
                            <span class="text-[8px] uppercase font-bold text-zinc-500">Menit</span>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="snap-section bg-white/30 px-6 py-8 relative overflow-hidden flex flex-col justify-center min-h-screen">
                {{-- Ornamen dikecilkan (w-16) di HP agar tidak menabrak teks --}}
                <div class="absolute top-0 left-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 scale-y-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 rotate-180">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-4xl mx-auto w-full text-center relative z-10" data-aos="fade-up">
                    {{-- Card ayat lebih ramping --}}
                    <div
                        class="neumorph-inset p-5 md:p-8 mb-8 md:mb-12 italic text-zinc-500 text-[11px] md:text-base leading-relaxed font-serif-elegant mx-auto max-w-sm md:max-w-none">
                        "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari
                        jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya."
                        <br><span class="font-bold not-italic mt-2 block text-amber-800 text-[10px] md:text-xs">—
                            Ar-Rum: 21</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
                        {{-- Mempelai Pria --}}
                        <div class="flex flex-col items-center">
                            {{-- Lingkaran foto dikecilkan untuk mobile (w-36) --}}
                            <div class="relative w-36 h-36 md:w-60 md:h-60 flex items-center justify-center mb-4">
                                <svg
                                    class="absolute inset-0 w-full h-full text-amber-600/30 animate-spin-very-slow pointer-events-none z-20 scale-110 md:scale-115">
                                    <use href="#wreath-frame" />
                                </svg>
                                <div
                                    class="w-32 h-32 md:w-56 md:h-56 rounded-full neumorph-card p-2 md:p-3 overflow-hidden z-10">
                                    <img src="{{ $invitation->groom_photo ? asset('storage/' . $invitation->groom_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->groom_name) . '&background=b45309&color=fff' }}"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-amber-900 mb-1 leading-none">
                                {{ $invitation->groom_name }}</h3>
                            <p
                                class="font-serif-elegant italic text-zinc-600 text-[11px] md:text-sm leading-relaxed px-4">
                                {{ $invitation->groom_info }}
                            </p>
                        </div>

                        {{-- Mempelai Wanita --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-36 h-36 md:w-60 md:h-60 flex items-center justify-center mb-4">
                                <svg
                                    class="absolute inset-0 w-full h-full text-amber-600/30 animate-spin-very-slow-reverse pointer-events-none z-20 scale-110 md:scale-115">
                                    <use href="#wreath-frame" />
                                </svg>
                                <div
                                    class="w-32 h-32 md:w-56 md:h-56 rounded-full neumorph-card p-2 md:p-3 overflow-hidden z-10">
                                    <img src="{{ $invitation->bride_photo ? asset('storage/' . $invitation->bride_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($invitation->bride_name) . '&background=b45309&color=fff' }}"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                            </div>
                            <h3 class="font-script text-3xl md:text-4xl text-amber-900 mb-1 leading-none">
                                {{ $invitation->bride_name }}</h3>
                            <p
                                class="font-serif-elegant italic text-zinc-600 text-[11px] md:text-sm leading-relaxed px-4">
                                {{ $invitation->bride_info }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snap-section px-4 py-10 md:py-16 bg-white flex flex-col justify-center min-h-screen">
                <div class="max-w-5xl mx-auto w-full text-center relative z-10">
                    <h2 class="font-serif-elegant text-xl md:text-4xl mb-8 md:mb-12 italic text-amber-900"
                        data-aos="fade-down">
                        Rangkaian Acara
                    </h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-{{ $invitation->events->count() > 1 ? '2' : '1' }} gap-5 md:gap-8">
                        @foreach ($invitation->events as $event)
                            {{-- Padding kartu dikurangi dari p-8 ke p-6 --}}
                            <div class="neumorph-card p-6 md:p-8 flex flex-col items-center" data-aos="zoom-in">
                                <div class="neumorph-inset p-3 rounded-full mb-4">
                                    <i data-lucide="{{ \Illuminate\Support\Str::contains(strtolower($event->event_name), 'akad') ? 'heart' : 'users' }}"
                                        class="w-6 h-6 text-amber-700"></i>
                                </div>
                                <h3 class="font-serif-elegant text-lg md:text-2xl font-bold text-amber-900 mb-3">
                                    {{ $event->event_name }}
                                </h3>

                                <div class="space-y-3 mb-6 w-full border-t border-b border-amber-100/50 py-4">
                                    <div
                                        class="flex items-center justify-center gap-2 text-zinc-700 font-semibold text-[13px] md:text-base">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-amber-600"></i>
                                        {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                    </div>
                                    <div
                                        class="inline-block px-4 py-1 neumorph-inset text-[8px] md:text-[10px] uppercase tracking-widest font-bold text-amber-800">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                        {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') . ' WIB' : 'Selesai' }}
                                    </div>
                                    <div class="px-2 mt-2">
                                        <p class="font-bold text-zinc-900 text-[12px] md:text-base mb-1">
                                            {{ $event->location_name }}</p>
                                        <p class="text-[10px] italic text-zinc-500 leading-snug">{{ $event->address }}
                                        </p>
                                    </div>
                                </div>

                                @if (!empty($event->google_maps_url))
                                    <a href="{{ $event->google_maps_url }}" target="_blank"
                                        class="neumorph-button w-full py-3 text-[9px] font-black uppercase tracking-widest text-amber-900 flex items-center justify-center gap-2 hover:bg-amber-50 active:scale-95 transition-transform">
                                        <i data-lucide="map-pin" class="w-3 h-3"></i> Navigasi Lokasi
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- Section Love Story - Neumorph Elegant Style --}}
            @if (isset($invitation->show_story) &&
                    $invitation->show_story &&
                    isset($invitation->loveStories) &&
                    $invitation->loveStories->count() > 0)
                <section class="snap-section px-4 py-12 md:py-24 relative overflow-hidden">
                    {{-- Ornamen Sudut (Konsisten dengan section lain) --}}
                    <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="max-w-6xl mx-auto relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-16 md:mb-24">
                            <h2 class="font-serif-elegant text-3xl md:text-5xl italic text-amber-900 mb-2"
                                data-aos="fade-down">
                                Kisah Cinta
                            </h2>
                            <p class="font-serif-elegant text-xs md:text-sm text-zinc-400 italic">Bagaimana perjalanan
                                kami bermula</p>
                            <div class="w-12 h-[1px] bg-amber-200 mx-auto mt-4"></div>
                        </div>
                        <div class="relative px-4 md:px-0">
                            {{-- Timeline Vertical Line (Hanya Desktop) --}}
                            <div
                                class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-amber-200 to-transparent">
                            </div>
                            <div class="space-y-12 md:space-y-32">
                                @foreach ($invitation->loveStories->sortBy('sort_order') as $index => $story)
                                    <div
                                        class="flex flex-col md:flex-row items-center gap-8 md:gap-0 {{ $index % 2 == 0 ? '' : 'md:flex-row-reverse' }}">
                                        {{-- Image Side --}}
                                        <div class="w-full md:w-[45%]"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                            <div class="neumorph-card p-3 md:p-4 rounded-[2rem]">
                                                <div
                                                    class="overflow-hidden rounded-[1.5rem] aspect-[4/3] md:aspect-video relative group">
                                                    <img src="{{ asset('storage/' . $story->image) }}"
                                                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                                                        alt="{{ $story->title }}">
                                                    <div class="absolute inset-0 bg-amber-900/10"></div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Center Point (Desktop Only) --}}
                                        <div class="hidden md:flex w-[10%] justify-center relative z-20">
                                            <div
                                                class="w-10 h-10 rounded-full neumorph-card flex items-center justify-center border-4 border-white">
                                                <div class="w-2 h-2 rounded-full bg-amber-600 animate-pulse"></div>
                                            </div>
                                        </div>
                                        {{-- Content Side --}}
                                        <div class="w-full md:w-[45%] {{ $index % 2 == 0 ? 'md:text-left' : 'md:text-right' }}"
                                            data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                                            <div class="neumorph-inset p-6 md:p-8 rounded-[2rem] relative">
                                                {{-- Year/Date Label --}}
                                                <div
                                                    class="inline-block px-4 py-1 mb-4 neumorph-card text-[10px] md:text-xs font-bold text-amber-800 tracking-widest uppercase">
                                                    {{ $story->date }}
                                                </div>
                                                <h4
                                                    class="font-serif-elegant text-xl md:text-2xl font-bold text-amber-900 mb-4">
                                                    {{ $story->title }}
                                                </h4>
                                                <p class="text-xs md:text-sm text-zinc-600 leading-relaxed italic">
                                                    "{{ $story->description }}"
                                                </p>
                                                {{-- Decorative Icon --}}
                                                <div
                                                    class="absolute -bottom-4 {{ $index % 2 == 0 ? 'right-6' : 'left-6' }} text-amber-200/50">
                                                    <i data-lucide="quote"
                                                        class="w-8 h-8 md:w-12 md:h-12 opacity-20 transform {{ $index % 2 == 0 ? '' : 'scale-x-[-1]' }}"></i>
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
                <section class="snap-section px-4 relative overflow-hidden flex flex-col justify-center min-h-screen">
                    <div class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-amber-800/20 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-amber-800/20 z-0 scale-x-[-1]">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>

                    <div class="w-full text-center relative z-10">
                        <h2 class="font-serif-elegant text-3xl md:text-5xl mb-2 italic text-amber-900"
                            data-aos="fade-up">Gallery</h2>
                        <p
                            class="font-serif-elegant text-[10px] md:text-sm text-zinc-400 mb-6 italic uppercase tracking-widest">
                            Momen indah yang kami abadikan</p>

                        <div class="neumorph-card p-3 md:p-8 mx-auto w-full md:max-w-5xl" data-aos="fade-up">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($invitation->galleries as $photo)
                                        <div class="swiper-slide flex justify-center items-center p-2">
                                            <img src="{{ asset('storage/' . $photo->url) }}" {{-- Fungsi klik untuk perbesar --}}
                                                onclick="openGalleryZoom(this.src)"
                                                class="rounded-xl shadow-md border-2 md:border-4 border-white cursor-zoom-in transition-transform hover:scale-[1.02]"
                                                loading="lazy" alt="Gallery Image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next !text-amber-700 hidden md:flex"></div>
                                <div class="swiper-button-prev !text-amber-700 hidden md:flex"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <div id="galleryModal"
                    class="fixed inset-0 z-[999] bg-black/90 hidden items-center justify-center p-4 backdrop-blur-sm cursor-zoom-out"
                    onclick="closeGalleryZoom()">
                    <span class="absolute top-5 right-5 text-white text-3xl font-bold cursor-pointer">&times;</span>
                    <img id="modalImage" src=""
                        class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transform transition-transform duration-300 scale-90">
                </div>
            @endif
            @if ($invitation->show_gift)
                <section class="snap-section px-6">
                    <div class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0"
                        style="transform: scaleX(-1);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0"
                        style="transform: scaleY(-1);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-24 h-24 md:w-32 md:h-32 text-amber-800/20 z-0"
                        style="transform: rotate(180deg);">
                        <svg class="w-full h-full">
                            <use href="#corner-ornament" />
                        </svg>
                    </div>
                    <div class="max-w-xl mx-auto w-full text-center">
                        <h2 class="font-serif-elegant text-4xl mb-4 italic text-amber-900" data-aos="fade-up">Wedding
                            Gift</h2>
                        <p class="text-[11px] text-zinc-500 italic mb-8">Doa restu Anda adalah karunia terindah, namun
                            jika ingin memberikan tanda kasih:</p>
                        <div class="space-y-6">
                            @if ($invitation->bank_account_1)
                                <div class="neumorph-card p-8" data-aos="zoom-in">
                                    <p class="text-amber-700 font-black tracking-widest mb-4 uppercase text-sm">
                                        {{ $invitation->bank_name_1 }}</p>
                                    <p class="text-zinc-400 text-[9px] uppercase tracking-[0.3em] mb-1">Nomor Rekening
                                    </p>
                                    <h3 class="text-2xl font-bold text-zinc-800 mb-1" id="rek-1">
                                        {{ $invitation->bank_account_1 }}</h3>
                                    <p class="text-sm font-medium text-amber-900 mb-6 uppercase">A/N
                                        {{ $invitation->bank_owner_1 }}</p>
                                    <button onclick="copyToClipboard('rek-1')"
                                        class="neumorph-button px-10 py-3 text-[9px] font-black uppercase tracking-widest text-amber-800 flex items-center justify-center gap-2 mx-auto">
                                        <i data-lucide="copy" class="w-3 h-3"></i> Salin Rekening
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <section class="snap-section px-4 py-8 relative overflow-hidden flex flex-col justify-center min-h-screen">
                {{-- Ornamen dikecilkan jadi w-16 agar tidak "balapan" dengan form --}}
                <div class="absolute top-0 left-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 left-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 scale-y-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-16 h-16 md:w-32 md:h-32 text-amber-800/20 z-0 rotate-180">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-md mx-auto w-full relative z-10">
                    <h2 class="font-serif-elegant text-2xl md:text-4xl text-center italic mb-6 text-amber-900">Ucapan &
                        RSVP</h2>

                    {{-- Form: Padding dikurangi ke p-5 --}}
                    <form id="comment-form" class="neumorph-card p-5 mb-6">
                        @csrf
                        <div class="space-y-4">
                            <div class="text-center neumorph-inset py-2">
                                <p class="text-[7px] font-bold text-zinc-400 uppercase tracking-widest">Nama Anda:</p>
                                <p class="text-xs font-bold text-amber-900">{{ $guestName }}</p>
                                <input type="hidden" id="c_name" value="{{ $guestName }}">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <input type="radio" name="presence" id="hadir" value="Hadir"
                                        class="hidden presence-input" checked>
                                    <label for="hadir"
                                        class="neumorph-button block text-center py-2 text-[9px] font-bold uppercase tracking-widest cursor-pointer">Hadir</label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="presence" id="tidak" value="Tidak Hadir"
                                        class="hidden presence-input">
                                    <label for="tidak"
                                        class="neumorph-button block text-center py-2 text-[9px] font-bold uppercase tracking-widest text-zinc-400 cursor-pointer">Absen</label>
                                </div>
                            </div>

                            <textarea id="c_message" rows="2" placeholder="Tulis ucapan..."
                                class="w-full p-3 text-[11px] neumorph-inset border-none outline-none focus:ring-1 focus:ring-amber-200 transition-all"
                                required></textarea>

                            <button type="submit" id="c_submit"
                                class="neumorph-button w-full py-3 font-black text-amber-900 uppercase text-[9px] tracking-[0.15em] active:scale-95 transition-transform">
                                Kirim Ucapan
                            </button>
                        </div>
                    </form>

                    {{-- List Komentar: Tinggi maksimal dikurangi sedikit --}}
                    <div id="comment-list" class="space-y-3 max-h-[30vh] overflow-y-auto pr-2 scrollbar-hide">
                        @foreach ($invitation->comments->sortByDesc('created_at') as $comment)
                            <div class="space-y-1.5">
                                <div class="neumorph-card p-4 border-l-2 border-amber-500">
                                    <div class="flex justify-between items-center mb-1">
                                        <h4 class="font-bold text-[9px] text-amber-900 uppercase tracking-tight">
                                            {{ $comment->name }}</h4>
                                        <span
                                            class="text-[7px] bg-amber-50 text-amber-700 px-1.5 py-0.5 rounded-full uppercase font-bold italic">{{ $comment->presence }}</span>
                                    </div>
                                    <p class="text-zinc-600 text-[10px] italic leading-snug">"{{ $comment->message }}"
                                    </p>
                                    <p class="text-[6px] text-zinc-300 mt-1 text-right uppercase tracking-widest">
                                        {{ $comment->created_at->diffForHumans() }}</p>
                                </div>

                                @if (!empty(trim($comment->reply)))
                                    <div class="ml-4 relative">
                                        <div class="absolute -top-3 -left-2 w-px h-6 bg-amber-200"></div>
                                        <div class="neumorph-card p-3 bg-amber-50/20 border-l-2 border-zinc-800">
                                            <p class="text-zinc-600 text-[9px] leading-relaxed">
                                                <span
                                                    class="font-bold text-zinc-800 text-[8px] uppercase tracking-tighter">Balasan:</span>
                                                {{ $comment->reply }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer
                class="snap-section bg-zinc-900 text-center text-white relative overflow-hidden flex flex-col justify-between py-12 md:py-20">
                <div class="absolute top-0 left-0 w-20 h-20 md:w-32 md:h-32 text-amber-800/10 z-0">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 md:w-32 md:h-32 text-amber-800/10 z-0 scale-x-[-1]">
                    <svg class="w-full h-full">
                        <use href="#corner-ornament" />
                    </svg>
                </div>

                <div class="max-w-md mx-auto px-6 relative z-10 flex-grow flex flex-col justify-center">
                    <h3 class="font-script text-4xl md:text-5xl text-amber-500 mb-6">Terima Kasih</h3>
                    <p class="font-serif-elegant italic text-zinc-400 text-xs md:text-sm leading-relaxed">
                        Suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk
                        memberikan doa restu.
                    </p>
                </div>

                <div class="relative z-10 mt-12">
                    <div
                        class="opacity-30 text-[7px] md:text-[8px] tracking-[0.3em] md:tracking-[0.5em] uppercase font-bold border-t border-white/5 pt-6 inline-block px-10">
                        &copy; 2026 RQ Pedia Digital Invitation
                    </div>
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
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            centeredSlides: true,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
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

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.setAttribute('data-lucide', 'music-2');
            } else {
                music.play();
                musicIcon.setAttribute('data-lucide', 'music');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        }

        function copyToClipboard(id) {
            const text = document.getElementById(id).innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor rekening berhasil disalin!');
            });
        }
        const targetDate = new Date("{{ $data['date'] }}").getTime();
        const countdown = setInterval(() => {
            const now = new Date().getTime();
            const diff = targetDate - now;
            if (diff > 0) {
                document.getElementById('days').innerText = Math.floor(diff / (1000 * 60 * 60 * 24)).toString()
                    .padStart(2, '0');
                document.getElementById('hours').innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 *
                    60 * 60)).toString().padStart(2, '0');
                document.getElementById('minutes').innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
                    .toString().padStart(2, '0');
            } else {
                clearInterval(countdown);
            }
        }, 1000);
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const btnSubmit = document.getElementById('c_submit');
            const name = document.getElementById('c_name').value;
            const message = document.getElementById('c_message').value;
            const presence = document.querySelector('input[name="presence"]:checked').value;
            const token = document.querySelector('input[name="_token"]').value;
            btnSubmit.innerText = "MENGIRIM...";
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
                .then(res => res.json())
                .then(data => {
                    const list = document.getElementById('comment-list');
                    const html = `
                    <div class="neumorph-card p-5 border-l-4 border-amber-500 bg-amber-50/30">
                        <div class="flex justify-between mb-1">
                            <h4 class="font-bold text-[10px] uppercase">${name}</h4>
                            <span class="text-[8px] font-bold text-amber-700 uppercase italic">${presence}</span>
                        </div>
                        <p class="text-zinc-600 text-[11px] italic">"${message}"</p>
                        <p class="text-[7px] text-zinc-400 mt-2 uppercase">Baru saja</p>
                    </div>`;
                    list.insertAdjacentHTML('afterbegin', html);
                    document.getElementById('c_message').value = "";
                    alert("Pesan Anda telah terkirim!");
                })
                .catch(err => alert("Gagal mengirim pesan."))
                .finally(() => {
                    btnSubmit.innerText = "Kirim Ucapan";
                    btnSubmit.disabled = false;
                });
        });

        function openGalleryZoom(src) {
            const modal = document.getElementById('galleryModal');
            const modalImg = document.getElementById('modalImage');

            modalImg.src = src;
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Animasi masuk (halus)
            setTimeout(() => {
                modalImg.classList.remove('scale-90');
                modalImg.classList.add('scale-100');
            }, 10);
        }

        function closeGalleryZoom() {
            const modal = document.getElementById('galleryModal');
            const modalImg = document.getElementById('modalImage');

            modalImg.classList.remove('scale-100');
            modalImg.classList.add('scale-90');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Menutup dengan tombol Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape") closeGalleryZoom();
        });
    </script>
</body>

</html>
