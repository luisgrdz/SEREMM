<?php

namespace App\Filament\Resources\Products; // Namespace corregido según la carpeta

use App\Filament\Resources\Products\Schemas\ProductForm;
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
    // ... tus importaciones anteriores se mantienen igual

    public static function form(Schema $schema): Schema
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
                                // CAMBIO: Asegúrate que el nombre coincida con tu base de datos
                                TextInput::make('sale_price')
                                    ->label('Precio de Venta')
                                    ->numeric()
                                    ->required()
                                    ->prefix('$'),

                                // NUEVO: Campo Stock indispensable para la Landing
                                TextInput::make('stock')
                                    ->label('Existencias (Stock)')
                                    ->numeric()
                                    ->required()
                                    ->default(1),

                                FileUpload::make('image_path')
                                    ->label('Imagen')
                                    ->image()
                                    ->directory('products'),
                            ]),
                    ]),

                Section::make('Especificaciones Técnicas (Solar)')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                // NUEVO: Wattage
                                TextInput::make('wattage')
                                    ->label('Potencia (Watts)')
                                    ->numeric()
                                    ->suffix('W')
                                    ->required(),

                                // NUEVO: Eficiencia
                                TextInput::make('efficiency')
                                    ->label('Eficiencia (%)')
                                    ->numeric()
                                    ->suffix('%'),

                                // NUEVO: Tipo de Tecnología
                                Select::make('tech_type')
                                    ->label('Tecnología')
                                    ->options([
                                        'mono_perc' => 'Mono-PERC',
                                        'bifacial' => 'Bifacial',
                                        'policristalino' => 'Policristalino',
                                    ]),
                            ]),

                        // Esto es extra para otros datos
                        KeyValue::make('tech_specs')
                            ->label('Otros Parámetros')
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
                    ->label('Imagen')
                    ->circular(),

                Tables\Columns\TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('model')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('wattage')
                    ->label('Potencia')
                    ->suffix(' W')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock')
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state <= 0 => 'danger',
                        $state < 5 => 'warning',
                        default => 'success',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Precio')
                    ->money('MXN')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name'),
            ])
            ->actions([
            ViewAction::make(),
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
