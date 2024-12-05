<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Contents;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function admin_dashboard()
    {
        // $courses = Courses::orderBy('created_at', 'desc')->get();
        $courses = Courses::orderBy('created_at', 'desc')->paginate(4);
        return view("admin.create", compact('courses'));
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

    public function admin_login()
    {
        return view('admin.admin-login');
    }
    public function adminlogin_validate(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role !== "admin") {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not authorized!!');
                }
                return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully');
            } else {
                return redirect()->route('admin.login')->with('error', 'The provided credentials do not match our records.');
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function admin_add_chapter($id)
    {

        $course = Courses::with([
            'chapters' => function ($query) {
                $query->orderBy('created_at', 'desc'); // Order chapters by created_at descending
            },
            'chapters.contents' // Eager load the contents of chapters
        ])->findOrFail($id);
        // Pass both course and chapters 
        return view('admin.add_chapter', [
            'course' => $course,
            'chapters' => $course->chapters,
        ]);

    }


    public function store_chapter(Request $request, $id)
    {
        // Validating the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        //For sending the course data related to id and slug 
        $course = Courses::findOrFail($id);
        // Create a new chapter instance
        $chapter = new Chapters();
        $chapter->title = $request->title; // Assuming the form input name is 'title'
        $chapter->course_id = $id; // Use the $id passed to the method
        $chapter->save(); // Save the chapter to the database

        // Redirect to a specific page with a success message
        return redirect()->route('admin.add_chapter', ['courseId' => $course->id, 'courseSlug' => $course->course_slug])->with('success', 'Chapter added successfully!');
    }




    public function show_chapters($id)
    {
        $course = Courses::with('chapters.contents')->findOrFail($id);

        return view('admin.add_chapter', [
            'course' => $course,
            'chapters' => $course->chapters,
        ]);
    }

    public function store_content(Request $request, Chapters $chapter)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'description' =>'required|string'
        ]);
        // dd($request->all());
        // Create a new content item related to the chapter
        $chapter->contents()->create([
            'content' => $request->content,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('success', 'Added successfully!!');
    }


    public function update_chapter_and_topics(Request $request, $chapterId)
    {
        
        
        // Validate the incoming data
        $validatedData = $request->validate([
            'content' => 'required|string|max:255', // Adjust max length as needed
            'description' => 'required|string', // Adjust max length as needed
        ]);

        // Find the chapter by its ID
        $chapter = Contents::findOrFail($chapterId);

        // Update the chapter with new data
        $chapter->content = $validatedData['content'];
        $chapter->description = $validatedData['description'];
        $chapter->save(); 

           
        return redirect()->back()->with('success', 'Chapter and topics updated successfully!');
    }

    public function dashboard()

    {
        $total_courses = Courses::count();
        $total_chapters = Chapters::count();
        $total_contents = Contents::count();
        $user_name = Auth::user()->name ?? 'Admi';

        return view('admin.dashboard', compact('total_courses', 'total_chapters', 'total_contents', 'user_name'));
    }
}
