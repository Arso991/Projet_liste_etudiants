<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function affectcourses(){
        $students = Students::all();
        $courses = Courses::all();

        return view('attributeclass', compact('students', 'courses'));
    }

    public function affectstore(Request $request){
        $data = $request->all();

        dd($data);
    }
}
