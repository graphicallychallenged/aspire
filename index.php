<?php
/**
 * The template for displaying the Index page.
 */
get_header(); ?>

<div class="site-container" id="site-container">
  <div class="site-content" id="site-content">
    <main class="site-main" id="site-main" role="main">

  <?php
    if ( have_posts() ) :

      if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>

      <?php
      endif;

      /* Start the Loop */
      while ( have_posts() ) : the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'templates-content/content', get_post_format() );

      endwhile;

      the_posts_navigation();

    else :

      get_template_part( 'templates-content/content', 'none' );

    endif; ?>

    </main>
  </div>
</div>

<?php
get_footer();
