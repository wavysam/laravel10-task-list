@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-semibold mb-4">List of tasks</h1>

    <nav class="mb-4">
        <a href="{{ route("tasks.create") }}" class="font-medium text gray-700 underline decoration-pink-500">Add new task</a>
    </nav>

    @forelse ($tasks as $task)
    <p class="leading-8">
        <a href="{{ route('tasks.show', ["task" => $task->id]) }}"
            @class(['hover:underline', 'line-through text-gray-500' => $task->is_completed])
        >
            {{ $task->title }}
        </a>
    </p>
    @empty
        <p>No task.</p>
    @endforelse

    {{-- pagination --}}
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif

@endsection
