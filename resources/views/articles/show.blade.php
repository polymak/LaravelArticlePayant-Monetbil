@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container mx-auto mt-10 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full md:w-2/3 lg:w-1/2">
            <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
            <p class="text-lg mb-4">{{ $article->content }}</p>

            <!-- Affichage du prix -->
            <p class="mt-4 text-2xl font-bold text-gray-700">{{ number_format($article->price, 2) }} CDF</p>

            @if ($article->paid)
                <!-- Message article payé -->
                <div class="bg-green-500 text-white p-4 mt-4 rounded-lg">
                    Cet article a été payé.
                </div>
            @else
                <!-- Afficher bouton Payer si l'article n'est pas payé -->
                <a href="{{ route('article.pay', $article->id) }}" class="bg-blue-500 text-white p-2 rounded block text-center mt-4">
                    Payer
                </a>
            @endif
        </div>
    </div>
@endsection
