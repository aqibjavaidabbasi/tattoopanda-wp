<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Studio
 */

/**
 * studio_after_content hook
 *
 * @hooked studio_content_end - 10
 *
 */
do_action( 'studio_after_content' );
?>

<script>
	jQuery(function($) {
	    $('#menu-toggle').on('click', function() {
	        $('#offcanvas-menu').addClass('active');
	        $('#menu-overlay').addClass('active');
	    });

	    $('#menu-close, #menu-overlay').on('click', function() {
	        $('#offcanvas-menu').removeClass('active');
	        $('#menu-overlay').removeClass('active');
	    });

	    $(document).on('click', '.ghl-booking-btn, .hd-header-booking-btn', function (e) {
	        e.preventDefault();
	        window.dispatchEvent(new CustomEvent('open-booking-modal'));
	    });
	});
</script>

	<div class="copyright">
		&copy; <?php echo date("Y"); ?>
	</div>

    <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="site-copyright">
				<?php
				printf( _x( 'Copyright &copy; %1$s %2$s' , '1: Year, 2: Site Title with home URL', 'studio' ), esc_attr( date_i18n( __( 'Y', 'studio' ) ) ), '<a href="' . esc_url( home_url( '/' ) ) . '"> ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
				?>
			</span>
			<span class="sep"><?php echo esc_attr( '&nbsp;&bull;&nbsp;' ); ?></span>
			<?php if ( function_exists( 'get_the_privacy_policy_link' ) ) : ?>
				<span class="privacy-policy">
					<?php echo get_the_privacy_policy_link(); ?>
				</span>
			<?php endif; ?>
			<span class="theme-name">
				<?php echo esc_attr( 'Theme: Studio' ); ?>
			</span>
			<span class="theme-by">
				<?php _ex( 'by', 'attribution', 'studio' ); ?>
			</span>
			<span class="theme-author">
				<a href="<?php echo esc_url( 'https://catchthemes.com/' ); ?>" target="_blank">
					<?php echo esc_attr( 'Catch Themes' ); ?>
				</a>
			</span>

	         <?php if ( has_nav_menu( 'social' ) ) : ?>
	            <div class="social-menu">
			        <?php wp_nav_menu( array(
					    'theme_location' => 'social',
					    'depth'          => '1',
					    'link_before'    => '<span class="screen-reader-text">',
					    'link_after'     => '</span>' )
					    );
	                ?>
	            </div><!-- .social-menu -->
	        <?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php

do_action( 'studio_footer' );
/**
 * studio_after hook
 *
 */
do_action( 'studio_after' );

wp_footer(); ?>

</body>
</html>
