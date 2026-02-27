<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- SEO Dasar --}}
    <title>{{ $page_title ?? 'RQPEDIA.ID' }} | Digital Creative</title>
    <meta name="description" content="{{ $site_settings['site_description'] ?? 'Platform penyedia layanan digital dan solusi kreatif terpercaya.' }}">

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
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom scrollbar agar sesuai tema minimalis */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f4f4f5; }
        ::-webkit-scrollbar-thumb { background: #d4d4d8; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #a1a1aa; }
    </style>
</head>
<body class="bg-zinc-50 text-zinc-900 antialiased">
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-zinc-100 py-5 px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        {{-- Logo sekarang berfungsi sebagai tombol ke halaman utama --}}
        <a href="{{ url('/') }}" class="group transition-transform active:scale-95">
            <h1 class="font-black text-xl tracking-tighter italic text-zinc-900">
                RQ<span class="text-amber-500">PEDIA.ID</span>
            </h1>
        </a>

        {{-- Sisi kanan hanya menampilkan status Dashboard --}}
        <div class="flex items-center gap-4">
            <div class="h-4 w-[1px] bg-zinc-200 hidden md:block"></div>
            <div class="flex items-center gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-zinc-900">Dashboard User</span>
            </div>
        </div>
    </div>
</nav>

    <main class="py-12 min-h-screen">
        @yield('content')
    </main>

    <footer class="py-12 border-t border-zinc-100">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.3em]">&copy; 2026 RQPEDIA Digital Invitation</p>
        </div>
    </footer>

    <script>
        // Inisialisasi Icon
        lucide.createIcons();

        // Auto-hide alert success setelah 3 detik
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-success');
            alerts.forEach(alert => {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>
</body>
</html>