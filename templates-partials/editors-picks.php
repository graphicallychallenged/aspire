<section id="editors-picks" class="section-editors-picks pt-5 pb-4 bg-dark">
  <div class="container">

    <h2 class="h1 text-center text-light mb-4">Editor's Picks</h2>

    <div class="card-deck">
      <?php
      $lifestyle_category = 'eat';
      $editors_pick = aspire_get_editor_picks_by_category($lifestyle_category, '1');
        if ( $editors_pick->have_posts() ) :
          while ( $editors_pick->have_posts() ) : $editors_pick->the_post();
            get_template_part('templates-content/card-editors-pick');
          endwhile;
          // Restore original Post Data
          wp_reset_postdata();
          wp_reset_query();
          unset($editors_pick);
          unset($lifestyle_category);
        endif; ?>

        <?php
        $lifestyle_category = 'live';
        $editors_pick = aspire_get_editor_picks_by_category($lifestyle_category, '1');
          if ( $editors_pick->have_posts() ) :
            while ( $editors_pick->have_posts() ) : $editors_pick->the_post();
              get_template_part('templates-content/card-editors-pick');
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
            wp_reset_query();
            unset($editors_pick);
            unset($lifestyle_category);
          endif; ?>

        <?php
        $lifestyle_category = 'shop';
        $editors_pick = aspire_get_editor_picks_by_category($lifestyle_category, '1');
          if ( $editors_pick->have_posts() ) :
            while ( $editors_pick->have_posts() ) : $editors_pick->the_post();
              get_template_part('templates-content/card-editors-pick');
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
            wp_reset_query();
            unset($editors_pick);
            unset($lifestyle_category);
          endif; ?>
      </div>

      <div class="card-deck">
        <?php
        $lifestyle_category = 'play';
        $editors_pick = aspire_get_editor_picks_by_category($lifestyle_category, '1');
          if ( $editors_pick->have_posts() ) :
            while ( $editors_pick->have_posts() ) : $editors_pick->the_post();
              get_template_part('templates-content/card-editors-pick');
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
            wp_reset_query();
            unset($editors_pick);
            unset($lifestyle_category);
          endif; ?>

        <?php
        $lifestyle_category = 'dream';
        $editors_pick = aspire_get_editor_picks_by_category($lifestyle_category, '1');
          if ( $editors_pick->have_posts() ) :
            while ( $editors_pick->have_posts() ) : $editors_pick->the_post();
              get_template_part('templates-content/card-editors-pick');
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
            wp_reset_query();
            unset($editors_pick);
            unset($lifestyle_category);
          endif; ?>

        <div class="card bg-transparent border-0">
          <div class="card-body text-center">
            <?php get_template_part('templates-ads/sidebar-upper-300x250'); ?>
          </div>
        </div>

      </div>

  </div>
</section>
