<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-96">
        <h2 class="text-2xl font-black mb-6 uppercase tracking-tighter">Admin <span class="text-amber-500">Login</span></h2>
        
        @if(session('error'))
            <div class="bg-red-50 text-red-500 p-3 rounded-lg mb-4 text-xs font-bold uppercase">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('super.login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase text-zinc-400">Email Address</label>
                <input type="email" name="email" class="w-full border border-zinc-200 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="text-[10px] font-black uppercase text-zinc-400">Password</label>
                <input type="password" name="password" class="w-full border border-zinc-200 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <button type="submit" class="w-full bg-zinc-900 text-white font-black py-4 rounded-xl uppercase tracking-widest text-[10px] hover:bg-zinc-800 transition-all">
                Masuk Sistem
            </button>
        </form>
    </div>
</body>
</html>