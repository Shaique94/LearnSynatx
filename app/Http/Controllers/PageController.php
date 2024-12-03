<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Courses;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function explore_courses(){
        $courses =Courses::orderBy('created_at','desc')->get();
        return view('mainpage-content',compact('courses'));
    }

    public function course_content($courseId)
    { 
    // Retrieve the course and its chapters
     $course = Courses::with('chapters.contents')->findOrFail($courseId);
     
        // Pass the course and chapters to the view
        return view('course-content', [
            'course' => $course,
            'chapters' => $course->chapters, // Retrieve chapters belonging to the course
        ]);
    }
    }
