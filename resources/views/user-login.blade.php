<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
@include('toast-notification')
    <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-lg">
        <!-- Back Link -->
        <a class="flex items-center text-sm text-gray-400 hover:text-white mb-6" href="{{ url()->previous() }}">
            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 010-1.414L13.586 9H3a1 1 0 110-2h10.586l-3.879-3.879a1 1 0 011.414-1.414l5.586 5.586a1 1 0 010 1.414l-5.586 5.586a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            Back
        </a>

        <!-- Login Header -->
        <h2 class="text-2xl font-bold text-center text-blue-500">Sign In</h2>
        <p class="text-center text-gray-400 text-sm mt-2">Enter your email and password to sign in!</p>

        <!-- Google Login Button -->
        <div class="mt-6">
    <a href="{{ route('google-auth') }}" class="flex items-center justify-center w-full py-2 px-4 bg-white text-gray-700 rounded-lg shadow-md hover:bg-gray-200">
        <svg class="h-5 w-5 mr-2" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
        </svg>
        Sign in with Google
    </a>
</div>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-700"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-gray-800 text-gray-400">Or continue with</span>
            </div>
        </div>

        <!-- Login Form -->
        <form action="{{route('user.login_validate')}}" method="POST" class="space-y-4">
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
            <a href="/forgot-password" class="hover:underline">Forgot your password?</a><br>
            <a href="{{route('admin.login')}}" class="hover:underline">Admin Login</a>
            <p class="mt-2">
                Don't have an account? <a href="{{route('user.register_form')}}" class="text-blue-500 hover:underline">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>
