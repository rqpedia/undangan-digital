@extends('layouts.app')

@section('content')
{{-- Memanggil Header Global --}}
@include('layouts.header')

{{-- Tambahkan pt-24 atau pt-32 agar konten tidak tertutup fixed header --}}
<div class="min-h-screen flex flex-col pt-32 bg-[#fcfaf8]">
    
    <main class="flex-grow flex items-center justify-center px-4 pb-20">
        <div class="max-w-md w-full bg-white rounded-[3rem] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-zinc-100 text-center relative overflow-hidden">
            
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-amber-500/5 blur-[60px] rounded-full"></div>
            
            <div class="relative w-24 h-24 mx-auto mb-8">
                <div class="absolute inset-0 bg-amber-500/20 rounded-[2.5rem] animate-ping opacity-30"></div>
                <div class="relative bg-zinc-900 w-24 h-24 rounded-[2.5rem] flex items-center justify-center shadow-2xl shadow-zinc-200 rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <h2 class="text-3xl font-black uppercase tracking-tighter text-zinc-900 leading-none italic">
                Halo, <span class="text-amber-500">{{ explode(' ', trim($user->name))[0] }}!</span>
            </h2>
            
            <p class="text-zinc-500 text-sm mt-4 leading-relaxed font-medium">
                Pesanan paket Anda telah kami terima. Silakan selesaikan pembayaran untuk aktivasi dashboard.
            </p>

            {{-- INFO TAGIHAN DINAMIS --}}
            <div class="mt-8 p-6 bg-zinc-50 rounded-[2rem] border border-zinc-100 text-left relative">
                <div class="absolute top-4 right-6 uppercase text-[8px] font-black tracking-widest text-amber-600 bg-amber-100 px-2 py-1 rounded-md animate-pulse">Waiting Payment</div>
                
                <h4 class="text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-4">Ringkasan Pesanan:</h4>
                <ul class="space-y-4">
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 bg-white shadow-sm rounded-xl flex items-center justify-center text-xs">📦</div>
                        <div>
                            <p class="text-[10px] text-zinc-400 font-bold uppercase leading-none">Paket Dipilih</p>
                            <p class="text-sm font-black text-zinc-900">
                                {{ $user->package_level == 1 ? 'Standard Package' : ($user->package_level == 2 ? 'Premium Package' : 'Exclusive Package') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 bg-white shadow-sm rounded-xl flex items-center justify-center text-xs">💰</div>
                        <div>
                            <p class="text-[10px] text-zinc-400 font-bold uppercase leading-none">Total Tagihan</p>
                            <p class="text-sm font-black text-amber-600 italic">Rp {{ number_format($user->package_price, 0, ',', '.') }}</p>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Tombol WhatsApp --}}
            <div class="mt-10 space-y-4">
                @php
                    $message = "Halo RQPedia, saya ingin konfirmasi pembayaran:\n\n"
                             . "Nama: " . $user->name . "\n"
                             . "Email: " . $user->email . "\n"
                             . "Paket: " . ($user->package_level == 1 ? 'Standard' : ($user->package_level == 2 ? 'Premium' : 'Exclusive')) . "\n"
                             . "Total: Rp " . number_format($user->package_price, 0, ',', '.');
                    $waUrl = "https://wa.me/6282371464575?text=" . urlencode($message);
                @endphp

                <a href="{{ $waUrl }}" target="_blank"
                   class="group w-full bg-[#1a1a1a] text-white py-6 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-amber-600 transition-all shadow-xl flex items-center justify-center gap-3 active:scale-95">
                    <i class="fa-brands fa-whatsapp text-lg text-[#25D366]"></i>
                    Selesaikan Pembayaran
                </a>

                <a href="{{ route('login') }}" class="inline-block text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400 hover:text-zinc-900 transition-colors">
                    Kembali ke Login
                </a>
            </div>

            <p class="mt-10 text-[10px] text-zinc-400 italic font-medium leading-relaxed px-6">
                *Silakan lampirkan screenshot bukti transfer pada chat WhatsApp untuk mempercepat proses aktivasi.
            </p>
        </div>
    </main>

    {{-- Memanggil Footer Global --}}
    @include('layouts.footer')
</div>

{{-- Script Menu Mobile (Wajib agar hamburger menu berfungsi) --}}
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