<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Una categoría tiene muchos productos.
     */
    public function products(): HasMany
    {
        // Esto busca la columna 'category_id' en la tabla 'products'
        return $this->hasMany(Product::class);
    }
}
