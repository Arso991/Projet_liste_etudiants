<?php

namespace App\Http\Controllers;

use App\Models\AffectationProfs;
use App\Models\Courses;
use App\Models\Professors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function professorlist(){
        $professors = Professors::all();

        return view('professors.professors', compact("professors"));
    }

    public function addprofessor(){
        return view('professors.addprofessor');
    }

    public function addprofessorStore(Request $request){
        $user = Auth::user();
        $data = $request->all();

        $request->validate([
            "lastname"=>"required|min:2",
            "firstname"=>"required|min:2",
            "call"=>"required|numeric|min:8",
            "address"=>"required|min:2",
        ]);

        $save = Professors::create([
            "lastname"=>$data["lastname"],
            "firstname"=>$data["firstname"],
            "call"=>$data["call"],
            "address"=>$data["address"],
            "user_id"=>Auth::user()->id,
        ]);

        return redirect()->route("professorList")->with("message", "L'enseignant a été ajouté avec succès");

    }

    public function professorcourse($id){
        $id = Professors::find($id);
        $courses = Courses::all();
        $affect = AffectationProfs::with("profs", "cours")->get();
        $affectProfs = $affect->groupBy("professor_id");

        return view('professors.addprofessor', compact('id', 'courses', 'affectProfs'));
    }
}
