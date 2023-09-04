<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    protected $fillable = ["lastname","firstname","call","address","user_id"];

    protected $table = "professors";
}
