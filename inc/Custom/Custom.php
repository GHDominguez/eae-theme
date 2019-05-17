<?php

namespace Awps\Custom;

/**
 * Custom
 * use it to write your custom functions.
 */
class Custom
{
	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register() {
		add_action( 'init', array( $this, 'custom_post_type'), 10 , 4 );
		add_action( 'after_switch_theme', array( $this, 'rewrite_flush') );	
	}	
	
  /**
    * Create Custom Post Types
    * @return The registered post type object, or an error object
    */
    public function custom_post_type()
    {
		/**
		 * Add the post types and their details
		 */
		$custom_posts = array(
			array(
				'slug' => 'directivo',
				'singular' => 'Directivo',
				'plural'  => 'Directivos',
				'menu_icon' => 'dashicons-businessperson',
				'menu_position' => 18,
				'text_domain' => 'eae',
				'supports' => array( 'title', 'thumbnail' ),
				'description' => 'Directivos Custom Post Type',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'show_in_rest' => true,
			),
			array(
				'slug' => 'instalacion',
				'singular' => 'Instalación',
				'plural'  => 'Instalaciones',
				'menu_icon' => 'dashicons-building',
				'menu_position' => 19,
				'text_domain' => 'eae',
				'supports' => array( 'title', 'thumbnail' ),
				'description' => 'Instalaciones Custom Post Type',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'show_in_rest' => true,
			),
		);

		foreach ( $custom_posts as $custom_post ) {
			$labels = array(
				'name'               => $custom_post['plural'],
				'singular_name'      => $custom_post['singular'],
				'menu_name'          => $custom_post['plural'],
				'name_admin_bar'     => $custom_post['singular'],
				'add_new'            => _x( 'Añadir nuevo ' . $custom_post['singular'], $custom_post['text_domain'] ),
				'add_new_item'       => __( 'Añadir nuevo ' . $custom_post['singular'], $custom_post['text_domain'] ),
				'new_item'           => __( 'Nuevo ' . $custom_post['singular'], $custom_post['text_domain'] ),
				'edit_item'          => __( 'Editar ' . $custom_post['singular'], $custom_post['text_domain'] ),
				'view_item'          => __( 'Ver ' . $custom_post['singular'], $custom_post['text_domain'] ),
				'view_items'         => __( 'Ver ' . $custom_post['plural'], $custom_post['text_domain'] ),
				'all_items'          => __( 'Todos los ' . $custom_post['plural'], $custom_post['text_domain'] ),
				'search_items'       => __( 'Buscar ' . $custom_post['plural'], $custom_post['text_domain'] ),
				'parent_item_colon'  => __( 'Padre ' . $custom_post['plural'], $custom_post['text_domain'] ),
				'not_found'          => __( $custom_post['plural'] . ' no encontrado.', $custom_post['text_domain'] ),
				'not_found_in_trash' => __( $custom_post['plural'] . ' no encontrados en Papelera.', $custom_post['text_domain'] ),
			);
			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Descripción.', $custom_post['text_domain'] ),
				'public'             => $custom_post['public'],
				'publicly_queryable' => $custom_post['publicly_queryable'],
				'show_ui'            => $custom_post['show_ui'],
				'show_in_menu'       => $custom_post['show_in_menu'],
				'menu_icon'          => $custom_post['menu_icon'],
				'query_var'          => $custom_post['query_var'],
				'rewrite'            => array( 'slug' => $custom_post['slug'] ),
				'capability_type'    => $custom_post['capability_type'],
				'has_archive'        => $custom_post['has_archive'],
				'hierarchical'       => $custom_post['hierarchical'],
				'menu_position'      => $custom_post['menu_position'],
				'supports'           => $custom_post['supports'],
				'show_in_rest'       => $custom_post['show_in_rest'],
			);

			register_post_type( $custom_post['slug'], $args );
		}
	}

  /**
    * Flush Rewrite on CPT activation
    * @return empty
    */
    public function rewrite_flush()
    {
        // Flush the rewrite rules only on theme activation
        flush_rewrite_rules();
    }
}
