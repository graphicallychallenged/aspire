<nav id="navbar-main" class="navbar-main sticky-top navbar navbar-expand-md navbar-dark" style="background-color: rgba(255,116,1, 0.9);">
  <div class="container">

    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
      <img src="<?php echo home_url();?>/wp-content/uploads/2018/03/aspire-logo-inverse-128.png" height="38" width="auto" title="Aspire" alt="Aspire Logo">
    </a>

    <button class="navbar-toggler" type="button" onclick="openNav()" data-toggle="collapse" data-target="###aspire-navbar-primary" aria-controls="aspire-navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->

    <?php
       wp_nav_menu(array(
        'menu'            => 'primary',
        'theme_location'  => 'primary',
        'container'       => 'div',
        'container_id'    => 'aspire-navbar-primary',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav nav ml-auto',
        'depth'           => 2,
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker()
       )
     );
    ?>

  </div>
</nav>
