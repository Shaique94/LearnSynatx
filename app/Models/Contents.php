<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = ['chapter_id', 'content','description'];

    // A content belongs to a chapter
    public function chapter()
    {
        return $this->belongsTo(Chapters::class);
    }
}
