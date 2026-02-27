{{-- resources\views\layouts\footer.blade.php --}}
<footer class="bg-zinc-900 text-white pt-12 pb-6 overflow-hidden relative mt-auto">
    {{-- Glow Decor --}}
    <div class="absolute top-0 right-0 w-80 h-80 bg-amber-600/10 blur-[100px] rounded-full -mr-40 -mt-40"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        {{-- Main Grid: Di Desktop 4 kolom, di Mobile Brand di atas & Menu sejajar 3 kolom di bawahnya --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12 mb-10">

            {{-- 1. Brand Section --}}
            <div class="lg:col-span-1">
                <a href="{{ url('/') }}" target="_blank" class="inline-block group">
                    <h2 class="text-xl font-black tracking-tighter mb-3 transition-opacity group-hover:opacity-80">
                        RQPEDIA<span class="text-amber-500">.ID</span>
                    </h2>
                </a>
                <p class="text-zinc-500 text-xs leading-relaxed mb-5 max-w-sm">
                    {{ $site_settings['footer_description'] ?? 'Menghadirkan standar baru dalam dunia undangan digital.' }}
                </p>
                <div class="flex gap-3">
                    @if (!empty($site_settings['social_instagram']))
                        <a href="{{ $site_settings['social_instagram'] }}" target="_blank"
                            class="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center hover:bg-white hover:text-zinc-900 transition-all duration-500">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.245 2.242 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.063 1.366-.333 2.633-1.308 3.608-.975.975-2.242 1.245-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.063-2.633-.333-3.608-1.308-.975-.975-1.245-2.242-1.308-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.245 3.608-1.308 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zM12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    @endif
                    @if (!empty($site_settings['social_facebook']))
                        <a href="{{ $site_settings['social_facebook'] }}" target="_blank"
                            class="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center hover:bg-white hover:text-zinc-900 transition-all duration-500">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- 2. Menu Wrapper: 3 Kolom Sejajar di Mobile & Desktop --}}
            <div class="lg:col-span-3 grid grid-cols-3 gap-4 lg:gap-12 pt-4 lg:pt-0">

                {{-- Navigation --}}
                <div>
                    <h4 class="text-[9px] font-black uppercase tracking-[0.2em] text-amber-500 mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}#katalog"
                                class="text-zinc-400 text-[11px] md:text-sm hover:text-white transition-colors">Katalog</a>
                        </li>
                        <li><a href="{{ url('/') }}#paket"
                                class="text-zinc-400 text-[11px] md:text-sm hover:text-white transition-colors">Paket</a>
                        </li>
                        <li><a href="/login"
                                class="text-zinc-400 text-[11px] md:text-sm hover:text-white transition-colors">Login</a>
                        </li>
                    </ul>
                </div>

                {{-- Help Center --}}
                <div>
                    <h4 class="text-[9px] font-black uppercase tracking-[0.2em] text-amber-500 mb-4">Help Center</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('policy') }}"
                                class="text-zinc-400 text-[11px] md:text-sm hover:text-white transition-colors">Privasi</a>
                        </li>
                        <li><a href="{{ route('faq') }}"
                                class="text-zinc-400 text-[11px] md:text-sm hover:text-white transition-colors">FAQ</a>
                        </li>
                    </ul>
                </div>

                {{-- Get In Touch / Contact Section --}}
                <div>
                    <h4 class="text-[9px] font-black uppercase tracking-[0.2em] text-amber-500 mb-4">Contact</h4>
                    <div class="space-y-3">
                        {{-- WhatsApp --}}
                        @if (!empty($site_settings['contact_whatsapp']))
                            <a href="https://wa.me/{{ $site_settings['contact_whatsapp'] }}" target="_blank"
                                class="block group">
                                <p class="text-[7px] font-black text-zinc-600 uppercase mb-0.5">WhatsApp</p>
                                <p
                                    class="text-[10px] md:text-sm font-bold text-zinc-200 group-hover:text-white break-all leading-tight">
                                    +{{ $site_settings['contact_whatsapp'] }}
                                </p>
                            </a>
                        @endif

                        {{-- Email --}}
                        @if (!empty($site_settings['contact_email']))
                            <a href="mailto:{{ $site_settings['contact_email'] }}" class="block group">
                                <p class="text-[7px] font-black text-zinc-600 uppercase mb-0.5">Email</p>
                                <p
                                    class="text-[10px] md:text-sm font-bold text-zinc-200 group-hover:text-white break-all leading-tight">
                                    {{ $site_settings['contact_email'] }}
                                </p>
                            </a>
                        @endif

                        {{-- Office - Sekarang muncul di mobile (tanpa hidden) --}}
                        <div>
                            <p class="text-[7px] font-black text-zinc-600 uppercase mb-0.5">Office</p>
                            <p class="text-[10px] md:text-sm font-bold text-zinc-200 leading-tight">
                                Bengkulu, ID
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Bottom Copyright --}}
        <div class="pt-6 border-t border-white/5 flex flex-row justify-between items-center">
            <p class="text-[8px] md:text-[10px] font-bold text-zinc-600 uppercase tracking-widest">
                {{ $site_settings['footer_copyright'] ?? '© ' . date('Y') . ' RQPEDIA.ID' }}
            </p>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5">
                    <span class="flex h-1 w-1 rounded-full bg-emerald-500"></span>
                    <span class="text-[8px] font-black text-zinc-500 uppercase">Active</span>
                </div>
            </div>
        </div>
    </div>
</footer>
