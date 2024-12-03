<?php

namespace App\Models;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['course_name', 'description', 'icon','course_slug'];

    public function chapters()
    {
        return $this->hasMany(Chapters::class, 'course_id');
    }


   public function setCourseSlugAttribute($value){

      $this->attributes['course_slug'] = Str::slug($value);
   }
}
