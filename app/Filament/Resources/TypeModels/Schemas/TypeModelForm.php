<?php

namespace App\Filament\Resources\TypeModels\Schemas;

use App\Models\TypeModel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class TypeModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->rules(function (Get $get, ?TypeModel $record) {
                        return [
                            Rule::unique('type_models', 'name')
                                ->where('brand_id', $get('brand_id'))
                                ->ignore($record?->id),
                        ];
                    })
                    ->required(),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),
            ]);
    }
}
