<?php

use App\Http\Controllers\Admin\Authors\CreateAuthorController;
use App\Http\Controllers\Admin\Authors\DeleteAuthorController;
use App\Http\Controllers\Admin\Authors\EditAuthorController;
use App\Http\Controllers\Admin\Authors\IndexAuthorsController;
use App\Http\Controllers\Admin\Authors\StoreAuthorController;
use App\Http\Controllers\Admin\Authors\UpdateAuthorController;
use App\Http\Controllers\Admin\Books\CreateBookController;
use App\Http\Controllers\Admin\Books\DeleteBookController;
use App\Http\Controllers\Admin\Books\EditBookController;
use App\Http\Controllers\Admin\Books\IndexBooksController;
use App\Http\Controllers\Admin\Books\StoreBookController;
use App\Http\Controllers\Admin\Books\UpdateBookController;
use App\Http\Controllers\Admin\Categories\CreateCategoryController;
use App\Http\Controllers\Admin\Categories\DeleteCategoryController;
use App\Http\Controllers\Admin\Categories\EditCategoryController;
use App\Http\Controllers\Admin\Categories\IndexCategoriesController;
use App\Http\Controllers\Admin\Categories\StoreCategoryController;
use App\Http\Controllers\Admin\Categories\UpdateCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Orders\IndexOrdersController;
use App\Http\Controllers\Admin\Users\IndexUsersController;
use App\Http\Controllers\Admin\Users\ToggleAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/books', IndexBooksController::class)->name('books.index');
    Route::get('/books/create', CreateBookController::class)->name('books.create');
    Route::post('/books', StoreBookController::class)->name('books.store');
    Route::get('/books/{book}/edit', EditBookController::class)->name('books.edit');
    Route::put('/books/{book}', UpdateBookController::class)->name('books.update');
    Route::delete('/books/{book}', DeleteBookController::class)->name('books.destroy');

    Route::get('/users', IndexUsersController::class)->name('users.index');
    Route::patch('/users/{user}/toggle-admin', ToggleAdminController::class)->name('users.toggle-admin');

    Route::get('/categories', IndexCategoriesController::class)->name('categories.index');
    Route::get('/categories/create', CreateCategoryController::class)->name('categories.create');
    Route::post('/categories', StoreCategoryController::class)->name('categories.store');
    Route::get('/categories/{category}/edit', EditCategoryController::class)->name('categories.edit');
    Route::put('/categories/{category}', UpdateCategoryController::class)->name('categories.update');
    Route::delete('/categories/{category}', DeleteCategoryController::class)->name('categories.destroy');

    Route::get('/authors', IndexAuthorsController::class)->name('authors.index');
    Route::get('/authors/create', CreateAuthorController::class)->name('authors.create');
    Route::post('/authors', StoreAuthorController::class)->name('authors.store');
    Route::get('/authors/{author}/edit', EditAuthorController::class)->name('authors.edit');
    Route::put('/authors/{author}', UpdateAuthorController::class)->name('authors.update');
    Route::delete('/authors/{author}', DeleteAuthorController::class)->name('authors.destroy');

    Route::get('/orders', IndexOrdersController::class)->name('orders.index');
});
