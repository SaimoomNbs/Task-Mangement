<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    @auth
        <!-- Dashboard Box -->
        <div class="bg-white p-10 rounded-lg shadow-lg text-center w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}</h1>
            <p class="text-gray-600 mb-6">You are logged in successfully.</p>
            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Go to Dashboard</a>
        </div>
    @else
        <!-- Login and Register Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl w-full px-4">
            <!-- Login -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Login</h2>
                <p class="text-gray-600 mb-6">Already have an account?</p>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600">Login</a>
            </div>

            <!-- Register -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Register</h2>
                <p class="text-gray-600 mb-6">Create a new account</p>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600">Register</a>
            </div>
        </div>
    @endauth
</body>
</html>
