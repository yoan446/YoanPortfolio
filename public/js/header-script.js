const menuToggle = document.getElementById('menuToggle');
const items = document.getElementById('items');

menuToggle.addEventListener('click', function() {
    this.classList.toggle('active');
    items.classList.toggle('active');
});

// Fermer le menu quand on clique sur un lien
const menuLinks = items.querySelectorAll('a');
menuLinks.forEach(link => {
    link.addEventListener('click', function() {
        menuToggle.classList.remove('active');
        items.classList.remove('active');
    });
});