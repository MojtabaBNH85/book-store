<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;

class EditBookController extends Controller
{
    public function __invoke(Book $book): View
    {
        $book->load('authors');

        return view('admin.books.edit', [
            'book' => $book,
            'categories' => Category::orderBy('name')->get(),
            'authors' => Author::orderBy('name')->get(),
        ]);
    }
}
