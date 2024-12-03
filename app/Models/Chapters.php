<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $fillable = ['course_id', 'title']; 

    public function course()
{
    return $this->belongsTo(Courses::class,'course_id');
}

public function contents()
{
    return $this->hasMany(Contents::class, 'chapter_id');
}
}
