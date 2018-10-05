<div id="related-posts" class="">
  <?php
    $entry_id = get_the_ID();
    $entry_slug = $post->post_name;

    // echo $entry_id;
    // echo $entry_slug;

    $related_posts = aspire_get_related_posts($entry_slug, 3);
    if ( $related_posts->have_posts() ) : ?>

      <h4><?php the_title(); ?> News</h4>
      <hr>

      <?php
      while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

        <div class="related-post">

          <a href="<?php echo get_the_permalink(); ?>">
    		      <?php
              if(get_the_post_thumbnail_url()) { ?>

                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid mb-3">

              <?php
              } else { ?>

                <img src="<?php echo get_the_post_thumbnail_url($entry_id); ?>" class="img-fluid mb-3">

              <?php } ?>
          </a>

          <a href="<?php the_permalink(); ?>">
            <h4><?php the_title() ?></h4>
          </a>

          <?php the_excerpt(); ?>

          <hr>

        </div>

        <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();

    else :

      echo 'No related posts to display';

    endif;

  ?>

</div>
