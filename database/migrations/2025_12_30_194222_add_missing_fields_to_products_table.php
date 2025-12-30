<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Solo agrega 'stock' si NO existe
            if (!Schema::hasColumn('products', 'stock')) {
                $table->integer('stock')->default(0);
            }

            // Solo agrega 'price' si NO existe
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2)->default(0);
            }

            // Solo agrega 'brand' si NO existe (aquí es donde fallaba)
            if (!Schema::hasColumn('products', 'brand')) {
                $table->string('brand')->nullable();
            }

            // Solo agrega 'wattage' si NO existe
            if (!Schema::hasColumn('products', 'wattage')) {
                $table->integer('wattage')->nullable();
            }

            // Solo agrega 'tech_type' si NO existe
            if (!Schema::hasColumn('products', 'tech_type')) {
                $table->string('tech_type')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['stock', 'price', 'brand', 'wattage', 'tech_type']);
        });
    }
};
