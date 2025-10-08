document.addEventListener("DOMContentLoaded", () => {
    const addBtn = document.getElementById("addProjectBtn");
    const formContainer = document.getElementById("projectForm");
    const cancelBtn = document.getElementById("cancelFormBtn");
    const form = document.getElementById("formProject");
    const projectsList = document.getElementById("projectsList");
    const formTitle = document.getElementById("formTitle");

    // Stockage local des projets (simulation)
    let projects = [];
    let editIndex = null;

    // Affiche le formulaire d’ajout
    addBtn.addEventListener("click", () => {
        formContainer.classList.remove("hidden");
        formTitle.textContent = "Add a New Project";
        form.reset();
        editIndex = null;
    });

    // Masque le formulaire
    cancelBtn.addEventListener("click", () => {
        formContainer.classList.add("hidden");
        form.reset();
        editIndex = null;
    });

    // Soumission du formulaire
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const project = {
            title: form.title.value.trim(),
            description: form.description.value.trim(),
            technologies: form.technologies.value.trim(),
            link: form.link.value.trim()
        };

        if (editIndex !== null) {
            // Modification
            projects[editIndex] = project;
        } else {
            // Ajout
            projects.push(project);
        }

        renderProjects();
        form.reset();
        formContainer.classList.add("hidden");
    });

    // Affiche les projets dans le tableau
    function renderProjects() {
        projectsList.innerHTML = "";

        if (projects.length === 0) {
            projectsList.innerHTML = `<tr><td colspan="6" style="text-align:center; color:#999;">No projects yet.</td></tr>`;
            return;
        }

        projects.forEach((project, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${project.title}</td>
                <td>${project.description}</td>
                <td>${project.technologies}</td>
                <td><a href="${project.link}" target="_blank">View</a></td>
                <td class="actions">
                    <button class="btn-edit" data-index="${index}">Edit</button>
                    <button class="btn-delete" data-index="${index}">Delete</button>
                </td>
            `;
            projectsList.appendChild(row);
        });

        // Gestion des boutons d’action
        document.querySelectorAll(".btn-edit").forEach(btn => {
            btn.addEventListener("click", handleEdit);
        });

        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", handleDelete);
        });
    }

    // Édition d’un projet
    function handleEdit(e) {
        editIndex = e.target.dataset.index;
        const project = projects[editIndex];

        form.title.value = project.title;
        form.description.value = project.description;
        form.technologies.value = project.technologies;
        form.link.value = project.link;

        formTitle.textContent = "Edit Project";
        formContainer.classList.remove("hidden");
    }

    // Suppression d’un projet
    function handleDelete(e) {
        const index = e.target.dataset.index;
        const confirmDelete = confirm("Are you sure you want to delete this project?");
        if (confirmDelete) {
            projects.splice(index, 1);
            renderProjects();
        }
    }

    // Initialisation de la page
    renderProjects();
});
