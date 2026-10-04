<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class DeleteCategoryController extends Controller
{
    public function __invoke(Category $category): RedirectResponse
    {
        $name = $category->name;
        $booksCount = $category->books()->count();
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'دسته «' . $name . '» حذف شد.' . ($booksCount ? " ({$booksCount} کتاب هم حذف شد.)" : ''));
    }
}
