<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Department;
use App\Like;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Role;
use App\User;
use App\Classroom;
use Auth;
use Image;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class UserMainController extends Controller
{


    //For viewing Roles to the Admin
    public function getUserRoles(){
        $users = User::all();
        return View('user.userRoles', ['users' => $users]);
        //return $users;
    }

    public function getUserDashboard(){
        $user = Auth::user(); //Get the Current User
        $class_rooms = Classroom::all()->where('user_id', $user->id);
        return View('user.dashboard',['class_rooms' => $class_rooms, 'user' => $user]);

    }

    public function getAdminDashboard(){
        $user = Auth::user(); //Get the Current User
        $class_rooms = Classroom::all();
        return View('admin.dashboard',['class_rooms' => $class_rooms]);
    }

    //Departments and Subjects Section
    public function getAllDepartments(){
        $departments = Department::all();
        return View('admin.allDepartments', ['departments' => $departments]);
    }

    public function viewDepartment($id){

        $department = Department::find(decrypt($id));
        return View('admin.Department',['department' => $department]);
    }

    public function addDepartment(Request $request){
        $department =  new Department();
        $department->name = $request->get('department_name');
        $department->initial = $request->get('department_initial');
        $department->department_code = $request->get('department_code');
        if($department->save()){
            return back()->with('success','Congrats !! Department has been added');
        }else{
            return back()->with('success','Sorry !! Failed to save data');
        }

    }

    public function removeDepartment($id){
        $department = Department::find(decrypt($id));
        if($department->Delete()){
            return back()->with('success','Warning !! Department has been Removed');
        }else{
            return back()->with('success','Sorry !! Failed to save remove data');
        }
    }

    public function addSubject(Request $request){
        $subject =  new Subject();
        $subject->name = $request->get('subject_name');
        $subject->subject_code = $request->get('subject_code');
        $subject->department_id = $request->get('department_id');
        //return $subject;
        if($subject->save()){
            return back()->with('success','Congrats !! Subject has been added');
        }else{
            return back()->with('success','Sorry !! Failed to save data');
        }

    }
    public function removeSubject($id){
        $subject = Subject::find(decrypt($id));
        if($subject->Delete()){
            return back()->with('danger','Warning !! Subject has been Removed');
        }else{
            return back()->with('danger','Sorry !! Failed to save remove data');
        }
    }//End of Departments and Subjects Section

    public function getAllUsers(){
        return View('admin.allUsers');
    }

    public function removeUser($id){
        $user_id = decrypt($id);
        $user = User::find($user_id);
        $Classrooms = Classroom::where('user_id', $user_id);
        foreach ($Classrooms as $classroom){
            $classroom->users()->detach();
        }
        $user->classrooms()->detach();
        $Classrooms->Delete();
        $user->comments()->Delete();
        $user->likes()->Delete();
        $user->posts()->Delete();
        if($user->Delete()){
            return back()->with('success','User has been Removed');
        }else{
            return back()->with('success','Failed to Remove user');
        }
    }





    //view Profile
    public function getProfile($id){
        $user_id = decrypt($id);
        $user =  User::where('id', $user_id)->first();
        return View('profile',['user' => $user]);
    }

    public function getEditProfile($id){
        $user_id = decrypt($id);
        $user =  User::where('id', $user_id)->first();
        return View('updateProfile',['user' => $user]);
    }

    public function updateProfile(Request $request){
        $user = User::find($request->get('user_id'));
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/assets/avatars/'.$filename));
            $user->avatar = $filename;
        }
        $user->name = $request->get('name');
        $user->gender = $request->get('gender');
        $user->mobile = $request->get('mobile');
        $user->address = $request->get('street');
        if($user->Update()){
            return back()->with('success', 'Profile has been updated successfully !!');
        }else{
            return back()->with('success', 'Failed to save data !!');
        }
    }

    // changing Roles For the Users
    public function postAdminAssignRoles(Request $request){
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if($request['role_moderator']){
            $user->roles()->attach(Role::where('name', 'Moderator')->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return back()->with('success', 'Roles has been updated Successfully !!');
    }

}
