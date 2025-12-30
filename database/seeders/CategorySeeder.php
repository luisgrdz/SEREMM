<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Paneles Solares', 'slug' => 'paneles-solares'],
            ['name' => 'Inversores', 'slug' => 'inversores'],
            ['name' => 'Microinversores', 'slug' => 'microinversores'],
            ['name' => 'Estructura de Montaje', 'slug' => 'estructuras'],
            ['name' => 'Baterías', 'slug' => 'baterias'],
            ['name' => 'Material Eléctrico', 'slug' => 'material-electrico'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}