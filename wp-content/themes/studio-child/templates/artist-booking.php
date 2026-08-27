<?php
/* Template Name: Artist Booking Page */
get_header();

// Get artist parameters from URL
$artist_id = isset($_GET['artistId']) ? sanitize_text_field($_GET['artistId']) : '';
$artist_slug = isset($_GET['artist']) ? sanitize_text_field($_GET['artist']) : '';

// Initialize artist variables
$artist_name = '';
$artist_image = '';

$artist = null;
if ($artist_id) {
    // Fetch artist from Contentful by ID
    $artist = get_contentful_artist_by_id($artist_id);
    
    if ($artist && !empty($artist['name'])) {
        $artist_name = $artist['name'];
        $artist_image = $artist['profile_picture'];
    } else {
        $artist = null;
    }
}

if (!$artist && $artist_slug) {
    // Fallback to slug lookup
    $artist = get_contentful_artist_by_slug($artist_slug);
    
    if ($artist) {
        $artist_id = $artist['id'];
        $artist_name = $artist['name'];
        $artist_image = $artist['profile_picture'];
    }
}
?>

<style>
    /* Fix site-content padding issue on booking pages */
    .site-content {
        padding-top: 0 !important;
    }

    /* Hide or fix studio logo overlay that blocks form inputs */
    .studio_logo,
    .studio_logo_animate {
        display: none !important;
        pointer-events: none !important;
    }

    /* Hide page loader on booking page */
    .page-loader-wrapper,
    #page-loader {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }
    
    /* Standalone booking page styles - make modal appear inline */
    .artist-booking-page {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
        padding: 80px 20px 20px 20px;
    }

    @media (max-width: 768px) {
        .artist-booking-page {
            padding-top: 80px;
        }
    }

    .artist-booking-wrapper .pt-modal-overlay {
        position: static !important;
        display: block !important;
        background: transparent !important;
        padding: 0 !important;
        overflow-y: visible !important;
    }

    .artist-booking-wrapper .pt-modal-container {
        max-width: 900px !important;
        margin: 0 auto !important;
        max-height: none !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
        position: static !important;
    }

    .artist-booking-wrapper .pt-close-btn {
        display: block !important;
        position: fixed !important;
        top: 20px !important;
        right: 20px !important;
        z-index: 1000 !important;
        background: rgba(255, 255, 255, 0.9) !important;
        border-radius: 50% !important;
        width: 40px !important;
        height: 40px !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2) !important;
    }

    .artist-booking-wrapper .pt-modal-overlay.pt-modal-open {
        position: static !important;
        background: transparent !important;
    }

    /* Exception: Body selection overlay should still be a fixed fullscreen modal */
    .artist-booking-wrapper .pt-body-overlay {
        position: fixed !important;
        inset: 0 !important;
        background: rgba(0, 0, 0, 0.95) !important;
        z-index: 9999 !important;
    }

    /* First step width on standalone page */
    .artist-booking-wrapper .pt-modal-overlay.pt-modal-open .pt-form-fields-step1 {
        width: 500px !important;
        max-width: 100% !important;
    }

    /* Mobile: 100% width */
    @media (max-width: 768px) {
        .artist-booking-wrapper .pt-modal-overlay.pt-modal-open .pt-form-fields-step1 {
            width: 100% !important;
        }
    }

    /* Artist info header */
    .artist-info-header {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 30px;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 12px;
    }

    .artist-info-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid #ff4500;
    }

    .artist-info-header h1 {
        font-size: 36px;
        margin-bottom: 10px;
        color: #1a1a1a;
    }

    .artist-info-header .artist-style {
        font-size: 18px;
        color: #666;
        margin-bottom: 10px;
    }

    .artist-info-header p {
        font-size: 16px;
        color: #888;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .artist-info-header h1 {
            font-size: 28px;
        }

        .artist-info-header img {
            width: 100px;
            height: 100px;
        }
    }
</style>

<div class="artist-booking-page">
    <?php if ($artist_name): ?>
        <div class="artist-info-header">
            <?php if ($artist_image): ?>
                <img src="<?php echo esc_url($artist_image); ?>" alt="<?php echo esc_attr($artist_name); ?>">
            <?php endif; ?>
            <h1>Book with <?php echo esc_html($artist_name); ?></h1>
            <p>Fill out the form below to request an appointment</p>
        </div>
    <?php else: ?>
        <div style="max-width: 1200px; margin: 0 auto; text-align: center; margin-bottom: 20px;">
            <h1 style="font-size: 48px; margin-bottom: 20px; color: #1a1a1a;">Book Your Tattoo Appointment</h1>
            <p style="font-size: 18px; color: #666; margin-bottom: 20px;">Fill out the form below to schedule your session</p>
        </div>
    <?php endif; ?>

    <!-- Inline booking form - wrapper class for standalone styling -->
    <div class="artist-booking-wrapper">
        <?php
        // Include the reusable booking modal template part in inline mode
        // Pass artist ID to the form
        get_template_part('template-parts/booking-modal', null, [
            'inline'      => true,
            'artist_id'   => $artist_id,
            'artist_name' => $artist_name,
            'artist_slug' => $artist ? ($artist['slug'] ?? '') : ''
        ]);
        ?>
    </div>
</div>

<?php
get_footer();
?>
