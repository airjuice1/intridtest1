<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ParamList;
use App\Models\OptionList;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function options(): belongsTo
    {
        return $this->belongsTo(OptionList::class, 'option_list_id');
    }
}
