<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Suche', 'creavity' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Suche &hellip;', 'creavity' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
        <button class="submit" name="submit" type="submit">
			<span id="searchsubmit"></span>
		</button>
	</span>
	</div>
</form>
