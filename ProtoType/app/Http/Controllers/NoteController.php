<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        
           return view('note.index');
       
    }
    public function verify(){
        echo "posted";
    }
}
