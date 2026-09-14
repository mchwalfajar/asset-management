@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

    <form method="POST" action="{{ route('category.update', $category) }}" class="bg-white p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Kategori</label>
            <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}"
                   class="w-full border rounded px-3 py-2">
            @error('category_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $category->description) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('category.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
