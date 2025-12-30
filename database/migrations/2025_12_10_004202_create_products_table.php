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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained(); // Relación con categoría
            $table->string('sku')->unique(); // Código de almacén
            $table->string('brand'); // Ej: Jinko, Canadian Solar, Growatt
            $table->string('model'); // Ej: Tiger Neo 72HL4

            // Datos Financieros
            $table->decimal('cost_price', 10, 2); // Costo proveedor
            $table->decimal('sale_price', 10, 2); // Precio público
            $table->integer('stock')->default(0);

            // Datos Técnicos Críticos (Para la calculadora solar)
            $table->integer('watts')->nullable(); // Vital para calcular producción
            $table->boolean('is_active')->default(true);

            // Especificaciones extra en JSON para no llenar la tabla de columnas vacías
            // Aquí guardaremos: eficiencia, voltaje, tipo de celda, garantías, etc.
            $table->json('tech_specs')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
