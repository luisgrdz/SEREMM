<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Schemas\Schema;
// IMPORTANTE: Section debe venir de Schemas para ser compatible con este contenedor
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Parámetros de la Calculadora Solar')
                    ->description('Configura los valores base para los cálculos de ahorro.')
                    ->schema([
                        TextInput::make('value')
                            ->label(fn($record) => $record?->key === 'kwh_price' ? 'Precio promedio por kWh ($)' : 'Factor de Producción (Tamaulipas)')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }
}
