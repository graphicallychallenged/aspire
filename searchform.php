<?php
/**
 * The template for displaying search forms
 */
?>
<!-- <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text sr-only"><?php _ex( 'Search for:', 'label', 'montrose' ); ?></span>
		<input type="search" class="search-field" placeholder="Search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search For">
	</label>
	<input type="submit" class="search-submit" value="Search">
</form> -->


<form id="search-offcanvas" role="search" method="get" class="search-form" action="http://aspire.localhost/">
	<div class="input-group">
		<label class="sr-only"><span class="screen-reader-text sr-only">Search for:</span></label>

		<input id="search-field" type="search" class="search-field form-control" placeholder="Search aspire.tv..." value="" name="s" title="Search for:">
		<span class="input-group-btn">
			<div class="clear">
			 <input type="submit" id="search-submit" class="search-submit btn btn-square button" value="Search">
		 </div>
		</span>

	</div>
</form>
