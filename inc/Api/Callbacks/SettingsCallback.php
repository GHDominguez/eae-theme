<?php
/**
 * Callbacks for Settings API
 *
 * @package awps
 */

namespace Awps\Api\Callbacks;

/**
 * Settings API Callbacks Class
 */
class SettingsCallback
{
	public function admin_index() 
	{
		return require_once( get_template_directory() . '/views/admin/index.php' );
	}

	public function admin_faq() 
	{
		echo '<div class="wrap"><h1>FAQ Page</h1></div>';
	}

	public function eae_options_group( $input ) 
	{
		return $input;
	}

	public function eae_admin_index() 
	{
		echo 'Ingrese las direcciones de las redes sociales de la Institución.';
	}

	public function facebook()
	{
		$facebook = esc_attr( get_option( 'facebook' ) );
		echo '<input type="text" class="regular-text" name="facebook" value="'.$facebook.'" placeholder="Url de Facebook" />';
	}

	public function instagram()
	{
		$instagram = esc_attr( get_option( 'instagram' ) );
		echo '<input type="text" class="regular-text" name="instagram" value="'.$instagram.'" placeholder="Url de Instagram" />';
	}

	public function twitter()
	{
		$twitter = esc_attr( get_option( 'twitter' ) );
		echo '<input type="text" class="regular-text" name="twitter" value="'.$twitter.'" placeholder="Url de Twitter" />';
	}

	public function youtube()
	{
		$youtube = esc_attr( get_option( 'youtube' ) );
		echo '<input type="text" class="regular-text" name="youtube" value="'.$youtube.'" placeholder="Url de Youtube" />';
	}
}