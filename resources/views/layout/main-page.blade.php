<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tech Courses')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-900 text-white">
    <!-- Toast Notification -->
@include('toast-notification')
    <!-- Header -->
    <header class="bg-gray-800 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-500">LearnSyntax</a>
            <!-- Highlighted: Login and Register Buttons -->
            <div>
                @guest
                    <!-- Show Login and Register for Guests -->
                    <a href="{{route('user.login_form')}}" class="text-white bg-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-300" >Login</a>
                    <a href="{{route('user.register_form')}}" class="text-blue-500 border border-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-500 hover:text-white transition duration-300 ml-2">Register</a>
                @else
                    <!-- Show User Name and Logout for Authenticated Users -->
                    <span class="text-gray-300 mr-4">Hello,{{Auth::user()->name}} </span>
                    <a href=""  
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="text-white bg-red-500 px-4 py-2 rounded-lg shadow hover:bg-red-600 transition duration-300">
                        Logout
                    </a>
                    <form id="logout-form" action="{{route('user.logout')}}" method="POST" style="display: none;">
                                     <!-- route('logout') -->
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </header>

    
    <!-- Hero Section -->
    @yield('hero-section')
    
    <!-- all courses available -->
    @yield('mainpage-content')

    <!-- Courses List Section -->
    <!-- <section id="courses" class="py-16 bg-gray-800"> -->
        @yield('what_we_offer')
    <!-- </section> -->
    <!-- <section id="courses" class="py-16 bg-gray-800"> -->
        @yield('who_we_are')
    <!-- </section> -->

    <!-- Main Content -->
    <section id="content" class="py-10 bg-gray-800">
        @yield('course-content')
    </section>

    <!-- Footer -->
        @yield('footer')
    
</body>
</html>
