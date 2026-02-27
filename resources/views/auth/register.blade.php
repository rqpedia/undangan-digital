@extends('layouts.app')

@section('content')
{{-- Memanggil Header Global --}}
@include('layouts.header')

<div class="min-h-screen flex flex-col pt-32 bg-zinc-50"> {{-- pt-32 agar tidak tertutup header --}}
    
    <main class="flex-grow flex items-center justify-center px-4 pb-20">
        <div class="max-w-md w-full bg-white rounded-[2.5rem] p-10 shadow-2xl shadow-zinc-200/50 border border-zinc-100 relative overflow-hidden">
            
            {{-- Aksesoris Dekoratif --}}
            <div class="absolute -top-12 -left-12 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl"></div>

            <div class="text-center mb-8 relative">
                <h2 class="text-2xl font-black uppercase tracking-tighter text-zinc-900 leading-none">
                    Daftar <span class="text-amber-500">Akun</span>
                </h2>
                <p class="text-zinc-400 text-[10px] mt-2 font-bold uppercase tracking-widest">
                    Langkah awal membuat undangan impian Anda
                </p>
            </div>

            {{-- BOX INFO PAKET --}}
            <div class="mb-8 p-5 bg-zinc-900 rounded-3xl flex items-center gap-5 shadow-xl shadow-zinc-200">
                <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center text-white font-black text-xl rotate-3 shadow-lg shadow-amber-500/20">
                    {{ $selectedPackage == 1 ? 'A' : ($selectedPackage == 2 ? 'B' : 'C') }}
                </div>
                <div>
                    <p class="text-[9px] font-black uppercase text-amber-500 leading-none tracking-[0.2em] mb-1">Paket Pilihan</p>
                    <h4 class="text-white font-serif italic text-base leading-none">
                        @if($selectedPackage == 1) Standard Package
                        @elseif($selectedPackage == 2) Premium Package
                        @else Exclusive Package @endif
                    </h4>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                {{-- HIDDEN INPUT UNTUK PACKAGE LEVEL --}}
                <input type="hidden" name="package_level" value="{{ $selectedPackage }}">

                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all" 
                            placeholder="Contoh: Budi Santoso">
                        @error('name') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold uppercase">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all" 
                            placeholder="email@anda.com">
                        @error('email') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold uppercase">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Password</label>
                            <input type="password" name="password" required 
                                class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all" 
                                placeholder="••••••">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-1">Konfirmasi</label>
                            <input type="password" name="password_confirmation" required 
                                class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 outline-none transition-all" 
                                placeholder="••••••">
                        </div>
                    </div>
                    @error('password') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold uppercase">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full mt-8 bg-zinc-900 text-white py-5 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-amber-600 transition-all shadow-xl shadow-zinc-200 active:scale-95">
                    Daftar & Pilih Tema
                </button>
                
                <p class="text-center text-[10px] text-zinc-400 mt-8 font-bold uppercase tracking-widest">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-amber-600 ml-1 underline underline-offset-4">Masuk di sini</a>
                </p>
            </form>
        </div>
    </main>

    {{-- Memanggil Footer Global --}}
    @include('layouts.footer')
</div>

{{-- Script Mobile Menu --}}
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