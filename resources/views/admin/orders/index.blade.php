@extends('layouts.admin')

@section('title', 'سفارش‌ها')
@section('heading', 'سفارش‌ها')

@section('content')
<div class="overflow-hidden rounded-2xl border border-ink-200/70 bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead class="border-b border-ink-200/70 bg-ink-50 text-xs text-ink-800/70">
            <tr>
                <th class="px-4 py-3 text-right font-semibold">#</th>
                <th class="px-4 py-3 text-right font-semibold">مشتری</th>
                <th class="px-4 py-3 text-right font-semibold">اقلام</th>
                <th class="px-4 py-3 text-right font-semibold">مبلغ (ریال)</th>
                <th class="px-4 py-3 text-right font-semibold">وضعیت</th>
                <th class="px-4 py-3 text-right font-semibold">تاریخ</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr class="border-b border-ink-100 last:border-0 hover:bg-ink-50/50">
                    <td class="px-4 py-3 font-bold">#{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->name }} <span class="text-xs text-ink-800/50">({{ $order->user?->phone }})</span></td>
                    <td class="px-4 py-3 text-xs text-ink-800/70">
                        @foreach ($order->items as $item)
                            {{ $item->book?->name }} × {{ $item->quantity }}@if (! $loop->last)، @endif
                        @endforeach
                    </td>
                    <td class="px-4 py-3 font-bold">{{ number_format($order->total) }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full bg-ink-100 px-2.5 py-1 text-xs font-bold">{{ $order->status }}</span>
                    </td>
                    <td class="px-4 py-3 text-xs text-ink-800/60">{{ $order->created_at->format('Y/m/d') }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-8 text-center text-ink-800/60">سفارشی نیست.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $orders->links() }}</div>
@endsection
