<?php
/*
Template Name: Temp Landing Page
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> &mdash; Skin Art For Those Who Only Accept The Best In Life</title>
    <meta name="description" content="Tattoo Panda Studio - Premier luxury custom skin art for tastemakers and those who accept only the best. Currently accepting new clients.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>

    <style>
        @font-face {
            font-family: 'neue_montreal';
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-bold-webfont.woff2') format('woff2'),
                 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-bold-webfont.woff') format('woff');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'neue_montreal';
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-medium-webfont.woff2') format('woff2'),
                 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-medium-webfont.woff') format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'neue_montreal';
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-regular-webfont.woff2') format('woff2'),
                 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-regular-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'neue_montreal';
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-light-webfont.woff2') format('woff2'),
                 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/neuemontreal-light-webfont.woff') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --bg-color: #000000;
            --text-primary: #FFFFFF;
            --text-secondary: #E5E5E5;
            --text-muted: #888888;
            --accent-red: #FF2222;
            --card-bg: #FFFFFF;
            --card-text: #000000;
            --font-main: 'neue_montreal', 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            --font-display: 'neue_montreal', 'Space Grotesk', 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        html, body {
            width: 100%;
            min-height: 100%;
            background-color: var(--bg-color);
            color: var(--text-primary);
            font-family: var(--font-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            background: radial-gradient(circle at 50% 15%, #0f0f0f 0%, #000000 70%);
            position: relative;
        }

        /* Hide conflicting header/loader from parent theme on this template */
        .page-loader-wrapper,
        #page-loader,
        .studio_logo_animate,
        body > header:not(.tp-temp-header) {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* Ambient Desktop Background Glow */
        .ambient-glow {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            width: 900px;
            height: 900px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.025) 0%, transparent 65%);
            pointer-events: none;
            z-index: 1;
        }

        /* Full Viewport Container */
        .page-viewport {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 24px 20px 24px;
            position: relative;
            z-index: 10;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .page-viewport {
                padding: 36px 48px 30px;
                max-width: 1400px;
            }
        }

        @media (min-width: 1200px) {
            .page-viewport {
                padding: 42px 70px 34px;
                max-width: 1600px;
            }
        }

        /* Top Header Navigation */
        .tp-temp-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 20;
        }

        .header-left-meta {
            display: none;
            font-size: 11.5px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
            flex: 1;
        }

        @media (min-width: 992px) {
            .header-left-meta {
                display: block;
            }
        }

        .header-logo-center {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: transform 0.25s ease, opacity 0.25s ease;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .header-logo-center:hover {
            transform: translateX(-50%) scale(1.06);
            opacity: 0.9;
        }

        .header-panda-icon {
            height: 38px;
            width: auto;
            max-width: 48px;
            object-fit: contain;
            filter: drop-shadow(0 2px 10px rgba(255, 255, 255, 0.15));
        }

        @media (min-width: 768px) {
            .header-panda-icon {
                height: 46px;
                max-width: 56px;
            }
        }

        @media (min-width: 1200px) {
            .header-panda-icon {
                height: 52px;
                max-width: 64px;
            }
        }

        .header-right-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 28px;
            flex: 1;
        }

        .desktop-nav-links {
            display: none;
            list-style: none;
            gap: 26px;
            align-items: center;
        }

        @media (min-width: 992px) {
            .desktop-nav-links {
                display: flex;
            }
        }

        .desktop-nav-links a {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            transition: color 0.2s ease;
            cursor: pointer;
        }

        .desktop-nav-links a:hover {
            color: #FFFFFF;
        }

        /* Hamburger Toggle Button */
        .menu-toggle-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
            gap: 5px;
            z-index: 30;
            transition: opacity 0.2s ease;
        }

        .menu-toggle-btn:hover {
            opacity: 0.75;
        }

        .menu-toggle-btn span {
            display: block;
            height: 2px;
            background-color: #FFFFFF;
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .menu-toggle-btn span:nth-child(1) { width: 22px; }
        .menu-toggle-btn span:nth-child(2) { width: 22px; }
        .menu-toggle-btn span:nth-child(3) { width: 22px; }

        @media (min-width: 768px) {
            .menu-toggle-btn span:nth-child(1) { width: 26px; }
            .menu-toggle-btn span:nth-child(2) { width: 26px; }
            .menu-toggle-btn span:nth-child(3) { width: 26px; }
        }

        .menu-toggle-btn.is-active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }
        .menu-toggle-btn.is-active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-10px);
        }
        .menu-toggle-btn.is-active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* Central Content Flow */
        .page-content-flow {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin: auto 0;
            padding: 24px 0;
            gap: 22px;
            max-width: 1100px;
        }

        @media (min-width: 768px) {
            .page-content-flow {
                gap: 28px;
                padding: 36px 0;
            }
        }

        @media (min-width: 1200px) {
            .page-content-flow {
                gap: 32px;
                padding: 44px 0;
            }
        }

        /* Hero Manifesto */
        .manifesto-section {
            width: 100%;
            max-width: 960px;
            padding: 0 10px;
        }

        .manifesto-title {
            font-family: var(--font-display);
            font-size: clamp(22px, 5.2vw, 54px);
            font-weight: 500;
            line-height: 1.25;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #FFFFFF;
            text-align: center;
            text-wrap: balance;
        }

        @media (min-width: 768px) {
            .manifesto-title {
                line-height: 1.22;
                letter-spacing: 0.06em;
            }
        }

        @media (min-width: 1200px) {
            .manifesto-title {
                font-size: 56px;
                line-height: 1.18;
                letter-spacing: 0.07em;
            }
        }

        /* Status & Dynamic Live Time Bar */
        .status-time-bar {
            width: 100%;
            max-width: 360px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            position: relative;
            font-size: 14px;
            letter-spacing: 0.04em;
        }

        @media (min-width: 768px) {
            .status-time-bar {
                max-width: 480px;
                padding: 12px 20px;
                font-size: 15px;
            }
        }

        @media (min-width: 1200px) {
            .status-time-bar {
                max-width: 540px;
                padding: 14px 26px;
                font-size: 16px;
            }
        }

        .status-time-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.16) 15%, rgba(255, 255, 255, 0.16) 85%, transparent);
        }

        .status-time-bar::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.16) 15%, rgba(255, 255, 255, 0.16) 85%, transparent);
        }

        .live-clock {
            font-family: var(--font-display);
            font-weight: 400;
            color: #E0E0E0;
            letter-spacing: 0.04em;
        }

        .studio-status-wrap {
            font-weight: 500;
            letter-spacing: 0.06em;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .studio-status-badge {
            color: var(--accent-red);
            font-weight: 700;
            letter-spacing: 0.08em;
            text-shadow: 0 0 14px rgba(255, 34, 34, 0.5);
            animation: pulse-glow 3s infinite ease-in-out;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 1; text-shadow: 0 0 10px rgba(255, 34, 34, 0.4); }
            50% { opacity: 0.85; text-shadow: 0 0 18px rgba(255, 34, 34, 0.75); }
        }

        /* Brand Logotype Center Group */
        .brand-center-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
            width: 100%;
            max-width: 600px;
        }

        @media (min-width: 768px) {
            .brand-center-group {
                gap: 20px;
            }
        }

        @media (min-width: 1200px) {
            .brand-center-group {
                gap: 24px;
            }
        }

        .brand-wordmark-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            user-select: none;
        }

        .brand-wordmark-img {
            max-width: 230px;
            width: 85%;
            height: auto;
            filter: brightness(1) invert(0);
        }

        @media (min-width: 768px) {
            .brand-wordmark-img {
                max-width: 300px;
            }
        }

        @media (min-width: 1200px) {
            .brand-wordmark-img {
                max-width: 340px;
            }
        }

        .brand-typography-fallback {
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1;
        }

        .brand-typo-panda {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 0.46em;
            color: #FFFFFF;
            text-indent: 0.46em;
            font-family: var(--font-display);
        }

        .brand-typo-tattoo {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.68em;
            color: #E0E0E0;
            text-indent: 0.68em;
            margin-top: 8px;
            font-family: var(--font-display);
        }

        @media (min-width: 768px) {
            .brand-typo-panda { font-size: 42px; }
            .brand-typo-tattoo { font-size: 20px; }
        }

        /* Subtext Notice */
        .client-acceptance-notice {
            font-size: clamp(16px, 2vw, 20px);
            font-weight: 400;
            line-height: 1.45;
            color: var(--text-secondary);
            text-align: center;
            letter-spacing: 0.02em;
        }

        /* Action Button */
        .cta-action-container {
            margin-top: 4px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .btn-book-action {
            background-color: #FFFFFF;
            color: #000000;
            font-family: var(--font-main);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 13px 32px;
            border-radius: 1px;
            border: 1px solid #FFFFFF;
            display: inline-block;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.15);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .btn-book-action {
                font-size: 14px;
                padding: 15px 42px;
                letter-spacing: 0.16em;
            }
        }

        .btn-book-action:hover {
            background-color: transparent;
            color: #FFFFFF;
            border-color: #FFFFFF;
            box-shadow: 0 0 32px rgba(255, 255, 255, 0.35);
            transform: translateY(-2px);
        }

        .btn-book-action:active {
            transform: translateY(0);
        }

        /* Bottom Section Container */
        .bottom-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
            position: relative;
            z-index: 20;
        }

        @media (min-width: 768px) {
            .bottom-section {
                gap: 22px;
            }
        }

        /* Bottom Signature Card */
        .bottom-signature-card {
            background-color: var(--card-bg);
            color: var(--card-text);
            width: 250px;
            max-width: 85%;
            padding: 20px 22px 14px;
            border-radius: 2px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        @media (min-width: 768px) {
            .bottom-signature-card {
                width: 270px;
                padding: 22px 26px 15px;
            }
        }

        .bottom-signature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.8), 0 0 25px rgba(255, 255, 255, 0.15);
        }

        .card-logo-heading {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 0.44em;
            text-indent: 0.44em;
            color: #000000;
            font-family: var(--font-display);
            line-height: 1.1;
        }

        @media (min-width: 768px) {
            .card-logo-heading {
                font-size: 28px;
            }
        }

        .card-year-copyright {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            color: #222222;
            margin-top: 12px;
            font-family: var(--font-main);
        }

        /* Pagination Indicators */
        .pagination-indicator-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 4px 0 2px;
        }

        @media (min-width: 768px) {
            .pagination-indicator-row {
                gap: 10px;
            }
        }

        .page-dot {
            width: 5.5px;
            height: 5.5px;
            border-radius: 50%;
            background-color: #FFFFFF;
            opacity: 0.28;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @media (min-width: 768px) {
            .page-dot {
                width: 6.5px;
                height: 6.5px;
            }
        }

        .page-dot:hover {
            opacity: 0.65;
            transform: scale(1.25);
        }

        .page-dot.is-active {
            opacity: 1;
            transform: scale(1.35);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        }

        /* Offcanvas Luxury Drawer Menu */
        .offcanvas-drawer {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            max-width: 380px;
            height: 100%;
            background: rgba(8, 8, 8, 0.96);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            z-index: 100;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px 32px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: -20px 0 60px rgba(0, 0, 0, 0.9);
        }

        .offcanvas-drawer.is-open {
            right: 0;
        }

        .drawer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 90;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.35s ease;
        }

        .drawer-overlay.is-visible {
            opacity: 1;
            pointer-events: auto;
        }

        .drawer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .drawer-brand {
            font-size: 14px;
            letter-spacing: 0.25em;
            font-weight: 700;
            color: #FFFFFF;
        }

        .drawer-close-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #FFFFFF;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .drawer-close-btn:hover {
            background: #FFFFFF;
            color: #000000;
            transform: rotate(90deg);
        }

        .drawer-nav-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: 40px 0;
        }

        .drawer-nav-list a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            display: inline-block;
            transition: all 0.2s ease;
            position: relative;
            padding-left: 0;
            cursor: pointer;
        }

        .drawer-nav-list a:hover {
            color: #FFFFFF;
            padding-left: 12px;
            opacity: 0.85;
        }

        .drawer-footer {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .drawer-footer a {
            color: #FFFFFF;
            text-decoration: none;
            transition: opacity 0.2s ease;
        }

        .drawer-footer a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body <?php body_class(); ?>>

    <div class="ambient-glow"></div>

    <!-- Main Viewport -->
    <main class="page-viewport" id="page-viewport">

        <!-- Top Header Navigation -->
        <header class="tp-temp-header">
            
            <div class="header-left-meta">
                NEW YORK &bull; MIAMI &bull; LOS ANGELES
            </div>

            <a href="<?php echo home_url('/'); ?>" class="header-logo-center" aria-label="Tattoo Panda Home">
                <img src="https://tattoopanda.com/wp-content/uploads/2025/05/panda-icon-bone-white-scaled.png" 
                     alt="Tattoo Panda" 
                     class="header-panda-icon"
                     onerror="this.style.display='none'; document.getElementById('header-panda-svg').style.display='block';">
                
                <!-- High-detail SVG Fallback -->
                <svg id="header-panda-svg" style="display: none; width:46px; height:40px; fill:#FFFFFF;" viewBox="0 0 100 80">
                    <path d="M28,15 C23,15 18,20 18,26 C18,31 22,35 27,35 C28,35 29,35 30,34.5 C30,36 30,38 31,40 C28,42 22,46 22,54 C22,62 28,68 36,68 C39,68 42,67 44,65 C47,68 53,70 60,70 C72,70 82,60 82,48 C82,38 75,30 65,28 C64,23 59,18 53,18 C48,18 44,21 42,25 C38,20 33,15 28,15 Z M28,21 C31,21 33,23 33,26 C33,29 31,31 28,31 C25,31 23,29 23,26 C23,23 25,21 28,21 Z M53,24 C55,24 57,26 57,28 C57,30 55,32 53,32 C51,32 49,30 49,28 C49,26 51,24 53,24 Z M42,46 C45,46 47,48 47,51 C47,54 45,56 42,56 C39,56 37,54 37,51 C37,48 39,46 42,46 Z M64,46 C67,46 69,48 69,51 C69,54 67,56 64,56 C61,56 59,54 59,51 C59,48 61,46 64,46 Z"/>
                </svg>
            </a>

            <div class="header-right-actions">
                <nav class="desktop-nav-links">
                    <a href="<?php echo home_url('/artists/'); ?>">Artists</a>
                    <a href="<?php echo home_url('/work/'); ?>">Portfolio</a>
                    <a href="javascript:void(0)" onclick="triggerDefaultBookingModal()" id="desktop-booking-btn">Booking</a>
                    <a href="<?php echo home_url('/contact/'); ?>">Contact</a>
                </nav>

                <!-- Hamburger Button -->
                <button class="menu-toggle-btn" id="menu-toggle-btn" aria-label="Open Navigation Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

        </header>

        <!-- Central Content Flow -->
        <div class="page-content-flow">
            
            <!-- Hero Manifesto -->
            <section class="manifesto-section">
                <h1 class="manifesto-title">
                    SKIN ART<br>
                    FOR THOSE WHO<br>
                    ONLY ACCEPT THE<br>
                    BEST IN LIFE
                </h1>
            </section>

            <!-- Status & Dynamic Live Time Bar -->
            <div class="status-time-bar">
                <span class="live-clock" id="live-clock">--:-- --</span>
                <div class="studio-status-wrap">
                    <span>STUDIO:</span>
                    <span class="studio-status-badge" id="studio-status-badge">CLOSED</span>
                </div>
            </div>

            <!-- Brand Center Group -->
            <div class="brand-center-group">
                <div class="brand-wordmark-container">
                    <img src="https://tattoopanda.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" 
                         alt="PANDA TATTOO" 
                         class="brand-wordmark-img"
                         onerror="this.style.display='none'; document.getElementById('brand-wordmark-fallback').style.display='flex';">
                    
                    <div id="brand-wordmark-fallback" class="brand-typography-fallback" style="display: none;">
                        <span class="brand-typo-panda">PANDA</span>
                        <span class="brand-typo-tattoo">TATTOO</span>
                    </div>
                </div>

                <p class="client-acceptance-notice">
                    We are currently<br>
                    accepting new clients
                </p>

                <!-- Book Appointment Action (Dispatches default booking modal) -->
                <div class="cta-action-container">
                    <button type="button" 
                            class="btn-book-action" 
                            id="btn-open-booking" 
                            onclick="triggerDefaultBookingModal()">
                        BOOK APPOINTMENT
                    </button>
                </div>
            </div>

        </div>

        <!-- Bottom Section -->
        <footer class="bottom-section">
            
            <!-- Brand Badge Card -->
            <div class="bottom-signature-card">
                <div class="card-logo-heading">PANDA</div>
                <div class="card-year-copyright">&copy; <?php echo date('Y'); ?></div>
            </div>

            <!-- Pagination Indicators -->
            <div class="pagination-indicator-row" id="pagination-dots" role="tablist">
                <span class="page-dot" data-index="0"></span>
                <span class="page-dot" data-index="1"></span>
                <span class="page-dot" data-index="2"></span>
                <span class="page-dot" data-index="3"></span>
                <span class="page-dot is-active" data-index="4"></span>
                <span class="page-dot" data-index="5"></span>
                <span class="page-dot" data-index="6"></span>
                <span class="page-dot" data-index="7"></span>
                <span class="page-dot" data-index="8"></span>
                <span class="page-dot" data-index="9"></span>
            </div>

        </footer>

    </main>

    <!-- Offcanvas Overlay -->
    <div class="drawer-overlay" id="drawer-overlay"></div>

    <!-- Offcanvas Menu Drawer -->
    <aside class="offcanvas-drawer" id="offcanvas-drawer" aria-label="Navigation Menu">
        <div class="drawer-header">
            <span class="drawer-brand">TATTOO PANDA</span>
            <button class="drawer-close-btn" id="drawer-close-btn" aria-label="Close Navigation Menu">&times;</button>
        </div>

        <ul class="drawer-nav-list">
            <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/artists/'); ?>">Artists</a></li>
            <li><a href="<?php echo home_url('/work/'); ?>">Portfolio</a></li>
            <li><a href="<?php echo home_url('/gear/'); ?>">Gear & Apparel</a></li>
            <li><a href="javascript:void(0)" onclick="closeMenu(); triggerDefaultBookingModal();" id="drawer-booking-link">Book Appointment</a></li>
            <li><a href="<?php echo home_url('/contact/'); ?>">Contact Studio</a></li>
        </ul>

        <div class="drawer-footer">
            <p>New York &bull; Miami &bull; Los Angeles</p>
            <p><a href="https://instagram.com/tattoopandaofficial" target="_blank" rel="noopener">Instagram: @tattoopandaofficial</a></p>
            <p>&copy; <?php echo date('Y'); ?> Tattoo Panda Studio. All rights reserved.</p>
        </div>
    </aside>

    <!-- Default Theme Booking Modal Part -->
    <?php get_template_part('template-parts/booking-modal'); ?>

    <!-- Interactive Scripts -->
    <script>
        // Trigger Default Booking Modal (Alpine.js dispatch & custom event)
        function triggerDefaultBookingModal() {
            window.dispatchEvent(new CustomEvent('open-booking-modal'));
        }

        // Dynamic Live Clock
        function updateLiveClock() {
            const clockEl = document.getElementById('live-clock');
            if (!clockEl) return;
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12;
            clockEl.textContent = `${hours}:${minutes} ${ampm}`;
        }
        updateLiveClock();
        setInterval(updateLiveClock, 1000);

        // Offcanvas Menu Controls
        const menuToggleBtn = document.getElementById('menu-toggle-btn');
        const offcanvasDrawer = document.getElementById('offcanvas-drawer');
        const drawerOverlay = document.getElementById('drawer-overlay');
        const drawerCloseBtn = document.getElementById('drawer-close-btn');

        function openMenu() {
            offcanvasDrawer.classList.add('is-open');
            drawerOverlay.classList.add('is-visible');
            menuToggleBtn.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            offcanvasDrawer.classList.remove('is-open');
            drawerOverlay.classList.remove('is-visible');
            menuToggleBtn.classList.remove('is-active');
            document.body.style.overflow = '';
        }

        menuToggleBtn.addEventListener('click', () => {
            if (offcanvasDrawer.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        drawerCloseBtn.addEventListener('click', closeMenu);
        drawerOverlay.addEventListener('click', closeMenu);

        // Pagination Dots Interactivity
        const dots = document.querySelectorAll('.page-dot');
        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                dots.forEach(d => d.classList.remove('is-active'));
                this.classList.add('is-active');
            });
        });

        // Escape Key Listener
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
