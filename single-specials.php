<?php
/**
 * The Template for displaying Single Specials
 */
get_header(); ?>

  <?php get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

  <?php get_template_part( 'templates-partials/block-program', 'about' ); ?>

  <?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

  <div class="site-container container p-y-md" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-md-8" id="site-main" role="main">

        <?php get_template_part( 'templates-partials/block-program', 'videos' ); ?>

        <?php get_template_part( 'templates-partials/block-program', 'photos' ); ?>

          <?php
          // WordPress Loop
          //          while ( have_posts() ) : the_post();

          //            get_template_part( 'templates-content/content', 'single' );

            // if ( function_exists( 'sharing_display' ) ) {
            //   echo sharing_display();
            // }

            //        endwhile; // end of the loop.
          ?>

    </main>

    <div id="sidebar" class="sidebar sidebar-primary col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

    </div>
  </div>

  <div id="related-specials" class="related-programs block block-inverse">
    <div class="container">
      <?php echo do_shortcode( '[wpv-view name="related-specials"]' ); ?>
    </div>
  </div>

<?php
get_footer();
