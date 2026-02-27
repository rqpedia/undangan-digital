<div class="w-full">
    {{-- Tampilan Desktop: Table --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-3">
            <thead>
                <tr class="text-[10px] uppercase tracking-[0.2em] text-zinc-400">
                    <th class="px-6 pb-2 font-bold">Client</th>
                    <th class="px-6 pb-2 font-bold text-center">Nominal</th>
                    <th class="px-6 pb-2 font-bold text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stats['recent_orders'] as $order)
                    @php
                        $status = strtolower(trim($order->status));
                        $isSuccess = in_array($status, ['success', 'completed', 'verified', 'paid']);
                        $isFailed = in_array($status, ['failed', 'declined', 'canceled', 'expired']);

                        $config = [
                            'label' => $isSuccess ? 'Verified' : ($isFailed ? 'Declined' : 'Waiting'),
                            'class' => $isSuccess
                                ? 'bg-emerald-100 text-emerald-700 border-emerald-200'
                                : ($isFailed
                                    ? 'bg-rose-100 text-rose-700 border-rose-200'
                                    : 'bg-amber-100 text-amber-700 border-amber-200'),
                            'icon' => $isSuccess ? 'check-circle' : ($isFailed ? 'x-circle' : 'clock'),
                        ];
                    @endphp
                    <tr
                        class="group bg-white hover:bg-zinc-50 transition-all duration-300 shadow-sm border border-zinc-100">
                        <td class="py-5 px-6 rounded-l-3xl border-y border-l border-zinc-100">
                            <div class="flex items-center gap-4">
                                <div
                                    class="no-print-avatar h-10 w-10 rounded-full bg-zinc-900 flex items-center justify-center text-white text-[10px] font-black uppercase md:flex hidden">
                                    {{ strtoupper(substr($order->customer_name ?? $order->user->name, 0, 2)) }}
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-black text-sm text-zinc-900 tracking-tight uppercase">
                                        {{ $order->customer_name ?? $order->user->name }}
                                    </p>
                                    <span class="text-[9px] text-zinc-400 font-bold uppercase tracking-widest mt-0.5">
                                        {{ $order->created_at->format('d M, Y') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="py-5 px-6 border-y border-zinc-100 text-center font-black italic text-zinc-900">
                            Rp{{ number_format($order->total_price ?? $order->amount, 0, ',', '.') }}
                        </td>
                        <td class="py-5 px-6 rounded-r-3xl border-y border-r border-zinc-100 text-right">
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest border {{ $config['class'] }}">
                                <i data-lucide="{{ $config['icon'] }}" class="w-3 h-3"></i>
                                {{ $config['label'] }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-20 text-center">
                            <i data-lucide="search-x" class="w-10 h-10 text-zinc-200 mx-auto mb-4"></i>
                            <p class="text-zinc-400 font-bold uppercase text-[10px] tracking-widest">No transactions
                                found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>

            {{-- FOOTER TOTAL: Hanya tampil jika ada data --}}
            @if ($stats['recent_orders']->count() > 0)
                <tfoot>
                    <tr class="bg-zinc-900 text-white shadow-xl">
                        <td class="py-6 px-8 rounded-l-[2rem]">
                            <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-zinc-500">Total Revenue</p>
                        </td>
                        <td class="py-6 px-6 text-center">
                            <p class="text-xl font-black italic tracking-tighter text-amber-500">
                                Rp{{ number_format($stats['recent_orders']->sum(function ($o) {return $o->total_price ?? $o->amount;}),0,',','.') }}
                            </p>
                        </td>
                        <td class="py-6 px-8 rounded-r-[2rem] text-right">
                            <div class="flex items-baseline justify-end gap-1.5">
                                <span class="text-[10px] font-black italic uppercase text-white">
                                    {{ $stats['recent_orders']->count() }}
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-zinc-500">
                                    Total Transaksi
                                </span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>

    {{-- Tampilan Mobile: Stack Cards --}}
<div class="md:hidden space-y-4">
    @forelse($stats['recent_orders'] as $order)
        @php
            $status = strtolower(trim($order->status));
            $isSuccess = in_array($status, ['success', 'completed', 'verified', 'paid']);
            $isFailed = in_array($status, ['failed', 'declined', 'canceled', 'expired']);

            $mClass = $isSuccess 
                ? 'bg-emerald-50 text-emerald-600 border-emerald-100' 
                : ($isFailed ? 'bg-rose-50 text-rose-600 border-rose-100' : 'bg-amber-50 text-amber-600 border-amber-100');
            
            $mLabel = $isSuccess ? 'Verified' : ($isFailed ? 'Declined' : 'Waiting');
            $mIcon = $isSuccess ? 'check-circle' : ($isFailed ? 'x-circle' : 'clock');
        @endphp

        <div class="bg-zinc-50/50 rounded-[2.5rem] p-6 border border-zinc-100 relative overflow-hidden">
            {{-- Header Card: Info Client & Icon Status --}}
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-2xl bg-zinc-900 flex items-center justify-center text-white text-[10px] font-black uppercase shadow-inner">
                        {{ strtoupper(substr($order->customer_name ?? $order->user->name, 0, 2)) }}
                    </div>
                    <div>
                        <p class="font-black text-xs text-zinc-900 uppercase tracking-tight">
                            {{ $order->customer_name ?? $order->user->name }}
                        </p>
                        <p class="text-[8px] text-zinc-400 font-bold uppercase tracking-widest">
                            {{ $order->created_at->format('d M, Y') }}
                        </p>
                    </div>
                </div>
                <div class="p-2.5 rounded-xl {{ $mClass }} border">
                    <i data-lucide="{{ $mIcon }}" class="w-4 h-4"></i>
                </div>
            </div>

            {{-- Body Card: Nominal & Status Label --}}
            <div class="flex items-end justify-between bg-white p-5 rounded-[1.5rem] border border-zinc-100 shadow-sm">
                <div>
                    <p class="text-[8px] font-black text-zinc-400 uppercase tracking-[0.2em] mb-1.5">Amount Paid</p>
                    <p class="text-lg font-black italic text-zinc-900 tracking-tighter">
                        Rp{{ number_format($order->total_price ?? $order->amount, 0, ',', '.') }}
                    </p>
                </div>
                <span class="text-[9px] font-black uppercase tracking-widest px-4 py-2 rounded-xl border {{ $mClass }}">
                    {{ $mLabel }}
                </span>
            </div>
        </div>
    @empty
        {{-- Empty State Mobile --}}
        <div class="py-20 text-center bg-zinc-50 rounded-[3rem] border-2 border-dashed border-zinc-200">
            <i data-lucide="database-zap" class="w-10 h-10 text-zinc-300 mx-auto mb-4"></i>
            <p class="text-zinc-400 font-black text-[10px] uppercase tracking-widest">No Transactions Found</p>
        </div>
    @endforelse

    {{-- SUMMARY CARD MOBILE (TOTAL) --}}
    @if($stats['recent_orders']->count() > 0)
        <div class="mt-8 bg-zinc-900 p-8 rounded-[2.5rem] shadow-2xl relative overflow-hidden border border-white/5">
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-[0.2em] mb-1">Monthly Summary</p>
                        <h3 class="text-2xl font-black italic text-white tracking-tighter">
                            Rp{{ number_format($stats['recent_orders']->sum(function($o){ return $o->total_price ?? $o->amount; }), 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="bg-amber-500/10 p-3 rounded-2xl border border-amber-500/20">
                        <i data-lucide="trending-up" class="w-5 h-5 text-amber-500"></i>
                    </div>
                </div>
                
                <div class="flex items-baseline justify-start gap-1.5 pt-4 border-t border-white/10">
                    <span class="text-[10px] font-black italic uppercase text-white">
                        {{ $stats['recent_orders']->count() }}
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-zinc-500">
                        Total Transaksi
                    </span>
                </div>
            </div>
            {{-- Background Icon Dekoratif --}}
            <i data-lucide="coins" class="absolute -right-4 -bottom-4 w-24 h-24 text-white opacity-5"></i>
        </div>
    @endif
</div>
</div>
