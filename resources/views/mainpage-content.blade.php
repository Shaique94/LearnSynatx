@extends('layout.main-page')


@section('mainpage-content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-center text-white mb-12">Explore Our Technical Courses</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($courses as $course)
        <!-- Course Card -->
        <div class="bg-gray-700 shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <div class="p-6">
                <div class="flex justify-center items-center mb-6">
                    <!-- Use a fallback or dynamic icon -->
                    <i class="fas fa-code text-4xl text-blue-400"></i>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-3">{{ $course->course_name }}</h3>
                <p class="text-gray-400 mb-4">{{ $course->description }}</p>
                
                <a href="{{ route('course_content', ['courseId' => $course->id,'courseSlug'=>$course->course_slug] ) }}" 
                   class="text-blue-500 hover:text-blue-400 font-semibold">
                    View Modules
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
