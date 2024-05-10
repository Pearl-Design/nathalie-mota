<?php
wp_nav_menu( array(
  'menu' => 'menu-footer',
  'menu_class' => 'nav__footer',
  'container' => 'nav',
  'container_class' => 'nav__footer__container',
  'menu_class' => 'nav__footer__container__list',
) );
?>
<div class="modal">
  <div class="modal__content">
  <p class="modal__content__text"><span>ContactContactContact</span><br/><span>ContactContactContact</span></p>
    <div class="popup__content__form">
      <?php
    echo do_shortcode( '[contact-form-7 id="da61b30" title="Contact"]' );
    ?>
    </div>
  </div>
</div>
<?php wp_footer(); ?>