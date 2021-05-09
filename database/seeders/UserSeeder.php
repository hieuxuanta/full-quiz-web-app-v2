<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Initialize Users
        User::create([
            'usr' => 'Teacher',
            'permissions' => 1,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Student',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
    }
}
