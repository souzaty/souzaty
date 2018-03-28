<?php
/**
* @package WordPress
* @subpackage Souzaty
* @since Souzaty 1.0
*/

// Funtion load scripts (Carrega scripts do bootstrap e font Awesome)
function load_scripts() {
    // bootstrap scripts
        wp_enqueue_style( 'Bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_script( 'Bootstrap JS', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
    // Theme scripts
        wp_enqueue_style( 'custom', get_template_directory_uri(). '/css/custom.css', array(), '1.0', 'all' );
        wp_enqueue_script( 'template', get_template_directory_uri(). '/js/template.js', array(), null, true);
    // Font awesome
        wp_enqueue_style( 'FontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '', 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Add Functions ==========
require_once 'functions/custom-functions.php';
require_once 'functions/menu.php';
require_once 'functions/cpt.php';
require_once 'functions/shortcodes.php';

// End Functions ==========

// Start Theme Supports ==========

    // Custom Logo
        function themename_custom_logo_setup() {
        $defaults = array(
            'height'      => 80,
            'width'       => 80,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        );
        add_theme_support( 'custom-logo', $defaults );
        }
        add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

    // Enable feed
        add_theme_support('automatic-feed-links');

    // Config Thumbs Size
        add_theme_support('post-thumbnails');
        add_filter('jpeg_quality', create_function('', 'return 100;'));
        set_post_thumbnail_size(360, 00, true);
        add_image_size('portfolio', 400, 400, true);

    // Enable HTML5
        add_theme_support('html5', array(
        				'search-form',
        				'comment-form',
        				'comment-list',
        				'gallery',
        				'caption'
    ));
    // Add Post Formats
        add_theme_support('post-formats', array(
        				'aside',
        				'image',
        				'video',
        				'quote',
        				'link',
        				'gallery',
        				'status',
        				'audio',
        				'chat'
        ));

// End Theme Support ==========


?>
