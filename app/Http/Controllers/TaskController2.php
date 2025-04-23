<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Task;

class TaskController2 extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255'
        ]);

        $task = Task::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Task created.',
            'data' => $task
        ], 201);
    }
}
