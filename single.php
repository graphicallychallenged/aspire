<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aspire
 */
get_header(); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-7" id="site-main" role="main">

      <?php
        while ( have_posts() ) : the_post();

          $format = get_post_format() ? : 'standard';
          get_template_part( 'templates-content/content', $format );

          // the_post_navigation();
          //
          // // If comments are open or we have at least one comment, load up the comment template.
          // if ( comments_open() || get_comments_number() ) :
          //   comments_template();
          // endif;

        endwhile; // End of the loop.
      ?>

	 </main>

   <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
     <?php get_sidebar(); ?>
   </div>

  </div>
</div>

<?php
get_footer();
