<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
        ['name' => 'Électronique', 'slug' => 'electronique'],
        ['name' => 'Véhicules', 'slug' => 'vehicules'],
        ['name' => 'Immobilier', 'slug' => 'immobilier'],
        ['name' => 'Mode', 'slug' => 'mode'],
        ['name' => 'Maison & Jardin', 'slug' => 'maison-jardin'],
        ['name' => 'Loisirs', 'slug' => 'loisirs'],
    ];

    foreach ($categories as $category) {
        \App\Models\Category::create($category);
    }
    }
}
