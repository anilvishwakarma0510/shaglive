<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeightModel;

class HeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'in_inch'=>'4\'9"',
                'in_cm'=>144.78
            ],
            [
                'in_inch'=>'4\'10"',
                'in_cm'=>147.32
            ],
            [
                'in_inch'=>'4\'11"',
                'in_cm'=>149.89
            ]
        ];
        HeightModel::insert($insert);
    }
}
