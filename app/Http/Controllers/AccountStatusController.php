<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountStatusController extends Controller
{
public function suspended()
{
    return view('account.suspended', [
        'until' => session('suspended_until')
    ]);
}}
