<?php

namespace App\Http\Controllers\Admin\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;

class UpdateAuthorController extends Controller
{
    public function __invoke(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'نویسنده «' . $author->name . '» به‌روز شد.');
    }
}
