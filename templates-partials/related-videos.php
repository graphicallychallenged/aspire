<div id="related-videos" class="related-videos">
  <?php

  $entry_id = get_the_ID();

  if(is_singular('videos')) :

    // Get the parent content ID, if any:
    $parent_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );

    $parent_post = get_post($parent_id);

    $entry_id = $parent_id;
    $entry_post_type = get_post_type($parent_id);
    $entry_slug = $parent_post->post_name;
    $n = 6;

  else :

    $entry_post_type = get_post_type();
    $entry_slug = $post->post_name;
    $n = 4;

  endif;


    $related_videos = aspire_get_related_videos($entry_post_type, $entry_slug, $n);
    if ( $related_videos->have_posts() ) : ?>

      <h4>Related Videos</h4>
      <hr>

      <?php
      while ( $related_videos->have_posts() ) : $related_videos->the_post(); ?>

        <div class="related-video row">
          <div class="col-md-7">
            <?php
            if(aspire_get_thumbnail_url()) : ?>
              <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid mb-3 mb-md-0">
              </a>
            <?php
            endif; ?>
          </div>
          <div class="col-md-5">

            <?php // Get the parent content ID, if any:
              $parent_id = get_post_meta( get_the_ID(), '_wpcf_belongs_series_id', true );

              if($parent_id) :

                $parent_title = get_the_title($parent_id);
                $parent_link = get_the_permalink($parent_id); ?>

                <p class="video-meta mb-1">
                  <a href="<?php echo $parent_link; ?>" class="text-secondary">
                    <?php echo $parent_title; ?>
                  </a>
                </p>

              <?php
              endif; ?>

            <a href="<?php the_permalink(); ?>">
              <h5><?php the_title() ?></h5>
            </a>
            <p class="text-secondary"><?php echo get_the_excerpt(); ?></p>
          </div>
        </div>

        <hr>

        <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();

    else :

      // echo 'No related videos to display';

    endif;

    wp_reset_postdata();
    wp_reset_query();

  ?>
</div>
