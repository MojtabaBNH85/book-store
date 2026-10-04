@extends('layouts.admin')

@section('title', 'مدیریت کاربران')
@section('heading', 'کاربران')

@section('content')
<div class="overflow-hidden rounded-2xl border border-ink-200/70 bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead class="border-b border-ink-200/70 bg-ink-50 text-xs text-ink-800/70">
            <tr>
                <th class="px-4 py-3 text-right font-semibold">نام</th>
                <th class="px-4 py-3 text-right font-semibold">موبایل</th>
                <th class="px-4 py-3 text-right font-semibold">کد ملی</th>
                <th class="px-4 py-3 text-right font-semibold">سفارش / نظر</th>
                <th class="px-4 py-3 text-right font-semibold">نقش</th>
                <th class="px-4 py-3 text-right font-semibold">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-b border-ink-100 last:border-0 hover:bg-ink-50/50">
                    <td class="px-4 py-3 font-semibold">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-4 py-3" dir="ltr">{{ $user->phone }}</td>
                    <td class="px-4 py-3" dir="ltr">{{ $user->national_code }}</td>
                    <td class="px-4 py-3">{{ $user->orders_count }} / {{ $user->reviews_count }}</td>
                    <td class="px-4 py-3">
                        @if ($user->is_admin)
                            <span class="rounded-full bg-brand-100 px-2.5 py-1 text-xs font-bold text-brand-800">مدیر</span>
                        @else
                            <span class="rounded-full bg-ink-100 px-2.5 py-1 text-xs font-bold text-ink-800">کاربر</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-brand-700 hover:underline">
                                    {{ $user->is_admin ? 'سلب مدیریت' : 'مدیر کردن' }}
                                </button>
                            </form>
                        @else
                            <span class="text-xs text-ink-800/50">خودت</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-8 text-center text-ink-800/60">کاربری نیست.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $users->links() }}</div>
@endsection
