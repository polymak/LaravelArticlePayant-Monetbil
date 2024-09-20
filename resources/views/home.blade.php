@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Articles Récents</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($articles as $article)
                <div class="bg-white shadow-lg rounded-lg p-5 hover:shadow-xl transition-shadow">
                    <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
                    <p class="mt-2">{{ Str::limit($article->content, 100) }}</p>
                    <p class="mt-2 font-bold">{{ number_format($article->price, 2) }} CDF</p>

                    {{-- Affichage du bouton en fonction du statut payé ou non --}}
                    @if ($article->paid)
                        <p class="mt-2 bg-green-500 text-white p-2 rounded">Article payé</p>
                        <a href="{{ route('article.show', $article->id) }}" class="bg-green-500 text-white p-2 rounded mt-4 inline-block">Lire l'article complet</a>
                    @else
                        <a href="{{ route('article.pay', $article->id) }}" class="bg-blue-500 text-white p-2 rounded mt-4 inline-block">Payer</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
