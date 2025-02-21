<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-[#1a1a2e] to-[#0f3460] text-white">
    
    <!-- Navbar -->
    <nav class="bg-[#16213e] p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-purple-400">📚 BookShare</h1>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-purple-400">Accueil</a></li>
                <li><a href="/signup" class="hover:text-purple-400">Sign up</a></li>
                <li><a href="/login" class="hover:text-purple-400">Log in</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <header class="text-center py-20">
        <h2 class="text-4xl font-bold text-purple-400">Bienvenue dans notre Bibliothèque</h2>
        <p class="text-lg mt-4">Découvrez un monde de savoir et d'imagination</p>
        <a href="#books" class="mt-6 inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700">Explorer</a>
    </header>
    
    <!-- Section des Livres Disponibles -->
    <section id="books" class="container mx-auto py-10">
        <h3 class="text-3xl font-bold text-center text-purple-400">Nos Livres Disponibles</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            @foreach ($books as $book)
                <div class="bg-[#1b1b3a] p-4 rounded-lg shadow-lg overflow-hidden">
                    @if ($book->photo)
                        <img src="{{ asset('storage/' . $book->photo) }}" alt="Couverture du livre" 
                             class="w-full h-48 object-cover mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-400 mb-4">
                            Pas d'image
                        </div>
                    @endif
                    <h4 class="text-xl font-semibold text-purple-300">{{ $book->title }}</h4>
                    <p class="text-gray-300 text-sm">Auteur : <span class="font-medium">{{ $book->author }}</span></p>
                    <p class="text-gray-300 text-sm">Genre : <span class="font-medium">{{ $book->genre }}</span></p>
                    <p class="text-gray-300 text-sm">Stock : <span class="font-medium">{{ $book->stock }}</span></p>
                </div>
            @endforeach
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-[#12122c] text-center p-4 mt-10">
        <p>&copy; 2025 Bibliothèque | Tous droits réservés</p>
    </footer>
    
</body>
</html>
