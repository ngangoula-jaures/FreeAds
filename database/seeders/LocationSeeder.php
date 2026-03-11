<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = [
            ['ville' => 'Abidjan'],
            ['ville' => 'Yamoussoukro'],
            ['ville' => 'Bouaké'],
            ['ville' => 'Daloa'],
            ['ville' => 'Korhogo'],
            ['ville' => 'San-Pédro'],
            ['ville' => 'Man'],
            ['ville' => 'Gagnoa'],
            ['ville' => 'Abengourou'],
            ['ville' => 'Anyama'],
        ];

        foreach ($villes as $ville) {
        \App\Models\Location::create($ville);
    }
    }
}
