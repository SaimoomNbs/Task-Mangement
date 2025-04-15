<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                        sidebar: '#312e81'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-sidebar text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="text-2xl font-bold p-6 border-b border-indigo-800">{{ Auth::user()->getRoleNames()->first() }} Panel</div>
            <nav class="flex-1 px-4 py-6">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center space-x-2 rounded px-3 py-2 transition
                      {{ request()->routeIs('dashboard') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
                            <i class="fa-solid fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    @role('Headmaster|Teacher')
                    <li>
                        <a href="{{ route('user.all') }}"
                            class="flex items-center space-x-2 rounded px-3 py-2 transition
                      {{ request()->routeIs('user.all') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
                            <i class="fa-solid fa-users"></i>
                            <span>Users Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('task.all') }}"
                            class="flex items-center space-x-2 rounded px-3 py-2 transition
                      {{ request()->routeIs('task.all') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
                            <i class="fa-solid fa-list-check"></i>
                            <span>Task Management</span>
                        </a>
                    </li>
                    @endrole

                    @role('Teacher|Student')
                    <li>
                        <a href="{{ route('task.receive') }}"
                            class="flex items-center space-x-2 rounded px-3 py-2 transition
                      {{ request()->routeIs('task.receive') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
                            <i class="fa-solid fa-file-import"></i>
                            <span>Received Task</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>

            <div class="px-6 py-4 border-t border-indigo-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out
                    </a>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex flex-col flex-1">

            <!-- Topbar -->
            <header class="bg-white shadow flex items-center justify-between px-6 py-4">
                <div class="text-xl font-semibold text-gray-700"></div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-600">👋 Hello, {{ Auth::user()->name }}</span>
                    <a href="{{route('profile.edit')}}">
                        <img src="https://i.pravatar.cc/30?img=12" class="w-8 h-8 rounded-full" alt="User Avatar">
                    </a>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                {{-- Success Alert --}}
                @if(session('success'))
                <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                <div class="flex items-center bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4" role="alert">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle mr-2 mt-1"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>