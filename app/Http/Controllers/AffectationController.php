<?php

namespace App\Http\Controllers;

use App\Models\Affectations;
use App\Models\Courses;
use App\Models\Notes;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffectationController extends Controller
{
    public function affectcourses(){
        $students = Students::all();
        $courses = Courses::all();
        
        $affect = Students::with("affectationlist")->has("affectationlist")->get();
        //$affectBy = $affect->groupBy("student_id");
        
        
       

        return view('courses.attributeclass', compact('students', 'courses', 'affect'));
    }

    public function affectstore(Request $request){
        $data = $request->all();
        
        $request->validate([
            'student_id' => 'required',
            "course_id" => "required"
        ]);

        $course_ids = $request->input("course_id");

        foreach($course_ids as $id){
            
                Affectations::updateOrCreate([
                    "student_id" => $data['student_id'],
                    "course_id" => $id
                ]);
            
        }

        return redirect()->back()->with("message", "Affectation de cours effectuée !");
    }

    public function attributenote($idE, $idC){
        $idEt = Students::find($idE);
        $idCo = Courses::find($idC);
        $notedevoir = Notes::where("student_id", $idE)->where("course_id", $idC)->where("type", "Devoir")->pluck("note");
        $notepartiel = Notes::where("student_id", $idE)->where("course_id", $idC)->where("type", "Partiel")->pluck("note");

        $moydev = collect($notedevoir)->avg();
        $moypart = collect($notepartiel)->avg();

        /* $dev = Students::join('notes', "notes.student_id", "studentslist.id")
        ->join("courses", "courses.id", "notes.course_id")
        ->where("studentslist.id", $idE)
        ->where("courses.id", $idC)
        ->where("notes.type", "Devoir")
        ->select(DB::raw("avg(notes.note) as moyennedev"), "courses.name")
        ->groupBy("courses.name")->get()->toArray(); */

        /* $moypart = Students::join('notes', "notes.student_id", "studentslist.id")
        ->join("courses", "courses.id", "notes.course_id")
        ->where("studentslist.id", $idE)
        ->where("courses.id", $idC)
        ->where("notes.type", "Partiel")
        ->select(DB::raw("avg(notes.note) as moyennepart"), "courses.name")
        ->groupBy("courses.name")->get()->toArray(); */

        $moytotal = ($moydev + $moypart)/2;
    
        return view('courses.footnote', compact("idEt", "idCo", "notedevoir", "notepartiel", "moydev", "moypart", "moytotal"));
    }

    public function attributenotestore(Request $request, $idE, $idC){
        $data = $request->all();
        $notedevoir = Notes::where("student_id", $idE)->where("course_id", $idC)->where("type", "Devoir")->pluck("note");
        $notepartiel = Notes::where("student_id", $idE)->where("course_id", $idC)->where("type", "Partiel")->pluck("note");
        
        $request->validate([
            "note" => "required|numeric|max:100",
            "type" => "required"
        ]);
        if($data["type"]=="Devoir"){
            if(count($notedevoir)>1){
                return redirect()->back()->with("message", "L'etudiant a déja deux notes de devoir");
            }
        }
        
        if($data["type"]=="Partiel"){
            if(count($notepartiel)>1){
                return redirect()->back()->with("message", "L'etudiant a déja deux notes de partiel");
            }
        }

        Notes::create([
            "student_id" => $idE,
            "course_id" => $idC,
            "type" => $data["type"],
            "note"=> $data["note"]
        ]);

        return redirect()->back()->with("message", "Note attribuée !");
    }
}
