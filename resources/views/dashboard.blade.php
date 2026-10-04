@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="py-8">
    <div class="overflow-hidden rounded-3xl border border-ink-200/70 bg-white shadow-sm">
        <div class="bg-gradient-to-l from-brand-700 to-brand-500 px-6 py-8 text-white">
            <h1 class="text-2xl font-extrabold">سلام {{ auth()->user()->first_name }}!</h1>
            <p class="mt-1 text-sm text-white/80">به ورق خوش آمدی</p>
        </div>
        <div class="grid gap-4 p-6 sm:grid-cols-3">
            <div class="rounded-2xl bg-ink-50 p-4">
                <p class="text-xs text-ink-800/60">کد ملی</p>
                <p class="mt-1 font-bold" dir="ltr">{{ auth()->user()->national_code }}</p>
            </div>
            <div class="rounded-2xl bg-ink-50 p-4">
                <p class="text-xs text-ink-800/60">نقش</p>
                <p class="mt-1 font-bold">{{ auth()->user()->is_admin ? 'مدیر' : 'کاربر' }}</p>
            </div>
            <div class="rounded-2xl bg-ink-50 p-4">
                <p class="text-xs text-ink-800/60">سفارش‌ها</p>
                <p class="mt-1 font-bold">{{ auth()->user()->orders()->count() }} سفارش</p>
            </div>
        </div>
    </div>
</div>
@endsection
