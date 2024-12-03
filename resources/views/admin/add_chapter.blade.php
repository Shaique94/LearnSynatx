@extends('admin.layout.admin')
@section('add_chapter')

<div class="container mx-auto my-8">

    <!-- Toast Notification -->
    @if(session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 5500
        });
    </script>
    @endif

    <!-- Add Chapter Section -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Chapter to Course:
            <span class="text-green-700">{{ $course->course_name }}</span>
        </h2>
        <form action="{{ route('admin.store_chapter', ['courseId' => $course->id,'courseSlug'=>$course->course_slug]) }}" method="POST" class="w-full max-w-lg mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Chapter Title</label>
                <input type="text" id="title" name="title"
                    class="appearance-none border rounded-lg w-full py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Chapter Title" required>
            </div>
            <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                Save Chapter
            </button>
        </form>
    </div>

    <!-- Display Chapters and Add Topics Section -->
    @if($chapters->isNotEmpty())
<div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Chapters for {{ $course->course_name }}</h2>
    <div class="accordion" id="chaptersAccordion">
        @foreach($chapters as $chapter)
        <div class="border rounded-lg mb-4">
        
            <form action="{{route('admin.update_chapter_and_topics', $chapter->id)}}" method="POST" id="edit-form-{{ $chapter->id }}">
                @csrf
                @method('PUT')
                <!-- Chapter Header -->
                <div class="bg-gray-100 px-4 py-2 flex justify-between items-center">
                    <!-- Chapter Title -->
                    <input
                        type="text"
                        name="title"
                        value="{{ $chapter->title }}"
                        class="text-lg font-semibold border rounded-lg px-2 py-1 w-2/3 focus:outline-none edit-input hidden"
                        required>
                    <span class="text-lg font-semibold text-gray-800 edit-display">{{ $chapter->title }}</span>

                    <!-- Edit Button -->
                    <!-- <button type="button" class="text-blue-500 hover:text-blue-700 font-semibold edit-btn" onclick="toggleEdit(`{{ $chapter->id }}`)">
                        Edit
                    </button> -->
                </div>

                <!-- Topics Section -->
                <div class="p-4">
                    <h4 class="text-gray-700 font-semibold mb-4">Topics:</h4>

                    @if($chapter->contents->isNotEmpty())
                    <ul>
                        @foreach($chapter->contents as $content)
                        <li class="mb-2">
                            <!-- Editable Topic -->
                            <span class="text-gray-700 cursor-pointer"
                                  onclick="openEditModal(`{{ $content->id }}`, `{!! $content->content !!}`, `{!! $content->description !!}`)">
                                 {!!  $content->content !!}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-gray-500 mb-4">No topics added yet.</p>
                    @endif
                </div>
            </form>

            <!-- Add Topic Form -->
            <form action="{{ route('admin.store_content', $chapter->id) }}" method="POST" class="bg-gray-50 border rounded-lg p-4 mt-4 shadow-sm">
                @csrf
                <!-- Content Field -->
                <div class="mb-4">
                    <label 
                        for="toggle-content-{{ $chapter->id }}" 
                        class="block text-gray-800 font-semibold cursor-pointer"
                        onclick="toggleField('content-section-{{ $chapter->id }}')">
                        Add New Topic +
                    </label>
                    <div id="content-section-{{ $chapter->id }}" class="hidden mt-2">
                        <textarea
                            id="content_{{ $chapter->id }}"
                            name="content"
                            class="tinymce appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Enter topic content"
                            rows="4"
                            required>
                        </textarea>
                    </div>
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label 
                        for="toggle-description-{{ $chapter->id }}" 
                        class="block text-gray-800 font-semibold cursor-pointer"
                        onclick="toggleField('description-section-{{ $chapter->id }}')">
                        Add Description +
                    </label>
                    <div id="description-section-{{ $chapter->id }}" class="hidden mt-2">
                        <textarea
                            id="description_{{ $chapter->id }}"
                            name="description"
                            class="tinymce appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Enter topic description"
                            rows="4"
                            required>
                        </textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out">
                        Add Topic
                    </button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-gray-500">No chapters available. Please add a chapter first to add topics.</p>
@endif

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Edit Topic</h2>
        <form id="editModalForm"  method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="modalContent" class="block text-gray-700 font-bold mb-2">Topic Content</label>
                <textarea id="modalContent" name="content" 
                          class="border rounded-lg w-full p-3 text-gray-900" 
                          rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label for="modalDescription" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="modalDescription" name="description" 
                          class="border rounded-lg w-full p-3 text-gray-900" 
                          rows="4" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" 
                        class="bg-gray-600 text-white py-2 px-4 rounded mr-2">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-blue-600 text-white py-2 px-4 rounded">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

</div>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: 'textarea.tinymce', // Target textarea with the class 'tinymce'
            plugins: 'lists link image table code', // Add plugins for functionality
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            menubar: false, // Hide the menu bar
            branding: false, // Remove "Powered by Tiny" branding
            height: 300, // Set the editor height
        });
    });

</script>
<script>
    function toggleField(sectionId) {
        const section = document.getElementById(sectionId);
        section.classList.toggle('hidden');
    }
</script>

<script>
    function toggleEdit(chapterId) {
        const form = document.getElementById(`edit-form-${chapterId}`);
        const inputs = form.querySelectorAll('.edit-input');
        const displays = form.querySelectorAll('.edit-display');
        const saveBtn = document.getElementById(`save-btn-${chapterId}`);

        inputs.forEach(input => input.classList.toggle('hidden'));
        displays.forEach(display => display.classList.toggle('hidden'));
        saveBtn.classList.toggle('hidden');
    }
</script>
<script>
    function openEditModal(contentId, content, description) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editModalForm');

     
        document.getElementById('modalContent').value = content;
        document.getElementById('modalDescription').value = description;

        
      // Dynamically set the form action URL using the content ID
     form.action = `/admin/add_chapter/${contentId}/update-chapter-and-topics`;        
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        window.location.reload(); 
    }
</script>


@endsection