<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'first_name' => 'مجتبی',
            'last_name' => 'بنی هاشم',
            'phone' => '09031971085',
            'national_code' => '4312140766',
            'password' => Hash::make('nikolabnh'),
            'is_admin' => true,
        ]);
    }
}
