<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
			<div class="row mb-8">
				<div class="col-md-12">
          <div class="ftco-footer-widget mb-4">
            <ul class="ftco-footer-social list-unstyled text-center">
							<?php if (esc_attr( get_option( 'facebook' ) )): ?>
              	<li class="">
									<a href="<?php echo esc_attr( get_option( 'facebook' ) ) ?>" target="_blank"><span class="fab fa-facebook-f icon-facebook"></span></a>
								</li>
							<?php endif; ?>
							<?php if (esc_attr( get_option( 'instagram' ) )): ?>
              	<li class="">
									<a href="<?php echo esc_attr( get_option( 'instagram' ) ) ?>" target="_blank"><span class="fab fa-instagram icon-facebook"></span></a>
								</li>
							<?php endif; ?>
							<?php if (esc_attr( get_option( 'twitter' ) )): ?>
              	<li class="">
									<a href="<?php echo esc_attr( get_option( 'twitter' ) ) ?>" target="_blank"><span class="fab fa-twitter icon-facebook"></span></a>
								</li>
							<?php endif; ?>
							<?php if (esc_attr( get_option( 'youtube' ) )): ?>
              	<li class="">
									<a href="<?php echo esc_attr( get_option( 'youtube' ) ) ?>" target="_blank"><span class="fab fa-youtube icon-facebook"></span></a>
								</li>
							<?php endif; ?>
            </ul>
          </div>
        </div>
				<div class="col-md-12 text-center">

					<p>
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Diseño web por <a href="https://hartgraf.com.ar" target="_blank" class="text-primary">Hartgraf</a>
					</p>
				</div>
			</div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="<?php echo get_theme_mod('awps_header_background_color') ?>"/></svg></div>

<?php wp_footer(); ?>

</body>
</html>
