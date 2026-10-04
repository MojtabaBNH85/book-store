<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('phone', '09123456789')->first();
        $admin = User::where('is_admin', true)->first() ?? $user;
        $book1 = Book::where('slug', 'buf-e-kur')->first();
        $book2 = Book::where('slug', 'kelidar')->first();

        if ($book1 && $user) {
            Review::firstOrCreate(['book_id' => $book1->id, 'user_id' => $user->id], [
                'rating' => 5,
                'comment' => 'رمانی عمیق و تأثیرگذار، حتماً بخوانید.',
            ]);
        }

        if ($book2 && $user) {
            Review::firstOrCreate(['book_id' => $book2->id, 'user_id' => $user->id], [
                'rating' => 4,
                'comment' => 'روایت قوی از زندگی روستایی ایران.',
            ]);
        }

        if ($book1 && $admin && $admin->id !== $user?->id) {
            Review::firstOrCreate(['book_id' => $book1->id, 'user_id' => $admin->id], [
                'rating' => 4,
                'comment' => 'فضاسازی عالی ولی پایان تلخی دارد.',
            ]);
        }

        echo "Reviews seeded!" . PHP_EOL;
    }
}
