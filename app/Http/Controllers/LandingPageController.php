<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema; 

class LandingPageController extends Controller
{
    public function index()
    {
        // 1. Obtenemos las categorías y sus productos con stock
        $categories = Category::with(['products' => function ($query) {
            $query->where('stock', '>', 0)->latest();
        }])
            ->has('products')
            ->get();

        // 2. Verificamos si la tabla existe antes de consultar
        $kits = collect();
        if (Schema::hasTable('kits')) {
            $kits = Kit::all();
        }
        // BUSCAMOS EL NÚMERO (Si no existe, ponemos uno por defecto)
        $whatsapp = \App\Models\Setting::where('key', 'whatsapp_number')->first()?->value ?? '5211234567890';

        // 3. Enviamos los datos a la vista
        return view('welcome', compact('categories', 'kits', 'whatsapp'));
    }
}
