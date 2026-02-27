<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO Dasar --}}
    <title>{{ $page_title ?? 'RQPEDIA.ID' }} | Kebijakan & Privasi</title>
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
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;600&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        /* Agar menu mobile yang invisible tidak memakan ruang */
        #mobile-menu.invisible {
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-white text-zinc-800 antialiased">

    {{-- Gunakan Header Layout yang sama agar navigasi konsisten --}}
    @include('layouts.header')

    {{-- Main Content - Sesuaikan pt agar tidak tertutup header --}}
    <main class="max-w-3xl mx-auto pt-32 pb-20 px-6">
        <h1 class="text-4xl md:text-5xl font-cinzel font-bold mb-2">Kebijakan <span
                class="text-amber-600">Privasi</span>
        </h1>
        <p class="text-zinc-400 text-[10px] mb-12 uppercase tracking-[0.3em]">
            Terakhir diperbarui: {{ date('d F Y') }}
        </p>

        <div class="space-y-12 text-zinc-600 leading-relaxed">
            @if (isset($site_settings['privacy_policy']) && !empty($site_settings['privacy_policy']))
                {{-- Menambahkan 'prose-p:mt-0' untuk menghapus margin atas paragraf pertama --}}
                {{-- Menambahkan 'prose-tight' atau custom margin reset --}}
                <article class="prose max-w-none [&>p]:mt-0 [&>p]:mb-4">
                    {!! $site_settings['privacy_policy'] !!}
                </article>
            @endif
        </div>

        <div class="mt-20 pt-10 border-t border-zinc-100 text-center">
            <p class="text-[10px] text-zinc-400 uppercase tracking-[0.2em]">
                &copy; {{ date('Y') }} RQPedia - The Art of Digital Celebration.
            </p>
        </div>
    </main>

    @include('layouts.footer')

    {{-- Script Menu Mobile (Sama seperti di FAQ) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                    setTimeout(() => {
                        backdrop.classList.add('opacity-100');
                        content.classList.remove('translate-x-full');
                    }, 10);
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
