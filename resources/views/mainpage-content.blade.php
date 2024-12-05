@extends('layout.main-page')

@section('mainpage-content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-center text-white mb-12">Explore Our Technical Courses</h2>
    @livewire('course-contents-with-search')
</div>
@endsection
