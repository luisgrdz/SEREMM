<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;


// FORM COMPONENTS (v3)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\KeyValue;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información General')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable(),

                                TextInput::make('sku')
                                    ->label('SKU / Código')
                                    ->required(),

                                TextInput::make('brand')
                                    ->label('Marca')
                                    ->required(),

                                TextInput::make('model')
                                    ->label('Modelo')
                                    ->required(),
                            ]),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                    ]),
                // Agrega aquí el resto de tus secciones (Multimedia, Precios, etc.)
            ]);
    }
}
