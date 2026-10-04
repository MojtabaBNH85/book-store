<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <label for="name" class="mb-1 block text-sm font-semibold">نام *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('name') border-red-500 @enderror">
        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="slug" class="mb-1 block text-sm font-semibold">نامک (انگلیسی) *</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug ?? '') }}" required dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white @error('slug') border-red-500 @enderror">
        @error('slug')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="mb-1 block text-sm font-semibold">توضیحات</label>
        <textarea id="description" name="description" rows="3"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">{{ old('description', $category->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="image" class="mb-1 block text-sm font-semibold">مسیر عکس</label>
        <input type="text" id="image" name="image" value="{{ old('image', $category->image ?? '') }}" dir="ltr"
            class="w-full rounded-xl border border-ink-200 bg-ink-50 px-4 py-2.5 outline-none focus:border-brand-500 focus:bg-white">
    </div>
</div>
