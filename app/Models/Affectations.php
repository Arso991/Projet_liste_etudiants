<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectations extends Model
{
    protected $fillable = ['student_id', 'course_id'];

    protected $with = ["studying"];

    protected $table = 'afectationstudents';


    public function studying(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }


}
