<?php

namespace App\Filament\Resources\Calculadoras;

use App\Filament\Resources\Calculadoras\Pages;
use App\Models\Setting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;


use Filament\Forms\Get;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class CalculadoraResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationLabel = 'Calculadora Solar';
    protected static ?string $slug = 'calculadora-solar';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('key', ['solar_factor', 'tarifas_energia']);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Configuración Técnica')
                ->schema([
                    Select::make('key')
                        ->label('Tipo de Parámetro')
                        ->options([
                            'solar_factor' => 'Factor de Producción Solar',
                            'tarifas_energia' => 'Listado de Tarifas CFE',
                        ])
                        ->required()
                        ->live()
                        ->disabled(fn($record) => $record !== null),

                    TextInput::make('label')
                        ->label('Nombre Descriptivo')
                        ->required(),

                /* ======================
   FACTOR SOLAR
====================== */
                TextInput::make('solar_factor_value')
                    ->label('Valor del Factor')
                    ->numeric()
                    ->visible(fn($get) => $get('key') === 'solar_factor')
                    ->required(fn($get) => $get('key') === 'solar_factor'),

                /* ======================
   TARIFAS
====================== */
                Repeater::make('tarifas')
                    ->label('Tarifas de Energía')
                    ->visible(fn($get) => $get('key') === 'tarifas_energia')
                    ->required(fn($get) => $get('key') === 'tarifas_energia')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nombre')
                                ->label('Nombre')
                                ->required(),

                            TextInput::make('precio')
                                ->label('Precio por kWh')
                                ->numeric()
                                ->prefix('$')
                                ->required(),
                        ]),
                    ])
                    ->itemLabel(fn(array $state) => $state['nombre'] ?? null),

            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->label('Concepto')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última edición')
                    ->dateTime(),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalculadoras::route('/'),
            'create' => Pages\CreateCalculadora::route('/create'),
            'edit' => Pages\EditCalculadora::route('/{record}/edit'),
        ];
    }
}
