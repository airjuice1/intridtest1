<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ModelList;
use App\Models\ParamList;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Pagination\Paginator;

class WelcomeController extends Controller
{

    private $perPage = 9;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $formParams = $request->validate([
            'model_id' => ['nullable'],
            'color_id' => ['nullable'],
            'size_id' => ['nullable'],
        ]);

        $model_ids = $formParams['model_id'] ?? [];
        $color_ids = $formParams['color_id'] ?? [];
        $size_ids = $formParams['size_id'] ?? [];

        $models = ModelList::get()->sortBy('id')->toArray();
        $params = ParamList::with('options')->orderBy('id')->get()->toArray();
        
        $products = DB::table('products')
        ->distinct()
        ->selectRaw('products.vendor_code')
        // ->selectRaw('models.name')
        // ->selectRaw('products1.param_list_id as param1')
        // ->selectRaw('products2.param_list_id as param2')
        // ->selectRaw('products1.option_list_id as option1')
        // ->selectRaw('products2.option_list_id as option2')
        // ->selectRaw('options1.value as value_option1')
        // ->selectRaw('options2.value as value_option2')
        ->selectRaw('warehouse.amount as amount')
        ->selectRaw('warehouse.price as price')
        ->selectRaw('concat(models.name, " ", options1.value, " ", options2.value) as product')
        ->joinSub(DB::table('products as products1')->where('param_list_id', '=', 1), 'products1', function (JoinClause $join) {
            $join->on('products.vendor_code', '=', 'products1.vendor_code');
        })
        ->joinSub(DB::table('products as products2')->where('param_list_id', '=', 2), 'products2', function (JoinClause $join) {
            $join->on('products.vendor_code', '=', 'products2.vendor_code');
        })
        ->join('model_lists as models', 'products.model_list_id', '=', 'models.id')
        ->join('option_lists as options1', 'products1.option_list_id', '=', 'options1.id')
        ->join('option_lists as options2', 'products2.option_list_id', '=', 'options2.id')
        ->leftJoin('warehouses as warehouse', 'warehouse.vendor_code', '=', 'products.vendor_code')
        ;

        if ($model_ids) {
            $products->whereIn('products.model_list_id', $model_ids);
        }

        if ($color_ids) {
            $products
            ->where('products1.param_list_id', '=', 1)
            ->whereIn('products1.option_list_id', $color_ids)
            ;
        }

        if ($size_ids) {
            $products
            ->where('products2.param_list_id', '=', 2)
            ->whereIn('products2.option_list_id', $size_ids)
            ;
        }

        $products = DB::table($products)->paginate($this->perPage)->withQueryString();

        return view('welcome.index', [
            'models' => $models,
            'params' => $params,
            'products' => $products,
            // 'sql' => $products->toSql(),
            'formParams' => $formParams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
