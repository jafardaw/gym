<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return response()->json([
            'message' => 'تم إنشاء البوست بنجاح',
            'post' => $post
        ]);
    }
}
