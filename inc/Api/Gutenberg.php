<?php
/**
 * Build Gutenberg Blocks
 *
 * @package awps
 */

namespace Awps\Api;

/**
 * Customizer class
 */
class Gutenberg
{
	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function register() 
	{
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', array( $this, 'gutenberg_init' ) );

		add_action( 'init', array( $this, 'gutenberg_enqueue' ) );

		add_action( 'enqueue_block_assets', array( $this, 'gutenberg_assets' ) );
	}

	/**
	 * Custom Gutenberg settings
	 * @return
	 */
	public function gutenberg_init()
	{
		add_theme_support( 'gutenberg', array(
			// Theme supports responsive video embeds
			'responsive-embeds' => true,
            // Theme supports wide images, galleries and videos.
            'wide-images' => true,
		) );
		
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'White', 'awps' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Black', 'awps' ),
				'slug'  => 'black',
				'color' => '#333333',
			),
			array(
				'name'  => __( 'Gold', 'awps' ),
				'slug'  => 'gold',
				'color' => '#FCBB6D',
			),
			array(
				'name'  => __( 'Pink', 'awps' ),
				'slug'  => 'pink',
				'color' => '#FF4444',
			),
			array(
				'name'  => __( 'Grey', 'awps' ),
				'slug'  => 'grey',
				'color' => '#b8c2cc',
			),
		) );
	}

	/**
	 * Enqueue scripts and styles of your Gutenberg blocks
	 * @return
	 */
	public function gutenberg_enqueue()
	{
		wp_register_script( 'gutenberg-eae', get_template_directory_uri() . '/assets/dist/js/gutenberg.js', array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-data' ) );

		register_block_type( 'gutenberg-eae/eae-cta', array(
			'editor_script' => 'gutenberg-eae', // Load script in the editor
		) );

		register_block_type( 'gutenberg-eae/eae-hero-phrase', array(
			'editor_script' => 'gutenberg-eae', // Load script in the editor
		) );

		// Register custome meta tag for latest_post block
		register_meta( 'post', 'latest_posts_meta_block_field', array(
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string',
		) );

		register_block_type( 'eae/latest-posts', array(
			'editor_script'   => 'gutenberg-eae',
			'render_callback' => array( $this, 'eae_render_block_latest_posts' ),
			'attributes'      => [
				'title' => [
					'default' => 'N',
					'type'    => 'string'
				],
			],
		) );

		register_block_type( 'eae/media-blocks', [
			'editor_script' => 'gutenberg-eae',
		] );

		register_block_type( 'eae/gallery', [
			'editor_script' => 'gutenberg-eae',
		] );
	}

	public function eae_render_block_latest_posts( $attr )
	{
		$title = get_post_meta( get_the_ID(), 'latest_posts_meta_block_field', true );
		$posts = wp_get_recent_posts( array(
			'numberposts' => 3,
			'post_status' => 'publish',
		) );
		if ( count( $posts ) === 0 ) {
			return 'No posts';
		}
		$post_content = '';

		foreach ($posts as $post) {
			$post_id = $post[ 'ID' ];
			$post_content .= sprintf(
				'<div class="col-md-6 col-lg-4" data-aos="fade-up">
					<a href="%1$s" class="block-5" style="background-image: url(\'%4$s\');">
						<div class="text w-100">
						<!--<div class="subheading"></div> <!-- Para categoria -->
						<h3 class="heading">%2$s</h3>
						<div class="post-meta">
							<span>&nbsp;</span>
							<span>%3$s</span>
						</div>
						</div>
					</a>
				</div>',
				esc_url( get_permalink( $post_id ) ),
				esc_html( get_the_title( $post_id ) ),
				esc_html( get_the_date( '', $post_id ) ),
				esc_url( get_the_post_thumbnail_url( $post_id ) )
			);
		}

		 return sprintf('
			<div class="ftco-section bg-light">
				<div class="container">
					<div class="row justify-content-center mb-5 pb-5">
						<div class="col-md-7 text-center"  data-aos="fade-up">
							<h2>%1$s</h2>
						</div>
					</div>

					<div class="row">%2$s</div>
				</div>
			</div>',
			esc_html( $title ),
			$post_content
		);
	}

	/**
	 * Enqueue scripts and styles of your Gutenberg blocks in the editor
	 * @return
	 */
	public function gutenberg_assets()
	{
		wp_enqueue_style( 'gutenberg-eae-cta', get_template_directory_uri() . '/assets/dist/css/gutenberg.css', null );
	}
}