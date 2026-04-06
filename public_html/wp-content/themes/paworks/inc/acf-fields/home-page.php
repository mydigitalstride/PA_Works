<?php
/**
 * ACF Field Registration: Home Page Flexible Content
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
        'key'      => 'group_home_page',
        'title'    => 'Home Page Builder',
        'fields'   => array(
            array(
                'key'        => 'field_home_sections',
                'label'      => 'Page Sections',
                'name'       => 'home_sections',
                'type'       => 'flexible_content',
                'button_label' => 'Add Section',
                'layouts'    => array(

                    // =================================================================
                    // LAYOUT: Hero Section
                    // =================================================================
                    'layout_hero' => array(
                        'key'        => 'layout_home_hero',
                        'name'       => 'hero_section',
                        'label'      => 'Hero Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'           => 'field_home_hero_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Recommended size: 1920x800px. This image appears behind the hero content.',
                            ),
                            array(
                                'key'   => 'field_home_hero_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'Small text above the main heading (e.g., "BUILDING PENNSYLVANIA\'S WORKFORCE TOGETHER").',
                            ),
                            array(
                                'key'   => 'field_home_hero_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'instructions' => 'Main hero heading text.',
                            ),
                            array(
                                'key'   => 'field_home_hero_body',
                                'label' => 'Body Text',
                                'name'  => 'body_text',
                                'type'  => 'textarea',
                                'rows'  => 3,
                                'new_lines' => 'br',
                                'instructions' => 'Supporting paragraph text below the heading.',
                            ),
                            array(
                                'key'   => 'field_home_hero_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Become a PWDA Member',
                            ),
                            array(
                                'key'   => 'field_home_hero_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_home_hero_btn_target',
                                'label'         => 'Open in New Tab',
                                'name'          => 'button_target',
                                'type'          => 'true_false',
                                'default_value' => 0,
                                'ui'            => 1,
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Cards Section (Events/News)
                    // =================================================================
                    'layout_cards' => array(
                        'key'        => 'layout_home_cards',
                        'name'       => 'cards_section',
                        'label'      => 'Cards Section (Events/News)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'        => 'field_home_cards_items',
                                'label'      => 'Cards',
                                'name'       => 'cards',
                                'type'       => 'repeater',
                                'layout'     => 'block',
                                'min'        => 1,
                                'max'        => 4,
                                'button_label' => 'Add Card',
                                'sub_fields' => array(
                                    array(
                                        'key'   => 'field_home_card_label',
                                        'label' => 'Label',
                                        'name'  => 'label',
                                        'type'  => 'text',
                                        'instructions' => 'Category label (e.g., "EVENTS", "NEWS").',
                                    ),
                                    array(
                                        'key'           => 'field_home_card_image',
                                        'label'         => 'Image',
                                        'name'          => 'image',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'medium',
                                    ),
                                    array(
                                        'key'   => 'field_home_card_title',
                                        'label' => 'Title',
                                        'name'  => 'title',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_home_card_body',
                                        'label' => 'Body Text',
                                        'name'  => 'body',
                                        'type'  => 'textarea',
                                        'rows'  => 3,
                                    ),
                                    array(
                                        'key'   => 'field_home_card_link_text',
                                        'label' => 'Link Text',
                                        'name'  => 'link_text',
                                        'type'  => 'text',
                                        'default_value' => 'Learn More',
                                    ),
                                    array(
                                        'key'   => 'field_home_card_link_url',
                                        'label' => 'Link URL',
                                        'name'  => 'link_url',
                                        'type'  => 'url',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: About Section
                    // =================================================================
                    'layout_about' => array(
                        'key'        => 'layout_home_about',
                        'name'       => 'about_section',
                        'label'      => 'About Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_home_about_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'ABOUT PA WORKS',
                            ),
                            array(
                                'key'       => 'field_home_about_body',
                                'label'     => 'Body Text',
                                'name'      => 'body_text',
                                'type'      => 'wysiwyg',
                                'tabs'      => 'all',
                                'toolbar'   => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key'   => 'field_home_about_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Learn More About PA Works',
                            ),
                            array(
                                'key'   => 'field_home_about_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_home_about_image',
                                'label'         => 'Image',
                                'name'          => 'image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Image displayed to the right of the text content.',
                            ),
                            array(
                                'key'           => 'field_home_about_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional background image for this section.',
                            ),
                            array(
                                'key'           => 'field_home_about_bg_position',
                                'label'         => 'Background Image Position',
                                'name'          => 'bg_image_position',
                                'type'          => 'select',
                                'choices'       => array(
                                    'left center'   => 'Left',
                                    'center center' => 'Center',
                                    'right center'  => 'Right',
                                ),
                                'default_value' => 'center center',
                                'allow_null'    => 0,
                                'instructions'  => 'Horizontal alignment of the background image.',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: What We Do Section
                    // =================================================================
                    'layout_whatwedo' => array(
                        'key'        => 'layout_home_whatwedo',
                        'name'       => 'whatwedo_section',
                        'label'      => 'What We Do Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_home_wwd_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'WHAT WE DO',
                            ),
                            array(
                                'key'   => 'field_home_wwd_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Explore Our Focus Areas',
                            ),
                            array(
                                'key'   => 'field_home_wwd_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'          => 'field_home_wwd_items',
                                'label'        => 'Focus Area Items',
                                'name'         => 'items',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 8,
                                'button_label' => 'Add Focus Area',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_home_wwd_item_text',
                                        'label' => 'Focus Area Text',
                                        'name'  => 'text',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'          => 'field_home_wwd_item_description',
                                        'label'        => 'Description',
                                        'name'         => 'description',
                                        'type'         => 'textarea',
                                        'rows'         => 3,
                                        'instructions' => 'Shown when this accordion item is expanded.',
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_home_wwd_description',
                                'label' => 'Description',
                                'name'  => 'description',
                                'type'  => 'textarea',
                                'rows'  => 2,
                                'instructions' => 'Short description text below the focus area items.',
                            ),
                            array(
                                'key'           => 'field_home_wwd_overlay_image',
                                'label'         => 'Overlay / Watermark Image',
                                'name'          => 'overlay_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Decorative overlay image (e.g. PA state shape, geometric pattern). Displayed at low opacity.',
                            ),
                            array(
                                'key'           => 'field_home_wwd_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional background image/pattern for this section.',
                            ),
                            array(
                                'key'           => 'field_home_wwd_bg_position',
                                'label'         => 'Background Image Position',
                                'name'          => 'bg_image_position',
                                'type'          => 'select',
                                'choices'       => array(
                                    'left center'   => 'Left',
                                    'center center' => 'Center',
                                    'right center'  => 'Right',
                                ),
                                'default_value' => 'center center',
                                'allow_null'    => 0,
                                'instructions'  => 'Horizontal alignment of the background image.',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Impact Section
                    // =================================================================
                    'layout_impact' => array(
                        'key'        => 'layout_home_impact',
                        'name'       => 'impact_section',
                        'label'      => 'Our Impact Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_home_impact_header',
                                'label' => 'Section Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'OUR IMPACT',
                            ),
                            array(
                                'key'           => 'field_home_impact_logo',
                                'label'         => 'Impact Logo/Image',
                                'name'          => 'impact_logo',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'WorkForce logo or similar branding image.',
                            ),
                            array(
                                'key'           => 'field_home_impact_facts_label',
                                'label'         => 'Impact Facts Label',
                                'name'          => 'facts_label',
                                'type'          => 'text',
                                'default_value' => 'IMPACT FACTS',
                            ),
                            array(
                                'key'   => 'field_home_impact_big_stat',
                                'label' => 'Big Stat Text',
                                'name'  => 'big_stat_text',
                                'type'  => 'text',
                                'instructions' => 'Large statistic text (e.g., "$1.89 TOTAL ECONOMIC IMPACT").',
                            ),
                            array(
                                'key'   => 'field_home_impact_big_stat_sub',
                                'label' => 'Big Stat Subtitle',
                                'name'  => 'big_stat_subtitle',
                                'type'  => 'text',
                                'instructions' => 'Text below the big stat (e.g., "For Every $1.00 in WIOA Expenditures").',
                            ),
                            array(
                                'key'   => 'field_home_impact_source',
                                'label' => 'Source Citation',
                                'name'  => 'source',
                                'type'  => 'text',
                                'instructions' => 'Source attribution text.',
                            ),
                            array(
                                'key'          => 'field_home_impact_stats',
                                'label'        => 'Impact Stats',
                                'name'         => 'stats',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 6,
                                'button_label' => 'Add Stat',
                                'sub_fields'   => array(
                                    array(
                                        'key'           => 'field_home_impact_stat_icon',
                                        'label'         => 'Icon',
                                        'name'          => 'icon',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'thumbnail',
                                        'instructions'  => 'Small icon image (e.g., 48x48px SVG or PNG).',
                                    ),
                                    array(
                                        'key'   => 'field_home_impact_stat_number',
                                        'label' => 'Number',
                                        'name'  => 'number',
                                        'type'  => 'text',
                                        'instructions' => 'The stat number (e.g., "22", "60+", "2000+").',
                                    ),
                                    array(
                                        'key'   => 'field_home_impact_stat_label',
                                        'label' => 'Label',
                                        'name'  => 'label',
                                        'type'  => 'text',
                                        'instructions' => 'Description of the stat (e.g., "WORKFORCE DEVELOPMENT BOARDS").',
                                    ),
                                ),
                            ),
                            array(
                                'key'           => 'field_home_impact_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional background image for this section.',
                            ),
                            array(
                                'key'           => 'field_home_impact_bg_position',
                                'label'         => 'Background Image Position',
                                'name'          => 'bg_image_position',
                                'type'          => 'select',
                                'choices'       => array(
                                    'left center'   => 'Left',
                                    'center center' => 'Center',
                                    'right center'  => 'Right',
                                ),
                                'default_value' => 'center center',
                                'allow_null'    => 0,
                                'instructions'  => 'Horizontal alignment of the background image.',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Team Section
                    // =================================================================
                    'layout_team' => array(
                        'key'        => 'layout_home_team',
                        'name'       => 'team_section',
                        'label'      => 'Our Team Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_home_team_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'OUR TEAM IS HERE TO HELP',
                            ),
                            array(
                                'key'           => 'field_home_team_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional full-bleed background image. The gradient will overlay it.',
                            ),
                            array(
                                'key'           => 'field_home_team_bg_position',
                                'label'         => 'Background Image Position',
                                'name'          => 'bg_image_position',
                                'type'          => 'select',
                                'choices'       => array(
                                    'left center'   => 'Left',
                                    'center center' => 'Center',
                                    'right center'  => 'Right',
                                ),
                                'default_value' => 'center center',
                                'allow_null'    => 0,
                                'instructions'  => 'Horizontal alignment of the background image.',
                            ),
                            array(
                                'key'           => 'field_home_team_overlay_image',
                                'label'         => 'Overlay / Watermark Image',
                                'name'          => 'overlay_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Decorative overlay image (e.g., PA state shape, geometric pattern). Displayed at low opacity over the gradient.',
                            ),
                            array(
                                'key'          => 'field_home_team_members',
                                'label'        => 'Team Members',
                                'name'         => 'members',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 12,
                                'button_label' => 'Add Team Member',
                                'sub_fields'   => array(
                                    array(
                                        'key'           => 'field_home_team_member_photo',
                                        'label'         => 'Photo',
                                        'name'          => 'photo',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'thumbnail',
                                        'instructions'  => 'Headshot photo. Recommended: square, min 400x400px.',
                                    ),
                                    array(
                                        'key'   => 'field_home_team_member_name',
                                        'label' => 'Name',
                                        'name'  => 'name',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_home_team_member_title',
                                        'label' => 'Title / Credentials',
                                        'name'  => 'title',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "Ed.D.", "MPAP" — appended after the name.',
                                    ),
                                    array(
                                        'key'   => 'field_home_team_member_role',
                                        'label' => 'Role',
                                        'name'  => 'role',
                                        'type'  => 'text',
                                        'instructions' => 'Job title (e.g., "Executive Director").',
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_home_team_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Contact Us Today!',
                            ),
                            array(
                                'key'   => 'field_home_team_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                        ),
                    ),

                ), // end layouts
            ), // end flexible_content field
        ), // end fields
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-templates/template-home.php',
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
