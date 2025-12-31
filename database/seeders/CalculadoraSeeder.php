<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class CalculadoraSeeder extends Seeder
{
    public function run(): void
    {
        // Factor Solar por defecto para Tamaulipas
        Setting::updateOrCreate(
            ['key' => 'solar_factor'],
            ['label' => 'Factor de Producción Solar', 'value' => 150]
        );

        // Lista de tarifas vacía o inicial
        Setting::updateOrCreate(
            ['key' => 'tarifas_energia'],
            [
                'label' => 'Tarifas CFE',
                'value' => [
                    ['nombre' => 'Tarifa DAC', 'precio' => 6.50],
                    ['nombre' => 'Tarifa 01', 'precio' => 3.20]
                ]
            ]
        );
    }
}