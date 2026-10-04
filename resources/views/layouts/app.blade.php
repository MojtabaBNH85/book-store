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
                    <a href="{{ url('/') }}#categories" class="transition hover:text-brand-600">دسته‌بندی‌ها</a>
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
