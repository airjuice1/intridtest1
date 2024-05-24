<?php

use Illuminate\Support\Facades\Route;
use App\Models\ProductList;
use App\Models\ModelList;
use App\Models\OptionList;
use Illuminate\Support\Arr;

Route::get('/', function () {
    
    $data = Arr::crossJoin(
            ProductList::get(['id'])->toArray(),
            ModelList::get(['id'])->toArray(),
            OptionList::where('param_list_id', 1)->get(['id', 'param_list_id'])->toArray(),
            OptionList::where('param_list_id', 2)->get(['id', 'param_list_id'])->toArray(),
        );

    foreach ($data as $key => $value) {
        dd($value);
    }
    
});
