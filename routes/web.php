<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'UserRegLoginController@WelcomePage');
Route::post('save-user-data','UserRegLoginController@insertData');
Route::post('verify-user','UserRegLoginController@checkLogin');
Route::get('user-dashboard', 'UserMainController@getUserDashboard');
Route::get('dashboard', [
    'uses' => 'UserMainController@getAdminDashboard',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('all-departments', [
    'uses' => 'UserMainController@getAllDepartments',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('view-department/{id}', [
    'uses' => 'UserMainController@viewDepartment',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);



Route::post('add-department', [
    'uses' => 'UserMainController@addDepartment',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('remove-department/{id}', [
    'uses' => 'UserMainController@removeDepartment',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);



Route::post('add-subject', [
    'uses' => 'UserMainController@addSubject',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('remove-subject/{id}', [
    'uses' => 'UserMainController@removeSubject',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::get('all-users', [
    'uses' => 'UserMainController@getAllUsers',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('remove-user/{id}', [
    'uses' => 'UserMainController@removeUser',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('user-logout', 'UserRegLoginController@logout');


//Virtual classroom Section:
Route::post('Create-Virtual-Classroom', [
    'uses' => 'ClassroomController@createClassRoom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator']
]);

Route::get('user-virtual-classroom', [
    'uses' => 'ClassroomController@getClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('pending-classrooms', [
    'uses' => 'ClassroomController@getPendingClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','Admin']
]);

Route::get('approve-classroom/{id}', [
    'uses' => 'ClassroomController@approveClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','Admin']
]);

Route::post('join-classroom', [
    'uses' => 'ClassroomController@joinClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User']
]);

Route::get('unroll-classroom/{id}', [
    'uses' => 'ClassroomController@unrollClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User']
]);
Route::get('view-classroom/{id}', [
    'uses' => 'ClassroomController@viewClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('show-available-classrooms', 'ClassroomController@showClassRooms');

Route::get('edit-classroom/{id}', [
    'uses' => 'ClassroomController@editClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User', 'Admin']
]);

Route::post('update-classroom', [
    'uses' => 'ClassroomController@updateClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User', 'Admin']
]);

Route::get('remove-classroom/{id}', [
    'uses' => 'ClassroomController@removeClassroom',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User', 'Admin']
]);

//End of Virtual classroom Section

Route::get('profile/{id}', [
    'uses' => 'UserMainController@getProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('edit-profile/{id}', [
    'uses' => 'UserMainController@getEditProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);
Route::post('update-profile', [
    'uses' => 'UserMainController@updateProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('users-role', [
    'uses' => 'UserMainController@getUserRoles',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('assign-roles', [
    'uses' => 'UserMainController@postAdminAssignRoles',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    return view('user.test');
});



//Forum section

Route::get('forum', [
    'uses' => 'ForumController@getForum',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('forum/{category}', [
    'uses' => 'ForumController@getForumByCategory',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::post('add-category', [
    'uses' => 'ForumController@addCategory',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::get('remove-category/{id}', [
    'uses' => 'ForumController@removeCategory',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('create-post', [
    'uses' => 'ForumController@createPost',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('remove-post/{id}', [
    'uses' => 'ForumController@removePost',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::post('add-like', [
    'uses' => 'ForumController@addLike',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::post('add-comment', [
    'uses' => 'ForumController@addComment',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('remove-comment/{id}', [
    'uses' => 'ForumController@removeComment',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

