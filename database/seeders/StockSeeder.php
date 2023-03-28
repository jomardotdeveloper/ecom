<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [];

        foreach(Product::all() as $product) {
            $stocks[] = [
                'product_id' => $product->id,
                'quantity' => 10,
                'is_validated' => true,
                'is_return' => false
            ];
        }

        foreach ($stocks as $stock) {
            \App\Models\Stock::create($stock);
        }
    }
}
