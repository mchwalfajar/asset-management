@extends('layouts.app')
@section('title', 'Edit Item')

@section('content')
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 max-w-lg">
        <form method="POST" action="{{ route('item.update', $item) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Item</label>
                <input type="text" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                       class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('item_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Kategori</label>
                <select name="category_id"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Gambar</label>
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-16 h-16 object-cover rounded-lg border border-slate-200 mb-2">
                @endif
                <label class="flex items-center justify-center gap-2 border-2 border-dashed border-slate-300 rounded-lg px-3 py-6 text-sm text-slate-500 cursor-pointer hover:border-blue-400 hover:text-blue-500 transition">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span id="fileLabel">Klik untuk ganti gambar</span>
                    <input type="file" name="image" class="hidden"
                           onchange="document.getElementById('fileLabel').textContent = this.files[0]?.name || 'Klik untuk ganti gambar'">
                </label>
                <p class="text-xs text-slate-400 mt-1">Kosongkan jika tidak ingin ganti gambar</p>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $item->stock) }}"
                       class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Harga</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">Rp</span>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}"
                           class="w-full border border-slate-300 rounded-lg pl-9 pr-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-teal-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-teal-700">
                    Update
                </button>
                <a href="{{ route('item.index') }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
