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

}
