<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Japanese Kare Ramen',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
                'bestseller' => true,
            ],
            [
                'name' => 'Chicken Katsu Dry Ramen',
                'price' => 28000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Japanese Tori Paitan Ramen',
                'price' => 32000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Kare Dry Ramen',
                'price' => 30000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Black Pepper Beef Rice Bowl',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Karage Dry Ramen',
                'price' => 30000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Doriyaki Rice',
                'price' => 36000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Kampung Style Fried Rice',
                'price' => 35000,
                'kategori_id' => 1,
                'image' => null,
            ],
            [
                'name' => 'Seafood Fried Rice',
                'price' => 35000,
                'kategori_id' => 1,
                'image' => null,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
