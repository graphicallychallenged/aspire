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
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-12" id="site-main" role="main">

      <?php
        if ( have_posts() ) : ?>

          <header class="page-header">
            <h3 class="page-title text-muted"><?php the_archive_title(); ?></h3>
            <hr>
          </header>

        <?php
          echo '<div class="row">';

            while ( have_posts() ) : the_post();

              echo '<div class="col-sm-6 col-lg-4">';
                get_template_part( 'templates-content/card-series' );
              echo '</div>';

            endwhile;

          echo '</div>';

          the_posts_navigation();

        else :

          get_template_part( 'templates-content/content', 'none' );

      endif; ?>

	  </main>

  </div>
</div>

<?php
get_footer();
