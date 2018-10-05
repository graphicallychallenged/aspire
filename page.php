<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

get_header(); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-7" id="site-main" role="main">

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

    <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
