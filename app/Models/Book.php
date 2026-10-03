<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'category_id', 'price', 'stock', 'published_at', 'isbn', 'is_active'])]
class Book extends Model
{
    //
}
