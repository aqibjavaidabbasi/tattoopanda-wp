<?php 
/* Template Name: Contact */
get_header();
?>

<style>
    /* ========================================
       GLOBAL SCROLL OVERRIDE FOR CONTACT PAGE
       ======================================== */
    html,
    body,
    #page,
    .site-content,
    .main_layout {
        height: auto !important;
        min-height: 100vh !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
        position: static !important;
        background-color: #000000 !important;
    }

    /* ========================================
       CONTACT PAGE - TATU PANDA DESIGN SYSTEM
       ======================================== */
    .hd-contact-page {
        background-color: #000000;
        color: #ffffff;
        min-height: 100vh;
        height: auto !important;
        padding: 110px 24px 120px;
        box-sizing: border-box;
        font-family: inherit;
        position: relative;
        overflow-y: visible !important;
        overflow-x: hidden !important;
    }

    .hd-contact-container {
        max-width: 1240px;
        margin: 0 auto;
        width: 100%;
    }

    /* Top Hero Header */
    .hd-contact-hero {
        text-align: center;
        margin-bottom: 48px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
    }

    .hd-contact-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.7);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        padding: 5px 14px;
        border-radius: 999px;
    }

    .hd-contact-title {
        font-size: clamp(28px, 5vw, 48px);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.1;
        margin: 0;
        text-transform: uppercase;
        color: #ffffff;
    }

    .hd-contact-subtitle {
        font-size: clamp(14px, 1.8vw, 16px);
        color: rgba(255, 255, 255, 0.65);
        max-width: 620px;
        line-height: 1.5;
        margin: 0;
    }

    /* Live Studio Time Bar */
    .hd-contact-status-bar {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 999px;
        padding: 6px 18px;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.75);
        margin-top: 6px;
    }

    .hd-status-pulse {
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background-color: #22c55e;
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.6);
        animation: pulseStatus 2s infinite ease-in-out;
    }

    @keyframes pulseStatus {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(0.85); }
    }

    /* Main Content Grid */
    .hd-contact-grid {
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 40px;
        align-items: start;
    }

    /* Left Column: Info & Media Cards */
    .hd-contact-left {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .hd-contact-cards-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .hd-contact-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        transition: transform 0.25s ease, border-color 0.25s ease;
    }

    .hd-contact-card:hover {
        transform: translateY(-3px);
        border-color: rgba(255, 255, 255, 0.25);
    }

    .hd-contact-card.is-fullwidth {
        grid-column: 1 / -1;
    }

    .hd-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .hd-card-tag {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
    }

    .hd-card-icon {
        color: rgba(255, 255, 255, 0.6);
    }

    .hd-card-value {
        font-size: 15px;
        font-weight: 600;
        color: #ffffff;
        line-height: 1.4;
        margin: 0 0 10px 0;
    }

    .hd-card-link {
        color: #ffffff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.03em;
        opacity: 0.85;
        transition: opacity 0.2s ease;
    }

    .hd-card-link:hover {
        opacity: 1;
        text-decoration: underline;
    }

    .hd-badge-open {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #22c55e;
        background: rgba(34, 197, 94, 0.12);
        border: 1px solid rgba(34, 197, 94, 0.3);
        padding: 3px 10px;
        border-radius: 999px;
    }

    /* Social Links Styling */
    .hd-social-links-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        margin-top: 4px;
    }

    .hd-social-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 999px;
        padding: 8px 16px;
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        letter-spacing: 0.03em;
        transition: background 0.2s ease, transform 0.2s ease, border-color 0.2s ease;
    }

    .hd-social-pill:hover {
        background: rgba(255, 255, 255, 0.14);
        border-color: rgba(255, 255, 255, 0.35);
        transform: translateY(-2px);
        color: #ffffff !important;
    }

    .hd-custom-contact-info {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.75);
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .hd-custom-contact-info a {
        color: #ffffff;
        text-decoration: underline;
    }

    .hd-custom-contact-info ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .hd-custom-contact-info li {
        margin: 0;
    }

    /* Studio Visual Accent Card */
    .hd-contact-visual-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .hd-contact-visual-img-wrap {
        width: 100%;
        max-height: 280px;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 16px;
    }

    .hd-contact-visual-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: grayscale(100%);
        transition: transform 0.6s ease;
    }

    .hd-contact-visual-card:hover .hd-contact-visual-img {
        transform: scale(1.03);
    }

    .hd-contact-visual-logo {
        height: 38px;
        width: auto;
        max-width: 80%;
        filter: brightness(0) invert(1);
        display: block;
        margin: 4px 0 0;
    }

    /* Right Column: Form Card */
    .hd-contact-right {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 32px;
        box-sizing: border-box;
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
    }

    .hd-form-header {
        margin-bottom: 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 16px;
    }

    .hd-form-title {
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #ffffff;
        margin: 0 0 6px 0;
    }

    .hd-form-subtitle {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.55);
        margin: 0;
        line-height: 1.4;
    }

    .hd-contact-iframe-wrap {
        width: 100%;
        min-height: 580px;
        position: relative;
    }

    .hd-contact-iframe-wrap iframe {
        width: 100% !important;
        border: none !important;
        border-radius: 8px !important;
        background: transparent !important;
    }

    /* Optional VAT / Business profile */
    .hd-contact-vat {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.4);
        margin-top: 16px;
        text-align: center;
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
        .hd-contact-page {
            padding: 85px 16px 110px !important;
        }

        .hd-contact-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .hd-contact-cards-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .hd-contact-right {
            padding: 20px 16px;
            border-radius: 16px;
        }

        .hd-contact-visual-card {
            padding: 16px;
        }

        .hd-contact-visual-img-wrap {
            max-height: 220px;
        }

        .artist-section-cta-fixed {
            bottom: 16px !important;
        }

        .artist-section-cta-fixed .ghl-booking-btn,
        .artist-section-cta-fixed .button {
            padding: 13px 24px !important;
            font-size: 12px !important;
            width: auto !important;
            max-width: 320px !important;
        }
    }
</style>

<div class="hd-contact-page">
    <div class="hd-contact-container">

        <!-- Top Hero Section -->
        <div class="hd-contact-hero">
            <h1 class="hd-contact-title">Contact</h1>
        </div>

        <!-- Main Grid Layout -->
        <div class="hd-contact-grid">

            <!-- Left Column: Info & Visual Cards -->
            <div class="hd-contact-left">
                <div class="hd-contact-cards-grid">
                    
                    <!-- Location Card (Full Width) -->
                    <div class="hd-contact-card is-fullwidth">
                        <div class="hd-card-header">
                            <span class="hd-card-tag">Studio Location</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-card-icon"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <p class="hd-card-value">
                            254 NW 36th St, Miami, FL 33127
                        </p>
                        <a href="https://maps.google.com/?q=254+NW+36th+St,+Miami,+FL+33127" target="_blank" rel="noopener noreferrer" class="hd-card-link" aria-label="Open Google Maps for 254 NW 36th St, Miami, FL 33127">
                            <span>Get Directions on Google Maps</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- Direct Line Card -->
                    <div class="hd-contact-card">
                        <div class="hd-card-header">
                            <span class="hd-card-tag">Direct Line</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-card-icon"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <p class="hd-card-value">
                            <a href="tel:7869199998" class="hd-card-link" style="font-size: 16px;">(786) 919-9998</a>
                        </p>
                        <span style="font-size: 12px; color: rgba(255, 255, 255, 0.5);">Direct calls & text consultations</span>
                    </div>

                    <!-- Studio Hours Card -->
                    <div class="hd-contact-card">
                        <div class="hd-card-header">
                            <span class="hd-card-tag">Hours</span>
                            <span class="hd-badge-open">Open Daily</span>
                        </div>
                        <p class="hd-card-value">
                            Mon &ndash; Sun<br>
                            11:00 AM &ndash; 9:00 PM
                        </p>
                        <span style="font-size: 12px; color: rgba(255, 255, 255, 0.5);">Walk-ins welcome & by appointment</span>
                    </div>

                    <!-- Social Channels Card (Full Width) -->
                    <div class="hd-contact-card is-fullwidth hd-contact-social-card">
                        <div class="hd-card-header">
                            <span class="hd-card-tag">Social Channels</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-card-icon"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                        </div>
                        
                        <?php if (get_field('contact_info')): ?>
                            <div class="hd-custom-contact-info">
                                <?php the_field('contact_info'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="hd-social-links-list">
                            <a href="https://instagram.com/tattoopandaofficial" target="_blank" rel="noopener noreferrer" class="hd-social-pill" aria-label="Instagram @tattoopandaofficial">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
                                <span>Instagram</span>
                            </a>
                            <a href="https://www.facebook.com/tattoopandaofficial/" target="_blank" rel="noopener noreferrer" class="hd-social-pill" aria-label="Facebook">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                <span>Facebook</span>
                            </a>
                            <a href="https://www.tiktok.com/@tattoopandaofficial" target="_blank" rel="noopener noreferrer" class="hd-social-pill" aria-label="TikTok @tattoopandaofficial">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
                                <span>TikTok</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Studio Photo & Brand Accent -->
                <div class="hd-contact-visual-card">
                    <div class="hd-contact-visual-img-wrap">
                        <img src="https://pandatattoo.com/wp-content/uploads/2025/05/Tattoo-Artist-Tatu-Panda-3-1.jpg" alt="Panda Tattoo Studio Miami" class="hd-contact-visual-img" loading="lazy">
                    </div>
                    <img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" alt="PANDA" class="hd-contact-visual-logo" loading="lazy">
                </div>

                <?php if (get_field('vat_info')): ?>
                    <div class="hd-contact-vat">
                        <?php the_field('vat_info'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column: Message Form -->
            <div class="hd-contact-right">
                <div class="hd-form-header">
                    <h2 class="hd-form-title">Send a Message</h2>
                    <p class="hd-form-subtitle">Fill out your inquiry and our team will get back to you promptly.</p>
                </div>

                <div class="hd-contact-iframe-wrap">
                    <iframe
                        src="https://link.smartwebsite360.com/widget/form/B1LLvOARhRLPJ7570tJD"
                        style="width:100%;height:100%;border:none;border-radius:8px"
                        id="inline-B1LLvOARhRLPJ7570tJD" 
                        data-layout="{'id':'INLINE'}"
                        data-trigger-type="alwaysShow"
                        data-trigger-value=""
                        data-activation-type="alwaysActivated"
                        data-activation-value=""
                        data-deactivation-type="neverDeactivate"
                        data-deactivation-value=""
                        data-form-name="Contact Form"
                        data-height="581"
                        data-layout-iframe-id="inline-B1LLvOARhRLPJ7570tJD"
                        data-form-id="B1LLvOARhRLPJ7570tJD"
                        title="Contact Form"
                    >
                    </iframe>
                    <script src="https://link.smartwebsite360.com/js/form_embed.js"></script>
                </div>
            </div>

        </div>
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

<?php get_footer(); ?>