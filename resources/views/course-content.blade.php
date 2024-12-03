    @extends('layout.main-page')

    @section('course-content')
    <!-- Module Content Section -->
    <section id="content" class="py-16 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-white mb-8">Module Content</h2>

            <style>
                .accordion-content {
                    transition: max-height 0.3s ease-out, padding 0.3s ease-out;
                    overflow: hidden;
                    max-height: 0;
                    padding: 0 20px;
                }
                input[type="checkbox"]:checked + label + .accordion-content {
                    max-height: 1000px; 
                    padding: 20px;
                }
                .content-item {
                    background-color: rgba(75, 85, 99, 0.5); /* Gray background with opacity */
                    margin: 5px 0;
                    padding: 10px;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }
                .content-item:hover {
                    background-color: rgba(59, 130, 246, 0.7); /* Blue background on hover */
                    color: #fff;
                }
            </style>

            <div class="max-w-xl mx-auto py-10 px-5">
                <h1 class="text-2xl font-bold mb-5 text-white">Chapters for: {{ $course->course_name }}</h1>
                <div class="bg-gray-800 rounded-lg shadow-lg">
                @foreach($chapters as $key => $chapter)
        <div class="accordion-item border-b border-gray-700">
            <input type="checkbox" id="item-{{ $key }}" class="hidden peer" />
            <label for="item-{{ $key }}" class="block p-4 cursor-pointer text-lg font-semibold bg-gray-700 hover:bg-gray-600 transition">
                {{ $chapter->title }}
                <span class="float-right transform transition-transform duration-200 peer-checked:rotate-90">
                    &#9654; <!-- Right arrow -->
                </span>
            </label>
            <div class="accordion-content bg-gray-600 text-sm max-h-0 overflow-hidden transition-all duration-300 peer-checked:max-h-screen p-4">
                @if($chapter->contents->isNotEmpty())
                    <ul>
                        @foreach($chapter->contents as $content)
                            <li class="content-item">
                                <a href="{{ route('chapter.show', [
                                    'course_slug' => $course->course_slug,
                                    'chapter_id' => $chapter->id,
                                    'content_id' => $content->id
                                ]) }}" class="font-semibold text-gray-200 hover:text-blue-400 transition-colors">
                                    {!! $content->content !!}
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
            </div>

            <script>
                document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                    checkbox.addEventListener('change', function() {
                        const label = this.nextElementSibling;
                        const icon = label.querySelector('span');
                        icon.innerHTML = this.checked ? '&#9660;' : '&#9654;'; // Change arrow direction
                    });
                });
            </script>
        </div>
    </section>
    @endsection
