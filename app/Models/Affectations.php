<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectations extends Model
{
    protected $fillable = ['student_id', 'course_id'];

    protected $table = 'afectationstudents';

    public function uac(){
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }

    public function amphi(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

}
