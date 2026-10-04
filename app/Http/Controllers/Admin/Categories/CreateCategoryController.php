<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateCategoryController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.categories.create');
    }
}
