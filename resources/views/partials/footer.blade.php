<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/footer-style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <footer>
        <h2>Yoan Tioma</h2>
        <span>&copy Made by love, all right reserved for Yoan Tioma</span>
        <div class="logo flex justify-center space-x-15">
            <img src="{{ asset('image/e-mail.png') }}" alt="Icône d'email">
            <img src="{{ asset('image/github.png') }}" alt="logo github">
            <img src="{{ asset('image/linkedin-logo.png') }}" alt="logo linkedin">
        </div>

    </footer>
</body>
</html>