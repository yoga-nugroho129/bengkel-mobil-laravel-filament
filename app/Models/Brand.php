<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name'])]
class Brand extends Model
{
    use SoftDeletes;

    public function typeModels(): HasMany
    {
        return $this->hasMany(TypeModel::class);
    }
}
