<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class UpdateBookController extends Controller
{
    public function __invoke(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();
        $authorIds = $data['authors'] ?? [];
        unset($data['authors']);
        $data['is_active'] = $request->boolean('is_active');

        $book->update($data);
        $book->authors()->sync($authorIds);

        return redirect()->route('admin.books.index')->with('success', 'کتاب «' . $book->name . '» به‌روز شد.');
    }
}
