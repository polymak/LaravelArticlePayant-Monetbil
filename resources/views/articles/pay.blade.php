<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payer pour l'Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @include('partials.navbar')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Payer pour l'Article</h1>
        <div class="border p-4 rounded shadow bg-white">
            <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $article->content }}</p>
            <p class="text-lg font-bold mb-4">{{ number_format($article->price, 2) }} CDF</p>
            <form id="paymentForm" action="{{ $paymentUrl }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <button type="submit" class="mt-2 inline-block bg-blue-500 text-white py-2 px-4 rounded">Payer</button>
            </form>
        </div>
    </div>
    <script>
        // CinetPay seamless payment initialization
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            CinetPay.redirect(form.action, {
                // Configuration pour CinetPay
            });
        });
    </script>
</body>
</html>
