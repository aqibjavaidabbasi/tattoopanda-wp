<?php 
/* Template Name: Gear */
get_header();
?>

<style>
    /* ========================================
       GLOBAL SCROLL OVERRIDE FOR GEAR PAGE
       ======================================== */
    html,
    body,
    #page,
    .site-content,
    .main_layout,
    .hd-gear-page {
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
       GEAR PAGE - MODERN DESIGN SYSTEM
       ======================================== */
    .hd-gear-page {
        padding: 110px 24px 130px;
        box-sizing: border-box;
        font-family: inherit;
        background: #000000;
        position: relative;
    }

    .hd-gear-container {
        max-width: 1240px;
        margin: 0 auto;
        width: 100%;
    }

    /* Top Hero Header */
    .hd-gear-hero {
        text-align: center;
        margin-bottom: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .hd-gear-title {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1;
        margin: 0 0 14px 0;
        text-transform: uppercase;
        color: #ffffff;
    }

    .hd-gear-subtitle {
        font-size: clamp(14px, 1.8vw, 16px);
        color: rgba(255, 255, 255, 0.65);
        max-width: 580px;
        line-height: 1.5;
        margin: 0 0 24px 0;
    }

    /* Category Navigation Pills Bar */
    .hd-gear-nav-wrap {
        width: 100%;
        overflow-x: auto;
        padding: 4px 0 12px;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }

    .hd-gear-nav-wrap::-webkit-scrollbar {
        display: none;
    }

    .hd-gear-nav-list {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 10px;
        min-width: max-content;
        margin: 0 auto;
    }

    .hd-gear-pill {
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

    .hd-gear-pill:hover,
    .hd-gear-pill.active {
        background: #ffffff !important;
        color: #000000 !important;
        border-color: #ffffff !important;
        transform: translateY(-2px);
    }

    /* Category Section */
    .hd-gear-category-section {
        margin-bottom: 60px;
        scroll-margin-top: 110px;
    }

    .hd-gear-category-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hd-gear-category-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .hd-gear-category-title {
        font-size: clamp(20px, 3.2vw, 28px);
        font-weight: 800;
        letter-spacing: -0.01em;
        text-transform: uppercase;
        color: #ffffff;
        margin: 0;
        line-height: 1.1;
    }

    .hd-gear-count-badge {
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

    /* Gear Product Grid */
    .hd-gear-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 22px;
    }

    /* Product Card */
    .hd-gear-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none !important;
        position: relative;
    }

    .hd-gear-card:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6);
    }

    /* Product Image Wrapper */
    .hd-gear-img-wrap {
        width: 100%;
        height: 240px;
        background: rgba(255, 255, 255, 0.02);
        padding: 24px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .hd-gear-img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.5));
    }

    .hd-gear-card:hover .hd-gear-img {
        transform: scale(1.06);
    }

    /* Card Footer & Action Button */
    .hd-gear-card-footer {
        padding: 16px 20px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: rgba(0, 0, 0, 0.3);
    }

    .hd-gear-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        width: 100%;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 999px;
        padding: 10px 18px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #ffffff !important;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }

    .hd-gear-card:hover .hd-gear-btn {
        background: #ffffff;
        color: #000000 !important;
        border-color: #ffffff;
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

    /* Responsive */
    @media (max-width: 991px) {
        .hd-gear-page {
            padding: 85px 16px 110px !important;
        }

        .hd-gear-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }

        .hd-gear-img-wrap {
            height: 190px;
            padding: 16px;
        }

        .hd-gear-category-section {
            margin-bottom: 45px;
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

    @media (max-width: 540px) {
        .hd-gear-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .hd-gear-img-wrap {
            height: 150px;
            padding: 12px;
        }

        .hd-gear-card-footer {
            padding: 12px 14px 14px;
        }

        .hd-gear-btn {
            padding: 8px 12px;
            font-size: 11px;
        }

        .hd-gear-nav-list {
            justify-content: flex-start;
        }
    }
</style>

<div class="hd-gear-page">
    <div class="hd-gear-container">

        <!-- Top Hero Section -->
        <div class="hd-gear-hero">
            <h1 class="hd-gear-title">Gear & Merch</h1>
            <p class="hd-gear-subtitle">
                Official equipment, tattoo supplies, and studio essentials trusted and recommended by Panda Tattoo.
            </p>

            <?php
            // Collect category slugs/titles for quick filter pills
            $categories_nav = [];
            if (function_exists('have_rows') && have_rows('category')):
                while (have_rows('category')): the_row();
                    $title_group = get_sub_field('title');
                    $title_str = isset($title_group['category']) ? $title_group['category'] : (is_string($title_group) ? $title_group : '');
                    if ($title_str) {
                        $categories_nav[] = [
                            'title' => $title_str,
                            'slug' => sanitize_title($title_str)
                        ];
                    }
                endwhile;
                // Reset repeater pointer
                reset_rows();
            endif;
            ?>

            <!-- Horizontal Category Navigation Pills -->
            <?php if (!empty($categories_nav) && count($categories_nav) > 1): ?>
                <div class="hd-gear-nav-wrap">
                    <div class="hd-gear-nav-list">
                        <?php foreach ($categories_nav as $cat): ?>
                            <a href="#<?php echo esc_attr($cat['slug']); ?>" class="hd-gear-pill">
                                <span><?php echo esc_html($cat['title']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Main Categories Loop -->
        <?php
        if (function_exists('have_rows') && have_rows('category')):
            while (have_rows('category')): the_row();
                $category_title_group = get_sub_field('title');
                $category_title = isset($category_title_group['category']) ? $category_title_group['category'] : (is_string($category_title_group) ? $category_title_group : '');
                $category_slug = sanitize_title($category_title);

                $items = [];
                if (isset($category_title_group['data']) && is_array($category_title_group['data'])) {
                    $items = $category_title_group['data'];
                }

                if ($category_title && !empty($items)):
                ?>
                    <section id="<?php echo esc_attr($category_slug); ?>" class="hd-gear-category-section">
                        <div class="hd-gear-category-header">
                            <div class="hd-gear-category-title-wrap">
                                <h2 class="hd-gear-category-title"><?php echo esc_html($category_title); ?></h2>
                                <span class="hd-gear-count-badge"><?php echo count($items); ?> Items</span>
                            </div>
                        </div>

                        <div class="hd-gear-grid">
                            <?php foreach ($items as $item):
                                $image_id = isset($item['image']) ? $item['image'] : 0;
                                $affiliate_link = isset($item['affiliate_link']) ? $item['affiliate_link'] : '';

                                $image_url = '';
                                if ($image_id) {
                                    $img_src_arr = wp_get_attachment_image_src($image_id, 'large');
                                    $image_url = $img_src_arr ? $img_src_arr[0] : '';
                                }

                                if (!$image_url) continue;
                                ?>
                                
                                <div class="hd-gear-card">
                                    <?php if ($affiliate_link): ?>
                                        <a href="<?php echo esc_url($affiliate_link); ?>" target="_blank" rel="noopener noreferrer" class="hd-gear-img-wrap" aria-label="<?php echo esc_attr($category_title); ?>">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_title); ?>" class="hd-gear-img" loading="lazy">
                                        </a>
                                        <div class="hd-gear-card-footer">
                                            <a href="<?php echo esc_url($affiliate_link); ?>" target="_blank" rel="noopener noreferrer" class="hd-gear-btn">
                                                <span>View Product</span>
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"></path><path d="M7 7h10v10"></path></svg>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="hd-gear-img-wrap">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_title); ?>" class="hd-gear-img" loading="lazy">
                                        </div>
                                    <?php endif; ?>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php
                endif;
            endwhile;
        endif;
        ?>

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Smooth Anchor Click Navigation
        document.querySelectorAll('.hd-gear-pill').forEach(function(anchor) {
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