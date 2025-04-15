@extends('layouts.master')
@section('content')
<div class="py-10">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Create a New Task</h2>
                <a href="{{route('task.all')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm flex items-center space-x-1">
                    <!-- <i class="fa-solid fa-plus"></i> -->
                    <span>All Task</span>
                </a>
            </div>

            @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('task.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="title">Task Title</label>
                    <input type="text" name="title" id="title" required
                        class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-blue-200 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                        placeholder="Task description (optional)"></textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="user_ids">Assign To</label>
                    <select name="user_ids[]" id="user_ids" multiple required
                        class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-blue-200 focus:outline-none">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->getRoleNames()->first() }})
                        </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Hold Ctrl or Command to select multiple users.</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                        Assign Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection