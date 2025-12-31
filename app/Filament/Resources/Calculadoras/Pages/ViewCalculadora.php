<?php

namespace App\Filament\Resources\Calculadoras\Pages;

use App\Filament\Resources\Calculadoras\CalculadoraResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCalculadora extends ViewRecord
{
    protected static string $resource = CalculadoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
