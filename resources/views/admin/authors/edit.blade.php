@extends('layouts.admin')

@section('title', 'ویرایش نویسنده')
@section('heading', 'ویرایش: ' . $author->name)

@section('content')
<form method="POST" action="{{ route('admin.authors.update', $author) }}" class="rounded-2xl border border-ink-200/70 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')
    @include('admin.authors.form')
    <div class="mt-6 flex gap-2">
        <button type="submit" class="rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-bold text-white shadow transition hover:bg-brand-700">به‌روزرسانی</button>
        <a href="{{ route('admin.authors.index') }}" class="rounded-xl border border-ink-200 px-6 py-2.5 text-sm font-semibold transition hover:bg-ink-50">انصراف</a>
    </div>
</form>
@endsection
