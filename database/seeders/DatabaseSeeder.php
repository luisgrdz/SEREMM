<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear Usuario Administrador para Filament
        // Esto te permite entrar al panel /admin de inmediato
        User::factory()->create([
            'name' => 'Admin SEREMM',
            'email' => 'admin@seremm.com',
            'password' => Hash::make('admin123'), // Cambia esta contraseña después
        ]);

        // 2. Crear Configuraciones Iniciales (WhatsApp)
        // Esto permite que el botón de la landing funcione desde el día 1
        Setting::create([
            'key' => 'whatsapp_number',
            'label' => 'Número de WhatsApp de Ventas',
            'value' => '5211234567890', // Formato internacional
        ]);

        // 3. Ejecutar los Seeders de Catálogo
        // Asegúrate de que estos archivos existan en database/seeders/
        $this->call([
            
            SolarSeeder::class,
            KitSeeder::class,
        ]);
    }
}
