<?php
/**
 * PA Works Theme Functions
 *
 * @package PAWorks
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'PAWORKS_VERSION', '1.0.0' );
define( 'PAWORKS_DIR', get_template_directory() );
define( 'PAWORKS_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function paworks_setup() {
    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add featured image support
    add_theme_support( 'post-thumbnails' );

    // Custom image sizes
    add_image_size( 'pw-hero', 1920, 800, true );
    add_image_size( 'pw-card', 600, 400, true );
    add_image_size( 'pw-team', 400, 400, true );
    add_image_size( 'pw-about', 800, 600, true );
    add_image_size( 'pw-icon', 96, 96, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Navigation', 'paworks' ),
        'footer'    => __( 'Footer Navigation', 'paworks' ),
    ) );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'paworks_setup' );

/**
 * Enqueue Scripts & Styles
 */
function paworks_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'paworks-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Source+Sans+3:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'paworks-style',
        get_stylesheet_uri(),
        array( 'paworks-google-fonts' ),
        PAWORKS_VERSION
    );

    // Main script
    wp_enqueue_script(
        'paworks-script',
        PAWORKS_URI . '/assets/js/main.js',
        array(),
        PAWORKS_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'paworks_scripts' );

/**
 * ACF Options Pages
 */
function paworks_acf_options_pages() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        // Main options page
        acf_add_options_page( array(
            'page_title'    => 'PA Works Site Settings',
            'menu_title'    => 'Site Settings',
            'menu_slug'     => 'paworks-settings',
            'capability'    => 'edit_posts',
            'redirect'      => true,
            'icon_url'      => 'dashicons-admin-site-alt3',
            'position'      => 2,
        ) );

        // Header sub-page
        acf_add_options_sub_page( array(
            'page_title'    => 'Header Settings',
            'menu_title'    => 'Header',
            'parent_slug'   => 'paworks-settings',
        ) );

        // Footer sub-page
        acf_add_options_sub_page( array(
            'page_title'    => 'Footer Settings',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'paworks-settings',
        ) );

        // Announcement Bar sub-page
        acf_add_options_sub_page( array(
            'page_title'    => 'Announcement Bar',
            'menu_title'    => 'Announcement Bar',
            'parent_slug'   => 'paworks-settings',
        ) );
    }
}
add_action( 'acf/init', 'paworks_acf_options_pages' );

/**
 * Include ACF Field Registrations
 * Loaded on init so the acf/init hooks inside each file can fire.
 */
function paworks_include_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $field_files = array(
        'global-options',
        'home-page',
        'about-page',
        'advocacy-page',
        'fellowship-page',
        'events-page',
    );

    foreach ( $field_files as $file ) {
        $filepath = PAWORKS_DIR . '/inc/acf-fields/' . $file . '.php';
        if ( file_exists( $filepath ) ) {
            require_once $filepath;
        }
    }
}
add_action( 'init', 'paworks_include_acf_fields' );

/**
 * Helper: Get flexible content section template
 */
function paworks_get_section( $layout_name, $page_context = 'home' ) {
    $template = PAWORKS_DIR . '/inc/template-parts/sections/' . $page_context . '-' . $layout_name . '.php';
    if ( file_exists( $template ) ) {
        include $template;
    }
}

/**
 * Helper: Get button markup from ACF group
 */
function paworks_get_button( $button_data, $class = 'pw-btn pw-btn--primary' ) {
    if ( empty( $button_data ) || empty( $button_data['text'] ) ) {
        return '';
    }

    $text   = esc_html( $button_data['text'] );
    $url    = ! empty( $button_data['url'] ) ? esc_url( $button_data['url'] ) : '#';
    $target = ! empty( $button_data['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : '';

    return sprintf(
        '<a href="%s" class="%s"%s>%s</a>',
        $url,
        esc_attr( $class ),
        $target,
        $text
    );
}

/**
 * Disable WordPress block editor for pages using our templates
 */
function paworks_disable_gutenberg( $use_block_editor, $post ) {
    if ( $post && get_page_template_slug( $post->ID ) ) {
        $our_templates = array(
            'page-templates/template-home.php',
            'page-templates/template-about.php',
            'page-templates/template-advocacy.php',
            'page-templates/template-fellowship.php',
            'page-templates/template-events.php',
        );
        if ( in_array( get_page_template_slug( $post->ID ), $our_templates, true ) ) {
            return false;
        }
    }
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'paworks_disable_gutenberg', 10, 2 );
