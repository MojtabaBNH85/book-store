<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $books = Book::with(['authors', 'category'])
            ->where('is_active', true)
            ->latest()
            ->take(8)
            ->get();

        $stats = [
            'books' => Book::where('is_active', true)->count(),
            'authors' => Author::count(),
            'categories' => Category::count(),
        ];

        return view('home', compact('books', 'stats'));
    }
}
