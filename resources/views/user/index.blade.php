@extends('layouts.app')
@section('title', 'User Management')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manajemen User</h1>
        <a href="{{ route('user.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah User
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Username</th>
                <th class="p-3 text-left">Role</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-t">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->username }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs text-white {{ $user->role === 'admin' ? 'bg-purple-600' : 'bg-gray-500' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('user.edit', $user) }}" class="text-yellow-600">Edit</a>
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('user.destroy', $user) }}"
                                  class="inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">Belum ada user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
