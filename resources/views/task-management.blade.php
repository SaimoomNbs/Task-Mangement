@extends('layouts.master')
@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold mb-4">Task List</h2>
        <a href="{{route('task.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm flex items-center space-x-1">
            <i class="fa-solid fa-plus"></i>
            <span>Create Task</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
        <div class="bg-white rounded shadow p-5">
            <h3 class="text-xl font-semibold mb-2">{{ $task->title }}</h3>
            <p class="text-gray-700 mb-4">{{ $task->description }}</p>

            <div class="text-sm text-gray-600 mb-2">
                <strong>Assigned By:</strong> {{ $task->assignedBy->name ?? 'N/A' }}
            </div>
            <div class="text-sm text-gray-600 mb-2">
                    <strong>Assigned Time:</strong> {{ $task->created_at->diffForHumans() }}
                </div>
            <div class="text-sm text-gray-600">
                <strong>Assigned To:</strong>
                <ul class="list-disc ml-5 mt-1">
                    @foreach($task->users as $user)
                    <li>{{ $user->name }} <span class="text-xs text-gray-400">({{ $user->getRoleNames()->first() }})</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-red-500">No tasks found. 
            <a href="{{route('task.create')}}" class="text-blue-500 text-underline">Create Task</a>
        </p>
        @endforelse
    </div>
</div>
@endsection