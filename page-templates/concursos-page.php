<?php
/**
 * Template Name: Página de concursos
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package awps
 */

get_header();

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();
        get_template_part( 'views/content', 'concursos' );
    endwhile;

get_footer();
