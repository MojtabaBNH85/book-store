<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateAuthorController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.authors.create');
    }
}
