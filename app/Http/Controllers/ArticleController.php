<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    // Affichage de la page d'accueil avec les articles récents
    public function home()
    {
        $articles = Article::latest()->take(10)->get();
        return view('home', compact('articles'));
    }

    // Affichage de la liste des articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Affichage du formulaire de création d'article
    public function create()
    {
        return view('articles.create');
    }

    // Sauvegarde d'un nouvel article
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->price = $request->input('price');
        $article->paid = false;  // Initialise l'article comme non payé
        $article->save();

        return redirect()->route('articles.index');
    }

    // Affichage d'un article spécifique
    public function show($id)
    {
        $article = Article::find($id);

        if (!$article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }

    // Gestion du paiement d'un article
    public function pay(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            abort(404);
        }

        // Appel à l'API Monetbil pour le paiement
        $response = Http::post("https://api.monetbil.com/widget/v2.1/Ynli75VdeDA4X9rAbsGqCwsoAqZQQIpX", [
            'amount' => $article->price,
            'item_ref' => $article->id,
            'return_url' => route('article.show', ['article' => $article->id]),
            'notify_url' => env('CINETPAY_NOTIFY_URL'),
        ]);

        $data = $response->json();

        if ($data['success']) {
            // Rediriger vers l'URL de paiement
            return redirect($data['payment_url']);
        }

        return redirect()->back()->with('error', 'Erreur lors de la création du paiement.');
    }

    // Gestion des notifications après paiement réussi
    public function handlePaymentNotification(Request $request)
    {
        $articleId = $request->input('item_ref');
        $article = Article::find($articleId);

        if ($article) {
            // Mise à jour de l'article comme payé après confirmation du paiement
            $article->paid = true;
            $article->save();
        }

        return response()->json(['status' => 'success']);
    }
}
