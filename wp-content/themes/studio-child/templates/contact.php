<?php 
/* Template Name: Contact */
get_header();
?>

<style>
    /* ========================================
       CONTACT PAGE - TATU PANDA DESIGN SYSTEM
       ======================================== */
    .hd-contact-page {
        background-color: #000000;
        color: #ffffff;
        min-height: 100vh;
        padding: 100px 24px 80px;
        box-sizing: border-box;
        font-family: inherit;
        position: relative;
        overflow-x: hidden;
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
        gap: 16px;
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

    /* Bottom Fixed Booking Bar for Mobile */
    .hd-fixed-book-bar {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 999;
        background: rgba(5, 5, 5, 0.92);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        padding: 12px 20px;
        justify-content: center;
        align-items: center;
    }

    .hd-fixed-book-btn {
        width: 100%;
        max-width: 380px;
        background: #ffffff !important;
        color: #000000 !important;
        border: none !important;
        border-radius: 999px !important;
        padding: 14px 24px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        letter-spacing: 0.08em !important;
        text-transform: uppercase !important;
        cursor: pointer !important;
        box-shadow: 0 4px 20px rgba(255, 255, 255, 0.25) !important;
        transition: transform 0.2s ease, opacity 0.2s ease !important;
    }

    .hd-fixed-book-btn:active {
        transform: scale(0.97);
    }

    /* Responsive */
    @media (max-width: 991px) {
        .hd-contact-page {
            padding: 80px 16px 95px;
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

        .hd-fixed-book-bar {
            display: flex;
        }
    }
</style>

<div class="hd-contact-page">
    <div class="hd-contact-container">

        <!-- Top Hero Section -->
        <div class="hd-contact-hero">
            <span class="hd-contact-eyebrow">✦ Get in Touch</span>
            <h1 class="hd-contact-title">Contact The Studio</h1>
            <p class="hd-contact-subtitle">
                Have a project in mind, want to schedule a consultation, or have general questions? Reach out to our Miami studio or send us a direct message below.
            </p>

            <!-- Live Status Indicator -->
            <div class="hd-contact-status-bar">
                <span class="hd-status-pulse"></span>
                <span id="contactStudioStatus">Miami, FL &bull; Open Today 11:00 AM &ndash; 9:00 PM</span>
            </div>
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

<!-- Mobile Sticky Book Appointment CTA -->
<div class="hd-fixed-book-bar" x-data>
    <button @click="$dispatch('open-booking-modal')" class="hd-fixed-book-btn ghl-booking-btn" aria-label="Book appointment">
        Book Appointment
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
    // Live Miami Time and Open Status Clock
    function updateContactStatus() {
        try {
            const now = new Date();
            const options = { timeZone: 'America/New_York', hour: '2-digit', minute: '2-digit', hour12: true };
            const miamiTime = new Intl.DateTimeFormat('en-US', options).format(now);
            
            const estDate = new Date(now.toLocaleString("en-US", { timeZone: "America/New_York" }));
            const hours = estDate.getHours();
            const isOpen = (hours >= 11 && hours < 21);
            
            const el = document.getElementById('contactStudioStatus');
            if (el) {
                el.innerHTML = `Miami, FL: ${miamiTime} &bull; ${isOpen ? '<span style="color: #22c55e; font-weight: 600;">Studio is Open (11 AM – 9 PM)</span>' : '<span style="color: rgba(255,255,255,0.6);">Opens at 11:00 AM</span>'}`;
            }
        } catch(e) {}
    }
    updateContactStatus();
    setInterval(updateContactStatus, 30000);
</script>

<?php get_footer(); ?>