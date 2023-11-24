@extends('layout.app')

@section('content')

    <h1 class="text-3xl font-semibold mb-4">{{ isset($task) ? "Edit Task" : "Add Task" }}</h1>

        <form action="{{ isset($task) ? route("tasks.edit", ["task" => $task->id]) : route("tasks.store") }}" method="POST">
            @isset($task)
                @method("PUT")
            @endisset
            @csrf
            <div class="mb-3">
                <label for="title" class="block text-sm uppercase text-gray-700 mb-2">Title</label>
                <input
                    type="text"
                    value="{{ $task->title ?? old("title") }}"
                    name="title"
                    id="titl"
                    class="shadow-sm appearance-none rounded-sm border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:ring-1 focus:ring-gray-700 focus:ring-offset-1 transition-all"
                >
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm uppercase text-gray-700 mb-2">
                    Description
                </label>
                <textarea
                    name="description"
                    id="description"
                    rows="8"
                    class="shadow-sm appearance-none rounded-sm border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:ring-1 focus:ring-gray-700 focus:ring-offset-1 transition-all"
                >{{ $task->description ?? old("description") }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row items-center gap-x-3">
                <a href="{{ route("tasks.index") }}" class="rounded-md px-2 py-1 text-center text-gray-700 font-medium shadow-sm ring-1 ring-gray-700/20 hover:ring-red-500/80 hover:bg-red-100 transition-all">Cancel</a>
                <button
                    type="submit"
                    class="rounded-md px-2 py-1 text-center text-gray-700 font-medium shadow-sm ring-1 ring-gray-700/20 hover:bg-gray-100 transition-all"
                >
                {{ isset($task) ? "Save Changes" : "Create Task" }}
            </button>
            </div>
        </form>
@endsection
