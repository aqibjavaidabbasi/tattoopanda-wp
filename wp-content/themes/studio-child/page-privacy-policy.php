<?php
/**
 * Template for /privacy-policy/
 *
 * @package Studio_Child
 */

// Load the full Privacy Policy template from templates/
if ( file_exists( get_stylesheet_directory() . '/templates/privacy-policy.php' ) ) {
    require get_stylesheet_directory() . '/templates/privacy-policy.php';
} else {
    get_header();
    ?>
    <div class="hd-legal-page">
        <div class="hd-legal-container">
            <h1 class="hd-legal-title">Privacy Policy</h1>
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
    <?php
    get_footer();
}
