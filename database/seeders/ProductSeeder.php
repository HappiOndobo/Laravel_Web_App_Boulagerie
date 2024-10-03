<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'French Baguette',
            'description' => 'A classic French baguette with a crispy crust and soft interior.',
            'price' => 3.50,
            'image' => 'baguette.jpg',
        ]);

        Product::create([
            'name' => 'Sourdough Bread',
            'description' => 'Tangy artisanal sourdough bread with a chewy texture.',
            'price' => 5.00,
            'image' => 'sourdough.jpg',
        ]);
    }
}

