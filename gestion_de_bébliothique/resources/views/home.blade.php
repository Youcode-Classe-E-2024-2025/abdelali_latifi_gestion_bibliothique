<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-gray-800">library</h1>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="text-center py-20 bg-violet-600 text-white">
        <h2 class="text-4xl font-extrabold">Bienvenue dans notre Bibliothèque</h2>
        <p class="text-lg mt-4">Découvrez un monde de savoir et d'imagination</p>
        <a href="#books" class="mt-6 inline-block bg-gray-50 text-violet-600 px-6 py-3 rounded-lg font-semibold hover:bg-violet-700 hover:text-white">Explorer</a>
    </header>

    <!-- Section des Livres Populaires -->
    <section id="books" class="container mx-auto py-10">
        <h3 class="text-3xl font-extrabold text-center text-gray-800">Livres Populaires</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-gray-800">Titre du Livre 1</h4>
                <p class="text-gray-600">Auteur: Auteur 1</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-gray-800">Titre du Livre 2</h4>
                <p class="text-gray-600">Auteur: Auteur 2</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="text-xl font-semibold text-gray-800">Titre du Livre 3</h4>
                <p class="text-gray-600">Auteur: Auteur 3</p>
            </div>
        </div>
    </section>
</body>
</html>
