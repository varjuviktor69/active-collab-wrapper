<?php

namespace App\Http\Controllers\ActiveCollab;

use App\Dtos\ActiveCollab\TaskFilterDto;
use App\Interfaces\ActiveCollab\TaskService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController
{
    public function __construct(private TaskService $taskService) {}

    public function index(): View
    {
        return view('tasks.index');
    }

    public function ajax(Request $request): View
    {
        $tasks = $this->taskService->getAllFiltered(TaskFilterDto::fromRequest($request));

        return view('tasks.tasks', ['tasks' => $tasks]);
    }

    public function view(Request $request, int $id): View
    {
        $request->merge(['taskId' => $id]);

        $task = $this->taskService->find(TaskFilterDto::fromRequest($request));

        \Log::info($task->toArray());
        return view('tasks.view', $task->toArray());
    }
}
