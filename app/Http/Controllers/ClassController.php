<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function classlist(){
        //$category = Category::all();
        $courses = Courses::all();

        $staff = Auth::user();

        //$courses = $category->courses;
        //$staff = $staff->courses;

        return view('courses.class', compact('courses'));
    }

    public function addclassform(){
        $category = Category::all();

        return view('courses.addclass', compact('category'));
    }

    public function addclassStore(Request $request){
        $user = Auth::user();
        $data = $request->all();

        $request->validate([
            'name'=>'required',
            'schedule'=>'required|numeric',
            'coefficient'=>'required|numeric',
            'category_id'=>'required'
        ]);

        $save = Courses::create([
            'name' => $data["name"],
            'schedule' => $data["schedule"],
            'coefficient'=>$data['coefficient'],
            "category_id"=>$data["category_id"],
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route('classList')->with('message', 'Cours ajouté !');
    }

    public function deleteclass($id){
        Courses::Id($id)->delete();

        return redirect()->back()->with("success", "Vous venez de supprimer un cours !");
    }

    public function updateclass($id){
        $course = Courses::Id($id)->first();
        $category = Category::all();

        return view('courses.addclass', compact('course', 'category', 'id'));
    }

    public function updateclassStore(Request $request, $id){
        $data = $request->all();

        Courses::Id($id)->update([
            "name" => $data["name"],
            "schedule" => $data["schedule"],
            "coefficient" => $data["coefficient"],
            "category_id"=>$data["category_id"],
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route("classList")->with("notification", "Cours mis à jours !");
    }

    

}
