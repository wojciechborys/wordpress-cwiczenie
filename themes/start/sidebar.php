<?php
/**
 * The sidebar containing the main widget area.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>

<div class="widget-area" id="right-sidebar" role="complementary">

    <?php dynamic_sidebar( 'left-sidebar' ); ?>
    
</div>