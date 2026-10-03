<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Users\AddressTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['address', 'user_id', 'city', 'province', 'postal_code', 'type', 'is_active'])]
class Address extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
        'type' => AddressTypeEnum::class
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
