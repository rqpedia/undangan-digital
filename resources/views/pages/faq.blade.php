<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- SEO Dasar --}}
    <title>{{ $page_title ?? 'RQPEDIA.ID' }} | FAQ</title>
    <meta name="description" content="{{ $site_settings['site_description'] ?? 'Platform penyedia layanan digital dan solusi kreatif terpercaya.' }}">

    {{-- Favicon - Standar Browser --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">

    {{-- Favicon - Apple (iOS) --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">

    {{-- Favicon - Android & Manifest --}}
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- Open Graph / Social Media (Menggunakan rqpedia1.png sebagai thumbnail sharing) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $page_title ?? 'RQPEDIA.ID' }}">
    <meta property="og:description" content="{{ $site_settings['site_description'] ?? 'Solusi digital terpercaya.' }}">
    <meta property="og:image" content="{{ asset('img/rqpedia1.png') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('img/rqpedia1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <style>
    body { 
        font-family: 'Inter', sans-serif; 
        scroll-behavior: smooth; 
        overflow-x: hidden; /* Mencegah elemen meluap ke samping di mobile */
    }
    .font-cinzel { font-family: 'Cinzel', serif; }

    /* --- FIX TOTAL NAVIGASI MOBILE --- */
    header { 
        position: fixed !important; 
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        /* Nilai z-index sangat tinggi untuk memastikan di atas segalanya */
        z-index: 100000 !important; 
        /* Memastikan area klik aktif */
        pointer-events: auto !important; 
        background-color: rgba(250, 250, 250, 0.9); /* Opsional: sedikit transparan */
        backdrop-filter: blur(8px); /* Efek blur modern */
    }

    main {
        position: relative;
        /* Berikan padding top yang cukup besar agar tidak 'tercepit' di bawah fixed header */
        padding-top: 8rem; 
        z-index: 50;
    }

    /* FAQ Adjustment */
    #faq-container {
        position: relative;
        z-index: 60; /* Harus tetap di bawah header (100000) */
    }

    /* Accordion Styling */
    .faq-answer { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    .prose-faq ul { list-style-type: none; padding-left: 0; }
    .prose-faq li { margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.5rem; }
    .prose-faq li::before { content: "•"; color: #d97706; font-weight: bold; }
</style>
</head>
<body class="bg-[#fafafa] text-zinc-800 antialiased">

    {{-- Memanggil Header --}}
    @include('layouts.header')

    {{-- Gunakan max-w-5xl agar grid 2 kolom di desktop terlihat lebih lega --}}
    <main class="max-w-5xl mx-auto pt-32 pb-20 px-6">
        
        {{-- Header Section --}}
        <div class="text-center mb-20">
            <h1 class="font-cinzel text-4xl md:text-5xl font-bold mb-6 tracking-tight">
                Frequently Asked <span class="text-amber-600">Questions</span>
            </h1>
            <div class="flex items-center justify-center gap-4">
                <span class="h-[1px] w-12 bg-zinc-300"></span>
                <p class="text-zinc-500 text-[10px] font-bold tracking-[0.3em] uppercase">Pusat Bantuan RQPedia</p>
                <span class="h-[1px] w-12 bg-zinc-300"></span>
            </div>
        </div>

        {{-- FAQ Container --}}
        <div id="faq-container" class="min-h-[300px]">
            @if(!empty($site_settings['faq_content']))
                <div class="prose-faq prose prose-zinc max-w-none">
                    {!! $site_settings['faq_content'] !!}
                </div>
            @else
                <div class="text-center py-20 border-2 border-dashed border-zinc-200 rounded-[3rem] bg-white">
                    <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <p class="text-zinc-400 font-medium italic">Belum ada informasi bantuan saat ini.</p>
                </div>
            @endif
        </div>

        {{-- Contact CTA --}}
        <div class="mt-24 p-12 bg-zinc-900 rounded-[3.5rem] text-center shadow-2xl relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="text-white font-cinzel text-2xl mb-4">Butuh bantuan personal?</h3>
                <p class="text-zinc-400 text-sm mb-10 max-w-md mx-auto leading-relaxed">
                    Tim Customer Service kami siap melayani pertanyaan Anda setiap hari mulai pukul 09.00 - 21.00 WIB.
                </p>
                <a href="https://wa.me/{{ $site_settings['contact_whatsapp'] ?? '6282371464575' }}" 
                   target="_blank"
                   class="inline-flex items-center gap-4 bg-amber-600 text-white px-10 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-white hover:text-zinc-900 transition-all duration-500 shadow-xl hover:shadow-amber-500/20 active:scale-95">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.481 5.229 3.481 8.406c0 6.555-5.332 11.887-11.886 11.887-2.016 0-3.999-.512-5.766-1.487l-6.22 1.631zm5.889-4.881c1.604.953 3.513 1.455 5.466 1.456 5.487 0 9.954-4.467 9.954-9.953 0-2.657-1.034-5.155-2.912-7.033s-4.377-2.912-7.035-2.912c-5.487 0-9.953 4.466-9.953 9.953 0 2.05.629 4.048 1.819 5.735l-1.026 3.741 3.843-1.008z"/></svg>
                    Chat via WhatsApp
                </a>
            </div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-amber-600/10 rounded-full blur-3xl group-hover:bg-amber-600/20 transition-all duration-700"></div>
        </div>
    </main>

    @include('layouts.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // === 1. LOGIKA NAVIGASI MOBILE ===
    const openBtn = document.getElementById('open-menu');
    const closeBtn = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuBackdrop = document.getElementById('menu-backdrop');
    const menuContent = document.getElementById('menu-content');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    function toggleMenu(isOpen) {
        if (isOpen) {
            mobileMenu.classList.remove('invisible');
            setTimeout(() => {
                menuBackdrop.classList.replace('opacity-0', 'opacity-100');
                menuContent.classList.replace('translate-x-full', 'translate-x-0');
            }, 10);
        } else {
            menuBackdrop.classList.replace('opacity-100', 'opacity-0');
            menuContent.classList.replace('translate-x-0', 'translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('invisible');
            }, 500);
        }
    }

    if(openBtn) openBtn.addEventListener('click', () => toggleMenu(true));
    if(closeBtn) closeBtn.addEventListener('click', () => toggleMenu(false));
    if(menuBackdrop) menuBackdrop.addEventListener('click', () => toggleMenu(false));
    
    // Tutup menu jika link diklik
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => toggleMenu(false));
    });


    // === 2. LOGIKA FAQ GRID ===
    const container = document.querySelector('.prose-faq');
    if (!container) return;

    const categories = container.querySelectorAll('h2');

    categories.forEach((category) => {
        category.className = "text-xs font-extrabold text-amber-600 mt-16 mb-6 flex items-center gap-3 tracking-[0.4em] uppercase w-full col-span-full";
        category.innerHTML = `<span class="h-[2px] w-8 bg-amber-600"></span> ${category.innerText}`;

        const gridWrapper = document.createElement('div');
        gridWrapper.className = "grid grid-cols-1 md:grid-cols-2 gap-6 w-full mb-10";
        category.parentNode.insertBefore(gridWrapper, category.nextSibling);

        let nextEl = gridWrapper.nextElementSibling;
        
        while (nextEl && nextEl.tagName !== 'H2') {
            if (nextEl.tagName === 'H3') {
                const question = nextEl;
                const faqCard = document.createElement('div');
                faqCard.className = "faq-card bg-white border border-zinc-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-md hover:border-amber-200 transition-all duration-300 h-fit";
                
                question.className = "flex justify-between items-center w-full p-6 cursor-pointer text-[13px] font-bold text-zinc-900 group";
                const originalText = question.innerText;
                question.innerHTML = `
                    <span class="pr-4 leading-relaxed">${originalText}</span>
                    <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center group-hover:bg-amber-100 transition-colors flex-none">
                        <svg class="w-4 h-4 transition-transform duration-500 arrow text-zinc-500 group-hover:text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </div>`;

                const answerWrapper = document.createElement('div');
                answerWrapper.className = "faq-answer max-h-0 overflow-hidden bg-zinc-50 border-t border-transparent transition-all duration-500 ease-in-out";
                
                const contentInner = document.createElement('div');
                contentInner.className = "p-6 text-zinc-600 text-sm leading-relaxed";

                let answerEl = question.nextElementSibling;
                while (answerEl && !['H2', 'H3'].includes(answerEl.tagName)) {
                    let tmp = answerEl;
                    answerEl = answerEl.nextElementSibling;
                    contentInner.appendChild(tmp);
                }

                answerWrapper.appendChild(contentInner);
                faqCard.appendChild(question);
                faqCard.appendChild(answerWrapper);
                gridWrapper.appendChild(faqCard);

                question.addEventListener('click', () => {
                    const isOpen = answerWrapper.style.maxHeight !== '0px' && answerWrapper.style.maxHeight !== '';
                    if (!isOpen) {
                        answerWrapper.style.maxHeight = answerWrapper.scrollHeight + "px";
                        answerWrapper.classList.add('border-zinc-200');
                        question.querySelector('.arrow').classList.add('rotate-180');
                        faqCard.classList.add('ring-2', 'ring-amber-500/10', 'border-amber-200');
                    } else {
                        answerWrapper.style.maxHeight = '0px';
                        answerWrapper.classList.remove('border-zinc-200');
                        question.querySelector('.arrow').classList.remove('rotate-180');
                        faqCard.classList.remove('ring-2', 'ring-amber-500/10', 'border-amber-200');
                    }
                });
                nextEl = gridWrapper.nextElementSibling;
            } else {
                nextEl = nextEl.nextElementSibling;
            }
        }
    });
});
</script>
</body>
</html>