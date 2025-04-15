@extends('layouts.master')
@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">User List</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 text-left text-sm">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 border">ID</th>
                            <th class="px-4 py-3 border">Name</th>
                            <th class="px-4 py-3 border">Email</th>
                            <th class="px-4 py-3 border">Role</th>
                            <th class="px-4 py-3 border">Created At</th>
                            <th class="px-4 py-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $user->id }}</td>
                            <td class="px-4 py-2 border">{{ $user->name }}</td>
                            <td class="px-4 py-2 border">{{ $user->email }}</td>
                            <td class="px-4 py-2 border">
                                {{ $user->getRoleNames()->first() ?? '—' }}
                            </td>
                            <td class="px-4 py-2 border">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center space-x-1">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection