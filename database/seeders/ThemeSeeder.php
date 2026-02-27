<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            // PAKET A (Basic) - Sesuai folder kamu
            ['name' => 'Rustic Brown', 'folder' => 'rustic-brown', 'price' => 50000],
            ['name' => 'Floral White', 'folder' => 'floral-white', 'price' => 50000],
            ['name' => 'Simple Minimalist', 'folder' => 'simple-minimalist', 'price' => 50000],
            ['name' => 'Modern Elegance', 'folder' => 'modern-elegance', 'price' => 50000],
            ['name' => 'Modern Emerald', 'folder' => 'modern-emerald', 'price' => 50000],

            // PAKET B (Premium) - Sesuai folder kamu
            
            ['name' => 'Soft Pastel Lavender', 'folder' => 'soft-pastel-lavender', 'price' => 100000],
            ['name' => 'Vintage Paper', 'folder' => 'vintage-paper', 'price' => 100000],
            ['name' => 'Nordic Forest', 'folder' => 'nordic-forest', 'price' => 100000],
            ['name' => 'Terracotta Warmth', 'folder' => 'terracotta-warmth', 'price' => 100000],
            ['name' => 'Minimalist Scandi', 'folder' => 'minimalist-scandi', 'price' => 100000],
            

            // PAKET C (Exclusive) - Sesuai folder kamu
            ['name' => 'Royal Gold Majesty', 'folder' => 'royal-gold-majesty', 'price' => 150000],
            ['name' => 'Midnight Dark Luxury', 'folder' => 'midnight-dark-luxury', 'price' => 150000],
            ['name' => 'Sakura Dream', 'folder' => 'sakura-dream', 'price' => 150000],
            ['name' => 'Ocean Breeze Blue', 'folder' => 'ocean-breeze-blue', 'price' => 150000],
            ['name' => 'Pearl Marble', 'folder' => 'pearl-marble', 'price' => 150000],
        ];

        foreach ($themes as $theme) {
            Theme::updateOrCreate(
                ['slug' => Str::slug($theme['name'])],
                [
                    'name'      => $theme['name'],
                    'thumbnail' => 'themes/' . $theme['folder'] . '.jpg', // Simpan thumbnail dengan nama folder
                    'view_path' => 'themes.' . $theme['folder'] . '.index', // Mengarah ke folder/index.blade.php
                    'price'     => $theme['price'],
                    'is_active' => true,
                ]
            );
        }
    }
}