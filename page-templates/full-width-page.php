<?php
/**
 * Template Name: Página sin barra lateral
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package awps
 */

get_header();

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();
        get_template_part( 'views/content', 'page-full-width' );
    endwhile;

get_footer();
