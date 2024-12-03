<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Contents;
use App\Models\Courses;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function show_chapter_content_in_accordion($course_slug, $chapter_id,$content_id){
        {
            // Fetch the course by slug
        $course = Courses::where('course_slug', $course_slug)->firstOrFail();
            
         // Fetch all chapters of the course
        $chapters = Chapters::with('contents')->where('course_id', $course->id)->get();
            // dd($chapters);
        // Fetch the chapter by ID and ensure it belongs to the course
        $chapter = Chapters::where('id', $chapter_id)->where('course_id', $course->id)->firstOrFail();

        // Fetch the specific content by ID and ensure it belongs to the chapter
        $content = Contents::where('id', $content_id)->where('chapter_id', $chapter->id)->firstOrFail();
            // dd($content->id);
        // Pass the specific content, chapter, and course to the view
        return view('chapter-content-show', compact('course', 'chapter','chapters', 'content','chapter_id'));
        }
    }
}
