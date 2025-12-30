<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kit extends Model
{
    protected $fillable = ['name', 'description', 'base_price'];

    // Para obtener los productos del kit: $kit->products
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }

    // Función auxiliar para calcular precio real basado en componentes
    public function getCalculatedPriceAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->sale_price * $product->pivot->quantity;
        });
    }
}
