<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-white  min-h-screen flex items-center justify-center dark:bg-gray-900">
        <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md dark:bg-gray-800">
            <h1 class="text-3xl font-bold text-blue-500 text-center mb-6">Create Your Account</h1>
            <form action="{{route('user.register_save')}}" method="POST" class="space-y-4">
                @csrf
                <!-- Name -->
                <div>
                    <label for="name" class="text-gray-800 block text-sm font-medium dark:text-gray-300">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="text-gray-800 block text-sm font-medium dark:text-gray-300">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="text-gray-800 block text-sm font-medium dark:text-gray-300">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="text-gray-800 block text-sm font-medium dark:text-gray-300">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-2 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <!-- Register Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 font-semibold">
                        Register
                    </button>
                </div>
            </form>
            <p class="mt-4 text-center text-gray-400 text-sm">
                Already have an account?
                <a href="{{route('user.login_form')}}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </div>
    </body>

    </html>

</div>