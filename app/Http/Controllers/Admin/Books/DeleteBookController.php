<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class DeleteBookController extends Controller
{
    public function __invoke(Book $book): RedirectResponse
    {
        $name = $book->name;
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'کتاب «' . $name . '» حذف شد.');
    }
}
