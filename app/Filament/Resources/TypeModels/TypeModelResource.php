<?php

namespace App\Filament\Resources\TypeModels;

use App\Filament\Resources\TypeModels\Pages\CreateTypeModel;
use App\Filament\Resources\TypeModels\Pages\EditTypeModel;
use App\Filament\Resources\TypeModels\Pages\ListTypeModels;
use App\Filament\Resources\TypeModels\Schemas\TypeModelForm;
use App\Filament\Resources\TypeModels\Tables\TypeModelsTable;
use App\Models\TypeModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeModelResource extends Resource
{
    protected static ?string $model = TypeModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cube;

    protected static ?string $recordTitleAttribute = 'TypeModel';

    public static function form(Schema $schema): Schema
    {
        return TypeModelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeModelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTypeModels::route('/'),
            'create' => CreateTypeModel::route('/create'),
            'edit' => EditTypeModel::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
