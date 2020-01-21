<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Classroom;
use Auth;
use Image;

class ClassroomController extends Controller
{
    //For Creating new Classroom
    public function createClassRoom(Request $request){
        try{
            $user = Auth::user(); //Get the Current User
            $role=$user->roles->first()->name;
            if(($role == 'Moderator') || ($role == 'Admin') ){
                $active_status = true;
            }else{
                $active_status = false;
            }
            $classroom = new Classroom();
            $classroom-> topics = $request->get("topics");
            $classroom-> department_id = $request->get("department_id");
            $classroom-> subject_id = $request->get("subject_id");
            $classroom-> date = $request->get("datepicker");
            $classroom-> location = $request->get("location");
            $classroom-> start_time = $request->get("timepicker");
            $classroom-> active_status = $active_status;
            $classroom-> user_id = $user->id;
            if ($classroom->Save()) {
                //$user_data->roles()->attach(Role::where('name', 'User')->first());
                if($active_status){
                    return back()->with('success', 'Congrats ! You have Created Your classroom Successfully');
                }
                return back()->with('success', 'Class Room was Created Successfully ! Please wait for Admin/Moderator Approval');
            } else {
                return "Failed";
            }
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }
    }


    public function getClassroom(){
        //$user = Auth::user(); //Get the Current User
        $class_rooms = Classroom::all()->where('active_status', true);
        return View('user.classroom',['class_rooms' => $class_rooms]);

        //$users = \App\Classroom::with('users')->where('active_status', true)->get();
        //return View('user.classroom',compact('users', 'class_rooms'));
    }

    public function getPendingClassroom(Request $request){
        $class_rooms = Classroom::all()->where('active_status', false);
        return View('user.pendingClassrooms',['class_rooms' => $class_rooms]);
    }

    public function showClassRooms(){
        $user = Auth::user(); //Get the Current User
        //$class_rooms = ClassRoom::find(1)->user()->where('id', 4)->first();
        $class_rooms = Classroom::all()->where('user_id', $user->id);

        return back()->with($class_rooms);

    }

    //For joining in the classroom
    public function joinClassroom(Request $request){
        $classroom_id = $request->get('class_id');
        $user = Auth::user(); //Get the Current User
        $classroom = Classroom::find($classroom_id);
        if($classroom -> available_seats>0){
            $user->classrooms()->attach($classroom_id);
            $classroom -> available_seats = $classroom -> available_seats - 1;
            $classroom->Update();
            return back()->with('success', 'Congrats !! you are now a member of this classroom 😍😃');
        }else{
            return back()->with('success', 'Sorry ! classroom is already full 🙁😦');
        }
    }

    //For joining in the classroom
    public function unrollClassroom($id){
        $classroom_id = decrypt($id);
        $user = Auth::user(); //Get the Current User
        $classroom = Classroom::where('id', $classroom_id)->first();
        $classroom->users()->detach(User::where('id', $user->id)->first());
        $classroom -> available_seats = $classroom -> available_seats + 1;
        $classroom->Update();
        return back()->with('success', 'You are successfully removed from the classroom');
    }

    public function viewClassroom($id){
        $classroom_id = decrypt($id);
        $classroom = Classroom::where('id', $classroom_id)->first();
        return View('user.enrolledMembers',['classroom' => $classroom]);
    }

    public function approveClassroom($id){

        try {
            $classroom_id = decrypt($id);
            $classroom = Classroom::find($classroom_id);
            $classroom -> active_status = true;
            if ($classroom->Update()) {
                return back()->with('success', 'Classroom has been approved Successfully');
                //echo "Data Updated Successfully";
            } else {
                echo "Failed";
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function editClassroom($id){
        $classroom_id = decrypt($id);
        $classroom = Classroom::find($classroom_id);
        return View('modifyClassroom',['classroom' => $classroom]);
    }

    public function updateClassroom(Request $request){
        try {
            $classroom = Classroom::find($request->get('classroom_id'));
            $classroom->topics = $request->get('topics');
            $classroom->date = $request->get('date');
            $classroom->location = $request->get('location');
            $classroom->start_time = $request->get('start_time');
            if ($classroom->Update()) {
                return back()->with('success', 'Classroom has been updated Successfully');
            } else {
                return back()->with('success', 'Failed to save data');
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function removeClassroom($id){

        try {
            $classroom_id = decrypt($id);
            $classroom = Classroom::find($classroom_id);
            $classroom->users()->detach();
            if($classroom->Delete()) {
                return back()->with('success', 'Classroom has been removed Successfully');
            } else {
                echo "Failed";
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
