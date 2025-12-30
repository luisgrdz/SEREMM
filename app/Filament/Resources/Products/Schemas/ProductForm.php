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

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. INFORMACIÓN GENERAL (Lo que ya tenías)
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
                            ->label('Descripción del Producto')
                            ->columnSpanFull(),
                    ]),

                // 2. ESPECIFICACIONES TÉCNICAS (NUEVO: Para Paneles Solares)
                Section::make('Especificaciones Solares')
                    ->description('Datos técnicos vitales para el cálculo de ingeniería')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('wattage')
                                    ->label('Potencia (Watts)')
                                    ->numeric()
                                    ->suffix('W')
                                    ->required(), // Esencial para la landing

                                TextInput::make('efficiency')
                                    ->label('Eficiencia (%)')
                                    ->numeric()
                                    ->step(0.01)
                                    ->suffix('%'),

                                Select::make('tech_type')
                                    ->label('Tecnología')
                                    ->options([
                                        'mono_perc' => 'Mono-PERC',
                                        'bifacial' => 'Bifacial',
                                        'policristalino' => 'Policristalino',
                                    ])
                                    ->required(),
                            ]),
                    ]),

                // 3. INVENTARIO Y COSTOS (NUEVO: Para que funcione la Landing)
                Section::make('Inventario y Costos')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('price')
                                    ->label('Precio de Venta')
                                    ->numeric()
                                    ->prefix('$')
                                    ->required(),

                                TextInput::make('stock')
                                    ->label('Existencias Actuales')
                                    ->numeric()
                                    ->default(1) // Le ponemos 1 para que aparezca en la landing por defecto
                                    ->required(),
                            ]),
                    ]),

                // 4. MULTIMEDIA
                Section::make('Multimedia')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Imagen del Producto')
                            ->image()
                            ->directory('products')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
