<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['phone' => '09031971085'],
            ['first_name' => 'مجتبی', 'last_name' => 'بنی هاشم', 'national_code' => '4312140766', 'password' => Hash::make('nikolabnh'), 'is_admin' => true]
        );

        User::firstOrCreate(
            ['phone' => '09129876543'],
            ['first_name' => 'مصطفی', 'last_name' => 'بنی هاشم', 'national_code' => '4311597525', 'password' => Hash::make('123456'), 'is_admin' => false]
        );

        echo "Users seeded!" . PHP_EOL;
    }
}
