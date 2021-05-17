<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sample;


class Users extends Controller
{
    //
    function index()
    {
        $users=sample::all();
        return $users;
        //return view('sample',['name'=>'Gowtham']);
        //return ['name'=>'Gowtham'];
    }
}
