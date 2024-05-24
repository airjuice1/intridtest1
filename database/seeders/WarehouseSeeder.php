<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Product::distinct()->get(['vendor_code'])->toArray();

        foreach ($data as $value) {
            $insert['vendor_code'] = $value['vendor_code'];
            $insert['price'] = mt_rand(1000*10, 10000*10) / 10;
            $insert['amount'] = mt_rand(0, 20);

            Warehouse::create($insert);
        }
    }
}
