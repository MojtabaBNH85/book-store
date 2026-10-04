<?php

namespace App\Http\Controllers;

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

        $categories = Category::withCount(['books' => fn ($q) => $q->where('is_active', true)])
            ->take(6)
            ->get();

        return view('home', compact('books', 'categories'));
    }
}
