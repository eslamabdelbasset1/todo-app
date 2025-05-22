<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .todo-card:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        .completed {
            background-color: #f0fdf4;
            border-color: #34d399;
        }
        .custom-checkbox {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8 max-w-4xl">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold ">
            <a href="{{ route('todos.index') }}"
               class="text-green-600 hover:text-gray-600 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline underline:none">
                Todo App
            </a>

            </h1>
        <div class="space-x-4">
            @auth
                <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="text-gray-600 hover:text-gray-800">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
            @endauth
        </div>
    </div>

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
