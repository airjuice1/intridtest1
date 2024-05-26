<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OptionList;

class ParamList extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function options(): HasMany
    {
        return $this->hasMany(OptionList::class);
        // return $this->hasMany(OptionList::class, 'id', 'param_list_id');
    }
}
