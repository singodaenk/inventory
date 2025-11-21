<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Buat kategori contoh
        $category1 = Category::create([
            'name' => 'Elektronik',
            'description' => 'Produk elektronik'
        ]);

        $category2 = Category::create([
            'name' => 'ATK',
            'description' => 'Alat Tulis Kantor'
        ]);

        $category3 = Category::create([
            'name' => 'Makanan & Minuman',
            'description' => 'Produk makanan dan minuman'
        ]);

        // Buat produk contoh
        Product::create([
            'code' => 'PRD001',
            'name' => 'Laptop ASUS',
            'category_id' => $category1->id,
            'description' => 'Laptop ASUS Core i5',
            'price' => 8000000,
            'stock' => 10,
            'min_stock' => 2,
            'unit' => 'unit'
        ]);

        Product::create([
            'code' => 'PRD002',
            'name' => 'Mouse Wireless',
            'category_id' => $category1->id,
            'description' => 'Mouse wireless 2.4GHz',
            'price' => 150000,
            'stock' => 25,
            'min_stock' => 5,
            'unit' => 'pcs'
        ]);

        Product::create([
            'code' => 'PRD003',
            'name' => 'Buku Tulis',
            'category_id' => $category2->id,
            'description' => 'Buku tulis 58 halaman',
            'price' => 5000,
            'stock' => 100,
            'min_stock' => 20,
            'unit' => 'pcs'
        ]);

        Product::create([
            'code' => 'PRD004',
            'name' => 'Pulpen Pilot',
            'category_id' => $category2->id,
            'description' => 'Pulpen pilot hitam',
            'price' => 3000,
            'stock' => 50,
            'min_stock' => 10,
            'unit' => 'pcs'
        ]);

        Product::create([
            'code' => 'PRD005',
            'name' => 'Kopi Sachet',
            'category_id' => $category3->id,
            'description' => 'Kopi sachet 20gr',
            'price' => 2000,
            'stock' => 200,
            'min_stock' => 50,
            'unit' => 'sachet'
        ]);

        Product::create([
            'code' => 'PRD006',
            'name' => 'Air Mineral',
            'category_id' => $category3->id,
            'description' => 'Air mineral 600ml',
            'price' => 3000,
            'stock' => 150,
            'min_stock' => 30,
            'unit' => 'botol'
        ]);
    }
}