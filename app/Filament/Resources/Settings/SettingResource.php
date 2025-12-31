<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\Pages;
use App\Models\Setting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder; // <--- ESTA ES LA LÍNEA QUE FALTA

// IMPORTACIONES DE COMPONENTES
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Actions\EditAction;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Contacto (WhatsApp)';
    protected static ?string $modelLabel = 'Contacto';
    protected static ?string $slug = 'ajustes-contacto';

    // FILTRO: Solo muestra el WhatsApp
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('key', 'whatsapp_number');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Ajustes de Contacto')
                ->description('Configura el número de atención que aparece en la landing page.')
                ->schema([
                    TextInput::make('value')
                        ->label('Número de WhatsApp')
                        ->required()
                        ->placeholder('Ej: 5218341234567')
                        ->helperText('Usa código de país + número, sin espacios ni símbolos.'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')->label('Descripción'),
                Tables\Columns\TextColumn::make('value')->label('Valor asignado'),
            ])
            ->actions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
