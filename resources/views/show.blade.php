@extends('layout.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route("tasks.index") }}" class="font-medium text gray-700 decoration-pink-500 hover:underline flex flex-row items-center gap-3">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </span>
            <span>Go back to the task list</span>
        </a>
    </div>

    <h1 class="text-3xl font-semibold mb-4">{{ $task->title }}</h1>
    <p class="mb-4 text-gray-700">{{ $task->description }}</p>
    <p class="mb-4 text-sm font-medium text-gray-500">
        Created {{ $task->created_at->diffForHumans() }}
    </p>

    <p class="mb-4">
        @if ($task->is_completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <div class="flex flex-row items-center gap-x-3">
        {{-- Link  to edit task --}}
        <div>
            <a href="{{ route("tasks.edit", ['task' => $task]) }}"
                class="rounded-md px-2 py-1 text-center text-gray-700 font-medium shadow-sm ring-1 ring-gray-700/20 hover:bg-gray-100 transition-all"
            >
                Edit
            </a>
        </div>

        {{-- Marking as completed --}}
        <div>
            <form action="{{ route("tasks.toggle-complete", ["task" => $task]) }}" method="POST">
                @csrf
                @method("PUT")
                <button type="submit" class="text-sm rounded-md px-2 py-1 text-center text-gray-700 font-medium shadow-sm ring-1 ring-gray-700/20 hover:bg-gray-100 transition-all">
                    Mark as {{ $task->is_completed ? "not completed" : "completed" }}
                </button>
            </form>
        </div>

        {{-- Delete Task --}}
        <div>
            <form action="{{ route("tasks.destroy", ["task" => $task->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="text-sm rounded-md px-2 py-1 text-center text-gray-700 font-medium shadow-sm ring-1 ring-gray-700/20 hover:ring-red-500/80 hover:bg-red-100 transition-all">Delete</button>
            </form>
        </div>
    </div>




@endsection
