@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-2xl mx-auto">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Edit Todo</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('todos.update', $todo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                    <input type="text" name="title" id="title" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500"
                           value="{{ old('title', $todo->title) }}"
                           placeholder="Todo title">
                    @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500"
                              placeholder="Todo description">{{ old('description', $todo->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                    <input type="date" name="due_date" id="due_date"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500"
                           value="{{ old('due_date', $todo->due_date ? $todo->due_date->format('Y-m-d') : '') }}">
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('todos.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Todo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
