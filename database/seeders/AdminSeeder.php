<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    //php artisan db:seed --class=AdminSeeder
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ];
        AdminModel::create($admin); //
    }
}
