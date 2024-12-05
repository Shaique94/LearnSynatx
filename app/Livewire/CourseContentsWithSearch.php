<?php

namespace App\Livewire;

use App\Models\Courses;
use Livewire\Component;

class CourseContentsWithSearch extends Component
{
    public $search = ''; // Bind to the input field

    public function render()
    {
        
        $courses = Courses::query()
            ->when($this->search, function ($query) {
                $query->where('course_name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.course-contents-with-search', compact('courses'));
        // course-contents-with-search
    }
}
