<?php

namespace App\Filament\Resources\Calculadoras\Pages;

use App\Filament\Resources\Calculadoras\CalculadoraResource;
use Filament\Resources\Pages\EditRecord;

class EditCalculadora extends EditRecord
{
    protected static string $resource = CalculadoraResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $key = $this->record->key; // ✅ correcto

        if ($key === 'solar_factor') {
            $data['solar_factor_value'] = $this->record->value;
        }

        if ($key === 'tarifas_energia') {
            $data['tarifas'] = $this->record->value;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $key = $this->record->key ?? $data['key'] ?? null;

        if ($key === 'solar_factor') {
            $data['value'] = $data['solar_factor_value'];
        }

        if ($key === 'tarifas_energia') {
            $data['value'] = $data['tarifas'];
        }

        unset($data['solar_factor_value'], $data['tarifas']);

        return $data;
    }
}
