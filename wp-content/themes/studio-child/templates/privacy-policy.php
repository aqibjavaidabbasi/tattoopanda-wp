<?php 
/* Template Name: Privacy Policy */
get_header();
?>

<style>
    /* ========================================
       GLOBAL SCROLL OVERRIDE FOR LEGAL PAGES
       ======================================== */
    html,
    body,
    #page,
    .site-content,
    .main_layout,
    .hd-legal-page {
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
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-bottom: 0 !important;
        margin: 0 !important;
        height: auto !important;
    }

    /* ========================================
       LEGAL PAGE - PANDA TATTOO DESIGN SYSTEM
       ======================================== */
    .hd-legal-page {
        padding: 120px 24px 120px;
        box-sizing: border-box;
        font-family: inherit;
        background: #000000;
        position: relative;
        z-index: 1;
    }

    .hd-legal-container {
        max-width: 1040px;
        margin: 0 auto;
        width: 100%;
    }

    /* Top Hero Header */
    .hd-legal-hero {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        position: relative;
        z-index: 2;
    }

    .hd-legal-eyebrow {
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
        padding: 6px 16px;
        border-radius: 999px;
        text-decoration: none !important;
    }

    .hd-legal-title {
        font-size: clamp(32px, 5.5vw, 56px);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.1;
        margin: 0;
        text-transform: uppercase;
        color: #ffffff;
        position: relative;
        z-index: 2;
    }

    .hd-legal-meta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.55);
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .hd-legal-meta-dot {
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #22c55e;
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.6);
    }

    /* Intro Card */
    .hd-legal-intro-card {
        background: rgba(255, 255, 255, 0.035);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 28px 32px;
        margin-bottom: 36px;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        box-shadow: 0 10px 32px rgba(0, 0, 0, 0.4);
    }

    .hd-legal-intro-card p {
        font-size: 16px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
    }

    /* Table of Contents Quick Nav */
    .hd-legal-toc-wrap {
        margin-bottom: 44px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 24px;
        box-sizing: border-box;
    }

    .hd-legal-toc-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .hd-legal-toc-label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .hd-legal-toc-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 10px;
    }

    .hd-toc-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.75) !important;
        text-decoration: none !important;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .hd-toc-link:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.2);
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    .hd-toc-num {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.05em;
        color: rgba(255, 255, 255, 0.4);
        font-family: monospace;
    }

    /* Content Sections */
    .hd-legal-content {
        display: flex;
        flex-direction: column;
        gap: 28px;
    }

    .hd-legal-section {
        background: rgba(255, 255, 255, 0.025);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 32px;
        box-sizing: border-box;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        transition: border-color 0.25s ease;
        position: relative;
        scroll-margin-top: 100px;
    }

    .hd-legal-section:hover {
        border-color: rgba(255, 255, 255, 0.18);
    }

    .hd-section-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
    }

    .hd-section-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 14px;
        font-weight: 800;
        color: #ffffff;
        font-family: monospace;
        flex-shrink: 0;
    }

    .hd-section-title {
        font-size: clamp(20px, 2.5vw, 24px);
        font-weight: 700;
        letter-spacing: -0.01em;
        margin: 0;
        color: #ffffff;
        text-transform: uppercase;
    }

    .hd-section-body {
        font-size: 15px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.85);
    }

    .hd-section-body p {
        margin: 0 0 16px 0;
    }

    .hd-section-body p:last-child {
        margin-bottom: 0;
    }

    /* List styling */
    .hd-legal-list {
        list-style: none;
        padding: 0;
        margin: 16px 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .hd-legal-list-item {
        position: relative;
        padding-left: 22px;
        font-size: 15px;
        line-height: 1.65;
        color: rgba(255, 255, 255, 0.82);
    }

    .hd-legal-list-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 9px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
    }

    .hd-legal-list-item strong {
        color: #ffffff;
        font-weight: 600;
    }

    /* Highlighted Callout Cards */
    .hd-callout-card {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-left: 4px solid #ffffff;
        border-radius: 14px;
        padding: 18px 22px;
        margin: 18px 0;
    }

    .hd-callout-card.hd-callout-success {
        border-left-color: #22c55e;
        background: rgba(34, 197, 94, 0.04);
        border-top-color: rgba(34, 197, 94, 0.2);
        border-right-color: rgba(34, 197, 94, 0.2);
        border-bottom-color: rgba(34, 197, 94, 0.2);
    }

    .hd-callout-card.hd-callout-accent {
        border-left-color: #3b82f6;
        background: rgba(59, 130, 246, 0.04);
        border-top-color: rgba(59, 130, 246, 0.2);
        border-right-color: rgba(59, 130, 246, 0.2);
        border-bottom-color: rgba(59, 130, 246, 0.2);
    }

    .hd-callout-card p {
        margin: 0;
        font-size: 14px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
    }

    .hd-callout-title {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Links inside content */
    .hd-legal-page a {
        color: #ffffff !important;
        text-decoration: underline !important;
        text-underline-offset: 3px;
        text-decoration-color: rgba(255, 255, 255, 0.4) !important;
        transition: all 0.2s ease;
    }

    .hd-legal-page a:hover {
        text-decoration-color: #ffffff !important;
        opacity: 0.85;
    }

    .hd-toc-link,
    .hd-back-top,
    .hd-contact-action-btn,
    .hd-legal-eyebrow,
    .hd-contact-link-row a {
        text-decoration: none !important;
    }

    /* Studio Contact Card at Bottom */
    .hd-legal-contact-card {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.02) 100%);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 24px;
        padding: 40px 32px;
        margin-top: 48px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 22px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
    }

    .hd-legal-contact-logo {
        max-width: 140px;
        height: auto;
        opacity: 0.95;
    }

    .hd-legal-contact-address {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }

    .hd-legal-contact-address strong {
        font-size: 18px;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .hd-contact-info-pills {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 6px;
    }

    .hd-contact-info-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 13px;
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none !important;
        transition: all 0.2s ease;
    }

    .hd-contact-info-pill:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.25);
        color: #ffffff !important;
    }

    .hd-contact-btn-group {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
        margin-top: 4px;
    }

    /* Fixed Button Styling - Ensures Black Text on White Button */
    .hd-contact-btn-group a.hd-contact-action-btn,
    .hd-contact-btn-group button.hd-contact-action-btn,
    .hd-contact-action-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: #ffffff !important;
        color: #000000 !important;
        border: 1px solid #ffffff !important;
        padding: 12px 28px !important;
        border-radius: 999px !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        letter-spacing: 0.1em !important;
        text-transform: uppercase !important;
        text-decoration: none !important;
        cursor: pointer !important;
        transition: all 0.25s ease !important;
        box-shadow: 0 4px 14px rgba(255, 255, 255, 0.15) !important;
    }

    .hd-contact-btn-group a.hd-contact-action-btn *,
    .hd-contact-btn-group a.hd-contact-action-btn span,
    .hd-contact-action-btn span {
        color: #000000 !important;
        -webkit-text-fill-color: #000000 !important;
        font-weight: 700 !important;
    }

    .hd-contact-btn-group a.hd-contact-action-btn:hover {
        background: #e2e2e2 !important;
        border-color: #e2e2e2 !important;
        color: #000000 !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255, 255, 255, 0.25) !important;
    }

    .hd-contact-btn-group .hd-contact-action-btn.hd-btn-secondary {
        background: transparent !important;
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        box-shadow: none !important;
    }

    .hd-contact-btn-group .hd-contact-action-btn.hd-btn-secondary *,
    .hd-contact-btn-group .hd-contact-action-btn.hd-btn-secondary span {
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
    }

    .hd-contact-btn-group .hd-contact-action-btn.hd-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        border-color: #ffffff !important;
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    /* Floating Back to Top Button */
    .hd-back-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(20, 20, 20, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
        backdrop-filter: blur(8px);
    }

    .hd-back-top.is-visible {
        opacity: 1;
        visibility: visible;
    }

    .hd-back-top:hover {
        background: #ffffff;
        color: #000000 !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.25);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hd-legal-page {
            padding: 95px 16px 90px;
        }

        .hd-legal-section {
            padding: 24px 18px;
            border-radius: 16px;
        }

        .hd-legal-intro-card {
            padding: 22px 18px;
            border-radius: 16px;
        }

        .hd-legal-toc-wrap {
            padding: 18px 14px;
        }

        .hd-legal-toc-grid {
            grid-template-columns: 1fr;
        }

        .hd-legal-contact-card {
            padding: 28px 18px;
            border-radius: 18px;
        }

        .hd-contact-info-pills {
            flex-direction: column;
            width: 100%;
        }

        .hd-contact-info-pill {
            width: 100%;
            justify-content: center;
        }

        .hd-back-top {
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
        }
    }
</style>

<div class="hd-legal-page">
    <div class="hd-legal-container">

        <!-- Top Hero Section -->
        <header class="hd-legal-hero">
            <div class="hd-legal-eyebrow">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span>Legal &amp; Privacy</span>
            </div>
            <h1 class="hd-legal-title">Privacy Policy</h1>
            <div class="hd-legal-meta">
                <span class="hd-legal-meta-dot"></span>
                <span>Last updated: September 3, 2026</span>
            </div>
        </header>

        <!-- Introductory Card -->
        <div class="hd-legal-intro-card">
            <p><strong>Panda Tattoo LLC</strong> ("we," "us," or "our") operates <a href="https://pandatattoo.com" target="_blank" rel="noopener noreferrer">https://pandatattoo.com</a>. This Privacy Policy explains how we collect, use, disclose, and protect your information when you visit our website, contact us, or use our services.</p>
        </div>

        <!-- Quick Jump Navigation / Table of Contents -->
        <nav class="hd-legal-toc-wrap" aria-label="Table of Contents">
            <div class="hd-legal-toc-header">
                <span class="hd-legal-toc-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    Table of Contents
                </span>
                <span style="font-size: 11px; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.1em;">12 Sections</span>
            </div>
            <div class="hd-legal-toc-grid">
                <a href="#section-1" class="hd-toc-link"><span class="hd-toc-num">01</span><span>Information We Collect</span></a>
                <a href="#section-2" class="hd-toc-link"><span class="hd-toc-num">02</span><span>How We Use Your Info</span></a>
                <a href="#section-3" class="hd-toc-link"><span class="hd-toc-num">03</span><span>Sharing &amp; Disclosure</span></a>
                <a href="#section-4" class="hd-toc-link"><span class="hd-toc-num">04</span><span>SMS Communication</span></a>
                <a href="#section-5" class="hd-toc-link"><span class="hd-toc-num">05</span><span>Call Recording</span></a>
                <a href="#section-6" class="hd-toc-link"><span class="hd-toc-num">06</span><span>Cookies &amp; Tracking</span></a>
                <a href="#section-7" class="hd-toc-link"><span class="hd-toc-num">07</span><span>Data Retention</span></a>
                <a href="#section-8" class="hd-toc-link"><span class="hd-toc-num">08</span><span>Your Choices</span></a>
                <a href="#section-9" class="hd-toc-link"><span class="hd-toc-num">09</span><span>Security</span></a>
                <a href="#section-10" class="hd-toc-link"><span class="hd-toc-num">10</span><span>Children's Privacy</span></a>
                <a href="#section-11" class="hd-toc-link"><span class="hd-toc-num">11</span><span>Changes to Policy</span></a>
                <a href="#section-12" class="hd-toc-link"><span class="hd-toc-num">12</span><span>Contact Us</span></a>
            </div>
        </nav>

        <!-- Document Sections -->
        <main class="hd-legal-content">

            <!-- Section 1 -->
            <section id="section-1" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">01</span>
                    <h2 class="hd-section-title">Information We Collect</h2>
                </div>
                <div class="hd-section-body">
                    <p>We collect the following types of information:</p>
                    <ul class="hd-legal-list">
                        <li class="hd-legal-list-item"><strong>Contact information:</strong> name, email address, phone number, and similar details you provide through our website forms, by phone, by text, or in person.</li>
                        <li class="hd-legal-list-item"><strong>Appointment information:</strong> design ideas, placement, size, reference images you send us, and scheduling preferences.</li>
                        <li class="hd-legal-list-item"><strong>Consent and eligibility records:</strong> age verification and any consent forms completed before a session.</li>
                        <li class="hd-legal-list-item"><strong>Technical information:</strong> IP address, browser type, device type, and browsing activity collected through cookies and similar technologies.</li>
                        <li class="hd-legal-list-item"><strong>Communications:</strong> messages, call recordings, and correspondence exchanged with us, as described in Sections 4 and 5.</li>
                    </ul>
                </div>
            </section>

            <!-- Section 2 -->
            <section id="section-2" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">02</span>
                    <h2 class="hd-section-title">How We Use Your Information</h2>
                </div>
                <div class="hd-section-body">
                    <p>We use the information we collect to:</p>
                    <ul class="hd-legal-list">
                        <li class="hd-legal-list-item">Respond to your inquiries and discuss design ideas.</li>
                        <li class="hd-legal-list-item">Schedule, confirm, and manage appointments and deposits.</li>
                        <li class="hd-legal-list-item">Send appointment reminders and aftercare information.</li>
                        <li class="hd-legal-list-item">Request feedback and reviews after a completed session.</li>
                        <li class="hd-legal-list-item">Send promotional messages where you have chosen to receive them.</li>
                        <li class="hd-legal-list-item">Improve our website and services.</li>
                        <li class="hd-legal-list-item">Maintain security and prevent fraud.</li>
                        <li class="hd-legal-list-item">Comply with legal obligations.</li>
                    </ul>
                </div>
            </section>

            <!-- Section 3 -->
            <section id="section-3" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">03</span>
                    <h2 class="hd-section-title">Information Sharing and Disclosure</h2>
                </div>
                <div class="hd-section-body">
                    <div class="hd-callout-card hd-callout-success">
                        <div class="hd-callout-title">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            <span>Mobile Privacy Guarantee</span>
                        </div>
                        <p><strong>No mobile information will be shared with third parties or affiliates for marketing or promotional purposes.</strong></p>
                    </div>

                    <p>Information may be shared with service providers who perform functions on our behalf, such as website hosting, communications delivery, scheduling, and payment processing. These providers are permitted to use the information only to perform those functions. Text messaging opt-in data and consent are never shared with third parties.</p>
                    <p>We may disclose information if required by law, including in response to subpoenas, court orders, or lawful investigations.</p>
                    <p>We do not sell your personal information.</p>
                </div>
            </section>

            <!-- Section 4 -->
            <section id="section-4" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">04</span>
                    <h2 class="hd-section-title">SMS Communication</h2>
                </div>
                <div class="hd-section-body">
                    <p>By providing your phone number through our website, by phone, or in person, you consent to receive text messages (SMS) from Panda Tattoo related to your inquiry, deposit, or appointment. These may include appointment confirmations and reminders, design and scheduling updates, aftercare follow-up, requests for feedback or a review, and occasional promotional offers.</p>

                    <div class="hd-callout-card hd-callout-accent">
                        <ul class="hd-legal-list" style="margin: 0;">
                            <li class="hd-legal-list-item"><strong>Message frequency:</strong> message frequency varies based on your interaction with us.</li>
                            <li class="hd-legal-list-item"><strong>Opting out:</strong> you can stop receiving messages at any time by replying <strong>STOP</strong> to any message. You will receive a confirmation and messages will cease.</li>
                            <li class="hd-legal-list-item"><strong>Support:</strong> reply <strong>HELP</strong> for assistance, or get in touch through our contact page at <a href="https://pandatattoo.com/contact" target="_blank" rel="noopener noreferrer">https://pandatattoo.com/contact</a>.</li>
                            <li class="hd-legal-list-item"><strong>Carrier liability:</strong> mobile carriers are not liable for delayed or undelivered messages.</li>
                            <li class="hd-legal-list-item"><strong>Fees:</strong> standard message and data rates may apply.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Section 5 -->
            <section id="section-5" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">05</span>
                    <h2 class="hd-section-title">Call Recording</h2>
                </div>
                <div class="hd-section-body">
                    <p>Calls to and from our business phone number may be recorded for quality assurance and training purposes. Recordings are not retained indefinitely and are deleted on a routine basis. If you do not wish to be recorded, you may end the call or contact us in writing instead.</p>
                </div>
            </section>

            <!-- Section 6 -->
            <section id="section-6" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">06</span>
                    <h2 class="hd-section-title">Cookies and Tracking</h2>
                </div>
                <div class="hd-section-body">
                    <p>We use cookies and similar technologies to improve your browsing experience, analyze site traffic, and measure performance. This may include analytics services such as Google Analytics, which collect non-identifying information about how visitors use our site.</p>
                    <p>If we run advertising campaigns, third-party vendors including Google and Meta may use cookies to serve ads based on your prior visits to our website. You can opt out of personalized advertising through Google Ad Settings and Meta Ad Preferences, or through the Digital Advertising Alliance opt-out portal at <a href="https://optout.aboutads.info" target="_blank" rel="noopener noreferrer">optout.aboutads.info</a>.</p>
                    <p>You can adjust cookie settings in your browser, though disabling cookies may affect some site functionality.</p>
                </div>
            </section>

            <!-- Section 7 -->
            <section id="section-7" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">07</span>
                    <h2 class="hd-section-title">Data Retention</h2>
                </div>
                <div class="hd-section-body">
                    <p>We retain personal information for as long as needed to provide services and to maintain business and service records, and afterward only as required to meet legal, accounting, or tax obligations. Call recordings are retained on a short-term basis as described in Section 5.</p>
                </div>
            </section>

            <!-- Section 8 -->
            <section id="section-8" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">08</span>
                    <h2 class="hd-section-title">Your Choices</h2>
                </div>
                <div class="hd-section-body">
                    <p>You may request access to, correction of, or deletion of your personal information through our contact page at <a href="https://pandatattoo.com/contact" target="_blank" rel="noopener noreferrer">https://pandatattoo.com/contact</a>. You may opt out of promotional emails using the unsubscribe link in any message, and out of text messages by replying <strong>STOP</strong>.</p>
                </div>
            </section>

            <!-- Section 9 -->
            <section id="section-9" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">09</span>
                    <h2 class="hd-section-title">Security</h2>
                </div>
                <div class="hd-section-body">
                    <p>We use commercially reasonable measures to protect personal information against unauthorized access, disclosure, or loss. No method of transmission or storage is completely secure, and we cannot guarantee absolute security.</p>
                </div>
            </section>

            <!-- Section 10 -->
            <section id="section-10" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">10</span>
                    <h2 class="hd-section-title">Children's Privacy</h2>
                </div>
                <div class="hd-section-body">
                    <p>Our services are subject to a statutory minimum age and we do not knowingly collect personal information from anyone under 18. Tattooing of minors is governed by Florida law, and we require valid government-issued identification before any session. If you believe a minor has provided us with personal information, please contact us and we will remove it.</p>
                </div>
            </section>

            <!-- Section 11 -->
            <section id="section-11" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">11</span>
                    <h2 class="hd-section-title">Changes to This Policy</h2>
                </div>
                <div class="hd-section-body">
                    <p>We may update this Privacy Policy from time to time. Changes will be posted with an updated effective date, and continued use of our website constitutes acceptance of those updates.</p>
                </div>
            </section>

            <!-- Section 12 -->
            <section id="section-12" class="hd-legal-section">
                <div class="hd-section-header">
                    <span class="hd-section-badge">12</span>
                    <h2 class="hd-section-title">Contact Us</h2>
                </div>
                <div class="hd-section-body">
                    <p>Questions about this Privacy Policy can be sent through our contact page at <a href="https://pandatattoo.com/contact" target="_blank" rel="noopener noreferrer">https://pandatattoo.com/contact</a>.</p>
                    
                    <div style="margin-top: 20px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,0.1);">
                        <p style="margin: 0; font-weight: 700; color: #ffffff; text-transform: uppercase; letter-spacing: 0.05em;">Panda Tattoo LLC</p>
                        <p style="margin: 6px 0 0 0; color: rgba(255,255,255,0.8); line-height: 1.6;">
                            <a href="https://maps.google.com/?q=254+NW+36th+St,+Miami,+FL+33127" target="_blank" rel="noopener noreferrer" style="color: rgba(255,255,255,0.85) !important;">254 NW 36th Street, Miami, FL 33127</a><br>
                            Direct Phone: <a href="tel:7869199998" style="color: #ffffff !important;">(786) 919-9998</a><br>
                            Hours: Mon &ndash; Sun 11:00 AM &ndash; 9:00 PM (Open Daily)
                        </p>
                    </div>
                </div>
            </section>

        </main>

        <!-- Studio Contact Footer Card -->
        <footer class="hd-legal-contact-card">
            <img src="https://pandatattoo.com/wp-content/uploads/2025/05/panda-logotype-bone-scaled.png" alt="Panda Tattoo Miami" class="hd-legal-contact-logo" loading="lazy">
            <div class="hd-legal-contact-address">
                <strong>Panda Tattoo Studio</strong>
                <a href="https://maps.google.com/?q=254+NW+36th+St,+Miami,+FL+33127" target="_blank" rel="noopener noreferrer" style="color: rgba(255, 255, 255, 0.85) !important; text-decoration: none !important;">
                    <span>254 NW 36th St, Miami, FL 33127 &bull; Wynwood / Midtown Arts District</span>
                </a>
                <div class="hd-contact-info-pills">
                    <a href="tel:7869199998" class="hd-contact-info-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span>(786) 919-9998</span>
                    </a>
                    <span class="hd-contact-info-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span>Mon &ndash; Sun: 11:00 AM &ndash; 9:00 PM</span>
                    </span>
                </div>
            </div>
            <div class="hd-contact-btn-group" x-data>
                <a href="/contact" class="hd-contact-action-btn" aria-label="Contact Studio">
                    <span>Contact Studio</span>
                </a>
                <button type="button" @click="$dispatch('open-booking-modal')" onclick="window.dispatchEvent(new CustomEvent('open-booking-modal'))" class="hd-contact-action-btn hd-btn-secondary ghl-booking-btn" aria-label="Book Tattoo Consultation">
                    <span>Book Consultation</span>
                </button>
            </div>
        </footer>

    </div>
</div>

<!-- Floating Back to Top Button -->
<button type="button" class="hd-back-top" id="hdBackToTop" aria-label="Back to Top">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
</button>

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
// Include reusable booking modal template part if present
if (locate_template('template-parts/booking-modal.php')) {
    get_template_part('template-parts/booking-modal');
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Smooth Anchor Click Navigation
        document.querySelectorAll('.hd-toc-link').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId.startsWith('#')) {
                    const targetEl = document.querySelector(targetId);
                    if (targetEl) {
                        e.preventDefault();
                        const headerOffset = 100;
                        const elementPosition = targetEl.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Back to Top button logic
        const backToTopBtn = document.getElementById('hdBackToTop');
        if (backToTopBtn) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 400) {
                    backToTopBtn.classList.add('is-visible');
                } else {
                    backToTopBtn.classList.remove('is-visible');
                }
            }, { passive: true });

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>

<?php 
get_footer();
?>
