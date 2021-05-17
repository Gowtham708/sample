<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sample;


class Users extends Controller
{
    //
    function index()
    {
        return sample::find(1);
        //return view('sample',['name'=>'Gowtham']);
        //return ['name'=>'Gowtham'];
    }
}
