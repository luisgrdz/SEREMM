<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestInventoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Services\SolarCalculator;
use App\Http\Controllers\LandingPageController;


Route::get('/', [LandingPageController::class, 'index'])->name('landing');
// Ruta API simple para la calculadora
Route::post('/api/calculate-solar', function (Request $request) {
    $calculator = new SolarCalculator();
    $result = $calculator->calculate($request->input('payment'));
    return response()->json($result);
})->name('api.calculate');
Route::get('/test', [TestInventoryController::class, 'index']);

