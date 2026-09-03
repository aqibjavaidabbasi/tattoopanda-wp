<?php
/* Template Name: Home Dev */
get_header();
?>

<style>
    /* ===============================================================
       DESKTOP LUXURY VERTICAL LAYOUT & MODERN STUDIO EXPERIENCE
       Panda Tattoo Studio — World-Class Desktop Showcase
       =============================================================== */
    @media (min-width: 992px) {
        /* Base & Canvas - Vertical Luxury Scroll */
        html, body {
            overflow-y: auto !important;
            overflow-x: hidden !important;
            height: auto !important;
            min-height: 100vh !important;
            width: 100% !important;
            background: #000000 !important;
            color: #ffffff !important;
            font-family: 'neue_montreal', 'NeueHaasDisplayMedium', -apple-system, BlinkMacSystemFont, sans-serif !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
            scroll-behavior: smooth !important;
        }

        .site-content,
        .main_layout {
            height: auto !important;
            min-height: 100vh !important;
            width: 100% !important;
            overflow: visible !important;
            position: relative !important;
            background: #000000 !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .main_slider {
            overflow: visible !important;
            height: auto !important;
            display: flex !important;
            flex-direction: column !important;
            flex-wrap: nowrap !important;
            transform: none !important;
            white-space: normal !important;
            background: #000000 !important;
            width: 100% !important;
        }

        .main_slider > section {
            flex: none !important;
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            min-height: auto !important;
            box-sizing: border-box !important;
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            margin: 0 !important;
            overflow: visible !important;
            background: #000000 !important;
            color: #ffffff !important;
            white-space: normal !important;
        }

        section.full_image_section,
        section.single_video,
        section.awards_wrp,
        section.post_scriptum,
        section.service_education,
        section.think_making,
        section.intro_section {
            top: 0 !important;
            margin: 0 !important;
            position: relative !important;
        }

        /* Prevent any text from stretching, overflowing or overlaying */
        h1, h2, h3, h4, h5, h6, p, span, div, a, li {
            white-space: normal !important;
            word-break: break-word !important;
        }

        /* Desktop Fixed Luxury Header */
        header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 74px !important;
            background: rgba(6, 6, 6, 0.85) !important;
            backdrop-filter: blur(18px) !important;
            -webkit-backdrop-filter: blur(18px) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            z-index: 9999 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 0 54px !important;
            box-sizing: border-box !important;
        }

        .logo_wrap {
            position: static !important;
            width: auto !important;
            height: 40px !important;
            max-width: none !important;
            max-height: none !important;
            display: flex !important;
            align-items: center !important;
            mix-blend-mode: normal !important;
            top: auto !important;
            left: auto !important;
            z-index: 2 !important;
        }

        .logo_wrap a {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            text-decoration: none !important;
        }

        .logo_wrap .mbm-diff {
            display: flex !important;
            align-items: center !important;
            mix-blend-mode: normal !important;
        }

        .logo_wrap img.logo__et {
            width: 36px !important;
            height: 36px !important;
            max-width: 36px !important;
            max-height: 36px !important;
            object-fit: contain !important;
            filter: brightness(0) invert(1) !important;
            mix-blend-mode: normal !important;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .logo_wrap a:hover img.logo__et {
            transform: scale(1.08) !important;
        }

        .main-navigation {
            position: static !important;
            display: flex !important;
            align-items: center !important;
            max-width: none !important;
            margin: 0 auto !important;
            mix-blend-mode: normal !important;
            z-index: 2 !important;
        }

        .main-navigation ul.menu {
            display: flex !important;
            align-items: center !important;
            gap: 40px !important;
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
            mix-blend-mode: normal !important;
        }

        .main-navigation ul.menu li {
            position: relative !important;
            padding: 0 !important;
        }

        .main-navigation ul.menu li:before {
            display: none !important;
        }

        .main-navigation ul.menu li a {
            color: rgba(255, 255, 255, 0.65) !important;
            font-size: 12.5px !important;
            font-weight: 600 !important;
            letter-spacing: 0.14em !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            transition: color 0.25s ease !important;
            padding: 8px 0 !important;
            display: inline-block !important;
            position: relative !important;
        }

        .main-navigation ul.menu li a:hover,
        .main-navigation ul.menu li.current_page_item a {
            color: #ffffff !important;
        }

        .main-navigation ul.menu li a:after {
            content: '' !important;
            position: absolute !important;
            bottom: 0 !important;
            left: 0 !important;
            width: 0 !important;
            height: 1.5px !important;
            background: #ff4500 !important;
            transition: width 0.3s ease !important;
        }

        .main-navigation ul.menu li a:hover:after,
        .main-navigation ul.menu li.current_page_item a:after {
            width: 100% !important;
        }

        .header-desktop-cta {
            display: flex !important;
            align-items: center !important;
            z-index: 2 !important;
        }

        .hd-header-booking-btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 10px 24px !important;
            margin: 0 !important;
            height: auto !important;
            min-height: 38px !important;
            width: auto !important;
            min-width: max-content !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            flex-shrink: 0 !important;
            background: #ffffff !important;
            color: #000000 !important;
            border: 1px solid #ffffff !important;
            border-radius: 999px !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            line-height: 1 !important;
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.2) !important;
            transition: all 0.25s ease !important;
            cursor: pointer !important;
        }

        .hd-header-booking-btn::before {
            display: none !important;
        }

        .hd-header-booking-btn span {
            color: #000000 !important;
            font-weight: 700 !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            line-height: 1 !important;
            display: inline-block !important;
        }

        .hd-header-booking-btn:hover {
            background: #ece8e1 !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 22px rgba(255, 255, 255, 0.3) !important;
        }

        .hd-header-booking-btn:hover span {
            color: #000000 !important;
        }

        #menu-toggle {
            display: none !important;
        }

        /* Helper classes */
        .hd-mobile-only {
            display: none !important;
        }

        .hd-desktop-only {
            display: flex !important;
        }

        /* SECTION 1: HERO (Desktop Vertical) */
        .section_1.hd-hero-section {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            min-height: 100vh !important;
            padding: 130px 70px 90px !important;
            box-sizing: border-box !important;
            position: relative !important;
            background: radial-gradient(circle at 75% 35%, rgba(255, 69, 0, 0.08) 0%, transparent 60%), radial-gradient(circle at 15% 85%, rgba(255, 255, 255, 0.03) 0%, transparent 45%), #000000 !important;
        }

        .section_1.hd-hero-section .hd-section-inner {
            width: 100% !important;
            max-width: 1440px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .hd-hero-top-wrap {
            width: 100% !important;
            max-width: 100% !important;
            display: grid !important;
            grid-template-columns: 1.15fr 0.85fr !important;
            gap: 70px !important;
            align-items: center !important;
            text-align: left !important;
        }

        .hd-hero-col-left {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 22px !important;
            width: 100% !important;
        }

        .hd-hero-status-card {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            width: auto !important;
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 999px !important;
            padding: 7px 20px !important;
            margin: 0 !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.4) !important;
            gap: 14px !important;
        }

        .hd-status-col {
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .hd-status-label {
            font-size: 10px !important;
            font-weight: 700 !important;
            letter-spacing: 0.14em !important;
            text-transform: uppercase !important;
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .hd-status-val {
            font-size: 12.5px !important;
            font-weight: 600 !important;
            color: #ffffff !important;
            letter-spacing: 0.03em !important;
        }

        .hd-status-divider {
            width: 1px !important;
            height: 16px !important;
            background: rgba(255, 255, 255, 0.15) !important;
            margin: 0 !important;
        }

        .hd-status-indicator {
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .hd-status-dot {
            width: 7px !important;
            height: 7px !important;
            border-radius: 50% !important;
            display: inline-block !important;
        }

        .hd-status-indicator.open .hd-status-dot {
            background-color: #22c55e !important;
            box-shadow: 0 0 10px #22c55e !important;
        }

        .hd-status-indicator.closed .hd-status-dot {
            background-color: #ef4444 !important;
            box-shadow: 0 0 10px #ef4444 !important;
        }

        .hd-status-indicator.open {
            color: #22c55e !important;
        }

        .hd-status-indicator.closed {
            color: #ef4444 !important;
        }

        .hd-hero-top-headline {
            margin: 0 !important;
            width: 100% !important;
            text-align: left !important;
        }

        .hd-tagline {
            color: #ffffff !important;
            font-size: clamp(36px, 3.8vw, 56px) !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            line-height: 1.1 !important;
            letter-spacing: -0.01em !important;
            margin: 0 !important;
            max-width: 620px !important;
            white-space: normal !important;
        }

        .hd-hero-desktop-desc {
            font-size: 15px !important;
            line-height: 1.65 !important;
            color: rgba(255, 255, 255, 0.75) !important;
            max-width: 520px !important;
            margin: 0 !important;
            font-weight: 400 !important;
            white-space: normal !important;
        }

        .hd-logotype {
            display: none !important;
        }

        .hd-hero-desktop-actions {
            display: flex !important;
            align-items: center !important;
            gap: 16px !important;
            margin-top: 4px !important;
        }

        .hd-hero-cta {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: #ffffff !important;
            color: #000000 !important;
            border: 1.5px solid #ffffff !important;
            border-radius: 999px !important;
            padding: 13px 34px !important;
            font-size: 11.5px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.12em !important;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.25) !important;
            cursor: pointer !important;
            transition: all 0.25s ease !important;
            text-decoration: none !important;
        }

        .hd-hero-cta span {
            color: #000000 !important;
            font-weight: 700 !important;
        }

        .hd-hero-cta:hover {
            background: #ece8e1 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 28px rgba(255, 255, 255, 0.35) !important;
        }

        .hd-hero-explore-btn {
            display: none !important;
        }

        .hd-hero-scroll-cue {
            display: none !important;
        }

        /* Right Column Showcase on Desktop */
        .hd-hero-col-right {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 20px !important;
            width: 100% !important;
        }

        .hd-hero-video-card {
            width: 100% !important;
            max-width: 480px !important;
            height: 390px !important;
            border-radius: 24px !important;
            overflow: hidden !important;
            position: relative !important;
            border: 1px solid rgba(255, 255, 255, 0.14) !important;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(255, 69, 0, 0.1) !important;
            background: #101010 !important;
        }

        .hd-hero-video {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
            filter: brightness(0.9) contrast(1.05) !important;
        }

        .hd-hero-video-overlay {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, transparent 40%, rgba(0,0,0,0.7) 100%) !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
            padding: 24px !important;
            box-sizing: border-box !important;
            pointer-events: none !important;
        }

        .hd-hero-video-logo img {
            height: 36px !important;
            width: auto !important;
            filter: brightness(0) invert(1) !important;
            opacity: 0.9 !important;
        }

        .hd-hero-video-badge {
            align-self: flex-start !important;
            background: rgba(0, 0, 0, 0.6) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            letter-spacing: 0.1em !important;
            text-transform: uppercase !important;
            padding: 6px 14px !important;
            border-radius: 999px !important;
        }

        .hd-hero-highlights {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            width: 100% !important;
            max-width: 480px !important;
            flex-wrap: wrap !important;
        }

        .hd-highlight-chip {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 999px !important;
            padding: 5px 14px !important;
            font-size: 11px !important;
            font-weight: 500 !important;
            color: rgba(255, 255, 255, 0.75) !important;
            letter-spacing: 0.04em !important;
        }

        /* SECTION 2: ARTISTS (Vertical Section) */
        .section_2.think_making {
            position: relative !important;
            width: 100% !important;
            height: auto !important;
            padding: 110px 70px !important;
            box-sizing: border-box !important;
            background: #000000 !important;
        }

        .section_2.think_making .cmn_container {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: flex-start !important;
            gap: 60px !important;
            width: 100% !important;
            max-width: 1520px !important;
            height: auto !important;
            margin: 0 auto !important;
            position: relative !important;
        }

        .section_2.think_making .content_wrap {
            flex: 0 0 320px !important;
            max-width: 320px !important;
            position: sticky !important;
            top: 120px !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        .hd-artists-header-info {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 16px !important;
        }

        .hd-kicker {
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 0.18em !important;
            text-transform: uppercase !important;
            color: #ff4500 !important;
            margin-bottom: 4px !important;
        }

        .section_2.think_making .content_wrap h3.section-header-title {
            font-size: clamp(34px, 3vw, 44px) !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: -0.01em !important;
            line-height: 1.05 !important;
            margin: 0 !important;
            color: #ffffff !important;
            white-space: normal !important;
        }

        .hd-artists-desc {
            font-size: 14px !important;
            line-height: 1.65 !important;
            color: rgba(255, 255, 255, 0.7) !important;
            margin: 0 !important;
            font-weight: 400 !important;
            white-space: normal !important;
        }

        .hd-artists-desktop-nav {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            margin-top: 10px !important;
        }

        .hd-artist-nav-arrow {
            width: 40px !important;
            height: 40px !important;
            border-radius: 50% !important;
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
            font-size: 16px !important;
        }

        .hd-artist-nav-arrow:hover {
            background: #ffffff !important;
            color: #000000 !important;
            transform: scale(1.06) !important;
        }

        .hd-artists-scroll-hint {
            font-size: 11px !important;
            color: rgba(255, 255, 255, 0.45) !important;
            text-transform: uppercase !important;
            letter-spacing: 0.08em !important;
        }

        .hd-artists-left-cta {
            width: 100% !important;
            margin-top: 16px !important;
        }

        .hd-artists-left-cta .button {
            width: 100% !important;
            padding: 13px 24px !important;
            text-align: center !important;
        }

        .artist-vertical-cards-wrap {
            display: flex !important;
            flex-direction: row !important;
            gap: 24px !important;
            overflow-x: auto !important;
            overflow-y: hidden !important;
            max-height: none !important;
            height: auto !important;
            width: auto !important;
            flex: 1 !important;
            padding: 10px 10px 24px 0 !important;
            scrollbar-width: thin !important;
            scrollbar-color: rgba(255, 255, 255, 0.25) transparent !important;
            -webkit-overflow-scrolling: touch !important;
            scroll-behavior: smooth !important;
        }

        .artist-vertical-cards-wrap::-webkit-scrollbar {
            height: 5px !important;
        }

        .artist-vertical-cards-wrap::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.25) !important;
            border-radius: 4px !important;
        }

        .artist-vertical-card-link {
            text-decoration: none !important;
            display: block !important;
            flex: 0 0 280px !important;
            height: 480px !important;
        }

        .artist-vertical-card {
            width: 100% !important;
            height: 100% !important;
            background: #131313 !important;
            border-radius: 20px !important;
            overflow: hidden !important;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.45) !important;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease !important;
            position: relative !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            display: flex !important;
            flex-direction: column !important;
        }

        .artist-vertical-card-link:hover .artist-vertical-card {
            transform: translateY(-8px) !important;
            box-shadow: 0 20px 48px rgba(0, 0, 0, 0.7) !important;
            border-color: rgba(255, 255, 255, 0.35) !important;
        }

        .artist-vertical-image {
            width: 100% !important;
            height: 100% !important;
            overflow: hidden !important;
            position: relative !important;
        }

        .artist-vertical-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .artist-vertical-card-link:hover .artist-vertical-image img {
            transform: scale(1.06) !important;
        }

        .artist-vertical-name {
            position: absolute !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            padding: 36px 20px 20px !important;
            text-align: center !important;
            font-size: 18px !important;
            font-weight: 700 !important;
            color: #ffffff !important;
            letter-spacing: 0.02em !important;
            text-transform: capitalize !important;
            background: linear-gradient(to top, rgba(0,0,0,0.92) 0%, rgba(0,0,0,0.6) 60%, transparent 100%) !important;
            z-index: 2 !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 6px !important;
            white-space: normal !important;
        }

        .artist-vertical-card-link .artist-vertical-name:after {
            content: 'View Work & Book ↗';
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #ff4500;
            opacity: 0;
            transform: translateY(4px);
            transition: all 0.25s ease;
        }

        .artist-vertical-card-link:hover .artist-vertical-name:after {
            opacity: 1;
            transform: translateY(0);
        }

        .artist-section-cta-fixed {
            display: none !important;
        }

        /* SECTION 3: CRAFT (Vertical Section) */
        .section_3.service_education {
            width: 100% !important;
            height: auto !important;
            padding: 100px 70px !important;
            box-sizing: border-box !important;
            background: #000000 !important;
            margin: 0 !important;
            border-top: none !important;
        }

        .section_3.service_education .cmn_container {
            width: 100% !important;
            max-width: 1440px !important;
            height: auto !important;
            margin: 0 auto !important;
        }

        .section_3.service_education .content_wrap {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 30px !important;
            width: 100% !important;
            height: auto !important;
        }

        .section_3.service_education .service_content {
            height: 480px !important;
            border-radius: 20px !important;
            overflow: hidden !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6) !important;
            position: relative !important;
            background: #121212 !important;
            transition: transform 0.35s ease, border-color 0.35s ease !important;
            margin: 0 !important;
        }

        .section_3.service_education .service_content:hover {
            transform: translateY(-6px) !important;
            border-color: rgba(255, 255, 255, 0.3) !important;
        }

        .section_3.service_education .service_content img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
            transition: transform 0.6s ease !important;
        }

        .section_3.service_education .service_content:hover img {
            transform: scale(1.05) !important;
        }

        /* SECTION 5: MANIFESTO (Vertical Section) */
        .section_5.post_scriptum {
            position: relative !important;
            width: 100% !important;
            height: auto !important;
            padding: 120px 70px !important;
            box-sizing: border-box !important;
            background: radial-gradient(circle at 80% 50%, rgba(255, 69, 0, 0.06) 0%, transparent 60%), #000000 !important;
            margin: 0 !important;
            border-top: none !important;
        }

        .section_5.post_scriptum .cmn_container {
            width: 100% !important;
            max-width: 1360px !important;
            height: auto !important;
            margin: 0 auto !important;
        }

        .section_5.post_scriptum .hd-post-scriptum-wrap {
            max-width: 100% !important;
            width: 100% !important;
            display: grid !important;
            grid-template-columns: 1.25fr 0.75fr !important;
            gap: 80px !important;
            align-items: center !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .hd-ps-eyebrow {
            margin-bottom: 24px !important;
            grid-column: 1 / -1 !important;
        }

        .hd-ps-tag {
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 0.18em !important;
            text-transform: uppercase !important;
            color: #ff4500 !important;
            border: 1px solid rgba(255, 69, 0, 0.3) !important;
            padding: 6px 16px !important;
            border-radius: 999px !important;
            background: rgba(255, 69, 0, 0.06) !important;
        }

        .hd-ps-content {
            font-size: clamp(26px, 2.5vw, 36px) !important;
            font-weight: 400 !important;
            line-height: 1.4 !important;
            color: #ffffff !important;
            letter-spacing: -0.015em !important;
            margin-bottom: 0 !important;
            white-space: normal !important;
        }

        .hd-ps-content p {
            margin-bottom: 20px !important;
            color: rgba(255, 255, 255, 0.9) !important;
            line-height: 1.4 !important;
            white-space: normal !important;
        }

        .hd-ps-content p:last-child {
            margin-bottom: 0 !important;
            color: #ffffff !important;
            font-weight: 600 !important;
        }

        .hd-ps-side-card {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 20px !important;
            padding: 36px 30px !important;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45) !important;
            backdrop-filter: blur(12px) !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 24px !important;
        }

        .hd-ps-ingredients {
            display: flex !important;
            flex-direction: column !important;
            gap: 16px !important;
            padding-top: 0 !important;
            border-top: none !important;
        }

        .hd-ps-subtitle {
            font-size: 11.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.16em !important;
            text-transform: uppercase !important;
            color: rgba(255, 255, 255, 0.6) !important;
            margin: 0 !important;
            white-space: normal !important;
        }

        .hd-ps-tags-list {
            display: flex !important;
            flex-wrap: wrap !important;
            gap: 10px !important;
            align-items: center !important;
        }

        .hd-ps-tag-item {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.14) !important;
            border-radius: 999px !important;
            padding: 7px 18px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            letter-spacing: 0.08em !important;
            text-transform: uppercase !important;
            color: #ffffff !important;
            transition: all 0.25s ease !important;
            white-space: nowrap !important;
        }

        .hd-ps-tag-item:hover {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: #ff4500 !important;
            transform: translateY(-2px) !important;
        }

        .hd-ps-tag-bullet {
            font-size: 9px !important;
            color: #ff4500 !important;
        }

        .hd-ps-action-wrap {
            margin-top: 8px !important;
            display: flex !important;
            justify-content: flex-start !important;
            width: 100% !important;
        }

        .hd-ps-cta-btn {
            width: 100% !important;
            padding: 14px 28px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 999px !important;
            background: #0e0e0e !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
            font-size: 11.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            position: relative !important;
            overflow: hidden !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .hd-ps-cta-btn span {
            position: relative !important;
            z-index: 5 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            display: inline-block !important;
            transition: color 0.25s ease !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
        }

        .hd-ps-cta-btn:hover {
            border-color: #ff4800 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(255, 72, 0, 0.35) !important;
        }

        .hd-ps-cta-btn:hover span {
            color: #ffffff !important;
            z-index: 6 !important;
        }

        /* SECTION 6: INK FOR ICONS (Vertical Section, Zero Overlap) */
        section.section_6.awards_wrp {
            position: relative !important;
            width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            display: block !important;
            padding: 120px 70px !important;
            box-sizing: border-box !important;
            background: #000000 !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            margin: 0 !important;
            transform: none !important;
        }

        .awards_wrp .cmn_container {
            width: 100% !important;
            max-width: 1400px !important;
            display: grid !important;
            grid-template-columns: 0.9fr 1.1fr !important;
            gap: 70px !important;
            align-items: flex-start !important;
            border-top: none !important;
            padding-top: 0 !important;
            margin: 0 auto !important;
        }

        .awards_wrp .main_head {
            padding: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            width: 100% !important;
        }

        .awards_wrp .main_head h2 {
            font-size: clamp(38px, 3.8vw, 54px) !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            line-height: 1.05 !important;
            letter-spacing: -0.01em !important;
            color: #ffffff !important;
            margin-bottom: 18px !important;
            white-space: normal !important;
            display: block !important;
            width: 100% !important;
        }

        .awards_wrp .main_head h3 {
            font-size: 16px !important;
            line-height: 1.6 !important;
            color: rgba(255, 255, 255, 0.72) !important;
            font-weight: 400 !important;
            margin: 0 !important;
            max-width: 440px !important;
            white-space: normal !important;
            display: block !important;
            width: 100% !important;
        }

        .awards_wrp .award_list {
            max-height: none !important;
            overflow: visible !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .awards_wrp .award_list ul {
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
        }

        .awards_wrp .award_list ul li {
            border-top: none !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
            padding: 0 !important;
            border-radius: 12px !important;
            transition: background 0.2s ease !important;
            width: 100% !important;
        }

        .awards_wrp .award_list ul li:hover {
            background: rgba(255, 255, 255, 0.04) !important;
        }

        .awards_wrp .award_list ul li a {
            padding: 18px 16px !important;
            display: grid !important;
            grid-template-columns: 1.2fr 1fr auto !important;
            align-items: center !important;
            text-decoration: none !important;
            color: #ffffff !important;
            gap: 16px !important;
            transition: transform 0.2s ease !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }

        .awards_wrp .award_list ul li a:hover {
            transform: translateX(4px) !important;
        }

        .awards_wrp .award_list ul li a:before {
            display: none !important;
        }

        .awards_wrp .award_list ul li a .title {
            color: #ffffff !important;
            font-size: 16.5px !important;
            font-weight: 600 !important;
            text-align: left !important;
            white-space: normal !important;
            width: auto !important;
        }

        .awards_wrp .award_list ul li a .award {
            color: rgba(255, 255, 255, 0.65) !important;
            font-size: 14px !important;
            text-align: left !important;
            white-space: normal !important;
            width: auto !important;
        }

        .awards_wrp .award_list ul li a .year {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 999px !important;
            padding: 5px 16px !important;
            color: #ffffff !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 0.1em !important;
            text-transform: uppercase !important;
            text-align: center !important;
            white-space: nowrap !important;
            width: auto !important;
        }

        /* SECTION 7: VISIT OUR STUDIO (Vertical Section, Zero Overlap) */
        section.section_7.hd-final-section {
            position: relative !important;
            width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            background: #000000 !important;
            display: block !important;
            padding: 120px 70px 140px !important;
            box-sizing: border-box !important;
        }

        .hd-final-container {
            display: block !important;
            width: 100% !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
            padding: 0 !important;
        }

        .hd-final-content-wrap {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 70px !important;
            align-items: center !important;
            width: 100% !important;
        }

        .hd-final-image-wrap {
            width: 100% !important;
            height: 520px !important;
            max-height: 520px !important;
            border-radius: 24px !important;
            overflow: hidden !important;
            margin-bottom: 0 !important;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.75) !important;
            background: #111111 !important;
            border: 1px solid rgba(255, 255, 255, 0.14) !important;
            position: relative !important;
        }

        .hd-final-image {
            width: 100% !important;
            height: 100% !important;
            max-height: none !important;
            object-fit: cover !important;
            display: block !important;
            filter: grayscale(100%) !important;
            transition: filter 0.5s ease, transform 0.6s ease !important;
        }

        .hd-final-image-wrap:hover .hd-final-image {
            filter: grayscale(30%) !important;
            transform: scale(1.03) !important;
        }

        .hd-final-image-tag {
            position: absolute !important;
            bottom: 20px !important;
            left: 20px !important;
            background: rgba(0, 0, 0, 0.7) !important;
            backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            padding: 8px 18px !important;
            border-radius: 999px !important;
            color: #ffffff !important;
            font-size: 11.5px !important;
            font-weight: 600 !important;
            letter-spacing: 0.08em !important;
            text-transform: uppercase !important;
        }

        .hd-final-details-wrap {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            text-align: left !important;
            gap: 20px !important;
            width: 100% !important;
        }

        .hd-final-logo-wrap {
            margin: 0 0 10px 0 !important;
            display: flex !important;
            justify-content: flex-start !important;
            align-items: center !important;
            width: auto !important;
        }

        .hd-final-logo-img {
            height: 44px !important;
            width: auto !important;
            filter: brightness(0) invert(1) !important;
        }

        .hd-final-title {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            width: 100% !important;
            margin: 0 0 10px 0 !important;
        }

        .hd-final-title h2 {
            display: block !important;
            width: 100% !important;
            font-size: clamp(32px, 3.2vw, 44px) !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: -0.01em !important;
            color: #ffffff !important;
            margin: 0 0 12px 0 !important;
            line-height: 1.1 !important;
            white-space: normal !important;
        }

        .hd-final-title p {
            display: block !important;
            width: 100% !important;
            font-size: 15px !important;
            line-height: 1.65 !important;
            color: rgba(255, 255, 255, 0.72) !important;
            margin: 0 !important;
            max-width: 480px !important;
            white-space: normal !important;
        }

        .hd-final-contact-wrap {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 14px !important;
            width: 100% !important;
            text-align: left !important;
            margin-top: 10px !important;
        }

        .hd-final-contact-item {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            gap: 12px !important;
        }

        .hd-final-address-item {
            width: 100% !important;
        }

        .hd-final-contact-row {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 12px !important;
        }

        .hd-final-contact-link {
            color: #ffffff !important;
            text-decoration: none !important;
            font-size: 14.5px !important;
            font-weight: 500 !important;
            letter-spacing: 0.03em !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 12px !important;
            transition: color 0.2s ease, transform 0.2s ease !important;
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 12px !important;
            padding: 12px 18px !important;
            white-space: normal !important;
        }

        .hd-final-contact-link:hover {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: rgba(255, 255, 255, 0.25) !important;
            transform: translateX(4px) !important;
            color: #ffffff !important;
            text-decoration: none !important;
        }

        .hd-final-hours-item {
            color: rgba(255, 255, 255, 0.85) !important;
            font-size: 13.5px !important;
            font-weight: 500 !important;
            letter-spacing: 0.03em !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 12px !important;
            padding: 6px 4px !important;
        }

        .hd-final-icon {
            color: #ff4500 !important;
            flex-shrink: 0 !important;
        }

        .hd-final-action-wrap {
            margin-top: 16px !important;
            width: 100% !important;
        }

        .hd-final-cta-btn {
            padding: 14px 36px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 999px !important;
            background: #0e0e0e !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
            font-size: 11.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            position: relative !important;
            overflow: hidden !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .hd-final-cta-btn span {
            position: relative !important;
            z-index: 5 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            display: inline-block !important;
            transition: color 0.25s ease !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
        }

        .hd-final-cta-btn:hover {
            border-color: #ff4800 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(255, 72, 0, 0.35) !important;
        }

        .hd-final-cta-btn:hover span {
            color: #ffffff !important;
            z-index: 6 !important;
        }

        /* Hide horizontal floating slide navigation arrows on vertical desktop */
        .hd-desktop-nav-arrow {
            display: none !important;
        }

        /* Desktop Vertical Floating Navigation Dots */
        .global-slider-dots-wrapper {
            position: fixed !important;
            right: 28px !important;
            left: auto !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            bottom: auto !important;
            flex-direction: column !important;
            gap: 14px !important;
            padding: 14px 8px !important;
            background: rgba(14, 14, 14, 0.75) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 999px !important;
            z-index: 9999 !important;
        }

        .global-slider-dot {
            width: 8px !important;
            height: 8px !important;
            position: relative !important;
        }

        .global-slider-dot.is-active {
            height: 24px !important;
            width: 8px !important;
            border-radius: 999px !important;
            background-color: #ffffff !important;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.85) !important;
        }

        .global-slider-dot:hover:after {
            content: attr(data-title);
            position: absolute;
            right: 22px;
            left: auto;
            top: 50%;
            bottom: auto;
            transform: translateY(-50%);
            background: rgba(12, 12, 12, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #ffffff;
            white-space: nowrap;
            pointer-events: none;
            backdrop-filter: blur(8px);
        }
    }

    /* Mobile responsive - 100% PRESERVED & UNTOUCHED */
    @media (max-width: 991px) {
        .hd-desktop-only {
            display: none !important;
        }
        .hd-hero-col-left {
            display: contents !important;
        }
        .hd-ps-side-card {
            display: contents !important;
        }
        .hd-final-details-wrap {
            display: contents !important;
        }
        .header-desktop-cta {
            display: none !important;
        }
        .hd-desktop-nav-arrow {
            display: none !important;
        }

        /* Section 1 mobile */
        .section_1.hd-hero-section {
            height: 100dvh !important;
            min-height: 100dvh !important;
            padding: 72px 20px 85px !important;
            box-sizing: border-box !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
        }

        .section_1.hd-hero-section .hd-section-inner {
            height: 100% !important;
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
        }

        .hd-hero-top-wrap {
            height: 100% !important;
            min-height: auto !important;
            padding: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-evenly !important;
            gap: 16px !important;
            max-width: 360px !important;
        }

        .hd-tagline {
            font-size: 26px !important;
            line-height: 1.25 !important;
            letter-spacing: 0.04em !important;
        }

        .hd-hero-status-card {
            max-width: 340px !important;
            padding: 10px 18px !important;
            margin: 0 auto !important;
        }

        .hd-status-val {
            font-size: 12px !important;
        }

        .hd-logotype {
            max-width: 250px !important;
            margin: 0 auto !important;
        }

        .hd-hero-scroll-cue {
            margin: 6px auto 36px !important;
            padding: 8px 18px !important;
            font-size: 10.5px !important;
        }

        /* Section 2 mobile */
        .section_2.think_making {
            position: relative !important;
            padding: 56px 20px 90px !important;
            min-height: 100dvh !important;
            box-sizing: border-box !important;
        }

        .section_2.think_making .cmn_container {
            display: flex !important;
            flex-direction: column !important;
            gap: 12px !important;
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .section_2.think_making .content_wrap {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .section_2.think_making .content_wrap h3.section-header-title {
            color: #ffffff !important;
            font-size: 13px !important;
            letter-spacing: 0.14em !important;
            text-transform: uppercase !important;
            margin: 0 0 8px 0 !important;
            padding: 0 !important;
            font-weight: 700 !important;
        }

        .artist-vertical-cards-wrap {
            max-height: none !important;
            overflow-y: visible !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 0 40px 0 !important;
            gap: 20px !important;
            margin: 0 !important;
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
            padding: 64px 20px 80px !important;
            min-height: 100dvh !important;
            box-sizing: border-box !important;
        }

        .section_5.post_scriptum .cmn_container {
            width: 100% !important;
            max-width: 380px !important;
            margin: auto 0 !important;
        }

        .hd-ps-eyebrow {
            margin-bottom: 14px !important;
        }

        .hd-ps-content {
            font-size: 18px !important;
            line-height: 1.42 !important;
            margin-bottom: 18px !important;
            text-wrap: balance !important;
            text-wrap: pretty !important;
            letter-spacing: -0.01em !important;
        }

        .hd-ps-content p {
            margin-bottom: 10px !important;
            line-height: 1.42 !important;
            text-wrap: balance !important;
            text-wrap: pretty !important;
        }

        .hd-ps-ingredients {
            padding-top: 14px !important;
            gap: 8px !important;
        }

        .hd-ps-tag-item {
            font-size: 10.5px !important;
            padding: 5px 12px !important;
        }

        .hd-ps-action-wrap {
            margin-top: 18px !important;
            justify-content: center !important;
        }

        /* Section 7 mobile */
        section.section_7.hd-final-section {
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-start !important;
            align-items: center !important;
            padding: 56px 20px 85px !important;
            min-height: 100dvh !important;
            height: 100dvh !important;
            box-sizing: border-box !important;
            background: #000000 !important;
            overflow-y: auto !important;
        }

        .hd-final-container {
            width: 100% !important;
            max-width: 360px !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            padding: 0 !important;
            margin: 0 auto !important;
            flex: 1 !important;
            justify-content: space-between !important;
        }

        .hd-final-image-wrap {
            width: 100% !important;
            max-height: 44vh !important;
            border-radius: 14px !important;
            overflow: hidden !important;
            margin-bottom: 12px !important;
            flex: 0 0 auto !important;
        }

        .hd-final-image {
            width: 100% !important;
            height: 100% !important;
            max-height: 44vh !important;
            object-fit: cover !important;
        }

        .hd-final-logo-wrap {
            margin: 10px 0 14px 0 !important;
            width: 100% !important;
        }

        .hd-final-logo-img {
            height: clamp(32px, 8.5vw, 40px) !important;
            max-width: 88% !important;
        }

        .hd-final-contact-wrap {
            width: 100% !important;
            gap: 8px !important;
            padding: 0 0 10px 0 !important;
        }

        .hd-final-contact-row {
            flex-direction: column !important;
            gap: 6px !important;
        }

        .hd-final-contact-link {
            font-size: 13px !important;
        }

        .hd-final-hours-item {
            font-size: 12px !important;
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
                            
                            <div class="hd-hero-col-left">
                                <!-- Live Studio Status Card -->
                                <div class="hd-hero-status-card">
                                    <div class="hd-status-col">
                                        <span class="hd-status-label">Current Time</span>
                                        <span class="hd-status-val"><?php echo esc_html($current_time); ?> EST</span>
                                    </div>
                                    <div class="hd-status-divider"></div>
                                    <div class="hd-status-col">
                                        <span class="hd-status-label">Studio Hours</span>
                                        <span class="hd-status-val hd-status-indicator <?php echo strtolower($studio_status); ?>">
                                            <span class="hd-status-dot"></span> <?php echo esc_html($studio_status); ?> (11AM–9PM)
                                        </span>
                                    </div>
                                </div>

                                <!-- Main Tagline Headline -->
                                <div class="hd-hero-top-headline">
                                    <?php if ($content): ?>
                                        <h1 class="hd-tagline"><?php echo strip_tags($content, "<br>"); ?></h1>
                                    <?php else: ?>
                                        <h1 class="hd-tagline">Skin Art<br>For Those Who<br>Only Accept The<br>Best In Life</h1>
                                    <?php endif; ?>
                                </div>

                                <!-- Desktop Editorial Description -->
                                <p class="hd-hero-desktop-desc hd-desktop-only">
                                    Miami's premier luxury tattoo studio in the Wynwood Arts District. Curated by master artist Tatu Panda, dedicated to world-class bespoke body art for high-profile collectors and tastemakers.
                                </p>

                                <!-- Desktop Action CTAs -->
                                <div class="hd-hero-desktop-actions hd-desktop-only" x-data>
                                    <button type="button" @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="ghl-booking-btn hd-hero-cta" aria-label="Book Consultation">
                                        <span>Book Consultation</span>
                                    </button>
                                </div>

                                <!-- Logotype (Mobile) -->
                                <div class="hd-logotype hd-mobile-only">
                                    <img
                                        src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png"
                                        alt="Tatu Panda"
                                        loading="eager"
                                    >
                                </div>

                                <!-- Obvious Visual Horizontal Slide Cue (Mobile Only) -->
                                <div class="hd-hero-scroll-cue hd-mobile-only" onclick="document.querySelectorAll('.global-slider-dot')[1]?.click()" role="button" aria-label="Slide to explore website">
                                    <span class="hd-scroll-cue-pulse"></span>
                                    <span class="hd-scroll-cue-text">Slide to Explore</span>
                                    <span class="hd-scroll-cue-arrow">
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H17M17 6L12 1M17 6L12 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <!-- Desktop Right Column: Studio Video & Presentation -->
                            <div class="hd-hero-col-right hd-desktop-only">
                                <div class="hd-hero-video-card">
                                    <video class="hd-hero-video" autoplay muted loop playsinline poster="https://pandatattoo.com/wp-content/uploads/2025/05/Tattoo-Artist-Tatu-Panda-3-1.jpg">
                                        <source src="https://pandatattoo.com/wp-content/uploads/2025/05/lv-0-20250516033811_ri6iFCJ4.mp4" type="video/mp4">
                                    </video>
                                    <div class="hd-hero-video-overlay">
                                        <span class="hd-hero-video-badge">Wynwood Arts District</span>
                                        <div class="hd-hero-video-logo">
                                            <img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" alt="PANDA">
                                        </div>
                                    </div>
                                </div>
                                <div class="hd-hero-highlights">
                                    <span class="hd-highlight-chip">✦ Private Suites</span>
                                    <span class="hd-highlight-chip">✦ Master Resident Artists</span>
                                    <span class="hd-highlight-chip">✦ Celebrity Clientele</span>
                                </div>
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
                            <div class="hd-artists-header-info">
                                <div>
                                    <div class="hd-kicker hd-desktop-only">Resident Masters</div>
                                    <h3 class="fs_14 section-header-title">Artists</h3>
                                    <p class="hd-artists-desc hd-desktop-only">
                                        Each tattoo artist at Panda brings a distinct visual mastery, from ultra-fine micro-realism to bold neo-traditional ink craft.
                                    </p>
                                </div>
                                <div class="hd-artists-desktop-nav hd-desktop-only">
                                    <button type="button" class="hd-artist-nav-arrow hd-artist-prev" aria-label="Scroll left">←</button>
                                    <button type="button" class="hd-artist-nav-arrow hd-artist-next" aria-label="Scroll right">→</button>
                                    <span class="hd-artists-scroll-hint">Scroll Gallery</span>
                                </div>
                                <div class="hd-artists-left-cta hd-desktop-only" x-data>
                                    <button type="button" @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="ghl-booking-btn button" aria-label="Book Artist">
                                        <span>Book Artist</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Artist Cards - Vertical Scroll Cards -->
                        <?php
                        // Fetch artists from Contentful
                        $artists = get_contentful_artists(['limit' => 20, 'order' => 'fields.artistName']);
                        // Only show artists that have images (profile picture or portfolio images)
                        $active_artists = array_filter($artists, function($artist) {
                            return !empty($artist['profile_picture']) || !empty($artist['portfolio_images']);
                        });
                        ?>
                        <?php if (!empty($active_artists)): ?>
                            <div class="artist-vertical-cards-wrap">
                                <?php foreach ($active_artists as $artist): ?>
                                    <?php
                                    $artist_slug = $artist['slug'];
                                    $artist_name = $artist['name'];
                                    $artist_img_url = !empty($artist['profile_picture']) 
                                        ? $artist['profile_picture'] 
                                        : (!empty($artist['portfolio_images'][0]['url']) ? $artist['portfolio_images'][0]['url'] : '');
                                    
                                    if (empty($artist_img_url)) {
                                        continue;
                                    }
                                    ?>
                                    <a href="/gallery/#<?php echo esc_attr($artist_slug); ?>" class="artist-vertical-card-link">
                                        <div class="artist-vertical-card">
                                            <div class="artist-vertical-image">
                                                <img src="<?php echo esc_url($artist_img_url); ?>" alt="<?php echo esc_attr($artist_name); ?>" loading="lazy">
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
                                    <?php 
                                    // Remove em dash and replace with clean punctuation
                                    $clean_content = str_replace(array(' — ', ' —', '— ', '—'), ', ', $content);
                                    $clean_content = str_replace(array(' – ', ' –', '– ', '–'), ', ', $clean_content);
                                    // Prevent orphan words like "forever" from sitting alone on a line
                                    $clean_content = str_replace('This is forever.', 'This is&nbsp;forever.', $clean_content);
                                    $clean_content = str_replace('forever.', '&nbsp;forever.', $clean_content);
                                    echo wpautop($clean_content); 
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="hd-ps-side-card">
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

                                <!-- Action CTA -->
                                <div class="hd-ps-action-wrap" x-data>
                                    <button type="button" @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="ghl-booking-btn button hd-ps-cta-btn" aria-label="Book Appointment">
                                        <span>Book Appointment</span>
                                    </button>
                                </div>
                            </div>
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

        <!-- Section 7: Final Section (Image, Panda Logo & Contact Info) -->
        <section class="section_7 hd-final-section">
            <div class="cmn_container hd-final-container">
                <div class="hd-final-content-wrap">
                    <!-- Top Image (Desktop Left Column) -->
                    <div class="hd-final-image-wrap">
                        <img src="https://pandatattoo.com/wp-content/uploads/2025/05/Tattoo-Artist-Tatu-Panda-3-1.jpg" alt="Panda Tattoo Studio" class="hd-final-image" loading="lazy">
                        <div class="hd-final-image-tag hd-desktop-only">Wynwood · Miami</div>
                    </div>

                    <!-- Details (Desktop Right Column, wrapped in hd-final-details-wrap) -->
                    <div class="hd-final-details-wrap">
                        <!-- Panda Wordmark Logo -->
                        <div class="hd-final-logo-wrap">
                            <img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" alt="PANDA" class="hd-final-logo-img">
                        </div>

                        <!-- Desktop Header / Title -->
                        <div class="hd-final-title hd-desktop-only">
                            <h2>Visit Our Studio</h2>
                            <p>Located in the vibrant heart of Miami’s Wynwood Arts District. Consultations by appointment and select walk-ins welcome.</p>
                        </div>

                        <!-- Contact Details Below Logo -->
                        <div class="hd-final-contact-wrap">
                            <!-- Location (Address) -> Opens Google Maps (Full Width Single Line) -->
                            <div class="hd-final-contact-item hd-final-address-item">
                                <a href="https://maps.google.com/?q=254+NW+36th+St,+Miami,+FL+33127" target="_blank" rel="noopener noreferrer" class="hd-final-contact-link" aria-label="Open Google Maps for 254 NW 36th St, Miami, FL 33127">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-final-icon"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    <span>254 NW 36th St, Miami, FL 33127</span>
                                </a>
                            </div>

                            <!-- Phone (Opens Dial Pad) & Hours -->
                            <div class="hd-final-contact-row">
                                <div class="hd-final-contact-item">
                                    <a href="tel:7869199998" class="hd-final-contact-link" aria-label="Call 786-919-9998">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-final-icon"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <span>(786) 919-9998</span>
                                    </a>
                                </div>

                                <div class="hd-final-contact-item hd-final-hours-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hd-final-icon"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    <span>Mon – Sun: 11:00 AM – 9:00 PM</span>
                                </div>
                            </div>

                            <!-- Desktop Appointment Action -->
                            <div class="hd-final-action-wrap hd-desktop-only" x-data>
                                <button type="button" @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="ghl-booking-btn button hd-final-cta-btn" aria-label="Book Appointment">
                                    <span>Book Appointment</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Desktop Floating Slide Navigation Arrows -->
    <button type="button" class="hd-desktop-nav-arrow hd-nav-prev hd-desktop-only" id="hdDesktopPrev" aria-label="Previous Slide">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
    </button>
    <button type="button" class="hd-desktop-nav-arrow hd-nav-next hd-desktop-only" id="hdDesktopNext" aria-label="Next Slide">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </button>

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
        const $sections = $et_studio_slider.children('section');
        const sectionCount = $sections.length;
        const dotsContainer = document.getElementById('globalSliderDots');
        let currentSlideIndex = 0;

        // Global listener for all booking buttons to open modal
        $(document).on('click', '.ghl-booking-btn, .hd-ps-cta-btn', function (e) {
            e.preventDefault();
            window.dispatchEvent(new CustomEvent('open-booking-modal'));
        });

        // Render global sticky dots strictly for direct child sections
        const slideNames = ['Studio', 'Artists', 'Craft', 'Manifesto', 'Icons', 'Visit'];
        if (dotsContainer && sectionCount > 0) {
            dotsContainer.innerHTML = '';
            $sections.each(function (index) {
                const dot = document.createElement('button');
                dot.className = 'global-slider-dot' + (index === 0 ? ' is-active' : '');
                dot.setAttribute('data-index', index);
                dot.setAttribute('data-title', slideNames[index] || ('Slide ' + (index + 1)));
                dot.setAttribute('type', 'button');
                dot.setAttribute('role', 'tab');
                dot.setAttribute('aria-label', 'Go to ' + (slideNames[index] || ('slide ' + (index + 1))));
                dotsContainer.appendChild(dot);
            });
        }

        function updateDesktopNavArrows(activeIndex) {
            if ($('#hdDesktopPrev').length) {
                if (activeIndex <= 0) {
                    $('#hdDesktopPrev').addClass('is-disabled');
                } else {
                    $('#hdDesktopPrev').removeClass('is-disabled');
                }
            }
            if ($('#hdDesktopNext').length) {
                if (activeIndex >= sectionCount - 1) {
                    $('#hdDesktopNext').addClass('is-disabled');
                } else {
                    $('#hdDesktopNext').removeClass('is-disabled');
                }
            }
        }

        function updateActiveDot(activeIndex) {
            currentSlideIndex = activeIndex;
            updateDesktopNavArrows(activeIndex);
            if (dotsContainer) {
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
        }

        if (windowWidth >= 991) {
            function scrollToSection(targetIndex) {
                if (targetIndex < 0 || targetIndex >= sectionCount) return;
                const targetSection = $sections.get(targetIndex);
                if (targetSection) {
                    const headerHeight = 74;
                    const elementPosition = targetSection.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerHeight;
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                    updateActiveDot(targetIndex);
                }
            }

            // Dot click navigation on desktop: smooth scroll vertically
            $(dotsContainer).on('click', '.global-slider-dot', function (e) {
                e.preventDefault();
                const targetIndex = parseInt($(this).data('index'), 10);
                scrollToSection(targetIndex);
            });

            // Horizontal Artist card navigation buttons
            $(document).on('click', '.hd-artist-prev', function (e) {
                e.preventDefault();
                const wrap = document.querySelector('.artist-vertical-cards-wrap');
                if (wrap) wrap.scrollBy({ left: -320, behavior: 'smooth' });
            });

            $(document).on('click', '.hd-artist-next', function (e) {
                e.preventDefault();
                const wrap = document.querySelector('.artist-vertical-cards-wrap');
                if (wrap) wrap.scrollBy({ left: 320, behavior: 'smooth' });
            });

            // Horizontal wheel scroll on artist cards container on desktop
            const artistWrapEl = document.querySelector('.artist-vertical-cards-wrap');
            if (artistWrapEl) {
                artistWrapEl.addEventListener('wheel', function (e) {
                    if (window.innerWidth >= 991) {
                        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                            e.preventDefault();
                            artistWrapEl.scrollLeft += e.deltaY;
                        }
                    }
                }, { passive: false });
            }

            // Update active dot on vertical window scroll
            let scrollTimeout;
            window.addEventListener('scroll', function () {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function () {
                    const scrollPosition = window.pageYOffset + 200;
                    let activeIndex = 0;
                    $sections.each(function (i, sec) {
                        if (sec.offsetTop <= scrollPosition) {
                            activeIndex = i;
                        }
                    });
                    updateActiveDot(activeIndex);
                }, 40);
            }, { passive: true });
        } else {
            // Mobile navigation & touch scroll sync
            const sliderEl = document.querySelector('.main_slider');
            if (dotsContainer && sliderEl) {
                $(dotsContainer).on('click', '.global-slider-dot', function (e) {
                    e.preventDefault();
                    const targetIndex = parseInt($(this).data('index'), 10);
                    const targetSection = $sections.get(targetIndex);
                    if (targetSection) {
                        sliderEl.scrollTo({
                            left: targetSection.offsetLeft,
                            behavior: 'smooth'
                        });
                        updateActiveDot(targetIndex);
                    }
                });

                let scrollTimer;
                sliderEl.addEventListener('scroll', function () {
                    window.clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(function () {
                        const scrollLeft = sliderEl.scrollLeft;
                        let activeIndex = 0;
                        let minDistance = Infinity;
                        $sections.each(function (i, sec) {
                            const dist = Math.abs(sec.offsetLeft - scrollLeft);
                            if (dist < minDistance) {
                                minDistance = dist;
                                activeIndex = i;
                            }
                        });
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
