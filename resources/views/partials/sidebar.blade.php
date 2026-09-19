<aside class="w-64 bg-slate-900 text-slate-300 flex flex-col">
    <div class="px-6 py-5 border-b border-slate-800">
        <h2 class="text-white font-bold text-lg flex items-center gap-2">
            <i class="fa-brands fa-confluence text-blue-400"></i> Asset Management
        </h2>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-1">
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                  {{ request()->routeIs('home') ? 'bg-teal-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
            <i class="fa-solid fa-house w-4"></i> Home
        </a>

        <a href="{{ route('category.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                  {{ request()->routeIs('category.*') ? 'bg-teal-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
            <i class="fa-solid fa-tags w-4"></i> Category
        </a>

        <a href="{{ route('item.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                  {{ request()->routeIs('item.*') ? 'bg-teal-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
            <i class="fa-solid fa-box w-4"></i> Asset Items
        </a>

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('user.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                      {{ request()->routeIs('user.*') ? 'bg-teal-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-users w-4"></i> User Management
            </a>
        @endif
    </nav>

    <div class="px-3 py-4 border-t border-slate-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex items-center gap-3 w-full px-3 py-2 rounded-lg text-red-400 hover:bg-slate-800 transition">
                <i class="fa-solid fa-right-from-bracket w-4"></i> Logout
            </button>
        </form>
    </div>
</aside>
