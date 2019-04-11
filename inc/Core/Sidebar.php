<?php

namespace Awps\Core;

/**
 * Sidebar.
 */
class Sidebar
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'widgets_init', array( $this, 'widgets_init' ) );
    }

    /*
        Define the sidebar
    */
    public function widgets_init()
    {
        register_sidebar( array(
            'name' => esc_html__('Barra Lateral', 'eae'),
            'id' => 'eae-sidebar',
            'description' => esc_html__('Barra por defecto para agregar los widgets', 'eae'),
            'before_widget' => '<section id="%1$s" class="sidebar-box">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
    }
}
