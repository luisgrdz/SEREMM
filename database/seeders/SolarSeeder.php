<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SolarSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | 1. CATEGORÍAS
        |--------------------------------------------------------------------------
        */
        $categories = [
            'Paneles Solares',
            'Inversores y Microinversores',
            'Monitoreo y Accesorios',
            'Componentes Eléctricos y Protecciones',
            'Estructuras y Montaje',
            'Almacenamiento y Baterías',
            'Bombas Solares',
            'Mantenimiento y Servicios',
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[$cat] = Category::firstOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 2. PANELES SOLARES (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Paneles Solares']->id,
                'sku' => "PAN-JKO-55{$i}",
                'brand' => 'Jinko Solar',
                'model' => "Tiger Neo {$i} 550W",
                'description' => 'Panel solar de alta eficiencia con tecnología N-Type.',
                'purchase_price' => 2300 + ($i * 50),
                'sale_price' => 3600 + ($i * 100),
                'stock' => 30 + $i,
                'wattage' => 550,
                'efficiency' => 21.2,
                'tech_type' => 'monofacial',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 3. INVERSORES (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Inversores y Microinversores']->id,
                'sku' => "INV-GRO-60{$i}",
                'brand' => 'Growatt',
                'model' => "MIN {$i}000TL-X",
                'description' => 'Inversor monofásico para sistemas residenciales.',
                'purchase_price' => 11000 + ($i * 300),
                'sale_price' => 17000 + ($i * 500),
                'stock' => 8 + $i,
                'phases' => 1,
                'max_dc_voltage' => 550,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 4. MONITOREO (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Monitoreo y Accesorios']->id,
                'sku' => "MON-WIFI-{$i}",
                'brand' => 'Shine',
                'model' => "WiFi Logger {$i}",
                'description' => 'Dispositivo de monitoreo remoto para inversores.',
                'purchase_price' => 350 + ($i * 20),
                'sale_price' => 950 + ($i * 50),
                'stock' => 20 + $i,
                'tech_specs' => [
                    'conexion' => 'WiFi',
                    'alcance' => '50m',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 5. COMPONENTES ELÉCTRICOS (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Componentes Eléctricos y Protecciones']->id,
                'sku' => "PRO-DC-{$i}0A",
                'brand' => 'Suntree',
                'model' => "Breaker DC {$i}0A",
                'description' => 'Protección termomagnética para corriente directa.',
                'purchase_price' => 150 + ($i * 15),
                'sale_price' => 400 + ($i * 40),
                'stock' => 80 + ($i * 5),
                'amperage' => "{$i}0A",
                'nominal_voltage' => 1000,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 6. ESTRUCTURAS (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Estructuras y Montaje']->id,
                'sku' => "EST-RIEL-{$i}",
                'brand' => 'Everest',
                'model' => "Riel Aluminio {$i}.2m",
                'description' => 'Riel de aluminio para montaje de paneles solares.',
                'purchase_price' => 700 + ($i * 50),
                'sale_price' => 1200 + ($i * 80),
                'stock' => 40 + $i,
                'unit' => 'metro',
                'tech_specs' => [
                    'material' => 'Aluminio',
                    'longitud' => "{$i}.2m",
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 7. BATERÍAS (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Almacenamiento y Baterías']->id,
                'sku' => "BAT-LFP-{$i}",
                'brand' => 'Pylontech',
                'model' => "US{$i}000",
                'description' => 'Batería LiFePO4 para sistemas solares.',
                'purchase_price' => 25000 + ($i * 1500),
                'sale_price' => 38000 + ($i * 2000),
                'stock' => 5,
                'capacity_kwh' => 4 + ($i * 0.5),
                'battery_voltage' => 48,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 8. BOMBAS SOLARES (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Bombas Solares']->id,
                'sku' => "BOM-SOL-{$i}",
                'brand' => 'Lorentz',
                'model' => "PS2-{$i}50",
                'description' => 'Bomba solar para riego y abastecimiento.',
                'purchase_price' => 12000 + ($i * 1000),
                'sale_price' => 18000 + ($i * 1500),
                'stock' => 2,
                'max_flow_rate' => 2 + ($i * 0.2),
                'max_head' => 30 + ($i * 3),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 9. MANTENIMIENTO Y SERVICIOS (10)
        |--------------------------------------------------------------------------
        */
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' => $catModels['Mantenimiento y Servicios']->id,
                'sku' => "SRV-MANT-{$i}",
                'brand' => 'SEREMM',
                'model' => "Servicio Solar {$i}",
                'description' => 'Servicio técnico para sistemas fotovoltaicos.',
                'purchase_price' => 200,
                'sale_price' => 1200 + ($i * 200),
                'stock' => 999,
                'unit' => 'servicio',
            ]);
        }
    }
}
