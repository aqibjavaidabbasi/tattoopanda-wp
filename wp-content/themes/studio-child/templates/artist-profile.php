<?php
/**
 * Template Name: Artist Profile
 * 
 * Usage: Create pages for each artist using this template.
 * Artist data pulled from Contentful 'artist' content type
 * Matches artist by page slug or ACF field 'artist_slug'
 */
get_header();

// Get artist identifier from page slug or custom field
$page_slug = get_post_field('post_name', get_the_ID());

// Try to get artist slug from ACF field first, fallback to page slug
$artist_slug = get_field('artist_slug') ?: $page_slug;

// Fetch artist from Contentful
$artist = get_contentful_artist_by_slug($artist_slug);

// If no artist found, show error
if (!$artist) {
    echo '<div style="padding: 100px 20px; text-align: center;"><h1>Artist not found</h1><p>The artist profile could not be loaded from Contentful.</p></div>';
    get_footer();
    return;
}

// Extract artist data
$artist_name = $artist['name'];
$artist_id = $artist['id'];
$artist_bio = $artist['bio'] ?: 'Professional tattoo artist at Tattoo Panda Studio.';
$artist_instagram = $artist['instagram_handle'] ?: '';
$profile_picture = $artist['profile_picture'];
$portfolio_images = $artist['portfolio_images'];
?>

<style>
    .artist-profile-page {
        padding-top: 80px;
        min-height: 100vh;
        background: #f8f8f8;
    }

    .artist-header {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        color: white;
        padding: 60px 20px;
        position: relative;
        overflow: hidden;
    }

    .artist-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="%23ff4500" stroke-width="0.5" opacity="0.1"/></svg>');
        background-size: 100px 100px;
        opacity: 0.3;
    }

    .artist-header-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 40px;
        position: relative;
        z-index: 1;
    }

    .artist-avatar {
        flex-shrink: 0;
    }

    .artist-avatar img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ff4500;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .artist-info h1 {
        font-size: 48px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .artist-meta {
        display: flex;
        gap: 30px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .artist-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #ccc;
    }

    .artist-bio {
        font-size: 16px;
        line-height: 1.6;
        max-width: 600px;
        color: #ddd;
    }

    .artist-social {
        margin-top: 20px;
    }

    .artist-social a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        background: rgba(255,255,255,0.1);
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .artist-social a:hover {
        background: #ff4500;
        transform: translateY(-2px);
    }

    /* Portfolio Section */
    .portfolio-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        margin-bottom: 40px;
        color: #1a1a1a;
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .portfolio-item {
        position: relative;
        aspect-ratio: 1;
        overflow: hidden;
        border-radius: 12px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .portfolio-item:hover {
        transform: scale(1.02);
    }

    .portfolio-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .portfolio-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        color: white;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .portfolio-item:hover .portfolio-overlay {
        transform: translateY(0);
    }

    .portfolio-title {
        font-size: 18px;
        font-weight: 600;
    }

    /* Booking Section */
    .booking-section {
        background: white;
        padding: 60px 20px;
    }

    .booking-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .booking-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .booking-header h2 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .booking-header p {
        color: #666;
        font-size: 18px;
    }

    /* Mobile Styles */
    @media (max-width: 768px) {
        .artist-header-content {
            flex-direction: column;
            text-align: center;
        }

        .artist-avatar img {
            width: 150px;
            height: 150px;
        }

        .artist-info h1 {
            font-size: 32px;
        }

        .artist-meta {
            justify-content: center;
        }

        .portfolio-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }

        .section-title {
            font-size: 28px;
        }
    }

    /* Booking Form Styling */
    .artist-booking-form {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
</style>

<div class="artist-profile-page">
    <!-- Artist Header -->
    <div class="artist-header">
        <div class="artist-header-content">
            <div class="artist-avatar">
                <?php if ($profile_picture): ?>
                    <img src="<?php echo esc_url($profile_picture); ?>" alt="<?php echo esc_attr($artist_name); ?>">
                <?php elseif (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                    <img src="https://via.placeholder.com/200x200/ff4500/ffffff?text=<?php echo urlencode(substr($artist_name, 0, 2)); ?>" alt="<?php echo esc_attr($artist_name); ?>">
                <?php endif; ?>
            </div>
            <div class="artist-info">
                <h1><?php echo esc_html($artist_name); ?></h1>
                <div class="artist-meta">
                    <div class="artist-meta-item">
                        <span>Custom Designs</span>
                    </div>
                    <div class="artist-meta-item">
                        <span>Miami, FL</span>
                    </div>
                </div>
                <p class="artist-bio"><?php echo esc_html($artist_bio); ?></p>
                <?php if ($artist_instagram): ?>
                    <div class="artist-social">
                        <a href="https://instagram.com/<?php echo esc_attr($artist_instagram); ?>" target="_blank" rel="noopener">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            @<?php echo esc_html($artist_instagram); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Portfolio Gallery -->
    <div class="portfolio-section">
        <h2 class="section-title">Portfolio</h2>
        <?php if (!empty($portfolio_images)): ?>
            <div class="portfolio-grid">
                <?php foreach ($portfolio_images as $image): ?>
                    <?php 
                    $image_url = is_array($image) ? $image['url'] : $image;
                    $image_alt = is_array($image) && !empty($image['alt']) ? $image['alt'] : $artist_name . ' Portfolio Work';
                    ?>
                    <div class="portfolio-item" data-fancybox="portfolio" href="<?php echo esc_url($image_url); ?>">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        <div class="portfolio-overlay">
                            <div class="portfolio-title">View Work</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p style="text-align: center; color: #666;">Portfolio images coming soon. Check Instagram for latest work!</p>
        <?php endif; ?>
    </div>

    <!-- Booking Section -->
    <div class="booking-section">
        <div class="booking-container">
            <div class="booking-header">
                <h2>Book with <?php echo esc_html($artist_name); ?></h2>
                <p>Schedule your appointment with this artist</p>
            </div>

            <!-- Booking Form -->
            <div class="artist-booking-form">
                <?php
                get_template_part('template-parts/booking-modal', null, [
                    'inline' => true,
                    'artist_id' => $artist_id,
                    'artist_name' => $artist_name,
                    'artist_specific' => true
                ]);
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
