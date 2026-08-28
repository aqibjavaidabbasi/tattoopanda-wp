<?php
/* Template Name: Home Dev */
get_header();
?>

<style>
    /* Prevent vertical scrolling on desktop for horizontal scroll experience */
    @media (min-width: 991px) {
        body, html {
            overflow: hidden;
            height: 100vh;
        }
        
        .main_layout {
            height: 100vh;
            overflow: visible;
            position: relative;
        }
        
        .main_slider {
            overflow: visible;
            height: 100%;
        }
    }
    
    /* ========================================
       SECTION 1: HERO & STUDIO INTRO
       ======================================== */
    .hd-hero-section {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        min-height: 80vh;
        box-sizing: border-box;
    }

    .hd-hero-top-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        gap: clamp(24px, 4.5vh, 48px);
        width: 100%;
        max-width: 520px;
        min-height: 75vh;
        margin: 0 auto;
        padding: 40px 16px;
        box-sizing: border-box;
        text-align: center;
    }

    .hd-hero-top-headline {
        margin: 0;
        width: 100%;
    }

    .hd-tagline {
        color: #ffffff !important;
        font-size: clamp(26px, 4.8vw, 42px) !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        line-height: 1.24 !important;
        letter-spacing: 0.04em !important;
        margin: 0 auto !important;
        max-width: 440px !important;
        text-wrap: balance !important;
        text-wrap: pretty !important;
    }

    /* Live Studio Status Card */
    .hd-hero-status-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 380px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 14px;
        padding: 12px 22px;
        box-sizing: border-box;
        margin: 0 auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .hd-status-col {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
        text-align: left;
    }

    .hd-status-col:last-child {
        align-items: flex-end;
        text-align: right;
    }

    .hd-status-label {
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: rgba(255, 255, 255, 0.5);
    }

    .hd-status-val {
        font-size: 13.5px;
        font-weight: 600;
        letter-spacing: 0.04em;
        color: #ffffff;
    }

    .hd-status-divider {
        width: 1px;
        height: 26px;
        background: rgba(255, 255, 255, 0.15);
        margin: 0 10px;
    }

    .hd-status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .hd-status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
    }

    .hd-status-indicator.open .hd-status-dot {
        background-color: #22c55e;
        box-shadow: 0 0 8px #22c55e;
    }

    .hd-status-indicator.closed .hd-status-dot {
        background-color: #ef4444;
        box-shadow: 0 0 8px #ef4444;
    }

    .hd-status-indicator.open {
        color: #22c55e;
    }

    .hd-status-indicator.closed {
        color: #ef4444;
    }

    .hd-logotype {
        margin: 0 auto;
        width: 100%;
        max-width: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hd-logotype img {
        width: 100%;
        height: auto;
        display: block;
        max-height: 90px;
        object-fit: contain;
    }

    /* 3-Column Highlights Grid */
    .hd-hero-features-grid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 360px;
        gap: 6px;
        margin: 0 auto;
        box-sizing: border-box;
    }

    .hd-feature-item {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        padding: 6px 4px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 8px;
        font-size: 10px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.75);
        white-space: nowrap;
    }

    .hd-feature-icon {
        color: #ff4500;
        font-size: 9px;
    }

    /* 4. Obvious Visual Horizontal Slide Cue */
    .hd-hero-scroll-cue {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 16px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 999px;
        cursor: pointer;
        color: #ffffff;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin: 6px auto 32px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.4);
    }

    .hd-hero-scroll-cue:hover {
        background: rgba(255, 255, 255, 0.16);
        border-color: #ff4500;
        transform: translateX(4px);
    }

    .hd-scroll-cue-pulse {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background-color: #ff4500;
        box-shadow: 0 0 10px #ff4500;
        animation: hd-pulse-dot 1.8s infinite ease-in-out;
    }

    .hd-scroll-cue-text {
        color: #ffffff;
    }

    .hd-scroll-cue-arrow {
        display: flex;
        align-items: center;
        color: #ff4500;
        animation: hd-slide-arrow 1.6s infinite ease-in-out;
    }

    @keyframes hd-slide-arrow {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(5px);
        }
    }

    @keyframes hd-pulse-dot {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.4);
            opacity: 0.5;
        }
    }

    /* ========================================
       SECTION 2: THINK MAKING & ARTIST SECTION
       ======================================== */
    .section_2.think_making {
        position: relative;
    }

    @media (min-width: 991px) {
        .section_2.think_making .cmn_container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 60px;
            height: 82vh;
            position: relative;
        }

        .section_2.think_making .content_wrap {
            flex: 0 0 420px;
            max-width: 420px;
        }

        .section_2.think_making .content_wrap h3.section-header-title {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin: 0 0 24px 0;
            color: #000000;
        }
    }

    /* Vertical Scroll Cards for Artists */
    .artist-vertical-cards-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
        overflow-y: auto;
        max-height: 76vh;
        width: 100%;
        max-width: 440px;
        padding: 10px 10px 80px 0;
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.25) transparent;
        -webkit-overflow-scrolling: touch;
    }

    .artist-vertical-cards-wrap::-webkit-scrollbar {
        width: 4px;
    }

    .artist-vertical-cards-wrap::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 4px;
    }

    .artist-vertical-card-link {
        text-decoration: none;
        display: block;
        width: 100%;
    }

    .artist-vertical-card {
        width: 100%;
        background: #141414;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .artist-vertical-card-link:hover .artist-vertical-card {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.55);
        border-color: rgba(255, 255, 255, 0.25);
    }

    .artist-vertical-image {
        width: 100%;
        height: 420px;
        overflow: hidden;
        position: relative;
    }

    .artist-vertical-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .artist-vertical-card-link:hover .artist-vertical-image img {
        transform: scale(1.04);
    }

    .artist-vertical-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 24px 20px 18px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
        letter-spacing: 0.5px;
        text-transform: capitalize;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.5) 60%, transparent 100%);
        z-index: 2;
    }

    /* Fixed Bottom CTA on Artist Section */
    .artist-section-cta-fixed {
        position: absolute;
        bottom: 20px;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        pointer-events: none;
    }

    .artist-section-cta-fixed .ghl-booking-btn,
    .artist-section-cta-fixed .button {
        pointer-events: auto !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7) !important;
    }

    /* ========================================
       STICKY GLOBAL SLIDER DOTS NAVIGATION
       ======================================== */
    .global-slider-dots-wrapper {
        position: fixed;
        bottom: 18px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 7px 16px;
        background: rgba(18, 18, 18, 0.85);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 999px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.6);
        pointer-events: auto;
    }

    .global-slider-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-block;
        border: none;
        padding: 0;
    }

    .global-slider-dot:hover {
        background-color: rgba(255, 255, 255, 0.8);
        transform: scale(1.2);
    }

    .global-slider-dot.is-active {
        width: 24px;
        border-radius: 999px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.85);
    }

    body.has-modal-open .global-slider-dots-wrapper,
    body.modal-open .global-slider-dots-wrapper {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }

    /* ========================================
       SECTION 5: POST SCRIPTUM (Manifesto)
       ======================================== */
    .section_5.post_scriptum {
        position: relative;
    }

    @media (min-width: 991px) {
        .section_5.post_scriptum .cmn_container {
            display: flex;
            align-items: center;
            height: 82vh;
        }

        .section_5.post_scriptum .hd-post-scriptum-wrap {
            max-width: 680px;
            margin: 0 auto;
            padding: 40px 0;
        }
    }

    .hd-post-scriptum-wrap {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        max-width: 620px;
        margin: 0 auto;
    }

    .hd-ps-eyebrow {
        margin-bottom: 20px;
    }

    .hd-ps-tag {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.15);
        padding: 5px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.04);
    }

    .hd-ps-content {
        font-size: clamp(20px, 4.2vw, 28px);
        font-weight: 400;
        line-height: 1.45;
        color: #ffffff;
        letter-spacing: -0.015em;
        margin-bottom: 28px;
        text-wrap: balance;
        text-wrap: pretty;
    }

    .hd-ps-content p {
        margin-bottom: 16px;
        color: rgba(255, 255, 255, 0.92);
        line-height: 1.45;
        text-wrap: balance;
        text-wrap: pretty;
    }

    .hd-ps-content p:last-child {
        margin-bottom: 0;
        color: #ffffff;
        font-weight: 600;
    }

    .hd-ps-ingredients {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    .hd-ps-action-wrap {
        margin-top: 24px;
        display: flex;
        justify-content: flex-start;
        width: 100%;
    }

    .hd-ps-subtitle {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }

    .hd-ps-tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }

    .hd-ps-tag-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 999px;
        padding: 6px 16px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        transition: background 0.2s ease, border-color 0.2s ease;
    }

    .hd-ps-tag-item:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .hd-ps-tag-bullet {
        font-size: 8px;
        color: rgba(255, 255, 255, 0.5);
    }

    /* ========================================
       SECTION 7: FINAL SECTION (Image, Panda Logo & Contact)
       ======================================== */
    section.section_7.hd-final-section {
        position: relative;
        width: 100vw;
        height: 100vh;
        background: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .hd-final-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 520px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
    }

    .hd-final-content-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .hd-final-image-wrap {
        width: 100%;
        max-height: 48vh;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.6);
        background: #111111;
    }

    .hd-final-image {
        width: 100%;
        height: 100%;
        max-height: 48vh;
        object-fit: cover;
        display: block;
        filter: grayscale(100%);
    }

    .hd-final-logo-wrap {
        margin: 12px 0 20px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .hd-final-logo-img {
        height: 44px;
        width: auto;
        max-width: 90%;
        display: block;
        filter: brightness(0) invert(1);
    }

    .hd-final-contact-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        width: 100%;
        text-align: center;
    }

    .hd-final-contact-item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .hd-final-address-item {
        width: 100%;
    }

    .hd-final-contact-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .hd-final-contact-link {
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.04em;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: opacity 0.2s ease, text-decoration 0.2s ease;
    }

    .hd-final-contact-link:hover {
        opacity: 0.85;
        text-decoration: underline;
        color: #ffffff;
    }

    .hd-final-hours-item {
        color: rgba(255, 255, 255, 0.85);
        font-size: 13px;
        font-weight: 400;
        letter-spacing: 0.03em;
    }

    .hd-final-icon {
        color: rgba(255, 255, 255, 0.6);
        flex-shrink: 0;
    }

    /* Mobile responsive */
    @media (max-width: 991px) {
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
                            
                            <!-- Main Tagline Headline -->
                            <div class="hd-hero-top-headline">
                                <?php if ($content): ?>
                                    <h1 class="hd-tagline"><?php echo strip_tags($content, "<br>"); ?></h1>
                                <?php else: ?>
                                    <h1 class="hd-tagline">Skin Art<br>For Those Who<br>Only Accept The<br>Best In Life</h1>
                                <?php endif; ?>
                            </div>

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

                            <!-- Logotype -->
                            <div class="hd-logotype">
                                <img
                                    src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png"
                                    alt="Tatu Panda"
                                    loading="eager"
                                >
                            </div>

                            <!-- Obvious Visual Horizontal Slide Cue -->
                            <div class="hd-hero-scroll-cue" onclick="document.querySelectorAll('.global-slider-dot')[1]?.click()" role="button" aria-label="Slide to explore website">
                                <span class="hd-scroll-cue-pulse"></span>
                                <span class="hd-scroll-cue-text">Slide to Explore</span>
                                <span class="hd-scroll-cue-arrow">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H17M17 6L12 1M17 6L12 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
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
                            <h3 class="fs_14 section-header-title">Artists</h3>
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
                    <!-- Top Image -->
                    <div class="hd-final-image-wrap">
                        <img src="https://pandatattoo.com/wp-content/uploads/2025/05/Tattoo-Artist-Tatu-Panda-3-1.jpg" alt="Panda Tattoo Studio" class="hd-final-image" loading="lazy">
                    </div>

                    <!-- Panda Wordmark Logo -->
                    <div class="hd-final-logo-wrap">
                        <img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" alt="PANDA" class="hd-final-logo-img">
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
                    </div>
                </div>
            </div>
        </section>

    </div>

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
        if (dotsContainer && sectionCount > 0) {
            dotsContainer.innerHTML = '';
            $sections.each(function (index) {
                const dot = document.createElement('button');
                dot.className = 'global-slider-dot' + (index === 0 ? ' is-active' : '');
                dot.setAttribute('data-index', index);
                dot.setAttribute('type', 'button');
                dot.setAttribute('role', 'tab');
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                dotsContainer.appendChild(dot);
            });
        }

        function updateActiveDot(activeIndex) {
            currentSlideIndex = activeIndex;
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
            // Force scroll to top on page load
            window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;

            function getMaxScroll() {
                const lastSection = $sections.last()[0];
                return lastSection ? -lastSection.offsetLeft : -((sectionCount - 1) * windowWidth);
            }

            let et_studio_currentX = 0;
            let et_studio_targetX = 0;
            let et_studio_maxScroll = getMaxScroll();
            let isVerticalSection = false;

            const $verticalSection = $('.section_6.awards_wrp');
            const verticalSectionOffsetLeft = $verticalSection.length ? $verticalSection.position().left : 0;

            // Dot click navigation on desktop
            $(dotsContainer).on('click', '.global-slider-dot', function (e) {
                e.preventDefault();
                const targetIndex = parseInt($(this).data('index'), 10);
                const targetSection = $sections.get(targetIndex);
                if (targetSection) {
                    // Reset vertical section state when clicking any dot
                    isVerticalSection = false;
                    $(".main_slider").removeClass('awards_wrp_sec');
                    verticalScrollPosition = 0;
                    if ($verticalSection.length) {
                        $verticalSection.css('transform', 'translateY(0px)');
                    }

                    et_studio_targetX = -targetSection.offsetLeft;
                    et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    updateActiveDot(targetIndex);
                }
            });

            // Function to animate the scroll smoothly
            function et_studio_animateScroll() {
                if (!isVerticalSection) {
                    et_studio_currentX += (et_studio_targetX - et_studio_currentX) * 0.08;
                    et_studio_currentX = Math.max(et_studio_currentX, et_studio_maxScroll);
                    et_studio_currentX = Math.min(et_studio_currentX, 0);

                    $et_studio_slider.css('transform', `translateX(${et_studio_currentX}px)`);

                    // Find closest section for active dot
                    let activeIndex = 0;
                    let minDistance = Infinity;
                    $sections.each(function (i, sec) {
                        const dist = Math.abs(sec.offsetLeft - (-et_studio_currentX));
                        if (dist < minDistance) {
                            minDistance = dist;
                            activeIndex = i;
                        }
                    });
                    updateActiveDot(activeIndex);
                }
                requestAnimationFrame(et_studio_animateScroll);
            }

            et_studio_animateScroll();

            let verticalScrollPosition = 0;
            let isMouseOverScrollable = false;

            // Track mouse position over scrollable elements
            document.addEventListener('mouseover', function(e) {
                const target = e.target;
                if (target.closest('.artist-vertical-cards-wrap') || target.closest('.award_list')) {
                    isMouseOverScrollable = true;
                }
            });

            document.addEventListener('mouseout', function(e) {
                const target = e.target;
                if (target.closest('.artist-vertical-cards-wrap') || target.closest('.award_list')) {
                    isMouseOverScrollable = false;
                }
            });

            window.addEventListener('wheel', function (e) {
                // Allow native scroll if mouse is over scrollable elements
                if (isMouseOverScrollable) {
                    return;
                }
                const scrollX = -et_studio_targetX;
                const delta = e.deltaY;
                const sectionHeight = $verticalSection.length ? $verticalSection.outerHeight() : 0;
                const sectionScrollMax = sectionHeight - window.innerHeight;

                // Detect when scroll reaches the awards_wrp section
                const buffer = 40;
                if ($verticalSection.length && scrollX >= verticalSectionOffsetLeft - buffer && scrollX <= verticalSectionOffsetLeft + buffer) {
                    isVerticalSection = true;
                    $(".main_slider").addClass('awards_wrp_sec');

                    if (verticalScrollPosition >= 0 && verticalScrollPosition <= sectionScrollMax) {
                        verticalScrollPosition += delta;
                        verticalScrollPosition = Math.max(0, Math.min(verticalScrollPosition, sectionScrollMax));
                        $verticalSection.css('transform', `translateY(-${verticalScrollPosition}px)`);
                        e.preventDefault();
                    }

                    if (verticalScrollPosition <= 0 || verticalScrollPosition >= sectionScrollMax) {
                        isVerticalSection = false;
                        e.preventDefault();
                        et_studio_targetX -= delta;
                        et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    }
                } else {
                    isVerticalSection = false;
                    e.preventDefault();
                    et_studio_targetX -= delta;
                    et_studio_targetX = Math.min(0, Math.max(et_studio_targetX, et_studio_maxScroll));
                    $(".main_slider").removeClass('awards_wrp_sec');
                }
            }, { passive: false });

            $(window).on('resize', function () {
                const newWidth = $(window).width();
                if (newWidth !== windowWidth && newWidth >= 991) {
                    window.location.reload();
                }
            });
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
