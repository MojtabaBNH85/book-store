<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums\Users\AddressTypeEnum;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('phone', '09031971085')->firstOrFail();

        Address::firstOrCreate(['user_id' => $user->id, 'type' => 'home'], [
            'address' => 'تهران، خیابان انقلاب، پلاک ۱۲',
            'city' => 'تهران',
            'province' => 'تهران',
            'postal_code' => '1314567890',
            'type' => AddressTypeEnum::HOME,
        ]);

        Address::firstOrCreate(['user_id' => $user->id, 'type' => 'work'], [
            'address' => 'کرج، بلوار دانش‌آموز، پلاک ۳',
            'city' => 'کرج',
            'province' => 'البرز',
            'postal_code' => AddressTypeEnum::WORK,
        ]);

        echo "Addresses seeded!" . PHP_EOL;
    }
}
