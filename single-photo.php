<?php get_template_part('parts/header'); ?>
<main class="single-photo">
  <section>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="single-photo__description">
      <div class="single-photo__description__detail">
        <h1>
          <?php the_title(); ?>
        </h1>
        <ul>
          <li class="single-photo__description__detail__ref">Référence : <?php echo get_field('reference') ? get_field('reference') : 'Inconnu'; ?></li>
          <li class="single-photo__description__detail__cat">Catégorie : <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', ', '') ?: 'Inconnu'; ?></li>
          <li class="single-photo__description__detail__format">Format : <?php echo get_the_term_list(get_the_ID(), 'format', '', ', ', '') ?: 'Inconnu'; ?></li>
          <li class="single-photo__description__detail__annee">Année : <?php echo get_the_date('Y') ?? 'Inconnu'; ?></li>
        </ul>
      </div>
      <div class="single-photo__description__photo">
        <?php
        $content = get_the_content();
        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        if (!empty($matches)) {
          echo '<img src="' . $matches[1] . '" alt="' . esc_attr(get_the_title()) . '">';
        } else {
          echo 'Image non disponible';
        }
        ?>
      </div>
    </div>
    <div class="single-photo__contact-next">
      <div class="single-photo__contact-next__contact">
        <p>Cette photo vous intéresse ? <span class="btn-contact">Contact</span></p>
      </div>
      <div class="single-photo__contact-next__next">
        <div class="single-photo__contact-next__next__miniature"></div>
        <?php
        $prev_post = get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        if (!empty($prev_post) || !empty($next_post)) {
        ?>
          <div class="navigation">
            <?php if (!empty($prev_post)) { ?>
              <a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev">&larr; </a>
            <?php } ?>
            <?php if (!empty($next_post)) { ?>
              <a href="<?php echo get_permalink($next_post->ID); ?>" class="next">&rarr;</a>
            <?php } ?>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  <?php endwhile;
    endif; ?>
  </section>
  <section class="single-photo-article">
    <h2>Vous aimerez AUSSI</h2>
    <div class="single-photo-article__detail">
      <?php
      $current_cat = get_the_terms(get_the_ID(), 'categorie');
      $current_cat_id = $current_cat[0]->term_id;

      $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'tax_query' => array(
          array(
            'taxonomy' => 'categorie',
            'field' => 'id',
            'terms' => $current_cat_id
          )
        ),
        'post__not_in' => array(get_the_ID())
      );

      $related_query = new WP_Query($args);

      if ($related_query->have_posts()) : while ($related_query->have_posts()) : $related_query->the_post();
      ?>
          <div class="related-post">
            <?php
            $content = get_the_content();
            preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
            if (!empty($matches)) {
              echo '<img src="' . $matches[1] . '" alt="' . esc_attr(get_the_title()) . '">';
            } else {
              echo 'Image non disponible';
            }
            ?>
          </div>
      <?php endwhile;
      endif;
      wp_reset_postdata(); ?>
    </div>
  </section>
</main>
<?php get_template_part('parts/footer'); ?>
