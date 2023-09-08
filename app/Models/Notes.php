<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = ['student_id', "course_id", "type", "note"];

    protected $table = "notes";

    public function getMoyenneAttribute(){
        return $this->where("type", "Devoir")->sum("note");
    }
}
