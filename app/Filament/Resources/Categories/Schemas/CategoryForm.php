<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Str;
// FORM COMPONENTS (v3)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\KeyValue;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre de la Categoría')
                    ->required() // Esto evita que el formulario se envíe vacío
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(string $operation, $state, $set) =>
                    $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3),
            ]);
    }
}
