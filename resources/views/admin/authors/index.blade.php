@extends('layouts.admin')

@section('title', 'مدیریت نویسنده‌ها')
@section('heading', 'نویسنده‌ها')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.authors.create') }}" class="rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-bold text-white shadow transition hover:bg-brand-700">+ نویسنده جدید</a>
</div>

<div class="overflow-hidden rounded-2xl border border-ink-200/70 bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead class="border-b border-ink-200/70 bg-ink-50 text-xs text-ink-800/70">
            <tr>
                <th class="px-4 py-3 text-right font-semibold">نام</th>
                <th class="px-4 py-3 text-right font-semibold">نامک</th>
                <th class="px-4 py-3 text-right font-semibold">کتاب‌ها</th>
                <th class="px-4 py-3 text-right font-semibold">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr class="border-b border-ink-100 last:border-0 hover:bg-ink-50/50">
                    <td class="px-4 py-3 font-semibold">{{ $author->name }}</td>
                    <td class="px-4 py-3 text-ink-800/60" dir="ltr">{{ $author->slug }}</td>
                    <td class="px-4 py-3">{{ $author->books_count }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.authors.edit', $author) }}" class="text-brand-700 hover:underline">ویرایش</a>
                            <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" onsubmit="return confirm('حذف شود؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-ink-800/60">نویسنده‌ای نیست.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $authors->links() }}</div>
@endsection
