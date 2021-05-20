@extends('sample')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
       <div class="pull-left">
       <h2>Edit Student</h2>
       </div>
       <div class="pull-right">

       </div>
    </div>
 </div>   
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
 <ul>
     @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
      </ul>
      </div>
 @endif
 <div class="row">
   <form action="{{ route('student.update',$student->id) }}" method="POST">
   @csrf
   
   <div class="col-sm-4">

   <input type="hidden" name="id" value="{{ $student->id}}">

    <div class="left">
      <strong>Name</strong>
      <input type="text" name="name" value="{{ $student->name}}" class="form-control" placeholder="Name">
    </div>

    <div class="left">
      <strong>Address</strong>
      <input type="text" name="Address" value="{{ $student->Address}}" class="form-control" placeholder="Address">
    </div>
    <br>
    <div class="left">
         <button type="submit" class="btn btn-primary">Submit</button>
         </div>
         </div>
         </form>
    </div>
@endsection