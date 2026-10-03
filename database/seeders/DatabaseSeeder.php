<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enums\Users\AddressTypeEnum;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::query()->create([
            'first_name' => 'مجتبی',
            'last_name' => 'بنی هاشم',
            'phone' => '09031971085',
            'national_code' => '4312140766',
            'password' => Hash::make('nikolabnh'),
            'is_admin' => true,
        ]);

        $user1->addresses()->newQuery()->create([
            'address' => 'قزوین خیابن شهرداری کوچه اقاجانی یه چیزی',
            'city' => 'قزوین',
            'province' => 'قزوین',
            'postal_code' => '1234567890',
            'is_active' => true,
            'type' => AddressTypeEnum::HOME
        ]);
    }
}
