<?php
// Determines the appropriate masthead for the current page
// TODO - change to Switch/Case statement

if(is_front_page()) {

  get_template_part('templates-partials/masthead-front-page');

} elseif(is_singular('series')) {

  get_template_part('templates-partials/masthead-programs');

} elseif(is_singular('movies')) {

  get_template_part('templates-partials/masthead-movies');

} elseif(is_singular('videos')) {

  get_template_part('templates-partials/masthead-videos-single');

} elseif(is_singular('episodes')) {

  get_template_part('templates-partials/masthead-episodes');

} elseif(is_singular('post')) {

//  get_template_part('templates-partials/masthead-posts');

  get_template_part('templates-partials/masthead-internal');

} elseif(is_home()) {

  //get_template_part('templates-partials/masthead-blog');

  get_template_part('templates-partials/masthead-internal');


} elseif(is_shop()) {

  get_template_part('templates-partials/masthead-marketplace');

} elseif(is_post_type_archive('videos')) {

  get_template_part('templates-partials/masthead-videos-archive');


} elseif(is_category()) {

  // get_template_part('templates-partials/masthead-archive');

  get_template_part('templates-partials/masthead-internal');

} else {

  get_template_part('templates-partials/masthead-internal');

}
