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

        <?php 
            // The Query
            $query = new WP_Query( [ 'post_type' => 'concurso' ] );
            
            // The Loop
            if ( $query->have_posts() ) {
                
                while ( $query->have_posts() ) {
                    $query->the_post();
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

                    <?php 
                }
                
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
        </div>
    </div>
</div>

<div class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
</div>
