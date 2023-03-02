<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BustModel;

class BustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'title'=>'Large'
            ],
            [
                'title'=>'Medium'
            ],
            [
                'title'=>'Small'
            ],
            [
                'title'=>'Unknow'
            ]
        ];
        BustModel::insert($insert);
    }
}
