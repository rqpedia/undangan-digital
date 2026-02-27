<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* Animasi muncul satu-satu untuk item menu */
    .menu-item-anim {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* State saat menu terbuka */
    #mobile-menu:not(.invisible) .menu-item-anim {
        opacity: 1;
        transform: translateY(0);
    }

    /* Delay tiap item */
    .delay-1 { transition-delay: 0.1s; }
    .delay-2 { transition-delay: 0.2s; }
    .delay-3 { transition-delay: 0.3s; }
    .delay-4 { transition-delay: 0.4s; }
    .delay-5 { transition-delay: 0.5s; }
</style>
{{-- Navigation --}}
<nav
    class="fixed top-0 left-0 w-full z-[1000] transition-all duration-500 bg-white/70 backdrop-blur-xl border-b border-zinc-100/50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-5">
        <a href="{{ url('/') }}" class="group">
            <h1 class="text-2xl font-black tracking-tighter text-zinc-900 transition-transform group-hover:scale-105">
                RQPEDIA<span class="text-amber-600">.ID</span>
            </h1>
        </a>

        {{-- Desktop Menu --}}
        <div
            class="hidden md:flex items-center space-x-10 text-[11px] font-extrabold uppercase tracking-[0.2em] text-zinc-500">
            <a href="{{ url('/') }}#katalog" class="hover:text-amber-600 transition-colors">Katalog</a>
            <a href="{{ url('/') }}#paket" class="hover:text-amber-600 transition-colors">Pilihan Paket</a>
            <a href="{{ url('/faq') }}" class="hover:text-amber-600 transition-colors">FAQ</a>
            <span class="h-4 w-[1px] bg-zinc-200"></span>
            @auth
                <a href="/dashboard"
                    class="bg-zinc-900 text-white px-8 py-3.5 rounded-2xl shadow-lg shadow-zinc-200 hover:bg-amber-600 hover:shadow-amber-100 transition-all duration-300 transform hover:-translate-y-0.5">Dashboard</a>
            @else
                <a href="/login" class="hover:text-zinc-900 transition-colors">Login</a>
                <a href="{{ url('/') }}#paket"
                    class="bg-zinc-900 text-white px-8 py-3.5 rounded-2xl shadow-lg shadow-zinc-200 hover:bg-amber-600 hover:shadow-amber-100 transition-all duration-300 transform hover:-translate-y-0.5">Mulai</a>
            @endauth
        </div>

        {{-- Mobile Trigger --}}
        <button id="open-menu"
            class="md:hidden w-12 h-12 flex items-center justify-center bg-zinc-50 rounded-2xl border border-zinc-100 transition-all active:scale-90 hover:bg-white">
            <div class="flex flex-col gap-1.5 items-end">
                <span class="w-6 h-0.5 bg-zinc-900 rounded-full"></span>
                <span class="w-4 h-0.5 bg-amber-600 rounded-full"></span>
            </div>
        </button>
    </div>
</nav>

{{-- Mobile Menu Container --}}
{{-- Mobile Menu Container --}}
<div id="mobile-menu" class="fixed inset-0 z-[1001] invisible transition-all duration-500">
    {{-- Backdrop lebih gelap untuk menonjolkan Glassmorphism --}}
    <div id="menu-backdrop"
        class="absolute inset-0 bg-black/20 backdrop-blur-sm opacity-0 transition-opacity duration-500"></div>

    {{-- Menu Content: Transparan & Blur (Glassmorphism) --}}
    <div id="menu-content"
        class="absolute right-0 top-0 bottom-0 w-[85%] max-w-sm bg-white/80 backdrop-blur-2xl translate-x-full transition-transform duration-700 cubic-bezier(0.4, 0, 0.2, 1) flex flex-col shadow-2xl border-l border-white/20">

        {{-- Mobile Header --}}
        <div class="flex justify-between items-center p-8">
            <h1 class="text-xl font-black tracking-tighter menu-item-anim">RQPEDIA<span class="text-amber-600">.ID</span></h1>
            <button id="close-menu"
                class="w-10 h-10 bg-white/50 backdrop-blur-md rounded-xl flex items-center justify-center border border-white active:scale-90 transition-transform shadow-sm">
                <svg class="w-5 h-5 text-zinc-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Main Scrollable Area --}}
        <div class="p-6 overflow-y-auto flex-grow">
            <p class="text-[9px] font-black uppercase tracking-[0.4em] text-zinc-500 mb-6 px-2 menu-item-anim delay-1">Menu Eksplorasi</p>

            <div class="flex flex-col gap-3">
                {{-- Item 1 --}}
                <a href="{{ url('/') }}"
                    class="mobile-link menu-item-anim delay-1 group flex items-center gap-4 p-4 bg-white/40 hover:bg-white/60 rounded-2xl border border-white/50 active:scale-95 transition-all shadow-sm">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-zinc-400 group-hover:text-amber-600 transition-colors">
                        <i class="fa-solid fa-house text-sm"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-sm text-zinc-900">Beranda</span>
                        <span class="text-[9px] text-zinc-500 uppercase tracking-wider">Halaman Utama</span>
                    </div>
                </a>

                {{-- Item 2 --}}
                <a href="{{ url('/') }}#katalog"
                    class="mobile-link menu-item-anim delay-2 group flex items-center gap-4 p-4 bg-white/40 hover:bg-white/60 rounded-2xl border border-white/50 active:scale-95 transition-all shadow-sm">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-zinc-400 group-hover:text-amber-600 transition-colors">
                        <i class="fa-solid fa-layer-group text-sm"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-sm text-zinc-900">Katalog</span>
                        <span class="text-[9px] text-zinc-500 uppercase tracking-wider">Desain Undangan</span>
                    </div>
                </a>

                {{-- Item 3 --}}
                <a href="{{ url('/') }}#paket"
                    class="mobile-link menu-item-anim delay-3 group flex items-center gap-4 p-4 bg-white/40 hover:bg-white/60 rounded-2xl border border-white/50 active:scale-95 transition-all shadow-sm">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-zinc-400 group-hover:text-amber-600 transition-colors">
                        <i class="fa-solid fa-box-archive text-sm"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-sm text-zinc-900">Pilihan Paket</span>
                        <span class="text-[9px] text-zinc-500 uppercase tracking-wider">Harga & Fitur</span>
                    </div>
                </a>

                {{-- Item 4 --}}
                <a href="{{ url('/faq') }}"
                    class="mobile-link menu-item-anim delay-4 group flex items-center gap-4 p-4 bg-white/40 hover:bg-white/60 rounded-2xl border border-white/50 active:scale-95 transition-all shadow-sm">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-zinc-400 group-hover:text-amber-600 transition-colors">
                        <i class="fa-solid fa-circle-question text-sm"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-sm text-zinc-900">Bantuan</span>
                        <span class="text-[9px] text-zinc-500 uppercase tracking-wider">Tanya Jawab</span>
                    </div>
                </a>
            </div>

            {{-- Banner Promo --}}
            <div class="mt-8 p-5 bg-zinc-900/90 backdrop-blur-md rounded-[2rem] relative overflow-hidden group menu-item-anim delay-5 shadow-xl">
                <div class="relative z-10">
                    <p class="text-[8px] font-black uppercase tracking-widest text-amber-500 mb-1">Limited Offer</p>
                    <p class="text-xs font-bold text-white leading-tight">Dapatkan potongan harga khusus untuk member baru.</p>
                </div>
                <i class="fa-solid fa-crown absolute -right-2 -bottom-2 text-4xl text-white/10 -rotate-12 group-hover:rotate-0 transition-transform duration-700"></i>
            </div>
        </div>

        {{-- Bottom Sticky & Social --}}
        {{-- Bottom Sticky & Social --}}
        <div class="p-6 bg-white/40 backdrop-blur-xl border-t border-white/30 menu-item-anim delay-5">
            @auth
                <a href="/dashboard" class="mobile-link w-full py-4 bg-zinc-900 text-white rounded-2xl flex items-center justify-center gap-3 font-black text-[10px] uppercase tracking-[0.2em] shadow-xl active:scale-95 transition-all">
                    PANEL DASHBOARD
                </a>
            @else
                <div class="flex gap-3">
                    <a href="/login" class="mobile-link flex-1 py-4 border border-zinc-900/10 bg-white/50 rounded-2xl text-center font-black text-[10px] uppercase tracking-[0.2em] text-zinc-900">LOGIN</a>
                    <a href="{{ url('/') }}#paket" class="mobile-link flex-[1.5] py-4 bg-zinc-900 text-white rounded-2xl text-center font-black text-[10px] uppercase tracking-[0.2em] shadow-xl active:scale-95 transition-all">DAFTAR</a>
                </div>
            @endauth

            {{-- Social Media Connect --}}
            <div class="mt-8 flex items-center justify-between">
                <span class="text-[8px] font-black uppercase tracking-widest text-zinc-500">Connect</span>
                <div class="flex gap-3">
                    {{-- Instagram --}}
                    @if(!empty($site_settings['social_instagram']))
                    <a href="{{ $site_settings['social_instagram'] }}" target="_blank" class="w-8 h-8 rounded-full bg-white/60 flex items-center justify-center text-zinc-900 shadow-sm border border-white/50 hover:text-amber-600 transition-colors">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    @endif

                    {{-- Facebook (Sudah Dikembalikan) --}}
                    @if(!empty($site_settings['social_facebook']))
                    <a href="{{ $site_settings['social_facebook'] }}" target="_blank" class="w-8 h-8 rounded-full bg-white/60 flex items-center justify-center text-zinc-900 shadow-sm border border-white/50 hover:text-blue-600 transition-colors">
                        <i class="fa-brands fa-facebook-f text-xs"></i>
                    </a>
                    @endif

                    {{-- WhatsApp --}}
                    @if(!empty($site_settings['contact_whatsapp']))
                    <a href="https://wa.me/{{ $site_settings['contact_whatsapp'] }}" target="_blank" class="w-8 h-8 rounded-full bg-white/60 flex items-center justify-center text-zinc-900 shadow-sm border border-white/50 hover:text-emerald-500 transition-colors">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Copyright (Sudah Dikembalikan) --}}
            <div class="mt-6 text-center">
                <p class="text-[7px] font-bold uppercase tracking-[0.3em] text-zinc-400">
                    &copy; {{ date('Y') }} RQPEDIA &bull; Digital Art Invitation
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('open-menu');
        const closeBtn = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuBackdrop = document.getElementById('menu-backdrop');
        const menuContent = document.getElementById('menu-content');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu(isOpen) {
            if (isOpen) {
                mobileMenu.classList.remove('invisible');
                setTimeout(() => {
                    menuBackdrop.classList.replace('opacity-0', 'opacity-100');
                    menuContent.classList.replace('translate-x-full', 'translate-x-0');
                }, 10);
            } else {
                menuBackdrop.classList.replace('opacity-100', 'opacity-0');
                menuContent.classList.replace('translate-x-0', 'translate-x-full');
                setTimeout(() => {
                    mobileMenu.classList.add('invisible');
                }, 500);
            }
        }

        if (openBtn) openBtn.addEventListener('click', () => toggleMenu(true));
        if (closeBtn) closeBtn.addEventListener('click', () => toggleMenu(false));
        if (menuBackdrop) menuBackdrop.addEventListener('click', () => toggleMenu(false));

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => toggleMenu(false));
        });
    });
</script>
