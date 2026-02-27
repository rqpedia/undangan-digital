@extends('layouts.super-admin')

@section('content')
    <div class="max-w-[1400px] mx-auto pb-20">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <h2 class="text-3xl font-black uppercase tracking-tighter text-zinc-900 lg:text-4xl">
                System <span class="text-amber-500">Monitor</span>
            </h2>
            <p class="text-zinc-400 text-[10px] uppercase tracking-[0.3em] mt-2 font-bold flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Data Real-time
            </p>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-10">
        
        <div class="col-span-2 md:col-span-1 bg-zinc-900 p-8 rounded-[2.5rem] text-white shadow-xl relative overflow-hidden">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-500 block mb-4">Total Revenue</span>
            <h3 class="text-2xl md:text-3xl font-black italic tracking-tighter">
                Rp{{ number_format($stats['total_revenue'], 0, ',', '.') }}
            </h3>
            <i data-lucide="banknote" class="absolute -right-4 -bottom-4 w-24 h-24 opacity-10"></i>
        </div>

        <div class="col-span-2 md:col-span-1 bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 block mb-4">Client Distribution</span>
            <div class="space-y-2">
                <div class="flex justify-between items-center text-[10px] font-black italic uppercase">
                    <span class="text-zinc-400">Standard</span>
                    <span class="text-zinc-900">{{ $stats['package_a_count'] ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center text-[10px] font-black italic uppercase">
                    <span class="text-amber-500">Premium</span>
                    <span class="text-zinc-900">{{ $stats['package_b_count'] ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center text-[10px] font-black italic uppercase">
                    <span class="text-emerald-500">Premium++</span>
                    <span class="text-zinc-900">{{ $stats['package_c_count'] ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 md:p-6 rounded-[2rem] md:rounded-[2.5rem] border border-zinc-100 shadow-sm flex flex-col h-full min-h-[200px]">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-widest text-zinc-400 block leading-tight">Activity</span>
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
            </div>

            <div class="space-y-3 overflow-y-auto max-h-[120px] pr-1 custom-scrollbar">
                @forelse($stats['online_users_list'] as $user)
                    <div class="flex items-center gap-2 group">
                        <div class="min-w-0">
                            <p class="text-[9px] font-black text-zinc-800 uppercase truncate leading-none mb-1">
                                {{ $user->name }}
                            </p>
                            <p class="text-[7px] font-bold uppercase {{ $user->package_level == 3 ? 'text-emerald-500' : ($user->package_level == 2 ? 'text-amber-500' : 'text-zinc-400') }}">
                                {{ $user->package_level == 1 ? 'Standard' : ($user->package_level == 2 ? 'Premium' : 'Premium++') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-[8px] text-zinc-300 italic text-center py-4">Empty</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white p-5 md:p-8 rounded-[2rem] md:rounded-[2.5rem] border border-zinc-100 shadow-sm relative overflow-hidden group">
            <div class="relative z-10">
                <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-widest text-zinc-400 block mb-3 md:mb-4">Undangan</span>
                <h3 class="text-2xl md:text-4xl font-black text-amber-600 tracking-tighter mb-1">{{ $stats['active_invitations'] }}</h3>
                <p class="text-[8px] font-bold text-zinc-400 uppercase italic flex items-center gap-1">
                    <span class="w-1 h-1 bg-amber-500 rounded-full"></span> Undangan Aktif
                </p>
            </div>
            <i data-lucide="heart" class="absolute -right-2 -bottom-2 w-12 h-12 md:w-20 md:h-20 text-zinc-50 opacity-20"></i>
        </div>

    </div>
</div>

        <div class="mb-10 bg-zinc-900 rounded-[3rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/5 rounded-full -mr-20 -mt-20 blur-3xl"></div>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 relative z-10">
                <div>
                    <h3 class="font-black uppercase tracking-widest text-xs text-white flex items-center gap-2">
                        <i data-lucide="link" class="w-4 h-4 text-amber-500"></i> Link Undangan Aktif
                    </h3>
                    <p class="text-zinc-500 text-[9px] uppercase tracking-widest mt-1">Daftar undangan baru</p>
                </div>
            </div>

            <div class="overflow-x-auto relative z-10">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[9px] uppercase tracking-[0.2em] text-zinc-500 border-b border-white/5">
                            <th class="pb-5 font-bold">Pembuat Undangan</th>
                            <th class="pb-5 font-bold">Link Undangan</th>
                            <th class="pb-5 font-bold text-center">Ucapan Pengunjung</th>
                            <th class="pb-5 font-bold text-right">Navigasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($stats['latest_invitations'] as $invitation)
                            <tr class="group hover:bg-white/[0.02] transition-colors">
                                <td class="py-6">
                                    <p class="font-bold text-sm text-zinc-200 tracking-tight uppercase">
                                        {{ $invitation->groom_name }} & {{ $invitation->bride_name }}</p>
                                    <span
                                        class="text-[8px] text-zinc-500 font-bold uppercase tracking-widest flex items-center gap-1.5">
                                        <i data-lucide="user" class="w-2 h-2"></i> Client :
                                        {{ $invitation->user->name ?? 'User' }}
                                    </span>
                                </td>
                                <td class="py-6">
                                    <div class="flex items-center gap-2">
                                        <code
                                            class="text-[10px] bg-white/5 px-3 py-1.5 rounded-lg text-amber-400 font-mono border border-white/5">/v/{{ $invitation->slug }}</code>
                                        <button onclick="copyToClipboard('{{ url('/v/' . $invitation->slug) }}', this)"
                                            class="p-2 hover:bg-white/10 rounded-lg text-zinc-500">
                                            <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-6 text-center">
                                    <span
                                        class="text-xs font-black italic text-zinc-300">{{ $invitation->comments_count ?? 0 }}</span>
                                    <p class="text-[8px] text-zinc-600 font-bold uppercase italic tracking-tighter">Ucapan
                                    </p>
                                </td>
                                <td class="py-6 text-right">
                                    <a href="{{ url('/v/' . $invitation->slug) }}" target="_blank"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-zinc-900 rounded-xl text-[9px] font-black uppercase tracking-widest">
                                        Visit <i data-lucide="external-link" class="w-3 h-3"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-20 text-center text-zinc-600">Belum ada project aktif</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white rounded-[2.5rem] border border-zinc-100 p-5 md:p-10 shadow-sm printable-area">
            {{-- Header ini HANYA muncul saat di-print --}}
            <div class="hidden print:block mb-8 border-b-2 border-black pb-4">
                <h1 class="text-2xl font-black uppercase tracking-tighter">Laporan Buku Transaksi</h1>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-500">
                    Periode: {{ $stats['current_month'] }}
                </p>
            </div>
            <div class="flex flex-col gap-6 mb-8 md:mb-10">
                <h3
                    class="font-black uppercase tracking-widest text-[10px] md:text-xs text-zinc-900 flex items-center gap-2">
                    <i data-lucide="book-text" class="w-4 h-4 text-amber-500"></i> Buku Transaksi
                </h3>

                <div class="flex items-center justify-between gap-4 no-print">
                    <div class="flex items-center gap-2 md:gap-3">
                        <button onclick="fetchTransactions('{{ $stats['prev_month'] }}', '{{ $stats['prev_year'] }}')"
                            id="btn-prev"
                            class="p-2 md:p-2.5 bg-zinc-50 hover:bg-zinc-900 hover:text-white rounded-xl transition-all active:scale-90 border border-zinc-100 md:border-none">
                            <i data-lucide="chevron-left" class="w-4 h-4"></i>
                        </button>
                        <span id="current-month-label"
                            class="text-[9px] md:text-[10px] text-zinc-900 font-black uppercase tracking-[0.1em] md:tracking-[0.2em] min-w-[80px] md:min-w-[100px] text-center">
                            {{ $stats['current_month'] }}
                        </span>
                        <button onclick="fetchTransactions('{{ $stats['next_month'] }}', '{{ $stats['next_year'] }}')"
                            id="btn-next"
                            class="p-2 md:p-2.5 bg-zinc-50 hover:bg-zinc-900 hover:text-white rounded-xl transition-all active:scale-90 border border-zinc-100 md:border-none">
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </button>
                    </div>

                    <button onclick="window.print()"
                        class="no-print flex items-center justify-center p-3 md:px-6 md:py-3 bg-zinc-900 text-white rounded-xl md:rounded-2xl shadow-lg shadow-zinc-200 active:scale-95 transition-all">
                        <i data-lucide="printer" class="w-4 h-4 text-amber-500"></i>
                        <span class="hidden md:block ml-2 text-[10px] font-black uppercase tracking-widest">
                            Cetak Laporan
                        </span>
                    </button>
                </div>
            </div>

            <div id="transactions-table-container"
                class="transition-opacity duration-300 overflow-y-auto overflow-x-hidden max-h-[450px] pr-2 custom-scrollbar">
                @include('admin.partials._transaction_table')
            </div>
        </div>
    </div>
@endsection
<script>
    async function fetchTransactions(month, year) {
        const container = document.getElementById('transactions-table-container');
        const label = document.getElementById('current-month-label');

        if (!container) return;

        // Efek loading
        container.style.opacity = '0.3';
        container.style.pointerEvents = 'none';

        try {
            const response = await fetch(`/super-admin/fetch-transactions?month=${month}&year=${year}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            // PEMBERSIHAN TOTAL: Hapus semua child node sebelum isi baru
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }

            // Isi dengan HTML baru dari server
            container.innerHTML = data.html;

            // Update Navigasi
            if (label) label.textContent = data.navigation.current_month;

            document.getElementById('btn-prev').onclick = () => fetchTransactions(data.navigation.prev_month, data
                .navigation.prev_year);
            document.getElementById('btn-next').onclick = () => fetchTransactions(data.navigation.next_month, data
                .navigation.next_year);

            if (window.lucide) window.lucide.createIcons();

        } catch (error) {
            console.error("Error:", error);
        } finally {
            container.style.opacity = '1';
            container.style.pointerEvents = 'auto';
        }
    }

    /**
     * Fungsi Copy to Clipboard yang Dioptimalkan
     * (Hanya butuh satu fungsi saja)
     */
    function copyToClipboard(text, btn) {
        if (!navigator.clipboard) return;

        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = btn.innerHTML;

            // Ubah ke icon check
            btn.innerHTML = '<i data-lucide="check" class="w-3.5 h-3.5 text-emerald-500"></i>';
            if (window.lucide) window.lucide.createIcons();

            // Kembalikan ke icon semula setelah 2 detik
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                if (window.lucide) window.lucide.createIcons();
            }, 2000);
        }).catch(err => {
            console.error('Gagal copy text: ', err);
        });
    }
</script>
<style>
    @media print {

        /* 1. Sembunyikan elemen dashboard utama secara spesifik */
        nav,
        aside,
        footer,
        .no-print,
        button {
            display: none !important;
        }

        /* 2. Pastikan kontainer utama tidak membatasi area print */
        body,
        html {
            background: white !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Sembunyikan semua section di dalam content kecuali area print */
        div.max-w-\[1400px\]>div:not(.printable-area) {
            display: none !important;
        }

        /* 3. Atur Area Print */
        .printable-area {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            display: block !important;
        }

        /* 4. Perbaikan Tabel agar tidak terpotong */
        #transactions-table-container {
            max-height: none !important;
            overflow: visible !important;
            display: block !important;
            width: 100% !important;
        }

        table {
            width: 100% !important;
            border-collapse: collapse !important;
            table-layout: auto !important;
        }

        /* Paksa Baris Tabel tetap dalam satu halaman (tidak terpotong di tengah baris) */
        tr {
            page-break-inside: avoid !important;
        }

        /* Header Tabel */
        thead {
            display: table-header-group !important;
        }

        /* 5. Tampilan Elemen Desktop vs Mobile */
        .hidden.md\:block {
            display: block !important;
            /* Paksa versi tabel muncul */
        }

        .md\:hidden {
            display: none !important;
            /* Paksa versi card mobile hilang */
        }

        /* Tambahan: Pastikan teks hitam tajam */
        .text-zinc-900,
        .text-zinc-800,
        td,
        th {
            color: black !important;
        }

        tfoot tr {
            background-color: #18181b !important;
            /* Paksa warna gelap */
            color: white !important;
            -webkit-print-color-adjust: exact;
        }

        tfoot td p {
            color: white !important;
        }

        tfoot td .text-amber-500 {
            color: #f59e0b !important;
            /* Paksa warna amber tetap muncul */
        }
    }

    /* Scrollbar style tetap untuk layar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e4e4e7;
        border-radius: 10px;
    }
</style>
