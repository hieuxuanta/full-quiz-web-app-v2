<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProfile::create([
            'usr_id' => 2,
            // 'given_name' => 'g',
            'usr_identification_numb' => 2 + 171200000,
            'full_name' => 'Hieu',
            // 'middle_name' => 'm',
            'ext_name' => 'Mr',
        ]);
        UserProfile::create([
            'usr_id' => 3,
            // 'given_name' => 'g',
            'usr_identification_numb' => 3 + 171200000,
            'full_name' => 'Dung',
            // 'middle_name' => 'm',
            'ext_name' => 'Ms',
        ]);
    }
}
