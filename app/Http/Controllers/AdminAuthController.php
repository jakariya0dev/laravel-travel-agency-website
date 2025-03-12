<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    
    public function LoginView(Request $request){
        return view("admin.login");
    }

    public function login(Request $request){

        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);

        $userData = $request->only(["email","password"]);

        if(Auth::guard("admin")->attempt($userData)){
            return redirect()->route("admin.dashboard")->with("success","Login successful");
        }else{
            return redirect()->back()->with("error","Invalid credentials");
        }
    }

    public function logout(){
        Auth::guard("admin")->logout();
        return redirect()->route("admin.login")->with("success","Admin Logout successful");
    }

    public function resetPasswordView($token, $email){

        $admin = Admin::where("email", $email)->where("token", $token)->first();

        if($admin){
            return view("admin.reset-password", compact(['token', 'email']));
        }else{
            return redirect()->route("admin.login")->with("error","Invalid reset link");
        }
    }

    public function forgotPasswordView(Request $request){
        return view("admin.forgot-password");
    }

    public function forgotPasswordSubmit(Request $request){
        $request->validate([
            "email"=> "required|email"
        ]);

        $email = $request->email;

        $admin = Admin::where("email", $request->email)->first();


        if($admin){

            $token = hash("sha256", time());
            $admin->token = $token;
            $admin->update();

            $reset_link = url('admin/reset-password/'.$token.'/'.$admin->email);
            $subject = 'Reset Password';
            $message = 'Click on the link to reset your password: <a href="'.$reset_link.'">Reset Password</a>';

            Mail::to($admin->email)->send(new ResetPassword($subject, $message));

            return view('admin.login')->with("success","Password reset link sent to your email");

        }else{
            return redirect()->back()->with("error","Email not found");
        }
    }

    public function updatePassword(Request $request, $token, $email){

        $request->validate([
            "password"=> "required",
            "confirm_password"=> "required|same:password"
        ]);

        $admin = Admin::where("email", $request->email)->where('token', $request->token)->first();

        if($admin){
            $admin->password = bcrypt($request->password);
            $admin->token = null;
            $admin->update();
            return redirect()->route("admin.login")->with("success","Password updated successfully");
        }
    }

        public function viewProfile(){
        return view('admin.profile');
    }

    public function profileUpdate(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->password){

            $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);

            $admin->password = bcrypt($request->password);
        }

        if ($request->hasFile('pro-pic')) {

            $file = $request->file('pro-pic');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '.' . $extension;
            $uploadPath = 'uploads/admin/';
            $fullPath = public_path($uploadPath . $filename);
            $file->move(public_path($uploadPath), $filename);

            // Delete old file only if it exists & not empty
            if (!empty($admin->photo) && file_exists(public_path($uploadPath . $admin->photo))) {
                unlink(public_path($uploadPath . $admin->photo));
            }

            $admin->photo = $filename;
        }

        


        
        $admin->update();

        return redirect()->route('admin.dashboard')->with('success', 'Profile Updated Successfully');

    }


}
