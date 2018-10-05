<!-- Primary Navigation -->
<nav id="primary-navigation" data-spy="affix" data-offset-top="60" class="navbar navbar-inverse" style="background-color: #FF5800; background-image:url(<?php echo get_stylesheet_directory_uri();?>/img/aspire-background-v4.jpg); background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;">

  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

    <button type="button" class="navbar-toggle collapsed" data-target="#stage" data-toggle="stage">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

      <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
        <img src="<?php echo get_stylesheet_directory_uri();?>/img/aspire-logo-yellow.png" height="38" width="auto" title="Aspire" alt="Aspire Logo">
      </a>
    </div>

   <?php
      wp_nav_menu(array(
       'menu'            => 'primary',
       'theme_location'  => 'primary',
       'container'       => 'div',
       'container_id'    => 'aspire-navbar',
       'container_class' => 'collapse navbar-collapse',
       'menu_id'         => false,
       'menu_class'      => 'navbar-nav nav navbar-right',
       'depth'           => 2,
       'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
       'walker'          => new WP_Bootstrap_Navwalker()
      )
    );
   ?>

  </div>
</nav>
