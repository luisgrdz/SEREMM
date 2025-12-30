<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\kit;

use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index()
    {
        // Buscamos los productos (esto ya lo tenías)
        $products = \App\Models\Product::where('stock', '>', 0)->latest()->get();

        // Buscamos los kits (paquetes)
        // Si aún no tienes esta tabla, usa la Opción 2 de abajo.
        $kits = \App\Models\Kit::with('products')->get();

        return view('welcome', compact('products', 'kits'));
    }
}