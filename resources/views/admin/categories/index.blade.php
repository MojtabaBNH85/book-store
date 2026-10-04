@extends('layouts.admin')

@section('title', 'مدیریت دسته‌بندی‌ها')
@section('heading', 'دسته‌بندی‌ها')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.categories.create') }}" class="rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-bold text-white shadow transition hover:bg-brand-700">+ دسته جدید</a>
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
            @forelse ($categories as $category)
                <tr class="border-b border-ink-100 last:border-0 hover:bg-ink-50/50">
                    <td class="px-4 py-3 font-semibold">{{ $category->name }}</td>
                    <td class="px-4 py-3 text-ink-800/60" dir="ltr">{{ $category->slug }}</td>
                    <td class="px-4 py-3">{{ $category->books_count }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('categories.show', $category->slug) }}" class="text-ink-800/60 hover:underline">نمایش</a>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-brand-700 hover:underline">ویرایش</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('حذف شود؟ کتاب‌هایش هم حذف می‌شوند!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-ink-800/60">دسته‌ای نیست.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $categories->links() }}</div>
@endsection
