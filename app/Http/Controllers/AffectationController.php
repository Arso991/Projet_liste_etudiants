<?php

namespace App\Http\Controllers;

use App\Models\Affectations;
use App\Models\Courses;
use App\Models\Students;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function affectcourses(){
        $students = Students::all();
        $courses = Courses::all();
        
        $affect = Affectations::with("uac","amphi")->get();
        $affectBy = $affect->groupBy("student_id");
        
       

        return view('courses.attributeclass', compact('students', 'courses', 'affectBy'));
    }

    public function affectstore(Request $request){
        $data = $request->all();
       
        $request->validate([
            'student_id' => 'required',
            "course_id" => "required"
        ]);

        $course_ids = $request->input("course_id");

        foreach($course_ids as $id){
            if(Affectations::where('student_id', $data['student_id'])->where("course_id", $id)->exists()){
                return redirect()->back()->with("message", "Il y a un cours qui a été affecté a cet étudiant déjà !");
            }else{
                Affectations::create([
                    "student_id" => $data['student_id'],
                    "course_id" => $id
                ]);
            } 
        }

        return redirect()->back()->with("message", "Affectation de cours effectuée !");
    }
}
