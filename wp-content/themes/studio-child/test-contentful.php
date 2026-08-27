<?php
/**
 * Test Contentful Connection
 * Visit: https://pandatattoo.com/wp-content/themes/studio-child/test-contentful.php
 */

// Load WordPress
require_once('../../../../../../wp-load.php');

header('Content-Type: text/html; charset=utf-8');

echo '<h1>Contentful API</h1>';
echo '<style>body { font-family: monospace; padding: 20px; } .success { color: green; } .error { color: red; } pre { background: #f5f5f5; padding: 15px; border-radius: 5px; overflow-x: auto; }</style>';

// Get configuration
$config = get_contentful_config();

echo '<h2>1. Configuration Check</h2>';
echo '<pre>';
echo 'Space ID: ' . $config['space_id'] . "\n";
echo 'CDA Token: ' . (strlen($config['cda_token']) > 20 ? '<span class="success">✓ Configured (' . strlen($config['cda_token']) . ' chars)</span>' : '<span class="error">✗ Not configured</span>') . "\n";
echo 'CMA Token: ' . (strlen($config['cma_token']) > 20 ? '<span class="success">✓ Configured</span>' : '<span class="error">✗ Not configured</span>') . "\n";
echo 'Environment: ' . $config['environment'] . "\n";
echo '</pre>';

// Test API connection
echo '<h2>2. API Connection Test</h2>';
$space_id = $config['space_id'];
$access_token = $config['cda_token'];
$environment = $config['environment'];

$url = sprintf(
    'https://cdn.contentful.com/spaces/%s/environments/%s/entries?content_type=artist&limit=5',
    $space_id,
    $environment
);

echo '<p>Testing URL: <code>' . $url . '</code></p>';

$response = wp_remote_get($url, [
    'headers' => [
        'Authorization' => 'Bearer ' . $access_token,
    ],
    'timeout' => 15,
]);

echo '<h3>Response:</h3>';
if (is_wp_error($response)) {
    echo '<p class="error">✗ Error: ' . $response->get_error_message() . '</p>';
} else {
    $code = wp_remote_retrieve_response_code($response);
    $body = wp_remote_retrieve_body($response);
    
    echo '<p>HTTP Status Code: ' . ($code === 200 ? '<span class="success">✓ ' . $code . '</span>' : '<span class="error">✗ ' . $code . '</span>') . '</p>';
    
    if ($code !== 200) {
        echo '<h4>Error Response:</h4>';
        echo '<pre>' . htmlspecialchars($body) . '</pre>';
    } else {
        $data = json_decode($body, true);
        echo '<p class="success">✓ Success! Found ' . count($data['items'] ?? []) . ' artists</p>';
        
        if (!empty($data['items'])) {
            echo '<h4>Sample Artist Data:</h4>';
            echo '<pre>' . htmlspecialchars(json_encode($data['items'][0], JSON_PRETTY_PRINT)) . '</pre>';
            
            echo '<h4>All Includes (Assets):</h4>';
            if (!empty($data['includes']['Asset'])) {
                echo '<p>Found ' . count($data['includes']['Asset']) . ' assets</p>';
            } else {
                echo '<p class="error">No assets included in response</p>';
            }
        } else {
            echo '<p class="error">✗ No artists found in Contentful</p>';
        }
        
        echo '<h4>Full Response:</h4>';
        echo '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) . '</pre>';
    }
}

// Test the function
echo '<h2>3. Function Test</h2>';
$artists = get_contentful_artists(['limit' => 5]);

echo '<p>Artists returned from get_contentful_artists(): ' . count($artists) . '</p>';

if (!empty($artists)) {
    echo '<p class="success">✓ Function working correctly!</p>';
    echo '<h4>Artists:</h4>';
    echo '<pre>' . htmlspecialchars(print_r($artists, true)) . '</pre>';
} else {
    echo '<p class="error">✗ Function returned empty array</p>';
    echo '<p>Check the error logs for more details.</p>';
}

// Check cache
echo '<h2>4. Cache Check</h2>';
$cache_key = 'contentful_artists_' . md5(serialize(['limit' => 5]));
$cached = get_transient($cache_key);
echo '<p>Cache status: ' . ($cached !== false ? '<span class="success">✓ Cached (' . count($cached) . ' artists)</span>' : '<span class="error">✗ Not cached</span>') . '</p>';

echo '<hr>';
echo '<p><strong>Next Steps:</strong></p>';
echo '<ul>';
echo '<li>If you see errors above, check the error messages for details</li>';
echo '<li>If artists are found, check your homepage template is calling the function correctly</li>';
echo '<li>Clear cache if needed: <code>wp transient delete --all</code></li>';
echo '</ul>';
