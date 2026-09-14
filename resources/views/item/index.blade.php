@extends('layouts.app')
@section('title', 'Item')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Item</h1>
        <a href="{{ route('item.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Item
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Gambar</th>
                <th class="p-3 text-left">Nama Item</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-left">Stok</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="border-t">
                    <td class="p-3">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">
                                No image
                            </div>
                        @endif
                    </td>
                    <td class="p-3">{{ $item->item_name }}</td>
                    <td class="p-3">{{ $item->category->category_name }}</td>
                    <td class="p-3">
                        <span class="{{ $item->stock <= 5 ? 'text-red-600 font-semibold' : 'text-green-600' }}">
                            {{ $item->stock }}
                        </span>
                    </td>
                    <td class="p-3">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('item.edit', $item) }}" class="text-yellow-600">Edit</a>
                        <form method="POST" action="{{ route('item.destroy', $item) }}"
                              class="inline" onsubmit="return confirm('Yakin hapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-3 text-center text-gray-500">Belum ada item.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
