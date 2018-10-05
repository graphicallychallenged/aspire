<?php
/**
 * The Template for displaying Single Videos
 */
get_header(); ?>

  <div class="site-container container" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-lg-7" id="site-main" role="main">

        <?php
        // include(locate_template('templates-partials/related-videos.php'));

        get_template_part( 'templates-partials/related-videos' ); ?>

  	  </main>

      <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>

<?php
get_footer();
