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
        // --- 1. CREACIÓN DE CATEGORÍAS (Según tu imagen) ---
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
            $catModels[$cat] = Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }

        // --- 2. REGISTRO DE PRODUCTOS POR CATEGORÍA ---

        // PANELES SOLARES
        Product::create([
            'category_id' => $catModels['Paneles Solares']->id,
            'sku' => 'PAN-JKO-550B',
            'brand' => 'Jinko Solar',
            'model' => 'Tiger Neo N-Type 550W',
            'description' => 'Panel bifacial de alta eficiencia con tecnología N-Type.',
            'purchase_price' => 2400.00,
            'sale_price' => 3850.00,
            'stock' => 40,
            'wattage' => 550,
            'efficiency' => 21.33,
            'tech_type' => 'bifacial',
        ]);

        // INVERSORES
        Product::create([
            'category_id' => $catModels['Inversores y Microinversores']->id,
            'sku' => 'INV-GRO-6000',
            'brand' => 'Growatt',
            'model' => 'MIN 6000TL-X',
            'description' => 'Inversor monofásico ideal para sistemas residenciales.',
            'purchase_price' => 12500.00,
            'sale_price' => 18900.00,
            'stock' => 10,
            'phases' => 1,
            'max_dc_voltage' => 550,
        ]);

        // MONITOREO
        Product::create([
            'category_id' => $catModels['Monitoreo y Accesorios']->id,
            'sku' => 'MON-SHN-WIFI',
            'brand' => 'Shine',
            'model' => 'Shine WiFi-X',
            'description' => 'Datalogger USB para monitoreo remoto vía App.',
            'purchase_price' => 450.00,
            'sale_price' => 1200.00,
            'stock' => 25,
            'tech_specs' => ['connection' => 'WiFi', 'range' => '50m'],
        ]);

        // COMPONENTES ELÉCTRICOS (Protecciones)
        Product::create([
            'category_id' => $catModels['Componentes Eléctricos y Protecciones']->id,
            'sku' => 'PRO-DC-BREAKER-20',
            'brand' => 'Suntree',
            'model' => 'DC Breaker 2P 20A',
            'description' => 'Interruptor termomagnético para protección de strings DC.',
            'purchase_price' => 180.00,
            'sale_price' => 450.00,
            'stock' => 100,
            'amperage' => '20A',
            'nominal_voltage' => 1000,
        ]);

        // ESTRUCTURAS
        Product::create([
            'category_id' => $catModels['Estructuras y Montaje']->id,
            'sku' => 'EST-RIEL-420',
            'brand' => 'Everest',
            'model' => 'Riel de Aluminio 4.2m',
            'description' => 'Riel reforzado para montaje de 4 paneles estándar.',
            'purchase_price' => 850.00,
            'sale_price' => 1450.00,
            'stock' => 60,
            'unit' => 'metro',
            'tech_specs' => ['material' => 'Aluminio Anodizado', 'longitud' => '4.2m'],
        ]);

        // BATERÍAS
        Product::create([
            'category_id' => $catModels['Almacenamiento y Baterías']->id,
            'sku' => 'BAT-PYL-US5000',
            'brand' => 'Pylontech',
            'model' => 'US5000 4.8kWh',
            'description' => 'Batería de Litio Ferro-fosfato (LiFePO4) para autoconsumo.',
            'purchase_price' => 28000.00,
            'sale_price' => 42000.00,
            'stock' => 4,
            'capacity_kwh' => 4.80,
            'battery_voltage' => 48,
        ]);

        // BOMBAS SOLARES
        Product::create([
            'category_id' => $catModels['Bombas Solares']->id,
            'sku' => 'BOM-LOR-PS2',
            'brand' => 'Lorentz',
            'model' => 'PS2-150 Centrifugal',
            'description' => 'Sistema de bombeo solar sumergible de alta eficiencia.',
            'purchase_price' => 14000.00,
            'sale_price' => 19800.00,
            'stock' => 3,
            'max_flow_rate' => 2.5,
            'max_head' => 40,
        ]);

        // MANTENIMIENTO
        Product::create([
            'category_id' => $catModels['Mantenimiento y Servicios']->id,
            'sku' => 'SRV-MANT-PREV',
            'brand' => 'SEREMM',
            'model' => 'Limpieza y Revisión Preventiva',
            'description' => 'Servicio técnico de limpieza de paneles y reapriete de conexiones.',
            'purchase_price' => 200.00,
            'sale_price' => 1500.00,
            'stock' => 999, // Servicio infinito
            'unit' => 'servicio',
        ]);
    }
}
