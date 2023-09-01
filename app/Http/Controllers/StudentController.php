<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    
    //fonction pour afficher les données de la table
    public function studentData(){
        $user = Auth::user();
        //$students = Students::where("user_id", $user->id)->get();
        $students = Students::all();
        $nom = $user ? $user->name:'';
        
        return view('student', compact('students', 'nom'));
    }

/*     public function allstudent(){
        $user = Auth::user();
        $students = Students::all();
        
        return view('student', compact('students'));
    } */

    //fonction pour afficher les détails
    public function studentDetails($id=null){
        $students = Students::all();

        $data = Students::find($id);
        
        return view('studentdetails', compact('id', 'data', 'students'));
    }

    //fonction pour renvoyer les données selon l'id et faire la mise à jour
    public function updateInfos($id=null){

        $dataUpdate = Students::find($id);
        
        return view('studentdetails', compact('id', 'dataUpdate'));
    }

    //fonction pour ajouter un étudiant
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
            "biographie" => "required",
            "picture" => "required | mimes:jpg,jpeg,png"
        ]);

        $image = null;
        $file = $request->file("picture");

        if($request->hasFile("picture")){
            $image = $file->store("profil");
        }
        
        
        $save = Students::create([
            "nom" => $data['nom'],
            "prenom" => $data['prenom'],
            "birthday" => $data['birthday'],
            "hobbie1" => $data['hobbie1'],
            "hobbie2" => $data['hobbie2'],
            "hobbie3" => $data['hobbie3'],
            "specialite" => $data['specialite'],
            "biographie" => $data['biographie'],
            "picture" => $image,
            "status" => true,
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route('index')->with('message', "Enrégistrement fait !");
    }

    //fonction pour mettre à jour dans la table
    public function updateStudent(Request $request, $id){
        $dataUpdate = $request->all();

        $affected = Students::where('id', $id)->update([
            "nom" => $dataUpdate['nom'],
            "prenom" => $dataUpdate['prenom'],
            "birthday" => $dataUpdate['birthday'],
            "hobbie1" => $dataUpdate['hobbie1'],
            "hobbie2" => $dataUpdate['hobbie2'],
            "hobbie3" => $dataUpdate['hobbie3'],
            "specialite" => $dataUpdate['specialite'],
            "biographie" => $dataUpdate['biographie']
        ]);

        return redirect()->route('index');
    }

    //fonction pour supprimer un étudiant de la liste
    public function deleteStudent($id){
        $students = Students::where("id", $id)->delete();
        
        return redirect()->route('index');
    }

    public function enable($id){
        $data = Students::findOrFail($id);
        $data->update(['status'=>true]);
        return redirect()->route('index')->with('nom', $data['nom']);
    }

    public function disable($id){
        $data = Students::findOrFail($id);
        $data->update(['status'=>false]);
        return redirect()->route('index')->with('name', $data['nom']);
    }
}
