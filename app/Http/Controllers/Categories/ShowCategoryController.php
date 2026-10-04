<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class ShowCategoryController extends Controller
{
    public function __invoke(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $books = $category->books()
            ->with(['authors', 'category'])
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'books'));
    }
}
