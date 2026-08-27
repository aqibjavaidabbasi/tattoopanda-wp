<?php 
/* Template Name: Main Home Template */
get_header();
?>


<div class="main_layout">
	<div class="main_slider">

		<?php if( have_rows('intro_section') ): ?>
	    <?php while( have_rows('intro_section') ): the_row(); 
	        // Get sub field values.
	        $title = get_sub_field('title');
	        $content = get_sub_field('content');
	        $video = get_sub_field('video');
	        $logo = get_sub_field('logo');
        ?>
			<section class="section_1">
				<div class="intro_section">
					<div class="cmn_container">
						<div class="content_wrap">
							<?php if ($title): ?>
								<h3><?php echo $title; ?></h3>
							<?php endif; ?>
							
							<?php if ($content): ?>
								<div class="content fs_20">
									<?php echo $content; ?>
								</div>
							<?php endif; ?>

						</div>

						<?php if ($video): ?>
							<video autoplay="autoplay" preload="auto" playsinline="" loop="loop" muted="muted" class="media__video">
								<source src="<?php echo $video; ?>" type="video/mp4">
							</video>
						<?php endif; ?>

					</div>

					<?php if ($logo): ?>
						<div class="studio_logo">
							<?php echo $logo; ?>
						</div>
					<?php endif; ?>

				</div>
			</section>
	    <?php endwhile; ?>
	<?php endif; ?>

		<?php if( have_rows('think_making') ): ?>
	    <?php while( have_rows('think_making') ): the_row(); 
	        // Get sub field values.
	        $content = get_sub_field('content');
	        $video = get_sub_field('video');
	        $below_content_box_heading_1 = get_sub_field('below_content_box_heading_1');
	        $below_content_box_1 = get_sub_field('below_content_box_1');
	        $below_content_box_heading_2 = get_sub_field('below_content_box_heading_2');
	        $below_content_box_2 = get_sub_field('below_content_box_2');
        ?>
		<section class="section_2 think_making">
			<div class="cmn_container">
				<div class="content_wrap">
					<?php if ($content): ?>
						<div class="studio_content fs_36">
							<?php echo $content; ?>
						</div>
					<?php endif; ?>

					<div class="studio_data_boxes">
						<?php if ($below_content_box_heading_1): ?>
							<div class="data fs_14">
							    <h3 class="fs_14"><?php echo $below_content_box_heading_1; ?></h3>
							    <?php echo $below_content_box_1; ?>
							</div>
						<?php endif; ?>						

						<?php if ($below_content_box_heading_2): ?>
							<div class="data fs_14">
							    <h3 class="fs_14"><?php echo $below_content_box_heading_2; ?></h3>
							    <?php echo $below_content_box_2; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($video): ?>
					<video autoplay="autoplay" preload="auto" playsinline="" loop="loop" muted="muted" class="media__video">
						<source src="<?php echo $video; ?>" type="video/mp4">
					</video>
				<?php endif; ?>

			</div>
		</section>
		<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('service_education') ): ?>
	    <?php while( have_rows('service_education') ): the_row();  ?>
		<section class="section_3 service_education">
			<div class="cmn_container">
				<div class="content_wrap">
					<?php if( have_rows('data_boxes') ): ?>
				    <?php while( have_rows('data_boxes') ): the_row();  
				    	$title = get_sub_field('title');
				    	$content = get_sub_field('content');
				    ?>
					<div class="service_content">
						<?php if ($title): ?>
							<h3 class="fs_14"><?php echo $title; ?></h3>
						<?php endif; ?>						

						<?php if ($content): ?>
						    <div class="content fs_36">
						    	<?php echo $content; ?>
							</div>
						<?php endif; ?>
					    
					    <?php if( have_rows('data_group') ): ?>
					    <div class="service_data_boxes d-flex mt-5">
					    	<?php while( have_rows('data_group') ): the_row();  
					    		$content = get_sub_field('content');
					    	?>
					        <div class="data">
					        	<?php echo $content; ?>
					        </div>
					        <?php endwhile; ?>
					    </div>
					    <?php endif; ?>

					</div>
					<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</section>
		<?php endwhile; ?>
		<?php endif; ?>


		<?php if( get_field('single_video')): ?>
		<section class="section_4 single_video">
			<div class="cmn_container">
					<video autoplay="autoplay" preload="auto" playsinline="" loop="loop" muted="muted" class="media__video">
						<source src="<?php the_field('single_video'); ?>" type="video/mp4">
					</video>
			</div>
		</section>
		<?php endif; ?>


		<?php if( have_rows('post_scriptum') ): ?>
	    <?php while( have_rows('post_scriptum') ): the_row();  
	    	$main_title = get_sub_field('main_title');
	    	$content = get_sub_field('content');
	    	$sub_title = get_sub_field('sub_title');
	    ?>
		<section class="section_5 post_scriptum">
			<div class="cmn_container">
				<div class="content_wrap">
				<?php if ($main_title): ?>
					<h3 class="fs_14"><?php echo $main_title; ?></h3>
				<?php endif; ?>	
				<?php if ($content): ?>
				  <div class="content fs_36">
				    	<?php echo $content; ?>
					</div>					       	
				<?php endif; ?>	       

		    	<?php if ($sub_title): ?>
		    		<h3 class="fs_14"><?php echo $sub_title; ?></h3>
		    	<?php endif; ?>

	    		<?php if( have_rows('data_list') ): ?>
		        <div class="service_data_boxes">
		            <div class="data">
		                <ul class="list-unstyled">
		                	<?php while( have_rows('data_list') ): the_row();  
		                		$list_item = get_sub_field('list_item');
		                	?>
		                    <li><?php echo $list_item; ?></li>
		                    <?php endwhile; ?>
		                </ul>
		            </div>
		        </div>

		        <?php endif; ?>

				</div>
			</div>
		</section>
		<?php endwhile; ?>
		<?php endif; ?>


		<section class="section_6 awards_wrp">
		    <div class="cmn_container">
		        <div class="main_head">
		            <h2 class="fs_45 text-white">Awards &<br>Recognition</h2>
		        </div>
		        <div class="award_list">
		            <ul class="list-unstyled">
		                <?php
		                $args = array(
		                    'post_type'      => 'award',
		                    'posts_per_page' => -1,
		                    'orderby'        => 'date',
		                    'order'          => 'DESC',
		                );
		                $award_query = new WP_Query($args);

		                if ($award_query->have_posts()) :
		                    while ($award_query->have_posts()) : $award_query->the_post();
		                        $award_name = get_field('award_name');
		                        $year       = get_field('year');
		                        $award_link = get_field('award_link');
		                ?>
		                        <li>
		                            <a href="<?php echo esc_url($award_link); ?>">
		                                <div class="title"><?php the_title(); ?></div>
		                                <div class="award">
		                                    <span><?php echo esc_html($award_name); ?></span>
		                                </div>
		                                <div class="year">
		                                    <?php echo esc_html($year); ?>
		                                </div>
		                            </a>
		                        </li>
		                <?php
		                    endwhile;
		                    wp_reset_postdata();
		                endif;
		                ?>
		            </ul>
		        </div>
		    </div>
		</section>

		<?php if( have_rows('full_image_section') ): ?>
	    <?php while( have_rows('full_image_section') ): the_row();  
	    	$image = get_sub_field('image');
	    	$logo = get_sub_field('logo');
	    ?>
		<section class="section_7 full_image_section">
			<div class="cmn_container">
				<?php if ($image): ?>
					<div class="img_wrap">
						<img src="<?php echo $image; ?>" alt="img">
					</div>
				<?php endif; ?>

				<?php if ($logo): ?>
					<div class="studio_logo">
						<?php echo $logo; ?>
					</div>
				<?php endif; ?>

			</div>
		</section>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>


<script>
/*jQuery(function($) {
    const $et_studio_slider = jQuery('.main_slider');
    const et_studio_sectionCount = $et_studio_slider.find('section').length;
    const et_studio_sectionWidth = jQuery(window).width();
    const et_studio_totalWidth = et_studio_sectionCount * et_studio_sectionWidth;

    let et_studio_currentX = 0;
    let et_studio_targetX = 0;
    let et_studio_maxScroll = -(et_studio_totalWidth - et_studio_sectionWidth);

    function et_studio_animateScroll() {
        et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;
        $et_studio_slider.css('transform', `translateX(${et_studio_currentX}px)`);
        requestAnimationFrame(et_studio_animateScroll);
    }

    et_studio_animateScroll();

    jQuery(window).on('wheel', function(e) {
        let et_studio_delta = e.originalEvent.deltaY;
        et_studio_targetX -= et_studio_delta;

        // Clamp to limits
        et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
    });

    jQuery(window).on('resize', function() {
        const et_studio_newWidth = jQuery(window).width();
        if (et_studio_newWidth !== et_studio_sectionWidth) {
            window.location.reload(); // reload for consistency
        }
    });
});
*/


jQuery(function($) {
    const windowWidth = $(window).width();

    if (windowWidth >= 991) {
        const $et_studio_slider = $('.main_slider');
        const et_studio_sectionCount = $et_studio_slider.find('section').length;
        const et_studio_sectionWidth = windowWidth;
        const et_studio_totalWidth = et_studio_sectionCount * et_studio_sectionWidth;

        let et_studio_currentX = 0;
        let et_studio_targetX = 0;
        let et_studio_maxScroll = -(et_studio_totalWidth - et_studio_sectionWidth);

        function et_studio_animateScroll() {
            et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;
            $et_studio_slider.css('transform', `translateX(${et_studio_currentX}px)`);
            requestAnimationFrame(et_studio_animateScroll);
        }

        et_studio_animateScroll();

        $(window).on('wheel', function(e) {
            let et_studio_delta = e.originalEvent.deltaY;
            et_studio_targetX -= et_studio_delta;

            // Clamp to limits
            et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
            console.log(et_studio_targetX);
        });

        $(window).on('resize', function() {
            const et_studio_newWidth = $(window).width();
            if (et_studio_newWidth !== et_studio_sectionWidth && et_studio_newWidth >= 991) {
                window.location.reload(); // reload for consistency
            }
        });
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