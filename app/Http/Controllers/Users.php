<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\sample;

class Users extends Controller
{
    //
    function index()
    {
        return sample::all();
        //return view('sample',['name'=>'Gowtham']);
        //return ['name'=>'Gowtham'];
    }
}
