<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HairModel;

class HairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'title'=>'Brown'
            ],
            [
                'title'=>'Blonde'
            ],
            [
                'title'=>'Black'
            ],
            [
                'title'=>'Red'
            ],
            [
                'title'=>'Unknow'
            ]
        ];
        HairModel::insert($insert);
    }
}
