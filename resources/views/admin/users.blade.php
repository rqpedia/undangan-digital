@extends('layouts.super-admin')

@section('content')
<div class="max-w-[1400px] mx-auto">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <h2 class="text-3xl font-black uppercase tracking-tighter text-zinc-900 lg:text-4xl">
                User<span class="text-amber-500"> Management.</span>
            </h2>
            <p class="text-zinc-400 text-[10px] uppercase tracking-[0.3em] mt-2 font-bold flex items-center gap-2">
                <i data-lucide="users" class="w-3 h-3 text-amber-500"></i>
                Kelola, Verifikasi, dan Atur Paket Klien
            </p>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-8 p-5 bg-emerald-500 text-white rounded-[2rem] text-[10px] font-black uppercase tracking-widest shadow-xl shadow-emerald-200/50 flex items-center gap-3">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="bg-white rounded-[2.5rem] border border-zinc-100 shadow-[0_10px_30px_-15px_rgba(0,0,0,0.05)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50/50 border-b border-zinc-100">
                        <th class="px-10 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400">User Details</th>
                        <th class="px-10 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400">Paket Aktif</th>
                        <th class="px-10 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400 text-center">Status</th>
                        <th class="px-10 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400 text-right">Aksi & Pengaturan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-50">
                    @forelse($users as $user)
                    <tr class="group hover:bg-zinc-50/30 transition-all">
                        <td class="px-10 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-zinc-900 rounded-xl flex items-center justify-center text-white font-black text-xs uppercase">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="font-black text-sm text-zinc-800 tracking-tight uppercase truncate">{{ $user->name }}</p>
                                    <p class="text-[10px] text-zinc-400 font-bold tracking-tight lowercase mt-0.5 italic truncate">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            @php
                                $packageInfo = [
                                    1 => ['name' => 'Standard', 'desc' => 'Rp.50.000,-', 'color' => 'text-zinc-800'],
                                    2 => ['name' => 'Premium', 'desc' => 'Rp.100.000,-', 'color' => 'text-amber-600'],
                                    3 => ['name' => 'Premium++', 'desc' => 'Rp.150.000,-', 'color' => 'text-emerald-600 font-black'],
                                ][$user->package_level] ?? ['name' => 'N/A', 'desc' => '-', 'color' => 'text-zinc-400'];
                            @endphp
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black {{ $packageInfo['color'] }} uppercase italic">{{ $packageInfo['name'] }}</span>
                                <span class="text-[8px] font-bold text-zinc-400 uppercase tracking-widest">{{ $packageInfo['desc'] }}</span>
                            </div>
                        </td>

                        <td class="px-10 py-6 text-center">
                            @if($user->is_active)
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    Verified
                                </span>
                            @else
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-amber-50 text-amber-600 border border-amber-100 animate-pulse">
                                    Waiting
                                </span>
                            @endif
                        </td>

                        <td class="px-10 py-6">
                            <div class="flex justify-end items-center gap-3">
                                
                                {{-- Tombol Reset Password --}}
                                <button type="button" 
                                        onclick="openResetModal('{{ $user->id }}', '{{ $user->name }}')" 
                                        class="w-10 h-10 flex items-center justify-center bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white transition-all border border-amber-100 shadow-sm"
                                        title="Reset Password">
                                    <i data-lucide="key-round" class="w-4 h-4"></i>
                                </button>

                                {{-- Form Update Paket & Verifikasi --}}
                                <form action="{{ route('super.users.validate', $user->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <div class="relative group/select">
                                        <select name="package_level" onchange="{{ $user->is_active ? 'this.form.submit()' : '' }}" 
                                            class="appearance-none bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-2.5 text-[10px] font-black uppercase tracking-widest text-zinc-700 focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none pr-10 cursor-pointer transition-all hover:bg-zinc-100">
                                            <option value="1" {{ $user->package_level == 1 ? 'selected' : '' }}>Standard</option>
                                            <option value="2" {{ $user->package_level == 2 ? 'selected' : '' }}>Premium</option>
                                            <option value="3" {{ $user->package_level == 3 ? 'selected' : '' }}>Premium++</option>
                                        </select>
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-zinc-400">
                                            <i data-lucide="chevron-down" class="w-3 h-3"></i>
                                        </div>
                                    </div>

                                    @if(!$user->is_active)
                                        <button type="submit" class="bg-zinc-900 text-white px-5 py-2.5 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-emerald-500 transition-all shadow-lg shadow-zinc-200 flex items-center gap-2">
                                            <i data-lucide="shield-check" class="w-3 h-3"></i>
                                            Verify
                                        </button>
                                    @endif
                                </form>

                                {{-- Form Hapus User --}}
                                <form action="{{ route('super.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all border border-red-100">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-20 text-center">
                            <i data-lucide="users" class="w-12 h-12 text-zinc-100 mx-auto mb-4"></i>
                            <p class="text-xs font-bold text-zinc-300 uppercase tracking-widest italic">Belum ada user terdaftar</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="px-10 py-6 bg-zinc-50/50 border-t border-zinc-100">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

{{-- Modal Reset Password --}}
<div id="resetModal" class="fixed inset-0 z-[60] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        {{-- Overlay Backdrop --}}
        <div class="fixed inset-0 bg-zinc-900/60 backdrop-blur-sm transition-opacity" onclick="closeResetModal()"></div>

        {{-- Modal Content --}}
        <div class="relative bg-white rounded-[2.5rem] shadow-2xl w-full max-w-md p-8 md:p-10 transform transition-all border border-zinc-100">
            <div class="mb-8 text-center">
                <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="shield-alert" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-zinc-900 uppercase tracking-tighter">Reset User Password</h3>
                <p id="reset-user-name" class="text-[9px] text-zinc-400 font-bold uppercase tracking-[0.2em] mt-2 italic"></p>
            </div>

            <form id="resetForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-5">
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400 ml-1">Password Baru</label>
                        <input type="password" name="password" required placeholder="••••••••"
                               class="w-full mt-2 px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl focus:ring-2 focus:ring-amber-500 outline-none transition-all text-sm font-bold text-zinc-900">
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400 ml-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••"
                               class="w-full mt-2 px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl focus:ring-2 focus:ring-amber-500 outline-none transition-all text-sm font-bold text-zinc-900">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-10">
                    <button type="button" onclick="closeResetModal()" 
                            class="px-6 py-4 bg-zinc-100 text-zinc-500 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-zinc-200 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-6 py-4 bg-zinc-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-zinc-200 hover:bg-amber-600 transition-all">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
    function openResetModal(userId, userName) {
        const modal = document.getElementById('resetModal');
        const form = document.getElementById('resetForm');
        const nameLabel = document.getElementById('reset-user-name');
        
        // URL diarahkan ke route reset password
        form.action = `/super-admin/users/${userId}/reset-password`; 
        nameLabel.innerText = `Mengatur ulang akses untuk: ${userName}`;
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Matikan scroll body
    }

    function closeResetModal() {
        const modal = document.getElementById('resetModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Aktifkan kembali scroll body
    }

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>

@endsection