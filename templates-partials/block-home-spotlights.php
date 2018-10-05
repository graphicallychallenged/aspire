<!-- Spotlights -->
<div id="homepage-spotlights" class="p-y-0 block-inverse" style="background:#292929; position: relative; z-index: 10;">
  <div class="container-fluid">

    <div class="row">

      <div class="col-sm-6 m-t m-b">
        <?php
          $args = array(
            'post_type'       => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
            'orderby'         => 'menu_order',
            'order'           => 'ASC',
            'posts_per_page'  => 1,
            'tax_query' => array(
              array(
                'taxonomy' => 'featured-slots',
                'field'    => 'slug',
                'terms'    => 'homepage-spotlight-a',
              ),
            ),
          );

          $spotlight_query_a = new WP_Query( $args );

          if ( $spotlight_query_a->have_posts() ) :
            while ( $spotlight_query_a->have_posts() ) : $spotlight_query_a->the_post();
              get_template_part('templates-content/content','homepage-spotlight');
            endwhile;
          endif;
        ?>
      </div>

      <div class="col-sm-6 m-t m-b">
        <?php
          $args = array(
            'post_type'       => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
            'orderby'         => 'menu_order',
            'order'           => 'ASC',
            'posts_per_page'  => 1,
            'tax_query' => array(
              array(
                'taxonomy' => 'featured-slots',
                'field'    => 'slug',
                'terms'    => 'homepage-spotlight-b',
              ),
            ),
          );

          $spotlight_query_b = new WP_Query( $args );

          if ( $spotlight_query_b->have_posts() ) :
            while ( $spotlight_query_b->have_posts() ) : $spotlight_query_b->the_post();
              get_template_part('templates-content/content','homepage-spotlight');
            endwhile;
          endif;
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 m-b">
        <?php
          $args = array(
            'post_type'       => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
            'orderby'         => 'menu_order',
            'order'           => 'ASC',
            'posts_per_page'  => 1,
            'tax_query' => array(
              array(
                'taxonomy' => 'featured-slots',
                'field'    => 'slug',
                'terms'    => 'homepage-spotlight-c',
              ),
            ),
          );

          $spotlight_query_c = new WP_Query( $args );

          if ( $spotlight_query_c->have_posts() ) :
            while ( $spotlight_query_c->have_posts() ) : $spotlight_query_c->the_post();
              get_template_part('templates-content/content','homepage-spotlight');
            endwhile;
          endif;
        ?>
      </div>

      <div class="col-sm-6 m-b">
        <?php
          $args = array(
            'post_type'       => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
            'orderby'         => 'menu_order',
            'order'           => 'ASC',
            'posts_per_page'  => 1,
            'tax_query' => array(
              array(
                'taxonomy' => 'featured-slots',
                'field'    => 'slug',
                'terms'    => 'homepage-spotlight-d',
              ),
            ),
          );

          $spotlight_query_d = new WP_Query( $args );

          if ( $spotlight_query_d->have_posts() ) :
            while ( $spotlight_query_d->have_posts() ) : $spotlight_query_d->the_post();
              get_template_part('templates-content/content','homepage-spotlight');
            endwhile;
          endif;
        ?>
      </div>

    </div>

  </div>
</div>
