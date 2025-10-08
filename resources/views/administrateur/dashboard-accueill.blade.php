<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Accueil</title>
    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/admin-home-style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Inclusion du header -->
    @include('partials.header-admin')

    <div class="main-content">
        <div class="all-tools">

            <a href="#">
                <div class="tools">
                    <div class="tools-img-1">
                    </div>
                    <span>Projects</span>
                </div>
            </a>

            <a href="#">
                <div class="tools">
                    <div class="tools-img-2">
                    </div>
                    <span>Tools</span>
                </div>
            </a>

            <a href="#">
                <div class="tools">
                    <div class="tools-img-3">
                    </div>
                    <span>Contacts</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Inclusion du footer -->
    @include('partials.footer')

</body>
</html>
