<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="text-white font-bold">Accueil</a>
            <a href="{{ route('articles.index') }}" class="text-white ml-4">Articles</a>
            <a href="{{ route('articles.create') }}" class="text-white ml-4">Publier un Article</a>
        </div>
    </nav>

    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
</html>
