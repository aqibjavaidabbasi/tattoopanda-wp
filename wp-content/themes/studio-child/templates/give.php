<?php 
/* Template Name: GiveAway */
get_header();
?>

<?php if( have_rows('CTA') ): ?>
	<?php while( have_rows('CTA') ): the_row(); 
	// Get sub field values.
	$caption = get_sub_field('instructions');
	$button_label = get_sub_field('button_label');
	$button_link = get_sub_field('button_link');

	?>
	<?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('headline') ): ?>
	<?php while( have_rows('headline') ): the_row(); 
	// Get sub field values.
	$headline = get_sub_field('headline');
	$subheadline = get_sub_field('subheadline');

	?>
	<?php endwhile; ?>
<?php endif; ?>
<div class="main_layout">
	<div class="contact_wrapper giveaway">
		<div class="left_section">
			<div class="ct_info">
				<div class="content_wrap">
					<?php if ($headline): ?>
					<h3><?php echo $headline; ?></h3>
					<?php endif; ?>

					<?php if ($subheadline): ?>
					<div class="content fs_20">
						<?php echo $subheadline; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if( have_rows('note') ): ?>
				<?php while( have_rows('note') ): the_row(); 
					// Get sub field values.
					$caption = get_sub_field('caption');
					$button_text = get_sub_field('button_text');
					$button_link = get_sub_field('button_link');
					$submit_button_link = get_sub_field('submit_button_link');
					$submit_button_text = get_sub_field('submit_button_text');
					$sponsor_caption = get_sub_field('sponsor_caption');

				?>
					<section class="section_4">
						<div class="note-wrapper">
							<div class="cmn_container">
							<div class="content_wrap">

									<?php if ($caption): ?>
										<h3><?php echo $caption; ?></h3>
									<?php endif; ?>

									<?php if ($button_text): ?>
										<button class="button" onclick="window.open('<?php echo $button_link; ?>', '_blank')">
											<span class="button-content"><?php echo $button_text; ?></span>
										</button>
									<?php endif; ?>

									<?php if ($sponsor_caption): ?>
										<p><?php echo $sponsor_caption; ?></p>
									<?php endif; ?>

									<?php if ($submit_button_text): ?>
										<button class="button" onclick="window.open('<?php echo $submit_button_link; ?>', '_blank')">
											<span class="button-content"><?php echo $submit_button_text; ?></span>
										</button>
										<br/>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="right_section">
			<div class="form_wrap">
				<h2 class="ft_50"><?php the_field('contact_form_title'); ?></h2>
				<div class="giveaway_form">
<!-- 					<?php echo do_shortcode('[contact-form-7 id="cca1719" title="giveaway"]'); ?> -->
					<iframe
						src="https://link.smartwebsite360.com/widget/form/YesKgIXFuU4MFuCv4lRU"
						style="width:100%;height:100%;border:none;border-radius:3px"
						id="inline-YesKgIXFuU4MFuCv4lRU" 
						data-layout="{'id':'INLINE'}"
						data-trigger-type="alwaysShow"
						data-trigger-value=""
						data-activation-type="alwaysActivated"
						data-activation-value=""
						data-deactivation-type="neverDeactivate"
						data-deactivation-value=""
						data-form-name="Giveaway Form"
						data-height="876"
						data-layout-iframe-id="inline-YesKgIXFuU4MFuCv4lRU"
						data-form-id="YesKgIXFuU4MFuCv4lRU"
						title="Giveaway Form"
							>
					</iframe>
					<script src="https://link.smartwebsite360.com/js/form_embed.js"></script>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main_layout giveaway" style="display:none">
	<div class="main_slider">


	<?php if( have_rows('headline') ): ?>
	    <?php while( have_rows('headline') ): the_row(); 
	        // Get sub field values.
	        $headline = get_sub_field('headline');
	        $subheadline = get_sub_field('subheadline');
	       
        ?>
			<section class="section_1">
				<div class="hero">
					<div class="cmn_container">
						<div class="content_wrap">
							<?php if ($headline): ?>
								<h3><?php echo $headline; ?></h3>
							<?php endif; ?>
							
							<?php if ($subheadline): ?>
								<div class="content fs_20">
									<?php echo $subheadline; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
	    <?php endwhile; ?>
	<?php endif; ?>
	
	
			
	<?php if( have_rows('CTA') ): ?>
	    <?php while( have_rows('CTA') ): the_row(); 
	        // Get sub field values.
	        $caption = get_sub_field('caption');
	        $button_label = get_sub_field('button_label');
	        $button_link = get_sub_field('button_link');
	       
        ?>
			<section class="section_2">
				<div class="cta-wrapper">
					<div class="cmn_container">
					<div class="content_wrap">
							<?php if ($caption): ?>
								<h3><?php echo $caption; ?></h3>
							<?php endif; ?>
							
							<?php if ($button_label): ?>
								<button class="button" onclick="window.open('<?php echo $button_link; ?>', '_blank')">
									<span class="button-content"><?php echo $button_label; ?></span>
								</button>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
	    <?php endwhile; ?>
	<?php endif; ?>
	
	
	<?php if( have_rows('submission') ): ?>
	    <?php while( have_rows('submission') ): the_row(); 
	        // Get sub field values.
	        $title = get_sub_field('title');
	        $shortcode = get_sub_field('form_shortcode');
	        $caption = get_sub_field('caption');
	       
        ?>
		<section class="section_3" style="display:none">
				<div class="wrapper">
					<div class="cmn_container">
					<div class="content_wrap">
					
							<?php if ($title): ?>
								<h3><?php echo $title; ?></h3>
							<?php endif; ?>
							
							<?php if ($shortcode): ?>
								<?php echo do_shortcode($shortcode);?>
							<?php endif; ?>
							
							<?php if ($caption): ?>
								<p><?php echo $title; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
			<section class="section_3">
				<div class="wrapper">
					<div class="cmn_container">
						<div class="content_wrap">
							<h3>Submit Your Entry</h3>
							<?php echo do_shortcode('[contact-form-7 id="cca1719" title="giveaway"]'); ?>
						</div>
					</div>
				</div>
			</section>

	    <?php endwhile; ?>
	<?php endif; ?>
	
	<?php if( have_rows('note') ): ?>
	    <?php while( have_rows('note') ): the_row(); 
	        // Get sub field values.
	        $caption = get_sub_field('caption');
	        $button_text = get_sub_field('button_text');
	        $button_link = get_sub_field('button_link');
			$submit_button_link = get_sub_field('submit_button_link');
			$submit_button_text = get_sub_field('submit_button_text');
			$sponsor_caption = get_sub_field('sponsor_caption');
	       
        ?>
			<section class="section_4">
				<div class="note-wrapper">
					<div class="cmn_container">
					<div class="content_wrap">
					
							<?php if ($caption): ?>
								<h3><?php echo $caption; ?></h3>
							<?php endif; ?>
							
							<?php if ($button_text): ?>
								<button class="button" onclick="window.open('<?php echo $button_link; ?>', '_blank')">
									<span class="button-content"><?php echo $button_text; ?></span>
								</button>
							<?php endif; ?>
							
							<?php if ($sponsor_caption): ?>
								<p><?php echo $sponsor_caption; ?></p>
							<?php endif; ?>
							
							<?php if ($submit_button_text): ?>
								<button class="button" onclick="window.open('<?php echo $submit_button_link; ?>', '_blank')">
									<span class="button-content"><?php echo $submit_button_text; ?></span>
								</button>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
	    <?php endwhile; ?>
	<?php endif; ?>
	
	
	
	
	
	
	</div>
</div>


<script>
	
jQuery(function ($) {
    const DESKTOP_BREAKPOINT = 991;               // run only on “desktop”

    if ($(window).width() >= DESKTOP_BREAKPOINT) {
        /* ------------------------------------------------------------------
         *  Cache DOM & geometry
         * ----------------------------------------------------------------*/
        const $slider      = $('.main_slider');
        const $sections    = $slider.find('section');

        const sectionW     = $(window).width();            // full-width slides
        const totalW       = $sections.length * sectionW;  // full track width
        const maxScroll    = -(totalW - sectionW);         // last edge limit

        /* ------------------------------------------------------------------
         *  State
         * ----------------------------------------------------------------*/
        let currentX = 0;          // animated position (px, negative = left)
        let targetX  = 0;          // user-driven “goal” position

        /* ------------------------------------------------------------------
         *  Animation loop → ease toward targetX
         * ----------------------------------------------------------------*/
        (function animate() {
            currentX += (targetX - currentX) * 0.08;                 // ease
            currentX  = clamp(currentX, maxScroll, 0);               // hard stop
            $slider.css('transform', `translateX(${currentX}px)`);
            requestAnimationFrame(animate);
        })();

        /* ------------------------------------------------------------------
         *  Wheel / track-pad  → horizontal scroll
         * ----------------------------------------------------------------*/
        window.addEventListener(
            'wheel',
            (e) => {
                e.preventDefault();                                   // hijack
                const delta = e.deltaY || e.deltaX;                   // both axes
                targetX = clamp(targetX - delta, maxScroll, 0);       // clamp
            },
            { passive: false }
        );

        /* ------------------------------------------------------------------
         *  Resize ≥ 991 px → reload to recalc widths
         * ----------------------------------------------------------------*/
        $(window).on('resize', () => {
            const w = $(window).width();
            if (w >= DESKTOP_BREAKPOINT && w !== sectionW) {
                window.location.reload();
            }
        });

        /* ------------------------------------------------------------------
         *  Utility
         * ----------------------------------------------------------------*/
        function clamp(value, min, max) {
            return Math.max(Math.min(value, max), min);
        }
    }
});




</script>

<script>
  const bullet = document.querySelector('.bullet');
  let mouseX = 0, mouseY = 0;
  let currentX = 0, currentY = 0;

  document.addEventListener('mousemove', (e) => {
    mouseX = e.pageX;
    mouseY = e.pageY;
  });

  function animate() {
    currentX += (mouseX - currentX) * 0.08;
    currentY += (mouseY - currentY) * 0.08;

    bullet.style.left = `${currentX}px`;
    bullet.style.top = `${currentY}px`;

    requestAnimationFrame(animate);
  }

  animate();
</script>
<?php 
get_footer();
?>