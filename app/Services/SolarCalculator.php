<?php

namespace App\Services;

use App\Models\Product;

class SolarCalculator
{
    // Horas Sol Pico promedio en México (Norte/Centro)
    const HSP = 5.2; 
    // Eficiencia del sistema (pérdidas por temperatura, cableado, inversor)
    const EFFICIENCY_FACTOR = 0.80; 
    // Precio promedio kWh en tarifa DAC (Alto Consumo) para estimación
    const DAC_PRICE = 6.50; 

    public function calculate($paymentAmount, $period = 'bimonthly')
    {
        // 1. Estimar consumo en kWh basado en lo que paga (Ingeniería inversa básica)
        // Si paga $3,000, asumimos que está en tarifa cara o saliendo del subsidio.
        $estimatedKwh = $paymentAmount / self::DAC_PRICE;

        // 2. Calcular consumo diario
        $days = ($period === 'bimonthly') ? 60 : 30;
        $dailyConsumption = $estimatedKwh / $days;

        // 3. Obtener el panel principal (el que tenga más stock o sea el estándar)
        // Usamos el Jinko 550W que creamos en el seeder
        $panel = Product::where('watts', '>', 500)->first();
        
        if (!$panel) {
            return null; // Error si no hay paneles en BD
        }

        // 4. Fórmula Fotovoltaica:
        // Paneles = Energía_Necesaria / (Potencia_Panel * HSP * Eficiencia)
        $panelOutputDaily = ($panel->watts / 1000) * self::HSP * self::EFFICIENCY_FACTOR;
        $panelsNeeded = ceil($dailyConsumption / $panelOutputDaily);

        // Ajuste mínimo: Un sistema de menos de 2 paneles suele usar microinversores,
        // pero para sistemas centrales mínimo 4. Dejemos el cálculo puro.
        $systemSizeKw = $panelsNeeded * ($panel->watts / 1000);

        return [
            'panels_count' => $panelsNeeded,
            'panel_model' => $panel->brand . ' ' . $panel->model,
            'system_size_kw' => number_format($systemSizeKw, 2),
            'estimated_generation_bimonthly' => number_format($panelsNeeded * $panelOutputDaily * 60, 0),
            'roi_years' => 3.5, // Promedio estándar
            'co2_saved' => number_format($systemSizeKw * 0.5 * 365, 0) // Toneladas aprox
        ];
    }
}