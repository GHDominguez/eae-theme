<?php
/**
 * Theme Customizer - Header
 *
 * @package awps
 */

namespace Awps\Api\Customizer;

use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use Awps\Api\Customizer;

/**
 * Customizer class
 */
class Header 
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize ) 
	{
		$wp_customize->add_section( 'awps_header_section' , array(
			'title' => __( 'Cabecera', 'awps' ),
			'description' => __( 'Personalizar la Cabecera' ),
			'priority' => 35
		) );

		$wp_customize->add_setting( 'awps_header_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'awps_header_background_posts_image' , array(
			'default' => '',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		// $wp_customize->add_setting( 'awps_header_text_color' , array(
		// 	'default' => '#333333',
		// 	'transport' => 'postMessage', // or refresh if you want the entire page to reload
		// ) );

		// $wp_customize->add_setting( 'awps_header_link_color' , array(
		// 	'default' => '#004888',
		// 	'transport' => 'postMessage', // or refresh if you want the entire page to reload
		// ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awps_header_background_color', array(
			'label' => __( 'Color de fondo de cabecera', 'awps' ),
			'section' => 'awps_header_section',
			'settings' => 'awps_header_background_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'awps_header_background_posts_image', array(
			'type' => 'background',
			'label' => __( 'Imagen de fondo de cabecera para Noticias', 'awps' ),
			'section' => 'awps_header_section',
			'settings' => 'awps_header_background_posts_image',
		) ) );

		// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awps_header_text_color', array(
		// 	'label' => __( 'Header Text Color', 'awps' ),
		// 	'section' => 'awps_header_section',
		// 	'settings' => 'awps_header_text_color',
		// ) ) );

		// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awps_header_link_color', array(
		// 	'label' => __( 'Header Link Color', 'awps' ),
		// 	'section' => 'awps_header_section',
		// 	'settings' => 'awps_header_link_color',
		// ) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'awps_header_background_color', array(
				'selector' => '#awps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'awps_header_background_posts_image', array(
				'selector' => '#awps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			// $wp_customize->selective_refresh->add_partial( 'awps_header_text_color', array(
			// 	'selector' => '#awps-header-control',
			// 	'render_callback' => array( $this, 'outputCss' ),
			// 	'fallback_refresh' => true
			// ) );
			// $wp_customize->selective_refresh->add_partial( 'awps_header_link_color', array(
			// 	'selector' => '#awps-header-control',
			// 	'render_callback' => array( $this, 'outputCss' ),
			// 	'fallback_refresh' => true
			// ) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-header', 'background-color', 'awps_header_background_color' );
			echo sprintf('.posts-header{ background-image: url("%s"); }', get_theme_mod('awps_header_background_posts_image'));
			// echo Customizer::css( '.site-header', 'color', 'awps_header_text_color' );
			// echo Customizer::css( '.site-header a', 'color', 'awps_header_link_color' );
		echo '</style>';
	}
}