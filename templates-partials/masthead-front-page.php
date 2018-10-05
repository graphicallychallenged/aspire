<?php
if(has_post_thumbnail()){
  $masthead_bg = get_the_post_thumbnail_url($post->ID, 'full');
}
?>

<section id="masthead"
         class="masthead masthead-front-page py-3 pb-lg-3 pt-lg-4 text-light"
         style="background-image: url(<?php echo $masthead_bg; ?>); background-size: cover; background-position: 50% 50%;">

  <div class="container">

    <div class="row">
      <div class="col-md-8">

        <?php
        $masthead_a = aspire_get_featured_slot('homepage-masthead-a');
        if ( $masthead_a->have_posts() ) :
          while ( $masthead_a->have_posts() ) : $masthead_a->the_post();
            get_template_part( 'templates-content/card-masthead-primary' );
          endwhile;

          /* Restore original Post Data */
          wp_reset_postdata();
          wp_reset_query();

        endif;
        ?>
      </div>

      <div class="col-md-4">
        <!-- <h2 class="h5" style="color:rgba(255,255,255,0.6); letter-spacing: 0.05em;">Featured Content</h2> -->
        <?php
        $masthead_b= aspire_get_featured_slot('homepage-masthead-b');
        if ( $masthead_b->have_posts() ) :
          while ( $masthead_b->have_posts() ) : $masthead_b->the_post();
            get_template_part( 'templates-content/card-masthead-secondary' );
          endwhile;
          /* Restore original Post Data */
          wp_reset_postdata();
          wp_reset_query();
        endif;
        ?>
        <?php
        $masthead_c= aspire_get_featured_slot('homepage-masthead-c');
        if ( $masthead_c->have_posts() ) :
          while ( $masthead_c->have_posts() ) : $masthead_c->the_post();
            get_template_part( 'templates-content/card-masthead-secondary' );
          endwhile;
          /* Restore original Post Data */
          wp_reset_postdata();
          wp_reset_query();
        endif;
        ?>
        <?php
        // $masthead_d= aspire_get_featured_slot('homepage-masthead-d');
        // if ( $masthead_d->have_posts() ) :
        //   while ( $masthead_d->have_posts() ) : $masthead_d->the_post();
        //     get_template_part( 'templates-content/card-masthead-secondary' );
        //   endwhile;
        //   /* Restore original Post Data */
        //   wp_reset_postdata();
        //   wp_reset_query();
        // endif;
        ?>
      </div>
    </div>

  </div>
</section>
