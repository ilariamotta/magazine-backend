<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $categories = [
        ['name' => 'Anime', 'slug' => 'anime', 'color' => '#ff4fa3'],
        ['name' => 'Manga', 'slug' => 'manga', 'color' => '#8b5cf6'],
        ['name' => 'Videogiochi', 'slug' => 'videogiochi', 'color' => '#00c8ff'],
        ['name' => 'J-Culture', 'slug' => 'j-culture', 'color' => '#ffd43b'],
        ['name' => 'Recensioni', 'slug' => 'recensioni', 'color' => '#2ee59d'],
        ['name' => 'Approfondimenti', 'slug' => 'approfondimenti', 'color' => '#ff8a2a'],
        ['name' => 'Eventi', 'slug' => 'eventi', 'color' => '#ff3366'],
        ['name' => 'Retrogaming', 'slug' => 'retrogaming', 'color' => '#00e5d4'],
        ['name' => 'Indie Games', 'slug' => 'indie-games', 'color' => '#a855f7'],
        ['name' => 'Otaku Life', 'slug' => 'otaku-life', 'color' => '#ffb703'],
    ];

    foreach($categories as $category) {
        $newCategory = new Category();
        $newCategory->name = $category["name"];
        $newCategory->slug = $category["slug"];
        $newCategory->color = $category["color"];
        $newCategory->save();
    }
    }
}
