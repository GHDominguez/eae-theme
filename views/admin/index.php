<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 *
 * @package awps
 */

?>

<div class="wrap">
	<h1>Opciones EAE</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'eae_social_options_group' ); ?>
		<?php do_settings_sections( 'eae' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
