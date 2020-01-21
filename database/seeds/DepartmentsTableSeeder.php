<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = new Department();
        $department->initial = 'CSE';
        $department->name = 'Computer Science and Engineering';
        $department->department_code = 15;
        $department->save();

        $department = new Department();
        $department->initial = 'SWE';
        $department->name = 'Software Engineering';
        $department->department_code = 16;
        $department->save();

        $department = new Department();
        $department->initial = 'TE';
        $department->name = 'Textile Engineering';
        $department->department_code = 17;
        $department->save();

        $department = new Department();
        $department->initial = 'EEE';
        $department->name = 'Electrical and Electronics Engineering';
        $department->department_code = 18;
        $department->save();

        $department = new Department();
        $department->initial = 'ETE';
        $department->name = 'Electronics and Telecommunication Engineering';
        $department->department_code = 19;
        $department->save();

        $department = new Department();
        $department->initial = 'MCT';
        $department->name = 'Multimedia and Creative Technology';
        $department->department_code = 20;
        $department->save();
    }
}
