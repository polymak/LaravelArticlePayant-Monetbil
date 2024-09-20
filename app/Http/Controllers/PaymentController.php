<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function pay($articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article non trouvé.');
        }

        $response = Http::post("https://api.monetbil.com/widget/v2.1/Ynli75VdeDA4X9rAbsGqCwsoAqZQQIpX", [
            'amount' => $article->price,
            'item_ref' => $article->id,
            'payment_ref' => uniqid(),
            'return_url' => route('article.show', $articleId), // Redirige vers l'article après paiement
            'notify_url' => env('CINETPAY_NOTIFY_URL'),
        ]);

        $data = $response->json();

        if ($data['success']) {
            return redirect($data['payment_url']);
        }

        return redirect()->route('articles.index')->with('error', 'Erreur lors de la création du paiement.');
    }
}
