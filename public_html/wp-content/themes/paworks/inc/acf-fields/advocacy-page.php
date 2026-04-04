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
                            // Right column — strategies list
                            array(
                                'key'   => 'field_adv_cs_list_header',
                                'label' => 'Strategies List Header',
                                'name'  => 'list_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "TOP 10 STRATEGIES TO GET PENNSYLVANIANS BACK TO WORK"',
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
                                    'light'  => 'Light (Off-White)',
                                    'blue'   => 'Blue Gradient',
                                    'navy'   => 'Navy',
                                    'yellow' => 'Yellow Accent',
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
