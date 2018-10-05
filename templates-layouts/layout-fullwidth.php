<?php
/*
 * Template Name: Fullwidth
 */
get_header(); ?>

<?php // get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-12" id="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'templates-content/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>

    </main>
  </div>
</div>

<?php
get_footer();
