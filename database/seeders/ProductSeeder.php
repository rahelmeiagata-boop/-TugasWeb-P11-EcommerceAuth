<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'description' => 'Perangkat elektronik dan gadget.'],
            ['name' => 'Fashion', 'description' => 'Pakaian dan perlengkapan fashion.'],
            ['name' => 'Aksesoris', 'description' => 'Aksesoris kebutuhan sehari-hari.'],
            ['name' => 'Peralatan Rumah', 'description' => 'Peralatan rumah tangga.'],
            ['name' => 'Olahraga', 'description' => 'Perlengkapan olahraga.'],
            ['name' => 'Kecantikan', 'description' => 'Produk perawatan dan kecantikan.'],
            ['name' => 'Buku', 'description' => 'Buku dan alat tulis.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }

        $categoryIds = Category::pluck('id')->all();

        Product::factory()
            ->count(50)
            ->create()
            ->each(function (Product $product) use ($categoryIds) {
                $product->update([
                    'category_id' => fake()->randomElement($categoryIds),
                ]);
            });
    }
}