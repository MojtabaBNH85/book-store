@extends('layouts.admin')

@section('title', 'مدیریت کتاب‌ها')
@section('heading', 'کتاب‌ها')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.books.create') }}" class="rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-bold text-white shadow transition hover:bg-brand-700">+ کتاب جدید</a>
</div>

<div class="overflow-hidden rounded-2xl border border-ink-200/70 bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead class="border-b border-ink-200/70 bg-ink-50 text-xs text-ink-800/70">
            <tr>
                <th class="px-4 py-3 text-right font-semibold">نام</th>
                <th class="px-4 py-3 text-right font-semibold">دسته</th>
                <th class="px-4 py-3 text-right font-semibold">قیمت (ریال)</th>
                <th class="px-4 py-3 text-right font-semibold">موجودی</th>
                <th class="px-4 py-3 text-right font-semibold">وضعیت</th>
                <th class="px-4 py-3 text-right font-semibold">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr class="border-b border-ink-100 last:border-0 hover:bg-ink-50/50">
                    <td class="px-4 py-3 font-semibold">{{ $book->name }}</td>
                    <td class="px-4 py-3 text-ink-800/70">{{ $book->category?->name ?? '—' }}</td>
                    <td class="px-4 py-3">{{ number_format($book->price) }}</td>
                    <td class="px-4 py-3">{{ $book->stock }}</td>
                    <td class="px-4 py-3">
                        @if ($book->is_active)
                            <span class="rounded-full bg-brand-100 px-2.5 py-1 text-xs font-bold text-brand-800">فعال</span>
                        @else
                            <span class="rounded-full bg-ink-100 px-2.5 py-1 text-xs font-bold text-ink-800">غیرفعال</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.books.edit', $book) }}" class="text-brand-700 hover:underline">ویرایش</a>
                            <form method="POST" action="{{ route('admin.books.destroy', $book) }}" onsubmit="return confirm('حذف شود؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-8 text-center text-ink-800/60">کتابی نیست.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $books->links() }}</div>
@endsection
