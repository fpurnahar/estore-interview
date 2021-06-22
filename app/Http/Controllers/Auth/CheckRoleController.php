<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleController extends Controller
{

    public function checkAccess(Request $request)
    {
        $chekck = Auth::user()->access;
        // dd($chekck);
        if ($chekck == 0) {
            return redirect()->route('user.cms');
        }elseif ($chekck == 1) {
            return redirect()->route('welcome');
        }

    }
}
