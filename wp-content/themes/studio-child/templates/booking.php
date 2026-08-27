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

    /* Standalone booking page styles - make modal appear inline */
    .standalone-booking-page {
        position: relative;
        min-height: 100vh;
        overflow: visible;
        padding: 60px 20px 80px;
        margin-top: 80px;
    }

    @media (max-width: 768px) {
        .standalone-booking-page {
            margin-top: 20px;
            padding: 40px 16px 100px;
        }
    }

    .standalone-booking-wrapper .pt-modal-overlay {
        position: static !important;
        display: block !important;
        background: transparent !important;
        padding: 0 !important;
        overflow-y: visible !important;
    }

    .standalone-booking-wrapper .pt-modal-container {
        max-width: 900px !important;
        margin: 0 auto !important;
        max-height: none !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
        position: static !important;
    }

    /* Hide close button on standalone page */
    .standalone-booking-wrapper .pt-close-btn {
        display: none !important;
    }

    .standalone-booking-wrapper .pt-modal-overlay.pt-modal-open {
        position: static !important;
        background: transparent !important;
    }

    /* Exception: Body selection overlay should still be a fixed fullscreen modal */
    .standalone-booking-wrapper .pt-body-overlay {
        position: fixed !important;
        inset: 0 !important;
        background: rgba(0, 0, 0, 0.95) !important;
        z-index: 9999 !important;
    }

    /* First step width on standalone page */
    .standalone-booking-wrapper .pt-modal-overlay.pt-modal-open .pt-form-fields-step1 {
        width: 500px !important;
        max-width: 100% !important;
    }

    /* Mobile: 100% width and padding adjustments */
    @media (max-width: 768px) {
        .standalone-booking-wrapper .pt-modal-overlay.pt-modal-open .pt-form-fields-step1 {
            width: 100% !important;
        }

        /* Add padding at bottom of form to prevent footer overlap */
        .standalone-booking-wrapper .pt-form-fields,
        .standalone-booking-wrapper .pt-form-fields-step1 {
            padding-bottom: 40px;
        }
    }
</style>

<div class="standalone-booking-page">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center; margin-bottom: 20px;">
        <?php if ($artist_name): ?>
            <h1 style="font-size: 48px; margin-bottom: 20px; color: #1a1a1a;">Book with <?php echo esc_html($artist_name); ?></h1>
            <p style="font-size: 18px; color: #666; margin-bottom: 20px;">Fill out the form below to request an appointment</p>
        <?php else: ?>
            <h1 style="font-size: 48px; margin-bottom: 20px; color: #1a1a1a;">Book Your Tattoo Appointment</h1>
            <p style="font-size: 18px; color: #666; margin-bottom: 20px;">Fill out the form below to schedule your session</p>
        <?php endif; ?>
    </div>
    
    <!-- Inline booking form - wrapper class for standalone styling -->
    <div class="standalone-booking-wrapper">
        <?php
        // Include the reusable booking modal template part in inline mode
        // Pass artist data if available from URL parameters
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
