@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500">Total Item</p>
                <p class="text-2xl font-bold text-slate-800">{{ $totalItems }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-tags"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500">Total Kategori</p>
                <p class="text-2xl font-bold text-slate-800">{{ $totalCategories }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-sack-dollar"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500">Total Nilai Aset</p>
                <p class="text-2xl font-bold text-slate-800">Rp {{ number_format($totalAssetValue, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-8">
        <h2 class="font-semibold text-slate-700 mb-4">Stok per Kategori</h2>
        <canvas id="stockChart" height="90"></canvas>
    </div>

    {{-- <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="p-4 font-medium">Kategori</th>
                    <th class="p-4 font-medium">Total Stok</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($stockPerCategory as $category)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 text-slate-700">{{ $category->category_name }}</td>
                        <td class="p-4 text-slate-700">{{ $category->items_sum_stock ?? 0 }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="p-4 text-center text-slate-400">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('stockChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($stockPerCategory->pluck('category_name')) !!},
                datasets: [{
                    label: 'Total Stok',
                    data: {!! json_encode($stockPerCategory->pluck('items_sum_stock')) !!},
                    backgroundColor: [
                        '#367588',
                        '#4A90E2',
                        '#50E3C2',
                        '#F5A623',
                    ],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
@endsection
