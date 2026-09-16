<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Management')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-100">
    <div class="flex min-h-screen">
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col">
            {{-- Header --}}
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center">
                <h1 class="text-lg font-semibold text-slate-700">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-500">{{ auth()->user()->name }}</span>
                    <span class="text-xs px-2 py-1 rounded-full font-medium
                        {{ auth()->user()->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-slate-200 text-slate-600' }}">
                        {{ ucfirst(auth()->user()->role) }}
                    </span>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 p-8">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
