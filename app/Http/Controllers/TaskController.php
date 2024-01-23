<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $tasks = Task::query()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateTaskRequest $request
     */
    public function store(CreateTaskRequest $request) : RedirectResponse
    {
        $task = Task::create($request->validated());

        return to_route('tasks.show', $task->id);
    }

    /**
     * Display the specified resource.
     * @param Task $task
     * @return View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
