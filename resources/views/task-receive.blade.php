@extends('layouts.master')
@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                <!-- <div class="text-sm text-gray-600">
                    <strong>Assigned To:</strong>
                    <ul class="list-disc ml-5 mt-1">
                        @foreach($task->users as $user)
                        <li>{{ $user->name }} <span class="text-xs text-gray-400">({{ $user->getRoleNames()->first() }})</span></li>
                        @endforeach
                    </ul>
                </div> -->
            </div>
            @empty
            <p class="col-span-full text-center text-red-500">No tasks received.
            </p>
            @endforelse
        </div>
    </div>
</div>
@endsection