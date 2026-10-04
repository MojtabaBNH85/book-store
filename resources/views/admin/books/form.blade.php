<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <label for="name" class="mb-1 block text-sm font-semibold">نام کتاب *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $book->name ?? '') }}" required
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('name') border-red-500 @enderror">
        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="slug" class="mb-1 block text-sm font-semibold">نامک (انگلیسی) *</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $book->slug ?? '') }}" required dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('slug') border-red-500 @enderror">
        @error('slug')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="mb-1 block text-sm font-semibold">توضیحات</label>
        <textarea id="description" name="description" rows="3"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">{{ old('description', $book->description ?? '') }}</textarea>
        @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="category_id" class="mb-1 block text-sm font-semibold">دسته‌بندی *</label>
        <select id="category_id" name="category_id" required
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">
            <option value="">انتخاب کن…</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id ?? '') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-sm font-semibold">نویسنده‌ها</label>
        <div class="flex max-h-32 flex-wrap gap-2 overflow-y-auto rounded-xl border border-ink-200 bg-ink-50 p-3">
            @foreach ($authors as $author)
                <label class="flex items-center gap-1.5 rounded-lg bg-white px-2.5 py-1.5 text-xs shadow-sm">
                    <input type="checkbox" name="authors[]" value="{{ $author->id }}"
                        @checked(in_array($author->id, old('authors', isset($book) ? $book->authors->pluck('id')->all() : [])))>
                    {{ $author->name }}
                </label>
            @endforeach
        </div>
    </div>

    <div>
        <label for="price" class="mb-1 block text-sm font-semibold">قیمت (ریال) *</label>
        <input type="number" id="price" name="price" value="{{ old('price', $book->price ?? 0) }}" min="0" required dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('price') border-red-500 @enderror">
        @error('price')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="stock" class="mb-1 block text-sm font-semibold">موجودی *</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock ?? 0) }}" min="0" required dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">
        @error('stock')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="cover_image" class="mb-1 block text-sm font-semibold">مسیر عکس جلد</label>
        <input type="text" id="cover_image" name="cover_image" value="{{ old('cover_image', $book->cover_image ?? '') }}" dir="ltr" placeholder="books/cover.jpg"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">
    </div>

    <div>
        <label for="published_at" class="mb-1 block text-sm font-semibold">سال انتشار</label>
        <input type="number" id="published_at" name="published_at" value="{{ old('published_at', $book->published_at ?? '') }}" min="1000" max="2100" dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">
        @error('published_at')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="isbn" class="mb-1 block text-sm font-semibold">شابک</label>
        <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('isbn') border-red-500 @enderror">
        @error('isbn')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" id="is_active" name="is_active" value="1"
            @checked(old('is_active', $book->is_active ?? true)) class="size-4 rounded accent-emerald-600">
        <label for="is_active" class="text-sm font-semibold">فعال / نمایش در فروشگاه</label>
    </div>
</div>
