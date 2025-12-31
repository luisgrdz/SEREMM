<?php

namespace App\Filament\Resources\Calculadoras\Pages;

use App\Filament\Resources\Calculadoras\CalculadoraResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCalculadora extends CreateRecord
{
    protected static string $resource = CalculadoraResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['key'] === 'solar_factor') {
            $data['value'] = $data['solar_factor_value'];
        }

        if ($data['key'] === 'tarifas_energia') {
            $data['value'] = $data['tarifas'];
        }

        unset($data['solar_factor_value'], $data['tarifas']);

        return $data;
    }
}
