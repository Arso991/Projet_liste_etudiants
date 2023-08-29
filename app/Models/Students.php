<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    protected $fillable = ["nom", "prenom", "birthday", "hobbie1", "hobbie2", "hobbie3","specialite", "biographie","picture","status"];

    protected $table = "studentslist";

    use SoftDeletes;
}
