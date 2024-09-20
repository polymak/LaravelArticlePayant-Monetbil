<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Navigation</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body>
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">Accueil</a>
            <div class="space-x-4">
                <a href="{{ route('articles.index') }}" class="hover:underline">Articles</a>
                <a href="{{ route('articles.create') }}" class="hover:underline">Publier un article</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
