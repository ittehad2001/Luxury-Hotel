<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Premium Deluxe',
                'base_price' => 12000.00,
                'description' => 'Luxurious room with premium amenities and stunning city views',
                'max_guests' => 4,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'size' => 800,
                'image_url' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'name' => 'Super Deluxe',
                'base_price' => 10000.00,
                'description' => 'Comfortable room with modern amenities and elegant decor',
                'max_guests' => 3,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => 600,
                'image_url' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'name' => 'Standard Deluxe',
                'base_price' => 8000.00,
                'description' => 'Standard room with essential amenities and cozy atmosphere',
                'max_guests' => 2,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => 400,
                'image_url' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
            ]
        ];

        foreach ($categories as $category) {
            \App\Models\RoomCategory::create($category);
        }
    }
}
