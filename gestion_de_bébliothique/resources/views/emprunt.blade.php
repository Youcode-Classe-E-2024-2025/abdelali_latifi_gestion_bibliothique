<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Accueil - Bibliothèque</title>
</head>
<body class="bg-gray-900 text-white">
    
    <!-- Navigation -->
    <header class="bg-gray-800 shadow-md py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-purple-400">Bibliothèque</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Accueil</a></li>
                    <li><a href="/borrowed-books" class="text-gray-300 hover:text-purple-400">Livres</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Section Hero -->
    <section class="bg-purple-600 text-white text-center py-16">
        <h2 class="text-4xl font-bold">Bienvenue à la Bibliothèque</h2>
        <p class="mt-2 text-lg">Découvrez et empruntez vos livres préférés en quelques clics.</p>
    </section>

    <!-- Affichage des alertes -->
    @if(session('error') || session('success'))
        <div class="max-w-3xl mx-auto mt-6">
            <div class="p-4 rounded-md text-white text-center shadow-md 
                {{ session('error') ? 'bg-red-500' : 'bg-green-500' }}">
                {{ session('error') ?? session('success') }}
            </div>
        </div>
    @endif

    <!-- Liste des livres -->
    <main class="max-w-6xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-purple-400 mb-6 text-center">Nos Livres Disponibles</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    @if ($book->photo)
                        <img src="{{ asset('storage/' . $book->photo) }}" alt="Couverture du livre" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-400">
                            Pas d'image
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-purple-400">{{ $book->title }}</h3>
                        <p class="text-gray-300 text-sm">Auteur : <span class="font-medium">{{ $book->author }}</span></p>
                        <p class="text-gray-300 text-sm">Genre : <span class="font-medium">{{ $book->genre }}</span></p>
                        <p class="text-gray-300 text-sm">Stock : <span class="font-medium">{{ $book->stock }}</span></p>

                        <div class="mt-4">
                            <form action="{{ route('loans.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit" 
                                    class="w-full bg-purple-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-purple-600 transition">
                                    Emprunter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
