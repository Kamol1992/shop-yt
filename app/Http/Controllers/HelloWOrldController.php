<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWOrldController extends Controller
{
    public function show(){
        return view('hello');
    }
}
