<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kit;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LandingPageController extends Controller
{
    public function index()
    {
        // 1. Categorías y Productos
        $categories = Category::with(['products' => function ($query) {
            $query->where('stock', '>', 0)->latest();
        }])->has('products')->get();

        // 2. Kits
        $kits = collect();
        if (Schema::hasTable('kits')) {
            $kits = Kit::all();
        }

        // 3. Configuraciones (WhatsApp, Factor Solar, Tarifas)
        $settings = Setting::pluck('value', 'key');

        // 4. "Llenar Categorías": Buscamos la potencia de referencia de tus paneles reales
        $panelCategory = $categories->where('slug', 'paneles-solares')->first();
        $referenceWattage = $panelCategory?->products->first()?->wattage ?? 550;

        $settings = \App\Models\Setting::pluck('value', 'key');

        return view('welcome', compact('categories', 'kits'))->with([
            'whatsapp' => $settings['whatsapp_number'] ?? '521...',
            'solar_factor' => $settings['solar_factor'] ?? 150,
            'tarifas' => $settings['tarifas_energia'] ?? [],
        ]);
    }
}
