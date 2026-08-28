<?php 
/* Template Name: Work */
get_header();
?>

<!-- Swiper & Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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
        padding: 110px 0 130px;
        box-sizing: border-box;
        font-family: inherit;
        background: #000000;
        position: relative;
    }

    /* Top Hero Header */
    .hd-gallery-hero {
        text-align: center;
        padding: 0 24px;
        margin-bottom: 36px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .hd-gallery-title {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1;
        margin: 0 0 24px 0;
        text-transform: uppercase;
        color: #ffffff;
    }

    /* Artist Navigation Pills Bar */
    .hd-artist-nav-wrap {
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        overflow-x: auto;
        padding: 4px 16px 12px;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none; /* Firefox */
    }

    .hd-artist-nav-wrap::-webkit-scrollbar {
        display: none; /* Chrome, Safari */
    }

    .hd-artist-nav-list {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 10px;
        min-width: max-content;
        margin: 0 auto;
    }

    .hd-nav-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: rgba(255, 255, 255, 0.8) !important;
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        text-decoration: none !important;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        transition: all 0.2s ease;
        cursor: pointer;
        white-space: nowrap;
    }

    .hd-nav-pill:hover,
    .hd-nav-pill.active {
        background: #ffffff !important;
        color: #000000 !important;
        border-color: #ffffff !important;
        transform: translateY(-2px);
    }

    /* Artist Section */
    .artist-section {
        margin-bottom: 70px;
        scroll-margin-top: 110px;
        position: relative;
    }

    .hd-section-header {
        max-width: 1240px;
        margin: 0 auto 20px;
        padding: 0 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .hd-section-title-wrap {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .artist-heading {
        font-size: clamp(22px, 3.5vw, 32px);
        font-weight: 800;
        letter-spacing: -0.02em;
        text-transform: uppercase;
        color: #ffffff;
        margin: 0;
        padding: 0;
        line-height: 1.1;
    }

    .hd-count-badge {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        padding: 4px 10px;
        border-radius: 999px;
    }

    /* Navigation Controls */
    .hd-swiper-nav-controls {
        display: inline-flex !important;
        align-items: center !important;
        gap: 10px !important;
    }

    button.hd-nav-btn,
    .hd-nav-btn {
        width: 42px !important;
        min-width: 42px !important;
        max-width: 42px !important;
        height: 42px !important;
        min-height: 42px !important;
        max-height: 42px !important;
        aspect-ratio: 1 / 1 !important;
        border-radius: 50% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.22) !important;
        color: #ffffff !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        box-sizing: border-box !important;
        outline: none !important;
        line-height: 1 !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
        flex-shrink: 0 !important;
    }

    .hd-nav-btn svg {
        width: 20px !important;
        height: 20px !important;
        stroke: #ffffff !important;
        fill: none !important;
        display: block !important;
        pointer-events: none !important;
        transition: stroke 0.2s ease !important;
    }

    .hd-nav-btn:hover {
        background: #ffffff !important;
        border-color: #ffffff !important;
        transform: scale(1.06) !important;
    }

    .hd-nav-btn:hover svg {
        stroke: #000000 !important;
    }

    .hd-nav-btn.swiper-button-disabled {
        opacity: 0.25 !important;
        cursor: not-allowed !important;
        pointer-events: none !important;
    }

    /* Swiper Slider Styling */
    .work_wrapper {
        width: 100%;
        position: relative;
    }

    .work_slider {
        width: 100%;
        padding: 10px 24px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .work_slider .swiper-wrapper {
        display: flex;
        align-items: stretch;
    }

    .swiper-slide.work_data {
        width: 320px;
        height: auto;
        flex-shrink: 0;
        box-sizing: border-box;
        transition: transform 0.3s ease;
    }

    /* Artwork Card Container */
    .hd-artwork-card {
        display: block;
        width: 100%;
        height: 440px;
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none !important;
    }

    .hd-artwork-card:hover {
        transform: translateY(-5px);
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
        transform: scale(1.05);
    }

    /* Hover Overlay & Zoom Icon */
    .hd-artwork-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 50%);
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
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
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
       EXACT HOME PAGE FIXED BOOK APPOINTMENT CTA
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
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7) !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        line-height: 1 !important;
        text-decoration: none !important;
        transition: transform 0.2s ease, background-color 0.2s ease, opacity 0.2s ease !important;
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

    .artist-section-cta-fixed .button:active {
        transform: scale(0.97) !important;
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

        .hd-section-header {
            padding: 0 16px;
            margin-bottom: 16px;
        }

        .work_slider {
            padding: 10px 16px;
        }

        .swiper-slide.work_data {
            width: 260px;
        }

        .hd-artwork-card {
            height: 360px;
        }

        .artist-section {
            margin-bottom: 50px;
            scroll-margin-top: 90px;
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
        .swiper-slide.work_data {
            width: 220px;
        }

        .hd-artwork-card {
            height: 300px;
            border-radius: 14px;
        }

        .hd-artist-nav-list {
            justify-content: flex-start;
        }
    }
</style>

<?php
// Get artists from Contentful
$artists = get_contentful_artists(['limit' => 10, 'order' => 'fields.artistName']);

$artists_data = [];
foreach ($artists as $artist) {
    if (!empty($artist['portfolio_images'])) {
        $artists_data[] = [
            'name' => $artist['name'],
            'slug' => $artist['slug'],
            'images' => $artist['portfolio_images']
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
?>

<div class="main_work_layout">
    
    <!-- Top Hero Section -->
    <div class="hd-gallery-hero">
        <h1 class="hd-gallery-title">Gallery</h1>

        <!-- Horizontal Artist Quick Navigation Pills -->
        <?php if (!empty($artists_data)): ?>
            <div class="hd-artist-nav-wrap">
                <div class="hd-artist-nav-list">
                    <?php foreach ($artists_data as $artist): ?>
                        <a href="#<?php echo esc_attr($artist['slug']); ?>" class="hd-nav-pill">
                            <span><?php echo esc_html($artist['name']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Original Gallery / Featured Studio Work (If Present in WP) -->
    <?php
    $args = array(
        'post_type' => 'work',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $work_query = new WP_Query($args);
    if ($work_query->have_posts()) :
    ?>
        <section id="featured-studio-work" class="artist-section">
            <div class="hd-section-header">
                <div class="hd-section-title-wrap">
                    <h2 class="artist-heading">Featured Work</h2>
                    <span class="hd-count-badge"><?php echo esc_html($work_query->found_posts); ?> Pieces</span>
                </div>
                <div class="hd-swiper-nav-controls">
                    <button class="hd-nav-btn hd-prev-featured" aria-label="Previous">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    </button>
                    <button class="hd-nav-btn hd-next-featured" aria-label="Next">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                </div>
            </div>

            <div class="work_wrapper">
                <div class="swiper work_slider featured-work-slider">
                    <div class="swiper-wrapper work_data_wrapper">
                        <?php
                        $count = 1;
                        while ($work_query->have_posts()) : $work_query->the_post();
                            $featured_img_id = get_post_thumbnail_id(get_the_ID());
                            $featured_img_full = wp_get_attachment_image_url($featured_img_id, 'full');
                            ?>
                            <div class="swiper-slide work_data">
                                <a data-fancybox="gallery-featured" href="<?php echo esc_url($featured_img_full); ?>" class="hd-artwork-card" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php
                                    echo wp_get_attachment_image($featured_img_id, 'medium_large', false, array(
                                        'alt' => get_the_title(),
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                        'sizes' => '(max-width: 767px) 80vw, (max-width: 1024px) 40vw, 30vw'
                                    ));
                                    ?>
                                    <div class="hd-artwork-overlay">
                                        <div class="hd-zoom-icon-badge">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                            $count++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Artist Sections (Grouped by Artist from Contentful) -->
    <?php if (!empty($artists_data)): ?>
        <?php foreach ($artists_data as $artist): ?>
            <section id="<?php echo esc_attr($artist['slug']); ?>" class="artist-section">
                <div class="hd-section-header">
                    <div class="hd-section-title-wrap">
                        <h2 class="artist-heading"><?php echo esc_html($artist['name']); ?></h2>
                        <span class="hd-count-badge"><?php echo count($artist['images']); ?> Pieces</span>
                    </div>
                    <div class="hd-swiper-nav-controls">
                        <button class="hd-nav-btn hd-prev-<?php echo esc_attr($artist['slug']); ?>" aria-label="Previous">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        </button>
                        <button class="hd-nav-btn hd-next-<?php echo esc_attr($artist['slug']); ?>" aria-label="Next">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="work_wrapper">
                    <div class="swiper work_slider artist-slider-<?php echo esc_attr($artist['slug']); ?>" data-artist="<?php echo esc_attr($artist['slug']); ?>">
                        <div class="swiper-wrapper work_data_wrapper">
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
                                    'w' => 900,
                                    'h' => 1100,
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
                                <div class="swiper-slide work_data">
                                    <a data-fancybox="gallery-<?php echo esc_attr($artist['slug']); ?>" href="<?php echo esc_url($img_full); ?>" class="hd-artwork-card" aria-label="<?php echo esc_attr($img_alt); ?>">
                                        <img
                                            src="<?php echo esc_url($img_src); ?>"
                                            srcset="<?php echo esc_attr($img_srcset); ?>"
                                            sizes="(max-width: 767px) 80vw, (max-width: 1024px) 40vw, 30vw"
                                            alt="<?php echo esc_attr($img_alt); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                        <div class="hd-artwork-overlay">
                                            <div class="hd-zoom-icon-badge">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                                $count++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>

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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

        // Initialize Featured Work Slider if present
        if (document.querySelector('.featured-work-slider')) {
            new Swiper('.featured-work-slider', {
                slidesPerView: 'auto',
                spaceBetween: 18,
                grabCursor: true,
                freeMode: false,
                navigation: {
                    nextEl: '.hd-next-featured',
                    prevEl: '.hd-prev-featured',
                },
                mousewheel: {
                    forceToAxis: true,
                    sensitivity: 1,
                },
                breakpoints: {
                    320: {
                        spaceBetween: 14,
                    },
                    768: {
                        spaceBetween: 18,
                    },
                    1024: {
                        spaceBetween: 22,
                    }
                }
            });
        }

        // Initialize Each Artist Swiper Slider
        document.querySelectorAll('.work_slider[data-artist]').forEach(function(slider) {
            const slug = slider.getAttribute('data-artist');
            new Swiper(slider, {
                slidesPerView: 'auto',
                spaceBetween: 18,
                grabCursor: true,
                freeMode: false,
                navigation: {
                    nextEl: '.hd-next-' + slug,
                    prevEl: '.hd-prev-' + slug,
                },
                mousewheel: {
                    forceToAxis: true,
                    sensitivity: 1,
                },
                breakpoints: {
                    320: {
                        spaceBetween: 14,
                    },
                    768: {
                        spaceBetween: 18,
                    },
                    1024: {
                        spaceBetween: 22,
                    }
                }
            });
        });

        // Smooth Anchor Click and Hash Navigation
        document.querySelectorAll('.hd-nav-pill').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId.startsWith('#')) {
                    const targetEl = document.querySelector(targetId);
                    if (targetEl) {
                        e.preventDefault();
                        targetEl.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });

        if (window.location.hash) {
            const targetSection = document.querySelector(window.location.hash);
            if (targetSection) {
                setTimeout(function() {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }, 200);
            }
        }
    });
</script>

<?php 
get_footer();
?>