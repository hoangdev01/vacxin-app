<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function show(){
        return view("helloworld");
    }
    public function showListUser(){
        $users = DB::table('users')->pluck('id', 'name');
        return view("helloworld")->with("users", $users);
    }
}
