<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // 1. Logika Pemisahan Sesi (Kode Anda)
        if (request()->is('super-admin*')) {
            Config::set('session.cookie', 'rqpedia_admin_session');
            Config::set('session.path', '/super-admin'); 
        } else {
            Config::set('session.cookie', 'rqpedia_user_session');
            Config::set('session.path', '/');
        }

        // 2. View Composer untuk Data Settings
        // Kita gunakan '*' agar data ini tersedia di SEMUA file .blade.php
        View::composer('*', function ($view) {
            // Cek apakah tabel settings sudah ada di DB untuk menghindari error saat migrasi
            if (Schema::hasTable('settings')) {
                // Ambil data dan jadikan array: ['footer_copyright' => '...', 'faq_content' => '...']
                $site_settings = Setting::pluck('value', 'key')->toArray();
            } else {
                $site_settings = [];
            }
            
            $view->with('site_settings', $site_settings);
        });
    }
}