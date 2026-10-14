<?php

namespace App\Filament\Resources\Cars\Schemas;

use App\Models\Car;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CarInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('number_plate'),
                TextEntry::make('owner_name'),
                TextEntry::make('owner_phone'),
                TextEntry::make('typeModel.name')
                    ->label('Type model')
                    ->formatStateUsing(fn (?string $state, Car $record): ?string => $record->typeModel?->brand
                        ? "{$record->typeModel->brand->name} - {$state}"
                        : $state)
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Car $record): bool => $record->trashed()),
            ]);
    }
}
