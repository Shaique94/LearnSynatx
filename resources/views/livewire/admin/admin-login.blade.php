<div>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-white min-h-screen flex items-center justify-center">
@include('toast-notification')
    <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-lg shadow-2xl">
        <!-- Back Link -->
        <a class="flex items-center text-sm text-gray-400 dark:hover:text-grey-400 hover:text-grey-400 mb-6" href="{{ route('home') }}">
            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 010-1.414L13.586 9H3a1 1 0 110-2h10.586l-3.879-3.879a1 1 0 011.414-1.414l5.586 5.586a1 1 0 010 1.414l-5.586 5.586a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            Back to website
        </a>

        <!-- Login Header -->
        <h2 class="text-2xl font-bold text-center text-blue-500">Admin LogIn</h2>

        
        <!-- Login Form -->
        <form action="{{route('admin.login_validate')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm text-gray-400">Email</label>
                <input type="email" id="email" name="email" required placeholder="name@example.com"
                    class="w-full px-4 py-2 mt-1 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm text-gray-400">Password</label>
                <input type="password" id="password" name="password" required placeholder="Password"
                    class="w-full px-4 py-2 mt-1 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                Sign In
            </button>
        </form>

        <!-- Footer Links -->
        <div class="text-center mt-4 text-sm text-gray-400">
            <a href="/forgot-password" class="hover:underline">Forgot your password?</a>
        </div>
    </div>

</body>
<!-- </html> -->
</div>
