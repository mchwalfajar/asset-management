<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Asset Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-56 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-6">Asset Mgmt</h2>
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="block hover:bg-gray-700 p-2 rounded">Home</a>
                <a href="{{ route('category.index') }}" class="block hover:bg-gray-700 p-2 rounded">Category</a>
                <a href="{{ route('item.index') }}" class="block hover:bg-gray-700 p-2 rounded">Item</a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('user.index') }}" class="block hover:bg-gray-700 p-2 rounded">User Management</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block w-full text-left hover:bg-gray-700 p-2 rounded">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
