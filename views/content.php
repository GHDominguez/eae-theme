<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

?>

<div class="col-md-6 col-lg-4" data-aos="fade-up">
	<a href="<?php the_permalink(); ?>" class="block-5" style="background-image: url('<?php the_post_thumbnail_url() ?>');">
		<div class="text w-100">
			<h3 class="heading"><?php the_title(); ?></h3>
			<div class="post-meta">
				<span>&nbsp;</span>
				<span><?php echo get_the_date(); ?></span>
			</div>
		</div>
	</a>
</div>
