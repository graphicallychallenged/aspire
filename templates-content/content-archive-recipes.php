<?php
/**
 * Template part for displaying Archive Content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6'); ?>>

    <div class="entry-image m-b-sm">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'full', ['class' => 'img-fluid' ] ); ?>
      </a>
    </div>

    <div class="entry-content">
      <!-- <span class="entry-date entry-meta"><?php the_time('F j, Y'); ?></span> -->
      <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <!-- <p class="entry-summary"><?php echo get_the_excerpt(); ?></p> -->
      <!-- <p><a class="entry-link" href="<?php the_permalink(); ?>">Read More</a></p> -->
    </div>

</article>
