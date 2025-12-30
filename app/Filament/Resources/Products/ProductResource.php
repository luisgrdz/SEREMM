<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// IMPORTANTE: Estas importaciones son necesarias para que Section, Grid, etc. funcionen
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\KeyValue;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    // Si 'heroicon-o-bolt' da error, asegúrate de que el paquete de iconos esté instalado. 
    // En Filament v3/v4 es el estándar.
    // Cambiamos el orden para que coincida exactamente con la clase base
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Inventario de Equipos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información General')
                    ->description('Datos básicos del equipo')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                
                                TextInput::make('sku')
                                    ->label('SKU / Código')
                                    ->unique(ignoreRecord: true)
                                    ->required(),

                                TextInput::make('brand')
                                    ->label('Marca')
                                    ->required(),

                                TextInput::make('model')
                                    ->label('Modelo')
                                    ->required(),
                            ]),

                        RichEditor::make('description')
                            ->label('Descripción para la Web')
                            ->columnSpanFull(),
                    ]),

                Section::make('Multimedia y Precios')
                    ->description('Costos y fotografía')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('purchase_price')
                                    ->label('Costo Interno')
                                    ->numeric()
                                    ->prefix('$'),

                                TextInput::make('sale_price')
                                    ->label('Precio Venta')
                                    ->numeric()
                                    ->required()
                                    ->prefix('$'),

                                FileUpload::make('image_path')
                                    ->label('Foto del Producto')
                                    ->image()
                                    ->directory('products'),
                            ]),
                    ]),

                Section::make('Especificaciones Técnicas')
                    ->schema([
                        KeyValue::make('tech_specs')
                            ->label('Ficha Técnica')
                            ->keyLabel('Parámetro (Ej: Watts)')
                            ->valueLabel('Valor (Ej: 550W)'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Foto')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable(),

                Tables\Columns\TextColumn::make('model')
                    ->label('Modelo')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Precio')
                    ->money('MXN'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}