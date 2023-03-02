<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EthinicityModel;

class EthinicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'title'=>'White'
            ],
            [
                'title'=>'Asian'
            ],
            [
                'title'=>'Black'
            ],
            [
                'title'=>'Indian'
            ],
            [
                'title'=>'Latin'
            ],
            [
                'title'=>'Unknow'
            ]
        ];
        EthinicityModel::insert($insert);
    }
}
