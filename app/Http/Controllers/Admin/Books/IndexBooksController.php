<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\View\View;

class IndexBooksController extends Controller
{
    public function __invoke(): View
    {
        $books = Book::with(['category', 'authors'])
            ->latest()
            ->paginate(12);

        return view('admin.books.index', compact('books'));
    }
}
