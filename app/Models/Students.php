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

   public function affectationlist(){
     return $this->hasMany(Affectations::class, 'student_id', "id");
   }

   public function notes(){
    return $this->hasMany(Notes::class, 'student_id', "id");
  }

  public function getMoyennedevoirAttribute($idCours){
    $moydev = 0;
    if($this->notes){
      $devoirs = $this->notes()->where("type", "Devoir")->where("course_id", $idCours)->get();
      dd($devoirs);
      if(count($devoirs)==2){
        $sum = 0;
        foreach($devoirs as $item){
          $sum += $item->note;
        }
        $moydev = $sum/count($devoirs);
      }
    }
    return $moydev;
  }

  public function noteEtudiant(){
    return $this->hasManyThrough(Courses::class, Notes::class, "id", "student_id");
  }

}
