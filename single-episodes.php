<?php
/**
 * The Template for displaying Single Episodes
 */
get_header();

// Get associated Series ID
$series_id  = get_post_meta($post->ID, '_wpcf_belongs_series_id', true);
$episodenum = get_post_meta($post->ID, 'wpcf-episode-number', true);
$seasonnum  = get_post_meta($post->ID, 'wpcf-season', true);
?>

  <div class="site-container container p-y-md" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-lg-7" id="site-main" role="main">

        <?php
        // WordPress Loop
        //          while ( have_posts() ) : the_post();

        //    				get_template_part( 'templates-content/content', 'single' );

          // if ( function_exists( 'sharing_display' ) ) {
          //   echo sharing_display();
          // }

          //  			endwhile; // end of the loop.
        ?>

        <?php // get_template_part( 'templates-partials/block-program', 'videos' ); ?>

        <?php // get_template_part( 'templates-partials/block-program', 'photos' ); ?>

        <?php // echo do_shortcode("[wpv-view name='all-videos-of-current-program']"); ?>

        <?php get_template_part( 'templates-partials/related-episodes' ); ?>

  	</main>

    <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

    </div>
  </div>

  <!-- <div id="related-episodes" class="related-programs block block-inverse">
    <div class="container">
      <h2>Related Episodes</h2>
      <hr>

      <?php // echo do_shortcode('[wpv-view name="related-episodes-by-series" seriesid="'. $series_id .'"]'); ?>
    </div>
  </div> -->

<?php
get_footer();
