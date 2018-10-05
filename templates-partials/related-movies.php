<div id="related-movies" class="py-5">
  <?php
    $entry_id = get_the_ID();
    $entry_slug = $post->post_name;

    // echo $entry_id;
    // echo $entry_slug;

    $related_movies = aspire_get_related_movies(6);
    if ( $related_movies->have_posts() ) :
    ?>

      <div class="container">
        <h4>More Great Movies</h4>
        <hr>
        <div class="row">

      <?php
      while ( $related_movies->have_posts() ) : $related_movies->the_post(); ?>

        <div class="related-movie col-12 col-md-4">
          <div class="card mb-3 mb-lg-3">
    	      <?php
            if(aspire_get_thumbnail_url()) : ?>
              <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid card-img-top">
              </a>
            <?php
            endif; ?>

            <div class="card-body">
              <a href="<?php the_permalink(); ?>">
                <h5 class="card-title"><?php the_title() ?></h5>
              </a>

              <!-- <p class="card-text text-secondary"> -->
                <?php // echo wp_trim_words(get_the_excerpt(), 20); ?>
              <!-- </p> -->
            </div>

          </div>
        </div>

        <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
        ?>

      </div>

    <?php
    else :

      echo 'No related posts to display';

    endif;
    ?>

  </div>
</div>
