<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelList;

class ModelListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelList::create(['name' => 'Клёвые',]);
        ModelList::create(['name' => 'Модные',]);
        ModelList::create(['name' => 'Странные',]);
        ModelList::create(['name' => 'Весёлые',]);
        ModelList::create(['name' => 'Понтовые',]);
    }
}
