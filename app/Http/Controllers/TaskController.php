<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index ()
    {
        $tasks = Task::latest()->paginate(10);
        return view('index', ["tasks" => $tasks]);
    }
    public function show(Task $task)
    {
        if (!$task) {
            abort(404);
        }
        return view("show", ["task" => $task]);
    }

    public function store (TaskRequest $request)
    {
        $payload = $request->validated();

        $task = Task::create($payload);

        return redirect()->route("tasks.show", ["task" => $task->id])
                ->with("success", "New task added.");
    }

    public function edit (Task $task)
    {
        return view("edit", ["task" => $task]);
    }

    public function update (TaskRequest $request, Task $task)
    {
        $payload = $request->validated();

        $task->update($payload);

        return redirect()->route("tasks.show", ["task" => $task->id])
                ->with("success", "Task updated.");
    }

    public function destroy (Task $task)
    {
        $task->delete();

        return redirect()->route("tasks.index")->with("success", "Task removed from the list");
    }

    public function toggleComplete (Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();

        return redirect()->back()->with("success", "Task updated.");
    }
}
