<?php

namespace App\Filament\Resources\Cars\Schemas;

use App\Models\TypeModel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number_plate')
                    ->required(),
                TextInput::make('owner_name')
                    ->required(),
                TextInput::make('owner_phone')
                    ->tel()
                    ->required()
                    ->mask('99999999999999')
                    ->dehydrateStateUsing(fn($state) => str_replace(' ', '', $state)),
                Select::make('type_model_id')
                    ->relationship(
                        name: 'typeModel',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->with('brand'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (TypeModel $record) => "{$record->brand?->name} - {$record->name}")
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
