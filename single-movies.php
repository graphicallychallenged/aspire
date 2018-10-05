<?php
/**
 * The Template for displaying Single Movies
 */
get_header(); ?>

  <!-- <div class="site-container container" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-lg-7" id="site-main" role="main">

        <?php // get_template_part( 'templates-partials/related-videos' ); ?>

        <?php // get_template_part( 'templates-partials/block-program', 'photos' ); ?>

        <?php
        // WordPress Loop
        // while ( have_posts() ) : the_post();
        //
        //   // get_template_part( 'templates-content/content', 'single' );
        //
        //   // if ( function_exists( 'sharing_display' ) ) {
        //   //   echo sharing_display();
        //   // }
        //
        // endwhile; // end of the loop.
        ?>

  	 </main>

      <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
        <?php // get_sidebar(); ?>
      </div>

    </div>
  </div> -->
  <?php get_template_part( 'templates-partials/related-movies' ); ?>

  <?php get_template_part( 'templates-partials/program-about' ); ?>

  <div id="related-movies" class="related-programs block block-inverse">
    <div class="container">
          <?php // echo do_shortcode( '[wpv-view name="related-movies"]' ); ?>
    </div>
  </div>

<?php
get_footer();
