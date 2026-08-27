<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
// 

/**
 * Centralized Contentful API Configuration
 * 
 * Retrieves Contentful API credentials from environment variables or fallback values.
 * For production, set these as environment variables in wp-config.php:
 * define('CONTENTFUL_SPACE_ID', 'your_space_id');
 * define('CONTENTFUL_CMA_TOKEN', 'your_management_token');
 * define('CONTENTFUL_CDA_TOKEN', 'your_delivery_token');
 * define('CONTENTFUL_ENVIRONMENT', 'master');
 * 
 * @return array Configuration array with space_id, cma_token, cda_token, and environment
 */
function get_contentful_config() {
    static $config = null;
    
    // Return cached config if already loaded
    if ($config !== null) {
        return $config;
    }
    
    // Check for environment variables/constants first (secure method)
    $config = [
        'space_id' => defined('CONTENTFUL_SPACE_ID') ? CONTENTFUL_SPACE_ID : 'na4mk1p9pznd',
        'cma_token' => defined('CONTENTFUL_CMA_TOKEN') ? CONTENTFUL_CMA_TOKEN : 'CFPAT-1fvF5sp7OK4eijWg6jB5VogvyVuFZD9Fps61mLwfaq0',
        'cda_token' => defined('CONTENTFUL_CDA_TOKEN') ? CONTENTFUL_CDA_TOKEN : 'uJhOvrkvKTFfkWj9S1I3pas3Fy2FlmpDWQ8L2EhcyL8',
        'environment' => defined('CONTENTFUL_ENVIRONMENT') ? CONTENTFUL_ENVIRONMENT : 'master',
    ];
    
    return $config;
}

add_action('wp_ajax_send_otp_vote', 'send_otp_vote');
add_action('wp_ajax_nopriv_send_otp_vote', 'send_otp_vote');

add_action('wp_ajax_verify_otp_vote', 'verify_otp_vote');
add_action('wp_ajax_nopriv_verify_otp_vote', 'verify_otp_vote');

add_action('wp_ajax_test_votes_field', 'test_votes_field');
add_action('wp_ajax_nopriv_test_votes_field', 'test_votes_field');

function test_votes_field() {
    $artist_id = intval($_GET['artist_id'] ?? 0);

    if (!$artist_id) {
        wp_send_json_error(['message' => 'Artist ID is required']);
    }

$votes = get_post_meta($artist_id, 'votes', true);

    if ($votes === false) {
        wp_send_json_error(['message' => 'ACF field not found or artist ID invalid']);
    }

    wp_send_json_success([
        'artist_id' => $artist_id,
        'votes' => $votes
    ]);
}

add_action('wp_enqueue_scripts', 'enqueue_vote_script');

function enqueue_vote_script() {
    wp_enqueue_script('vote-js', get_stylesheet_directory_uri() . '/vote.js', ['jquery'], null, true);
    wp_localize_script('vote-js', 'vote_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}


function send_otp_vote() {
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $artist_id = intval($_POST['artist_id']);

    if (!is_email($email) || !$artist_id) {
        wp_send_json_error(['message' => 'Invalid request']);
    }

    $otp = rand(100000, 999999);
    $expires = time() + 300; // 5 mins
    $ip = $_SERVER['REMOTE_ADDR'];

    global $wpdb;
    $table = $wpdb->prefix . 'artist_votes';
    $today = current_time('Y-m-d');

    // Check if email already voted today for this artist
    $already_voted = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table WHERE email = %s AND artist_id = %d AND vote_date = %s AND verified = 1",
        $email, $artist_id, $today
    ));

    if ($already_voted > 0) {
        wp_send_json_error(['message' => 'You have already voted today']);
    }

    $wpdb->insert($table, [
        'email' => $email,
        'phone' => $phone,
        'ip_address' => $ip,
        'artist_id' => $artist_id,
        'otp' => $otp,
        'otp_expires_at' => date('Y-m-d H:i:s', $expires),
        'vote_date' => current_time('Y-m-d'),
        'created_at' => current_time('mysql'),
        'verified' => 0,
    ]);

    // Queue email for background processing
    wp_schedule_single_event(time() + 5, 'send_vote_otp_email', array(
        'email' => $email,
        'otp' => $otp,
        'artist_id' => $artist_id
    ));

    wp_send_json_success(['message' => 'OTP will be sent shortly']);
}

// Background email handler
add_action('send_vote_otp_email', 'process_vote_otp_email');
function process_vote_otp_email($args) {
    $result = wp_mail(
        $args['email'], 
        'Your Vote OTP - Tattoo Panda', 
        "Your one-time password is: {$args['otp']}\n\nThis code expires in 5 minutes.",
        array('Content-Type: text/html; charset=UTF-8')
    );
    
    if (!$result) {
        error_log("Failed to send OTP email to: {$args['email']}");
    }
}
function verify_otp_vote() {
    $email = sanitize_email($_POST['email']);
    $artist_id = intval($_POST['artist_id']);
    $user_otp = sanitize_text_field($_POST['otp']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $today = date('Y-m-d');

    global $wpdb;
    $table = $wpdb->prefix . 'artist_votes';

    $record = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table WHERE email = %s AND artist_id = %d ORDER BY id DESC LIMIT 1",
        $email, $artist_id
    ));

    if (!$record || $record->otp != $user_otp || strtotime($record->otp_expires_at) < time()) {
        wp_send_json_error(['message' => 'Invalid or expired OTP']);
    }

    // Check IP + verified vote today
    $ip_check = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table WHERE ip_address = %s AND artist_id = %d AND vote_date = %s AND verified = 1",
        $ip, $artist_id, $today
    ));

    if ($ip_check > 0) {
        wp_send_json_error(['message' => 'You have already voted from this IP today']);
    }

    // Check email already voted today
    $email_check = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table WHERE email = %s AND artist_id = %d AND vote_date = %s AND verified = 1",
        $email, $artist_id, $today
    ));

    if ($email_check > 0) {
        wp_send_json_error(['message' => 'You have already voted today']);
    }

    $wpdb->update($table, ['verified' => 1], ['id' => $record->id]);

    $votes = get_field('votes', $artist_id);
    $votes = $votes ? $votes + 1 : 1;
    update_field('votes', $votes, $artist_id);

    wp_send_json_success(['message' => 'Vote recorded']);
}

// Function to get the nearest active contest and calculate countdown
function display_contest_countdown() {
    // Check for cached result first
    $cached_result = get_transient('active_contest_countdown');
    if ($cached_result !== false) {
        return $cached_result;
    }

    // Get current date/time in WordPress timezone
    $current_date = current_time('timestamp');

    // Query for active contests
    $args = array(
        'post_type' => 'contests',
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'activeinactive',
                'value' => 'active',
                'compare' => '='
            ),
            array(
                'key' => 'end_date',
                'value' => date('Y-m-d H:i:s', $current_date),
                'compare' => '>=',
                'type' => 'DATETIME'
            )
        ),
        'meta_key' => 'end_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => 1, // Get only the closest contest
        'no_found_rows' => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    );

    $contest_query = new WP_Query($args);

    if ($contest_query->have_posts()) {
        while ($contest_query->have_posts()) {
            $contest_query->the_post();
            $end_date = get_post_meta(get_the_ID(), 'end_date', true);
			$start_date = get_post_meta(get_the_ID(), 'start_date', true);
            // Convert end_date to timestamp
            $end_timestamp = strtotime($end_date);
			$start_timestamp = strtotime($start_date);
            if ($end_timestamp === false) {
                return '<p>Error: Invalid end date format.</p>';
            }

            // Calculate time difference
            $time_left = $end_timestamp - $current_date;
            if ($time_left <= 0) {
                return '<p>Contest has ended.</p>';
            }

            // Calculate days, hours, minutes
            $days = floor($time_left / (60 * 60 * 24));
            $hours = floor(($time_left % (60 * 60 * 24)) / (60 * 60));
            $minutes = floor(($time_left % (60 * 60)) / 60);

            // Build countdown string
            $countdown = '';
            if ($days > 0) {
                $countdown .= $days . 'd ';
            }
            if ($hours > 0 || $days > 0) {
                $countdown .= $hours . 'h ';
            }
            $countdown .= $minutes . 'm';
			
			$total_duration = $end_timestamp - $start_timestamp;

			$elapsed_time = min($current_date, $end_timestamp) - $start_timestamp;

			if ($total_duration <= 0) {
				return '<p>Error: Invalid contest duration.</p>';
			}

			$progress_percent = round(($elapsed_time / $total_duration) * 100);

			$progress_percent = max(0, min(100, $progress_percent));

			$result = [
				'countdown' => esc_html($countdown),
				'progress' => $progress_percent
			];
			
			// Cache result for 60 seconds
			set_transient('active_contest_countdown', $result, 60);
			
			wp_reset_postdata();
			return $result;
        }
    }

    wp_reset_postdata();
    $error_result = '<p>No active contests found.</p>';
    set_transient('active_contest_countdown', $error_result, 60);
    return $error_result;
}

// Clear cache when contest is updated
add_action('save_post_contests', function($post_id) {
    delete_transient('active_contest_countdown');
    delete_transient('active_contest_id');
});

add_action('delete_post', function($post_id) {
    if (get_post_type($post_id) === 'contests') {
        delete_transient('active_contest_countdown');
        delete_transient('active_contest_id');
    }
});

function au_find_media_by_filename($remote_url)
{
    $remote_url = trim(sanitize_url($remote_url));
    if (empty($remote_url)) {
        return 0;
    }

    // Try cache first
    $cache_key = 'media_' . md5($remote_url);
    $cached_id = wp_cache_get($cache_key, 'media_lookup');
    if ($cached_id !== false) {
        return $cached_id;
    }

    // Get the file extension
    $extension = sanitize_key(pathinfo($remote_url, PATHINFO_EXTENSION));

    // Get the absolute file URL
    $name = basename($remote_url, '.' . $extension); // Basename without extension

    // Optimized query: only attachments, only ID field
    global $wpdb;
    $attachment_id = $wpdb->get_var($wpdb->prepare(
        "SELECT ID 
        FROM {$wpdb->prefix}posts
        WHERE post_type = 'attachment'
        AND post_mime_type LIKE %s
        AND guid LIKE %s
        ORDER BY ID DESC
        LIMIT 1",
        '%' . $extension . '%',
        '%/' . $wpdb->esc_like($name) . '%.' . $extension
    ));

    $result = $attachment_id ? intval($attachment_id) : 0;
    
    // Cache for 1 hour
    wp_cache_set($cache_key, $result, 'media_lookup', 3600);
    
    return $result;
}

function store_artist_to_custom_post($contact_form) {
    // Log start of function
    error_log('Starting store_artist_to_custom_post');

    // Check form title
    $form_title = $contact_form->title;
    if ($form_title !== 'Nomination Form') {
        error_log('Form title does not match: ' . $form_title);
        return;
    }

    // Get CF7 submission instance
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        error_log('No CF7 submission instance found.');
        $submission->set_response('Error: Submission failed.');
        $submission->set_status('validation_failed');
        return;
    }

    $data = $submission->get_posted_data();
    $files = $submission->uploaded_files();
	


    // Sanitize and validate inputs
    $artist_name = !empty($data['artist-name']) ? sanitize_text_field($data['artist-name']) : '';
    $ig_handle = !empty($data['ig-handle']) ? sanitize_text_field($data['ig-handle']) : '';
    $why_compete = !empty($data['why-compete']) ? sanitize_textarea_field($data['why-compete']) : '';
    $portfolio_link = !empty($data['portfolio-link']) ? esc_url_raw($data['portfolio-link']) : '';

    if (empty($artist_name)) {
        error_log('Artist name is required.');
        $submission->set_response('Error: Artist name is required.');
        $submission->set_status('validation_failed');
        return;
    }
    
	if ($submission) {
		$uploaded_files = $submission->uploaded_files();

		if (!empty($uploaded_files['artist-photo'][0]) && file_exists($uploaded_files['artist-photo'][0])) {
			$source_path = $uploaded_files['artist-photo'][0];
			$filename = basename($source_path);

			// Get upload directory info
			$wp_upload_dir = wp_upload_dir(); // Gives 'path' and 'url'
			$destination_dir = $wp_upload_dir['path'];
			$destination_url = $wp_upload_dir['url'];

			$destination_path = trailingslashit($destination_dir) . $filename;
			$final_url = trailingslashit($destination_url) . $filename;

			// Move the file
			if (!file_exists($destination_path)) {
				if (!rename($source_path, $destination_path)) {
					error_log("Failed to move file: $source_path to $destination_path");
					$submission->set_response('Photo upload failed. Please try again.');
					$submission->set_status('validation_failed');
					return;
				}
			}

			// Use the final URL wherever needed
			$photo_url = $final_url;
		}
	}

    // Verify post type exists
    if (!post_type_exists('voting-leaderboard')) {
        error_log('Post type "voting-leaderboard" does not exist.');
        $submission->set_response('Error: Invalid post type.');
        $submission->set_status('validation_failed');
        return;
    }

    // Create artist post
    $post_id = wp_insert_post([
        'post_type'   => 'voting-leaderboard',
        'post_title'  => $artist_name,
        'post_status' => 'publish',
    ]);

    if (is_wp_error($post_id)) {
        error_log('Error inserting post: ' . $post_id->get_error_message());
        $submission->set_response('Error: Failed to create artist post.');
        $submission->set_status('validation_failed');
        return;
    } elseif ($post_id) {
        // Save meta fields
        update_post_meta($post_id, 'artist_name', $artist_name);
        update_post_meta($post_id, 'ig_handle', $ig_handle);
        update_post_meta($post_id, 'why_compete', $why_compete);
        update_post_meta($post_id, 'portfolio_link', $portfolio_link);
        update_post_meta($post_id, 'artist_photo', $photo_url);
        update_post_meta($post_id, 'votes', 0);
        update_post_meta($post_id, 'rank', 0);
        update_post_meta($post_id, 'feature_in_round', false);

        error_log('Post created successfully with ID: ' . $post_id);
        $submission->set_response('Submission successful!');
    } else {
        error_log('Post creation failed for unknown reasons.');
        $submission->set_response('Error: Failed to create post.');
        $submission->set_status('validation_failed');
        return;
    }
}

add_action('wpcf7_before_send_mail', 'store_artist_to_custom_post');


// alpine js cdn
function load_alpine() {
    wp_enqueue_script(
        'alpine',
        'https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js',
        [],
        '3.14.0',
        true
    );
    
    add_filter('script_loader_tag', 'add_defer_to_alpine', 10, 2);
}
add_action('wp_enqueue_scripts', 'load_alpine');

function add_defer_to_alpine($tag, $handle) {
    if ($handle === 'alpine') {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}

// Enqueue animate.css properly
function enqueue_animate_css() {
    wp_enqueue_style(
        'animate-css',
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
        [],
        '4.1.1'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_animate_css');

// api route for booking form

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/booking-submit', [
        'methods' => 'POST',
        'callback' => 'handle_booking_submission',
    ]);
});

/**
 * Authoritative server-side artist slug -> Contentful Entry ID map.
 *
 * The browser submits only a slug. The backend resolves the Contentful ID.
 * Slugs match the canonical $artist['slug'] values returned by get_contentful_artists().
 * IDs confirmed from Contentful CMA API - never trust browser-submitted IDs.
 */
function get_artist_contentful_map() {
    return [
        'ashley'      => '4HTZPxDL5FIlZPIWQYOtDA',
        'alex'        => '4cLACT6oSvUnR7fBdr3EUI',
        'panda'       => '1UCE5riOhbyXo9TSf7K9vH',
        'onyx'        => '6L3zJOoVqFSJfOoJYsmuuQ',
        'chris-nunez' => '5kYApkY63VRoKWYI191tx9',
        'ilay'        => '5fbaDqOJYbSBydlzOOThFV',
        'edwin'       => '5NHcTTLn7bYS4v4yFWIEtf',
        'dani-luz'    => '1zLMKzw2gImumAgh3oZCUh',
        'sophie'      => '1rOSDfszUKQklCNUj6UZ5E',
    ];
}

function handle_booking_submission($request) {
    $params = $request->get_params(); 
    $files  = $request->get_file_params();

    // --- Contentful Integration Start ---
    $contentful = get_contentful_config();
    $space_id = $contentful['space_id'];
    $cma_token = $contentful['cma_token'];
    $environment_id = $contentful['environment'];

    $asset_id = null;

    // ---------- 1. IMAGE UPLOAD HANDLING ----------
    if (!empty($files['tattooImage']) && $files['tattooImage']['error'] === UPLOAD_ERR_OK) {
        $file = $files['tattooImage'];

        // A. Upload binary
        $upload = wp_remote_post("https://upload.contentful.com/spaces/$space_id/uploads", [
            'timeout' => 15,
            'headers' => [
                'Authorization' => 'Bearer ' . $cma_token,
                'Content-Type'  => 'application/octet-stream'
            ],
            'body' => file_get_contents($file['tmp_name'])
        ]);

        if (!is_wp_error($upload) && wp_remote_retrieve_response_code($upload) === 201) {
            $upload_id = json_decode(wp_remote_retrieve_body($upload))->sys->id;

            // B. Create localized Asset pointing to the Upload
            $asset_body = [
                "fields" => [
                    "title" => ["en-US" => "Tattoo Concept - " . sanitize_text_field($params['fullName'])],
                    "file"  => [
                        "en-US" => [
                            "contentType" => $file['type'],
                            "fileName"    => sanitize_file_name($file['name']),
                            "uploadFrom"  => [
                                "sys" => ["type" => "Link", "linkType" => "Upload", "id" => $upload_id]
                            ]
                        ]
                    ]
                ]
            ];

            $asset = wp_remote_post("https://api.contentful.com/spaces/$space_id/environments/$environment_id/assets", [
                'timeout' => 15,
                'headers' => [
                    'Authorization' => 'Bearer ' . $cma_token,
                    'Content-Type'  => 'application/vnd.contentful.management.v1+json'
                ],
                'body' => json_encode($asset_body)
            ]);

            if (!is_wp_error($asset) && wp_remote_retrieve_response_code($asset) === 201) {
                $asset_data = json_decode(wp_remote_retrieve_body($asset));
                $asset_id = $asset_data->sys->id;
                $asset_version = $asset_data->sys->version;

                // C. Process the asset for Contentful Delivery
                wp_remote_request("https://api.contentful.com/spaces/$space_id/environments/$environment_id/assets/$asset_id/files/en-US/process", [
                    'method'  => 'PUT',
                    'timeout' => 15,
                    'headers' => [
                        'Authorization'        => 'Bearer ' . $cma_token,
                        'X-Contentful-Version' => $asset_version
                    ]
                ]);
				
				   // D. Wait for processing to complete, then publish the Asset.
                // The process call is async — Contentful increments the version once the
                // file is ready. We poll GET /assets/{id} until the upload link is gone
                // (replaced by a real URL), which signals processing is done, then we
                // grab the current version and call PUT /assets/{id}/published.
                $processed_version = null;
                $max_attempts      = 6;   // up to ~3 s total
                $sleep_ms          = 500; // 500 ms between polls

                for ($attempt = 0; $attempt < $max_attempts; $attempt++) {
                    usleep($sleep_ms * 1000);

                    $asset_check = wp_remote_get(
                        "https://api.contentful.com/spaces/$space_id/environments/$environment_id/assets/$asset_id",
                        [
                            'timeout' => 10,
                            'headers' => ['Authorization' => 'Bearer ' . $cma_token]
                        ]
                    );

                    if (!is_wp_error($asset_check) && wp_remote_retrieve_response_code($asset_check) === 200) {
                        $asset_check_data = json_decode(wp_remote_retrieve_body($asset_check));
                        $file_details     = $asset_check_data->fields->file->{'en-US'} ?? null;

                        // Processing is complete when the 'uploadFrom' link is gone and
                        // a real 'url' is present on the file object.
                        if ($file_details && !empty($file_details->url) && empty($file_details->uploadFrom)) {
                            $processed_version = $asset_check_data->sys->version;
                            break;
                        }
                    }
                }

                // Publish the Asset so it is visible via the Delivery API.
                // If polling timed out we still attempt with the last known version —
                // the worst case is a 409 Conflict which we silently swallow; the
                // entry will still be created and the photo can be manually published.
                $publish_version = $processed_version ?? ($asset_version + 1);

                wp_remote_request(
                    "https://api.contentful.com/spaces/$space_id/environments/$environment_id/assets/$asset_id/published",
                    [
                        'method'  => 'PUT',
                        'timeout' => 15,
                        'headers' => [
                            'Authorization'        => 'Bearer ' . $cma_token,
                            'X-Contentful-Version' => $publish_version
                        ]
                    ]
                );
            }
        }
    }


    // ---------- 2. ENTRY PAYLOAD CONSTRUCTION ----------
    $fields = [];
    
    // Map text requirements dynamically based on Contentful IDs discovered previously
    $field_map = [
        'fullName'          => 'fullName',
        'email'             => 'email',
        'phoneNumber'       => 'phoneNumber',
        'age'               => 'ageType',
        'gender'            => 'gender',
        'size'              => 'size',
        'color'             => 'colorType',
        'tattooDescription' => 'tattooDescription',
        'location'          => 'miamiStatus',
        'scheduleType'      => 'scheduleType',
        'desiredTiming'     => 'desiredTiming',
        'bodyPositionImage' => 'bodyPosition'
    ];

    foreach ($field_map as $post_key => $contentful_key) {
        if (!empty($params[$post_key])) {
            $fields[$contentful_key] = ["en-US" => sanitize_text_field($params[$post_key])];
        }
    }

   
    // Handle Artist Reference - validated server-side; browser never submits a Contentful ID
    $artist_slug = sanitize_key($params['artistSlug'] ?? '');
    $artist_map  = get_artist_contentful_map();

    if ($artist_slug === '') {
        return new WP_Error('missing_artist', 'Artist selection is required.', ['status' => 400]);
    }

    if ($artist_slug === 'no-preference') {
        // Valid: user explicitly chose no preference - omit artistName field entirely
        $artist_entry_id = null;
    } elseif (array_key_exists($artist_slug, $artist_map)) {
        // Valid known artist - resolve ID from authoritative map
        $artist_entry_id = $artist_map[$artist_slug];
    } else {
        // Unknown slug - reject (catches tampered slugs and direct POST attempts)
        return new WP_Error('invalid_artist', 'Invalid artist selection.', ['status' => 400]);
    }

    if ($artist_entry_id) {
        $fields['artistName'] = [
            'en-US' => [
                'sys' => [
                    'type'     => 'Link',
                    'linkType' => 'Entry',
                    'id'       => $artist_entry_id,
                ]
            ]
        ];
    }

    // Map Arrays into Comma string (Styles Array setup)
    if (!empty($params['styles']) && is_array($params['styles'])) {
        $styles_string = implode(", ", array_map('sanitize_text_field', $params['styles']));
        $fields['selectedTattooStyles'] = ["en-US" => $styles_string];
    }

    // Map Artist Add-ons (if any selected)
    if (!empty($params['artist_addons']) && is_array($params['artist_addons'])) {
        $addons_string = implode(", ", array_map('sanitize_text_field', $params['artist_addons']));
        $fields['artistAddons'] = ["en-US" => $addons_string];
    }

    // Checkboxes
    if (!empty($params['somethingDifferent'])) {
        $fields['somethingDifferent'] = ["en-US" => 'Something different'];
    }

    // Timestamp
    $fields['submissionDate'] = ["en-US" => gmdate("c")]; // Standard ISO 8601

    // Attach processed image Asset Link
    if ($asset_id) {
        $fields["tattooImage"] = [
            "en-US" => [
                "sys" => ["type" => "Link", "linkType" => "Asset", "id" => $asset_id]
            ]
        ];
    }

    // ---------- 3. CREATE & PUBLISH ENTRY ----------
    $entry = wp_remote_post("https://api.contentful.com/spaces/$space_id/environments/$environment_id/entries", [
        'timeout' => 15,
        'headers' => [
            'Authorization'             => 'Bearer ' . $cma_token,
            'Content-Type'              => 'application/vnd.contentful.management.v1+json',
            'X-Contentful-Content-Type' => 'appointments'
        ],
        'body' => json_encode(["fields" => $fields])
    ]);

    $response_code = wp_remote_retrieve_response_code($entry);

    // Provide the FULL Exact JSON string back if it fails
    if (is_wp_error($entry) || $response_code >= 400) {
        $error_body = wp_remote_retrieve_body($entry);
        return [
            'status'  => 'error', 
            'message' => 'Failed to create entry. Contentful says: ' . $error_body
        ];
    }

    // Extract payload to push a simultaneous publish command
    $entry_data = json_decode(wp_remote_retrieve_body($entry));
    $entry_id = $entry_data->sys->id;
    $entry_version = $entry_data->sys->version;

    $publish = wp_remote_request("https://api.contentful.com/spaces/$space_id/environments/$environment_id/entries/$entry_id/published", [
        'method'  => 'PUT',
        'timeout' => 15,
        'headers' => [
            'Authorization'        => 'Bearer ' . $cma_token,
            'X-Contentful-Version' => $entry_version
        ]
    ]);

    return [
        'status' => 'success',
        'entry'  => json_decode(wp_remote_retrieve_body($publish))
    ];
}

// --- Contentful Artists Integration ---
/**
 * Fetch artists from Contentful
 * 
 * Contentful Artist Content Type Fields:
 * - Name (Entry title, Short text) - Artist's full name
 * - Bio (Long text) - Artist biography
 * - Artist photo (Media) - Profile picture
 * - Booking link (Short text) - Direct booking URL
 * - Date (Short text) - Join date or other date info
 * - Instagram (Short text) - Instagram handle
 * - Portfolio Images (Media, multiple files) - Gallery images
 * - Personal Website (Short text, omitted from API) - Personal website URL
 * - Portfolio (Reference, omitted from API) - Referenced portfolio entries
 * 
 * @param array $args Optional arguments for fetching artists
 *                    - limit: Number of artists to fetch (default: 100)
 *                    - order: Order by field (default: 'fields.Name')
 *                    - slug: Fetch specific artist by generated slug
 * @return array Array of artist data or empty array on error
 */
function get_contentful_artists($args = []) {
    // Get Contentful configuration
    $contentful = get_contentful_config();
    $space_id = $contentful['space_id'];
    $access_token = $contentful['cda_token']; // Use Delivery API token for read operations
    $environment = $contentful['environment'];
    
    // Check if CDA token is configured
    if (empty($access_token) || $access_token === 'YOUR_CONTENTFUL_DELIVERY_API_TOKEN') {
        error_log('Contentful CDA token not configured. Please set CONTENTFUL_CDA_TOKEN in wp-config.php');
        return [];
    }
    
    // Check cache first
    $cache_key = 'contentful_artists_' . md5(serialize($args));
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }
    
    // Build query parameters
    $query_params = [
        'content_type' => 'artists',
        'limit' => isset($args['limit']) ? intval($args['limit']) : 100,
    ];
    
    // Filter by name if searching by slug (since slug field doesn't exist in Contentful)
    if (!empty($args['slug'])) {
        // We'll filter by name and generate slug from it
        // Or we can filter in PHP after fetching
        $query_params['limit'] = 100; // Fetch all and filter in PHP
    }
    
    // Add ordering
    if (!empty($args['order'])) {
        $query_params['order'] = $args['order'];
    } else {
        $query_params['order'] = 'fields.artistName';
    }
    
    $url = sprintf(
        'https://cdn.contentful.com/spaces/%s/environments/%s/entries?%s',
        $space_id,
        $environment,
        http_build_query($query_params)
    );
    
    error_log('Contentful API Request URL: ' . $url);
    
    $response = wp_remote_get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $access_token,
        ],
        'timeout' => 15,
    ]);
    
    if (is_wp_error($response)) {
        error_log('Contentful artists fetch error: ' . $response->get_error_message());
        return [];
    }
    
    $code = wp_remote_retrieve_response_code($response);
    if ($code !== 200) {
        $error_body = wp_remote_retrieve_body($response);
        error_log('Contentful artists fetch failed with code: ' . $code . ' - Response: ' . $error_body);
        return [];
    }
    
    $body = json_decode(wp_remote_retrieve_body($response), true);
    
    error_log('Contentful API returned ' . count($body['items'] ?? []) . ' artists');
    
    if (empty($body['items'])) {
        return [];
    }
    
    // Process and normalize the data
    $artists = [];
    foreach ($body['items'] as $item) {
        $fields = $item['fields'] ?? [];
        
        // Get artist name (Contentful uses camelCase field names)
        $artist_name = $fields['artistName'] ?? $fields['Name'] ?? $fields['name'] ?? '';
        
        // Generate slug from name since Contentful model doesn't have slug field
        $generated_slug = sanitize_title($artist_name);
        
        // If filtering by slug, skip non-matching artists (normalize both for comparison)
        if (!empty($args['slug'])) {
            $normalized_search_slug = sanitize_title($args['slug']);
            error_log("Comparing artist '$artist_name': generated slug='$generated_slug' vs search slug='$normalized_search_slug'");
            if ($generated_slug !== $normalized_search_slug) {
                continue;
            }
            error_log("Artist match found: '$artist_name' with ID: " . $item['sys']['id']);
        }
        
        // Extract profile picture URL from asset (field: 'artistPhoto')
        $profile_picture = '';
        $photo_field = $fields['artistPhoto'] ?? $fields['Artist photo'] ?? null;
        if (!empty($photo_field['sys']['id'])) {
            $asset_id = $photo_field['sys']['id'];
            $profile_picture = get_contentful_asset_url($asset_id, $body['includes']['Asset'] ?? []);
        }
        
        // Extract portfolio images (field: 'portfolioImages')
        $portfolio_images = [];
        $portfolio_field = $fields['portfolioImages'] ?? $fields['Portfolio Images'] ?? [];
        if (!empty($portfolio_field) && is_array($portfolio_field)) {
            foreach ($portfolio_field as $image_ref) {
                if (!empty($image_ref['sys']['id'])) {
                    $asset_id = $image_ref['sys']['id'];
                    $image_url = get_contentful_asset_url($asset_id, $body['includes']['Asset'] ?? []);
                    if ($image_url) {
                        $portfolio_images[] = [
                            'url' => $image_url,
                            'id' => $asset_id,
                            'alt' => $artist_name
                        ];
                    }
                }
            }
        }
        
        $artists[] = [
            'id' => $item['sys']['id'],
            'name' => $artist_name,
            'slug' => $generated_slug,
            'bio' => $fields['bio'] ?? $fields['Bio'] ?? '',
            'instagram_handle' => $fields['instagram'] ?? $fields['Instagram'] ?? '',
            'profile_picture' => $profile_picture,
            'portfolio_images' => $portfolio_images,
            'booking_link' => $fields['bookingLink'] ?? $fields['Booking link'] ?? '',
            'date' => $fields['date'] ?? $fields['Date'] ?? '',
            'personal_website' => $fields['personalWebsite'] ?? $fields['Personal Website'] ?? '',
        ];
    }
    
    // Cache for 5 minutes
    set_transient($cache_key, $artists, 5 * MINUTE_IN_SECONDS);
    
    return $artists;
}

/**
 * Helper function to extract asset URL from Contentful includes
 */
function get_contentful_asset_url($asset_id, $assets) {
    if (empty($assets)) {
        return '';
    }
    
    foreach ($assets as $asset) {
        if ($asset['sys']['id'] === $asset_id) {
            $file = $asset['fields']['file'] ?? [];
            if (!empty($file['url'])) {
                // Add https: if URL starts with //
                $url = $file['url'];
                if (strpos($url, '//') === 0) {
                    $url = 'https:' . $url;
                }
                return $url;
            }
        }
    }
    
    return '';
}

/**
 * Get a single artist by slug from Contentful
 * Slug is generated from the artist's Name field
 */
function get_contentful_artist_by_slug($slug) {
    $artists = get_contentful_artists(['slug' => $slug]);
    return !empty($artists) ? $artists[0] : null;
}

/**
 * Get a single artist by Contentful entry ID
 * 
 * @param string $entry_id The Contentful entry ID
 * @return array|null Artist data or null if not found
 */
function get_contentful_artist_by_id($entry_id) {
    // Get Contentful configuration
    $contentful = get_contentful_config();
    $space_id = $contentful['space_id'];
    $access_token = $contentful['cda_token'];
    $environment = $contentful['environment'];
    
    // Check cache first
    $cache_key = 'contentful_artist_' . $entry_id;
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }
    
    $url = sprintf(
        'https://cdn.contentful.com/spaces/%s/environments/%s/entries/%s',
        $space_id,
        $environment,
        $entry_id
    );
    
    $response = wp_remote_get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $access_token,
        ],
        'timeout' => 15,
    ]);
    
    if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
        return null;
    }
    
    $body = json_decode(wp_remote_retrieve_body($response), true);
    $fields = $body['fields'] ?? [];
    
    if (empty($fields)) {
        return null;
    }
    
    // Get artist name
    $artist_name = $fields['artistName'] ?? $fields['Name'] ?? $fields['name'] ?? '';

    
    // Process the single artist (simplified version without includes)
    $artist = [
        'id' => $entry_id,
        'name' => $artist_name,
        'slug' => sanitize_title($artist_name),
        'bio' => $fields['Bio'] ?? $fields['bio'] ?? '',
        'instagram_handle' => $fields['Instagram'] ?? $fields['instagram'] ?? '',
        'booking_link' => $fields['Booking link'] ?? $fields['bookingLink'] ?? '',
        'date' => $fields['Date'] ?? $fields['date'] ?? '',
        'personal_website' => $fields['Personal Website'] ?? $fields['personalWebsite'] ?? '',
        'profile_picture' => '', // Would need separate API call to get asset
        'portfolio_images' => [], // Would need separate API call to get assets
    ];
    
    // Cache for 5 minutes
    set_transient($cache_key, $artist, 5 * MINUTE_IN_SECONDS);
    
    return $artist;
}

/**
 * Clear Contentful artists cache
 */
function clear_contentful_artists_cache() {
    global $wpdb;
    // Clear all artist-related transients
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_contentful_artist%'");
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_contentful_artist%'");
}

// Add Contentful Diagnostics Admin Page
add_action('admin_menu', 'add_contentful_diagnostics_page');
function add_contentful_diagnostics_page() {
    add_menu_page(
        'Contentful Diagnostics',
        'Contentful',
        'manage_options',
        'contentful-diagnostics',
        'render_contentful_diagnostics_page',
        'dashicons-cloud',
        100
    );
}

function render_contentful_diagnostics_page() {
    // Handle cache clearing
    if (isset($_POST['clear_cache']) && check_admin_referer('clear_contentful_cache')) {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_contentful_%' OR option_name LIKE '_transient_timeout_contentful_%'");
        echo '<div class="notice notice-success"><p><strong>✓ Cache cleared successfully!</strong></p></div>';
    }
    
    $config = get_contentful_config();
    ?>
    <div class="wrap">
        <h1><span class="dashicons dashicons-cloud" style="font-size: 32px; width: 32px; height: 32px;"></span> Contentful Management</h1>
        
        <style>
            .contentful-tabs {
                margin: 20px 0;
                border-bottom: 1px solid #ccc;
            }
            .contentful-tabs button {
                background: none;
                border: none;
                padding: 12px 24px;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                color: #555;
                border-bottom: 3px solid transparent;
                transition: all 0.2s;
            }
            .contentful-tabs button:hover {
                color: #2271b1;
            }
            .contentful-tabs button.active {
                color: #2271b1;
                border-bottom-color: #2271b1;
            }
            .tab-content {
                display: none;
                padding: 20px 0;
            }
            .tab-content.active {
                display: block;
            }
            .success { color: #00a32a; font-weight: 600; }
            .error { color: #d63638; font-weight: 600; }
            .info-card {
                background: #f6f7f7;
                border-left: 4px solid #2271b1;
                padding: 15px;
                margin: 15px 0;
            }
            .stat-box {
                display: inline-block;
                background: #fff;
                border: 1px solid #c3c4c7;
                border-radius: 4px;
                padding: 20px;
                margin: 10px 10px 10px 0;
                min-width: 200px;
                text-align: center;
            }
            .stat-number {
                font-size: 36px;
                font-weight: 700;
                color: #2271b1;
                display: block;
            }
            .stat-label {
                color: #646970;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .copy-button {
                cursor: pointer;
            }
        </style>

        <!-- Cache Clear Button -->
        <form method="post" style="margin: 20px 0;">
            <?php wp_nonce_field('clear_contentful_cache'); ?>
            <button type="submit" name="clear_cache" class="button button-secondary">
                <span class="dashicons dashicons-update" style="vertical-align: middle;"></span> Clear Cache
            </button>
        </form>

        <!-- Tabs -->
        <div class="contentful-tabs">
            <button class="tab-button active" onclick="switchTab(event, 'api-connection')">
                <span class="dashicons dashicons-admin-plugins"></span> API Connection
            </button>
            <button class="tab-button" onclick="switchTab(event, 'artists')">
                <span class="dashicons dashicons-groups"></span> Artists
            </button>
            <button class="tab-button" onclick="switchTab(event, 'submissions')">
                <span class="dashicons dashicons-feedback"></span> Form Submissions
            </button>
        </div>

        <!-- API Connection Tab -->
        <div id="api-connection" class="tab-content active">
            <h2>API Configuration Status</h2>
            
            <table class="widefat">
                <thead>
                    <tr>
                        <th>Setting</th>
                        <th>Value</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Space ID</strong></td>
                        <td><code><?php echo esc_html($config['space_id']); ?></code></td>
                        <td><?php echo !empty($config['space_id']) ? '<span class="success">✓</span>' : '<span class="error">✗</span>'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Environment</strong></td>
                        <td><code><?php echo esc_html($config['environment']); ?></code></td>
                        <td><?php echo !empty($config['environment']) ? '<span class="success">✓</span>' : '<span class="error">✗</span>'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>CDA Token (Delivery)</strong></td>
                        <td><?php echo strlen($config['cda_token']) > 20 ? '<code>***' . substr($config['cda_token'], -8) . '</code>' : '<span class="error">Not configured</span>'; ?></td>
                        <td><?php echo strlen($config['cda_token']) > 20 ? '<span class="success">✓</span>' : '<span class="error">✗</span>'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>CMA Token (Management)</strong></td>
                        <td><?php echo strlen($config['cma_token']) > 20 ? '<code>***' . substr($config['cma_token'], -8) . '</code>' : '<span class="error">Not configured</span>'; ?></td>
                        <td><?php echo strlen($config['cma_token']) > 20 ? '<span class="success">✓</span>' : '<span class="error">✗</span>'; ?></td>
                    </tr>
                </tbody>
            </table>

            <h3 style="margin-top: 30px;">Connection Test</h3>
            <?php
            $test_url = sprintf(
                'https://cdn.contentful.com/spaces/%s/environments/%s/entries?content_type=artists&limit=1',
                $config['space_id'],
                $config['environment']
            );
            
            $test_response = wp_remote_get($test_url, [
                'headers' => ['Authorization' => 'Bearer ' . $config['cda_token']],
                'timeout' => 15,
            ]);
            
            if (!is_wp_error($test_response) && wp_remote_retrieve_response_code($test_response) === 200) {
                echo '<div class="info-card" style="border-left-color: #00a32a;">';
                echo '<p class="success">✓ API Connection Successful</p>';
                echo '<p>Successfully connected to Contentful API and retrieved data.</p>';
                echo '</div>';
            } else {
                $error_msg = is_wp_error($test_response) ? $test_response->get_error_message() : 'HTTP ' . wp_remote_retrieve_response_code($test_response);
                echo '<div class="info-card" style="border-left-color: #d63638;">';
                echo '<p class="error">✗ API Connection Failed</p>';
                echo '<p>Error: ' . esc_html($error_msg) . '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Artists Tab -->
        <div id="artists" class="tab-content">
            <?php
            $all_artists = get_contentful_artists(['limit' => 100, 'order' => 'fields.artistName']);
            ?>
            
            <div class="stat-box">
                <span class="stat-number"><?php echo count($all_artists); ?></span>
                <span class="stat-label">Total Artists</span>
            </div>

            <h2 style="margin-top: 30px;">Artist Booking Form Links</h2>
            <p>Share these booking form links with your artists to post on their social media profiles.</p>
            <p style="color: #666; font-size: 13px; font-style: italic;">URLs include both slug (for SEO) and ID (for reliable matching): <code>/booking/?artist=alex&artistId=123abc</code></p>
            
            <?php if (!empty($all_artists)): ?>
                <table class="widefat">
                    <thead>
                        <tr>
                            <th>Artist Name</th>
                            <th>Slug (used in URL)</th>
                            <th>Contentful ID</th>
                            <th>Booking Form URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $booking_page_url = get_site_url() . '/booking/';
                        foreach ($all_artists as $artist): 
                            // Use both slug (for SEO) and ID (for direct lookup)
                            $booking_url = $booking_page_url . '?artist=' . urlencode($artist['slug']) . '&artistId=' . urlencode($artist['id']);
                        ?>
                            <tr>
                                <td><strong><?php echo esc_html($artist['name']); ?></strong></td>
                                <td><code><?php echo esc_html($artist['slug']); ?></code></td>
                                <td><code style="font-size: 11px;"><?php echo esc_html($artist['id']); ?></code></td>
                                <td><code style="background: #f0f0f1; padding: 5px; display: block;"><?php echo esc_html($booking_url); ?></code></td>
                                <td>
                                    <button class="button button-small copy-button" onclick="copyToClipboard('<?php echo esc_js($booking_url); ?>', this)">
                                        <span class="dashicons dashicons-admin-page"></span> Copy
                                    </button>
                                    <a href="<?php echo esc_url($booking_url); ?>" target="_blank" class="button button-small">
                                        <span class="dashicons dashicons-external"></span> Test
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div style="margin-top: 20px;">
                    <button class="button button-primary" onclick="copyAllArtistLinks()">
                        <span class="dashicons dashicons-clipboard"></span> Copy All Links
                    </button>
                </div>
            <?php else: ?>
                <p class="error">No artists found in Contentful.</p>
            <?php endif; ?>
        </div>

        <!-- Form Submissions Tab -->
        <div id="submissions" class="tab-content">
            <?php
            // Get appointments from Contentful
            $appointments_url = sprintf(
                'https://cdn.contentful.com/spaces/%s/environments/%s/entries?content_type=appointments&order=-sys.createdAt&limit=100',
                $config['space_id'],
                $config['environment']
            );
            
            $appointments_response = wp_remote_get($appointments_url, [
                'headers' => ['Authorization' => 'Bearer ' . $config['cda_token']],
                'timeout' => 15,
            ]);
            
            $appointments = [];
            if (!is_wp_error($appointments_response) && wp_remote_retrieve_response_code($appointments_response) === 200) {
                $appointments_data = json_decode(wp_remote_retrieve_body($appointments_response), true);
                $appointments = $appointments_data['items'] ?? [];
            }
            ?>
            
            <div class="stat-box">
                <span class="stat-number"><?php echo count($appointments); ?></span>
                <span class="stat-label">Total Submissions</span>
            </div>

            <h2 style="margin-top: 30px;">Recent Form Submissions</h2>
            
            <!-- Filter -->
            <div style="margin: 20px 0;">
                <input type="text" id="submission-search" placeholder="Search by name, email..." class="regular-text" onkeyup="filterSubmissions()">
                <select id="artist-filter" onchange="filterSubmissions()" style="margin-left: 10px;">
                    <option value="">All Artists</option>
                    <?php 
                    $artist_links = $appointments_data['includes']['Entry'] ?? [];
                    $unique_artists = [];
                    foreach ($artist_links as $entry) {
                        if (isset($entry['fields']['artistName'])) {
                            $unique_artists[$entry['sys']['id']] = $entry['fields']['artistName'];
                        }
                    }
                    foreach ($unique_artists as $id => $name): ?>
                        <option value="<?php echo esc_attr($id); ?>"><?php echo esc_html($name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (!empty($appointments)): ?>
                <table class="widefat" id="submissions-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Artist</th>
                            <th>Style</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): 
                            $fields = $appointment['fields'] ?? [];
                            $created = new DateTime($appointment['sys']['createdAt']);
                            
                            // Get artist name from reference
                            $artist_ref = $fields['artistName']['sys']['id'] ?? '';
                            $artist_name = 'Not specified';
                            if ($artist_ref) {
                                foreach ($artist_links as $entry) {
                                    if ($entry['sys']['id'] === $artist_ref) {
                                        $artist_name = $entry['fields']['artistName'] ?? 'Unknown';
                                        break;
                                    }
                                }
                            }
                        ?>
                            <tr data-artist="<?php echo esc_attr($artist_ref); ?>">
                                <td><?php echo $created->format('M j, Y g:i A'); ?></td>
                                <td><strong><?php echo esc_html($fields['fullName'] ?? 'N/A'); ?></strong></td>
                                <td><?php echo esc_html($fields['email'] ?? 'N/A'); ?></td>
                                <td><?php echo esc_html($fields['phoneNumber'] ?? 'N/A'); ?></td>
                                <td><?php echo esc_html($artist_name); ?></td>
                                <td><?php echo esc_html($fields['selectedTattooStyles'] ?? 'N/A'); ?></td>
                                <td><span class="success">●</span> Received</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No form submissions found.</p>
            <?php endif; ?>
        </div>

        <script>
        function switchTab(evt, tabName) {
            // Hide all tab contents
            const contents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < contents.length; i++) {
                contents[i].classList.remove('active');
            }
            
            // Remove active class from all buttons
            const buttons = document.getElementsByClassName('tab-button');
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active');
            }
            
            // Show current tab and mark button as active
            document.getElementById(tabName).classList.add('active');
            evt.currentTarget.classList.add('active');
        }

        function copyToClipboard(text, button) {
            navigator.clipboard.writeText(text).then(function() {
                const originalHTML = button.innerHTML;
                button.innerHTML = '<span class="dashicons dashicons-yes"></span> Copied!';
                setTimeout(function() {
                    button.innerHTML = originalHTML;
                }, 2000);
            });
        }

        function copyAllArtistLinks() {
            const rows = document.querySelectorAll('#artists tbody tr');
            const links = [];
            rows.forEach(row => {
                const name = row.querySelector('td:first-child').textContent;
                const url = row.querySelector('code').textContent;
                links.push(name + ': ' + url);
            });
            
            navigator.clipboard.writeText(links.join('\n\n')).then(function() {
                alert('✓ All ' + links.length + ' booking links copied to clipboard!');
            });
        }

        function filterSubmissions() {
            const searchValue = document.getElementById('submission-search').value.toLowerCase();
            const artistFilter = document.getElementById('artist-filter').value;
            const rows = document.querySelectorAll('#submissions-table tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const artistId = row.getAttribute('data-artist');
                
                const matchesSearch = searchValue === '' || text.includes(searchValue);
                const matchesArtist = artistFilter === '' || artistId === artistFilter;
                
                row.style.display = (matchesSearch && matchesArtist) ? '' : 'none';
            });
        }
        </script>
    </div>
    <?php
}

// 1. Add ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Studio Settings',
        'menu_title' => 'Studio Settings',
        'menu_slug'  => 'studio-setting',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}

function get_studio_status() {

    $opening_time = get_field('opening_time', 'option'); // e.g. 09:00
    $closing_time = get_field('closing_time', 'option'); // e.g. 22:00
    $timezone     = get_field('timezone', 'option') ?: 'America/New_York';

    if (!$opening_time || !$closing_time) {
        return [
            'status' => 'Unknown',
            'current_time' => null,
            'timezone' => $timezone
        ];
    }

    $tz = new DateTimeZone($timezone);

    $now = new DateTime('now', $tz);
    $current_time = $now->format('H:i');

    $open = DateTime::createFromFormat('H:i', $opening_time, $tz);
    $close = DateTime::createFromFormat('H:i', $closing_time, $tz);

    // Align dates
    $open->setDate($now->format('Y'), $now->format('m'), $now->format('d'));
    $close->setDate($now->format('Y'), $now->format('m'), $now->format('d'));

    // Handle overnight (e.g. 10PM - 2AM)
    if ($close < $open) {
        $close->modify('+1 day');
        if ($now < $open) {
            $now->modify('+1 day');
        }
    }

    $status = ($now >= $open && $now <= $close) ? 'Open' : 'Closed';

    return [
        'status' => $status,
        'current_time' => $now->format('h:i A'),
        'timezone' => $timezone,
        'opening_time' => $opening_time,
        'closing_time' => $closing_time
    ];
}