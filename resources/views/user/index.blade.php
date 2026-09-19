@extends('layouts.app')
@section('title', 'User Management')

@section('content')
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kelola akun pengguna sistem</p>
        <a href="{{ route('user.create') }}"
           class="bg-teal-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-teal-700 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah User
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="p-4 font-medium">Nama</th>
                    <th class="p-4 font-medium">Username</th>
                    <th class="p-4 font-medium">Role</th>
                    <th class="p-4 font-medium"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 text-slate-700 font-medium flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-xs font-semibold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            {{ $user->name }}
                            @if ($user->id === auth()->id())
                                <span class="text-xs text-slate-400">(Anda)</span>
                            @endif
                        </td>
                        <td class="p-4 text-slate-500">{{ $user->username }}</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-600' }}">
                                <i class="fa-solid {{ $user->role === 'admin' ? 'fa-user-shield' : 'fa-user' }}"></i>
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('user.edit', $user) }}"
                                   class="text-amber-500 hover:text-amber-600" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('user.destroy', $user) }}"
                                          onsubmit="return confirm('Yakin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-slate-400">
                            <i class="fa-regular fa-user text-2xl block mb-2"></i>
                            Belum ada user.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-slate-100">
            {{ $users->links() }}
        </div>
    </div>
@endsection
