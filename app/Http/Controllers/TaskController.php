<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Get all task categories
     * @return Collection
     */
    public function getCategories() : Collection
    {
       return Category::all(['id','name']);
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $tasks = Task::query()->with('category')->orderByDesc('id')->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categories = $this->getCategories();

        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateTaskRequest $request
     */
    public function store(CreateTaskRequest $request)
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
        $categories = $this->getCategories();

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return to_route('tasks.show', $task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('tasks.index');
    }
    /**
     * Mark as done a specified task
     */
    public function markAsDone(Task $task)
    {
        $task->done = true;
        $task->save();

        return back();
    }
}
