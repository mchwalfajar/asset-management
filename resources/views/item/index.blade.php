@extends('layouts.app')
@section('title', 'Item')

@section('content')
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kelola data barang</p>
        <a href="{{ route('item.create') }}"
           class="bg-teal-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-teal-700 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Item
        </a>
    </div>

    <form method="GET" action="{{ route('item.index') }}" class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 mb-5 flex flex-wrap gap-3 items-end">
    <div class="flex-1 min-w-[200px]">
        <label class="block text-xs font-medium text-slate-500 mb-1">Cari Nama Item</label>
        <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik nama item..."
                   class="w-full border border-slate-300 rounded-lg pl-9 pr-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
    </div>

    <div class="min-w-[180px]">
        <label class="block text-xs font-medium text-slate-500 mb-1">Kategori</label>
        <select name="category_id" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-slate-700 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-slate-800">
        <i class="fa-solid fa-filter"></i> Filter
    </button>

    @if (request('search') || request('category_id'))
        <a href="{{ route('item.index') }}" class="text-slate-500 text-sm hover:text-slate-700 px-2">
            Reset
        </a>
    @endif
</form>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="p-4 font-medium">Gambar</th>
                    <th class="p-4 font-medium">Nama Item</th>
                    <th class="p-4 font-medium">Kategori</th>
                    <th class="p-4 font-medium">Stok</th>
                    <th class="p-4 font-medium">Harga</th>
                    <th class="p-4 font-medium"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($items as $item)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     class="w-12 h-12 object-cover rounded-lg border border-slate-200">
                            @else
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="p-4 text-slate-700 font-medium">{{ $item->item_name }}</td>
                        <td class="p-4">
                            <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded-full text-xs">
                                {{ $item->category->category_name }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if ($item->stock <= 5)
                                <span class="inline-flex items-center gap-1 bg-red-50 text-red-600 px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $item->stock }}
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 bg-green-50 text-green-600 px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fa-solid fa-check"></i> {{ $item->stock }}
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-slate-700">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('item.edit', $item) }}"
                                   class="text-amber-500 hover:text-amber-600" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form method="POST" action="{{ route('item.destroy', $item) }}"
                                      onsubmit="return confirm('Yakin hapus item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-slate-400">
                            <i class="fa-regular fa-box-open text-2xl block mb-2"></i>
                            Belum ada item.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-slate-100">
            {{ $items->links() }}
        </div>
    </div>
@endsection
