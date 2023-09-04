<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['name','schedule','coefficient','category_id','user_id'];

    protected $table = 'courses';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function staff(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeId($query, $id){
        $query->where('id', $id);
    }
}
