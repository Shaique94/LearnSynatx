@extends('layout.main-page')

@section('mainpage-content')
<div class="container mx-auto px-6 py-12">
    <h2 class="bg-white text-gray-800 text-3xl font-bold text-center  mb-12 dark:bg-gray-900 dark:text-white">Explore Our Technical Courses</h2>
    @livewire('course-contents-with-search')
</div>
@endsection
