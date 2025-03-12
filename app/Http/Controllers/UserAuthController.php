<?php

namespace App\Http\Controllers;

use App\Mail\UserVerify;
use App\Models\User;
use Auth;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    public function loginView(Request $request){
        return view('web.auth.login');
    }

    public function loginSubmit(Request $request){

        $credentials = $request ->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if(Auth::attempt($credentials)){
            return redirect()->route('user.dashboard')->with('success','Login success');
        }else{
            return back()->with('error','Inavlid credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.login.view')->with('success','Logout Successful');
    }

    public function signup(Request $request){
        return view('web.auth.signup');
    }

    public function signupSubmit(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $token = hash('sha256', time());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token'=> $token
        ]);

        if($user){

            // Send email verification link
            $verify_link = url('user-email/verify/'.$token.'/'.$request->email);
            $subject = 'Verify Account';
            $message = 'Click on the link to verfy your account: <a href="'.$verify_link.'">Verify Account</a>';

            Mail::to($request->email)->send(new UserVerify($subject, $message));

            return redirect()->route('user.login')->with('success','Check email to verify account');
        }
        else{return back()->with('error','Cannot create user account');}
    }

    public function verifyUserEmail(Request $request, $token, $email){

        // dd($email, $token);
        $user = User::where('email', $email)->where('token' , $token)->first();
        if($user){
            $user->status = 1;
            $user->token = null;
            $user->update();
            return redirect()->route('user.login')->with('success','Email verified successfully');
        }
        else{
            return redirect()->route('user.login')->with('error','Invalid token');
        }
    }

    public function forgotPasswordView(){

        return view('web.auth.forget-password');
    }
    
    public function forgotPasswordSubmit(Request $request){

        $request->validate([
            'email'=> 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            $token = hash('sha256', time());
            $reset_link = url('/reset-password/'.$token.'/'.$user->email);
            $subject = 'Reset Password';
            $message = 'Click on the link to reset your password: <a href="'.$reset_link.'">Reset Password</a>';
            Mail::to($request->email)->send(new UserVerify($subject, $message));
            $user->token = $token;
            $user->update();
            return redirect()->route('user.login')->with('success','Reset link sent to email');
        }else{
            return back()->with('error','Email not found');
        }
        

    }

    public function resetPasswordView(Request $request, $token, $email){

        // dd($token, $email);

        return view('web.auth.reset', ['token'=> $token,'email'=> $email]);
    }

    public function resetPasswordSubmit(Request $request, $token, $email){

        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->where('token', $request->token)->first();

        if($user){
            $user->password = bcrypt($request->password);
            $user->token = null;
            $user->update();
            return redirect()->route('user.login')->with('success','Password reset successfully');
        }
        else{
            return redirect()->route('user.login')->with('error','Invalid token');
        }
    }

    public function profileUpdateSubmit(Request $request){

        $request->validate([
            'email'=> 'required|email',
            'name' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        if($request->password){
            $request->validate([
                'confirm_password'=> 'required|same:password'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if($user){
            
            $user->name = $request->name;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zip = $request->zip;
            $user->phone = $request->phone;
            $user->address = $request->address;
            // $user->email = $request->email;

            if($request->password){
                $user->password = bcrypt($request->password);
            }

            $user->update();

            return redirect()->route('user.dashboard')->with('success','Profle updated successfully');

        }
    }

    public function profileView(){

    return view("web.user.profile");
    }


}
