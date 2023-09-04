<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    protected $fillable = ["nom", "prenom", "birthday", "hobbie1", "hobbie2", "hobbie3","specialite", "biographie","picture","status","user_id"];

    protected $table = "studentslist";

    use SoftDeletes;

    public function getFullnameAttribute(){
        return $this->nom.' '.$this->prenom;
    }

    public function getHobbiesAttribute(){
        return $this->hobbie1.', '.$this->hobbie2.', '.$this->hobbie3;
    }

    public function cours(){
        return $this->belongsToMany(Courses::class, "id", "student_id", "course_id");
    }

}
