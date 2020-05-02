<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input autocomplete="off" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here&hellip;', 'front-view', 'pisces' ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'front-view', 'pisces' ); ?>" />
	<button class="search-button" type="submit"><i class="pisces-icon-zoom"></i></button>
</form>
<!-- .search-form -->