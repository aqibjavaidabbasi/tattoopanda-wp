<?php
/**
 * Template for /terms-and-conditions/
 *
 * @package Studio_Child
 */

// Load the full Terms and Conditions template from templates/
if ( file_exists( get_stylesheet_directory() . '/templates/terms-and-conditions.php' ) ) {
    require get_stylesheet_directory() . '/templates/terms-and-conditions.php';
} else {
    get_header();
    ?>
    <div class="hd-legal-page">
        <div class="hd-legal-container">
            <h1 class="hd-legal-title">Terms and Conditions</h1>
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
