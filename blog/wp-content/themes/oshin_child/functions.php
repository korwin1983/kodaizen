<?php

//add_action( 'after_setup_theme', 'be_themes_child_theme_setup' );
//function be_themes_child_theme_setup() {
    load_child_theme_textdomain( 'be-themes', get_stylesheet_directory() . '/languages' );
//}

// function be_restore_default_gallery() {
// remove_shortcode('gallery');
// add_shortcode('gallery','gallery_shortcode');
// remove_shortcode('video');
// add_shortcode('video','wp_video_shortcode');
// }
// add_action( 'init', 'be_restore_default_gallery');


/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');


?>
