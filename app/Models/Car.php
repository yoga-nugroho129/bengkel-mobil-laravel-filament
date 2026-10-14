<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['number_plate', 'owner_name', 'owner_phone', 'type_model_id'])]
class Car extends Model
{
    use SoftDeletes;

    public function typeModel(): BelongsTo
    {
        return $this->belongsTo(TypeModel::class);
    }
}
