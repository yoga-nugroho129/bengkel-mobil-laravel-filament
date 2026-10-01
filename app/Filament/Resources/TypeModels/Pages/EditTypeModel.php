<?php

namespace App\Filament\Resources\TypeModels\Pages;

use App\Filament\Resources\TypeModels\TypeModelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditTypeModel extends EditRecord
{
    protected static string $resource = TypeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
