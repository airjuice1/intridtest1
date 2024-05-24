<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OptionList;

class OptionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OptionList::create(['param_list_id' => 1, 'value' => 'красный']);
        OptionList::create(['param_list_id' => 1, 'value' => 'чёрный']);
        OptionList::create(['param_list_id' => 1, 'value' => 'зелёный']);
        OptionList::create(['param_list_id' => 1, 'value' => 'синий']);
        OptionList::create(['param_list_id' => 2, 'value' => '40']);
        OptionList::create(['param_list_id' => 2, 'value' => '41']);
        OptionList::create(['param_list_id' => 2, 'value' => '42']);
        OptionList::create(['param_list_id' => 2, 'value' => '43']);
        OptionList::create(['param_list_id' => 2, 'value' => '44']);
    }
}
