<?php
/**
 * The Template for displaying Single Series
 */
get_header(); ?>

  <div class="site-container container" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-lg-7" id="site-main" role="main">

          <?php
            // // WordPress Loop
            // while ( have_posts() ) : the_post();
            //
            //   // echo "<pre>";
            //   // print_r($post);
            //   // echo "</pre>";
            //
            //   // get_template_part( 'templates-content/content', 'series' );
            //
            //   // if ( function_exists( 'sharing_display' ) ) {
            //   //   echo sharing_display();
            //   // }
            //
            // endwhile; // end of the loop.
          ?>

        <?php get_template_part( 'templates-partials/related-videos' ); ?>

        <?php get_template_part( 'templates-partials/related-photos' ); ?>
        <?php // get_template_part( 'templates-partials/related-episodes' ); ?>

        <div id="related-episodes" class="related-episodes">
          <?php echo do_shortcode("[wpv-view name='all-episodes-of-current-series-by-season']"); ?>
        </div>

  	</main>

    <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

    </div>
  </div>

  <?php get_template_part( 'templates-partials/program-about' ); ?>

<?php
get_footer();
