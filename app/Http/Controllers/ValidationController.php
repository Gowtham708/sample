<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\form;
use App\Models\Page;
use Session;





use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\newPassword;
use App\Mail\MailNotify;
use App\Jobs\SendEmailJob;
use App\Jobs\SendEmails;


class ValidationController extends Controller
   
{
    public function _construct(Page $user)
    {
        $this->user = $user;
    }

    public function formValidation()
    {
        return view('form');
    }
    public function homepage(){
        return view('home');
    }
    public function loginpage(){
        return view('login');
    }
    public function forgot(){
        return view('forgot');
    }
    public function sentemail()
    {
        return view('sentemail');
    }
    public function setpassword(Request $request){
       // $getEmail = $this->usersreg->where('email',$email)->first();
        //dd($email);

        return view('newpassword')->with(['id'=> $request->id]);
    }
    
    public function logout(){
        Session::flush();
        return redirect('login');
    }
    public function validateForm(Request $request){
            $this->validate($request,array(
                                    'name' => 'required|max:255',
                                    'email' => 'required|email|max:255',
                                    'password' => 'required|min:6',
                                    'confirm_password' => 'required|min:6'
            )
                            );
            
            //$input = $request->all();        
            //dd($request->email);
            //dd($input); // dd() helper function is print_r alternative
            
            Page::create(array(
                            'name' => $request->name, 
                            'email' => $request->email,
                            'password' => bcrypt($request->password),
                            'confirm_password'=>bcrypt($request->password)
            ));
            
            Session::flash('flash_message', 'User registration successful!');
    
            //return redirect()->back();
            //return redirect('user');
            return redirect('/login');
        }
    public function loginForm(Request $request){
       
        $this->validate($request,[
            'name' => 'required|max:30',

            'password' => 'required|min:5'
            ]);
          // $user = $request->all();
           $user = Page::where('name',$request->name)->first();
           if($user && Hash::check($request->password,$user->password)){
               //Session::start();
    Session::put('id',$user->id);
    Session::put('name',$user->name);

    //toastr()->success('Login Success');
    return redirect('/home')->with('success','Login Successfully');
           }
            else{
                return back()->with('error','Invalid Login Credentials');
            }
}
public function forgotpassword(Request $request){
    

    $user = Page::where('email',$request->email)->first();

    
    if(isset($user)){
        $details = new SendEmailJob($request->all());
        //dd($details);
        dispatch($details);
        return redirect('/sent')->with('success','Login Successfully');
    }else{
        return back()->with('error','Invalid Login Credentials');
    }
}
public function newPassword(Request $request){
    $this->validate($request, [
        
        'email' => 'required|email|max:255',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|min:6'
        
    ]);

    if (Hash::check($request->new_password, $request->confirm_password)) { 
       $user->fill([
        'password' => Hash::make($request->new_Password)
        ])->save();

       $request->session()->flash('success', 'Password changed');
        return redirect('/login');

    } else {
        $request->session()->flash('error', 'Password does not match');
        return redirect('/login');
    }
}
}           