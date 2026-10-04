<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ورق | فروشگاه کتاب')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-ink-50 text-ink-900 min-h-screen flex flex-col font-sans">
    <header class="sticky top-0 z-50 border-b border-ink-200/70 bg-white/85 backdrop-blur">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex h-16 items-center justify-between gap-4">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <span class="grid size-9 place-items-center rounded-xl bg-brand-600 text-lg font-extrabold text-white">و</span>
                    <span class="text-lg font-extrabold tracking-tight">ورق</span>
                </a>

                <nav class="hidden items-center gap-6 text-sm font-medium text-ink-800 md:flex">
                    <a href="{{ url('/') }}" class="transition hover:text-brand-600">خانه</a>
                    <a href="{{ url('/') }}#books" class="transition hover:text-brand-600">کتاب‌ها</a>
                    <div class="group relative">
                        <button class="flex items-center gap-1 py-5 transition hover:text-brand-600">
                            دسته‌بندی‌ها
                            <svg class="size-3.5 transition group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="pointer-events-none invisible absolute right-0 top-full w-64 translate-y-2 rounded-2xl border border-ink-200/70 bg-white p-3 opacity-0 shadow-2xl shadow-ink-900/10 transition-all duration-200 group-hover:pointer-events-auto group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:pointer-events-auto group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                            <p class="px-3 pb-2 pt-1 text-[11px] font-bold tracking-wide text-ink-800/50">همه دسته‌بندی‌ها</p>
                            <div class="space-y-1">
                            @forelse ($navCategories ?? [] as $navCategory)
                                <a href="{{ route('categories.show', $navCategory->slug) }}"
                                    class="flex items-center gap-3 rounded-xl px-3 py-3 transition hover:bg-brand-50">
                                    <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-brand-100 text-sm font-extrabold text-brand-700">‹</span>
                                    <span class="flex-1 font-semibold text-ink-900 hover:text-brand-700">{{ $navCategory->name }}</span>
                                </a>
                            @empty
                                <p class="px-3 py-3 text-xs text-ink-800/60">دسته‌ای نیست.</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="flex items-center gap-2 text-sm">
                    @auth
                        <span class="hidden rounded-full bg-ink-100 px-3 py-1.5 font-medium sm:inline">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </span>
                        @if (auth()->user()->is_admin && Route::has('admin.dashboard'))
                            <a href="{{ route('admin.dashboard') }}" class="rounded-lg bg-ink-900 px-3 py-2 font-medium text-white transition hover:bg-ink-800">پنل مدیریت</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="rounded-lg bg-ink-900 px-3 py-2 font-medium text-white transition hover:bg-ink-800">داشبورد</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="rounded-lg border border-ink-200 px-3 py-2 font-medium text-ink-800 transition hover:border-red-300 hover:text-red-600">خروج</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-lg border border-ink-200 px-4 py-2 font-semibold transition hover:border-brand-500 hover:text-brand-700">ورود</a>
                        <a href="{{ route('register') }}" class="rounded-lg bg-brand-600 px-4 py-2 font-semibold text-white shadow-sm transition hover:bg-brand-700">ثبت‌نام</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="border-t border-ink-200/70 bg-white">
        <div class="max-w-6xl mx-auto px-4 py-8 flex flex-col items-center justify-between gap-3 text-sm text-ink-800 sm:flex-row">
            <p>© {{ date('Y') }} ورق — همه حقوق محفوظ است.</p>
            <p class="text-xs">قیمت‌ها به ریال • ارسال به سراسر کشور</p>
        </div>
    </footer>
</body>
</html>
