<?php

namespace App\Filament\Resources\TypeModels\Pages;

use App\Filament\Resources\TypeModels\TypeModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTypeModels extends ListRecords
{
    protected static string $resource = TypeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
