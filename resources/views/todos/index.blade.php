@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('todos.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Add New Todo
            </a>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($todos as $todo)
                <div class="todo-card border rounded-lg p-4 {{ $todo->completed ? 'completed' : 'bg-white' }}">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center space-x-2">
                            <form action="{{ route('todos.complete', $todo) }}" method="POST">
                                @csrf
                                <button type="submit" class="focus:outline-none">
                                    <svg class="custom-checkbox {{ $todo->completed ? 'text-green-500' : 'text-gray-300' }}"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </form>
                            <h3 class="text-lg font-semibold {{ $todo->completed ? 'line-through text-gray-400' : '' }}">
                                {{ $todo->title }}
                            </h3>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('todos.edit', $todo) }}"
                               class="text-blue-500 hover:text-blue-600">
                                Edit
                            </a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:text-red-600"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @if($todo->description)
                        <p class="text-gray-600 mb-2">{{ $todo->description }}</p>
                    @endif
                    @if($todo->due_date)
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $todo->due_date->format('M d, Y') }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
