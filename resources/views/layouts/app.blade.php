<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
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
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-green-600 text-center">Todo App</h1>
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
