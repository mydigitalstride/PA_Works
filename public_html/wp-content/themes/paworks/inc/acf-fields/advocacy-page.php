<?php
/**
 * ACF Field Registration: Advocacy Page Flexible Content
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'acf/init', function() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_advocacy_page',
        'title'    => 'Advocacy Page Builder',
        'fields'   => array(
            array(
                'key'        => 'field_advocacy_sections',
                'label'      => 'Page Sections',
                'name'       => 'advocacy_sections',
                'type'       => 'flexible_content',
                'button_label' => 'Add Section',
                'layouts'    => array(

                    // =================================================================
                    // LAYOUT: Hero Section
                    // =================================================================
                    'layout_hero' => array(
                        'key'        => 'layout_advocacy_hero',
                        'name'       => 'hero_section',
                        'label'      => 'Hero Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'           => 'field_adv_hero_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                            ),
                            array(
                                'key'   => 'field_adv_hero_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "LET\'S MAKE A DIFFERENCE TOGETHER"',
                            ),
                            array(
                                'key'   => 'field_adv_hero_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_adv_hero_body',
                                'label' => 'Body Text',
                                'name'  => 'body_text',
                                'type'  => 'textarea',
                                'rows'  => 4,
                                'new_lines' => 'br',
                            ),
                            array(
                                'key'   => 'field_adv_hero_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_adv_hero_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_adv_hero_btn_target',
                                'label'         => 'Open in New Tab',
                                'name'          => 'button_target',
                                'type'          => 'true_false',
                                'default_value' => 0,
                                'ui'            => 1,
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Content + Strategies Section
                    // =================================================================
                    'layout_content_strategies' => array(
                        'key'        => 'layout_adv_content_strategies',
                        'name'       => 'content_strategies_section',
                        'label'      => 'Content + Strategies Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            // Left column
                            array(
                                'key'   => 'field_adv_cs_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "PA@WORK"',
                            ),
                            array(
                                'key'   => 'field_adv_cs_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'        => 'field_adv_cs_body',
                                'label'      => 'Body Text',
                                'name'       => 'body_text',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'basic',
                                'media_upload' => 0,
                            ),
                            // Accordion items below body text
                            array(
                                'key'          => 'field_adv_cs_accordion',
                                'label'        => 'Accordion Items',
                                'name'         => 'accordion_items',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 0,
                                'max'          => 10,
                                'button_label' => 'Add Accordion Item',
                                'instructions' => 'Optional expandable items displayed below the body text.',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_adv_cs_accordion_title',
                                        'label' => 'Title',
                                        'name'  => 'title',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'        => 'field_adv_cs_accordion_content',
                                        'label'      => 'Content',
                                        'name'       => 'content',
                                        'type'       => 'wysiwyg',
                                        'tabs'       => 'all',
                                        'toolbar'    => 'basic',
                                        'media_upload' => 0,
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_adv_cs_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_adv_cs_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            // Section background (5% opacity overlay)
                            array(
                                'key'           => 'field_adv_cs_section_bg',
                                'label'         => 'Section Background Image',
                                'name'          => 'section_bg_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional. Displays at 5% opacity behind the entire section.',
                            ),
                            // Right column — strategies list
                            array(
                                'key'   => 'field_adv_cs_list_header',
                                'label' => 'Strategies List Header',
                                'name'  => 'list_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "TOP 10 STRATEGIES TO GET PENNSYLVANIANS BACK TO WORK"',
                            ),
                            array(
                                'key'           => 'field_adv_cs_list_bg_image',
                                'label'         => 'Strategies List Background Image',
                                'name'          => 'list_bg_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional. Displays behind the strategies list with a gradient overlay at 5% opacity.',
                            ),
                            array(
                                'key'          => 'field_adv_cs_strategies',
                                'label'        => 'Strategies',
                                'name'         => 'strategies',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 1,
                                'max'          => 15,
                                'button_label' => 'Add Strategy',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_adv_cs_strategy_text',
                                        'label' => 'Strategy Text',
                                        'name'  => 'text',
                                        'type'  => 'text',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Two Column Engage Section
                    // =================================================================
                    'layout_engage' => array(
                        'key'        => 'layout_adv_engage',
                        'name'       => 'engage_section',
                        'label'      => 'Two Column Engage Section (Dual Title + WYSIWYG)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_adv_engage_left_header',  'label' => 'Left Header',  'name' => 'left_header',  'type' => 'text',    'default_value' => 'HOW TO ENGAGE' ),
                            array( 'key' => 'field_adv_engage_left_content', 'label' => 'Left Content', 'name' => 'left_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_adv_engage_left_buttons',
                                'label'        => 'Left Buttons',
                                'name'         => 'left_buttons',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 5,
                                'button_label' => 'Add Button',
                                'instructions' => 'Optional buttons displayed below the left content.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_adv_engage_left_btn_text',  'label' => 'Button Text',  'name' => 'button_text',  'type' => 'text' ),
                                    array( 'key' => 'field_adv_engage_left_btn_url',   'label' => 'Button URL',   'name' => 'button_url',   'type' => 'url' ),
                                    array( 'key' => 'field_adv_engage_left_btn_style', 'label' => 'Button Style', 'name' => 'button_style', 'type' => 'select', 'choices' => array( 'pw-btn--primary' => 'Primary (Gold)', 'pw-btn--outline' => 'Outline' ), 'default_value' => 'pw-btn--primary', 'allow_null' => 0 ),
                                ),
                            ),
                            array( 'key' => 'field_adv_engage_right_header',  'label' => 'Right Header',  'name' => 'right_header',  'type' => 'text',    'default_value' => 'WHY IT MATTERS' ),
                            array( 'key' => 'field_adv_engage_right_content', 'label' => 'Right Content', 'name' => 'right_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_adv_engage_right_buttons',
                                'label'        => 'Right Buttons',
                                'name'         => 'right_buttons',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 5,
                                'button_label' => 'Add Button',
                                'instructions' => 'Optional buttons displayed below the right content.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_adv_engage_right_btn_text',  'label' => 'Button Text',  'name' => 'button_text',  'type' => 'text' ),
                                    array( 'key' => 'field_adv_engage_right_btn_url',   'label' => 'Button URL',   'name' => 'button_url',   'type' => 'url' ),
                                    array( 'key' => 'field_adv_engage_right_btn_style', 'label' => 'Button Style', 'name' => 'button_style', 'type' => 'select', 'choices' => array( 'pw-btn--primary' => 'Primary (Gold)', 'pw-btn--outline' => 'Outline' ), 'default_value' => 'pw-btn--primary', 'allow_null' => 0 ),
                                ),
                            ),
                            array( 'key' => 'field_adv_engage_center_btn_text', 'label' => 'Centered Button Text', 'name' => 'center_button_text', 'type' => 'text', 'default_value' => 'Get Involved' ),
                            array( 'key' => 'field_adv_engage_center_btn_url',  'label' => 'Centered Button URL',  'name' => 'center_button_url',  'type' => 'url' ),
                            array( 'key' => 'field_adv_engage_section_bg',     'label' => 'Section Background Image', 'name' => 'section_bg_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional. Displays at 5% opacity behind the entire section.' ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: CTA / Membership Section
                    // =================================================================
                    'layout_cta' => array(
                        'key'        => 'layout_adv_cta',
                        'name'       => 'cta_section',
                        'label'      => 'Call to Action Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_adv_cta_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "ARE YOU A PWDA MEMBER?"',
                            ),
                            array(
                                'key'   => 'field_adv_cta_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_adv_cta_body',
                                'label' => 'Body Text',
                                'name'  => 'body_text',
                                'type'  => 'textarea',
                                'rows'  => 2,
                                'new_lines' => 'br',
                            ),
                            array(
                                'key'   => 'field_adv_cta_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Join Now',
                            ),
                            array(
                                'key'   => 'field_adv_cta_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_adv_cta_bg_color',
                                'label'         => 'Background Style',
                                'name'          => 'bg_style',
                                'type'          => 'select',
                                'choices'       => array(
                                    'light'       => 'Light (Off-White)',
                                    'sky'         => 'Sky Blue (#9bd3dd)',
                                    'blue'        => 'Blue Gradient',
                                    'navy'        => 'Navy',
                                    'yellow'      => 'Yellow Accent',
                                    'transparent' => 'Transparent',
                                ),
                                'default_value' => 'light',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: WIOA / Legislation Section
                    // =================================================================
                    'layout_wioa' => array(
                        'key'        => 'layout_adv_wioa',
                        'name'       => 'wioa_section',
                        'label'      => 'Legislation / WIOA Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_adv_wioa_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "FEDERAL FRAMEWORK"',
                            ),
                            array(
                                'key'   => 'field_adv_wioa_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'        => 'field_adv_wioa_body',
                                'label'      => 'Body Content',
                                'name'       => 'body_content',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'full',
                                'media_upload' => 0,
                            ),
                            array(
                                'key'           => 'field_adv_wioa_image',
                                'label'         => 'Image',
                                'name'          => 'image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Image displayed alongside the body text.',
                            ),
                            array(
                                'key'   => 'field_adv_wioa_links_header',
                                'label' => 'Quick Links Header',
                                'name'  => 'links_header',
                                'type'  => 'text',
                                'default_value' => 'QUICK LINKS',
                            ),
                            array(
                                'key'          => 'field_adv_wioa_links',
                                'label'        => 'Quick Links',
                                'name'         => 'quick_links',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 10,
                                'button_label' => 'Add Link',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_adv_wioa_link_text',
                                        'label' => 'Link Text',
                                        'name'  => 'text',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_adv_wioa_link_url',
                                        'label' => 'URL',
                                        'name'  => 'url',
                                        'type'  => 'url',
                                    ),
                                ),
                            ),
                        ),
                    ),

                ), // end layouts
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-templates/template-advocacy.php',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
    ) );

} );
