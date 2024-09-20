@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-2">{{ $article->title }}</h2>
                    <p>{{ Str::limit($article->content, 100) }}</p>
                    <p class="mt-4 font-bold">{{ number_format($article->price, 2) }} CDF</p>

                    @if ($article->paid)
                        <!-- Si l'article est payé, afficher le bouton Lire l'article complet -->
                        <a href="{{ route('article.show', $article->id) }}" class="bg-blue-500 text-white p-2 rounded mt-4 block text-center">
                            Lire l'article complet
                        </a>
                    @else
                        <!-- Si l'article n'est pas payé, afficher le bouton Payer -->
                        <a href="{{ route('article.pay', $article->id) }}" class="bg-blue-500 text-white p-2 rounded mt-4 block text-center">
                            Payer
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
