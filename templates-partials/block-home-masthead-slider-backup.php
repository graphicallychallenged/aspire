<!-- Aspire Homepage Masthead -->

<div class="homepage-slider">

	<?php
	  $args = array(
	    'post_type' => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
	    // 'meta_key'  => 'wpcf-jw-media-id', //needed so only items with a value here will be returned.
	    //'meta_value'      => $entry_id,
	    //'meta_compare'    => '=',
			'orderby'         => 'modified',
			'order'           => 'DESC',
	    'posts_per_page'  => 3,
	    'tax_query' => array(
	      array(
	        'taxonomy' => 'featured-slots',
	        'field'    => 'slug',
	        'terms'    => 'homepage-masthead',
	        'orderby'  => 'modified',
	        'order' 	 => 'DESC'
	      ),
	    ),
	  );
	  $query = new WP_Query( $args );
	  if ( $query->have_posts() ) {
	  	while ( $query->have_posts() ) : $query->the_post();
	      //var_dump($query);
	      //echo '===================================================================';
	      //get_template_part( 'templates-content/content', 'homepage-masthead-slide' );
				$id = get_the_ID();
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$post_type = get_post_type();
				$link = get_the_guid();
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id($id) );
				$jw_vid_id = get_post_meta($id,'wpcf-jw-media-id');
				$bg_vid_mp4 = get_post_meta($id,'wpcf-background-video-loop-mp4', true);
				$bg_vid_webm = get_post_meta($id,'wpcf-background-video-loop-webm', true);
				$bg_vid_poster = get_post_meta($id,'wpcf-background-video-poster-image', true);
				$showVid = (!wp_is_mobile());
				?>
					<!-- <div class="homepage-slide" <?php if ($showVid) { ?>data-id="hps-<?php echo $id;?>" data-vid-id="<?php echo $jw_vid_id[0];?>"<?php } ?> <?php if ($feat_image) { ?>style="background-image:url('<?php echo $feat_image;?>');" <?php } ?>> -->

					<div class="homepage-slide" <?php if ($feat_image) { ?>style="background-image:url('<?php echo $feat_image;?>');" <?php } ?>>

						<?php
						// echo $bg_vid_mp4;
						// echo $bg_vid_webm;
						?>

					  <?php if ($showVid) { ?>

					    <!-- <div class="hero-video-container">
					      <div id="hps-<?php echo $id;?>" class="vid-holder"></div>
					    </div> -->

							<div class="hero-video-container">
								<video poster="<?php echo $bg_vid_poster; ?>" id="bgvid" playsinline autoplay muted loop>
									<source src="<?php echo $bg_vid_webm; ?>" type="video/webm">
									<source src="<?php echo $bg_vid_mp4; ?>" type="video/mp4">
								</video>
							</div>

					  <?php } ?>

					  <div class="hero-content container">

							<h1 class="masthead-title">
								<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
							</h1>

							<?php
								if(get_post_type() == 'series') {
      						$upcoming_episodes = aspire_get_upcoming_episodes(1);
      						aspire_display_upcoming_episodes($upcoming_episodes);
      					} elseif (get_post_type() == 'exclusives') { ?>

      						<a href="<?php echo the_permalink();?>" class="btn btn-primary btn-favs">More Details</a>

   				<?php	} elseif (get_post_type() == 'page') { ?>

      						<a href="<?php echo the_permalink();?>" class="btn btn-primary btn-favs">More Details</a>

  			  <?php } else {
      						$upcoming_airings = aspire_get_upcoming_airings(1);
					      	aspire_display_upcoming_airings($upcoming_airings);
				 				} ?>

					  </div>
					</div>

			<?php
	    endwhile;
	    wp_reset_postdata();
	  }
	?>

</div>


<script>
jQuery(document).ready(function($){
  $(".homepage-slider")
  	.on('init',function () {
			// For JW Player BG Video
	  	// $(".homepage-slide").each(function () {
			// 	if ($(this).attr("data-id"))
			// 		setupVid ($(this).attr("data-vid-id"), $(this).attr("data-id"));
			// });
			// For Locally hosted BG Video
			$('video').each(function () {
	        this.play();
	    });
	})
	.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		dots: true,
		centerMode: false,
		arrows: true
	});
});
/* https://developer.jwplayer.com/jw-player/demos/developer-showcase/video-background/ */
var vids = [];
function setupVid (vid_id,el_id) {
	var isReady = false;
	//console.log(vid_id + " : " + el_id);
	var backgroundVideo;
	jQuery.ajax({
	  url: 'https://content.jwplatform.com/feeds/' + vid_id + '.json',
	  dataType: 'JSON'
	}).done(function(data) {
	  var backgroundVideo = jwplayer(el_id).setup({
		  autostart: true,
		  controls: false,
		  playlist:data.playlist,
		  androidhls: false,
		  mute: true,
		  repeat: true,
		  stretching: 'fill',
		  height: '100%',
		  width:'100%'
		});
		/*backgroundVideo.on('complete', function() {
		    isReady = false;
		  });*/
		//vids.push(backgroundVideo);
	});
}
</script>
