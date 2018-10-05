<div id="masthead-videos" class="masthead masthead-videos text-light py-3 py-lg-5">
  <div class="container" style="position: relative; z-index: 3;">
    <?php
    if(!is_paged()) :
      $video_archive_masthead = aspire_get_video_archive_masthead(1);
      if ( $video_archive_masthead->have_posts() ) :
        while ( $video_archive_masthead->have_posts() ) : $video_archive_masthead->the_post();

        $entry_id  = get_the_ID();
        $entry_post_type = get_post_type($entry_id);
        //  echo "Entry ID " . $entry_id;
        //  echo "Entry Post Type " . $entry_post_type;

        $masthead_video_id    = aspire_get_masthead_video($entry_id, $entry_post_type);
        // echo $masthead_video_id;


          if (!empty($masthead_video_id)) : ?>

            <div class="row">
              <div class="col-md-7">
                <div id="featured-video" class="video mb-3 mb-lg-0">
                  <?php // Insert JW Player
                    echo do_shortcode('[jwplayer ' . $masthead_video_id[0] . ']'); ?>
                </div>
              </div>

                <div class="col-md-5">
                  <h6 class="text-uppercase text-secondary">Featured Video
                    <?php // Get the parent content ID, if any:
                      $parent_id = get_post_meta( get_the_ID(), '_wpcf_belongs_series_id', true );

                      if($parent_id) :

                        $parent_title = get_the_title($parent_id);
                        $parent_link = get_the_permalink($parent_id); ?>
                        |
                        <a href="<?php echo $parent_link; ?>" class="text-secondary">
                            <?php echo $parent_title; ?>
                        </a>

                    <?php
                    endif; ?>
                  </h6>

                  <a href="<?php the_permalink(); ?>" class="text-white">
                    <h2><?php the_title(); ?></h2>
                  </a>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div>
              </div>

            <?php
            endif;
          endwhile;
        /* Restore original Post Data */
        wp_reset_postdata();
        wp_reset_query();

      else: ?>

        <h1 class="page-title h4 my-0 text-light mr-auto"><?php aspire_smart_title(); ?></h1>

      <?php
      endif;

    else: ?>

      <h1 class="page-title h4 my-0 text-light mr-auto"><?php aspire_smart_title(); ?></h1>

    <?php
    endif;
    ?>

  </div>
  <div class="dimmer dimmer-90"></div>
</div>
