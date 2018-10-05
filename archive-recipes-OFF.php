<?php
/**
 * The template for displaying the Recipes archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

<div id="series-featured" class="featured-programs block block-inverse p-y-md">
  <div class="container">
    <h3>Featured Recipes</h3>
    <hr>
    <?php echo do_shortcode('[wpv-view name="recipes-featured"]'); ?>

  </div>
</div>

<?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-md-8" id="site-main" role="main">

			<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header>

  					<?php

            /*Initialize loop variable */
            $loop_index = 0;
            // echo 'Loop Index: ' . $loop_index;

            echo '<div class="row">';

  					/* Start the Loop */
  					while ( have_posts() ) : the_post();

              // if(($loop_index % 2) == 0){
              //   echo '<div class="row">';
              // }

    						/*
    						 * Include the Post-Format-specific template for the content.
    						 * If you want to override this in a child theme, then include a file
    						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    						 */
    						get_template_part( 'templates-content/content', 'archive-recipes' );

                $loop_index++;
                // echo 'Loop Index: ' . $loop_index;

                if(($loop_index % 2) == 0){
                  echo '</div><div class="row">';
                }

  					endwhile;

              echo '</div>'; // Close final Row after loop ?>

              <div id="entry-navigation" class="p-t-md">
                <h4 style="color: #292929;">More Recipes</h4>
                <hr style="margin-top: 12px; margin-bottom: 6px;">

                <nav aria-label="recipes-navigation">
                  <?php posts_nav_link(); ?>
                  <!-- <ul class="pager">
                    <li class="previous"><?php previous_post_link('%link');  ?></li>
                    <li class="next"><?php next_post_link('%link'); ?></li>
                  </ul> -->
                </nav>
              </div>

      <?php

				else :

					get_template_part( 'templates-content/content', 'none' );

			endif; ?>

	 </main>

    <div id="sidebar" class="sidebar sidebar-recipes p-t-md col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar('recipes'); ?>
    </div>

  </div>
</div>

<?php
get_footer();
