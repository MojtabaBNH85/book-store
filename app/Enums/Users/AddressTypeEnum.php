<?php

namespace App\Enums\Users;

enum AddressTypeEnum: string
{
    case HOME = 'home';
    case WORK = 'work';
    case OTHER = 'other';
}
