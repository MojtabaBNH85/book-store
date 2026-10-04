<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate(['slug' => 'fiction'], ['name' => 'رمان', 'description' => 'رمان‌های ایرانی و خارجی']);
        Category::firstOrCreate(['slug' => 'non-fiction'], ['name' => 'غیرداستانی', 'description' => 'زندگینامه، تاریخ و عمومی']);
        Category::firstOrCreate(['slug' => 'science'], ['name' => 'علمی', 'description' => 'علم، روانشناسی و دانش']);
        Category::firstOrCreate(['slug' => 'literature'], ['name' => 'ادبیات', 'description' => 'ادبیات کلاسیک و شعر فارسی']);
        Category::firstOrCreate(['slug' => 'history'], ['name' => 'تاریخی', 'description' => 'تاریخ ایران و جهان']);

        echo "Categories seeded!" . PHP_EOL;
    }
}
