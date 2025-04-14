<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShopItem;

class ProductSeeder extends Seeder
{
    public function run()
    {
        ShopItem::create([
            'name' => 'Coffee Beans',
            'price' => 500,
            'stock' => 100,
            'description' => 'Fresh roasted coffee beans.',
            'image' => 'public/images/beans.jpg',
        ]);

        ShopItem::create([
            'name' => 'Coffee Mug',
            'price' => 150,
            'stock' => 50,
            'description' => 'Stylish ceramic mug.',
            'image' => 'products/coffee_mug.jpg',
        ]);

        ShopItem::create([
            'name' => 'Organic Fertilizer',
            'price' => 300,
            'stock' => 75,
            'description' => 'Eco-friendly fertilizer.',
            'image' => 'products/fertilizer.jpg',
        ]);

        ShopItem::create([
            'name' => 'Coffee Seedlings',
            'price' => 100,
            'stock' => 200,
            'description' => 'Healthy seedlings ready to plant.',
            'image' => 'products/seedlings.jpg',
        ]);
    }
}
