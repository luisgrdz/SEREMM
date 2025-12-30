<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kit;
use App\Models\Product;

class KitSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos el Kit "Cabecera"
        $kit = Kit::create([
            'name' => 'Kit Residencial 3.3kW Premium',
            'description' => 'Sistema ideal para casas medianas con tarifa DAC. Incluye paneles Tier 1 y estructura.',
            'base_price' => 0, // Lo calcularemos dinámicamente o lo dejaremos en 0 para que se sume solo
        ]);

        // Buscamos productos para meter al kit
        // Nota: En producción usarías IDs fijos o SKUs, aquí buscamos por modelo
        $panel = Product::where('sku', 'JKM550M-72HL4')->first();
        $inversor = Product::where('sku', 'GROWATT-MIN-5000')->first();
        $riel = Product::where('sku', 'RIEL-AL-4M')->first();

        if ($panel && $inversor) {
            // Llenamos la tabla pivote (kit_product)
            $kit->products()->attach([
                $panel->id => ['quantity' => 6], // 6 Paneles de 550W = 3300W
                $inversor->id => ['quantity' => 1], // 1 Inversor Central
                $riel->id => ['quantity' => 4], // 4 Rieles
            ]);

            // Opcional: Actualizar el precio base del kit sumando los componentes
            $total = ($panel->sale_price * 6) + ($inversor->sale_price * 1) + ($riel->sale_price * 4);
            $kit->update(['base_price' => $total]);
        }
    }
}