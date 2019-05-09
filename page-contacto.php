<?php
get_header(); ?>

	<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
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

            <div class="ftco-section contact-section">
                <div class="container">
                    <div class="row block-9">
                        <div class="col-md-6 pr-md-5">
                            <?php echo do_shortcode('[contact-form-7 id="152" title="Formulario de contacto"]') ?>
                        </div>

                        <div class="col-md-6">
                            <div class="embed-responsive embed-responsive-1by1">
                                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d893.3971171010948!2d-54.66600717076087!3d-26.404479998959324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDI0JzE2LjEiUyA1NMKwMzknNTUuNyJX!5e0!3m2!1ses-419!2sar!4v1557429067238!5m2!1ses-419!2sar" allowfullscreen></iframe>
                            </div>
                        </div>
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

            <?php
		endwhile;
	?>

<?php
get_footer();