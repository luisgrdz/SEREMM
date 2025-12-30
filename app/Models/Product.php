<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sku',
        'brand',
        'model', // Nota: si en tu tabla el nombre es 'name', cámbialo aquí y en el Form
        'description',
        'wattage',
        'efficiency',
        'tech_type',
        'price',
        'stock',
        'image_path'
    ];

    // Crucial para que Filament maneje el JSON como un array de PHP
    protected $casts = [
        'tech_specs' => 'array',
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}