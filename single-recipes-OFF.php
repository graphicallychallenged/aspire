<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aspire
 */
get_header(); ?>

<?php get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

<?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

<div class="site-container container p-y-md" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-md-8" id="site-main" role="main">

      <?php
        while ( have_posts() ) : the_post();

          get_template_part( 'templates-content/content', get_post_format() ); ?>

          <div id="entry-navigation" class="p-t-md">
            <h4 style="color: #292929;">More Recipes</h4>
            <hr style="margin-top: 12px; margin-bottom: 6px;">

            <nav aria-label="recipes-navigation">
              <ul class="pager">
                <li class="previous"><?php previous_post_link('%link');  ?></li>
                <li class="next"><?php next_post_link('%link'); ?></li>
              </ul>
            </nav>
          </div>


          <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; // End of the loop.
      ?>

	 </main>

   <div id="sidebar" class="sidebar sidebar-recipes p-t-md col-md-3 col-md-offset-1" role="complementary">
     <?php get_sidebar('recipes'); ?>
   </div>

  </div>
</div>

<?php
get_footer();
