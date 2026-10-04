<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;

class StoreAuthorController extends Controller
{
    public function __invoke(StoreAuthorRequest $request): RedirectResponse
    {
        $author = Author::create($request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'نویسنده «' . $author->name . '» ساخته شد.');
    }
}
