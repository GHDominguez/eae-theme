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
            $query = new WP_Query( [ 'post_type' => 'directivo' ] );
            
            // The Loop
            if ( $query->have_posts() ) {
                
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="block-10">
                                <div class="person-info">
                                <span class="name"><?php the_title() ?></span>
                                <span class="position"><?php the_field('cargo') ?></span>
                                </div>
                                <img src="<?php the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                            </div>
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
