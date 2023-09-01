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

        return view('class', compact('courses'));
    }

    public function addclassform(){
        $category = Category::all();

        return view('addclass', compact('category'));
    }

    public function addclassStore(Request $request){
        $user = Auth::user();
        $data = $request->all();

        $request->validate([
            'name'=>'required',
            'schedule'=>'required',
            'coefficient'=>'required',
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

}
