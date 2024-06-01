<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ParamList;

class OptionList extends Model
{
    use HasFactory;

    public $timestamps = false;

    function params(): BelongsTo
    {
        return $this->belongsTo(ParamList::class, 'param_list_id');
    }
}
