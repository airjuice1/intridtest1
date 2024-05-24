<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\ProductList;
use App\Models\ModelList;
use App\Models\OptionList;
use Illuminate\Support\Arr;

Route::get('/', function () {
    
    $data = Product::distinct()->get(['vendor_code'])->toArray();

    dd($data);
    
    
});
