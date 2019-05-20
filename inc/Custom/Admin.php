<?php

namespace Awps\Custom;

use Awps\Api\Settings;
use Awps\Api\Callbacks\SettingsCallback;

/**
 * Admin
 * use it to write your admin related methods by tapping the settings api class.
 */
class Admin
{
	/**
	 * Store a new instance of the Settings API Class
	 * @var class instance
	 */
	public $settings;

	/**
	 * Callback class
	 * @var class instance
	 */
	public $callback;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->settings = new Settings();

		$this->callback = new SettingsCallback();
	}

	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		$this->enqueue()->pages()->settings()->sections()->fields()->register_settings();

		// $this->enqueue_faq( new Settings() );
	}

	/**
	 * Trigger the register method of the Settings API Class
	 * @return
	 */
	private function register_settings() {
		$this->settings->register();
	}

	/**
	 * Enqueue scripts in specific admin pages
	 * @return $this
	 */
	private function enqueue()
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'script' => array( 
				'jquery', 
				'media_uploader',
				get_template_directory_uri() . '/assets/dist/js/admin.js'
			),
			'style' => array( 
				get_template_directory_uri() . '/assets/dist/css/admin.css',
				'wp-color-picker'
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'toplevel_page_eae' );

		// Enqueue files in Admin area
		$this->settings->admin_enqueue( $scripts, $pages );

		return $this;
	}

	/**
	 * Enqueue only to a specific page different from the main enqueue
	 * @param  Settings $settings 	a new instance of the Settings API class
	 * @return
	 */
	private function enqueue_faq( Settings $settings )
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'style' => array( 
				get_template_directory_uri() . '/assets/dist/css/admin.css',
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'eae_page_eae_faq' );

		// Enqueue files in Admin area
		$settings->admin_enqueue( $scripts, $pages )->register();
	}

	/**
	 * Register admin pages and subpages at once
	 * @return $this
	 */
	private function pages()
	{
		$admin_pages = array(
			array(
				'page_title' => 'Opciones',
				'menu_title' => 'EAE',
				'capability' => 'manage_options',
				'menu_slug' => 'eae',
				'callback' => array( $this->callback, 'admin_index' ),
				'icon_url' => get_template_directory_uri() . '/assets/dist/images/eae-icon-16.png',
				'position' => 110,
			)
		);

		$admin_subpages = array(
			array(
				'parent_slug' => 'eae',
				'page_title' => 'eae FAQ',
				'menu_title' => 'FAQ',
				'capability' => 'manage_options',
				'menu_slug' => 'eae_faq',
				'callback' => array( $this->callback, 'admin_faq' )
			)
		);

		// Create multiple Admin menu pages and subpages
		$this->settings->addPages( $admin_pages )->withSubPage( 'Opciones' );//->addSubPages( $admin_subpages );

		return $this;
	}

	/**
	 * Register settings in preparation of custom fields
	 * @return $this
	 */
	private function settings()
	{
		// Register settings
		$args = array(
			array(
				'option_group' => 'eae_social_options_group',
				'option_name' => 'facebook',
				// 'callback' => array( $this->callback, 'eae_options_group' )
			),
			array(
				'option_group' => 'eae_social_options_group',
				'option_name' => 'instagram'
			),
			array(
				'option_group' => 'eae_social_options_group',
				'option_name' => 'twitter',
			),
			array(
				'option_group' => 'eae_social_options_group',
				'option_name' => 'youtube',
			),
		);

		$this->settings->add_settings( $args );

		return $this;
	}

	/**
	 * Register sections in preparation of custom fields
	 * @return $this
	 */
	private function sections()
	{
		// Register sections
		$args = array(
			array(
				'id' => 'eae_admin_index',
				'title' => 'Redes Sociales',
				'callback' => array( $this->callback, 'eae_admin_index' ),
				'page' => 'eae'
			)
		);

		$this->settings->add_sections( $args );

		return $this;
	}

	/**
	 * Register custom admin fields
	 * @return $this
	 */
	private function fields()
	{
		// Register fields
		$args = array(
			[
				'id' => 'facebook',
				'title' => 'Facebook',
				'callback' => array( $this->callback, 'facebook' ),
				'page' => 'eae',
				'section' => 'eae_admin_index',
				'args' => array(
					'label_for' => 'facebook',
					'class' => ''
				)
			],
			[
				'id' => 'instagram',
				'title' => 'Instagram',
				'callback' => array( $this->callback, 'instagram' ),
				'page' => 'eae',
				'section' => 'eae_admin_index',
				'args' => array(
					'label_for' => 'instagram',
					'class' => ''
				)
			],
			[
				'id' => 'twitter',
				'title' => 'Twitter',
				'callback' => array( $this->callback, 'twitter' ),
				'page' => 'eae',
				'section' => 'eae_admin_index',
				'args' => array(
					'label_for' => 'twitter',
					'class' => ''
				)
			],
			[
				'id' => 'youtube',
				'title' => 'Youtube',
				'callback' => array( $this->callback, 'youtube' ),
				'page' => 'eae',
				'section' => 'eae_admin_index',
				'args' => array(
					'label_for' => 'youtube',
					'class' => ''
				)
			]
		);

		$this->settings->add_fields( $args );

		return $this;
	}
}