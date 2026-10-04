<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class IndexUsersController extends Controller
{
    public function __invoke(): View
    {
        $users = User::withCount(['orders', 'reviews'])
            ->latest()
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }
}
