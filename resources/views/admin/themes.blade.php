@extends('layouts.super-admin')

@section('content')
<div class="max-w-[1400px] mx-auto pb-20 px-4 md:px-0">
    {{-- Header: Dibuat Flex Row agar Sejajar --}}
    <div class="flex items-center justify-between gap-4 mb-8 border-b border-zinc-100 pb-6">
        <div>
            <h2 class="text-xl md:text-3xl font-black uppercase tracking-tighter text-zinc-900 lg:text-4xl">
                Daftar <span class="text-amber-500">Tema</span>
            </h2>
            <p class="hidden md:block text-zinc-400 text-[10px] uppercase tracking-[0.3em] mt-2 font-bold">
                Management Tema Berdasarkan Paket
            </p>
        </div>

        {{-- Badge Total Tema Sekarang Sejajar --}}
        <div class="px-4 py-2 md:px-6 md:py-3 bg-white border border-zinc-100 rounded-xl md:rounded-2xl shadow-sm flex flex-col items-end shrink-0">
            <p class="text-[7px] md:text-[9px] font-bold text-zinc-400 uppercase tracking-widest">Total Tema</p>
            <p class="text-xs md:text-sm font-black text-zinc-900 leading-none mt-1">
                {{ $themes->count() }} <span class="text-amber-500 md:text-zinc-900">Aktif</span>
            </p>
        </div>
    </div>

    {{-- Filter Tabs (Scrollable on Mobile) --}}
    <div class="overflow-x-auto pb-4 mb-6 md:mb-10 no-scrollbar">
        <div class="flex gap-2 p-2 bg-zinc-100/50 rounded-[1.5rem] md:rounded-[2rem] w-max border border-zinc-200/50">
            <button onclick="filterCumulative('all', this)" 
                    class="tab-btn px-6 md:px-8 py-2.5 md:py-3 rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest transition-all bg-white text-zinc-900 shadow-md">
                Semua
            </button>
            <button onclick="filterCumulative('1', this)" 
                    class="tab-btn px-6 md:px-8 py-2.5 md:py-3 rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest transition-all text-zinc-400">
                Standard
            </button>
            <button onclick="filterCumulative('2', this)" 
                    class="tab-btn px-6 md:px-8 py-2.5 md:py-3 rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest transition-all text-zinc-400">
                Premium
            </button>
            <button onclick="filterCumulative('3', this)" 
                    class="tab-btn px-6 md:px-8 py-2.5 md:py-3 rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest transition-all text-zinc-400">
                Premium++
            </button>
        </div>
    </div>

    @php
        $sortedThemes = $themes->sortBy('price');
    @endphp

    {{-- Grid Container: 2 Kolom di Mobile --}}
    <div id="theme-container" class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-8">
        @forelse($sortedThemes as $theme)
            @php
                $level = 1;
                if ($theme->price > 100000) $level = 3;
                elseif ($theme->price > 50000) $level = 2;
                
                $badgeText = ($level == 1) ? 'Standard' : (($level == 2) ? 'Premium' : 'Premium++');
                $badgeColor = ($level == 1) ? 'zinc-900' : (($level == 2) ? 'amber-500' : 'emerald-500');
            @endphp

            <div class="theme-card group bg-white rounded-[1.5rem] md:rounded-[2.5rem] border border-zinc-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500"
                 data-level="{{ $level }}">
                
                {{-- Thumbnail: Tinggi disesuaikan --}}
                <div class="relative h-40 md:h-72 overflow-hidden bg-zinc-50 border-b border-zinc-50">
                    @if($theme->thumbnail)
                        <img src="{{ asset('storage/' . $theme->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-zinc-200">
                            <i data-lucide="image" class="w-8 h-8 md:w-12 md:h-12"></i>
                        </div>
                    @endif
                    
                    <div class="absolute top-3 left-3 md:top-6 md:left-6">
                        <span class="px-2 md:px-4 py-1 md:py-1.5 bg-{{ $badgeColor }} text-white text-[6px] md:text-[8px] font-black uppercase tracking-widest rounded-full shadow-lg border border-white/10">
                            {{ $badgeText }}
                        </span>
                    </div>
                </div>

                {{-- Konten Card --}}
                <div class="p-4 md:p-8">
                    <div class="mb-4 md:mb-8">
                        <p class="text-amber-600 font-black italic tracking-tighter text-sm md:text-lg mb-0.5">
                            Rp{{ number_format($theme->price, 0, ',', '.') }}
                        </p>
                        <h4 class="font-black text-zinc-900 uppercase tracking-tighter text-xs md:text-xl truncate">
                            {{ $theme->name }}
                        </h4>
                        <p class="hidden md:block text-[9px] font-bold text-zinc-400 uppercase tracking-widest mt-1">
                            ID: #{{ $theme->id }}
                        </p>
                    </div>

                    {{-- Actions: Flex column di mobile agar muat --}}
                    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-3 pt-4 md:pt-6 border-t border-zinc-50">
                        <button onclick='openEditModal(@json($theme))' 
                                class="w-full md:flex-1 h-9 md:h-12 flex items-center justify-center gap-2 rounded-xl md:rounded-2xl bg-zinc-900 text-white hover:bg-amber-500 transition-all text-[8px] md:text-[10px] font-black uppercase tracking-widest">
                            <i data-lucide="edit-3" class="w-3 h-3 md:w-4 md:h-4"></i> 
                            <span class="inline">Edit</span>
                        </button>
                        
                        <form action="{{ route('super.themes.destroy', $theme->id) }}" method="POST" onsubmit="return confirm('Hapus tema ini?')" class="w-full md:w-auto">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full md:w-12 h-9 md:h-12 flex items-center justify-center rounded-xl md:rounded-2xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all">
                                <i data-lucide="trash-2" class="w-3 h-3 md:w-4 md:h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-24 text-center border-4 border-dashed border-zinc-50 rounded-[3rem] md:rounded-[4rem]">
                <i data-lucide="layout-template" class="w-12 h-12 md:w-16 md:h-16 text-zinc-100 mx-auto mb-4"></i>
                <p class="text-zinc-300 font-black uppercase tracking-widest text-[10px] md:text-xs">Database Tema Kosong</p>
            </div>
        @endforelse
    </div>
</div>

{{-- MODAL TETAP SAMA SEPERTI SEBELUMNYA --}}
<div id="editModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" onclick="closeEditModal()"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[95%] max-w-lg">
        <form id="editForm" method="POST" enctype="multipart/form-data" class="bg-white rounded-[2rem] md:rounded-[3rem] p-6 md:p-10 shadow-2xl">
            @csrf @method('PUT')
            <div class="mb-8 text-center">
                <h3 class="text-xl md:text-2xl font-black uppercase tracking-tighter text-zinc-900">Edit <span class="text-amber-500">Tema</span></h3>
            </div>
            <div class="space-y-5">
                <div>
                    <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-4">Nama Desain</label>
                    <input type="text" name="name" id="edit_name" required class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-4">Harga (Rp)</label>
                    <input type="number" name="price" id="edit_price" required class="w-full bg-zinc-50 border-none rounded-2xl px-6 py-4 text-sm font-bold outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="block text-[9px] font-black uppercase tracking-widest text-zinc-400 mb-2 ml-4">Thumbnail</label>
                    <input type="file" name="thumbnail" class="w-full text-[10px] font-bold text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-amber-50 file:text-amber-600">
                </div>
            </div>
            <div class="flex gap-3 mt-10">
                <button type="button" onclick="closeEditModal()" class="flex-1 py-4 text-[10px] font-black uppercase tracking-widest text-zinc-400">Batal</button>
                <button type="submit" class="flex-[2] bg-zinc-900 text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-amber-500 transition-all">Update Tema</button>
            </div>
        </form>
    </div>
</div>

<script>
    function filterCumulative(selectedLevel, btn) {
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.classList.remove('bg-white', 'text-zinc-900', 'shadow-md');
            button.classList.add('text-zinc-400');
        });
        btn.classList.add('bg-white', 'text-zinc-900', 'shadow-md');
        btn.classList.remove('text-zinc-400');

        const cards = document.querySelectorAll('.theme-card');
        cards.forEach(card => {
            const cardLevel = parseInt(card.getAttribute('data-level'));
            if (selectedLevel === 'all') {
                card.style.display = 'block';
            } else {
                card.style.display = (cardLevel <= parseInt(selectedLevel)) ? 'block' : 'none';
            }
        });
    }

    function openEditModal(theme) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editForm');
        form.action = `/super-admin/themes/${theme.id}`;
        document.getElementById('edit_name').value = theme.name;
        document.getElementById('edit_price').value = theme.price;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    window.onload = function() { lucide.createIcons(); };
</script>

<style>
    /* Menghilangkan scrollbar pada tab filter mobile */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection