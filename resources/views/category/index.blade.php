@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kelola kategori barang</p>
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('category.create') }}"
               class="bg-teal-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-teal-700 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Kategori
            </a>
        @endif
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500     text-left">
                <tr>
                    <th class="p-4 font-medium">Nama Kategori</th>
                    <th class="p-4 font-medium">Deskripsi</th>
                    <th class="p-4 font-medium">Jumlah Item</th>
                    @if (auth()->user()->role === 'admin')
                        <th class="p-4 font-medium"></th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 text-slate-700 font-medium">{{ $category->category_name }}</td>
                        <td class="p-4 text-slate-500">{{ $category->description ?? '-' }}</td>
                        <td class="p-4">
                            <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded-full text-xs">
                                {{ $category->items_count }}
                            </span>
                        </td>
                        @if (auth()->user()->role === 'admin')
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('category.edit', $category) }}"
                                       class="text-amber-500 hover:text-amber-600" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form method="POST" action="{{ route('category.destroy', $category) }}"
                                          onsubmit="return confirm('Yakin hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-slate-400">
                            <i class="fa-regular fa-folder-open text-2xl block mb-2"></i>
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-slate-100">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
