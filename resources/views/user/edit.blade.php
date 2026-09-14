@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    <form method="POST" action="{{ route('user.update', $user) }}" class="bg-white p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2">
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full border rounded px-3 py-2">
            @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Password Baru</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-gray-500">Kosongkan jika tidak ingin ganti password</p>
            @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1">Role</label>
            <select name="role" class="w-full border rounded px-3 py-2">
                <option value="staff" {{ old('role', $user->role) === 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('user.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
