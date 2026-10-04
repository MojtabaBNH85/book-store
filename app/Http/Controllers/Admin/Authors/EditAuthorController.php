<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\View\View;

class EditAuthorController extends Controller
{
    public function __invoke(Author $author): View
    {
        return view('admin.authors.edit', compact('author'));
    }
}
