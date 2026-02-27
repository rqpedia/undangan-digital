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
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .nav-link { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        #sidebarOverlay.active { display: block; opacity: 1; }
    </style>
</head>
<body class="bg-[#f8f9fa] text-zinc-900">

    <div class="flex min-h-screen">
        {{-- OVERLAY MOBILE --}}
        <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-zinc-900/50 backdrop-blur-sm z-[45] hidden transition-opacity duration-300 opacity-0 lg:hidden"></div>

        {{-- SIDEBAR --}}
        <aside id="mainSidebar" class="w-72 bg-white border-r border-zinc-100 p-8 fixed h-full z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0 flex flex-col">
            <div class="mb-12 flex items-center justify-between flex-none">
                <div>
                    <h1 class="text-xl font-black tracking-tighter text-zinc-900 uppercase">
                        RQ<span class="text-emerald-500">PEDIA</span>.ID
                    </h1>
                    <p class="text-[8px] font-bold text-zinc-400 uppercase tracking-[0.3em] mt-1">Super Admin Panel</p>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden p-2 text-zinc-400 hover:text-zinc-900">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <nav class="space-y-2 flex-1 overflow-y-auto">
                <a href="{{ route('super.dashboard') }}" 
                    class="nav-link flex items-center gap-3 px-6 py-4 text-[10px] font-black uppercase tracking-widest rounded-2xl {{ request()->routeIs('super.dashboard') ? 'bg-zinc-900 text-white shadow-xl shadow-zinc-200' : 'text-zinc-400 hover:bg-zinc-50' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    Dashboard
                </a>

                <a href="{{ route('super.users.index') }}" 
                    class="nav-link flex items-center gap-3 px-6 py-4 text-[10px] font-black uppercase tracking-widest rounded-2xl {{ request()->routeIs('super.users.*') ? 'bg-zinc-900 text-white shadow-xl shadow-zinc-200' : 'text-zinc-400 hover:bg-zinc-50' }}">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    Management User
                </a>

                <a href="{{ route('super.themes.index') }}" 
                    class="nav-link flex items-center gap-3 px-6 py-4 text-[10px] font-black uppercase tracking-widest rounded-2xl {{ request()->routeIs('super.themes.*') ? 'bg-zinc-900 text-white shadow-xl shadow-zinc-200' : 'text-zinc-400 hover:bg-zinc-50' }}">
                    <i data-lucide="palette" class="w-4 h-4"></i>
                    Daftar Tema
                </a>

                <a href="{{ route('super.settings') }}" 
                    class="nav-link flex items-center gap-3 px-6 py-4 text-[10px] font-black uppercase tracking-widest rounded-2xl {{ request()->routeIs('super.settings') ? 'bg-zinc-900 text-white shadow-xl shadow-zinc-200' : 'text-zinc-400 hover:bg-zinc-50' }}">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    Site Settings
                </a>
            </nav>

            <div class="pt-6 mt-auto flex-none">
                <form action="{{ route('super.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="group w-full flex items-center justify-between px-6 py-4 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-2xl transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest">Keluar Panel</span>
                        </div>
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 lg:ml-72 p-6 md:p-10 w-full">
            <div class="lg:hidden flex items-center justify-between mb-8 bg-white p-4 rounded-2xl border border-zinc-100">
                <h1 class="text-sm font-black tracking-tighter uppercase">RQ<span class="text-amber-500">PEDIA</span></h1>
                <button onclick="toggleSidebar()" class="p-2 bg-zinc-900 text-white rounded-xl">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
            </div>

            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('mainSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
                document.body.style.overflow = 'hidden';
            } else {
                overlay.classList.remove('opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                document.body.style.overflow = 'auto';
            }
        }
        lucide.createIcons();
    </script>
</body>
</html>