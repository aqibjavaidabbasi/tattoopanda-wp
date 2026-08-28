<?php 
/* Template Name: Work */
get_header();
?>

<!-- Fancybox 5 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

<style>
    /* ========================================
       GLOBAL SCROLL OVERRIDE FOR GALLERY PAGE
       ======================================== */
    html,
    body,
    #page,
    .site-content,
    .main_layout,
    .main_work_layout {
        height: auto !important;
        min-height: 100vh !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
        position: static !important;
        background-color: #000000 !important;
        color: #ffffff;
    }

    .site-content {
        padding-top: 0 !important;
    }

    /* ========================================
       GALLERY PAGE - MODERN DESIGN SYSTEM
       ======================================== */
    .main_work_layout {
        padding: 100px 0 130px;
        box-sizing: border-box;
        font-family: inherit;
        background: #000000;
        position: relative;
        min-height: 100vh;
    }

    /* Top Hero Header */
    .hd-gallery-hero {
        text-align: center;
        padding: 0 24px;
        margin-bottom: 32px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .hd-gallery-eyebrow {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 8px;
    }

    .hd-gallery-title {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.05;
        margin: 0 0 16px 0;
        text-transform: uppercase;
        color: #ffffff;
    }

    .hd-gallery-subtitle {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.7);
        max-width: 540px;
        margin: 0 auto 24px;
        line-height: 1.5;
    }

    /* Artist Navigation Pills Bar */
    .hd-artist-nav-wrap {
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        overflow-x: auto;
        padding: 4px 16px 8px;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }

    .hd-artist-nav-wrap::-webkit-scrollbar {
        display: none;
    }

    .hd-artist-nav-list {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 8px;
        min-width: max-content;
        margin: 0 auto;
    }

    .hd-nav-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.85) !important;
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        text-decoration: none !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
        white-space: nowrap;
    }

    .hd-nav-pill:hover {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff !important;
        border-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    .hd-nav-pill.is-active {
        background: #ffffff !important;
        color: #000000 !important;
        border-color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(255, 255, 255, 0.25);
    }

    .hd-nav-pill-count {
        font-size: 11px;
        opacity: 0.7;
        font-weight: 700;
    }

    /* Container */
    .hd-gallery-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        box-sizing: border-box;
    }

    /* ========================================
       STATE 1: ALL ARTISTS OVERVIEW GRID
       (Matches Home Page Section 2 Design)
       ======================================== */
    .hd-artists-overview-wrap {
        display: block;
        transition: opacity 0.3s ease;
    }

    .hd-artists-overview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 28px;
        margin-top: 10px;
    }

    .artist-vertical-card-link {
        text-decoration: none !important;
        display: block;
        width: 100%;
        cursor: pointer;
    }

    .artist-vertical-card {
        width: 100%;
        background: #141414;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .artist-vertical-card-link:hover .artist-vertical-card {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.65);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .artist-vertical-image {
        width: 100%;
        height: 380px;
        overflow: hidden;
        position: relative;
    }

    .artist-vertical-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        display: block;
    }

    .artist-vertical-card-link:hover .artist-vertical-image img {
        transform: scale(1.06);
    }

    .artist-vertical-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 999px;
        z-index: 3;
    }

    .artist-vertical-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 28px 20px 18px;
        text-align: center;
        font-size: 19px;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.5px;
        text-transform: capitalize;
        background: linear-gradient(to top, rgba(0,0,0,0.92) 0%, rgba(0,0,0,0.6) 60%, transparent 100%);
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }

    .artist-vertical-cta-text {
        font-size: 12px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.7);
        letter-spacing: 0.08em;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .artist-vertical-card-link:hover .artist-vertical-cta-text {
        color: #ffffff;
        transform: translateX(3px);
    }

    /* ========================================
       STATE 2: SINGLE ARTIST PORTFOLIO VIEW
       (Grid of Selected Artist Only)
       ======================================== */
    .hd-single-artist-wrap {
        display: none;
        animation: hdFadeIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .hd-single-artist-wrap.is-visible {
        display: block;
    }

    @keyframes hdFadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Artist Info Header Bar */
    .hd-artist-profile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        background: #121212;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 18px;
        padding: 16px 24px;
        margin-bottom: 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
    }

    .hd-back-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.18);
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        padding: 10px 18px;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none !important;
    }

    .hd-back-all-btn:hover {
        background: #ffffff;
        color: #000000 !important;
        border-color: #ffffff;
        transform: translateX(-3px);
    }

    .hd-artist-profile-center {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .hd-artist-avatar-thumb {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.3);
        flex-shrink: 0;
        background: #1a1a1a;
    }

    .hd-artist-avatar-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .hd-artist-profile-meta h2 {
        font-size: clamp(20px, 3vw, 26px);
        font-weight: 800;
        margin: 0;
        line-height: 1.1;
        color: #ffffff;
        text-transform: capitalize;
    }

    .hd-artist-profile-meta span {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 500;
    }

    .hd-artist-book-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #ff4500;
        color: #ffffff !important;
        border: none;
        border-radius: 999px;
        padding: 10px 22px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 4px 16px rgba(255, 69, 0, 0.35);
        text-decoration: none !important;
    }

    .hd-artist-book-btn:hover {
        background: #e63d00;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255, 69, 0, 0.5);
    }

    /* Selected Artist Artworks Grid */
    .hd-artwork-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 22px;
    }

    .hd-artwork-card {
        display: block;
        width: 100%;
        height: 380px;
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        background: #141414;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none !important;
        cursor: pointer;
    }

    .hd-artwork-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255, 255, 255, 0.35);
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.7);
    }

    .hd-artwork-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .hd-artwork-card:hover img {
        transform: scale(1.06);
    }

    /* Hover Overlay & Zoom Icon */
    .hd-artwork-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.1) 60%, transparent 100%);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .hd-artwork-card:hover .hd-artwork-overlay {
        opacity: 1;
    }

    .hd-zoom-icon-badge {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.35);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: scale(0.85);
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .hd-artwork-card:hover .hd-zoom-icon-badge {
        transform: scale(1);
    }

    /* ========================================
       STICKY BOTTOM BOOK APPOINTMENT CTA
       ======================================== */
    .artist-section-cta-fixed {
        position: fixed !important;
        bottom: 20px !important;
        left: 0 !important;
        width: 100% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        z-index: 99999 !important;
        pointer-events: none !important;
    }

    .artist-section-cta-fixed .ghl-booking-btn,
    .artist-section-cta-fixed .button {
        pointer-events: auto !important;
        background: #ffffff !important;
        color: #000000 !important;
        border: none !important;
        border-radius: 999px !important;
        padding: 14px 28px !important;
        height: auto !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        letter-spacing: 0.1em !important;
        text-transform: uppercase !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.75) !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        line-height: 1 !important;
        text-decoration: none !important;
        transition: transform 0.2s ease, background-color 0.2s ease !important;
        min-width: 190px !important;
    }

    .artist-section-cta-fixed .button .button-content,
    .artist-section-cta-fixed .button span {
        color: #000000 !important;
        font-weight: 700 !important;
        display: inline-block !important;
    }

    .artist-section-cta-fixed .button:hover {
        background: #f0ece6 !important;
        color: #000000 !important;
        transform: translateY(-2px) !important;
    }

    /* Fancybox Dark Customizations */
    .fancybox__backdrop {
        background: rgba(0, 0, 0, 0.94) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .main_work_layout {
            padding: 85px 0 110px !important;
        }

        .hd-gallery-container {
            padding: 0 16px;
        }

        .hd-artists-overview-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 18px;
        }

        .artist-vertical-image {
            height: 320px;
        }

        .hd-artwork-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 14px;
        }

        .hd-artwork-card {
            height: 320px;
        }

        .artist-section-cta-fixed {
            bottom: 16px !important;
        }

        .artist-section-cta-fixed .ghl-booking-btn,
        .artist-section-cta-fixed .button {
            padding: 13px 24px !important;
            font-size: 12px !important;
            min-width: 180px !important;
        }
    }

    @media (max-width: 600px) {
        .hd-gallery-hero {
            margin-bottom: 20px;
        }

        .hd-artist-nav-list {
            justify-content: flex-start;
        }

        .hd-artists-overview-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .artist-vertical-card {
            border-radius: 12px;
        }

        .artist-vertical-image {
            height: 220px;
        }

        .artist-vertical-name {
            font-size: 14px;
            padding: 18px 8px 10px;
        }

        .artist-vertical-badge {
            top: 8px;
            right: 8px;
            font-size: 9px;
            padding: 3px 8px;
        }

        .artist-vertical-cta-text {
            font-size: 10px;
        }

        .hd-artist-profile-header {
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            gap: 12px;
        }

        .hd-artist-avatar-thumb {
            width: 44px;
            height: 44px;
        }

        .hd-artist-profile-meta h2 {
            font-size: 18px;
        }

        .hd-artwork-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .hd-artwork-card {
            height: 220px;
            border-radius: 12px;
        }
    }
</style>

<?php
// Get all artists from Contentful
$artists = get_contentful_artists(['limit' => 50, 'order' => 'fields.artistName']);

$artists_data = [];
foreach ($artists as $artist) {
    if (!empty($artist['portfolio_images']) || !empty($artist['profile_picture'])) {
        $cover_img = !empty($artist['profile_picture']) 
            ? $artist['profile_picture'] 
            : (!empty($artist['portfolio_images'][0]['url']) ? $artist['portfolio_images'][0]['url'] : '');

        $artists_data[] = [
            'name' => $artist['name'],
            'slug' => $artist['slug'],
            'bio' => !empty($artist['bio']) ? $artist['bio'] : '',
            'cover_img' => $cover_img,
            'images' => !empty($artist['portfolio_images']) ? $artist['portfolio_images'] : []
        ];
    }
}

// Build optimized Contentful image URLs.
$contentful_image_url = static function($url, $params = []) {
    if (empty($url)) {
        return '';
    }

    $defaults = [
        'fm' => 'webp',
        'q' => 80,
    ];

    return add_query_arg(array_merge($defaults, $params), $url);
};

// Check for featured work from WP 'work' post type
$args = array(
    'post_type' => 'work',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);
$work_query = new WP_Query($args);
$has_featured = $work_query->have_posts();
?>

<div class="main_work_layout">
    
    <!-- Top Hero Section -->
    <div class="hd-gallery-hero">
        <div class="hd-gallery-eyebrow">Panda Tattoo Studio</div>
        <h1 class="hd-gallery-title">Gallery</h1>
        <p class="hd-gallery-subtitle">Explore signature artwork and portfolio pieces crafted by our resident artists.</p>

        <!-- Horizontal Artist Filter Navigation Pills -->
        <?php if (!empty($artists_data)): ?>
            <div class="hd-artist-nav-wrap">
                <div class="hd-artist-nav-list">
                    <a href="#all" class="hd-nav-pill is-active" data-artist-target="all">
                        <span>All Artists</span>
                        <span class="hd-nav-pill-count">(<?php echo count($artists_data); ?>)</span>
                    </a>
                    
                    <?php if ($has_featured): ?>
                        <a href="#featured" class="hd-nav-pill" data-artist-target="featured">
                            <span>Featured Work</span>
                            <span class="hd-nav-pill-count">(<?php echo esc_html($work_query->found_posts); ?>)</span>
                        </a>
                    <?php endif; ?>

                    <?php foreach ($artists_data as $artist): ?>
                        <a href="#<?php echo esc_attr($artist['slug']); ?>" class="hd-nav-pill" data-artist-target="<?php echo esc_attr($artist['slug']); ?>">
                            <span><?php echo esc_html($artist['name']); ?></span>
                            <?php if (!empty($artist['images'])): ?>
                                <span class="hd-nav-pill-count">(<?php echo count($artist['images']); ?>)</span>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="hd-gallery-container">

        <!-- ====================================================
             VIEW 1: ALL ARTISTS OVERVIEW GRID
             (Exact Home Page Section 2 Card Design)
             ==================================================== -->
        <div id="view-all-artists" class="hd-artists-overview-wrap">
            <div class="hd-artists-overview-grid">
                <?php foreach ($artists_data as $artist): ?>
                    <?php
                    $artist_slug = $artist['slug'];
                    $artist_name = $artist['name'];
                    $artist_img_url = $artist['cover_img'];
                    $piece_count = count($artist['images']);
                    if (empty($artist_img_url)) {
                        continue;
                    }
                    ?>
                    <div class="artist-vertical-card-link" data-select-artist="<?php echo esc_attr($artist_slug); ?>" role="button" tabindex="0" aria-label="View <?php echo esc_attr($artist_name); ?> Gallery">
                        <div class="artist-vertical-card">
                            <div class="artist-vertical-image">
                                <img src="<?php echo esc_url($artist_img_url); ?>" alt="<?php echo esc_attr($artist_name); ?>" loading="lazy">
                                <?php if ($piece_count > 0): ?>
                                    <span class="artist-vertical-badge"><?php echo $piece_count; ?> Works</span>
                                <?php endif; ?>
                            </div>
                            <div class="artist-vertical-name">
                                <span><?php echo esc_html($artist_name); ?></span>
                                <span class="artist-vertical-cta-text">
                                    View Portfolio &rarr;
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ====================================================
             VIEW 2: FEATURED STUDIO WORK (If Present in WP)
             ==================================================== -->
        <?php if ($has_featured): ?>
            <div id="view-artist-featured" class="hd-single-artist-wrap">
                <div class="hd-artist-profile-header">
                    <button class="hd-back-all-btn" data-back-all aria-label="Back to all artists">
                        &larr; All Artists
                    </button>
                    <div class="hd-artist-profile-center">
                        <div class="hd-artist-profile-meta">
                            <h2>Featured Studio Work</h2>
                            <span><?php echo esc_html($work_query->found_posts); ?> Pieces in Collection</span>
                        </div>
                    </div>
                    <div x-data>
                        <button @click="$dispatch('open-booking-modal')" class="hd-artist-book-btn" aria-label="Book Appointment">
                            Book Appointment
                        </button>
                    </div>
                </div>

                <div class="hd-artwork-grid">
                    <?php
                    $count = 1;
                    while ($work_query->have_posts()) : $work_query->the_post();
                        $featured_img_id = get_post_thumbnail_id(get_the_ID());
                        $featured_img_full = wp_get_attachment_image_url($featured_img_id, 'full');
                        ?>
                        <a data-fancybox="gallery-featured" href="<?php echo esc_url($featured_img_full); ?>" class="hd-artwork-card" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                            <?php
                            echo wp_get_attachment_image($featured_img_id, 'medium_large', false, array(
                                'alt' => get_the_title(),
                                'loading' => 'lazy',
                                'decoding' => 'async',
                                'sizes' => '(max-width: 600px) 50vw, (max-width: 1024px) 33vw, 25vw'
                            ));
                            ?>
                            <div class="hd-artwork-overlay">
                                <div class="hd-zoom-icon-badge">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                                </div>
                            </div>
                        </a>
                        <?php
                        $count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- ====================================================
             VIEW 3: INDIVIDUAL ARTIST GALLERIES
             (Only the active artist is visible on selection)
             ==================================================== -->
        <?php if (!empty($artists_data)): ?>
            <?php foreach ($artists_data as $artist): ?>
                <div id="view-artist-<?php echo esc_attr($artist['slug']); ?>" class="hd-single-artist-wrap">
                    
                    <!-- Artist Profile Bar -->
                    <div class="hd-artist-profile-header">
                        <button class="hd-back-all-btn" data-back-all aria-label="Back to all artists">
                            &larr; All Artists
                        </button>
                        <div class="hd-artist-profile-center">
                            <?php if (!empty($artist['cover_img'])): ?>
                                <div class="hd-artist-avatar-thumb">
                                    <img src="<?php echo esc_url($artist['cover_img']); ?>" alt="<?php echo esc_attr($artist['name']); ?>" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <div class="hd-artist-profile-meta">
                                <h2><?php echo esc_html($artist['name']); ?></h2>
                                <span><?php echo count($artist['images']); ?> Pieces in Portfolio</span>
                            </div>
                        </div>
                        <div x-data>
                            <button @click="$dispatch('open-booking-modal')" class="hd-artist-book-btn" aria-label="Book with <?php echo esc_attr($artist['name']); ?>">
                                Book With <?php echo esc_html(explode(' ', trim($artist['name']))[0]); ?>
                            </button>
                        </div>
                    </div>

                    <!-- Selected Artist Artworks Grid (NO SLIDER) -->
                    <div class="hd-artwork-grid">
                        <?php
                        $count = 1;
                        foreach ($artist['images'] as $img):
                            if (empty($img['url'])) continue;
                            $img_original = $img['url'];
                            $img_full = $contentful_image_url($img_original, [
                                'w' => 2000,
                                'fit' => 'scale'
                            ]);
                            $img_src = $contentful_image_url($img_original, [
                                'w' => 800,
                                'h' => 1000,
                                'fit' => 'thumb',
                                'f' => 'center'
                            ]);
                            $img_srcset = implode(', ', [
                                esc_url($contentful_image_url($img_original, [
                                    'w' => 480,
                                    'h' => 600,
                                    'fit' => 'thumb',
                                    'f' => 'center'
                                ])) . ' 480w',
                                esc_url($contentful_image_url($img_original, [
                                    'w' => 768,
                                    'h' => 960,
                                    'fit' => 'thumb',
                                    'f' => 'center'
                                ])) . ' 768w',
                                esc_url($contentful_image_url($img_original, [
                                    'w' => 1200,
                                    'h' => 1500,
                                    'fit' => 'thumb',
                                    'f' => 'center'
                                ])) . ' 1200w'
                            ]);
                            $img_alt = !empty($img['alt']) ? $img['alt'] : $artist['name'] . ' - Tattoo Artwork ' . $count;
                        ?>
                            <a data-fancybox="gallery-<?php echo esc_attr($artist['slug']); ?>" href="<?php echo esc_url($img_full); ?>" class="hd-artwork-card" aria-label="<?php echo esc_attr($img_alt); ?>">
                                <img
                                    src="<?php echo esc_url($img_src); ?>"
                                    srcset="<?php echo esc_attr($img_srcset); ?>"
                                    sizes="(max-width: 600px) 50vw, (max-width: 1024px) 33vw, 25vw"
                                    alt="<?php echo esc_attr($img_alt); ?>"
                                    loading="lazy"
                                    decoding="async"
                                >
                                <div class="hd-artwork-overlay">
                                    <div class="hd-zoom-icon-badge">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                                    </div>
                                </div>
                            </a>
                        <?php
                            $count++;
                        endforeach;
                        ?>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</div>

<!-- Exact Home Page Style Fixed Bottom Book Appointment CTA -->
<div class="artist-section-cta-fixed" x-data>
    <button @click="$dispatch('open-booking-modal')" class="ghl-booking-btn button" aria-label="Book Appointment">
        <span class="button-content">Book Appointment</span>
    </button>
</div>

<!-- Modal Structure for Booking -->
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
// Include reusable booking modal template part if present
if (locate_template('template-parts/booking-modal.php')) {
    get_template_part('template-parts/booking-modal');
}
?>

<!-- Fancybox Lightbox Script -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Fancybox v5
        if (typeof Fancybox !== 'undefined') {
            Fancybox.bind('[data-fancybox]', {
                Thumbs: {
                    autoStart: true,
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [],
                        right: ["iterateZoom", "close"],
                    },
                },
            });
        }

        const overviewView = document.getElementById('view-all-artists');
        const singleArtistViews = document.querySelectorAll('.hd-single-artist-wrap');
        const navPills = document.querySelectorAll('.hd-nav-pill');
        const galleryContainer = document.querySelector('.main_work_layout');

        // Function to activate a specific artist view
        function showArtist(targetSlug, updateUrl = true) {
            if (!targetSlug || targetSlug === 'all') {
                // Show all artists overview
                if (overviewView) overviewView.style.display = 'block';
                singleArtistViews.forEach(v => v.classList.remove('is-visible'));

                // Update active pill
                navPills.forEach(pill => {
                    if (pill.getAttribute('data-artist-target') === 'all') {
                        pill.classList.add('is-active');
                    } else {
                        pill.classList.remove('is-active');
                    }
                });

                if (updateUrl && window.location.hash !== '#all') {
                    history.pushState(null, null, window.location.pathname);
                }
            } else {
                const targetView = document.getElementById('view-artist-' + targetSlug);
                if (targetView) {
                    // Hide overview and hide other artists
                    if (overviewView) overviewView.style.display = 'none';
                    singleArtistViews.forEach(v => v.classList.remove('is-visible'));

                    // Show selected artist only
                    targetView.classList.add('is-visible');

                    // Update active pill
                    navPills.forEach(pill => {
                        if (pill.getAttribute('data-artist-target') === targetSlug) {
                            pill.classList.add('is-active');
                        } else {
                            pill.classList.remove('is-active');
                        }
                    });

                    if (updateUrl) {
                        history.pushState(null, null, '#' + targetSlug);
                    }
                }
            }

            // Scroll smoothly to gallery top if user is down the page
            if (window.scrollY > 200) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Click on Navigation Pills
        navPills.forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-artist-target');
                showArtist(target, true);
            });
        });

        // Click on Artist Overview Cards
        document.querySelectorAll('[data-select-artist]').forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-select-artist');
                showArtist(slug, true);
            });
            // Enter key accessibility
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const slug = this.getAttribute('data-select-artist');
                    showArtist(slug, true);
                }
            });
        });

        // Click on Back to All Artists buttons
        document.querySelectorAll('[data-back-all]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                showArtist('all', true);
            });
        });

        // Handle initial hash on page load (e.g. /gallery/#artist-slug from homepage)
        function checkHash() {
            const rawHash = window.location.hash.replace('#', '').trim();
            if (rawHash && rawHash !== 'all') {
                const targetView = document.getElementById('view-artist-' + rawHash);
                if (targetView) {
                    showArtist(rawHash, false);
                }
            } else {
                showArtist('all', false);
            }
        }

        checkHash();

        // Listen for browser Back/Forward buttons
        window.addEventListener('popstate', function() {
            checkHash();
        });
    });
</script>

<?php 
get_footer();
?>