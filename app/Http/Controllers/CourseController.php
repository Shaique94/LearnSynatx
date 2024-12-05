<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function admin_add_course(Request $request)
{
    // Validate the request data
    $request->validate([
        'course_name' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow only image files, max 2MB
    ]);

    // Handle the icon upload if present
    $iconPath = null;
    if ($request->hasFile('icon')) {
        // Store the uploaded file in the public storage directory under 'icons'
        $iconPath = $request->file('icon')->store('icons', 'public');
    }

    // Store all course data in the database
    $course = new Courses();
    $course->course_name = $request->input('course_name');
    $course->course_slug = $request->input('course_name');
    $course->description = $request->input('description');
    $course->icon = $iconPath; // Assign the icon path or null if not uploaded
    $course->save(); // Save the course to the database


    // Redirect to a specific route with a success message
    return redirect()->route('admin.dashboard')->with('success', 'Course created successfully.');
}

public function admin_delete_course($courseId){
      // Fetch the course or fail
      $course = Courses::findOrFail($courseId);
      // Delete the course (cascading to chapters and content automatically)
      $course->delete();
      // Redirect with success message
      return redirect()->back()->with('success', 'Course removed succesfully');
}

}
