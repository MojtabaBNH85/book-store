<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class EditCategoryController extends Controller
{
    public function __invoke(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }
}
