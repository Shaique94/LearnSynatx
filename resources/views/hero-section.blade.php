@section('hero-section')
        <!-- Landing Page Section -->
    <div class="min-h-screen bg-gray-900 flex flex-col justify-center items-center text-center text-white py-16">
        <h1 class="text-5xl font-extrabold text-blue-500 mb-6">Unlock Your Potential with Technical Courses</h1>
        <p class="text-xl text-gray-300 mb-6">Master programming, data science, AI, and more. Learn from experts and enhance your skills.</p>
        <a href="{{ route('explore_courses') }}" class="bg-blue-500 text-white px-8 py-3 text-xl font-semibold rounded-lg shadow-md hover:bg-blue-600 transition ease-in-out duration-300">
            Explore Courses
        </a>
    </div>
@endsection