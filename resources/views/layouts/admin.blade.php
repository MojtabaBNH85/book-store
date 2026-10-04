<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'پنل مدیریت ورق')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-ink-50 text-ink-900 min-h-screen font-sans">
    <div class="flex min-h-screen">
        <aside class="hidden w-60 shrink-0 flex-col bg-ink-900 text-white md:flex">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-5 py-5">
                <span class="grid size-9 place-items-center rounded-xl bg-brand-500 text-lg font-extrabold text-ink-900">و</span>
                <span class="font-extrabold">پنل ورق</span>
            </a>
            <nav class="flex flex-col gap-1 px-3 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">داشبورد</a>
                <a href="{{ route('admin.books.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.books.*') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">کتاب‌ها</a>
                <a href="{{ route('admin.categories.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">دسته‌بندی‌ها</a>
                <a href="{{ route('admin.authors.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.authors.*') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">نویسنده‌ها</a>
                <a href="{{ route('admin.users.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.users.*') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">کاربران</a>
                <a href="{{ route('admin.orders.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10 {{ request()->routeIs('admin.orders.*') ? 'bg-white/10 text-brand-300' : 'text-white/80' }}">سفارش‌ها</a>
            </nav>
            <div class="mt-auto p-4 text-xs text-white/50">
                <a href="{{ route('home') }}" class="hover:text-white">→ بازگشت به فروشگاه</a>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="border-b border-ink-200/70 bg-white">
                <div class="flex h-16 items-center justify-between px-4 md:px-8">
                    <h1 class="font-extrabold">@yield('heading', 'پنل مدیریت')</h1>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="rounded-full bg-ink-100 px-3 py-1.5 font-medium">{{ auth()->user()->first_name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline">خروج</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 md:px-8">
                @if (session('success'))
                    <div class="mb-4 rounded-xl border border-brand-200 bg-brand-50 px-4 py-3 text-sm font-medium text-brand-800">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
