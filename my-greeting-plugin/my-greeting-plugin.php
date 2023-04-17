<?php
/**
 * Plugin Name: My Greeting Plugin
 * Description: A plugin to store and display a greeting message in the admin dashboard.
 * Version: 1.0
 * Author: JordanZaz
 */

// Register the API route with OAuth2 authentication
add_action('rest_api_init', function () {
  register_rest_route('my-greeting-plugin/v1', '/greeting/', array(
    'methods' => 'POST',
    'callback' => 'store_greeting',
    'permission_callback' => function () {
      return is_user_logged_in() && current_user_can('edit_posts');
    },
  ));
});

// Store the greeting message in the WordPress options table
function store_greeting(WP_REST_Request $request) {
  $greeting = $request->get_param('greeting');
  if (empty($greeting)) {
    return new WP_Error('invalid_greeting', 'Greeting parameter is required.', array('status' => 400));
  }

  update_option('my_greeting_plugin_greeting', $greeting);
  return new WP_REST_Response(array('success' => true, 'message' => 'Greeting saved.'), 200);
}

// Display the greeting message in the admin dashboard
add_action('admin_notices', function () {
  $greeting = get_option('my_greeting_plugin_greeting', '');
  if (!empty($greeting)) {
    echo "<div class='notice notice-info is-dismissible'><p><strong>Greeting:</strong> {$greeting}</p></div>";
  }
});


function my_custom_greeting_block_enqueue() {
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'custom-greeting-block/build/index.asset.php');

    wp_register_script(
        'my-custom-greeting-block-script',
        plugins_url( 'custom-greeting-block/build/index.js', __FILE__ ),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    register_block_type_from_metadata( __DIR__ . '/custom-greeting-block', array(
        'editor_script' => 'my-custom-greeting-block-script',
    ));
}
add_action( 'init', 'my_custom_greeting_block_enqueue' );

