<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Management</title>

    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/project-management-style.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Inclusion du header -->
    @include('partials.header-admin')

    <div class="main-content">
        <!-- Bouton retour -->
        <button id="retour" onclick="window.history.back()">Back</button>

        <div class="projects-container">
            <div class="projects-header">
                <h1>Projects Management</h1>
                <button id="addProjectBtn" class="btn-primary">+ Add New Project</button>
            </div>

            <!-- Formulaire d'ajout / modification -->
            <div class="project-form hidden" id="projectForm">
                <h2 id="formTitle">Add a New Project</h2>
                <form id="formProject">
                    <div class="form-group">
                        <label for="title">Project Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter project title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Short description..." required></textarea>
                    </div>

                    <!-- ✅ Nouvelle section avec cases à cocher pour les technologies -->
                    <div class="form-group">
                        <label>Technologies Used</label>
                       <div class="checkbox-group" id="technologiesContainer">
                            <!-- Les cases seront générées dynamiquement ici -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link">Project Link</label>
                        <input type="url" id="link" name="link" placeholder="https://example.com">
                    </div>

                    <div class="form-group">
                        <label for="image">Image URL</label>
                        <input type="url" id="image" name="image" placeholder="https://example.com/image.jpg">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Save</button>
                        <button type="button" class="btn-secondary" id="cancelFormBtn">Cancel</button>
                    </div>
                </form>
            </div>

            <!-- Liste des projets -->
            <table class="projects-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Technologies</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projectsList">
                    <tr>
                        <td>1</td>
                        <td>Portfolio Website</td>
                        <td>Personal showcase of my projects and skills.</td>
                        <td>HTML, CSS, JS</td>
                        <td><a href="#" target="_blank">View</a></td>
                        <td><img src="https://via.placeholder.com/80" alt="Project" width="60"></td>
                        <td class="actions">
                            <button class="btn-edit">Edit</button>
                            <button class="btn-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inclusion du footer -->
    @include('partials.footer')

    <script src="{{ asset('js/project-management.js') }}"></script>
</body>
</html>
