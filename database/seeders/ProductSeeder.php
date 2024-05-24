<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductList;
use App\Models\ModelList;
use App\Models\OptionList;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = Arr::crossJoin(
            ProductList::get(['id'])->toArray(),
            ModelList::get(['id'])->toArray(),
            OptionList::where('param_list_id', 1)->get(['id', 'param_list_id'])->toArray(),
            OptionList::where('param_list_id', 2)->get(['id', 'param_list_id'])->toArray(),
        );

        $vendor_code = 1000;

        foreach ($rows as $value) {
            $product['vendor_code'] = $vendor_code += 1;
            $product['product_list_id'] = $value[0]['id'];
            $product['model_list_id'] = $value[1]['id'];
            $product['param_list_id'] = $value[2]['param_list_id'];
            $product['option_list_id'] = $value[2]['id'];
            Product::create($product);

            $product['param_list_id'] = $value[3]['param_list_id'];
            $product['option_list_id'] = $value[3]['id'];
            Product::create($product);
        }
    }
}
