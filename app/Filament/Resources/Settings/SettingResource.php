<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\Pages;
use App\Models\Setting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; // Usamos Schema para v4
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;


// IMPORTACIONES DE COMPONENTES
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

// IMPORTACIONES DE ACCIONES
use Filament\Actions\EditAction;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';


    protected static ?string $navigationLabel = 'Configuraciones';

    protected static ?string $modelLabel = 'Configuración';

    // Firma corregida usando Schema para consistencia con tu proyecto
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ajustes de Contacto')
                    ->description('Configura los datos de contacto que aparecen en la landing page.')
                    ->schema([
                        // 1. Agregamos la 'key': Es obligatoria para que el SQL no falle
                        TextInput::make('key')
                            ->label('Llave (ID Interno)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('ej: whatsapp_number')
                            // Se deshabilita solo si el registro YA EXISTE (edición)
                            ->disabled(fn($record) => $record !== null)
                            // Forzamos que se envíe a la DB para que no llegue nulo
                            ->dehydrated(true),

                        // 2. Ajustamos el 'label': También debe ser obligatorio al crear
                        TextInput::make('label')
                            ->label('Nombre del Parámetro')
                            ->required()
                            ->placeholder('ej: Teléfono de Ventas')
                            ->disabled(fn($record) => $record !== null)
                            ->dehydrated(true),

                        // 3. El 'value' siempre debe ser editable
                        TextInput::make('value')
                            ->label('Valor actual')
                            ->required()
                            ->placeholder('Ej: 5218341234567')
                            ->helperText('Para WhatsApp: Usa código de país + número, sin espacios ni símbolos.'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->label('Configuración')
                    ->fontFamily('mono')
                    ->searchable(),

                Tables\Columns\TextColumn::make('value')
                    ->label('Valor asignado')
                    ->limit(50),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime()
                    ->color('gray'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
