<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            AddressSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
