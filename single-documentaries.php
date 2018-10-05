<?php
/**
 * The Template for displaying Single Documentaries
 */
get_header(); ?>

  <?php get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

  <?php get_template_part( 'templates-partials/block-program', 'about' ); ?>

  <?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

  <div class="site-container container p-y-md" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-md-8" id="site-main" role="main">

        <?php // get_template_part( 'partials/block-episode', 'extras'); ?>

        <?php
        // WordPress Loop
        while ( have_posts() ) : the_post();

//          get_template_part( 'templates-content/content', 'single' );

          // if ( function_exists( 'sharing_display' ) ) {
          //   echo sharing_display();
          // }

        endwhile; // end of the loop.
        ?>
        <?php get_template_part( 'templates-partials/block-series', 'videos' ); ?>

         <?php echo do_shortcode( '[wpv-view name="videos-most-recent"]' ); ?>

    </main>

    <div id="sidebar" class="sidebar sidebar-primary col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

    </div>
  </div>


  <div id="related-documentaries" class="related-programs block block-inverse">
    <div class="container">
        <?php echo do_shortcode( '[wpv-view name="related-documentaries"]' ); ?>
    </div>
  </div>

<?php
get_footer();
