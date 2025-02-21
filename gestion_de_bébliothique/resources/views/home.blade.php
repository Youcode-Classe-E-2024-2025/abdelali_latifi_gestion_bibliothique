<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-[#8B5E3C] to-[#3E2723] text-white">
    
    <!-- Navbar -->
    <nav class="bg-[#5D4037] p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">📚 BookShare</h1>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:underline">Accueil</a></li>
                <li><a href="/signup" class="hover:underline">sign up</a></li>
                <li><a href="/login" class="hover:underline">log in</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <header class="text-center py-20">
        <h2 class="text-4xl font-bold">Bienvenue dans notre Bibliothèque</h2>
        <p class="text-lg mt-4">Découvrez un monde de savoir et d'imagination</p>
        <a href="#books" class="mt-6 inline-block bg-[#D7CCC8] text-[#3E2723] px-6 py-3 rounded-lg font-semibold hover:bg-[#BCAAA4]">Explorer</a>
    </header>
    
    <!-- Section des Livres Populaires -->
    <section id="books" class="container mx-auto py-10">
        <h3 class="text-3xl font-bold text-center">Livres Populaires</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6">
            <div class="bg-[#6D4C41] p-4 rounded-lg">
                <h4 class="text-xl font-semibold">Titre du Livre 1</h4>
                <p>Auteur: Auteur 1</p>
            </div>
            <div class="bg-[#6D4C41] p-4 rounded-lg">
                <h4 class="text-xl font-semibold">Titre du Livre 2</h4>
                <p>Auteur: Auteur 2</p>
            </div>
            <div class="bg-[#6D4C41] p-4 rounded-lg">
                <h4 class="text-xl font-semibold">Titre du Livre 3</h4>
                <p>Auteur: Auteur 3</p>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-[#4E342E] text-center p-4 mt-10">
        <p>&copy; 2025 Bibliothèque | Tous droits réservés</p>
    </footer>
    
</body>
</html>
