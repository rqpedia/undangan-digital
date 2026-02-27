<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- SEO Dasar --}}
    <title>{{ $page_title ?? 'RQPEDIA.ID' }} | Digital Creative</title>
    <meta name="description"
        content="{{ $site_settings['site_description'] ?? 'Platform penyedia layanan digital dan solusi kreatif terpercaya.' }}">

    {{-- Favicon - Standar Browser --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">

    {{-- Favicon - Apple (iOS) --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">

    {{-- Favicon - Android & Manifest --}}
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- Open Graph / Social Media (Menggunakan rqpedia1.png sebagai thumbnail sharing) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $page_title ?? 'RQPEDIA.ID' }}">
    <meta property="og:description" content="{{ $site_settings['site_description'] ?? 'Solusi digital terpercaya.' }}">
    <meta property="og:image" content="{{ asset('img/rqpedia1.png') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('img/rqpedia1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:italic,wght@0,700;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .package-card {
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .package-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .catalog-item {
            transition: all 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-white text-zinc-900"> @include('layouts.header')

    <header class="relative min-h-[80vh] lg:min-h-screen flex items-center pt-24 lg:pt-32 pb-12 lg:pb-20 px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto w-full">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div class="relative z-10 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 lg:px-4 lg:py-2 rounded-full bg-amber-50 border border-amber-100 text-amber-700 text-[8px] lg:text-[10px] font-black uppercase tracking-widest mb-6 lg:mb-8">
                    <span class="relative flex h-1.5 w-1.5 lg:h-2 lg:w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 lg:h-2 lg:w-2 bg-amber-500"></span>
                    </span>
                    The Art of Digital Celebration
                </div>

                <h3 class="text-3xl md:text-6xl lg:text-8xl xl:text-9xl font-serif mb-4 lg:mb-8 tracking-tight md:tracking-tighter leading-tight lg:leading-[0.85] text-zinc-900">
                    Bagikan <span class="italic text-zinc-300">Momen</span> Bahagia Anda.
                </h3>

                <p class="max-w-md lg:max-w-lg mx-auto lg:mx-0 text-zinc-500 text-sm md:text-lg leading-relaxed mb-6 lg:mb-12 font-medium">
                    Ubah cara Anda mengundang tamu dengan kesan mewah melalui undangan digital eksklusif Premium++.
                </p>

                <div class="lg:hidden mb-10 px-0"> <div class="relative aspect-square w-full rounded-[2.5rem] overflow-hidden shadow-2xl border border-zinc-100 bg-white">
                        <img src="{{ asset('storage/themes/QRSSwcTcT3xVFL0zW7QiAa68KnP4H5eo5fvQYpfX.png') }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-8 right-8 text-left text-white">
                            <span class="text-[7px] font-black uppercase bg-amber-600 px-3 py-1 rounded-full mb-2 inline-block">Premium++</span>
                            <h4 class="text-xl font-serif italic">Ocean Breeze Blue</h4>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-6">
                    <a href="#katalog"
                        class="w-full sm:w-auto group relative bg-zinc-900 text-white px-10 py-4 lg:px-14 lg:py-6 rounded-full text-[10px] lg:text-[11px] font-black uppercase tracking-[0.2em] lg:tracking-[0.3em] overflow-hidden transition-all shadow-lg hover:bg-zinc-800 text-center">
                        Mulai Eksplorasi
                    </a>
                </div>
            </div>

            <div class="relative h-[600px] lg:h-[700px] hidden lg:block">
                <div class="absolute inset-0 bg-amber-50 rounded-[4rem] rotate-6 scale-95 opacity-40"></div>
                <div class="absolute inset-0 bg-white rounded-[4rem] -rotate-2 border border-zinc-100 shadow-2xl overflow-hidden group hover:rotate-0 transition-all duration-1000">
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/themes/QRSSwcTcT3xVFL0zW7QiAa68KnP4H5eo5fvQYpfX.png') }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[4s]">
                        <div class="absolute inset-0 bg-gradient-to-tr from-zinc-900 via-zinc-900/60 to-transparent"></div>
                    </div>
                    <div class="absolute inset-0 p-16 flex flex-col justify-between text-white">
                        <div class="flex justify-between items-start opacity-0 group-hover:opacity-100 transition-all duration-700">
                            <span class="px-4 py-1.5 bg-zinc-100 text-zinc-900 rounded-full text-[9px] font-black uppercase tracking-widest">Premium++</span>
                        </div>
                        <div class="translate-y-12 group-hover:translate-y-0 transition-all duration-700">
                            <h3 class="text-6xl font-serif italic mb-4 leading-none">Ocean Breeze Blue</h3>
                            <div class="grid grid-cols-2 gap-6 pt-8 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-300">
                                <div>
                                    <p class="text-[8px] text-amber-500 uppercase font-black">Feature</p>
                                    <p class="text-[10px] font-bold">White Label</p>
                                </div>
                                <div>
                                    <p class="text-[8px] text-amber-500 uppercase font-black">Music</p>
                                    <p class="text-[10px] font-bold">Custom Playlist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <section class="py-12 lg:py-24 bg-zinc-900 text-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="grid grid-cols-4 lg:grid-cols-4 gap-2 lg:gap-12 text-center items-center">

                <div class="reveal">
                    <h3 class="text-xl md:text-6xl font-black text-amber-500">1.2k+</h3>
                    <p
                        class="text-[6px] lg:text-[8px] font-bold uppercase tracking-tighter lg:tracking-widest text-zinc-500 mt-1 lg:mt-2">
                        Happy Couples</p>
                </div>

                <div class="reveal">
                    <h3 class="text-xl md:text-6xl font-black text-white">50+</h3>
                    <p class="text-[6px] lg:text-[8px] font-bold uppercase text-zinc-500 mt-1 lg:mt-2">Themes</p>
                </div>

                <div class="reveal">
                    <h3 class="text-xl md:text-6xl font-black text-white">15m</h3>
                    <p class="text-[6px] lg:text-[8px] font-bold uppercase text-zinc-500 mt-1 lg:mt-2">Setup</p>
                </div>

                <div class="reveal">
                    <h3 class="text-xl md:text-6xl font-black text-white">4.9</h3>
                    <p class="text-[6px] lg:text-[8px] font-bold uppercase text-zinc-500 mt-1 lg:mt-2">Ratings</p>
                </div>

            </div>
        </div>
    </section>

    <section id="katalog" class="py-20 lg:py-32 px-4 lg:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row justify-between items-center mb-12 lg:mb-20 gap-8">
                <h2 class="text-3xl lg:text-5xl font-serif tracking-tight text-center lg:text-left">
                    Desain <span class="italic text-zinc-300">Eksklusif.</span>
                </h2>

                <div
                    class="flex flex-wrap justify-center gap-1.5 lg:gap-3 p-1.5 bg-zinc-100/50 rounded-full border border-zinc-200/50">
                    <button onclick="filterCatalog('1', this)"
                        class="catalog-btn active px-4 lg:px-8 py-2.5 lg:py-3 rounded-full text-[8px] lg:text-[9px] font-black uppercase tracking-widest transition-all bg-white text-zinc-900 shadow-sm">
                        Standard
                    </button>
                    <button onclick="filterCatalog('2', this)"
                        class="catalog-btn px-4 lg:px-8 py-2.5 lg:py-3 rounded-full text-[8px] lg:text-[9px] font-black uppercase tracking-widest transition-all text-zinc-400 hover:text-zinc-900">
                        Premium
                    </button>
                    <button onclick="filterCatalog('3', this)"
                        class="catalog-btn px-4 lg:px-8 py-2.5 lg:py-3 rounded-full text-[8px] lg:text-[9px] font-black uppercase tracking-widest transition-all text-zinc-400 hover:text-zinc-900">
                        Premium++
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-12" id="catalog-grid">
                @foreach ($themes->sortBy('price') as $theme)
                    @php
                        $level = 1;
                        if ($theme->price > 100000) {
                            $level = 3;
                        } elseif ($theme->price > 50000) {
                            $level = 2;
                        }
                    @endphp
                    <div class="catalog-item reveal group" data-level="{{ $level }}">
                        <div
                            class="relative aspect-[3/4] rounded-[1.5rem] lg:rounded-[3rem] overflow-hidden mb-4 lg:mb-8 shadow-lg border border-zinc-100 bg-white">
                            <img src="{{ asset('storage/' . $theme->thumbnail) }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
                                loading="lazy">

                            <div
                                class="absolute inset-0 bg-zinc-900/40 opacity-0 lg:group-hover:opacity-100 transition-all flex items-center justify-center p-4 lg:p-12">
                                <a href="{{ route('theme.preview', $theme->slug) }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="w-full bg-white py-2 lg:py-4 rounded-lg text-[7px] lg:text-[9px] font-black uppercase text-center tracking-widest hover:bg-amber-500 hover:text-white transition-colors">
                                    Preview
                                </a>
                            </div>

                            <div class="absolute top-3 left-3 lg:top-8 lg:left-8">
                                <span
                                    class="px-2 py-1 lg:px-4 lg:py-1.5 bg-white/90 backdrop-blur-md text-zinc-900 text-[6px] lg:text-[8px] font-black uppercase tracking-widest rounded-full shadow-sm">
                                    {{ $level == 1 ? 'Std' : ($level == 2 ? 'Prem' : 'Prem++') }}
                                </span>
                            </div>
                        </div>

                        <div class="text-center">
                            <h4 class="font-serif italic text-sm lg:text-2xl mb-1 lg:mb-2 text-zinc-900">
                                {{ $theme->name }}</h4>
                            <div class="flex items-center justify-center gap-1.5 lg:gap-3">
                                <div class="h-[1px] w-2 lg:w-4 bg-zinc-200"></div>
                                <p
                                    class="text-[8px] lg:text-[10px] font-bold text-amber-600 uppercase tracking-[0.1em] lg:tracking-[0.2em]">
                                    Rp {{ number_format($theme->price, 0, ',', '.') }}
                                </p>
                                <div class="h-[1px] w-2 lg:w-4 bg-zinc-200"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="paket" class="py-20 lg:py-32 bg-[#fcfaf8] px-2 lg:px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 lg:mb-24 reveal">
            <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] lg:tracking-[0.5em] text-amber-600 mb-2 lg:mb-4">
                Investment for Lifetime</p>
            <h2 class="text-3xl lg:text-7xl font-serif italic text-zinc-900 leading-tight">Investasi <span class="text-zinc-400">Kebahagiaan.</span></h2>
        </div>

        <div class="grid grid-cols-3 lg:grid-cols-3 gap-2 lg:gap-8 items-stretch">

            {{-- Standard Package --}}
            <div class="package-card group relative bg-white border border-zinc-100 p-3 lg:p-10 rounded-2xl lg:rounded-[3rem] reveal flex flex-col">
                <div class="flex-grow">
                    <div class="mb-4 lg:mb-12">
                        <h3 class="font-black text-[7px] lg:text-xs tracking-[0.1em] lg:tracking-[0.3em] text-zinc-400 mb-1 uppercase">Standard</h3>
                        <div class="flex items-baseline gap-0.5 lg:gap-1">
                            <span class="text-xl lg:text-4xl font-black tracking-tighter text-zinc-900 italic">50</span>
                            <span class="text-[10px] lg:text-xl font-black text-zinc-900">k</span>
                        </div>
                    </div>
                    {{-- Deskripsi Mobile & Desktop --}}
                    <ul class="space-y-2 lg:space-y-4 mb-6 lg:mb-12 border-t border-zinc-50 pt-4 lg:pt-8">
                        <li class="flex items-center gap-1.5 lg:gap-3 text-[6px] lg:text-xs font-bold text-zinc-800">
                            <div class="w-3 h-3 lg:w-5 lg:h-5 bg-amber-100 rounded-full flex items-center justify-center text-[5px] lg:text-[10px] text-amber-600 flex-shrink-0">
                                <i class="fa-solid fa-gauge"></i>
                            </div> 
                            <span class="leading-tight">Dashboard User</span>
                        </li>
                        <li class="flex items-center gap-1.5 lg:gap-3 text-[6px] lg:text-xs font-bold text-zinc-800">
                            <div class="w-3 h-3 lg:w-5 lg:h-5 bg-amber-100 rounded-full flex items-center justify-center text-[5px] lg:text-[10px] text-amber-600 flex-shrink-0">
                                <i class="fa-solid fa-palette"></i>
                            </div> 
                            <span class="leading-tight">5 Tema</span>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('register', ['package' => 1]) }}"
                    class="block w-full text-center py-3 lg:py-5 border lg:border-2 border-zinc-900 rounded-lg lg:rounded-2xl text-[7px] lg:text-[10px] font-black uppercase tracking-tighter lg:tracking-widest group-hover:bg-zinc-900 group-hover:text-white transition-all">Select</a>
            </div>

            {{-- Premium Package --}}
            <div class="package-card relative group bg-white border-2 border-amber-500/30 p-3 lg:p-10 rounded-2xl lg:rounded-[3.5rem] reveal shadow-xl lg:-translate-y-4 flex flex-col overflow-hidden">
                <div class="absolute top-2 right-2 lg:top-6 lg:right-8">
                    <span class="bg-amber-500 text-white px-2 lg:px-4 py-0.5 lg:py-1.5 rounded-full text-[5px] lg:text-[8px] font-black uppercase animate-pulse">Hot</span>
                </div>
                <div class="flex-grow relative z-10">
                    <div class="mb-4 lg:mb-12">
                        <h3 class="font-black text-[7px] lg:text-xs tracking-[0.1em] lg:tracking-[0.3em] text-amber-600 mb-1 uppercase">Premium</h3>
                        <div class="flex items-baseline gap-0.5 lg:gap-1">
                            <span class="text-2xl lg:text-6xl font-black tracking-tighter text-zinc-900 italic leading-none">100</span>
                            <span class="text-[10px] lg:text-2xl font-black text-zinc-900">k</span>
                        </div>
                    </div>
                    {{-- Deskripsi Mobile & Desktop --}}
                    <ul class="space-y-2 lg:space-y-4 mb-6 lg:mb-12 border-t border-zinc-50 pt-4 lg:pt-8">
                        <li class="flex items-center gap-1.5 lg:gap-3 text-[6px] lg:text-xs font-bold text-zinc-800">
                            <div class="w-3 h-3 lg:w-5 lg:h-5 bg-amber-100 rounded-full flex items-center justify-center text-[5px] lg:text-[10px] text-amber-600 flex-shrink-0">
                                <i class="fa-solid fa-layer-group"></i>
                            </div> 
                            <span class="leading-tight">Standard + 5 Premium</span>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('register', ['package' => 2]) }}"
                    class="block w-full text-center py-3 lg:py-5 bg-zinc-900 text-white rounded-lg lg:rounded-2xl text-[7px] lg:text-[10px] font-black uppercase tracking-tighter lg:tracking-widest hover:bg-amber-600 transition-all z-10">Select</a>
            </div>

            {{-- VVIP Package --}}
            <div class="package-card group relative bg-zinc-900 p-3 lg:p-10 rounded-2xl lg:rounded-[3rem] reveal flex flex-col transition-all duration-500">
                <div class="flex-grow">
                    <div class="mb-4 lg:mb-12">
                        <h3 class="font-black text-[7px] lg:text-xs tracking-[0.1em] lg:tracking-[0.3em] text-amber-500 mb-1 uppercase">VVIP</h3>
                        <div class="flex items-baseline gap-0.5 lg:gap-1 text-white">
                            <span class="text-xl lg:text-4xl font-black tracking-tighter italic">150</span>
                            <span class="text-[10px] lg:text-xl font-black">k</span>
                        </div>
                    </div>
                    {{-- Deskripsi Mobile & Desktop --}}
                    <ul class="space-y-2 lg:space-y-4 mb-6 lg:mb-12 border-t border-white/5 pt-4 lg:pt-8">
                        <li class="flex items-center gap-1.5 lg:gap-3 text-[6px] lg:text-xs font-medium text-zinc-300">
                            <div class="w-3 h-3 lg:w-5 lg:h-5 bg-amber-100 rounded-full flex items-center justify-center text-[5px] lg:text-[10px] text-amber-600 flex-shrink-0">
                                <i class="fa-solid fa-infinity"></i>
                            </div> 
                            <span class="leading-tight">Full Akses</span>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('register', ['package' => 3]) }}"
                    class="block w-full text-center py-3 lg:py-5 bg-amber-600 text-white rounded-lg lg:rounded-2xl text-[7px] lg:text-[10px] font-black uppercase tracking-tighter lg:tracking-widest hover:bg-white hover:text-zinc-900 transition-all">Select</a>
            </div>

        </div>
    </div>
</section>

    @include('layouts.footer')

    <script>
        function filterCatalog(level, btn) {
            const buttons = document.querySelectorAll('.catalog-btn');
            buttons.forEach(b => {
                b.classList.remove('bg-white', 'text-zinc-900', 'shadow-sm', 'active');
                b.classList.add('text-zinc-400');
            });
            btn.classList.add('bg-white', 'text-zinc-900', 'shadow-sm', 'active');
            btn.classList.remove('text-zinc-400');

            const items = document.querySelectorAll('.catalog-item');
            items.forEach(item => {
                if (item.getAttribute('data-level') === String(level)) {
                    item.style.display = 'block';
                    setTimeout(() => item.style.opacity = '1', 10);
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => item.style.display = 'none', 300);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const defaultBtn = document.querySelector('.catalog-btn.active');
            if (defaultBtn) {
                filterCatalog('1', defaultBtn);
            }

            const revealCallback = (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            };
            const revealObserver = new IntersectionObserver(revealCallback, {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            });
            document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
            const openBtn = document.getElementById('open-menu');
            const closeBtn = document.getElementById('close-menu');
            const mobileMenu = document.getElementById('mobile-menu');
            const backdrop = document.getElementById('menu-backdrop');
            const content = document.getElementById('menu-content');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            function toggleMenu(isOpen) {
                if (!mobileMenu) return;
                if (isOpen) {
                    mobileMenu.classList.remove('invisible');
                    document.body.style.overflow = 'hidden';
                    backdrop.classList.add('opacity-100');
                    content.classList.remove('translate-x-full');
                } else {
                    backdrop.classList.remove('opacity-100');
                    content.classList.add('translate-x-full');
                    document.body.style.overflow = '';
                    setTimeout(() => mobileMenu.classList.add('invisible'), 500);
                }
            }

            if (openBtn) openBtn.onclick = () => toggleMenu(true);
            if (closeBtn) closeBtn.onclick = () => toggleMenu(false);
            if (backdrop) backdrop.onclick = () => toggleMenu(false);
            mobileLinks.forEach(link => link.onclick = () => toggleMenu(false));
        });
    </script>
</body>

</html>
