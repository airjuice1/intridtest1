<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParamList;

class ParamListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParamList::create(['name' => 'Цвет']);
        ParamList::create(['name' => 'Размер']);
    }
}
