<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected function apiResponse($data = null, $message = '', $success = true, $code = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $code);
    }
    




    public function getIndex(){
        $task=[['id' => 1, 'title' => 'بنك بيمو السعودي الفرنسي', 'completed' => false],
        ['id' => 2, 'title' => 'بطاقات اءتمان', 'completed' => true],
    ];

    return response()->json(['success'=>true,'message'=>'تم جلب البيانات  بنجاح','data'=>$task],201);   
}
public function show($id)
{
    $task = Task::find($id);

    return $task
        ? $this->apiResponse($task, 'Task found.')
        : $this->apiResponse(null, 'Task not found.', false, 404);
}

public function index()
{
    return response()->json([
        'message' => 'Hello from TaskController'
    ]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'completed' => 'required'
    ]);

    $task = Task::find($id);

    if (!$task) {
        return response()->json([
            'success' => false,
            'message' => 'Task not found.'
        ], 404);
    }

    $task->update([
        'title' => $request->title,
        'completed' => filter_var($request->completed, FILTER_VALIDATE_BOOLEAN)
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Task updated successfully.',
        'data' => $task
    ], 200);
}

public function destroy($id)
{
    $task = Task::find($id);

    if (!$task) {
        return response()->json([
            'success' => false,
            'message' => 'Task not found.'
        ], 404);
    }

    $task->delete();

    return response()->json([
        'success' => true,
        'message' => 'Task deleted successfully.'
    ], 200);
}

}
