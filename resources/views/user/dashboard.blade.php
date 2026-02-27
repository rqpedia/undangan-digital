@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto px-4 pb-24">
        <div class="flex items-center justify-between gap-4 mb-12">
            <div class="min-w-0">
                <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-zinc-900 leading-tight">
                    <span class="block text-amber-500 text-[9px] md:text-[10px] mb-1 tracking-[0.2em] md:tracking-[0.3em]">
                        Halo, {{ explode(' ', trim(Auth::user()->name))[0] }}
                    </span>
                    Dashboard <span class="text-amber-500">Mempelai</span>
                </h2>
                <p class="hidden md:block text-zinc-400 text-[10px] uppercase tracking-widest font-bold mt-1">
                    Kelola undangan dan pantau pesan dari tamu Anda
                </p>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="shrink-0">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 md:gap-3 px-3 md:px-5 py-2 md:py-3 bg-white border border-zinc-100 rounded-2xl shadow-sm hover:bg-red-50 group transition-all">
                    <div class="flex flex-col items-end mr-1">
                        <span
                            class="text-[7px] md:text-[8px] font-black uppercase tracking-widest text-zinc-400 group-hover:text-red-500">Logout</span>
                        <span class="hidden md:block text-[10px] font-bold text-zinc-900">{{ Auth::user()->name }}</span>
                        <span class="md:hidden text-[9px] font-bold text-zinc-900">Keluar</span>
                    </div>
                    <i data-lucide="log-out" class="w-4 h-4 text-zinc-400 group-hover:text-red-500"></i>
                </button>
            </form>
        </div>
        @if ($userInvitation)
            <section class="mb-12 animate-in fade-in slide-in-from-top-4 duration-700">
                <div class="bg-zinc-900 rounded-[2.5rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
                    <div class="relative z-10 flex flex-col items-center md:items-stretch gap-8">
                        <div class="text-center md:text-left flex-1">
                            <span
                                class="px-3 py-1 bg-amber-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full">
                                Undangan Aktif
                            </span>
                            <h3 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tighter mt-4">
                                {{ $userInvitation->groom_name }} & {{ $userInvitation->bride_name }}
                            </h3>
                            <p class="text-zinc-400 text-xs mt-2 font-medium">Link Utama: <span
                                    class="text-amber-500">rqpedia.id/v/{{ $userInvitation->slug }}</span></p>
                        </div>
                        <div class="w-full flex flex-col gap-4">
                            <div class="flex items-center justify-center md:justify-start gap-3">
                                <a href="{{ route('invitation.show', $userInvitation->slug) }}" target="_blank"
                                    class="flex-1 md:flex-none px-6 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                                    <i data-lucide="external-link" class="w-4 h-4"></i> Lihat
                                </a>
                                <a href="{{ route('user.edit', $userInvitation->id) }}"
                                    class="flex-1 md:flex-none px-6 py-4 bg-zinc-800 hover:bg-zinc-700 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2 border border-white/5">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i> Edit
                                </a>
                                <form action="{{ route('user.destroy', $userInvitation->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus undangan ini?')"
                                    class="flex-none">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-14 h-14 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                            <button type="button" onclick="openShareModal()"
                                class="w-full px-6 py-5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-3 shadow-xl shadow-emerald-500/20">
                                <i data-lucide="send" class="w-5 h-5"></i> Bagikan Undangan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-[2.5rem] p-8 border border-zinc-100 shadow-sm h-full">
                        <div class="flex items-center gap-3 mb-8">
                            <div
                                class="w-10 h-10 bg-amber-500/10 rounded-2xl flex items-center justify-center text-amber-600">
                                <i data-lucide="palette" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-zinc-800">Ganti Tema Otomatis</h3>
                        </div>

                        <form action="{{ route('user.themes.select') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label
                                    class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-3 ml-2">
                                    Pilih Tema
                                </label>
                                <div class="relative">
                                    <select name="theme_id"
                                        class="w-full bg-zinc-50 border-none rounded-2xl px-5 py-4 text-xs font-bold focus:ring-2 focus:ring-amber-500 transition-all cursor-pointer appearance-none">

                                        {{-- Group: Standard --}}
                                        <optgroup label="✨ Standard">
                                            @foreach ($themes->where('price', '<=', 50000) as $theme)
<option value="{{ $theme->id }}" {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? 'selected' : '' }}>
                                        {{ $theme->name }} {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? '(Aktif)' : '' }}
                                    </option>
@endforeach
                            </optgroup>

                            {{-- Group: Premium --}}
                            <optgroup label="💎 Premium">
                                @foreach ($themes->where('price', '>', 50000)->where('price', '<=', 100000) as $theme)
<option value="{{ $theme->id }}" {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? 'selected' : '' }}>
                                        {{ $theme->name }} {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? '(Aktif)' : '' }}
                                    </option>
@endforeach
                            </optgroup>

                            {{-- Group: Premium++ --}}
                            <optgroup label="👑 Premium++">
                                @foreach ($themes->where('price', '>', 100000) as $theme)
                                                <option value="{{ $theme->id }}"
                                                    {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? 'selected' : '' }}>
                                                    {{ $theme->name }}
                                                    {{ isset($userInvitation) && $userInvitation->theme_id == $theme->id ? '(Aktif)' : '' }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-zinc-400">
                                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-5 bg-zinc-900 hover:bg-zinc-800 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2 shadow-lg shadow-zinc-900/10 group">
                                <i data-lucide="save"
                                    class="w-4 h-4 text-amber-500 group-hover:scale-110 transition-transform"></i>
                                Terapkan Tema
                            </button>
                        </form>

                        <div class="mt-8 p-5 bg-zinc-50 rounded-[2rem] border border-zinc-100 italic text-center">
                            <p class="text-[9px] text-zinc-400 font-medium leading-relaxed">
                                Pilih desain yang Anda inginkan, lalu tekan tombol terapkan untuk memperbarui undangan Anda secara otomatis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[2.5rem] p-8 border border-zinc-100 shadow-sm h-full flex flex-col">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-emerald-500/10 rounded-2xl flex items-center justify-center text-emerald-600">
                                    <i data-lucide="message-square" class="w-5 h-5"></i>
                                </div>
                                <h3 class="text-sm font-black uppercase tracking-widest text-zinc-800">Ucapan & Doa Restu
                                </h3>
                            </div>
                            <span
                                class="px-3 py-1 bg-zinc-100 text-zinc-500 text-[9px] font-black uppercase tracking-widest rounded-full">
                                {{ $userInvitation->comments->count() }} Pesan
                            </span>
                        </div>
                        <div class="space-y-4 max-h-[550px] overflow-y-auto pr-2 custom-scrollbar flex-1">
                            @forelse($userInvitation->comments()->latest()->get() as $comment)
                                <div id="comment-container-{{ $comment->id }}"
                                    class="p-6 bg-zinc-50 rounded-[2rem] border border-zinc-100 hover:border-amber-200 transition-all group relative">
                                    <form onsubmit="deleteComment(event, {{ $comment->id }})"
                                        action="{{ route('user.comments.destroy', $comment->id) }}" method="POST"
                                        class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0 z-10">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-9 h-9 bg-white text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all shadow-sm flex items-center justify-center border border-zinc-100">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                    <div class="flex justify-between items-start mb-3 pr-10">
                                        <div class="min-w-0">
                                            <h4
                                                class="font-black text-zinc-900 text-[11px] uppercase tracking-tight truncate">
                                                {{ $comment->name }}
                                            </h4>
                                            <div class="flex items-center gap-1.5 mt-1">
                                                <i data-lucide="clock" class="w-3 h-3 text-zinc-300"></i>
                                                <span
                                                    class="text-[9px] text-zinc-400 font-bold uppercase tracking-tighter">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="shrink-0">
                                            <span
                                                class="px-2.5 py-1 {{ strtolower($comment->presence) == 'hadir' ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }} text-[8px] font-black uppercase tracking-widest rounded-lg">
                                                {{ $comment->presence }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-2xl border border-zinc-100/50 mb-4 shadow-sm">
                                        <p class="text-zinc-600 text-xs leading-relaxed italic">
                                            "{{ $comment->message }}"
                                        </p>
                                    </div>
                                    <div id="reply-section-{{ $comment->id }}"
                                        class="mt-4 pt-4 border-t border-zinc-200/50">
                                        @if ($comment->reply)
                                            <div
                                                class="flex gap-3 items-start pl-4 border-l-2 border-amber-400 relative group/reply animate-in fade-in duration-300">
                                                <div
                                                    class="shrink-0 w-6 h-6 bg-amber-500 rounded-full flex items-center justify-center text-white">
                                                    <i data-lucide="corner-down-right" class="w-3 h-3"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex justify-between items-center mb-1">
                                                        <p
                                                            class="text-[9px] font-black uppercase tracking-widest text-amber-600">
                                                            {{ Auth::user()->name }} <span
                                                                class="text-zinc-400 font-medium lowercase italic">(Mempelai)</span>
                                                        </p>
                                                        <form onsubmit="replyComment(event, {{ $comment->id }}, '')"
                                                            action="{{ route('user.comments.reply', $comment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="opacity-0 group-hover/reply:opacity-100 transition-all text-[8px] font-black uppercase text-red-400 hover:text-red-600">
                                                                Hapus Balasan
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <p
                                                        class="text-zinc-600 text-[11px] leading-relaxed bg-amber-50/50 p-2 rounded-lg border border-amber-100/50">
                                                        {{ $comment->reply }}
                                                    </p>
                                                </div>
                                            </div>
                                        @else
                                            <form onsubmit="replyComment(event, {{ $comment->id }})"
                                                action="{{ route('user.comments.reply', $comment->id) }}" method="POST"
                                                class="flex gap-2">
                                                @csrf
                                                <input type="text" name="reply" placeholder="Balas ucapan tamu..."
                                                    required
                                                    class="flex-1 bg-white border-zinc-200 rounded-xl px-4 py-2 text-[11px] font-medium focus:ring-1 focus:ring-amber-500 border focus:outline-none transition-all">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-zinc-900 text-white rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-amber-500 transition-colors shadow-sm">
                                                    Kirim
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="flex flex-col items-center justify-center py-20 text-center">
                                    <div
                                        class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center mb-4 border border-dashed border-zinc-200">
                                        <i data-lucide="mail-question" class="w-8 h-8 text-zinc-200"></i>
                                    </div>
                                    <p class="text-zinc-400 font-black uppercase tracking-widest text-[10px]">Belum ada
                                        ucapan dari tamu Anda</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div id="shareModal" class="fixed inset-0 z-[99] hidden">
                    <div class="absolute inset-0 bg-zinc-900/80 backdrop-blur-sm" onclick="closeShareModal()"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[95%] max-w-md">
                        <div class="bg-white rounded-[3rem] p-8 shadow-2xl animate-in zoom-in duration-300">
                            <div class="text-center mb-8">
                                <h3 class="text-2xl font-black uppercase tracking-tighter text-zinc-900">Siapa <span
                                        class="text-amber-500">Tamunya?</span></h3>
                                <p class="text-zinc-400 text-[9px] font-bold uppercase tracking-[0.2em] mt-1">Buat link
                                    khusus untuk tamu Anda</p>
                            </div>
                            <div class="space-y-5">
                                <div>
                                    <label
                                        class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-4">Nama
                                        Tamu Undangan</label>
                                    <input type="text" id="guestName" placeholder="Contoh: Bpk. Heru & Keluarga"
                                        class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold focus:ring-2 focus:ring-amber-500 transition-all">
                                </div>
                                <div class="p-5 bg-zinc-50 rounded-2xl border border-zinc-100">
                                    <label
                                        class="block text-[8px] font-black uppercase tracking-widest text-zinc-400 mb-2">Preview
                                        Link Khusus</label>
                                    <p id="previewLink"
                                        class="text-[10px] font-mono text-zinc-500 break-all leading-relaxed">
                                        {{ url('/v/' . $userInvitation->slug) }}
                                    </p>
                                </div>
                                <div class="grid grid-cols-1 gap-3">
                                    <button onclick="shareToWA()"
                                        class="w-full bg-emerald-500 text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest flex items-center justify-center gap-3 hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20">
                                        <i data-lucide="message-circle" class="w-5 h-5"></i> Kirim ke WhatsApp
                                    </button>
                                    <button onclick="copyToClipboard()"
                                        class="w-full bg-zinc-900 text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest flex items-center justify-center gap-3 hover:bg-zinc-800 transition-all">
                                        <i data-lucide="copy" class="w-5 h-5"></i> <span id="btnCopyText">Salin
                                            Tautan</span>
                                    </button>
                                </div>
                            </div>
                            <button onclick="closeShareModal()"
                                class="w-full mt-6 text-[9px] font-black uppercase tracking-widest text-zinc-300 hover:text-zinc-500 transition-colors">
                                Tutup Jendela
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="mb-12">
                    <a href="{{ route('user.create') }}"
                        class="block w-full p-12 border-2 border-dashed border-zinc-200 rounded-[3rem] text-center group hover:border-amber-500 transition-all bg-zinc-50/50">
                        <div
                            class="w-16 h-16 bg-white group-hover:bg-amber-500 group-hover:text-white rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 transition-all shadow-sm">
                            <i data-lucide="plus" class="w-8 h-8"></i>
                        </div>
                        <p
                            class="text-[12px] font-black uppercase tracking-[0.3em] text-zinc-400 group-hover:text-zinc-900 transition-colors">
                            Mulai Buat Undangan Pertama Anda</p>
                    </a>
                </div>
        @endif
    </div>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e4e4e7;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #fbbf24;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
        @if ($userInvitation)
            const modal = document.getElementById('shareModal');
            const guestInput = document.getElementById('guestName');
            const previewLink = document.getElementById('previewLink');
            const baseLink = "{{ url('/v/' . $userInvitation->slug) }}";

            function openShareModal() {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeShareModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            if (guestInput) {
                guestInput.addEventListener('input', function() {
                    const name = encodeURIComponent(this.value);
                    previewLink.innerText = name ? `${baseLink}?to=${name}` : baseLink;
                });
            }

            function shareToWA() {
                const name = guestInput.value;
                const finalLink = name ? `${baseLink}?to=${encodeURIComponent(name)}` : baseLink;
                const message =
                    `Halo ${name},\n\nTanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir di acara pernikahan kami. Berikut detail undangannya:\n\n${finalLink}\n\nTerima kasih.`;
                window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`, '_blank');
            }

            function copyToClipboard() {
                const textToCopy = previewLink.innerText;
                navigator.clipboard.writeText(textToCopy).then(() => {
                    const btnText = document.getElementById('btnCopyText');
                    btnText.innerText = "Tersalin!";
                    setTimeout(() => {
                        btnText.innerText = "Salin Tautan";
                    }, 2000);
                });
            }
            async function deleteComment(event, id) {
                event.preventDefault();
                if (!confirm('Hapus ucapan ini secara permanen?')) return;
                const form = event.currentTarget;
                const url = form.action;
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                                'content')
                        }
                    });
                    if (response.ok) {
                        const element = document.getElementById(`comment-container-${id}`);
                        if (element) {
                            element.style.transition = 'all 0.3s ease';
                            element.style.opacity = '0';
                            element.style.transform = 'translateX(20px)';
                            setTimeout(() => element.remove(), 300);
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Gagal menghapus pesan.');
                }
            }
            async function replyComment(event, id, manualValue = null) {
                event.preventDefault();
                const form = event.currentTarget;
                const url = form.action;
                const formData = new FormData(form);
                if (manualValue === '') {
                    formData.set('reply', '');
                }
                const replySection = document.getElementById(`reply-section-${id}`);
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    if (response.ok) {
                        const replyText = formData.get('reply');
                        if (replyText === '') {
                            replySection.innerHTML = `
                        <form onsubmit="replyComment(event, ${id})" action="${url}" method="POST" class="flex gap-2">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" name="reply" placeholder="Balas ucapan tamu..." required
                                   class="flex-1 bg-white border-zinc-200 rounded-xl px-4 py-2 text-[11px] font-medium focus:ring-1 focus:ring-amber-500 border focus:outline-none transition-all">
                            <button type="submit" class="px-4 py-2 bg-zinc-900 text-white rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-amber-500 transition-colors shadow-sm">
                                Kirim
                            </button>
                        </form>
                    `;
                        } else {
                            replySection.innerHTML = `
                        <div class="flex gap-3 items-start pl-4 border-l-2 border-amber-400 relative group/reply animate-in slide-in-from-left-2 duration-300">
                            <div class="shrink-0 w-6 h-6 bg-amber-500 rounded-full flex items-center justify-center text-white">
                                <i data-lucide="corner-down-right" class="w-3 h-3"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-1">
                                    <p class="text-[9px] font-black uppercase tracking-widest text-amber-600">
                                        {{ Auth::user()->name }} <span class="text-zinc-400 font-medium lowercase italic">(Mempelai)</span>
                                    </p>
                                    <form onsubmit="replyComment(event, ${id}, '')" action="${url}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="opacity-0 group-hover/reply:opacity-100 transition-all text-[8px] font-black uppercase text-red-400 hover:text-red-600">
                                            Hapus Balasan
                                        </button>
                                    </form>
                                </div>
                                <p class="text-zinc-600 text-[11px] leading-relaxed bg-amber-50/50 p-2 rounded-lg border border-amber-100/50">
                                    ${replyText}
                                </p>
                            </div>
                        </div>
                    `;
                        }
                        if (typeof lucide !== 'undefined') lucide.createIcons();
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan sistem.');
                }
            }
        @endif
    </script>
@endsection
