<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos los kits para mostrarlos en la sección de ofertas
        // Usamos 'with' para saber qué productos traen y calcular precios si es necesario
        $kits = Kit::with('products')->take(3)->get();

        return view('welcome', compact('kits'));
    }
}
