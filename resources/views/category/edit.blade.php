@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 max-w-lg">
        <form method="POST" action="{{ route('category.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Kategori</label>
                <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}"
                       class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('category_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $category->description) }}</textarea>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="bg-teal-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-teal-700">
                    Update
                </button>
                <a href="{{ route('category.index') }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
