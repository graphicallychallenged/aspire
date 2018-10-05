<?php
// Get Related Posts
// echo $post->post_type;
// echo $post->post_name;

$entry_id = get_the_ID();

if(is_singular('videos')) :

  // Get the parent content ID, if any:
  $parent_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );

  $parent_post = get_post($parent_id);

  $entry_id = $parent_id;
  $entry_post_type = get_post_type($parent_id);
  $entry_slug = $parent_post->post_name;
  $n = 5;

else :

  $entry_post_type = get_post_type();
  $entry_slug = $post->post_name;
  $n = 3;

endif;


$related_posts = aspire_get_related_posts($entry_post_type, $entry_slug, $n);
if ( $related_posts->have_posts() ) : ?>

  <aside class="widget">

    <div class="widget-header d-flex justify-content-between align-items-center">
      <h4 class="widget-title mb-0">Related Posts</h4>
      <!-- <a href="<?php echo esc_url(home_url()); ?>/tag/<?php echo $entry_slug; ?>" class="text-secondary">More ></a> -->
    </div>

    <hr class="mb-2">
    <ul class="list-unstyled">

      <?php
      while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

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

    <hr>
  </aside>

<?php
endif; ?>
