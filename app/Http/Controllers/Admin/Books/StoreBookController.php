<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class StoreBookController extends Controller
{
    public function __invoke(StoreBookRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $authorIds = $data['authors'] ?? [];
        unset($data['authors']);
        $data['is_active'] = $request->boolean('is_active', true);

        $book = Book::create($data);
        $book->authors()->sync($authorIds);

        return redirect()->route('admin.books.index')->with('success', 'کتاب «' . $book->name . '» ساخته شد.');
    }
}
