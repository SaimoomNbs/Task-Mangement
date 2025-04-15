@extends('layouts.master')
@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded">
                <h3 class="text-lg font-semibold">Headmasters</h3>
                <p class="text-2xl">{{ $headmasterCount }}</p>
            </div>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <h3 class="text-lg font-semibold">Teachers</h3>
                <p class="text-2xl">{{ $teacherCount }}</p>
            </div>
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                <h3 class="text-lg font-semibold">Students</h3>
                <p class="text-2xl">{{ $studentCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection