<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    //student datas
    public function studentData(){
        $students = Students::all();
        
        //sauvegarde du tableau dans session
        return view('student', compact('students'));
    }

    public function studentDetails($id=null){
        $students = Students::all();

        $data = Students::find($id);

        /* $idl = Students::latest('id')->first(); */
        
        return view('studentdetails', compact('id', 'data', 'students'));
    }

    public function addStudent(Request $request){
        $data = $request->all();

        $valide = $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "birthday" => "required",
            "hobbie1" => "required",
            "hobbie2" => "required",
            "hobbie3" => "required",
            "specialite" => "required",
            "biographie" => "required"
        ]);
        
        $save = Students::create([
            "nom" => $data['nom'],
            "prenom" => $data['prenom'],
            "birthday" => $data['birthday'],
            "hobbie1" => $data['hobbie1'],
            "hobbie2" => $data['hobbie2'],
            "hobbie3" => $data['hobbie3'],
            "specialite" => $data['specialite'],
            "biographie" => $data['biographie']
        ]);

        return redirect()->route('index')->with('message', "Enrégistrement fait !");
    }
}
