<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with initial coffee shop data.
     */
    public function run(): void
    {
        // 1. Akun Admin Default
        User::firstOrCreate(
            ['email' => 'admin@coffeebreak.id'],
            [
                'name' => 'Barista Admin',
                'password' => bcrypt('password123'),
            ]
        );

        // 2. Kategori Menu Kopi
        $espressoCategory = Category::firstOrCreate(
            ['slug' => 'espresso-based'],
            ['name' => 'Espresso Based']
        );

        $blackCategory = Category::firstOrCreate(
            ['slug' => 'black-coffee'],
            ['name' => 'Black Coffee']
        );

        $signatureCategory = Category::firstOrCreate(
            ['slug' => 'signature-blend'],
            ['name' => 'Signature Blend']
        );


        // 3. Menu Kopi Unggulan
        $products = [
            [
                'nama' => 'Caramel Cappuccino',
                'slug' => 'caramel-cappuccino',
                'category_id' => $espressoCategory->id,
                'deskripsi' => 'Kopi cappuccino dengan sentuhan karamel manis gurih dan buih susu lembut.',
                'harga' => 'Rp 25.000',
                'harga_raw' => 25000,
                'gambar' => 'assets/img-coffe (2).jpg',
                'delay' => '1000',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'nama' => 'Classic Espresso',
                'slug' => 'classic-espresso',
                'category_id' => $espressoCategory->id,
                'deskripsi' => 'Ekstraksi kopi murni dengan aroma pekat, crema keemasan tebal, dan cita rasa autentik.',
                'harga' => 'Rp 20.000',
                'harga_raw' => 20000,
                'gambar' => 'assets/img-coffe (3).jpg',
                'delay' => '1200',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'nama' => 'Americano Klasik',
                'slug' => 'americano-klasik',
                'category_id' => $blackCategory->id,
                'deskripsi' => 'Paduan espresso ganda dan air mineral panas dengan body ringan yang menyegarkan.',
                'harga' => 'Rp 18.000',
                'harga_raw' => 18000,
                'gambar' => 'assets/img-coffe (4).jpg',
                'delay' => '1400',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'nama' => 'Latte Macchiato Signature',
                'slug' => 'latte-macchiato-signature',
                'category_id' => $signatureCategory->id,
                'deskripsi' => 'Susu kukus berlayer espresso pekat dengan buih lembut di atasnya.',
                'harga' => 'Rp 28.000',
                'harga_raw' => 28000,
                'gambar' => 'assets/img-coffe (2).jpg',
                'delay' => '1600',
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($products as $item) {
            Product::firstOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}