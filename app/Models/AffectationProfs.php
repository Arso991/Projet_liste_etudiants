<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffectationProfs extends Model
{
    protected $fillable = ['professor_id','course_id'];

    protected $table = 'afectationprofessors';

    public function profs(){
        return $this->belongsTo(Students::class, 'professor_id', 'id');
    }

    public function cours(){
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
