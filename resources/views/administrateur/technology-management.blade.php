<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Management</title>
    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/technology-management-style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Inclusion du header -->
    @include('partials.header-admin')

    <div class="main-content">
        <button id="retour">Back</button>

        <div class="formulaire">
            <form action="#" method="post">
                <label for="tech_name">Techno Name</label>
                <input type="text" name="tech_name" id="tech_name" placeholder=" Techno Name">
                <input type="submit" value="Valider" name="submit-techno">
            </form>
        </div>

       <div class="tableau">
            <table id="tbody">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Technologie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les données seront ajoutées ici -->
                </tbody>
            </table>
        </div>
    </div>


    <!-- Inclusion du footer -->
    @include('partials.footer')

    <script src="{{ asset('js/techno-management.js') }}"></script>
</body>
</html>