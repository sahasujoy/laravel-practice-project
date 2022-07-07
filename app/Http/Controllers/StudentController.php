<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function addStudent()
    {
        $student = DB::table('students')->insert([
            'name' => 'Sujoy Saha',
            'email' => 'sahasujoy.cse@gmail.com',
            'address' => 'Chattogram'
        ]);

        return ($student);
    }

    public function addCourse()
    {
        $course = DB::table('courses')->insert([
            'name' => 'DBMS',
            'student_id' => '1'
        ]);

        return ($course);
    }
}
