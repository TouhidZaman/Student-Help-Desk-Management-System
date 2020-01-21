<?php

namespace App\Http\Controllers;
//use App\Http\Models\userRegModel;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use App\Classroom;
use Illuminate\View\View;

class UserRegLoginController extends Controller
{
    public function WelcomePage(){
        return View('shdmsHome');
    }


    public function insertData(Request $request){
        $user_email = $request->get("email")."@diu.edu.bd";
        if(User::all()->where('email', $user_email)->first() == null){
            $user_data = new User();
            try{

                $user_data-> name = $request->get("name");
                $user_data-> student_id = $request->get("student_id");
                $user_data-> department_id = $request->get("department_id");
                $user_data-> gender = $request->get("gender");
                $user_data-> email = $user_email;
                $user_data-> mobile = $request->get("mobile");
                $user_data-> address = $request->get("address");
                $user_data-> password = Hash::make($request->get("password"));
                if ($user_data->Save()) {
                    $user_data->roles()->attach(Role::where('name', 'User')->first());
                    return redirect('/')->with('success', 'Registration Successfully Completed');
                } else {
                    echo "Registration Failed";
                }
            }
            catch (Exception $exception){
                echo $exception->getMessage();
            }
        }else{
            return back()->with('error', 'You are already registered !! please login or reset your account');
        }


    }

    public function checkLogin(Request $request){

        $user_data = array(
            'email' => $request->get("student_login_email"),
            'password'   => $request->get("student_login_password")
        );
        if(Auth::attempt($user_data)){
            $user = Auth::user(); //Get the Current User
            $role=$user->roles->first()->name;
            if($role == 'Admin'){
                return redirect('dashboard');
               // $class_rooms = Classroom::all();
                //return View('admin.dashboard',['class_rooms' => $class_rooms]);
            }else{
                //return View('user.dashboard');
                return redirect('user-dashboard');
            }
        }else{
            return back()->with('error', 'wrong login detail');
        }

    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
