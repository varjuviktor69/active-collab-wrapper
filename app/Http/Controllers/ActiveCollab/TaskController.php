<?php

namespace App\Http\Controllers\ActiveCollab;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController
{
    public function index(): View
    {
        // TODO: implement logic
        return view('tasks.index');
    }

    public function view(): View
    {
        // TODO: implement logic
        return view('tasks.view');
    }
}
