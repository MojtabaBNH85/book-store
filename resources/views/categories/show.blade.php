@extends('layouts.app')

@section('title', $category->name . ' | ورق')

@section('content')
<div class="border-b border-ink-200/70 bg-white">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <p class="text-xs font-semibold text-brand-700">دسته‌بندی</p>
        <h1 class="mt-1 text-2xl font-extrabold md:text-3xl">{{ $category->name }}</h1>
        @if ($category->description)
            <p class="mt-2 max-w-2xl text-sm leading-7 text-ink-800/70">{{ $category->description }}</p>
        @endif
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 py-10">
    @if ($books->isEmpty())
        <div class="rounded-2xl border border-dashed border-ink-200 bg-white p-10 text-center text-sm text-ink-800/60">
            در این دسته هنوز کتابی نیست.
        </div>
    @else
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($books as $book)
                <x-book-card :book="$book" />
            @endforeach
        </div>
        <div class="mt-8">{{ $books->links() }}</div>
    @endif
</div>
@endsection
