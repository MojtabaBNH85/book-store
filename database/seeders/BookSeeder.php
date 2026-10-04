<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $fiction = Category::where('slug', 'fiction')->first();
        $nonFiction = Category::where('slug', 'non-fiction')->first();
        $science = Category::where('slug', 'science')->first();
        $literature = Category::where('slug', 'literature')->first();

        $books = [
            [
                'slug' => 'buf-e-kur',
                'name' => 'بوف کور',
                'description' => 'مشهورترین رمان صادق هدایت',
                'category_id' => $literature?->id,
                'price' => 850000,
                'stock' => 20,
                'published_at' => 1937,
                'isbn' => '9789640000001',
                'cover_image' => 'books/buf-e-kur.jpg',
                'is_active' => true,
                'authors' => ['sadegh-hedayat'],
            ],
            [
                'slug' => 'kelidar',
                'name' => 'کلیدر',
                'description' => 'رمان بلند محمود دولت‌آبادی',
                'category_id' => $fiction?->id,
                'price' => 1200000,
                'stock' => 15,
                'published_at' => 1978,
                'isbn' => '9789640000002',
                'cover_image' => 'books/kelidar.jpg',
                'is_active' => true,
                'authors' => ['mahmoud-dowlatabadi'],
            ],
            [
                'slug' => 'iman-biavarim',
                'name' => 'ایمان بیاوریم به آغاز فصل سرد',
                'description' => 'مجموعه شعر فروغ فرخزاد',
                'category_id' => $literature?->id,
                'price' => 650000,
                'stock' => 30,
                'published_at' => 1964,
                'isbn' => '9789640000003',
                'cover_image' => 'books/iman-biavarim.jpg',
                'is_active' => true,
                'authors' => ['forough-farrokhzad'],
            ],
            [
                'slug' => 'ensan-dar-jostjou',
                'name' => 'انسان در جستجوی معنا',
                'description' => 'اثر ویکتور فرانکل درباره معنای زندگی',
                'category_id' => $nonFiction?->id ?? $science?->id,
                'price' => 780000,
                'stock' => 40,
                'published_at' => 1946,
                'isbn' => '9789640000005',
                'cover_image' => 'books/ensan-dar-jostjou.jpg',
                'is_active' => true,
                'authors' => ['victor-frankl'],
            ],
        ];

        foreach ($books as $data) {
            $authorSlugs = $data['authors'];
            unset($data['authors']);

            $book = Book::firstOrCreate(['slug' => $data['slug']], $data);

            $authorIds = Author::whereIn('slug', $authorSlugs)->pluck('id')->all();
            $book->authors()->sync($authorIds);

            BookImage::firstOrCreate(
                ['book_id' => $book->id, 'is_cover' => true],
                ['path' => $book->cover_image ?? ('books/' . $book->slug . '-cover.jpg'), 'sort' => 0]
            );
        }

        echo "Books seeded!" . PHP_EOL;
    }
}
