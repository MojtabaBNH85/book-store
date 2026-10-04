@props(['book'])

<article class="group flex flex-col overflow-hidden rounded-2xl border border-ink-200/70 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <div class="relative aspect-[3/4] overflow-hidden bg-gradient-to-br from-brand-100 via-ink-100 to-ink-200">
        @if ($book->cover_image)
            <img src="{{ asset($book->cover_image) }}" alt="{{ $book->name }}" loading="lazy"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                onerror="this.style.display='none'">
        @endif
        <div class="absolute inset-0 grid place-items-center -z-0 p-6 text-center">
            <span class="text-2xl font-extrabold leading-snug text-ink-900/70">{{ $book->name }}</span>
        </div>
        @if ($book->stock <= 0)
            <span class="absolute right-3 top-3 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">ناموجود</span>
        @elseif($book->stock < 10)
            <span class="absolute right-3 top-3 rounded-full bg-amber-500 px-3 py-1 text-xs font-bold text-white">تنها {{ $book->stock }} عدد</span>
        @endif
    </div>

    <div class="flex flex-1 flex-col gap-2 p-4">
        <p class="text-xs font-medium text-brand-700">{{ $book->category?->name }}</p>
        <h3 class="font-bold leading-snug">{{ $book->name }}</h3>
        <p class="text-xs text-ink-800/70">{{ $book->authors->pluck('name')->join('، ') }}</p>

        <div class="mt-auto flex items-center justify-between pt-2">
            <p class="font-extrabold text-ink-900">{{ number_format($book->price) }} <span class="text-xs font-normal">ریال</span></p>
            @if ($book->ratings_count > 0)
                <span class="text-xs font-semibold text-amber-600">★ {{ number_format($book->avg_rating, 1) }}</span>
            @endif
        </div>
    </div>
</article>
