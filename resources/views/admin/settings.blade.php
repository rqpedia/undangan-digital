@extends('layouts.super-admin')

@section('title', 'Site Settings')

@section('content')
    <div class="max-w-4xl">
        {{-- Page Header --}}
        <div class="mb-10">
            <h2 class="text-2xl font-black tracking-tighter uppercase text-zinc-900">Site Settings</h2>
            <p class="text-zinc-500 text-sm italic">Konfigurasi konten statis untuk Kebijakan Privasi, FAQ, dan Footer.</p>
        </div>

        {{-- Alert Success --}}
        @if (session('success'))
            <div
                class="mb-8 p-5 bg-emerald-50 border border-emerald-100 rounded-[2rem] flex items-center gap-4 animate-in fade-in slide-in-from-top-4 duration-500">
                <div
                    class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg shadow-emerald-200 flex-none">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <p class="text-emerald-700 text-xs font-black uppercase tracking-widest">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('super.settings.update') }}" method="POST" id="settingsForm" class="space-y-8">
            @csrf

            {{-- 1. Brand & Footer Section --}}
            <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-zinc-900 rounded-xl flex items-center justify-center">
                        <i data-lucide="layout" class="w-4 h-4 text-white"></i>
                    </div>
                    <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-900">Branding & Footer</label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Deskripsi Footer --}}
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Deskripsi
                            Footer</label>
                        <textarea name="footer_description" rows="3"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            placeholder="Deskripsi singkat mengenai layanan Anda...">{{ $settings['footer_description'] ?? '' }}</textarea>
                    </div>

                    {{-- Copyright --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Hak Cipta
                            (Copyright)</label>
                        <input type="text" name="footer_copyright"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['footer_copyright'] ?? '© 2026 RQPEDIA.ID' }}">
                    </div>

                    {{-- Office Location --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Lokasi
                            Kantor</label>
                        <input type="text" name="office_location"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['office_location'] ?? '' }}" placeholder="Contoh: Bengkulu, Indonesia">
                    </div>
                </div>
            </div>

            {{-- 2. Contact & Social Media --}}
            <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-emerald-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="phone" class="w-4 h-4 text-white"></i>
                    </div>
                    <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-500">Kontak & Media
                        Sosial</label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- WhatsApp --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">WhatsApp
                            Number</label>
                        <input type="text" name="contact_whatsapp"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['contact_whatsapp'] ?? '' }}" placeholder="628xxxxxxxx">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Email
                            Support</label>
                        <input type="email" name="contact_email"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['contact_email'] ?? '' }}" placeholder="support@domain.id">
                    </div>

                    {{-- Instagram --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Instagram
                            URL</label>
                        <input type="url" name="social_instagram"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['social_instagram'] ?? '' }}" placeholder="https://instagram.com/username">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Facebook
                            URL</label>
                        <input type="url" name="social_facebook"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['social_facebook'] ?? '' }}" placeholder="https://facebook.com/username">
                    </div>
                    {{-- Website Link --}}
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2 block">Official
                            Website URL</label>
                        <input type="url" name="social_website"
                            class="w-full px-6 py-4 bg-zinc-50 border-2 border-transparent focus:border-zinc-900 focus:bg-white rounded-2xl transition-all outline-none font-medium text-sm"
                            value="{{ $settings['social_website'] ?? '' }}" placeholder="https://www.namawebsite.id">
                    </div>
                </div>
            </div>

            {{-- 3. Privacy Policy Section --}}
            <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm">
                <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 block mb-4">Kebijakan Privasi
                    (Privacy Policy)</label>
                <div id="editor-policy" style="height: 300px;">
                    {!! $settings['privacy_policy'] ?? '' !!}
                </div>
                <input type="hidden" name="privacy_policy" id="privacy_policy_input">
            </div>

            {{-- 4. FAQ Section --}}
            <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm mt-6">
                <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 block mb-4">Konten FAQ</label>
                <div id="editor-faq" style="height: 300px;">
                    {!! $settings['faq_content'] ?? '' !!}
                </div>
                <input type="hidden" name="faq_content" id="faq_content_input">
            </div>

            {{-- Action Button --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="group relative bg-zinc-900 text-white px-12 py-5 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-500 transition-all duration-500 shadow-xl hover:shadow-emerald-200 active:scale-95">
                    <span class="flex items-center gap-3">
                        <i data-lucide="save" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                        Simpan Perubahan
                    </span>
                </button>
            </div>
        </form>
    </div>

    {{-- Quill CSS --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>
        .ql-container {
            border-bottom-left-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            background-color: #f9fafb;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
        }

        .ql-toolbar {
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            background-color: white;
            border-color: #f3f4f6 !important;
            padding: 12px !important;
        }

        .ql-container.ql-snow {
            border-color: #f3f4f6 !important;
        }
    </style>

    {{-- JS Quill --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Opsi Toolbar
            var toolbarOptions = [
                [{
                    'header': [1, 2, 3, false]
                }], // Menambahkan H1, H2, H3
                ['bold', 'italic', 'underline', 'strike'], // Menambah strike-through
                ['blockquote', 'code-block'], // Menambah blockquote
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                ['link', 'clean'] // Menambah link dan hapus format
            ];

            // 2. Inisialisasi Quill Editor
            var quillPolicy = new Quill('#editor-policy', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });

            var quillFaq = new Quill('#editor-faq', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });

            // 3. Proses Sinkronisasi sebelum Submit
            var form = document.getElementById('settingsForm');

            form.onsubmit = function() {
                // Ambil element input hidden
                var policyInput = document.getElementById('privacy_policy_input');
                var faqInput = document.getElementById('faq_content_input');

                // Ambil konten HTML dari root Quill
                var policyContent = quillPolicy.root.innerHTML;
                var faqContent = quillFaq.root.innerHTML;

                // Validasi: Jika editor kosong (hanya berisi break line), kirim string kosong
                policyInput.value = (policyContent === '<p><br></p>') ? '' : policyContent;
                faqInput.value = (faqContent === '<p><br></p>') ? '' : faqContent;

                // Log untuk pengecekan di Console (F12)
                console.log('Data disinkronkan. Mengirim form...');

                return true;
            };
        });
    </script>
@endsection
