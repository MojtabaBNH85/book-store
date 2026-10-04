@extends('layouts.app')

@section('title', 'ثبت‌نام در ورق')

@section('content')
<div class="mx-auto max-w-md py-10">
    <div class="overflow-hidden rounded-3xl border border-ink-200/70 bg-white shadow-xl">
        <div class="bg-ink-900 px-6 py-8 text-center text-white">
            <span class="mx-auto mb-3 grid size-12 place-items-center rounded-2xl bg-brand-500 text-xl font-extrabold text-ink-900">و</span>
            <h1 class="text-xl font-extrabold">ساخت حساب در ورق</h1>
            <p class="mt-1 text-xs text-white/60">کمتر از یک دقیقه طول می‌کشد</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4 p-6">
            @csrf

            <div>
                <label for="first_name" class="mb-1 block text-sm font-semibold">نام</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('first_name') border-red-500 @enderror">
                @error('first_name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="mb-1 block text-sm font-semibold">نام خانوادگی</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('last_name') border-red-500 @enderror">
                @error('last_name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="mb-1 block text-sm font-semibold">موبایل</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" inputmode="numeric" maxlength="11" required placeholder="09123456789"
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('phone') border-red-500 @enderror" dir="ltr">
                @error('phone')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="national_code" class="mb-1 block text-sm font-semibold">کد ملی</label>
                <input type="text" id="national_code" name="national_code" value="{{ old('national_code') }}" inputmode="numeric" maxlength="11" required placeholder="00123456789"
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('national_code') border-red-500 @enderror" dir="ltr">
                @error('national_code')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-semibold">رمز عبور</label>
                <input type="password" id="password" name="password" required placeholder="حداقل ۸ کاراکتر"
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('password') border-red-500 @enderror" dir="ltr">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="mb-1 block text-sm font-semibold">تکرار رمز عبور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200" dir="ltr">
            </div>

            <div>
                <button type="submit" class="w-full rounded-xl bg-brand-600 py-3 text-sm font-bold text-white shadow transition hover:bg-brand-700">
                    ساخت حساب
                </button>
                <p class="mt-3 text-center text-sm text-ink-800/70">
                    حساب داری؟ <a href="{{ route('login') }}" class="font-bold text-brand-700 hover:underline">وارد شو</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
