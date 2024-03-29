<?php

namespace App\Http\Controllers;

use App\Models\AffectationProfs;
use Illuminate\Http\Request;

class AffectationprofsController extends Controller
{
    public function saveaffectation(Request $request, $id){
        $data = $request->all();

        $courselist = $request->input("course_id");

        foreach($courselist as $course_id){

            if(AffectationProfs::where('professor_id', $id)->where('course_id', $course_id)->exists()){
                
                AffectationProfs::updateOrCreate([
                    "professor_id"=> $id,
                    "course_id"=> $course_id,
                ]);
            }
        }

        return redirect()->back()->with("message", "Le ou les cours ont été affectés !");
    }

    public function deleteaffectation($id){
        AffectationProfs::where('course_id', $id)->delete();
        return redirect()->back();
    }
}
