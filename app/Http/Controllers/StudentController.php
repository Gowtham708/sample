<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Http\Controllers\StudentController;

class StudentController extends Controller
{
    public function index(){
    $students = student::all();
    //dd($students);
    return view('index',compact('students'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
    student::create([
        'name'=> $request ->input('name'),
        'Address'=>$request->input('Address'),    
        ]);
        return redirect()->route('student.index')->with('success','student has been added');
    }

    public function edit(student $student)
    {
        return view('edit')->with('student',$student);
    }



   public function update(Request $request,student $student)
   {
       $student->update([
        'name'=> $request ->input('name'),
        'address'=>$request->input('address'),
        ]);
        return redirect()->route('student.index')->with('success','student has been updated');
   }

   public function destroy(student $student)
   {
       $student->delete();
       return redirect()->route('student.index')->with('success','student has been deleted');
   }
}

