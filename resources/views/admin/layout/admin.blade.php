<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.ckeditor.com/4.25.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <div>
                <a href="{{route('admin.dashboard')}}" class="px-3 py-2 rounded hover:bg-gray-700">Courses</a>
                <a href="{{route('admin.newdashboard')}}" class="px-3 py-2 rounded hover:bg-gray-700">Dashboard</a>
                <a href="{{route('admin.logout')}}" class="px-3 py-2 rounded hover:bg-red-700">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    @section('content')
        @show
    
    @section('add_chapter')
        @show

    @section('dashboard')
        @show
         
</body>
