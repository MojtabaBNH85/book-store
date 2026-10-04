<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ToggleAdminController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        abort_if($user->id === auth()->id(), 403, 'نمی‌توانی نقش خودت را تغییر دهی.');

        $user->update(['is_admin' => ! $user->is_admin]);

        return back()->with('success', $user->is_admin ? 'کاربر مدیر شد.' : 'دسترسی مدیریت گرفته شد.');
    }
}
