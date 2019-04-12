<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

?>

<header class="ftco-cover site-header" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');" id="section-home" data-aos="fade"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center ftco-vh-75">
            <div class="col-md-7">
                <h1 class="ftco-heading mb-3" data-aos="fade-up" data-aos-delay="500"><?php the_title(); ?></h1>
                <h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600"><?php the_excerpt(); ?></h2>    
            </div>
        </div>
    </div>
</header>
<!-- END section -->

<div class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php the_content(); ?>
			</div>

			<div class="col-sm-4 sidebar">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</div>

<?php the_content(); ?>
