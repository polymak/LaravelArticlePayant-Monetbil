@extends('layouts.app')

@section('title', 'Créer un Article')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Créer un Nouvel Article</h1>
        <form action="{{ route('articles.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-md p-3 focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-md h-32 resize-none p-3 focus:ring focus:ring-blue-200" required></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix (CDF)</label>
                <input type="number" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-md p-3 focus:ring focus:ring-blue-200" step="0.01" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition-colors w-full">Publier</button>
        </form>
    </div>
@endsection
