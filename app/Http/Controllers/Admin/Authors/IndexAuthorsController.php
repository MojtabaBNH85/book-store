<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\View\View;

class IndexAuthorsController extends Controller
{
    public function __invoke(): View
    {
        $authors = Author::withCount('books')->latest()->paginate(15);

        return view('admin.authors.index', compact('authors'));
    }
}
