<!-- Subnavigation -->
<nav id="subnavigation" data-spy="affix" data-offset-top="60" data-offset-bottom="200" class="navbar navbar-inverse p-y-0 hidden-xs" style="background-color: #292929;">

  <div class="container">

    <div class="collapse navbar-collapse" id="navbar-social">
        <ol class="breadcrumb navbar-left" id="subnav-breadcrumbs">

        <?php

        $entry_id  = get_the_ID();
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object( $post_type );

  //      echo $post_type;

        // No Subnav on Homepage
        if(is_front_page() ) { ?>

        <?php } elseif( is_page() ) { ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li class="active"><?php the_title(); ?></li>

        <?php } elseif( is_woocommerce() ) {

          	$args = array(
          			'delimiter' => '/',
          			'wrap_before' => '',
        			  'wrap_after' => '',
                'before' => '<li>',
        			  'after' => '</li>',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),

          	);

            woocommerce_breadcrumb( $args );

        } elseif( $post_type == 'series' && is_singular() ) { ?>

          <!-- <li><a href="<?php echo esc_url(home_url());?>">Home</a></li> -->

          <li><a href="<?php echo get_post_type_archive_link( $post_type ); ?>"><?php echo $post_type_obj->labels->name; ?></a></li>

          <li class="active"><?php the_title(); ?></li>

          <!-- <li><a href="#site-main">Overview</a></li> -->
          <?php

          $entry_videos = types_child_posts("videos");
            if($entry_videos) {
          ?>

            <li><a href="#section-videos">Videos</a></li>

          <?php } ?>

          <?php if( get_post_meta( $entry_id, 'wpcf-photo-gallery-id' ) ) { ?>
            <li><a href="#section-photos">Photos</a></li>
          <?php } ?>

          <?php
          $entry_episodes = types_child_posts("episodes");
          if($entry_episodes) { ?>
              <li><a href="#section-episodes">Episodes</a></li>
          <?php } ?>

        <?php } elseif( $post_type == 'episodes' && is_singular() ) {

              // If this is an episode, get the parent series id:
              $series_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );
            ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li><a href="<?php echo get_permalink($series_id); ?>"><?php echo get_the_title($series_id); ?></a></li>
          <li class="active"><?php the_title(); ?></li>

          <?php

          $entry_videos = types_child_posts("videos");
            if($entry_videos) {
          ?>

            <li><a href="#section-videos">Videos</a></li>

          <?php } ?>

          <?php if( get_post_meta( $entry_id, 'wpcf-photo-gallery-id' ) ) { ?>
            <li><a href="#section-photos">Photos</a></li>
          <?php } ?>

<!--           <li><a href="#site-main">Overview</a></li>
          <li><a href="#program-airings">Upcoming Airings</a></li> -->

        <?php } elseif( is_singular() ) { ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li><a href="<?php echo get_post_type_archive_link( $post_type ); ?>"><?php echo $post_type_obj->labels->name; ?></a></li>
          <li class="active"><?php the_title(); ?></li>

        <?php } elseif( is_post_type_archive('timeslots') ) { ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li class="active">Schedule</li>

        <?php } elseif( is_tax() ) { ?>

          <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li><a href="<?php echo get_post_type_archive_link( $post_type ); ?>"><?php echo $post_type_obj->labels->name; ?></a></li>
          <li class="active"><?php echo $term->name; ?></li>

        <?php } elseif( is_archive() ) { ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
          <li class="active"><?php echo $post_type_obj->labels->name; ?></li>

        <?php } else { ?>

          <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>

        <?php } ?>

        </ol>

        <ul class="navbar-nav nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="<?php esc_url(home_url()); ?>/find-channel/">FIND ASPIRE</a>
          </li>
          <li class="nav-item">
            <a id="social-facebook" class="nav-link nav-link-social" href="https://www.facebook.com/AspireTV" target="_blank"><span class="icon icon-facebook"></span></a>
          </li>
          <li class="nav-item">
            <a id="social-twitter" class="nav-link nav-link-social" href="https://twitter.com/tvASPiRE" target=_"blank"><span class="icon icon-twitter"></span></a>
          </li>
          <li class="nav-item">
            <a id="social-instagram" class="nav-link nav-link-social" href="https://www.instagram.com/aspiretv/" target="_blank"><span class="icon icon-instagram"></span></a>
          </li>
          <li class="nav-item">
            <a id="social-pinterest" class="nav-link nav-link-social" href="https://www.pinterest.com/aspiretv/" target=_"blank"><span class="icon icon-pinterest"></span></a>
          </li>

          <!-- <li class="nav-item">
            <a id="nav-search" class="nav-link nav-link-social" href="#footer-search"><span class="icon icon-magnifying-glass"></span></a>
          </li> -->

          <li class="nav-item">
            <form class="navbar-form" style="padding-top: 0; padding-bottom: 0;" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
              <div class="form-group">
                <input type="text" placeholder="Search aspire.tv" class="form-control" name="s" style="height: 30px; font-size: 14px; width: 10em;">
              </div>
              <button type="submit" class="btn btn-primary" style="cursor: pointer; height: 30px; padding-top: 0; padding-bottom: 0; padding-left: 6px; padding-right: 6px; font-size: 11px; text-transform: uppercase; letter-spacing: 0.075em;">Search</button>
            </form>
          </li>

          <!-- <li class="nav-item">
            <form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>"
                  style="display: block;
                  padding: 0px 24px 0px 34px;
                  border-bottom: 0;">
              <input id="off-canvas-search" class="search-field mb-2" style="max-width: 100%; width: 100%; border: 1px solid rgba(0,0,0,0.3); padding: 6px; font-size: 14px;" type="search" placeholder="Search aspire.tv" value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
              <button class="btn btn-block btn-outline-offwhite search-submit" style="cursor: pointer;" type="submit">Search<span class="sr-only">Submit Button</span></button>
            </form>
          </li> -->

        </ul>
    </div>
  </div>
</nav>
