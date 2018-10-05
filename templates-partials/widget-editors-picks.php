<aside class="widget">

  <div class="widget-header d-flex justify-content-between align-items-center">
    <h4 class="widget-title mb-0">Editor's Picks</h4>
    <a href="<?php echo esc_url(home_url()); ?>/blog" class="text-secondary">All Articles ></a>
  </div>

  <hr class="mb-2">

  <?php // Get Featured Posts
  $featured_posts = aspire_get_editors_picks(3);
  if ( $featured_posts->have_posts() ) : ?>

    <ul class="list-unstyled">

      <?php
      while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>

        <li class="media mb-3">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( array(130, 130), ['class' => 'mr-3'] ); ?>
          </a>
          <div class="media-body">

            <p class="text-secondary mb-1"><?php echo get_the_term_list( $post->ID, 'category', '', ', ' ); ?> | <?php echo get_the_term_list( $post->ID, 'seeyourselfhere', '', ', ' ); ?></p>

            <a href="<?php the_permalink(); ?>">
              <h6 class="mt-2 mb-1"><?php the_title(); ?></h6>
            </a>
          </div>
        </li>

      <?php
      endwhile;
      // Restore original Post Data
      wp_reset_postdata();
      wp_reset_query();
      ?>

    </ul>

    <?php
    endif; ?>

<hr>
</aside>
