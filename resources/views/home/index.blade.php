@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <h1 class="text-2xl font-bold mb-1">Selamat datang, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-600 mb-6">Role: {{ auth()->user()->role }}</p>

    {{-- Card ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-blue-600 text-white p-6 rounded-lg shadow">
            <p class="text-sm opacity-80">Total Item</p>
            <p class="text-3xl font-bold">{{ $totalItems }}</p>
        </div>
        <div class="bg-green-600 text-white p-6 rounded-lg shadow">
            <p class="text-sm opacity-80">Total Kategori</p>
            <p class="text-3xl font-bold">{{ $totalCategories }}</p>
        </div>
        <div class="bg-purple-600 text-white p-6 rounded-lg shadow">
            <p class="text-sm opacity-80">Total Nilai Aset</p>
            <p class="text-3xl font-bold">Rp {{ number_format($totalAssetValue, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Chart bar: stok per kategori --}}
    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-lg font-semibold mb-4">Stok per Kategori</h2>
        <canvas id="stockChart" height="100"></canvas>
    </div>

    {{-- Tabel rincian --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Total Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockPerCategory as $category)
                    <tr class="border-t">
                        <td class="p-3">{{ $category->category_name }}</td>
                        <td class="p-3">{{ $category->items_sum_stock ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-3 text-center text-gray-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('stockChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($stockPerCategory->pluck('category_name')) !!},
                datasets: [{
                    label: 'Total Stok',
                    data: {!! json_encode($stockPerCategory->pluck('items_sum_stock')) !!},
                    backgroundColor: '#2563eb',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });
    </script>
@endsection
