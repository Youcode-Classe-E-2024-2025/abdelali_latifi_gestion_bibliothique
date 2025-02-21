<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Borrowed Books</title>
</head>
<body class="bg-gray-900 text-white">
    
    <!-- Navigation -->
    <header class="bg-gray-800 shadow-md py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-purple-400">Library</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="/" class="text-gray-300 hover:text-purple-400 transition">Home</a></li>
                    <li><a href="/emprunt" class="text-gray-300 hover:text-purple-400 transition">Available Books</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-purple-400 mb-6 text-center">My Borrowed Books</h2>
        
        @if(isset($message))
            <p class="text-center text-gray-300">{{ $message }}</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        @if ($book->photo)
                            <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Cover" 
                                 class="w-full h-52 object-cover">
                        @else
                            <div class="w-full h-52 bg-gray-700 flex items-center justify-center text-gray-400">
                                No Image Available
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-purple-400">{{ $book->title }}</h3>
                            <p class="text-gray-300 text-sm">Author: <span class="font-medium">{{ $book->author }}</span></p>
                            <p class="text-gray-300 text-sm">Genre: <span class="font-medium">{{ $book->genre }}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>
