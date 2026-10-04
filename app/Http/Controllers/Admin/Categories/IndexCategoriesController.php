<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class IndexCategoriesController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::withCount('books')->latest()->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }
}
