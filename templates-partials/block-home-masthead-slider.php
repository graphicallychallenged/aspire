<!-- Aspire Homepage Masthead -->
<div class="homepage-slider" id="homepage-slider">

	<?php
	  $args = array(
	    'post_type' => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos', 'exclusives', 'page' ),
	    // 'meta_key'  => 'wpcf-jw-media-id', //needed so only items with a value here will be returned.
	    //'meta_value'      => $entry_id,
	    //'meta_compare'    => '=',
			'orderby'         => 'menu_order',
			'order'           => 'ASC',
	    'posts_per_page'  => 3,
	    'tax_query' => array(
	      array(
	        'taxonomy' => 'featured-slots',
	        'field'    => 'slug',
	        'terms'    => 'homepage-masthead'
	      ),
	    ),
	  );

	  $query = new WP_Query( $args );

	  if ( $query->have_posts() ) {

			$slideindex = 0;

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
				$mobile_featured_img = get_post_meta($id,'wpcf-mobile-featured-image', true);

				$showVid = (!wp_is_mobile());
				$is_mobile = wp_is_mobile();
				?>

					<div class="homepage-slide text-center" id="slide-<?php echo $slideindex; ?>"
						<?php if ($is_mobile && $mobile_featured_img) { ?>
										style="background-image:url('<?php echo $mobile_featured_img; ?>');"
						<?php } elseif ($bg_vid_poster && 0) { ?>
										style="background-image:url('<?php echo $bg_vid_poster; ?>');"
						<?php } elseif ($feat_image) { ?>
											style="background-image:url('<?php echo $feat_image; ?>');"
						<?php } ?>
					>

					<?php
					// Masthead Slide Content - Program Name, Upcoming Episode, Etc.
					get_template_part( 'templates-content/content', 'homepage-masthead-slide' ); ?>

		  			<?php
						// If we're not on mobile, show the videos.
						if ($showVid) { ?>

								<div class="hero-video-container text-center <?php if($showVid){ echo 'showvid-true'; } else {echo 'showvid-false'; } ?>" id="hero-video-container"
									<?php if ($bg_vid_poster) { ?> style="background-image:url('<?php echo $bg_vid_poster; ?>'); background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;" <?php } ?> >

											<?php if($slideindex == 0){ ?>

												<video class="" id="bgvid" poster="<?php echo $bg_vid_poster; ?>" muted loop>
													<source src="<?php echo $bg_vid_webm; ?>" type="video/webm">
													<source src="<?php echo $bg_vid_mp4; ?>" type="video/mp4">
												</video>

											<?php } else { ?>

												<video class="b-lazy" id="bgvid" poster="<?php echo $bg_vid_poster; ?>" muted loop>
													<source data-src="<?php echo $bg_vid_webm; ?>" type="video/webm">
													<source data-src="<?php echo $bg_vid_mp4; ?>" type="video/mp4">
												</video>

											<?php } ?>
								</div>

							<?php	} else { ?>

							<?php } ?>

						  <div class="dimmer dimmer-30"></div>

					</div>

				<?php
				$slideindex++;

	    endwhile;
	    wp_reset_postdata();
	  }
	?>

</div>







<script>
	jQuery(document).ready(function($){

		// When the slider initializes, play the first video (not lazy-loaded)
		$('.homepage-slider').on('init', function(event, slick){

			//console.log('Slider Init');

			$('#bgvid').get(0).play();

			//console.log('Played First Video');

		});


		// Before the slide changes, pause all current videos
		// Maybe trigger loading for next video?

		$('.homepage-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){

				//console.log('Before Change');

				// $('#bgvid').get(0).pause();
				// console.log('Paused All Videos');

				// Pause all the videos
				$('video').each(function () {
		        this.pause();
						//console.log('Paused All Videos');
		    });

				// var $elNext = $(slick.$slides[nextSlide]).children().first();
				// var $elCur = $(slick.$slides[currentSlide]).children().first();

				// $elCur.find('video').each(function () {
				// 		this.pause();
				// });

				// // Example
			  //   var bLazy = new Blazy({
			  //       success: function(ele){
				// 					console.log('Loaded - Before Change');
			  //           // Image has loaded
			  //           // Do your business here
			  //       }
			  //     , error: function(ele, msg){
			  //           if(msg === 'missing'){
			  //               // Data-src is missing
			  //           }
			  //           else if(msg === 'invalid'){
			  //               // Data-src is invalid
			  //           }
			  //       }
			  //   });
				//
				// bLazy.revalidate();

				// $('video').each(function () {
		    //     this.pause();
		    // });

				// $elNext.find('#hero-video-container').each(function () {
				// 		this.show();
				// 		var bLazy = new Blazy({
				// 					// container: '#hero-video-container',
				// 					// loadInvisible: false
				// 		});
				// 		bLazy.revalidate();
				// });

				// var bLazy = new Blazy({
				// 			// container: '#hero-video-container',
				// 			// loadInvisible: false
				// });
				// bLazy.revalidate();

//				$('#hero-video-container').show();



// 				$elNext.find('video').each(function () {
// //						this.load();
// //						this.play();
// 				});

		});


		// After the slide changes, load and play the next video
		$('.homepage-slider').on('afterChange', function(event, slick, currentSlide, nextSlide, direction){

			// console.log('After Change');
			// Look into fixing "play request interrupted" via
	    // https://developers.google.com/web/updates/2017/06/play-request-was-interrupted

			// $('video').each(function () {
			// 		this.pause();
			// 		console.log('Paused All Videos - After Change');
			// });

				// Example
				var bLazy = new Blazy({
						success: function(ele){
								// console.log('Blazy Loaded - After Change');

								$('.slick-current #bgvid').each(function () {
									// this.load();

									var isPlaying = this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2;

									if (!isPlaying) {
										this.play();
										//console.log('Played Video on Current Slide');
									}

								});

								// // Show loading animation.
							  // var playPromise = this.play();
								//
							  // if (playPromise !== undefined) {
							  //   playPromise.then(_ => {
							  //     // Automatic playback started!
							  //     // Show playing UI.
							  //     // We can now safely pause video...
								// 		console.log('First Condition');
							  //     this.pause();
							  //   })
							  //   .catch(error => {
							  //     // Auto-play was prevented
							  //     // Show paused UI.
								// 		console.log('Error Condition');
							  //   });
							  // }

								// Image has loaded
								// Do your business here

// 								$('.slick-current #bgvid').each(function () {
// //									this.load();
// 									this.play();
// 									console.log('Played Video after Blazy Load');
// 								});

						}
					, error: function(ele, msg){
								if(msg === 'missing'){
										//console.log('Blazy Missing');
										// Data-src is missing
								}
								else if(msg === 'invalid'){
										//console.log('Blazy Invalid');
										// Data-src is invalid
								}
						}
				});


				$('.slick-current #bgvid').each(function () {
					// this.load();

					var isPlaying = this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2;

					if (!isPlaying) {
						this.play();
//						console.log('Played Video on Current Slide');
					}

				});


				// Play video on current slide
				// $('.slick-current #bgvid').each(function () {
				// 	// this.load();
				//
				// 	var isPlaying = this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2;
				//
				// 	if (!isPlaying) {
				// 		this.play();
				// 		console.log('Played Video on Current Slide');
				// 	}
				//
				// });

				//$('.slick-current #bgvid').get(0).play();

				// bLazy.revalidate();

				// var $elNext = $(slick.$slides[nextSlide]).children().first();
				// var $elCur = $(slick.$slides[currentSlide]).children().first();
				//
				// $elCur.find('video').each(function () {
				//
				// 	this.load();
				// 	this.play();

						// // Show loading animation.
					  // var playPromise = this.play();
						//
					  // if (playPromise !== undefined) {
					  //   playPromise.then(_ => {
					  //     // Automatic playback started!
					  //     // Show playing UI.
					  //     // We can now safely pause video...
						// 		console.log('First Condition');
					  //     this.pause();
					  //   })
					  //   .catch(error => {
					  //     // Auto-play was prevented
					  //     // Show paused UI.
						// 		console.log('Error Condition');
					  //   });
					  // }

				//
				// });

//				document.querySelector('.slide-active').style.display = 'block';

			// $("#hero-video-container").show();
			// 	var bLazy = new Blazy();
			// 	bLazy.revalidate();

				// var bLazy = new Blazy({
				// 			// container: '#hero-video-container',
				// 			// loadInvisible: false
				// });
				// bLazy.revalidate();


				// $('video').each(function () {
		    //     this.pause();
		    // });

				// $elCur.find('#hero-video-container').each(function () {
				// 		this.show();
				// 		var bLazy = new Blazy({
				// 					container: '#hero-video-container',
				// 					loadInvisible: false
				// 		});
				// 		bLazy.revalidate();
				// });


//				$('#hero-video-container').show();
//				var bLazy = new Blazy();

// 				$elNext.find('video').each(function () {
// //						this.load();
// 				});

		});

		// $('#hero-video-container').on('afterChange', function(event, slick, currentSlide, nextSlide, direction){
		// 	this.show();
		// 	var bLazy = new Blazy();
		// 	bLazy.revalidate();
		// });


		// Initialize SlickSlider
		$('.homepage-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: false,
			dots: true,
			centerMode: false,
			arrows: true,
			responsive: [
					{
						breakpoint: 992,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false
						}
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false
						}
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				]
		});

	});
</script>
