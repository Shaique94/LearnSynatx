<div>
<div>
    <!-- Search Input -->
    <div class="flex justify-end mb-6">
        <input 
            type="text" 
            wire:model.live="search" 
            placeholder="Search courses..." 
            class="w-48 px-3 py-2 rounded-lg text-gray-700 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($courses as $course)
            <!-- Course Card -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 dark:bg-gray-700">
                <div class="p-6">
                    <div class="flex justify-center items-center mb-6">
                        <i class="fas fa-code text-4xl text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-500 mb-3 dark:text-white">{{ $course->course_name }}</h3>
                    <p class="text-gray-400 mb-4">{{ $course->description }}</p>
                    <a href="{{ route('course_content', ['courseId' => $course->id, 'courseSlug' => $course->course_slug]) }}" 
                       class="text-blue-500 hover:text-blue-400 font-semibold">
                        View Modules
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-400 col-span-full text-center">No courses found.</p>
        @endforelse
    </div>
</div>

</div>
