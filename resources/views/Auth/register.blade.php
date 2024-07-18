<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-500 h-screen flex items-center justify-center">

    <div class="container mx-auto p-6">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-gray-200 shadow-lg rounded-lg p-8">
                    <h2 class="text-3xl font-bold text-center mb-6 text-gray-700">Sign Up</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-gray-600 text-sm font-semibold mb-2">Name</label>
                            <input type="text" name="name" id="name" class="block w-full bg-white text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-600 @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-gray-600 text-sm font-semibold mb-2">Email</label>
                            <input type="email" name="email" id="email" class="block w-full bg-white text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-600 @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-600 text-sm font-semibold mb-2">Password</label>
                            <input type="password" name="password" id="password" class="block w-full bg-white text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-600 @error('password') border-red-500 @enderror" required>
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password-confirm" class="block text-gray-600 text-sm font-semibold mb-2">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="block w-full bg-white text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">Register</button>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
