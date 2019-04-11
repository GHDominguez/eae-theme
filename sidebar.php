<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

if ( ! is_active_sidebar( 'eae-sidebar' ) ) :
	return;
endif;
?>

<?php
if ( is_customize_preview() ) {
	echo '<div id="eae-sidebar-control"></div>';
}
dynamic_sidebar( 'eae-sidebar' );
?>

