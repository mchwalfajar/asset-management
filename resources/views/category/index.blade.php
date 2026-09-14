@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Kategori</h1>
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('category.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Kategori
            </a>
        @endif
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Nama Kategori</th>
                <th class="p-3 text-left">Deskripsi</th>
                <th class="p-3 text-left">Jumlah Item</th>
                @if (auth()->user()->role === 'admin')
                    <th class="p-3 text-left">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="border-t">
                    <td class="p-3">{{ $category->category_name }}</td>
                    <td class="p-3">{{ $category->description ?? '-' }}</td>
                    <td class="p-3">{{ $category->items_count }}</td>
                    @if (auth()->user()->role === 'admin')
                        <td class="p-3 space-x-2">
                            <a href="{{ route('category.edit', $category) }}" class="text-yellow-600">Edit</a>
                            <form method="POST" action="{{ route('category.destroy', $category) }}"
                                  class="inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
