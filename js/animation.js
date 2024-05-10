jQuery(document).ready(function($) {
    // Fermer le modal en cliquant sur le bouton de fermeture
    $(document).on('click', '.modal__content__close__croix', function(event){
        event.stopPropagation(); // Empêche la propagation de l'événement pour éviter de fermer le modal lors du clic sur le fond
        $(this).closest('.modal').fadeOut();
    });

    // Fermer le modal en cliquant sur le fond
    $(document).on('click', '.modal', function(){
        $(this).fadeOut();
    });
    
    // Empêcher la fermeture du modal lorsque vous cliquez à l'intérieur du modal lui-même
    $(document).on('click', '.modal__content', function(event){
        event.stopPropagation(); // Empêche la propagation de l'événement pour éviter de fermer le modal lors du clic à l'intérieur du modal
    });

    // Afficher la fenêtre modale lorsque le bouton est cliqué
    $('.btn-contact').click(function() {
        // Récupérer la référence de l'article sans le texte "référence :"
        var reference = $('.single-photo__description__detail__ref').text().trim().replace('Référence :', '');
        // Insérer la référence dans le champ du formulaire
        $('[name="reference"]').val(reference);
        // Afficher la fenêtre modale
        $('.modal').fadeIn();
    });

    // Toggle du menu burger
    $('.burger-menu-toggle').click(function() {
        $('.header__container').toggleClass('active');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var miniatureDiv = document.querySelector('.single-photo__contact-next__next__miniature');
    var nextLink = document.querySelector('.navigation .next');
    var prevLink = document.querySelector('.navigation .prev');
  
    var currentHoveredLink = null; // Variable pour stocker le lien actuellement survolé
  
    function displayImage(link, articleURL) {
      if (link) {
        fetch(link.href)
          .then(response => response.text())
          .then(html => {
            var parser = new DOMParser();
            var doc = parser.parseFromString(html, 'text/html');
            var image = doc.querySelector('.single-photo__description__photo img');
            var imageLink = document.createElement('a');
            imageLink.href = articleURL;
            imageLink.appendChild(image.cloneNode(true));
            miniatureDiv.innerHTML = '';
            miniatureDiv.appendChild(imageLink);
          })
          .catch(error => console.error('Error fetching next/prev image:', error));
      }
    }
  
    // Fonction pour gérer le survol du lien
    function handleLinkHover(event, link, articleURL) {
      if (currentHoveredLink !== link) { // Vérifie si le lien actuellement survolé est différent du précédent
        currentHoveredLink = link;
        displayImage(link, articleURL);
      }
    }
  
    // Ajoutez des écouteurs d'événements pour gérer le survol des liens
    if (nextLink) {
      nextLink.addEventListener('mouseenter', function(event) {
        handleLinkHover(event, nextLink, nextLink.href);
      });
      nextLink.addEventListener('mouseleave', function(event) {
        currentHoveredLink = null;
        miniatureDiv.innerHTML = ''; // Efface l'image lorsque le survol cesse
      });
    }
  
    if (prevLink) {
      prevLink.addEventListener('mouseenter', function(event) {
        handleLinkHover(event, prevLink, prevLink.href);
      });
      prevLink.addEventListener('mouseleave', function(event) {
        currentHoveredLink = null;
        miniatureDiv.innerHTML = ''; // Efface l'image lorsque le survol cesse
      });
    }
});
