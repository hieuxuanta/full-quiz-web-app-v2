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
        User::create([
            'usr' => 'Robot_Ramsey',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Nguyen Quoc Tuan',
            'permissions' => 1,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Luong Thai Le',
            'permissions' => 1,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Tran Viet An',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Madam Huong',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Martin Garrix',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Nguyen Duc Du',
            'permissions' => 1,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Pham Thuy Dung',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Luong Huu Anh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Nguyen Duc Tuan Anh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Leonardo Di Carpio',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Hoang Van Thong',
            'permissions' => 1,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'HieuPC-whitehat',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Gongcha-milktea',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Vu Duc Manh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Ho Ngoc Ha',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Luu Huong Giang',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Pham My Tam',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Noo Phuoc Thinh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Nguyen Dong Nhi',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Vu Cat Tuong',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Ho Duc Phuc',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Hoang Bao Linh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Dam Vinh Hung',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Bui Anh Tuan',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Vu Thu Minh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Ho Quang Hieu',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Pham Thi Khoi My',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'La Ngoc Thuy Tien',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Nguyen Ngoc Bao Anh',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
        User::create([
            'usr' => 'Ngo Kien Huy',
            'permissions' => 2,
            'password' => Hash::make("password"),
        ]);
    }
}
