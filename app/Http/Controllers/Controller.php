<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function update(Request $request, Post $post)
{
    $post->tags()->sync($request->tags); 
    return redirect()->back()->with('success', 'تم تحديث الوسوم بنجاح');
}
////////Accessor function
public function getFullNameAttribute()
{
    return $this->first_name . ' ' . $this->last_name;
}

public function getEmailAttribute($value)
{
    $parts = explode('@', $value);
    return substr($parts[0], 0, 2) . '***@' . $parts[1];
}

}
