<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class LoginUserController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->credentials();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $dashboard = Auth::user()->is_admin && Route::has('admin.dashboard')
                ? route('admin.dashboard')
                : route('dashboard');

            return redirect()->intended($dashboard);
        }

        return back()->withErrors([
            'national_code' => 'کد ملی یا رمز عبور اشتباه است.',
        ])->onlyInput('national_code');
    }
}
