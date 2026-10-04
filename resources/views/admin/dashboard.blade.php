@extends('layouts.admin')

@section('title', 'داشبورد مدیریت ورق')
@section('heading', 'داشبورد')

@section('content')
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <p class="text-xs text-ink-800/60">کتاب‌ها</p>
        <p class="mt-1 text-2xl font-extrabold">{{ number_format($booksCount) }}</p>
    </div>
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <p class="text-xs text-ink-800/60">کاربران</p>
        <p class="mt-1 text-2xl font-extrabold">{{ number_format($usersCount) }}</p>
    </div>
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <p class="text-xs text-ink-800/60">سفارش‌ها</p>
        <p class="mt-1 text-2xl font-extrabold">{{ number_format($ordersCount) }}</p>
    </div>
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <p class="text-xs text-ink-800/60">مجموع فروش (ریال)</p>
        <p class="mt-1 text-2xl font-extrabold text-brand-700">{{ number_format($revenue) }}</p>
    </div>
</div>

<div class="mt-6 grid gap-4 lg:grid-cols-2">
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <h2 class="mb-4 font-bold">آخرین سفارش‌ها</h2>
        @forelse ($latestOrders as $order)
            <div class="flex items-center justify-between border-b border-ink-100 py-2 text-sm last:border-0">
                <span>#{{ $order->id }} — {{ $order->name }}</span>
                <span class="font-bold">{{ number_format($order->total) }} ریال</span>
            </div>
        @empty
            <p class="text-sm text-ink-800/60">سفارشی نیست.</p>
        @endforelse
    </div>
    <div class="rounded-2xl border border-ink-200/70 bg-white p-5 shadow-sm">
        <h2 class="mb-4 font-bold">موجودی رو به اتمام</h2>
        @forelse ($lowStock as $book)
            <div class="flex items-center justify-between border-b border-ink-100 py-2 text-sm last:border-0">
                <span>{{ $book->name }}</span>
                <span class="font-bold text-amber-600">{{ $book->stock }} عدد</span>
            </div>
        @empty
            <p class="text-sm text-ink-800/60">همه موجودی‌ها خوب است.</p>
        @endforelse
    </div>
</div>
@endsection
