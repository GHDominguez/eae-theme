<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

get_header(); ?>

	<div class="container">
		<div class="row align-items-center ftco-vh-100">
			<div class="col-md-7">
				<h1 class="ftco-heading mb-3" data-aos="fade-up" data-aos-delay="500"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600">A free template for Business Websites by <a href="https://colorlib.com/" target="_blank">Colorlib</a> For busy business professionals Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
				<p data-aos="fade-up"  data-aos-delay="700"><a href="https://free-template.co/" target="_blank" class="btn btn-outline-white px-4 py-3" data-toggle="modal" data-target="#reservationModal">Go Get This Template</a></p>
			</div>
		</div>
	</div>
</header>

<?php
get_footer();
