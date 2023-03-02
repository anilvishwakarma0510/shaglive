<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeightModel;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'in_ibs'=>99,
                'in_kg'=>44.55
            ],
            [
                'in_ibs'=>100,
                'in_kg'=>45.00
            ],
            [
                'in_ibs'=>101,
                'in_kg'=>45.45
            ]
        ];
        WeightModel::insert($insert);
    }
}
