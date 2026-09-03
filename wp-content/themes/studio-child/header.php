<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Studio
 */

	/** 
	 * studio_doctype hook
	 *
	 * @hooked studio_doctype -  10
	 * 
	 */
	do_action( 'studio_doctype' );
	?>

<head>
<?php	
	/** 
	 * studio_before_wp_head hook
	 *
	 * @hooked studio_head -  10
	 * 
	 */
	do_action( 'studio_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' );  ?>
	
	<header>
		<div class="logo_wrap animate__animated animate__fadeInDown">
			<a href="/" aria-label="Homepage" style="pointer-events: auto;">
				<div class="mbm-diff">
					<img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-icon-bone-white-scaled.png" class="logo__et difference"/>
				</div>
			</a>
		</div>

		<!-- Toggle Button -->
		<button id="menu-toggle" aria-label="Open Menu">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 18L20 18" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> <path d="M4 12L20 12" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> </g></svg>
		</button>

		<!-- Off-Canvas Menu -->
		<div id="offcanvas-menu">
		    <button id="menu-close" aria-label="Close Menu">×</button>
		    <?php
		        wp_nav_menu([
		            'theme_location' => 'primary', // Update with your menu location
		            'menu_class' => 'offcanvas-nav',
		        ]);
		    ?>
		    <a class="mobile_logo" href="/" aria-label="Homepage" style="pointer-events: auto;">
		    	<div class="mbm-diff">
					<img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" class="logo__et difference"/>				
		    	</div>
		    </a>
		</div>

		<!-- Overlay -->
		<div id="menu-overlay"></div>

		   <!-- Navigation -->
		   <nav id="site-navigation" class="main-navigation">
		     <?php
		       wp_nav_menu(array(
		         'theme_location' => 'primary',
		         'menu_id'        => 'primary-menu',
		         'container'      => false,
		         'menu_class'     => 'menu d-flex',
		       ));
		     ?>
		   </nav>
		   <div class="header-desktop-cta hd-desktop-only" x-data>
		       <button @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="ghl-booking-btn hd-header-booking-btn button" aria-label="Book Appointment">
		           <span>Book Now</span>
		       </button>
		   </div>
		   <div class="bullet"></div>
	</header>
	<?php
	/** 
	 * studio_after_header hook
	 * 
	 */
	do_action( 'studio_after_header' );


	/** 
	 * studio_content hook
	 *
	 * @hooked studio_content_start - 10
	 * 
	 */
	do_action( 'studio_content' );

?>