<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PublicHairModel;

class PublicHairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            [
                'title'=>'Trimmed'
            ],
            [
                'title'=>'Shaved'
            ],
            [
                'title'=>'Hairy'
            ],
            [
                'title'=>'Unknow'
            ]
        ];
        PublicHairModel::insert($insert);
    }
}
