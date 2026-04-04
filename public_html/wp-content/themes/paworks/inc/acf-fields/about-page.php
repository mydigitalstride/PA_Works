<?php
/**
 * ACF Field Registration: About Us Page Flexible Content
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
        'key'      => 'group_about_page',
        'title'    => 'About Us Page Builder',
        'fields'   => array(
            array(
                'key'        => 'field_about_sections',
                'label'      => 'Page Sections',
                'name'       => 'about_sections',
                'type'       => 'flexible_content',
                'button_label' => 'Add Section',
                'layouts'    => array(

                    // =================================================================
                    // LAYOUT: Hero Section
                    // =================================================================
                    'layout_hero' => array(
                        'key'        => 'layout_about_hero',
                        'name'       => 'hero_section',
                        'label'      => 'Hero Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'           => 'field_about_hero_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Recommended size: 1920x800px.',
                            ),
                            array(
                                'key'   => 'field_about_hero_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_about_hero_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_about_hero_body',
                                'label' => 'Body Text',
                                'name'  => 'body_text',
                                'type'  => 'textarea',
                                'rows'  => 3,
                                'new_lines' => 'br',
                            ),
                            array(
                                'key'   => 'field_about_hero_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_about_hero_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_about_hero_btn_target',
                                'label'         => 'Open in New Tab',
                                'name'          => 'button_target',
                                'type'          => 'true_false',
                                'default_value' => 0,
                                'ui'            => 1,
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Our Mission Section
                    // =================================================================
                    'layout_mission' => array(
                        'key'        => 'layout_about_mission',
                        'name'       => 'mission_section',
                        'label'      => 'Our Mission Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_mission_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'Small label text above heading (e.g., "WHO WE ARE").',
                            ),
                            array(
                                'key'   => 'field_about_mission_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'OUR MISSION',
                            ),
                            array(
                                'key'        => 'field_about_mission_body',
                                'label'      => 'Body Text',
                                'name'       => 'body_text',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'full',
                                'media_upload' => 0,
                                'instructions' => 'Main mission statement / description text on the left side.',
                            ),
                            array(
                                'key'          => 'field_about_mission_info_boxes',
                                'label'        => 'Info Boxes',
                                'name'         => 'info_boxes',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 0,
                                'max'          => 4,
                                'button_label' => 'Add Info Box',
                                'instructions' => 'Colored info boxes displayed on the right side (e.g., Federal Level, State Level).',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_about_mission_box_header',
                                        'label' => 'Box Header',
                                        'name'  => 'box_header',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "AT THE FEDERAL LEVEL, PWDA..."',
                                    ),
                                    array(
                                        'key'        => 'field_about_mission_box_items',
                                        'label'      => 'Bullet Points',
                                        'name'       => 'items',
                                        'type'       => 'repeater',
                                        'layout'     => 'table',
                                        'min'        => 1,
                                        'max'        => 10,
                                        'button_label' => 'Add Point',
                                        'sub_fields' => array(
                                            array(
                                                'key'   => 'field_about_mission_box_item_text',
                                                'label' => 'Text',
                                                'name'  => 'text',
                                                'type'  => 'textarea',
                                                'rows'  => 2,
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key'           => 'field_about_mission_box_color',
                                        'label'         => 'Box Style',
                                        'name'          => 'box_style',
                                        'type'          => 'select',
                                        'choices'       => array(
                                            'yellow' => 'Yellow / Gold',
                                            'blue'   => 'Blue / Teal',
                                            'navy'   => 'Navy',
                                            'orange' => 'Orange',
                                        ),
                                        'default_value' => 'yellow',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Team Section (reusable)
                    // =================================================================
                    'layout_team' => array(
                        'key'        => 'layout_about_team',
                        'name'       => 'team_section',
                        'label'      => 'Our Team Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_team_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'OUR TEAM IS HERE TO HELP',
                            ),
                            array(
                                'key'           => 'field_about_team_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                            ),
                            array(
                                'key'          => 'field_about_team_members',
                                'label'        => 'Team Members',
                                'name'         => 'members',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 12,
                                'button_label' => 'Add Team Member',
                                'sub_fields'   => array(
                                    array(
                                        'key'           => 'field_about_team_photo',
                                        'label'         => 'Photo',
                                        'name'          => 'photo',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'thumbnail',
                                    ),
                                    array(
                                        'key'   => 'field_about_team_name',
                                        'label' => 'Name',
                                        'name'  => 'name',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_about_team_title',
                                        'label' => 'Title / Credentials',
                                        'name'  => 'title',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_about_team_role',
                                        'label' => 'Role',
                                        'name'  => 'role',
                                        'type'  => 'text',
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_about_team_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Contact Us Today!',
                            ),
                            array(
                                'key'   => 'field_about_team_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Board of Directors Section
                    // =================================================================
                    'layout_board' => array(
                        'key'        => 'layout_about_board',
                        'name'       => 'board_section',
                        'label'      => 'Board of Directors Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_board_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "LEADERSHIP"',
                            ),
                            array(
                                'key'   => 'field_about_board_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'BOARD OF DIRECTORS',
                            ),
                            array(
                                'key'          => 'field_about_board_members',
                                'label'        => 'Board Members',
                                'name'         => 'members',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 30,
                                'button_label' => 'Add Board Member',
                                'sub_fields'   => array(
                                    array(
                                        'key'           => 'field_about_board_photo',
                                        'label'         => 'Photo',
                                        'name'          => 'photo',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'thumbnail',
                                        'instructions'  => 'Board member headshot or organization logo.',
                                    ),
                                    array(
                                        'key'   => 'field_about_board_name',
                                        'label' => 'Name',
                                        'name'  => 'name',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_about_board_position',
                                        'label' => 'Position / Title',
                                        'name'  => 'position',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "CEO", "Director"',
                                    ),
                                    array(
                                        'key'   => 'field_about_board_org',
                                        'label' => 'Organization',
                                        'name'  => 'organization',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "BERKS COUNTY WORKFORCES DEVELOPMENT BOARD"',
                                    ),
                                    array(
                                        'key'           => 'field_about_board_highlighted',
                                        'label'         => 'Highlighted',
                                        'name'          => 'highlighted',
                                        'type'          => 'true_false',
                                        'default_value' => 0,
                                        'ui'            => 1,
                                        'instructions'  => 'Enable to visually highlight this member (e.g., different background color).',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: What We Do Section (reusable)
                    // =================================================================
                    'layout_whatwedo' => array(
                        'key'        => 'layout_about_whatwedo',
                        'name'       => 'whatwedo_section',
                        'label'      => 'What We Do Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_wwd_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'WHAT WE DO',
                            ),
                            array(
                                'key'   => 'field_about_wwd_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Explore Our Focus Areas',
                            ),
                            array(
                                'key'   => 'field_about_wwd_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'          => 'field_about_wwd_items',
                                'label'        => 'Focus Area Items',
                                'name'         => 'items',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 1,
                                'max'          => 8,
                                'button_label' => 'Add Focus Area',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_about_wwd_item_text',
                                        'label' => 'Focus Area Text',
                                        'name'  => 'text',
                                        'type'  => 'text',
                                    ),
                                ),
                            ),
                            array(
                                'key'   => 'field_about_wwd_description',
                                'label' => 'Description',
                                'name'  => 'description',
                                'type'  => 'textarea',
                                'rows'  => 2,
                            ),
                            array(
                                'key'           => 'field_about_wwd_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: PA's Local Workforce System Section
                    // =================================================================
                    'layout_workforce_system' => array(
                        'key'        => 'layout_about_workforce_system',
                        'name'       => 'workforce_system_section',
                        'label'      => "PA's Local Workforce System",
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_wfs_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "THE SYSTEM"',
                            ),
                            array(
                                'key'   => 'field_about_wfs_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => "PA'S LOCAL WORKFORCE SYSTEM",
                            ),
                            array(
                                'key'           => 'field_about_wfs_map_image',
                                'label'         => 'Map / Hero Image',
                                'name'          => 'map_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Large map or infographic image displayed prominently.',
                            ),
                            array(
                                'key'        => 'field_about_wfs_body',
                                'label'      => 'Body Content',
                                'name'       => 'body_content',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'full',
                                'media_upload' => 1,
                                'instructions' => 'Full content area for describing the workforce system. Supports paragraphs, headings, links, etc.',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Impact Section (reusable)
                    // =================================================================
                    'layout_impact' => array(
                        'key'        => 'layout_about_impact',
                        'name'       => 'impact_section',
                        'label'      => 'Our Impact Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_about_impact_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "YOUR TAX $ AT WORK"',
                            ),
                            array(
                                'key'   => 'field_about_impact_header',
                                'label' => 'Section Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'OUR IMPACT',
                            ),
                            array(
                                'key'           => 'field_about_impact_logo',
                                'label'         => 'Impact Logo/Image',
                                'name'          => 'impact_logo',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                            ),
                            array(
                                'key'           => 'field_about_impact_facts_label',
                                'label'         => 'Impact Facts Label',
                                'name'          => 'facts_label',
                                'type'          => 'text',
                                'default_value' => 'IMPACT FACTS',
                            ),
                            array(
                                'key'   => 'field_about_impact_big_stat',
                                'label' => 'Big Stat Text',
                                'name'  => 'big_stat_text',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_about_impact_big_stat_sub',
                                'label' => 'Big Stat Subtitle',
                                'name'  => 'big_stat_subtitle',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_about_impact_source',
                                'label' => 'Source Citation',
                                'name'  => 'source',
                                'type'  => 'text',
                            ),
                            array(
                                'key'          => 'field_about_impact_stats',
                                'label'        => 'Impact Stats',
                                'name'         => 'stats',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 6,
                                'button_label' => 'Add Stat',
                                'sub_fields'   => array(
                                    array(
                                        'key'           => 'field_about_impact_stat_icon',
                                        'label'         => 'Icon',
                                        'name'          => 'icon',
                                        'type'          => 'image',
                                        'return_format' => 'array',
                                        'preview_size'  => 'thumbnail',
                                    ),
                                    array(
                                        'key'   => 'field_about_impact_stat_number',
                                        'label' => 'Number',
                                        'name'  => 'number',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_about_impact_stat_label',
                                        'label' => 'Label',
                                        'name'  => 'label',
                                        'type'  => 'text',
                                    ),
                                ),
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
                    'value'    => 'page-templates/template-about.php',
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
