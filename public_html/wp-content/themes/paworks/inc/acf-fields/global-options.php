<?php
/**
 * ACF Field Registration: Global Options (Header, Footer, Announcement Bar)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Header Fields
 */
add_action( 'acf/init', function() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // =========================================================================
    // HEADER SETTINGS
    // =========================================================================
    acf_add_local_field_group( array(
        'key'      => 'group_header_settings',
        'title'    => 'Header Settings',
        'fields'   => array(
            // Logo
            array(
                'key'           => 'field_header_logo',
                'label'         => 'Logo',
                'name'          => 'header_logo',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'instructions'  => 'Upload the site logo. Recommended: SVG or PNG with transparent background.',
            ),
            // Navigation Items
            array(
                'key'        => 'field_header_nav_items',
                'label'      => 'Navigation Items',
                'name'       => 'header_nav_items',
                'type'       => 'repeater',
                'layout'     => 'table',
                'min'        => 1,
                'max'        => 8,
                'sub_fields' => array(
                    array(
                        'key'   => 'field_header_nav_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_header_nav_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ),
                    array(
                        'key'           => 'field_header_nav_highlight',
                        'label'         => 'Highlight Active',
                        'name'          => 'highlight',
                        'type'          => 'true_false',
                        'default_value' => 0,
                        'ui'            => 1,
                    ),
                ),
            ),
            // Sign In Button
            array(
                'key'   => 'field_header_signin_text',
                'label' => 'Sign In Button Text',
                'name'  => 'header_signin_text',
                'type'  => 'text',
                'default_value' => 'Sign In',
            ),
            array(
                'key'   => 'field_header_signin_url',
                'label' => 'Sign In Button URL',
                'name'  => 'header_signin_url',
                'type'  => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'paworks-settings-header',
                ),
            ),
        ),
        'menu_order' => 0,
    ) );

    // =========================================================================
    // FOOTER SETTINGS
    // =========================================================================
    acf_add_local_field_group( array(
        'key'      => 'group_footer_settings',
        'title'    => 'Footer Settings',
        'fields'   => array(
            // Footer Logo
            array(
                'key'           => 'field_footer_logo',
                'label'         => 'Footer Logo',
                'name'          => 'footer_logo',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'instructions'  => 'Upload a light/white version of the logo for the dark footer background.',
            ),
            // Email
            array(
                'key'           => 'field_footer_email',
                'label'         => 'Email Address',
                'name'          => 'footer_email',
                'type'          => 'email',
                'default_value' => 'info@pawork.org',
            ),
            // Address
            array(
                'key'   => 'field_footer_address',
                'label' => 'Address',
                'name'  => 'footer_address',
                'type'  => 'textarea',
                'rows'  => 3,
                'new_lines' => 'br',
                'default_value' => "205 House Avenue, Suite 101,\nCamp Hill, PA 17011",
            ),
            // Social Links
            array(
                'key'   => 'field_footer_social_tab',
                'label' => 'Social Media Links',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'   => 'field_footer_instagram',
                'label' => 'Instagram URL',
                'name'  => 'footer_instagram',
                'type'  => 'url',
            ),
            array(
                'key'   => 'field_footer_linkedin',
                'label' => 'LinkedIn URL',
                'name'  => 'footer_linkedin',
                'type'  => 'url',
            ),
            array(
                'key'   => 'field_footer_youtube',
                'label' => 'YouTube URL',
                'name'  => 'footer_youtube',
                'type'  => 'url',
            ),
            // Copyright
            array(
                'key'   => 'field_footer_misc_tab',
                'label' => 'Miscellaneous',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_footer_copyright',
                'label'         => 'Copyright Text',
                'name'          => 'footer_copyright',
                'type'          => 'text',
                'default_value' => 'All rights reserved. Copyright [year]',
                'instructions'  => 'Use [year] to auto-insert the current year.',
            ),
            array(
                'key'   => 'field_footer_privacy_url',
                'label' => 'Privacy Policy URL',
                'name'  => 'footer_privacy_url',
                'type'  => 'url',
            ),
            array(
                'key'           => 'field_footer_privacy_text',
                'label'         => 'Privacy Policy Link Text',
                'name'          => 'footer_privacy_text',
                'type'          => 'text',
                'default_value' => 'Privacy Policy',
            ),
            // Search toggle
            array(
                'key'           => 'field_footer_show_search',
                'label'         => 'Show Search Box',
                'name'          => 'footer_show_search',
                'type'          => 'true_false',
                'default_value' => 1,
                'ui'            => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'paworks-settings-footer',
                ),
            ),
        ),
        'menu_order' => 0,
    ) );

    // =========================================================================
    // ANNOUNCEMENT BAR SETTINGS
    // =========================================================================
    acf_add_local_field_group( array(
        'key'      => 'group_announcement_settings',
        'title'    => 'Announcement Bar Settings',
        'fields'   => array(
            array(
                'key'           => 'field_announcement_enabled',
                'label'         => 'Enable Announcement Bar',
                'name'          => 'announcement_enabled',
                'type'          => 'true_false',
                'default_value' => 0,
                'ui'            => 1,
                'instructions'  => 'Toggle the announcement bar on/off across the site.',
            ),
            array(
                'key'   => 'field_announcement_text',
                'label' => 'Announcement Text',
                'name'  => 'announcement_text',
                'type'  => 'text',
                'instructions' => 'The main announcement message.',
            ),
            array(
                'key'   => 'field_announcement_link_text',
                'label' => 'Button Text',
                'name'  => 'announcement_link_text',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_announcement_link_url',
                'label' => 'Button URL',
                'name'  => 'announcement_link_url',
                'type'  => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'paworks-settings-announcement-bar',
                ),
            ),
        ),
        'menu_order' => 0,
    ) );

} );
