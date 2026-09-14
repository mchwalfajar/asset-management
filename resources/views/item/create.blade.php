@extends('layouts.app')
@section('title', 'Tambah Item')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Item</h1>

    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Item</label>
            <input type="text" name="item_name" value="{{ old('item_name') }}"
                   class="w-full border rounded px-3 py-2">
            @error('item_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
            @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Stok</label>
            <input type="number" name="stock" value="{{ old('stock', 0) }}"
                   class="w-full border rounded px-3 py-2">
            @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1">Harga</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', 0) }}"
                   class="w-full border rounded px-3 py-2">
            @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('item.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
