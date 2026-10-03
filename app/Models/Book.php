<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description', 'category_id', 'price', 'stock', 'published_at', 'isbn', 'is_active'])]
class Book extends Model
{
    public function images(): HasMany
    {
        return $this->hasMany(BookImage::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function bookImages(): HasMany
    {
        return $this->hasMany(BookImage::class);
    }


    public function authors(): belongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Book::class , 'wishlists' , 'user_id' , 'book_id');
    }

}
