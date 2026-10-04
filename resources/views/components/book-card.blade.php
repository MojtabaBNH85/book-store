@props(['book'])

<article class="group flex flex-col overflow-hidden rounded-3xl border border-ink-200/60 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-ink-900/10">
    <div class="relative aspect-[3/4] overflow-hidden bg-gradient-to-br from-brand-100 via-ink-100 to-ink-200">
        @if ($book->cover_image)
            <img src="{{ asset($book->cover_image) }}" alt="{{ $book->name }}" loading="lazy"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.06]"
                onerror="this.style.display='none'">
        @endif
        <div class="absolute inset-0 grid place-items-center p-6 text-center">
            <span class="text-2xl font-extrabold leading-snug text-ink-900/60">{{ $book->name }}</span>
        </div>
        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-ink-900/40 to-transparent opacity-0 transition group-hover:opacity-100"></div>
        @if ($book->stock <= 0)
            <span class="absolute right-3 top-3 rounded-full bg-red-600/95 px-3 py-1 text-xs font-bold text-white shadow">ناموجود</span>
        @elseif($book->stock < 10)
            <span class="absolute right-3 top-3 rounded-full bg-amber-500/95 px-3 py-1 text-xs font-bold text-white shadow">تنها {{ $book->stock }} عدد</span>
        @endif
        @if ($book->ratings_count > 0)
            <span class="absolute left-3 top-3 rounded-full bg-white/90 px-2.5 py-1 text-xs font-extrabold text-amber-600 shadow backdrop-blur">★ {{ number_format($book->avg_rating, 1) }}</span>
        @endif
    </div>

    <div class="flex flex-1 flex-col gap-1.5 p-4">
        <p class="text-[11px] font-bold tracking-wide text-brand-700">{{ $book->category?->name }}</p>
        <h3 class="font-bold leading-snug">{{ $book->name }}</h3>
        <p class="text-xs text-ink-800/60">{{ $book->authors->pluck('name')->join('، ') }}</p>

        <div class="mt-auto flex items-center justify-between border-t border-ink-100 pt-3">
            <p class="font-extrabold text-ink-900">{{ number_format($book->price) }} <span class="text-[11px] font-normal text-ink-800/60">ریال</span></p>
            <span class="grid size-9 place-items-center rounded-full bg-brand-600 text-lg font-bold text-white transition group-hover:bg-brand-500">+</span>
        </div>
    </div>
</article>
