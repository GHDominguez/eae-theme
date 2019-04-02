<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" data-aos="fade-down" data-aos-delay="500">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="p-1" src="<?php assets('images/eae.png') ?>" alt="" height="50">
				<div class="p-2 d-none d-sm-block">
					Escuela<br>
					Agrotecnica Eldorado
				</div>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<?php
				if ( has_nav_menu( 'primary' ) ) :
					wp_nav_menu(
						array(
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'ftco-nav',
							'theme_location'  => 'primary',
							'menu_id'         => 'primary-menu',
							'menu_class'      => 'navbar-nav ml-auto',
							'walker'          => new Awps\Core\WalkerNav(),
							)
						);
				endif;
			?>
		</div>
	</nav>
		
