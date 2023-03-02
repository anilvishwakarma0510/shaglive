<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EyesModel;

class EyesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'title'=>'Blue'
            ],
            [
                'title'=>'Brown'
            ],
            [
                'title'=>'Green'
            ],
            [
                'title'=>'Unknow'
            ]
        ];
        EyesModel::insert($insert);
    }
}
