@extends('admin.layout.admin')

@section('content')
<div class="container mx-auto my-8 p-6 bg-white shadow-lg rounded-lg">

    <div class="container">
        <!-- adding toast here -->
        @include('toast-notification')
        <!-- component -->
        <div class="bg-gray-100">
            <div class="header bg-white h-16 px-10 py-8 border-b-2 border-gray-200 flex items-center justify-between">
            </div>
            <div class="header my-3 h-12 px-10 flex items-center justify-between">
                <h1 class="font-medium text-2xl">Add Courses</h1>
            </div>
            <div class="flex flex-col mx-3 mt-6 lg:flex-row">
                <div class="w-full lg:w-1/3 m-1">
                    <form action="{{route('admin.add_course')}}" method="POST" class="w-full bg-white shadow-md p-6" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" htmlFor="category_name">Course Name</label>
                                <input class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]" type="text" name="course_name" placeholder="Course Name" required />
                            </div>
                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" htmlFor="category_name">Description</label>

                                <textarea textarea rows="4" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]" type="text" name="description" required> </textarea>
                            </div>

                            <div class="w-full px-3 mb-8">
                                <label class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center" htmlFor="dropzone-file">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>

                                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Upload Icon</h2>

                                    <p class="mt-2 text-gray-500 tracking-wide">Upload or drag & drop your file SVG, PNG, JPG or GIF. </p>

                                    <input id="dropzone-file" type="file" class="hidden" name="icon" accept="image/*" onchange="previewImage(event)" />
                                </label>

                                <!-- Image preview container -->
                                <div id="image-preview" class="mt-4 hidden">
                                    <img src="" alt="Image Preview" class="w-32 h-32 object-cover rounded-md mx-auto" />
                                    <p class="mt-2 text-green-600 text-sm text-center">Image uploaded successfully!</p>
                                </div>

                            </div>

                            <div class="w-full md:w-full px-3 mb-6">
                                <button type="submit" class="appearance-none block w-full bg-green-700 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-600 focus:outline-none focus:bg-white focus:border-gray-500">Add Course</button>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200">
                    <table class="table-auto w-full">
                        <thead class="text-sm font-semibold uppercase text-gray-800 bg-gray-50 mx-auto">
                            <tr>
                                <th></th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5 mx-auto">
                                        <path d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zm-4.5 7a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 8.5 11zm.5 5 1.597 1.363L13 13l4 6H7l2-3z"></path>
                                    </svg>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold">Courses Name</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Description</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach($courses as $course)
                            <tr>
                                <td class="p-4">{{ $course->id }}</td>
                                <td class="p-4">
                                    @if($course->icon)
                                    <img src="{{ asset('storage/' . $course->icon) }}" alt="{{ $course->course_name }} Icon" class="w-12 h-12 object-cover rounded-full">
                                    @else
                                    No Icon
                                    @endif
                                </td>
                                <td class="p-4">{{ $course->course_name }}</td>
                                <td class="p-4">{{ $course->description }}</td>
                                <td class="p-4">
                                    <div class="flex justify-center">
                                        <a href="{{ route('admin.add_chapter', ['courseId' => $course->id, 'courseSlug' => $course->course_slug]) }}" class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center">
                                            <span>
                                                <FaEdit class="w-4 h-4 mr-1" />
                                            </span> Edit
                                        </a>
                                        <form action="{{ route('admin.delete_course', ['courseId' => $course->id]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center"
                                                onclick="return confirm('Are you sure you want to delete this course and its associated content?')">
                                                <span>
                                                    <FaTrash class="w-4 h-4 mr-1" />
                                                </span> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $courses->links() }}
                    </div>
                </div>


            </div>
        </div>
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    // When the file is read
                    reader.onload = function(e) {
                        const previewContainer = document.getElementById('image-preview');
                        const previewImage = previewContainer.querySelector('img');

                        // Set the image source to the file
                        previewImage.src = e.target.result;

                        // Show the preview container
                        previewContainer.classList.remove('hidden');
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
        @endsection