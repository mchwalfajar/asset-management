<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Asset Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen px-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm">
        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-boxes-stacked text-white text-2xl"></i>
            </div>
            <h1 class="text-xl font-bold text-slate-800">Asset Management</h1>
            <p class="text-sm text-slate-500">Masuk untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                <div class="relative">
                    <i class="fa-solid fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" name="username" value="{{ old('username') }}"
                           class="w-full border border-slate-300 rounded-lg pl-9 pr-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required autofocus>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="password" name="password"
                           class="w-full border border-slate-300 rounded-lg pl-9 pr-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>
            </div>
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
</body>
</html>
