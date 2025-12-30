<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sku',
        'brand',
        'model',
        'cost_price',
        'sale_price',
        'stock',
        'watts',
        'tech_specs',
        'is_active'
    ];

    protected $casts = [
        'tech_specs' => 'array', // Convierte el JSON a array PHP automáticamente
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function kits(): BelongsToMany
    {
        return $this->belongsToMany(Kit::class)->withPivot('quantity');
    }
}
