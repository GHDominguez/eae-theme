<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package awps
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	// get_template_part( 'views/content', get_post_format() );
	// the_post_navigation(); ?>

<header class="ftco-cover site-header single-post-header" id="section-home" data-aos="fade"  data-stellar-background-ratio="0.5"
	style="background-image: url(<?php the_post_thumbnail_url('full'); ?>); background-blend-mode: overlay;">
	<div class="container">
		<div class="row align-items-center ftco-vh-75">
			<div class="col-md-7">
				<h1 class="ftco-heading mb-3" data-aos="fade-up" data-aos-delay="500"><?php the_title(); ?></h1>
				<h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600">
					<?php the_date(); ?>
				</h2>    
			</div>
		</div>
	</div>
</header>
<!-- END header -->

<div class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- <?php if( has_post_thumbnail() ): ?>
				<p>
					<?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
				</p>
				<?php endif; ?> -->

				<?php the_content(); ?>
			</div>

			<div class="col-sm-4 sidebar">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</div>

<?php
endwhile;
//get_sidebar();
get_footer();
