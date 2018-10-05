<?php
/*
 * Template Name: Fullbleed
 */
get_header(); ?>

<?php // get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

<div class="site-container" id="site-container">
  <div class="site-content" id="site-content">
    <main class="site-main" id="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'templates-content/content', 'fullbleed' );

      endwhile; // End of the loop.
      ?>

    </main>
  </div>
</div>

<?php
get_footer();
