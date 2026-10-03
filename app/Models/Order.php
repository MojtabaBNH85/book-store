<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'address_id', 'status', 'total', 'name', 'phone', 'address'])]
class Order extends Model
{
    //
}
