<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_moderator = Role::where('name', 'Moderator')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Bappy Das';
        $user->student_id = '143-15-4599';
        $user->department = 'CSE';
        $user->gender = 'Male';
        $user->email = 'bappy@diu.edu.bd';
        $user->mobile = '01681941237';
        $user->address = 'Sukrabadh, Dhaka';
        $user->password = Hash::make('123456');
        $user-> save();
        $user->roles()->attach($role_user);

        $moderator = new User();
        $moderator->name = 'Nayeem Akand';
        $moderator->student_id = '143-15-4589';
        $moderator->department = 'CSE';
        $moderator->gender = 'Male';
        $moderator->email = 'nayeem@diu.edu.bd';
        $moderator->mobile = '01681941237';
        $moderator->address = 'Sukrabadh, Dhaka';
        $moderator->password = Hash::make('123456');
        $moderator-> save();
        $moderator->roles()->attach($role_moderator);

        $admin = new User();
        $admin->name = 'Muhammad Touhiduzzaman';
        $admin->student_id = '143-15-4572';
        $admin->department = 'CSE';
        $admin->gender = 'Male';
        $admin->email = 'touhid4572@diu.edu.bd';
        $admin->mobile = '01681941159';
        $admin->address = 'Sukrabadh, Dhaka';
        $admin->password = Hash::make('001122');
        $admin-> save();
        $admin->roles()->attach($role_admin);
    }
}
