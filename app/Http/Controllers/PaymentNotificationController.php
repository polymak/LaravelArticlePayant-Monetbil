<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PaymentNotificationController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Vérifiez la notification de paiement
        $paymentStatus = $request->input('status'); // Remplacez cela par le bon champ de votre notification

        if ($paymentStatus === 'SUCCESS') {
            // Mettre à jour l'état de l'article comme payé
            $articleId = $request->input('article_id'); // Assurez-vous que cela correspond à la structure de votre notification
            $article = Article::find($articleId);

            if ($article) {
                $article->update(['paid' => true]); // Ajoutez une colonne `paid` dans votre table `articles`
                // Redirigez vers la page de l'article avec un message de succès
                return redirect()->route('article.show', $articleId)->with('success', 'Paiement reçu avec succès ! Vous pouvez lire l\'article complet.');
            }
        }

        // Gérer les échecs de paiement ou autres cas
        return response()->json(['message' => 'Notification non traitée'], 400);
    }
}
