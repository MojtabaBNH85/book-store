@extends('layouts.app')

@section('title', 'ورق — فروشگاه کتاب')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-ink-900 text-white">
        <div class="absolute inset-0 bg-gradient-to-l from-brand-900 via-ink-900 to-ink-900"></div>
        <div class="absolute -left-24 -top-24 size-96 rounded-full bg-brand-500/20 blur-3xl"></div>
        <div class="absolute -bottom-32 right-1/4 size-80 rounded-full bg-brand-400/10 blur-3xl"></div>
        <div class="relative max-w-6xl mx-auto px-4 py-16 md:py-24">
            <p class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs font-medium text-brand-200">
                ارسال به سراسر کشور • قیمت به ریال
            </p>
            <h1 class="max-w-2xl text-3xl font-extrabold leading-tight md:text-5xl md:leading-tight">
                کتاب بعدی‌ات را <span class="text-brand-400">همین‌جا</span> پیدا کن
            </h1>
            <p class="mt-4 max-w-xl text-sm leading-7 text-white/70 md:text-base">
                از بوف کور هدایت تا کلیدر دولت‌آبادی — مجموعه‌ای از بهترین‌های ادبیات فارسی با نقد واقعی خوانندگان.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#books" class="rounded-xl bg-brand-500 px-6 py-3 text-sm font-bold text-ink-900 shadow-lg shadow-brand-500/25 transition hover:-translate-y-0.5 hover:bg-brand-400">مشاهده کتاب‌ها</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-xl border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">داشبورد من</a>
                @else
                    <a href="{{ route('register') }}" class="rounded-xl border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">همین حالا شروع کن</a>
                @endauth
            </div>
            <dl class="mt-10 flex flex-wrap gap-8 border-t border-white/10 pt-6 text-sm">
                <div>
                    <dt class="text-xs text-white/50">کتاب فعال</dt>
                    <dd class="mt-1 text-xl font-extrabold text-white">{{ number_format($stats['books']) }}+</dd>
                </div>
                <div>
                    <dt class="text-xs text-white/50">نویسنده</dt>
                    <dd class="mt-1 text-xl font-extrabold text-white">{{ number_format($stats['authors']) }}+</dd>
                </div>
                <div>
                    <dt class="text-xs text-white/50">دسته‌بندی</dt>
                    <dd class="mt-1 text-xl font-extrabold text-white">{{ number_format($stats['categories']) }}</dd>
                </div>
            </dl>
        </div>
    </section>

    {{-- Books --}}
    <section id="books" class="max-w-6xl mx-auto px-4 pb-16">
        <div class="mb-6 flex items-end justify-between">
            <div>
                <h2 class="text-xl font-extrabold md:text-2xl">تازه‌ترین کتاب‌ها</h2>
                <p class="mt-1 text-sm text-ink-800/60">منتخب این هفته فروشگاه</p>
            </div>
        </div>

        @if ($books->isEmpty())
            <div class="rounded-2xl border border-dashed border-ink-200 bg-white p-10 text-center text-sm text-ink-800/60">
                هنوز کتابی ثبت نشده است. با <code dir="ltr">php artisan db:seed</code> داده نمونه بساز.
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($books as $book)
                    <x-book-card :book="$book" />
                @endforeach
            </div>
        @endif
    </section>
@endsection
