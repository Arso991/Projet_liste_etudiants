<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategorieStore(Request $request){
        $data = $request->all();

        $request->validate([
            'name' => 'required'
        ]);

        $save = Category::create([
            'name' => $data['name']
        ]);

        return redirect()->back();
    }

    
}
