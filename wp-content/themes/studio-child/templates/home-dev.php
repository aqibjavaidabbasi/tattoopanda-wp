<?php
/* Template Name: Home Dev */
get_header();
?>

<style>
    /* Prevent vertical scrolling on desktop for horizontal scroll experience */
    @media (min-width: 991px) {
        body, html {
            overflow: hidden;
            height: 100vh;
        }
        
        .main_layout {
            height: 100vh;
            overflow: visible;
        }
        
        .main_slider {
            overflow: visible;
            height: 100%;
        }
    }
    
    /* ========================================
       STUDIO STATUS BAR (Section 1)
       ======================================== */
    .studio-status-bar {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding: 12px 0;
        color: #000;
        font-size: 24px;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }

    .studio-time {
        font-size: 24px;
        font-weight: 300;
        letter-spacing: 1px;
    }

    .studio-status {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .studio-status .open {
        color: #22c55e;
        font-weight: 700;
    }

    .studio-status .closed {
        color: #ef4444;
        font-weight: 700;
    }

    /* ========================================
       SECTION 2: THINK MAKING (Container styling)
       ======================================== */
    @media (min-width: 991px) {
        .section_2.think_making .cmn_container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 60px;
        }

        .section_2.think_making .content_wrap {
            flex: 1;
            max-width: 600px;
        }
    }

    /* ========================================
       HORIZONTAL SLIDER (Section 1)
       ======================================== */
    .horizontal-slider {
        width: 100%;
        overflow: hidden;
        margin-top: 20px;
        border-radius: 8px;
    }

    .slider-track {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
        padding-bottom: 8px;
    }

    .slider-track::-webkit-scrollbar {
        display: none;
    }

    .slide {
        flex: 0 0 auto;
        scroll-snap-align: start;
        width: 280px;
        height: 200px;
        border-radius: 8px;
        overflow: hidden;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ========================================
       ARTIST CARDS SLIDER (Section 2)
       ======================================== */
    .artist-slider {
        position: relative;
        top: calc(-20vh - 100px);
        left: 0;
        width: 30vw;
        min-width: 350px;
        background: #f6f2ee;
        padding: 20px 0;
        z-index: 100;
        overflow: hidden;
    }

    .artist-slider-track {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
        padding: 10px 0 20px;
        height: 100%;
    }

    .artist-slider-track::-webkit-scrollbar {
        display: none;
    }

    .artist-card-link {
        text-decoration: none;
        flex: 0 0 auto;
    }

    .artist-card {
        flex: 0 0 auto;
        scroll-snap-align: start;
        width: 30vw;
        min-width: 350px;
        height: 65vh;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .artist-card-link:hover .artist-card {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .artist-image {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .artist-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .artist-card-link:hover .artist-image img {
        transform: scale(1.05);
    }

    .artist-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.5px;
        text-transform: capitalize;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
        z-index: 2;
    }

    /* Arrow buttons - no background, just shadow */
    .artist-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 44px;
        height: 44px;
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: transform 0.3s ease;
    }

    .artist-arrow:hover {
        transform: translateY(-50%) scale(1.2);
    }

    .artist-arrow-prev {
        left: -22px;
    }

    .artist-arrow-next {
        right: -22px;
    }

    .artist-arrow svg {
        color: #1a1a1a;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        transition: filter 0.3s ease;
    }

    .artist-arrow:hover svg {
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.5));
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .studio-status-bar {
            flex-direction: row;
            gap: 8px;
            align-items: flex-start;
        }

        .studio-time {
            font-size: 32px;
        }

        .studio-status {
            font-size: 24px;
        }

        .slide {
            width: 240px;
            height: 160px;
        }

        /* Reset Section 2 flex layout for mobile */
        .section_2.think_making .cmn_container {
            display: block !important;
        }

        .section_2.think_making .content_wrap {
            max-width: 100% !important;
        }

        /* Artist slider mobile */
        .artist-slider {
            position: relative !important;
            top: 0 !important;
            width: 100% !important;
            height: auto !important;
            margin: 30px auto 0 !important;
            padding: 0 !important;
        }

        /* Artist slider mobile - show 1.5 cards */
        .artist-card {
            width: calc(50vw - 30px);
            min-width: 180px;
            height: auto;
        }

        .artist-image {
            height: 220px;
        }

        .artist-name {
            font-size: 14px;
            padding: 12px;
        }

        /* Arrows on mobile */
        .artist-arrow {
            width: 36px;
            height: 36px;
        }

        .artist-arrow-prev {
            left: -10px;
        }

        .artist-arrow-next {
            right: -10px;
        }
    }

    @media (max-width: 480px) {
        .studio-time {
            font-size: 28px;
        }

        .slide {
            width: 200px;
            height: 140px;
        }

        /* Artist slider small mobile - show 1.5 cards */
        .artist-card {
            width: calc(60vw - 20px);
            min-width: 160px;
            height: auto;
        }

        .artist-image {
            height: 200px;
        }

        .artist-name {
            font-size: 13px;
            padding: 10px;
        }
    }
</style>

<div class="main_layout">
    <div class="main_slider">

        <?php if (have_rows('intro_section')): ?>
            <?php while (have_rows('intro_section')):
                the_row();
                // Get sub field values.
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $video = get_sub_field('video');
                $logo = get_sub_field('logo');
                // Studio status fields
                $studio_timezone = get_sub_field('studio_timezone') ?: 'America/New_York';
                $opening_time = get_sub_field('opening_time') ?: '11:00 AM';
                $closing_time = get_sub_field('closing_time') ?: '09:00 PM';

                // Calculate studio status
                date_default_timezone_set($studio_timezone);
                $now = new DateTime();
                $current_time = $now->format('g:i A');
                $hours = (int)$now->format('G');
                $open_hour = (int)date('G', strtotime($opening_time));
                $close_hour = (int)date('G', strtotime($closing_time));
                $is_open = ($hours >= $open_hour && $hours < $close_hour);
                $studio_status = $is_open ? 'OPEN' : 'CLOSED';
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
							
							<div class="content_wrap">
								<!-- Studio Status Bar -->
								<div class="studio-status-bar">
									<div class="studio-time"><?php echo $current_time; ?></div>
									<div class="studio-status">Studio: <span class="<?php echo strtolower($studio_status); ?>"><?php echo $studio_status; ?></span></div>
								</div>
							</div>
						
						<?php if ($video): ?>
							<video autoplay="autoplay" preload="auto" playsinline="" loop="loop" muted="muted" class="media__video">
								<source src="<?php echo $video; ?>" type="video/mp4">
							</video>
						<?php endif; ?>
						</div>

					</div>
					
                    <?php if ($logo): ?>
                        <div class="studio_logo">
                            <?php echo $logo; ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('think_making')): ?>
            <?php while (have_rows('think_making')):
                the_row();
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

                            <!-- 					<button class="button" onclick="window.open('https://app.acuityscheduling.com/schedule.php?owner=35794282&appointmentType=78415580', '_blank')">
                          <span class="button-content">Book a Session updated</span>
                    </button>
 -->
                            <div x-data>
                                <!-- Trigger Button -->
                                <button @click="$dispatch('open-booking-modal')" class="ghl-booking-btn button">
                                    <span class="button-content">Book Appointment</span>
                                </button>
                            </div>


                            <div class="studio_data_boxes" style="display:none">
                                <?php if ($below_content_box_heading_1): ?>
                                    <div class="data fs_14">
                                        <h3 class="fs_14">
                                            <?php echo $below_content_box_heading_1; ?>
                                        </h3>
                                        <?php echo $below_content_box_1; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($below_content_box_heading_2): ?>
                                    <div class="data fs_14">
                                        <h3 class="fs_14">
                                            <?php echo $below_content_box_heading_2; ?>
                                        </h3>
                                        <?php echo $below_content_box_2; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Artist Cards Slider - Pulls from Contentful -->
                        <?php
                        // Fetch artists from Contentful
                        $artists = get_contentful_artists(['limit' => 10, 'order' => 'fields.artistName']);
                        
                        // Debug: Log artist fetch result
                        if (defined('WP_DEBUG') && WP_DEBUG) {
                            error_log('Artists fetched from Contentful: ' . count($artists));
                            if (empty($artists)) {
                                error_log('No artists returned. Check Contentful CDA token configuration.');
                            }
                        }
                        ?>
                        <?php if (!empty($artists)): ?>
                            <div class="artist-slider" x-data="{ scrollPos: 0, maxScroll: 0 }" x-init="maxScroll = $refs.track.scrollWidth - $refs.track.clientWidth">
                                <button type="button" class="artist-arrow artist-arrow-prev" @click="$refs.track.scrollBy({ left: -220, behavior: 'smooth' })" aria-label="Previous">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </button>
                                <div class="artist-slider-track" x-ref="track">
                                    <?php foreach ($artists as $artist): ?>
                                        <?php
                                        $artist_slug = $artist['slug'];
                                        $artist_name = $artist['name'];
                                        $artist_img_url = $artist['profile_picture'];
                                        ?>
                                        <a href="/gallery/#<?php echo esc_attr($artist_slug); ?>" class="artist-card-link">
                                            <div class="artist-card">
                                                <div class="artist-image">
                                                    <?php if ($artist_img_url): ?>
                                                        <img src="<?php echo esc_url($artist_img_url); ?>" alt="<?php echo esc_attr($artist_name); ?>">
                                                    <?php else: ?>
                                                        <img src="https://via.placeholder.com/300x400/ff4500/ffffff?text=<?php echo urlencode(substr($artist_name, 0, 2)); ?>" alt="<?php echo esc_attr($artist_name); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="artist-name"><?php echo esc_html($artist_name); ?></div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="artist-arrow artist-arrow-next" @click="$refs.track.scrollBy({ left: 220, behavior: 'smooth' })" aria-label="Next">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </button>
                            </div>
                        <?php else: ?>
                            <!-- No artists loaded from Contentful -->
                            <!-- Debug: Check wp-config.php has CONTENTFUL_CDA_TOKEN set -->
                            <!-- Check error logs for Contentful API issues -->
                            <?php if (defined('WP_DEBUG') && WP_DEBUG): ?>
                                <div style="padding: 20px; background: #fff3cd; border: 2px solid #ffc107; margin: 20px 0;">
                                    <strong>Debug: Artists not loaded from Contentful</strong><br>
                                    Please check:<br>
                                    1. CONTENTFUL_CDA_TOKEN is set in wp-config.php<br>
                                    2. Artists exist in Contentful space: na4mk1p9pznd<br>
                                    3. Check error logs for API errors
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('service_education')): ?>
            <?php while (have_rows('service_education')):
                the_row();
                $image_1 = get_sub_field('image_1');
                $image_2 = get_sub_field('image_2');
                $image_3 = get_sub_field('image_3');

                ?>
                <section class="section_3 service_education">
                    <div class="cmn_container">
                        <div class="content_wrap">
                            <div class="service_content image_1"><img src="<?php echo $image_1; ?>" alt="img"></div>
                            <div class="service_content image_2"><img src="<?php echo $image_2; ?>" alt="img"></div>
                            <div class="service_content image_3"><img src="<?php echo $image_3; ?>" alt="img"></div>
                            <?php /*
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
                                             <?php */ ?>

                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>


        <?php if (get_field('single_video')): ?>
            <section class="section_4 single_video">
                <div class="cmn_container">
                    <video autoplay="autoplay" preload="auto" playsinline="" loop="loop" muted="muted" class="media__video">
                        <source src="<?php the_field('single_video'); ?>" type="video/mp4">
                    </video>
                </div>
            </section>
        <?php endif; ?>


        <?php if (have_rows('post_scriptum')): ?>
            <?php while (have_rows('post_scriptum')):
                the_row();
                $main_title = get_sub_field('main_title');
                $content = get_sub_field('content');
                $sub_title = get_sub_field('sub_title');
                ?>
                <section class="section_5 post_scriptum">
                    <div class="cmn_container">
                        <div class="content_wrap">
                            <?php if ($main_title): ?>
                                <h3 class="fs_14">
                                    <?php echo $main_title; ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($content): ?>
                                <div class="content fs_36">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($sub_title): ?>
                                <h3 class="fs_14">
                                    <?php echo $sub_title; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (have_rows('data_list')): ?>
                                <div class="service_data_boxes">
                                    <div class="data">
                                        <ul class="list-unstyled">
                                            <?php while (have_rows('data_list')):
                                                the_row();
                                                $list_item = get_sub_field('list_item');
                                                ?>
                                                <li>
                                                    <?php echo $list_item; ?>
                                                </li>
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
                    <h2 class="fs_20 text-white">Ink for Icons</h2>
                    <h3 class="text-white">
                        From A-listers to tastemakers, Tatu Panda’s work lives on the skin of the world’s most
                        recognized names.
                    </h3>
                </div>
                <div class="award_list">
                    <ul class="list-unstyled">
                        <?php
                        $args = array(
                            'post_type' => 'award',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $award_query = new WP_Query($args);

                        if ($award_query->have_posts()):
                            while ($award_query->have_posts()):
                                $award_query->the_post();
                                $award_name = get_field('award_name');
                                $year = get_field('year');
                                $award_link = get_field('award_link');
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($award_link); ?>" target="_blank">
                                        <div class="title">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="award">
                                            <span>
                                                <?php echo esc_html($award_name); ?>
                                            </span>
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

        <?php if (have_rows('full_image_section')): ?>
            <?php while (have_rows('full_image_section')):
                the_row();
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

<!-- Modal Structure -->
<div id="ghlBookingModal" class="ghl-modal">
    <div class="ghl-modal-content">
        <span class="ghl-close">&times;</span>
        <iframe src="https://link.smartwebsite360.com/widget/booking/oHN0M6e18FAfLByWox01"
            style="width: 100%; border: none; overflow: hidden; height: 600px;" scrolling="no"
            id="oHN0M6e18FAfLByWox01_1753171389626">
        </iframe>
        <script src="https://link.smartwebsite360.com/js/form_embed.js" type="text/javascript"></script>
    </div>
</div>

<?php
// Include reusable booking modal template part
get_template_part('template-parts/booking-modal');
?>

<script>
    jQuery(function ($) {
        const windowWidth = $(window).width();

        if (windowWidth >= 991) {
            // Force scroll to top on page load to prevent auto-scroll to bottom
            window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
            
            const $et_studio_slider = $('.main_slider');
            const $sections = $et_studio_slider.find('section');
            const et_studio_sectionCount = $sections.length;
            const et_studio_sectionWidth = windowWidth;
            const et_studio_totalWidth = et_studio_sectionCount * et_studio_sectionWidth;

            let et_studio_currentX = 0;
            let et_studio_targetX = 0;
            let et_studio_maxScroll = -(et_studio_totalWidth - et_studio_sectionWidth);
            let isVerticalSection = false;

            const $verticalSection = $('.section_6.awards_wrp');
            const verticalSectionOffsetLeft = $verticalSection.position().left;

            const $lastSection = $('.section_7.full_image_section');
            const lastSectionOffsetLeft = $lastSection.position().left;

            // Function to animate the scroll smoothly
            function et_studio_animateScroll() {
                if (!isVerticalSection) {
                    et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;

                    // Same limit here
                    if (-et_studio_currentX > lastSectionOffsetLeft) {
                        et_studio_currentX = -lastSectionOffsetLeft;
                    }

                    et_studio_currentX = Math.max(et_studio_currentX, et_studio_maxScroll);
                    et_studio_currentX = Math.min(et_studio_currentX, 0);

                    $et_studio_slider.css('transform', `translateX(${et_studio_currentX}px)`);
                }
                requestAnimationFrame(et_studio_animateScroll);
            }

            et_studio_animateScroll();

            let verticalScrollPosition = 0;
            let isMouseOverScrollable = false;

            // Track mouse position over scrollable elements
            document.addEventListener('mouseover', function(e) {
                const target = e.target;
                if (target.closest('.artist-slider-track') || target.closest('.award_list')) {
                    isMouseOverScrollable = true;
                }
            });

            document.addEventListener('mouseout', function(e) {
                const target = e.target;
                if (target.closest('.artist-slider-track') || target.closest('.award_list')) {
                    isMouseOverScrollable = false;
                }
            });

            window.addEventListener('wheel', function (e) {
                // Allow native scroll if mouse is over scrollable elements
                if (isMouseOverScrollable) {
                    return;
                }
                const scrollX = -et_studio_targetX;
                const delta = e.deltaY;
                const sectionHeight = $verticalSection.outerHeight();
                const sectionScrollMax = sectionHeight - window.innerHeight;

                // Detect when the scroll reaches the awards_wrp section
                const buffer = 40; // pixels
                if (scrollX >= verticalSectionOffsetLeft - buffer && scrollX <= verticalSectionOffsetLeft + buffer) {
                    isVerticalSection = true;
                    jQuery(".main_slider").addClass('awards_wrp_sec');

                    // Vertical scroll within the section
                    if (verticalScrollPosition >= 0 && verticalScrollPosition <= sectionScrollMax) {
                        verticalScrollPosition += delta;
                        verticalScrollPosition = Math.max(0, Math.min(verticalScrollPosition, sectionScrollMax));
                        $verticalSection.css('transform', `translateY(-${verticalScrollPosition}px)`);

                        // Prevent default vertical scrolling
                        e.preventDefault();
                    }

                    // Allow horizontal scrolling back if top or bottom of the section is reached
                    if (verticalScrollPosition <= 0 || verticalScrollPosition >= sectionScrollMax) {
                        isVerticalSection = false;
                        e.preventDefault();
                        et_studio_targetX -= delta;
                        et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    }
                } else {
                    // If not in the awards_wrp section, allow horizontal scroll
                    isVerticalSection = false;
                    e.preventDefault();
                    et_studio_targetX -= delta;
                    et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    jQuery(".main_slider").removeClass('awards_wrp_sec');
                }
            }, { passive: false });

            $(window).on('resize', function () {
                const newWidth = $(window).width();
                if (newWidth !== et_studio_sectionWidth && newWidth >= 991) {
                    window.location.reload();
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
