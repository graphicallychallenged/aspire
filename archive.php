<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

<div class="site-container container" id="site-container">

  <!-- <header class="archive-header mb-3">
    <?php
      the_archive_title( '<h1 class="page-title h3">', '</h1>' );
      the_archive_description( '<div class="archive-description">', '</div>' );
    ?>
  </header> -->
  
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-7" id="site-main" role="main">

			<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
             $format = get_post_format() ? : 'standard';
             get_template_part( 'templates-content/excerpt', $format );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'templates-content/content', 'none' );

			endif; ?>

	 </main>

    <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
