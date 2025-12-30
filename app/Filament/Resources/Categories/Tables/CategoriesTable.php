<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn; // IMPORTANTE: Importar TextColumn

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Agregamos la columna del nombre
                TextColumn::make('name')
                    ->label('Nombre de la Categoría')
                    ->searchable()
                    ->sortable(),

                // Opcional: Mostrar el slug
                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color('gray'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
