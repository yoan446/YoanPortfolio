document.addEventListener("DOMContentLoaded", function () {
    const apiListUrl = "http://localhost:8000/api/listes-technology";
    const apiAddUrl = "http://localhost:8000/api/ajouter-technology";
    const apiUpdateUrl = "http://localhost:8000/api/modifier-technologies";
    const apiDeleteUrl = "http://localhost:8000/api/supprimer-technologies";

    const tbody = document.querySelector("#tbody tbody");
    const form = document.querySelector(".formulaire form");
    const inputTech = document.querySelector("#tech_name");

    let editMode = false;
    let editId = null;

    // 🔹 Charger les technologies
    async function chargerTechnologies() {
        try {
            const response = await fetch(apiListUrl);
            if (!response.ok) throw new Error("Erreur de chargement des données");

            const technologies = await response.json();
            tbody.innerHTML = "";

            if (technologies.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="3" style="text-align:center; color:#999;">Aucune technologie disponible</td>
                    </tr>
                `;
                return;
            }

            technologies.forEach((tech) => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${tech.id}</td>
                    <td>${tech.tech_name}</td>
                    <td>
                        <button id="edit" class="edit-btn" data-id="${tech.id}" data-name="${tech.tech_name}">Edit</button>
                        <button id="delete" class="delete-btn" data-id="${tech.id}">Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            // Attacher les événements aux boutons
            activerBoutons();
        } catch (error) {
            console.error("Erreur:", error);
            tbody.innerHTML = `
                <tr><td colspan="3" style="color:red; text-align:center;">Erreur de chargement</td></tr>
            `;
        }
    }

    // 🔹 Ajouter ou modifier une technologie
    async function ajouterOuModifierTechnologie(event) {
        event.preventDefault();

        const techName = inputTech.value.trim();
        if (techName === "") {
            alert("Veuillez entrer un nom de technologie !");
            return;
        }

        const url = editMode ? `${apiUpdateUrl}/${editId}` : apiAddUrl;
        const method = editMode ? "PUT" : "POST";

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify({ tech_name: techName }),
            });

            if (!response.ok) throw new Error("Erreur lors de l'enregistrement");

            const result = await response.json();
            alert(editMode ? "Technologie modifiée avec succès" : "Technologie ajoutée avec succès");

            // Réinitialiser le formulaire
            inputTech.value = "";
            editMode = false;
            editId = null;
            form.querySelector('input[type="submit"]').value = "Valider";

            // Recharger les données
            chargerTechnologies();
        } catch (error) {
            console.error("Erreur:", error);
            alert("Une erreur est survenue : " + error.message);
        }
    }

    // 🔹 Supprimer une technologie
    async function supprimerTechnologie(id) {
        if (!confirm("Voulez-vous vraiment supprimer cette technologie ?")) return;

        try {
            const response = await fetch(`${apiDeleteUrl}/${id}`, { method: "DELETE" });
            if (!response.ok) throw new Error("Erreur lors de la suppression");

            alert("Technologie supprimée avec succès");
            chargerTechnologies();
        } catch (error) {
            console.error("Erreur:", error);
            alert("Une erreur est survenue : " + error.message);
        }
    }

    // 🔹 Activer les boutons Edit et Delete après chaque affichage
    function activerBoutons() {
        const editButtons = document.querySelectorAll(".edit-btn");
        const deleteButtons = document.querySelectorAll(".delete-btn");

        editButtons.forEach((btn) => {
            btn.addEventListener("click", function () {
                editMode = true;
                editId = this.dataset.id;
                inputTech.value = this.dataset.name;
                form.querySelector('input[type="submit"]').value = "Modifier";
            });
        });

        deleteButtons.forEach((btn) => {
            btn.addEventListener("click", function () {
                const id = this.dataset.id;
                supprimerTechnologie(id);
            });
        });
    }

    // Événements
    form.addEventListener("submit", ajouterOuModifierTechnologie);

    // Charger la liste initiale
    chargerTechnologies();
});
