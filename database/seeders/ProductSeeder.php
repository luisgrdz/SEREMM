<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Recuperamos IDs para asignar correctamente
        $catPaneles = Category::where('slug', 'paneles-solares')->first()->id;
        $catInversores = Category::where('slug', 'inversores')->first()->id;
        $catMicros = Category::where('slug', 'microinversores')->first()->id;
        $catEstructura = Category::where('slug', 'estructuras')->first()->id;

        $products = [
            // --- PANELES ---
            [
                'category_id' => $catPaneles,
                'sku' => 'JKM550M-72HL4',
                'brand' => 'Jinko Solar',
                'model' => 'Tiger Neo 550W',
                'cost_price' => 2800.00, // Precio ficticio en MXN
                'sale_price' => 3500.00,
                'stock' => 100,
                'watts' => 550,
                'tech_specs' => [
                    'technology' => 'Monocrystalline',
                    'efficiency' => '21.5%',
                    'dimensions' => '2278 x 1134 x 35 mm',
                    'weight' => '28kg',
                    'warranty' => '25 years'
                ]
            ],
            [
                'category_id' => $catPaneles,
                'sku' => 'CS7L-590MS',
                'brand' => 'Canadian Solar',
                'model' => 'HiKu7 590W',
                'cost_price' => 3100.00,
                'sale_price' => 3950.00,
                'stock' => 50,
                'watts' => 590,
                'tech_specs' => [
                    'technology' => 'Monocrystalline PERC',
                    'efficiency' => '21.0%',
                    'dimensions' => '2172 x 1303 x 35 mm',
                    'warranty' => '12 years product'
                ]
            ],

            // --- INVERSORES ---
            [
                'category_id' => $catInversores,
                'sku' => 'GROWATT-MIN-5000',
                'brand' => 'Growatt',
                'model' => 'MIN 5000TL-X',
                'cost_price' => 12000.00,
                'sale_price' => 16500.00,
                'stock' => 10,
                'watts' => 5000, // Soporta hasta 5kW nominal
                'tech_specs' => [
                    'type' => 'String Inverter',
                    'phases' => '2 (220V)',
                    'mppt_channels' => 2,
                    'wifi_module' => true
                ]
            ],
            [
                'category_id' => $catMicros,
                'sku' => 'APS-DS3-L',
                'brand' => 'APsystems',
                'model' => 'DS3-L',
                'cost_price' => 3500.00,
                'sale_price' => 4800.00,
                'stock' => 40,
                'watts' => 730, // Salida máxima
                'tech_specs' => [
                    'type' => 'Microinverter',
                    'modules_supported' => 2,
                    'monitoring' => 'ECU-R required'
                ]
            ],

            // --- ESTRUCTURA ---
            [
                'category_id' => $catEstructura,
                'sku' => 'RIEL-AL-4M',
                'brand' => 'Solfium',
                'model' => 'Riel de Aluminio 4m',
                'cost_price' => 800.00,
                'sale_price' => 1100.00,
                'stock' => 200,
                'watts' => null,
                'tech_specs' => [
                    'material' => 'Anodized Aluminum 6005-T5',
                    'length' => '4 meters'
                ]
            ],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}