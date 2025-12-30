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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            // --- Datos Básicos Comunes ---
            $table->string('sku')->unique();
            $table->string('brand')->nullable();
            $table->string('model');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('unit')->default('pieza'); // pieza, metro, kit, servicio

            // --- Finanzas e Inventario ---
            $table->decimal('purchase_price', 12, 2)->default(0); // Tu costo
            $table->decimal('sale_price', 12, 2)->default(0);     // Precio al cliente
            $table->integer('stock')->default(0);

            // --- Especificaciones Técnicas por Categoría ---

            // 1. Paneles Solares
            $table->integer('wattage')->nullable();
            $table->decimal('efficiency', 5, 2)->nullable();
            $table->string('tech_type')->nullable(); // Mono-PERC, Bifacial

            // 2. Inversores y Protecciones Eléctricas
            $table->integer('phases')->nullable();      // 1, 2, 3 fases
            $table->integer('max_dc_voltage')->nullable();
            $table->integer('nominal_voltage')->nullable(); // 110V, 220V, 440V
            $table->string('amperage')->nullable();     // Para Breakers (ej. 20A)
            $table->string('caliber')->nullable();      // Para Cables (ej. 10 AWG)

            // 3. Almacenamiento y Baterías (NUEVO)
            $table->decimal('capacity_kwh', 8, 2)->nullable(); // Capacidad en kWh
            $table->integer('capacity_ah')->nullable();        // Capacidad en Ah
            $table->integer('battery_voltage')->nullable();    // 12V, 24V, 48V

            // 4. Bombas Solares
            $table->decimal('max_flow_rate', 8, 2)->nullable(); // L/min o m3/h
            $table->decimal('max_head', 8, 2)->nullable();      // Altura máxima en metros

            // --- Campo de flexibilidad total ---
            $table->json('tech_specs')->nullable(); // Para accesorios de monitoreo o montajes

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
