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

    $('.burger-menu-toggle').click(function() {
        $('.header__container').toggleClass('active');
    });
});