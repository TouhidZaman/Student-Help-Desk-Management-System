<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Please seed DepartmentTable First

        //CSE Department subjects
        $subject = new Subject();
        $subject->name = 'Computer Fundamentals';
        $subject->subject_code = 'CSE112';
        $subject->department_id = 1;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Programming and Problem Solving';
        $subject->subject_code = 'CSE122';
        $subject->department_id = 1;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Data Structure';
        $subject->subject_code = 'CSE134';
        $subject->department_id = 1;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Object Oriented Programming';
        $subject->subject_code = 'CSE214';
        $subject->department_id = 1;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Mathematics-I: Differential and Integral Calculus';
        $subject->subject_code = 'MAT111';
        $subject->department_id = 1;
        $subject->save();

        //SWE Department subjects
        $subject = new Subject();
        $subject->name = 'Programming Language';
        $subject->subject_code = 'SWE122';
        $subject->department_id = 2;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Java Programming';
        $subject->subject_code = 'SWE132';
        $subject->department_id = 2;
        $subject->save();

        $subject = new Subject();
        $subject->name = 'Dot Net Programming';
        $subject->subject_code = 'SWE313';
        $subject->department_id = 2;
        $subject->save();
    }
}
