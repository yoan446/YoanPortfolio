document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour charger les technologies
    function chargerTechnologies() {
        fetch('api/listes-technology') // ton endpoint Laravel
            .then(response => response.json())
            .then(data => {
                const toolsContainer = document.getElementById('tools-container');
                toolsContainer.innerHTML = ''; // on vide le contenu avant d’ajouter

                // On parcourt les données renvoyées par Laravel
                data.forEach(tech => {
                    const span = document.createElement('span');
                    span.textContent = tech.tech_name; // le champ dans ta BDD
                    toolsContainer.appendChild(span);
                });
            })
            .catch(error => {
                console.error('Erreur lors du chargement des technologies:', error);
            });
    }

    // Appel de la fonction au chargement de la page
    chargerTechnologies();
});


// Sélectionner les éléments du formulaire
const form = document.querySelector('.contact-form');
const btnSubmit = document.querySelector('.btn-submit');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');

// Fonction pour envoyer le formulaire
async function envoyerFormulaire(e) {
    e.preventDefault();
    
    // Récupérer les valeurs du formulaire
    const formData = {
        name: nameInput.value.trim(),
        email: emailInput.value.trim(),
        message: messageInput.value.trim()
    };
    
    // Validation basique côté client
    if (!formData.name || !formData.email || !formData.message) {
        alert('Veuillez remplir tous les champs');
        return;
    }
    
    // Désactiver le bouton pendant l'envoi
    btnSubmit.disabled = true;
    btnSubmit.textContent = 'Envoi en cours...';
    
    try {
        // Envoyer la requête POST
        const response = await fetch('/api/envoyer-message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                // Si vous utilisez CSRF token de Laravel
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify(formData)
        });
        
        const data = await response.json();
        
        if (response.ok) {
            // Succès
            alert(data.message || 'Message envoyé avec succès !');
            // Réinitialiser le formulaire
            form.reset();
        } else {
            // Erreur de validation ou autre
            const errors = data.errors;
            if (errors) {
                const errorMessages = Object.values(errors).flat().join('\n');
                alert('Erreurs:\n' + errorMessages);
            } else {
                alert(data.message || 'Une erreur est survenue');
            }
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Erreur de connexion. Veuillez réessayer.');
    } finally {
        // Réactiver le bouton
        btnSubmit.disabled = false;
        btnSubmit.textContent = 'Submit';
    }
}

// Ajouter l'événement au bouton submit
btnSubmit.addEventListener('click', envoyerFormulaire);

// Optionnel : permettre l'envoi avec la touche Entrée dans le formulaire
form.addEventListener('submit', envoyerFormulaire);