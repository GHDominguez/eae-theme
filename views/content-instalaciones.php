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

        <?php 
            // The Query
            $query = new WP_Query( [
                'post_type' => 'instalacion',
                'order' => 'ASC',
            ] );
            
            // The Loop
            if ( $query->have_posts() ) :
                $i = 0;
                while ( $query->have_posts() ):
                    $query->the_post();
                    $i++;
                    $inverse = $i % 2 == 1 ? false : true;
                    ?>

                        <div class="block-3 d-md-flex" data-aos="fade-<?php echo !$inverse ? 'left' : 'right' ?>">
                            <div class="image <?php if ($inverse) echo 'order-2' ?>" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); "></div>
                            <div class="text <?php if ($inverse) echo 'order-1' ?>">
                                <h4 class="subheading">&nbsp;</h4>
                                <h2 class="heading"><?php the_title(); ?></h2>
                                <p><?php the_field('descripcion') ?></p>
                            </div>
                        </div>

                    <?php
                endwhile;
            endif;
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
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
