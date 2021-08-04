<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    function user(){
        $user = User::get();

        return response()->json($user,200);
    }
}