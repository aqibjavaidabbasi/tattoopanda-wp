<?php 
/* Template Name: Gear */
get_header();
?>


<div class="main_layout">
	<div class="main_slider gear">
		<?php
		if (function_exists('get_field') && have_rows('category')):
			while (have_rows('category')): the_row();
				// Get the title group
				$category_title_group = get_sub_field('title');
				$category_title = isset($category_title_group['category']) ? $category_title_group['category'] : '';

				if ($category_title): ?>
					<div class="section">
						<h2><?php echo esc_html($category_title); ?></h2>
						<div class="items">
							<?php
							// Check if the data repeater exists within the title group
							if (isset($category_title_group['data']) && !empty($category_title_group['data'])):
								// Use foreach to loop through the data array directly
								foreach ($category_title_group['data'] as $item):
									$image_id = isset($item['image']) ? $item['image'] : 0;
									$affiliate_link = isset($item['affiliate_link']) ? $item['affiliate_link'] : '';

									// Convert image ID to URL
									$image_url = $image_id ? wp_get_attachment_image_src($image_id, 'medium')[0] : '';

									// Error handling for image and link
									if ($image_url && $affiliate_link): ?>
										<div class="item">
											<div class="image-wrapper">
                                                <a href="<?php echo esc_url($affiliate_link); ?>" target="_blank">
                                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_title); ?>">
                                                    <span class="external-link-icon"></span> <!-- External link icon -->
                                                </a>
                                            </div>
										</div>
									<?php elseif (!$image_url && $affiliate_link): ?>

									<?php elseif ($image_url && !$affiliate_link): ?>
										<div class="item">
											<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_title); ?>">
										</div>
									<?php else: ?>

									<?php endif;
								endforeach;
							endif; ?>
						</div>
						
					</div>
				<?php else: ?>
					<p>Category title is missing.</p>
				<?php endif;
			endwhile;
		endif;
		?>

	</div>
</div>


<script>
	
jQuery(function($) {
// 	const windowHeight = $(window).height();
//         const $mainSlider = $('.main_slider.gear');
//         const $sections = $mainSlider.children('div, section'); // Select all direct children (sections)
//         const sectionCount = $sections.length;
//         let currentY = 0;
//         let targetY = 0;
//         let maxScroll = -($sections.outerHeight(true) * (sectionCount - 1)); // Total scrollable height

//         // Function to animate the vertical scroll smoothly
//         function animateScroll() {
//             currentY += (targetY - currentY) * 0.08;
//             currentY = Math.max(currentY, maxScroll); // Limit to bottom
//             currentY = Math.min(currentY, 0); // Limit to top
//             $mainSlider.css('transform', `translateY(${currentY}px)`);
//             requestAnimationFrame(animateScroll);
//         }

//         animateScroll();

//         // Handle wheel event for vertical scrolling
//         window.addEventListener('wheel', function(e) {
//             const delta = e.deltaY;
//             targetY -= delta; // Invert delta for natural vertical scrolling
//             targetY = Math.min(0, Math.max(targetY, maxScroll)); // Clamp targetY
//             e.preventDefault(); // Prevent default scroll behavior
//         }, { passive: false });

//         // Handle resize to recalculate maxScroll
//         $(window).on('resize', function() {
//             maxScroll = -($sections.outerHeight(true) * (sectionCount - 1));
//             if ($(window).height() !== windowHeight) {
//                 window.location.reload(); // Reload to recalculate layout if needed
//             }
//         });
//     const windowWidth = $(window).width();

//     if (windowWidth >= 991) {
//         const $et_studio_slider = $('.main_slider');
//         const $sections = $et_studio_slider.find('section');
//         const et_studio_sectionCount = $sections.length;
//         const et_studio_sectionWidth = windowWidth;
//         const et_studio_totalWidth = et_studio_sectionCount * et_studio_sectionWidth;

//         let et_studio_currentX = 0;
//         let et_studio_targetX = 0;
//         let et_studio_maxScroll = -(et_studio_totalWidth - et_studio_sectionWidth);
//         let isVerticalSection = false;

//         const $verticalSection = $('.section_6.awards_wrp');
//         const verticalSectionOffsetLeft = $verticalSection.position().left;


//         const $lastSection = $('.section_7.full_image_section');
// 		const lastSectionOffsetLeft = $lastSection.position().left;

//         // Function to animate the scroll smoothly
//         function et_studio_animateScroll() {
//             if (!isVerticalSection) {
//                 et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;

// 				// Same limit here
// 				if (-et_studio_currentX > lastSectionOffsetLeft) {
// 				    et_studio_currentX = -lastSectionOffsetLeft;
// 				}

// 				et_studio_currentX = Math.max(et_studio_currentX, et_studio_maxScroll);
// 				et_studio_currentX = Math.min(et_studio_currentX, 0);

// 				$et_studio_slider.css('transform', `translateY(${et_studio_currentX}px)`);
//             }
//             requestAnimationFrame(et_studio_animateScroll);
//         }

//         et_studio_animateScroll();

//         let verticalScrollPosition = 0; 

//         window.addEventListener('wheel', function(e) {
//             const scrollX = -et_studio_targetX;
//             const delta = e.deltaY;
//             const sectionHeight = $verticalSection.outerHeight();
//             const sectionScrollMax = sectionHeight - window.innerHeight;

//             // Detect when the scroll reaches the awards_wrp section
//             const buffer = 40; // pixels
//             if (scrollX >= verticalSectionOffsetLeft - buffer && scrollX <= verticalSectionOffsetLeft + buffer) {
//                 isVerticalSection = true;
//                 jQuery(".main_slider").addClass('awards_wrp_sec');
                
//                 // Vertical scroll within the section
//                 if (verticalScrollPosition >= 0 && verticalScrollPosition <= sectionScrollMax) {
//                     verticalScrollPosition += delta;
//                     verticalScrollPosition = Math.max(0, Math.min(verticalScrollPosition, sectionScrollMax));
//                     $verticalSection.css('transform', `translateY(-${verticalScrollPosition}px)`);

//                     // Prevent default vertical scrolling
//                     e.preventDefault();
//                 }

//                 // Allow horizontal scrolling back if top or bottom of the section is reached
//                 if (verticalScrollPosition <= 0 || verticalScrollPosition >= sectionScrollMax) {
//                     isVerticalSection = false;
//                     e.preventDefault();
//                     et_studio_targetX -= delta;
//                     et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
//                 }
//             } else {
//                 // If not in the awards_wrp section, allow horizontal scroll
//                 isVerticalSection = false;
//                 e.preventDefault();
//                 et_studio_targetX -= delta;
//                 et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
//                 jQuery(".main_slider").removeClass('awards_wrp_sec');
//             }
//         }, { passive: false });

//         $(window).on('resize', function() {
//             const newWidth = $(window).width();
//             if (newWidth !== et_studio_sectionWidth && newWidth >= 991) {
//                 window.location.reload();
//             }
//         });
//     }
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