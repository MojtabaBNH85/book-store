@extends('layouts.app')

@section('title', 'ورود')

@section('content')
<div class="mx-auto max-w-md py-10">
    <div class="overflow-hidden rounded-3xl border border-ink-200/70 bg-white shadow-xl">
        <div class="bg-ink-900 px-6 py-8 text-center text-white">
            <span class="mx-auto mb-3 grid size-12 place-items-center rounded-2xl bg-brand-500 text-xl font-extrabold text-ink-900">ک</span>
            <h1 class="text-xl font-extrabold">ورود به حساب</h1>
            <p class="mt-1 text-xs text-white/60">با کد ملی وارد شو</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4 p-6">
            @csrf

            <div>
                <label for="national_code" class="mb-1 block text-sm font-semibold">کد ملی</label>
                <input
                    type="text"
                    id="national_code"
                    name="national_code"
                    value="{{ old('national_code') }}"
                    inputmode="numeric"
                    maxlength="11"
                    required
                    autofocus
                    placeholder="00123456789"
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('national_code') border-red-500 @enderror"
                    dir="ltr"
                >
                @error('national_code')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-semibold">رمز عبور</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-200 @error('password') border-red-500 @enderror"
                    dir="ltr"
                >
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-ink-800">
                <input type="checkbox" name="remember" value="1" class="size-4 rounded accent-emerald-600">
                مرا به خاطر بسپار
            </label>

            <button type="submit" class="w-full rounded-xl bg-brand-600 py-3 text-sm font-bold text-white shadow transition hover:bg-brand-700">
                ورود
            </button>
        </form>
    </div>

    <p class="mt-4 text-center text-xs text-ink-800/60">کد ملی تستی ادمین: <code dir="ltr" class="rounded bg-ink-100 px-2 py-0.5">00123456789</code> — رمز: <code dir="ltr" class="rounded bg-ink-100 px-2 py-0.5">password</code></p>
</div>
@endsection
