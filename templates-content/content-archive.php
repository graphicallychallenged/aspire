<?php
/**
 * Template part for displaying Archive Content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-image">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( array(585, 293) ); ?>
      </a>
    </div>

    <div class="entry-content">
      <span class="entry-date entry-meta"><?php the_time('F j, Y'); ?></span>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p class="entry-summary"><?php echo get_the_excerpt(); ?></p>
      <p><a class="entry-link" href="<?php the_permalink(); ?>">Read More</a></p>
    </div>

</article>
