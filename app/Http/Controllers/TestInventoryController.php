<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kit;
use Illuminate\Http\Request;

class TestInventoryController extends Controller
{
    public function index()
    {
        // Traemos productos con su categoría
        $products = Product::with('category')->get();

        // Traemos kits con sus productos relacionados (y el dato de la tabla pivote 'quantity')
        $kits = Kit::with('products')->get();

        return view('index', compact('products', 'kits'));
    }
}