<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ["nom", "prenom", "birthday", "hobbie1", "hobbie2", "hobbie3","specialite", "biographie"];

    protected $table = "studentslist";
}
