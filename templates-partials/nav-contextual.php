<?php
if ( !is_front_page() && !is_post_type_archive('timeslots') && !is_page() && !is_singular(array('movies','episodes','videos')) || is_page('recipes') ) : ?>

  <nav id="nav-contextual" class="navbar-contextual navbar navbar-expand-md navbar-dark text-light">
  <div class="container">
    <ul id="taxonomy-menu" class="navbar-nav mr-auto">

      <?php
      $post_type = get_post_type();
      $obj = get_post_type_object($post_type);

      if($obj){
        $post_type_name = $obj->labels->name;
      }

      if(is_404()): ?>

      <?php
      elseif (is_singular('series')) : ?>
        <li class="nav-item"><span class="navbar-text" style="color: rgba(255,255,255,0.8); font-weight: bold;"><?php the_title(); ?>: </span></li>
        <li class="nav-item"><a href="#related-videos" class="nav-link">Videos</a></li>
        <li class="nav-item"><a href="#related-episodes" class="nav-link">Episodes</a></li>
        <!-- <li class="nav-item"><a href="#related-photos" class="nav-link">Photos</a></li>
        <li class="nav-item"><a href="#related-posts" class="nav-link">News</a></li> -->
        <li class="nav-item"><a href="#program-about" class="nav-link">About</a></li>

      <?php
      elseif(is_singular('movies')) : ?>

        <li class="nav-item"><a href="#program-videos" class="nav-link">Videos</a></li>
        <li class="nav-item"><a href="#program-photos" class="nav-link">Photos</a></li>
        <li class="nav-item"><a href="#program-about" class="nav-link">About</a></li>

      <?php
      elseif(is_tax('seeyourselfhere', 'eat') || is_page('recipes') ) : ?>

        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/recipes/" class="nav-link">Recipes</a></li>
        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/series/butterbrown/" class="nav-link">Butter+Brown</a></li>
        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/series/chop-it-up-with-gina-neely/" class="nav-link">Chop It Up</a></li>

      <?php
      elseif(is_tax('seeyourselfhere', 'live')) : ?>

        <!-- <li class="nav-item"><a href="#" class="nav-link">Contextual Links - Live</a></li> -->

      <?php
      elseif(is_tax('seeyourselfhere', 'shop')) : ?>

        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/marketplace/" class="nav-link">Marketplace</a></li>
        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/series/keashas-perfect-dress/" class="nav-link">Keasha's Perfect Dress</a></li>

      <?php
      elseif(is_tax('seeyourselfhere', 'play')) : ?>

        <!-- <li class="nav-item"><a href="#" class="nav-link">Contextual Links - Play</a></li> -->

      <?php
      elseif(is_tax('seeyourselfhere', 'dream')) : ?>

        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/category/i-aspire-profiles/" class="nav-link">I Aspire Profiles</a></li>
        <li class="nav-item"><a href="<?php esc_url(home_url()); ?>/series/idols-icons-influencers/" class="nav-link">Idols, Icons &amp; Influencers</a></li>

      <?php
      else : ?>

        <!-- <h2>Queried Object</h2> -->
        <?php
        // $queried_object = get_queried_object();
        // var_dump( $queried_object );


        // Determine which taxonomy to display
        // TODO - Add sub-navigation for Lifestyle categories
        // TODO - Make a version of this menu that appears in the mobile navigation as well

        if( is_home() || is_category() || is_singular('post') ) :

          $tax = 'category';

        elseif( is_post_type_archive('movies') || is_tax('movie-type') || is_singular('movies') ) :

          $tax = 'movie-type';

        elseif( is_post_type_archive('series') || is_tax('series-type') ) :

          $tax = 'series-type';

        elseif( is_post_type_archive('videos') || is_tax('video-type') ) :

          $tax = 'video-type';

        elseif(is_post_type_archive('cp_recipe') || is_page('recipes') || is_tax('cp_recipe_category') || is_singular('cp_recipe') ) :

          $tax = 'cp_recipe_category';
          $post_type = 'recipes';
          $post_type_name = 'Recipes';

        elseif( is_shop() || is_product_category() || is_product_tag() || is_product() || is_woocommerce() ) :

          $tax = 'product_cat';

        else :

          $tax = null;

        endif;

        // Get the terms associated with this taxonomy
        if($tax){

          $terms = get_terms( $tax, array(
              'orderby'    => 'name',
              'hide_empty' => 1,
              'exclude'    => "1"
          ) );

          // Display the terms with links to their respective categories
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
              $count = count( $terms );
              $i = 0;

              // Start with link to post type archive
              $term_list = '<li class="nav-item"><a href="'. get_post_type_archive_link($post_type) .'" class="nav-link">All ' . $post_type_name .'</a></li>';

              // Loop through taxonomy terms
              foreach ( $terms as $term ) {
                  $i++;
                  $term_list .= '<li class="nav-item"><a href="' . esc_url( get_term_link( $term ) ) . '" class="nav-link" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a></li>';
              }
              echo $term_list;
          }
        }

      endif; ?>

    </ul>
  </div>
</nav>

<?php
endif; ?>
