@extends('layout.main-page')

@section('course-contentss')
<section id="topic-content" class="py-16 bg-gray-900">
    <div class="container mx-auto px-6">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-center text-white mb-10">
            Course: <span class="text-blue-400">{{ $course->course_name }}</span> - Chapter: <span class="text-blue-400">{{ $chapter->title }}</span>
        </h2>

        <!-- Content Card -->
        <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-500 p-4">
                <h3 class="text-2xl font-semibold text-white">{!! $content->content !!}</h3>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Topic Description -->
                <div>
                    <p class="text-gray-300 leading-relaxed text-justify">
                        {!! $content->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<!-- sample layout -->



@section('course-content')
<style>
    .accordion-content {
        transition: max-height 0.3s ease-out, padding 0.3s ease-out;
        overflow: hidden;
        max-height: 0;
        /* Ensure content is hidden initially */
        padding: 0 20px;
    }

    input[type="checkbox"]:checked+label+.accordion-content {
        max-height: 1000px;
        /* Set this to accommodate your content's height */
        padding: 20px;
        /* Add padding when expanded */
    }

    .content-item {
        background-color: rgba(75, 85, 99, 0.5);
        /* Gray background with opacity */
        margin: 5px 0;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .content-item:hover {
        background-color: rgba(59, 130, 246, 0.7);
        /* Blue background on hover */
        color: #fff;
    }
</style>
<section id="topic-content" class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 grid shadow-2xl shadow-black/50 grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Accordion Section (Left Side) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg col-span-1 lg:col-span-1 p-4">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Chapters</h3>
            @foreach($chapters as $key => $chapter)
            <div class="accordion-item border-b border-gray-700">
                <input type="checkbox" id="item-{{ $key }}" class="hidden peer"
                    {{ $chapter->id == $chapter_id ? 'checked' : '' }} />
                <label for="item-{{ $key }}" class="block p-4 cursor-pointer text-lg font-semibold bg-white dark:bg-gray-700 hover:bg-gray-600 transition">
                    {{ $chapter->title }}
                    <span class="float-right transform transition-transform duration-200 peer-checked:rotate-90">
                        &#9654; <!-- Right arrow -->
                    </span>
                </label>
                <div class="accordion-content bg-white dark:bg-gray-600 text-sm max-h-0 overflow-hidden transition-all duration-300 peer-checked:max-h-screen p-4">
                    @if($chapter->contents->isNotEmpty())
                    <ul>
                        @foreach($chapter->contents as $contentItem)
                        <li class="content-item {{ $contentItem->id == $content->id ? 'bg-blue-500 text-white' : '' }}">
                            <a href="{{ route('chapter.show', [
                            'course_slug' => $course->course_slug,
                            'chapter_id' => $chapter->id,
                            'content_id' => $contentItem->id
                        ]) }}" class="font-semibold text-gray-200 hover:text-blue-400 transition-colors">
                                {{ $contentItem->content }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-gray-400">No contents available for this chapter.</p>
                    @endif
                </div>
            </div>

            @endforeach
        </div>

        <!-- Main Content Section (Right Side) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl overflow-hidden col-span-1 lg:col-span-3">
            <!-- Header -->
            <div class="bg-blue-500 p-4">
                <h3 class="text-2xl font-semibold text-white">{!! $content->content !!}</h3>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Topic Description -->
                <div>
                    <p class="text-gray-500 leading-relaxed text-justify">
                        {!! $content->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
        const label = checkbox.nextElementSibling;
        const icon = label.querySelector('span');
        // Update the icon based on the checkbox state
        icon.innerHTML = checkbox.checked ? '&#9660;' : '&#9654;'; // Down arrow when open

        // Sync the icon on state change
        checkbox.addEventListener('change', function() {
            icon.innerHTML = this.checked ? '&#9660;' : '&#9654;';
        });
    });
</script>
@endsection