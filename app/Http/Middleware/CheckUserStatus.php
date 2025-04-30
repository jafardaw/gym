<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (auth()->check()) {
            $user = auth()->user();
            
            switch ($user->status) {
                case 'inactive':
                    auth()->logout();
                    return redirect()->route('login')
                           ->with('error', 'حسابك غير مفعل. يرجى التواصل مع الإدارة.');
                
                case 'suspended':
                    if (!request()->is('account/suspended')) {
                        return redirect()->route('account.suspended')
                               ->with('suspended_until', $user->suspended_until);
                    }
                    break;
                
                case 'banned':
                    auth()->logout();
                    return redirect()->route('account.banned')
                           ->with('ban_reason', $user->status_reason);
            }
        }

        return $next($request);
    }
    }

