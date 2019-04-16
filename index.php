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

<header class="ftco-cover site-header posts-header" id="section-home" data-aos="fade"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center ftco-vh-75">
            <div class="col-md-7">
                <h1 class="ftco-heading mb-3" data-aos="fade-up" data-aos-delay="500">Noticias</h1>
                <h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600"></h2>    
            </div>
        </div>
    </div>
</header>
<!-- END section -->

<div class="ftco-section">
	<div class="container">
		<?php
		if ( have_posts() ) : ?>
		<div class="row">
			<?php
			while ( have_posts() ):
				the_post();

				get_template_part('views/content', get_post_format());
			endwhile; ?>
		</div>
		<?php
		endif;

		if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :
			?>
			<div class="row">
				<div class="col-md-12 pt-5">
					<ul class="pagination custom-pagination">

						<li class="page-item prev"><a class="page-link" href="<?php echo get_previous_posts_page_link() ?>">&laquo;</a></li>
						<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						for ( $i=1; $i <= $GLOBALS['wp_query']->max_num_pages; $i++ ): ?>
							<li class="page-item <?php echo $paged == $i ? 'active' : ''; ?>">
								<a class="page-link" href="<?php echo get_home_url( null, 'noticias/page/'.$i ); ?>">
									<?php echo $i ?>
								</a>
							</li>
						<?php endfor; ?>

						<li class="page-item next"><a class="page-link" href="<?php echo get_next_posts_page_link() ?>">&raquo;</a></li>

					</ul>
				</div>
			</div>
		<?php
		endif; ?>
	</div>
</div>

<?php
get_footer();
