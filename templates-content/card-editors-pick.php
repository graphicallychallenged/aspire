<?php

$terms = get_the_terms(get_the_ID(), 'seeyourselfhere');

if ( $terms && ! is_wp_error( $terms ) ) :

    $lifestyle_classes = array();

    foreach ( $terms as $term ) {
        // print_r($term);
        $lifestyle_classes[] = $term->slug;
    }

    $lifestyle_cats = join( ", ", $lifestyle_classes );

endif;
?>

<article class="card border-dark mb-4 <?php if($lifestyle_cats) { echo 'lifestyle ' . $lifestyle_cats; } ?>">

  <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail( array(350, 197), ['class' => 'img-fluid card-img-top'] ); ?>
  </a>

  <div class="card-body">

    <h5 class="card-title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h5>

    <p class="card-text text-secondary"><?php echo get_the_excerpt(); ?></p>

  </div>

  <div class="card-footer">
    <div class="d-flex justify-content-between align-items-center">
      <span class="text-uppercase font-weight-bold" style="letter-spacing: 1px;"><?php echo get_the_term_list( $post->ID, 'seeyourselfhere', '', ', ' ); ?></span>
      <span><?php echo get_the_term_list( $post->ID, 'category', '', ', ' ); ?></span>
    </div>
  </div>

</article>
