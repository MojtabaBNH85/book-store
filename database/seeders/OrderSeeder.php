<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('phone', '09123456789')->first();
        $book1 = Book::where('slug', 'buf-e-kur')->first();
        $book2 = Book::where('slug', 'iman-biavarim')->first();

        if (! $user || ! $book1) {
            echo "Orders skipped (missing user/book)!" . PHP_EOL;

            return;
        }

        $address = $user->addresses()->first();

        $order = Order::firstOrCreate(['user_id' => $user->id, 'address_id' => $address?->id, 'status' => 'pending'], [
            'total' => 0,
            'name' => 'علی رضایی',
            'phone' => $user->phone,
            'address' => $address?->address ?? 'تهران، خیابان انقلاب، پلاک ۱۲',
        ]);
        $order->items()->delete();

        $items = [
            ['book_id' => $book1->id, 'quantity' => 1, 'price' => $book1->price],
        ];
        if ($book2) {
            $items[] = ['book_id' => $book2->id, 'quantity' => 2, 'price' => $book2->price];
        }

        $total = 0;
        foreach ($items as $item) {
            OrderItem::create(['order_id' => $order->id] + $item);
            $total += $item['price'] * $item['quantity'];
        }
        $order->update(['total' => $total]);

        echo "Orders + Items seeded!" . PHP_EOL;
    }
}
