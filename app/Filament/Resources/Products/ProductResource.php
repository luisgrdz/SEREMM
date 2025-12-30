<?php

namespace App\Filament\Resources\Products; // Namespace corregido según la carpeta

use App\Filament\Resources\Products\Pages;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; // v4 usa Schema
use Filament\Tables;
use Filament\Tables\Table;

// IMPORTACIONES DE ACCIONES (Esto resuelve tu error)
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

// COMPONENTES DE ESQUEMA
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;


// FORM COMPONENTS (v3)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\KeyValue;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Inventario de Equipos';

    // Firma corregida para Filament v4
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([ // En v4 se usa components()
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
                            ->columnSpanFull(),
                    ]),

                Section::make('Multimedia y Precios')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('purchase_price')
                                    ->numeric()
                                    ->prefix('$'),

                                TextInput::make('sale_price')
                                    ->numeric()
                                    ->required()
                                    ->prefix('$'),

                                FileUpload::make('image_path')
                                    ->image()
                                    ->directory('products'),
                            ]),
                    ]),

                Section::make('Especificaciones Técnicas')
                    ->schema([
                        KeyValue::make('tech_specs')
                            ->keyLabel('Parámetro')
                            ->valueLabel('Valor'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->circular(),

                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),

                Tables\Columns\TextColumn::make('model')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->money('MXN'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                ViewAction::make(), // Ahora funcionará porque está importado arriba
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
