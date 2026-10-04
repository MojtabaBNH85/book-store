<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::firstOrCreate(['slug' => 'sadegh-hedayat'], ['name' => 'صادق هدایت', 'bio' => 'نویسنده ایرانی، خالق بوف کور', 'birth_date' => '1903-02-17']);
        Author::firstOrCreate(['slug' => 'mahmoud-dowlatabadi'], ['name' => 'محمود دولت‌آبادی', 'bio' => 'نویسنده ایرانی، خالق کلیدر', 'birth_date' => '1940-08-01']);
        Author::firstOrCreate(['slug' => 'forough-farrokhzad'], ['name' => 'فروغ فرخزاد', 'bio' => 'شاعر معاصر ایرانی', 'birth_date' => '1934-12-29']);
        Author::firstOrCreate(['slug' => 'george-orwell'], ['name' => 'جورج اورول', 'bio' => 'نویسنده انگلیسی، خالق ۱۹۸۴', 'birth_date' => '1903-06-25']);
        Author::firstOrCreate(['slug' => 'victor-frankl'], ['name' => 'ویکتور فرانکل', 'bio' => 'روانپزشک اتریشی', 'birth_date' => '1905-03-26']);

        echo "Authors seeded!" . PHP_EOL;
    }
}
