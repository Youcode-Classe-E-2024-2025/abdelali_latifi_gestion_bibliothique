<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-fixed bg-gray-100 min-h-screen">
    <header class="flex justify-between items-center px-6 py-4 bg-white shadow">
        <h1 class="text-2xl font-extrabold text-gray-800">library</h1>
        <div>
            <a href="registre" id="sign_up" class="px-4 py-2 text-xl font-bold text-white bg-violet-600 rounded-lg hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-400">
                Sign Up
            </a>
        </div>
    </header>

    <section id="FormSignIn" class="flex flex-col items-center w-full max-w-lg mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Log In</h2>
        @if(session('success'))
            <div class="w-full p-3 mb-4 text-green-700 bg-green-200 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post" class="w-full space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xl font-bold text-gray-700">Name</label>
                <input id="email" name="email" type="text" placeholder="Enter your name"
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    >
            </div>
            
            <div>
                <label for="password" class="block text-xl font-bold text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter your password"
                    class="w-full p-2 mt-1 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-violet-500"
                    >
            </div>

            @error('login')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <input type="submit" value="Log In" name="submit"
                class="w-full p-3 mt-4 font-bold text-white bg-violet-600 rounded-lg hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-400">
        </form>
    </section>
</body>
</html>
