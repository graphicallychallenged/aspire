<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aspire
 */

get_header(); ?>

<div class="site-container container" id="site-container">

  <!-- <header class="page-header">
    <h1 class="page-title h2 text-muted"><?php printf( esc_html__( 'Search Results for: %s', 'aspire' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
  </header> -->

  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-7" id="site-main" role="main">

			<?php
			if ( have_posts() ) :

        /* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'templates-content/content', 'search' );

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
