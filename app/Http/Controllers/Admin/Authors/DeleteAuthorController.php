<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;

class DeleteAuthorController extends Controller
{
    public function __invoke(Author $author): RedirectResponse
    {
        $name = $author->name;
        $author->books()->detach();
        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'نویسنده «' . $name . '» حذف شد.');
    }
}
