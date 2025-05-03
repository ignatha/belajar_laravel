<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1000)->create();

        for ($i=1; $i <= 100000; $i++) {
            \App\Models\Product::create([
                'user_id' => 1,
                'name' => 'Tes Produk',
                'price' => 100000,
                'stock' => 10,
                'tumbnail' => 'tumbnail/boneka-biru-55Gh8R.webp',
            ]);
        }
    }
}
