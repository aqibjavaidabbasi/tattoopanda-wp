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
            position: relative;
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
       SECTION 2: THINK MAKING & ARTIST SECTION
       ======================================== */
    .section_2.think_making {
        position: relative;
    }

    @media (min-width: 991px) {
        .section_2.think_making .cmn_container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 60px;
            height: 82vh;
            position: relative;
        }

        .section_2.think_making .content_wrap {
            flex: 0 0 420px;
            max-width: 420px;
        }

        .section_2.think_making .content_wrap h3.section-header-title {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin: 0 0 24px 0;
            color: #000000;
        }
    }

    /* Vertical Scroll Cards for Artists */
    .artist-vertical-cards-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
        overflow-y: auto;
        max-height: 76vh;
        width: 100%;
        max-width: 440px;
        padding: 10px 10px 80px 0;
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.25) transparent;
        -webkit-overflow-scrolling: touch;
    }

    .artist-vertical-cards-wrap::-webkit-scrollbar {
        width: 4px;
    }

    .artist-vertical-cards-wrap::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 4px;
    }

    .artist-vertical-card-link {
        text-decoration: none;
        display: block;
        width: 100%;
    }

    .artist-vertical-card {
        width: 100%;
        background: #141414;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .artist-vertical-card-link:hover .artist-vertical-card {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.55);
        border-color: rgba(255, 255, 255, 0.25);
    }

    .artist-vertical-image {
        width: 100%;
        height: 420px;
        overflow: hidden;
        position: relative;
    }

    .artist-vertical-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .artist-vertical-card-link:hover .artist-vertical-image img {
        transform: scale(1.04);
    }

    .artist-vertical-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 24px 20px 18px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
        letter-spacing: 0.5px;
        text-transform: capitalize;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.5) 60%, transparent 100%);
        z-index: 2;
    }

    /* Fixed Bottom CTA on Artist Section */
    .artist-section-cta-fixed {
        position: absolute;
        bottom: 20px;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        pointer-events: none;
    }

    .artist-section-cta-fixed .ghl-booking-btn,
    .artist-section-cta-fixed .button {
        pointer-events: auto !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7) !important;
    }

    /* ========================================
       STICKY GLOBAL SLIDER DOTS NAVIGATION
       ======================================== */
    .global-slider-dots-wrapper {
        position: fixed;
        bottom: 18px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 7px 16px;
        background: rgba(18, 18, 18, 0.85);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 999px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.6);
        pointer-events: auto;
    }

    .global-slider-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-block;
        border: none;
        padding: 0;
    }

    .global-slider-dot:hover {
        background-color: rgba(255, 255, 255, 0.8);
        transform: scale(1.2);
    }

    .global-slider-dot.is-active {
        width: 24px;
        border-radius: 999px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.85);
    }

    /* ========================================
       SECTION 5: POST SCRIPTUM (Manifesto)
       ======================================== */
    .section_5.post_scriptum {
        position: relative;
    }

    @media (min-width: 991px) {
        .section_5.post_scriptum .cmn_container {
            display: flex;
            align-items: center;
            height: 82vh;
        }

        .section_5.post_scriptum .hd-post-scriptum-wrap {
            max-width: 680px;
            margin: 0 auto;
            padding: 40px 0;
        }
    }

    .hd-post-scriptum-wrap {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        max-width: 640px;
        margin: 0 auto;
    }

    .hd-ps-eyebrow {
        margin-bottom: 24px;
    }

    .hd-ps-tag {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.15);
        padding: 5px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.04);
    }

    .hd-ps-content {
        font-size: clamp(20px, 4.8vw, 30px);
        font-weight: 400;
        line-height: 1.4;
        color: #ffffff;
        letter-spacing: -0.015em;
        margin-bottom: 36px;
    }

    .hd-ps-content p {
        margin-bottom: 16px;
        color: rgba(255, 255, 255, 0.92);
        line-height: 1.42;
    }

    .hd-ps-content p:last-child {
        margin-bottom: 0;
        color: #ffffff;
        font-weight: 600;
    }

    .hd-ps-ingredients {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding-top: 24px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    .hd-ps-subtitle {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }

    .hd-ps-tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }

    .hd-ps-tag-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 999px;
        padding: 6px 16px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        transition: background 0.2s ease, border-color 0.2s ease;
    }

    .hd-ps-tag-item:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .hd-ps-tag-bullet {
        font-size: 8px;
        color: rgba(255, 255, 255, 0.5);
    }

    /* ========================================
       SECTION 7: LOCATION & CONTACT (Last Section)
       ======================================== */
    .section_7.hd-location-section {
        position: relative;
        background: #000000;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (min-width: 991px) {
        .section_7.hd-location-section {
            width: 100vw;
            min-width: 100vw;
            height: 100vh;
        }

        .hd-location-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 0 40px;
        }

        .hd-location-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 820px;
            width: 100%;
            margin: auto;
        }
    }

    .hd-location-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .hd-location-logo-wrap {
        margin-bottom: 28px;
    }

    .hd-location-logo {
        height: 48px;
        width: auto;
        max-width: 100%;
        display: block;
        filter: brightness(0) invert(1);
    }

    .hd-location-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        width: 100%;
        margin-bottom: 32px;
    }

    .hd-location-card {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 16px;
        padding: 24px 18px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        text-align: center;
        min-height: 160px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .hd-location-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255, 255, 255, 0.28);
    }

    .hd-location-card-header {
        margin-bottom: 12px;
    }

    .hd-location-card-tag {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
    }

    .hd-location-card-text {
        font-size: 15px;
        line-height: 1.45;
        font-weight: 500;
        color: #ffffff;
        margin: 0 0 10px 0;
    }

    .hd-location-phone-link {
        color: #ffffff;
        text-decoration: none;
        transition: opacity 0.2s ease;
    }

    .hd-location-phone-link:hover {
        opacity: 0.8;
        color: #ffffff;
    }

    .hd-location-link {
        font-size: 12px;
        font-weight: 600;
        color: #ffffff;
        text-decoration: none;
        letter-spacing: 0.05em;
        opacity: 0.8;
        transition: opacity 0.2s ease;
    }

    .hd-location-link:hover {
        opacity: 1;
        text-decoration: underline;
    }

    .hd-location-subtext {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.45);
    }

    .hd-location-badge-open {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #22c55e;
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.25);
        padding: 3px 10px;
        border-radius: 999px;
    }

    .hd-location-cta-wrap {
        margin-top: 6px;
    }

    /* Mobile responsive */
    @media (max-width: 991px) {
        .studio-status-bar {
            flex-direction: row;
            gap: 8px;
            align-items: flex-start;
        }

        .studio-time {
            font-size: 28px;
        }

        .studio-status {
            font-size: 20px;
        }

        /* Section 2 mobile */
        .section_2.think_making {
            position: relative !important;
            padding-bottom: 90px !important;
        }

        .section_2.think_making .cmn_container {
            display: flex !important;
            flex-direction: column !important;
            gap: 24px !important;
            height: auto !important;
        }

        .section_2.think_making .content_wrap {
            max-width: 100% !important;
            width: 100% !important;
        }

        .section_2.think_making .content_wrap h3.section-header-title {
            color: #ffffff !important;
            font-size: 13px !important;
            letter-spacing: 0.1em !important;
            text-transform: uppercase !important;
            margin: 0 0 14px 0 !important;
            font-weight: 600 !important;
        }

        .artist-vertical-cards-wrap {
            max-height: none !important;
            overflow-y: visible !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 0 40px 0 !important;
            gap: 20px !important;
        }

        .artist-vertical-card {
            border-radius: 14px !important;
        }

        .artist-vertical-image {
            height: 320px !important;
        }

        .artist-vertical-name {
            font-size: 16px !important;
            padding: 16px !important;
        }

        .artist-section-cta-fixed {
            position: fixed !important;
            bottom: 60px !important;
            left: 0 !important;
            width: 100% !important;
            z-index: 900 !important;
        }

        /* Section 5 mobile */
        .section_5.post_scriptum {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            padding: 70px 24px 70px !important;
            min-height: 100dvh !important;
            box-sizing: border-box !important;
        }

        .section_5.post_scriptum .cmn_container {
            width: 100% !important;
            max-width: 100% !important;
            margin: auto 0 !important;
        }

        .hd-ps-eyebrow {
            margin-bottom: 16px !important;
        }

        .hd-ps-content {
            font-size: 20px !important;
            line-height: 1.45 !important;
            margin-bottom: 24px !important;
        }

        .hd-ps-content p {
            margin-bottom: 12px !important;
            line-height: 1.42 !important;
        }

        .hd-ps-ingredients {
            padding-top: 18px !important;
            gap: 10px !important;
        }

        .hd-ps-tag-item {
            font-size: 11px !important;
            padding: 5px 12px !important;
        }

        /* Section 7 mobile */
        .section_7.hd-location-section {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            padding: 70px 20px 80px !important;
            min-height: 100dvh !important;
            box-sizing: border-box !important;
        }

        .hd-location-logo-wrap {
            margin-bottom: 20px !important;
        }

        .hd-location-logo {
            height: 36px !important;
        }

        .hd-location-grid {
            grid-template-columns: 1fr !important;
            gap: 12px !important;
            margin-bottom: 20px !important;
            max-width: 320px !important;
        }

        .hd-location-card {
            padding: 16px 14px !important;
            min-height: auto !important;
            border-radius: 12px !important;
        }

        .hd-location-card-text {
            font-size: 14px !important;
            margin-bottom: 6px !important;
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
                <section class="section_1 hd-section hd-hero-section">
                    <div class="hd-section-inner">
                        <div class="hd-hero-top-wrap">
                            <!-- Top Headline / Tagline -->
                            <div class="hd-hero-top-headline">
                                <?php if ($content): ?>
                                    <h2 class="hd-tagline"><?php echo strip_tags($content, "<br>"); ?></h2>
                                <?php else: ?>
                                    <h2 class="hd-tagline">Skin Art<br>For Those Who<br>Only Accept The<br>Best In Life</h2>
                                <?php endif; ?>
                            </div>

                            <!-- Studio Status Bar -->
                            <div class="studio-status-bar">
                                <div class="studio-time"><?php echo esc_html($current_time); ?></div>
                                <div class="studio-status">
                                    Studio: <span class="<?php echo strtolower($studio_status); ?>"><?php echo esc_html($studio_status); ?></span>
                                </div>
                            </div>

                            <!-- Logotype -->
                            <div class="hd-logotype">
                                <img
                                    src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png"
                                    alt="Tatu Panda"
                                    loading="eager"
                                >
                            </div>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('think_making')): ?>
            <?php while (have_rows('think_making')):
                the_row();
                // Get sub field values.
                $content = get_sub_field('content');
                $below_content_box_heading_1 = get_sub_field('below_content_box_heading_1');
                $below_content_box_1 = get_sub_field('below_content_box_1');
                $below_content_box_heading_2 = get_sub_field('below_content_box_heading_2');
                $below_content_box_2 = get_sub_field('below_content_box_2');
                ?>
                <section class="section_2 think_making">
                    <div class="cmn_container">
                        <div class="content_wrap">
                            <h3 class="fs_14 section-header-title">Artists</h3>
                            <?php if ($content): ?>
                                <div class="studio_content fs_36">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>

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

                        <!-- Artist Cards - Vertical Scroll Cards -->
                        <?php
                        // Fetch artists from Contentful
                        $artists = get_contentful_artists(['limit' => 10, 'order' => 'fields.artistName']);
                        ?>
                        <?php if (!empty($artists)): ?>
                            <div class="artist-vertical-cards-wrap">
                                <?php foreach ($artists as $artist): ?>
                                    <?php
                                    $artist_slug = $artist['slug'];
                                    $artist_name = $artist['name'];
                                    $artist_img_url = $artist['profile_picture'];
                                    ?>
                                    <a href="/gallery/#<?php echo esc_attr($artist_slug); ?>" class="artist-vertical-card-link">
                                        <div class="artist-vertical-card">
                                            <div class="artist-vertical-image">
                                                <?php if ($artist_img_url): ?>
                                                    <img src="<?php echo esc_url($artist_img_url); ?>" alt="<?php echo esc_attr($artist_name); ?>" loading="lazy">
                                                <?php else: ?>
                                                    <img src="https://via.placeholder.com/300x400/ff4500/ffffff?text=<?php echo urlencode(substr($artist_name, 0, 2)); ?>" alt="<?php echo esc_attr($artist_name); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="artist-vertical-name"><?php echo esc_html($artist_name); ?></div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Fixed Bottom Book Appointment CTA on Artist Section -->
                    <div class="artist-section-cta-fixed" x-data>
                        <button @click="$dispatch('open-booking-modal')" class="ghl-booking-btn button" aria-label="Book Appointment">
                            <span class="button-content">Book Appointment</span>
                        </button>
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
                        <div class="content_wrap hd-post-scriptum-wrap">
                            <?php if ($main_title): ?>
                                <div class="hd-ps-eyebrow">
                                    <span class="hd-ps-tag"><?php echo esc_html($main_title); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($content): ?>
                                <div class="hd-ps-content">
                                    <?php echo wpautop($content); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($sub_title || have_rows('data_list')): ?>
                                <div class="hd-ps-ingredients">
                                    <?php if ($sub_title): ?>
                                        <h4 class="hd-ps-subtitle"><?php echo esc_html($sub_title); ?></h4>
                                    <?php endif; ?>

                                    <?php if (have_rows('data_list')): ?>
                                        <div class="hd-ps-tags-list">
                                            <?php while (have_rows('data_list')):
                                                the_row();
                                                $list_item = get_sub_field('list_item');
                                                if ($list_item):
                                                ?>
                                                <span class="hd-ps-tag-item">
                                                    <span class="hd-ps-tag-bullet">✦</span>
                                                    <?php echo esc_html($list_item); ?>
                                                </span>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
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

        <!-- Section 7: Studio Info, Hours & Booking (Last Section) -->
        <section class="section_7 hd-location-section">
            <div class="cmn_container hd-location-container">
                <div class="hd-location-content">
                    <!-- Panda Logo -->
                    <div class="hd-location-logo-wrap">
                        <img
                            src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png"
                            alt="Tatu Panda"
                            class="hd-location-logo"
                            loading="lazy"
                        >
                    </div>

                    <!-- Contact & Info Cards Grid -->
                    <div class="hd-location-grid">
                        <!-- Address Card -->
                        <div class="hd-location-card">
                            <div class="hd-location-card-header">
                                <span class="hd-location-card-tag">Studio Location</span>
                            </div>
                            <p class="hd-location-card-text">
                                254 NW 36th St<br>Miami, FL 33127
                            </p>
                            <a href="https://www.google.com/maps/search/?api=1&query=Panda+Tattoo+254+NW+36th+St+Miami+FL+33127" target="_blank" rel="noopener noreferrer" class="hd-location-link">
                                Get Directions &rarr;
                            </a>
                        </div>

                        <!-- Phone Card -->
                        <div class="hd-location-card">
                            <div class="hd-location-card-header">
                                <span class="hd-location-card-tag">Direct Line</span>
                            </div>
                            <p class="hd-location-card-text">
                                <a href="tel:+17869199998" class="hd-location-phone-link">(786) 919-9998</a>
                            </p>
                            <span class="hd-location-subtext">Appointments & Consultations</span>
                        </div>

                        <!-- Hours Card -->
                        <div class="hd-location-card">
                            <div class="hd-location-card-header">
                                <span class="hd-location-card-tag">Studio Hours</span>
                            </div>
                            <p class="hd-location-card-text">
                                Mon – Sun<br>11:00 AM – 9:00 PM
                            </p>
                            <span class="hd-location-badge-open">Open Daily</span>
                        </div>
                    </div>

                    <!-- Booking CTA -->
                    <div class="hd-location-cta-wrap" x-data>
                        <button @click="$dispatch('open-booking-modal')" class="button hd-hero-cta ghl-booking-btn" aria-label="Book a tattoo appointment">
                            <span class="button-content">Book Appointment</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Sticky Prominent Global Slider Dots -->
    <div class="global-slider-dots-wrapper" id="globalSliderDots" role="tablist" aria-label="Section Navigation"></div>
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
        const $et_studio_slider = $('.main_slider');
        const $sections = $et_studio_slider.find('section');
        const dotsContainer = document.getElementById('globalSliderDots');

        // Render global sticky dots
        if (dotsContainer && $sections.length) {
            dotsContainer.innerHTML = '';
            $sections.each(function (index) {
                const dot = document.createElement('button');
                dot.className = 'global-slider-dot' + (index === 0 ? ' is-active' : '');
                dot.setAttribute('data-index', index);
                dot.setAttribute('type', 'button');
                dot.setAttribute('role', 'tab');
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                dotsContainer.appendChild(dot);
            });
        }

        function updateActiveDot(activeIndex) {
            if (!dotsContainer) return;
            const dots = dotsContainer.querySelectorAll('.global-slider-dot');
            dots.forEach((d, i) => {
                if (i === activeIndex) {
                    d.classList.add('is-active');
                    d.setAttribute('aria-selected', 'true');
                } else {
                    d.classList.remove('is-active');
                    d.setAttribute('aria-selected', 'false');
                }
            });
        }

        if (windowWidth >= 991) {
            // Force scroll to top on page load
            window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;

            const et_studio_sectionCount = $sections.length;
            const et_studio_sectionWidth = windowWidth;
            const et_studio_totalWidth = et_studio_sectionCount * et_studio_sectionWidth;

            let et_studio_currentX = 0;
            let et_studio_targetX = 0;
            let et_studio_maxScroll = -(et_studio_totalWidth - et_studio_sectionWidth);
            let isVerticalSection = false;

            const $verticalSection = $('.section_6.awards_wrp');
            const verticalSectionOffsetLeft = $verticalSection.length ? $verticalSection.position().left : 0;

            // Dot click navigation on desktop
            $(dotsContainer).on('click', '.global-slider-dot', function () {
                const targetIndex = parseInt($(this).data('index'), 10);
                et_studio_targetX = Math.max(-targetIndex * et_studio_sectionWidth, et_studio_maxScroll);
                updateActiveDot(targetIndex);
            });

            // Function to animate the scroll smoothly
            function et_studio_animateScroll() {
                if (!isVerticalSection) {
                    et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;
                    et_studio_currentX = Math.max(et_studio_currentX, et_studio_maxScroll);
                    et_studio_currentX = Math.min(et_studio_currentX, 0);

                    $et_studio_slider.css('transform', `translateX(${et_studio_currentX}px)`);

                    const activeIndex = Math.min(et_studio_sectionCount - 1, Math.max(0, Math.round(-et_studio_currentX / et_studio_sectionWidth)));
                    updateActiveDot(activeIndex);
                }
                requestAnimationFrame(et_studio_animateScroll);
            }

            et_studio_animateScroll();

            let verticalScrollPosition = 0;
            let isMouseOverScrollable = false;

            // Track mouse position over scrollable elements
            document.addEventListener('mouseover', function(e) {
                const target = e.target;
                if (target.closest('.artist-vertical-cards-wrap') || target.closest('.award_list')) {
                    isMouseOverScrollable = true;
                }
            });

            document.addEventListener('mouseout', function(e) {
                const target = e.target;
                if (target.closest('.artist-vertical-cards-wrap') || target.closest('.award_list')) {
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
                const sectionHeight = $verticalSection.length ? $verticalSection.outerHeight() : 0;
                const sectionScrollMax = sectionHeight - window.innerHeight;

                // Detect when scroll reaches the awards_wrp section
                const buffer = 40;
                if ($verticalSection.length && scrollX >= verticalSectionOffsetLeft - buffer && scrollX <= verticalSectionOffsetLeft + buffer) {
                    isVerticalSection = true;
                    $(".main_slider").addClass('awards_wrp_sec');

                    if (verticalScrollPosition >= 0 && verticalScrollPosition <= sectionScrollMax) {
                        verticalScrollPosition += delta;
                        verticalScrollPosition = Math.max(0, Math.min(verticalScrollPosition, sectionScrollMax));
                        $verticalSection.css('transform', `translateY(-${verticalScrollPosition}px)`);
                        e.preventDefault();
                    }

                    if (verticalScrollPosition <= 0 || verticalScrollPosition >= sectionScrollMax) {
                        isVerticalSection = false;
                        e.preventDefault();
                        et_studio_targetX -= delta;
                        et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    }
                } else {
                    isVerticalSection = false;
                    e.preventDefault();
                    et_studio_targetX -= delta;
                    et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    $(".main_slider").removeClass('awards_wrp_sec');
                }
            }, { passive: false });

            $(window).on('resize', function () {
                const newWidth = $(window).width();
                if (newWidth !== et_studio_sectionWidth && newWidth >= 991) {
                    window.location.reload();
                }
            });
        } else {
            // Mobile navigation & touch scroll sync
            const sliderEl = document.querySelector('.main_slider');
            if (dotsContainer && sliderEl) {
                $(dotsContainer).on('click', '.global-slider-dot', function () {
                    const targetIndex = parseInt($(this).data('index'), 10);
                    const targetSection = $sections.get(targetIndex);
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' });
                        updateActiveDot(targetIndex);
                    }
                });

                let scrollTimer;
                sliderEl.addEventListener('scroll', function () {
                    window.clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(function () {
                        const scrollLeft = sliderEl.scrollLeft;
                        const width = window.innerWidth || document.documentElement.clientWidth;
                        const activeIndex = Math.min($sections.length - 1, Math.max(0, Math.round(scrollLeft / width)));
                        updateActiveDot(activeIndex);
                    }, 30);
                }, { passive: true });
            }
        }
    });
</script>

<script>
    const bullet = document.querySelector('.bullet');
    if (bullet) {
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
    }
</script>

<?php
get_footer();
?>
