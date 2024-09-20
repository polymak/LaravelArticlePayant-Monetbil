<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">Accueil</a>
            <div class="space-x-4">
                <a href="{{ route('articles.index') }}" class="hover:underline">Liste des Articles</a>
                <a href="{{ route('articles.create') }}" class="hover:underline">Publier un Article</a>
            </div>
        </div>
    </nav>
</body>
</html>
