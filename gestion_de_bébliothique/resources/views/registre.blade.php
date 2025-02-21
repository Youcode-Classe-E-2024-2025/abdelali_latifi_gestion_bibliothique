<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskflow - Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="flex justify-between items-center px-6 py-4 bg-white shadow">
        <h1 class="text-2xl font-extrabold text-gray-800">library</h1>
        <div>
            <a href="/" id="sign_in" class="px-4 py-2 text-xl font-bold text-white bg-violet-600 rounded-lg hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-400">
                Sign In
            </a>
        </div>
    </header>

    <section id="FormSignUp" class="flex flex-col items-center w-full max-w-lg mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Sign Up</h2>

        @if (session('success'))
            <div class="w-full mb-4 p-3 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="post" class="w-full space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-xl font-bold text-gray-700">Name</label>
                <input id="name" name="name" type="text" placeholder="Enter name" 
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    value="{{ old('name') }}" >
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xl font-bold text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Enter your email" 
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    value="{{ old('email') }}" >
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xl font-bold text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter your password" 
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    >
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xl font-bold text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" 
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    >
            </div>

            <button type="submit" class="w-full p-3 mt-4 font-bold text-white bg-violet-600 rounded-lg hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-400">
                Submit
            </button>
        </form>
    </section>
</body>
</html>
