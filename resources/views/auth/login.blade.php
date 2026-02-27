@extends('layouts.app')

@section('content')
{{-- Memanggil Header Global --}}
@include('layouts.header')

<div class="min-h-screen flex flex-col pt-28"> {{-- pt-28 memberikan ruang agar tidak tertutup header --}}
    
    {{-- Main Auth Section --}}
    <div class="flex-grow flex items-center justify-center px-4 pb-20">
        <div class="max-w-md w-full bg-white rounded-[2.5rem] p-10 shadow-2xl shadow-zinc-200/50 border border-zinc-100">
            <div class="text-center mb-8">
                {{-- Deteksi Header Berdasarkan URL --}}
                <h2 class="text-2xl font-black uppercase tracking-tighter text-zinc-900">
                    Masuk <span class="text-amber-500">{{ request()->is('super-admin*') ? 'Admin' : 'Akun' }}</span>
                </h2>
                <p class="text-zinc-500 text-[10px] mt-2 font-bold uppercase tracking-widest opacity-60">
                    Akses Dashboard {{ request()->is('super-admin*') ? 'Administrator' : 'User' }}
                </p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-600 p-4 rounded-2xl text-[10px] font-black uppercase tracking-widest mb-6 border border-emerald-100">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 text-red-600 p-4 rounded-2xl text-[10px] font-black uppercase tracking-widest mb-6 border border-red-100">
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM LOGIN --}}
            <form method="POST" action="{{ request()->is('super-admin*') ? route('super.login') : route('login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all placeholder:text-zinc-300" 
                            placeholder="nama@email.com">
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-2 px-1">
                            <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400">Password</label>
                            @if(!request()->is('super-admin*'))
                                <a href="#" class="text-[9px] font-black uppercase tracking-widest text-amber-500">Lupa?</a>
                            @endif
                        </div>
                        <input type="password" name="password" required 
                            class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all placeholder:text-zinc-300" 
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="w-full mt-8 bg-zinc-900 text-white py-5 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-amber-500 transition-all shadow-xl shadow-zinc-200 active:scale-[0.98]">
                    Masuk Sekarang
                </button>
            </form>

            @if(!request()->is('super-admin*'))
                <div class="mt-8 pt-8 border-t border-zinc-50 text-center">
                    <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em]">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-amber-500 hover:text-zinc-900 transition-colors ml-1 underline underline-offset-4">
                            Daftar Gratis
                        </a>
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- Memanggil Footer Global --}}
    @include('layouts.footer')
</div>

{{-- Script Menu Mobile (Wajib ada jika header digunakan) --}}
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
@endsection