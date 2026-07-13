<?php
/**
 * ACF Field Registration: Universal Page Builder
 *
 * A single flexible content field group containing every available section
 * layout. Assign the "Page Builder" template to any page and all sections
 * become available — no per-page field groups required for new pages.
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
        'key'      => 'group_page_builder',
        'title'    => 'Page Builder',
        'fields'   => array(
            array(
                'key'          => 'field_pb_sections',
                'label'        => 'Page Sections',
                'name'         => 'page_sections',
                'type'         => 'flexible_content',
                'button_label' => 'Add Section',
                'acfe_flexible_advanced'            => true,
                'acfe_flexible_stylised_button'     => true,
                'acfe_flexible_layouts_templates'   => true,
                'acfe_flexible_layouts_previews'    => true,
                'acfe_flexible_layouts_thumbnails'  => true,
                'acfe_flexible_modal_edit'          => array(
                    'acfe_flexible_modal_edit_enabled' => true,
                    'acfe_flexible_modal_edit_size'    => 'large',
                ),
                'acfe_flexible_modal'               => array(
                    'acfe_flexible_modal_enabled'    => true,
                    'acfe_flexible_modal_title'      => false,
                    'acfe_flexible_modal_size'       => 'xlarge',
                    'acfe_flexible_modal_col'        => '4',
                    'acfe_flexible_modal_categories' => false,
                ),
                'acfe_flexible_modal_settings'       => array(
                    'acfe_flexible_modal_settings_enabled'     => true,
                    'acfe_flexible_modal_settings_size'        => 'large',
                    'acfe_flexible_modal_settings_close'       => true,
                    'acfe_flexible_modal_settings_close_label' => '',
                ),
                'layouts'      => array(

                    // =================================================================
                    // Hero Section
                    // =================================================================
                    'layout_pb_hero' => array(
                        'key'        => 'layout_pb_hero',
                        'name'       => 'hero_section',
                        'label'      => 'Hero Section (Full-Width Banner)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_hero_bg_image',   'label' => 'Background Image',  'name' => 'background_image', 'type' => 'image',    'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Recommended: 1920×800px.' ),
                            array( 'key' => 'field_pb_hero_subheader',  'label' => 'Sub Header',        'name' => 'sub_header',       'type' => 'text',     'instructions' => 'Small label above the heading.' ),
                            array( 'key' => 'field_pb_hero_header',     'label' => 'Header',            'name' => 'header',           'type' => 'text' ),
                            array( 'key' => 'field_pb_hero_body',       'label' => 'Body Text',         'name' => 'body_text',        'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array( 'key' => 'field_pb_hero_btn_text',   'label' => 'Button Text',       'name' => 'button_text',      'type' => 'text' ),
                            array( 'key' => 'field_pb_hero_btn_url',    'label' => 'Button URL',        'name' => 'button_url',       'type' => 'url' ),
                            array( 'key' => 'field_pb_hero_btn_target', 'label' => 'Open in New Tab',   'name' => 'button_target',    'type' => 'true_false', 'default_value' => 0, 'ui' => 1 ),
                            array( 'key' => 'field_pb_hero_btn2_text',   'label' => 'Secondary Button Text',     'name' => 'button2_text',   'type' => 'text', 'instructions' => 'Optional. Displayed as an outlined button next to the primary button.' ),
                            array( 'key' => 'field_pb_hero_btn2_url',    'label' => 'Secondary Button URL',      'name' => 'button2_url',    'type' => 'url' ),
                            array( 'key' => 'field_pb_hero_btn2_target', 'label' => 'Secondary Open in New Tab', 'name' => 'button2_target', 'type' => 'true_false', 'default_value' => 0, 'ui' => 1 ),
                        ),
                    ),

                    // =================================================================
                    // Cards Section (Events / News)
                    // =================================================================
                    'layout_pb_cards' => array(
                        'key'        => 'layout_pb_cards',
                        'name'       => 'cards_section',
                        'label'      => 'Cards',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_cards_title',           'label' => 'Section Title',        'name' => 'section_title',           'type' => 'text', 'instructions' => 'Optional heading displayed above the cards.' ),
                            array( 'key' => 'field_pb_cards_no_neg_margin',   'label' => 'Disable Negative Margin', 'name' => 'disable_negative_margin', 'type' => 'true_false', 'instructions' => 'Enable to remove the overlap with the section above.', 'default_value' => 0, 'ui' => 1 ),
                            array(
                                'key'          => 'field_pb_cards',
                                'label'        => 'Cards',
                                'name'         => 'cards',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 4,
                                'button_label' => 'Add Card',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_card_label',     'label' => 'Label',     'name' => 'label',     'type' => 'text',     'instructions' => 'e.g. "EVENTS", "NEWS"' ),
                                    array( 'key' => 'field_pb_card_image',     'label' => 'Image',     'name' => 'image',     'type' => 'image',    'return_format' => 'array', 'preview_size' => 'medium' ),
                                    array( 'key' => 'field_pb_card_title',     'label' => 'Title',     'name' => 'title',     'type' => 'text' ),
                                    array( 'key' => 'field_pb_card_body',      'label' => 'Body Text', 'name' => 'body',      'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                                    array( 'key' => 'field_pb_card_link_text', 'label' => 'Link Text', 'name' => 'link_text', 'type' => 'text',     'default_value' => 'Learn More' ),
                                    array( 'key' => 'field_pb_card_link_url',  'label' => 'Link URL',  'name' => 'link_url',  'type' => 'url' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // About / Intro Section
                    // =================================================================
                    'layout_pb_about' => array(
                        'key'        => 'layout_pb_about',
                        'name'       => 'about_section',
                        'label'      => 'Text + Image',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_about_header',   'label' => 'Header',      'name' => 'header',      'type' => 'text',    'default_value' => 'ABOUT PA WORKS' ),
                            array( 'key' => 'field_pb_about_body',     'label' => 'Body Text',   'name' => 'body_text',   'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array( 'key' => 'field_pb_about_btn_text', 'label' => 'Button Text', 'name' => 'button_text', 'type' => 'text' ),
                            array( 'key' => 'field_pb_about_btn_url',  'label' => 'Button URL',  'name' => 'button_url',  'type' => 'url' ),
                            array(
                                'key'           => 'field_pb_about_layout',
                                'label'         => 'Layout',
                                'name'          => 'layout',
                                'type'          => 'select',
                                'choices'       => array(
                                    'default'          => 'Side by side — Text left / Image right',
                                    'reversed'         => 'Side by side — Image left / Text right',
                                    'stacked'          => 'Stacked — Text top / Image bottom',
                                    'reversed_stacked' => 'Stacked — Image top / Text bottom',
                                ),
                                'default_value' => 'default',
                                'allow_null'    => 0,
                                'instructions'  => 'Choose how the text and image are arranged.',
                            ),
                            array( 'key' => 'field_pb_about_image',    'label' => 'Image',       'name' => 'image',       'type' => 'image',   'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Displayed alongside the text, positioned by the Layout setting above.' ),
                            array( 'key' => 'field_pb_about_bg_image', 'label' => 'Background Image', 'name' => 'background_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional background image for this section.' ),
                            array( 'key' => 'field_pb_about_bg_pos',   'label' => 'Background Image Position', 'name' => 'bg_image_position', 'type' => 'select', 'choices' => array( 'left center' => 'Left', 'center center' => 'Center', 'right center' => 'Right' ), 'default_value' => 'center center', 'allow_null' => 0 ),
                        ),
                    ),

                    // =================================================================
                    // Accordion Section (What We Do)
                    // =================================================================
                    'layout_pb_whatwedo' => array(
                        'key'        => 'layout_pb_whatwedo',
                        'name'       => 'whatwedo_section',
                        'label'      => 'Text/ Button + Accordion',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_wwd_subheader', 'label' => 'Sub Header', 'name' => 'sub_header', 'type' => 'text', 'instructions' => 'Small label above the heading.' ),
                            array( 'key' => 'field_pb_wwd_header',   'label' => 'Header',           'name' => 'header',      'type' => 'text', 'default_value' => 'WHAT WE DO' ),
                            array( 'key' => 'field_pb_wwd_body',     'label' => 'Body Text',        'name' => 'body_text',   'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0, 'instructions' => 'Text displayed below the heading on the left side.' ),
                            array( 'key' => 'field_pb_wwd_btn_text', 'label' => 'Button Text',      'name' => 'button_text', 'type' => 'text', 'default_value' => 'Explore Our Focus Areas' ),
                            array( 'key' => 'field_pb_wwd_btn_url',  'label' => 'Button URL',       'name' => 'button_url',  'type' => 'url' ),
                            array(
                                'key'          => 'field_pb_wwd_items',
                                'label'        => 'Focus Area Items',
                                'name'         => 'items',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 8,
                                'button_label' => 'Add Focus Area',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_wwd_item_text', 'label' => 'Focus Area Text', 'name' => 'text',        'type' => 'text' ),
                                    array( 'key' => 'field_pb_wwd_item_desc', 'label' => 'Description',     'name' => 'description', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Shown when the accordion is expanded.' ),
                                ),
                            ),
                            array( 'key' => 'field_pb_wwd_desc',     'label' => 'Footer Description', 'name' => 'description',       'type' => 'textarea', 'rows' => 2, 'instructions' => 'Optional note below the accordion items.' ),
                            array( 'key' => 'field_pb_wwd_overlay_image', 'label' => 'Overlay / Watermark Image', 'name' => 'overlay_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Decorative overlay image shown at low opacity.' ),
                            array( 'key' => 'field_pb_wwd_bg_image', 'label' => 'Background Image',          'name' => 'background_image',  'type' => 'image',  'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional texture overlaid at 12% opacity over the gradient.' ),
                            array( 'key' => 'field_pb_wwd_bg_pos',   'label' => 'Background Image Position', 'name' => 'bg_image_position',         'type' => 'select', 'choices' => array( 'left center' => 'Left', 'center center' => 'Center', 'right center' => 'Right' ), 'default_value' => 'center center', 'allow_null' => 0 ),
                        ),
                    ),

                    // =================================================================
                    // Our Impact Section
                    // =================================================================
                    'layout_pb_impact' => array(
                        'key'        => 'layout_pb_impact',
                        'name'       => 'impact_section',
                        'label'      => 'Image/Text + Icon Accordion',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_impact_header',        'label' => 'Section Header',     'name' => 'header',          'type' => 'text',  'default_value' => 'OUR IMPACT' ),
                            array( 'key' => 'field_pb_impact_logo',          'label' => 'Impact Logo/Image',  'name' => 'impact_logo',     'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
                            array( 'key' => 'field_pb_impact_facts_label',   'label' => 'Impact Facts Label', 'name' => 'facts_label',     'type' => 'text',  'default_value' => 'IMPACT FACTS' ),
                            array( 'key' => 'field_pb_impact_big_stat',      'label' => 'Big Stat Text',      'name' => 'big_stat_text',   'type' => 'text',  'instructions' => 'e.g. "$1.89 TOTAL ECONOMIC IMPACT"' ),
                            array( 'key' => 'field_pb_impact_big_stat_sub',  'label' => 'Big Stat Subtitle',  'name' => 'big_stat_subtitle','type' => 'text', 'instructions' => 'e.g. "For Every $1.00 in WIOA Expenditures"' ),
                            array( 'key' => 'field_pb_impact_source',   'label' => 'Source Citation',          'name' => 'source',          'type' => 'text' ),
                            array( 'key' => 'field_pb_impact_bg_image', 'label' => 'Background Image',          'name' => 'background_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional background image for this section.' ),
                            array( 'key' => 'field_pb_impact_bg_pos',   'label' => 'Background Image Position', 'name' => 'bg_image_position', 'type' => 'select', 'choices' => array( 'left center' => 'Left', 'center center' => 'Center', 'right center' => 'Right' ), 'default_value' => 'center center', 'allow_null' => 0 ),
                            array(
                                'key'          => 'field_pb_impact_stats',
                                'label'        => 'Impact Stats',
                                'name'         => 'stats',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 6,
                                'button_label' => 'Add Stat',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_stat_icon',   'label' => 'Icon',   'name' => 'icon',   'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail' ),
                                    array( 'key' => 'field_pb_stat_label',  'label' => 'Label',  'name' => 'label',  'type' => 'text',  'instructions' => 'e.g. "WORKFORCE DEVELOPMENT BOARDS"' ),
                                    array( 'key' => 'field_pb_stat_description', 'label' => 'Body Text', 'name' => 'description', 'type' => 'textarea', 'rows' => 4, 'instructions' => 'Text revealed when this stat is clicked/expanded.' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Our Team Section
                    // =================================================================
                    'layout_pb_team' => array(
                        'key'        => 'layout_pb_team',
                        'name'       => 'team_section',
                        'label'      => 'Our Team (Photo Grid)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_team_header',        'label' => 'Header',                  'name' => 'header',        'type' => 'text',  'default_value' => 'OUR TEAM IS HERE TO HELP' ),
                            array( 'key' => 'field_pb_team_bg_image',      'label' => 'Background Image',           'name' => 'background_image', 'type' => 'image',  'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional full-bleed bg. Gradient overlays it.' ),
                            array( 'key' => 'field_pb_team_bg_pos',        'label' => 'Background Image Position', 'name' => 'bg_image_position', 'type' => 'select', 'choices' => array( 'left center' => 'Left', 'center center' => 'Center', 'right center' => 'Right' ), 'default_value' => 'center center', 'allow_null' => 0 ),
                            array( 'key' => 'field_pb_team_overlay_image', 'label' => 'Overlay / Watermark Image', 'name' => 'overlay_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Decorative image (e.g. PA state shape) shown at low opacity.' ),
                            array(
                                'key'          => 'field_pb_team_members',
                                'label'        => 'Team Members',
                                'name'         => 'members',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 12,
                                'button_label' => 'Add Team Member',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_member_photo', 'label' => 'Photo',              'name' => 'photo', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'Square headshot, min 400×400px.' ),
                                    array( 'key' => 'field_pb_member_name',  'label' => 'Name',               'name' => 'name',  'type' => 'text' ),
                                    array( 'key' => 'field_pb_member_title', 'label' => 'Title / Credentials','name' => 'title', 'type' => 'text', 'instructions' => 'e.g. "Ed.D.", "MPAP" — appended after the name.' ),
                                    array( 'key' => 'field_pb_member_role',  'label' => 'Role',               'name' => 'role',  'type' => 'text', 'instructions' => 'Job title (e.g. "Executive Director").' ),
                                ),
                            ),
                            array( 'key' => 'field_pb_team_btn_text', 'label' => 'Button Text', 'name' => 'button_text', 'type' => 'text', 'default_value' => 'Contact Us Today!' ),
                            array( 'key' => 'field_pb_team_btn_url',  'label' => 'Button URL',  'name' => 'button_url',  'type' => 'url' ),
                        ),
                    ),

                    // =================================================================
                    // Our Mission Section (About)
                    // =================================================================
                    'layout_pb_mission' => array(
                        'key'        => 'layout_pb_mission',
                        'name'       => 'mission_section',
                        'label'      => 'Our Mission (Text + Bullet Cards)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_mission_subheader', 'label' => 'Sub Header', 'name' => 'sub_header', 'type' => 'text', 'instructions' => 'Small label above heading, e.g. "WHO WE ARE".' ),
                            array( 'key' => 'field_pb_mission_header',    'label' => 'Header',     'name' => 'header',     'type' => 'text', 'default_value' => 'OUR MISSION' ),
                            array( 'key' => 'field_pb_mission_body',      'label' => 'Body Text',  'name' => 'body_text',  'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_pb_mission_info_boxes',
                                'label'        => 'Info Boxes',
                                'name'         => 'info_boxes',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 0,
                                'max'          => 4,
                                'button_label' => 'Add Info Box',
                                'instructions' => 'Colored boxes on the right (e.g. Federal Level, State Level).',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_mbox_header', 'label' => 'Box Header', 'name' => 'box_header', 'type' => 'text' ),
                                    array(
                                        'key'          => 'field_pb_mbox_items',
                                        'label'        => 'Bullet Points',
                                        'name'         => 'items',
                                        'type'         => 'repeater',
                                        'layout'       => 'table',
                                        'min'          => 1,
                                        'max'          => 10,
                                        'button_label' => 'Add Point',
                                        'sub_fields'   => array(
                                            array( 'key' => 'field_pb_mbox_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
                                        ),
                                    ),
                                    array( 'key' => 'field_pb_mbox_style', 'label' => 'Box Style', 'name' => 'box_style', 'type' => 'select', 'choices' => array( 'yellow' => 'Yellow / Gold', 'blue' => 'Blue / Teal', 'navy' => 'Navy', 'orange' => 'Orange' ), 'default_value' => 'yellow' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Board of Directors Section
                    // =================================================================
                    'layout_pb_board' => array(
                        'key'        => 'layout_pb_board',
                        'name'       => 'board_section',
                        'label'      => 'Member Image Grid',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_board_subheader', 'label' => 'Sub Header', 'name' => 'sub_header', 'type' => 'text', 'instructions' => 'e.g. "LEADERSHIP"' ),
                            array( 'key' => 'field_pb_board_header',    'label' => 'Header',     'name' => 'header',     'type' => 'text', 'default_value' => 'BOARD OF DIRECTORS' ),
                            array(
                                'key'          => 'field_pb_board_members',
                                'label'        => 'Board Members',
                                'name'         => 'members',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 30,
                                'button_label' => 'Add Board Member',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_board_photo',       'label' => 'Photo',         'name' => 'photo',        'type' => 'image',    'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'Headshot or org logo.' ),
                                    array( 'key' => 'field_pb_board_name',        'label' => 'Name',          'name' => 'name',         'type' => 'text' ),
                                    array( 'key' => 'field_pb_board_position',    'label' => 'Position',      'name' => 'position',     'type' => 'text',     'instructions' => 'e.g. "CEO", "Director"' ),
                                    array( 'key' => 'field_pb_board_org',         'label' => 'Organization',  'name' => 'organization', 'type' => 'text' ),
                                    array( 'key' => 'field_pb_board_highlighted', 'label' => 'Highlighted',   'name' => 'highlighted',  'type' => 'true_false', 'default_value' => 0, 'ui' => 1, 'instructions' => 'Visually highlights this member with a different background.' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // PA's Local Workforce System Section
                    // =================================================================
                    'layout_pb_workforce_system' => array(
                        'key'        => 'layout_pb_workforce_system',
                        'name'       => 'workforce_system_section',
                        'label'      => "PA's Workforce System (Map + Content)",
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_wfs_subheader', 'label' => 'Sub Header',       'name' => 'sub_header',  'type' => 'text',    'instructions' => 'e.g. "THE SYSTEM"' ),
                            array( 'key' => 'field_pb_wfs_header',    'label' => 'Header',           'name' => 'header',      'type' => 'text',    'default_value' => "PA'S LOCAL WORKFORCE SYSTEM" ),
                            array( 'key' => 'field_pb_wfs_map',       'label' => 'Map / Hero Image', 'name' => 'map_image',   'type' => 'image',   'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Large map or infographic.' ),
                            array( 'key' => 'field_pb_wfs_body',      'label' => 'Body Content',     'name' => 'body_content','type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 1 ),
                        ),
                    ),

                    // =================================================================
                    // Call to Action Section
                    // =================================================================
                    'layout_pb_cta' => array(
                        'key'        => 'layout_pb_cta',
                        'name'       => 'cta_section',
                        'label'      => 'Call to Action (Centered CTA)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_cta_subheader', 'label' => 'Sub Header',      'name' => 'sub_header',  'type' => 'text' ),
                            array( 'key' => 'field_pb_cta_header',    'label' => 'Header',          'name' => 'header',      'type' => 'text' ),
                            array( 'key' => 'field_pb_cta_body',      'label' => 'Body Text',       'name' => 'body_text',   'type' => 'textarea', 'rows' => 2, 'new_lines' => 'br' ),
                            array( 'key' => 'field_pb_cta_btn_text',  'label' => 'Button Text',     'name' => 'button_text', 'type' => 'text' ),
                            array( 'key' => 'field_pb_cta_btn_url',   'label' => 'Button URL',      'name' => 'button_url',  'type' => 'url' ),
                            array( 'key' => 'field_pb_cta_bg_style',  'label' => 'Background Style','name' => 'bg_style',    'type' => 'select', 'choices' => array( 'light' => 'Light (Off-White)', 'sky' => 'Sky Blue (#9bd3dd)', 'blue' => 'Blue Gradient', 'navy' => 'Navy', 'yellow' => 'Yellow Accent' ), 'default_value' => 'light' ),
                        ),
                    ),

                    // =================================================================
                    // Content + Strategies Section (Advocacy)
                    // =================================================================
                    'layout_pb_content_strategies' => array(
                        'key'        => 'layout_pb_content_strategies',
                        'name'       => 'content_strategies_section',
                        'label'      => 'Text + Numbered List',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_cs_subheader',    'label' => 'Sub Header',            'name' => 'sub_header',  'type' => 'text' ),
                            array( 'key' => 'field_pb_cs_header',       'label' => 'Header',                'name' => 'header',      'type' => 'text' ),
                            array( 'key' => 'field_pb_cs_body',         'label' => 'Body Text',             'name' => 'body_text',   'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_pb_cs_accordion',
                                'label'        => 'Accordion Items',
                                'name'         => 'accordion_items',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 0,
                                'max'          => 10,
                                'button_label' => 'Add Accordion Item',
                                'instructions' => 'Optional expandable items displayed below the body text.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_cs_accordion_title',   'label' => 'Title',   'name' => 'title',   'type' => 'text' ),
                                    array( 'key' => 'field_pb_cs_accordion_content', 'label' => 'Content', 'name' => 'content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                                ),
                            ),
                            array( 'key' => 'field_pb_cs_btn_text',        'label' => 'Button Text',              'name' => 'button_text',    'type' => 'text' ),
                            array( 'key' => 'field_pb_cs_btn_url',         'label' => 'Button URL',               'name' => 'button_url',     'type' => 'url' ),
                            array( 'key' => 'field_pb_cs_section_bg',      'label' => 'Section Background Image', 'name' => 'section_bg_image','type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional. Displays at 5% opacity behind the entire section.' ),
                            array( 'key' => 'field_pb_cs_list_header',     'label' => 'Strategies List Header',   'name' => 'list_header',    'type' => 'text', 'instructions' => 'e.g. "TOP 10 STRATEGIES TO GET PENNSYLVANIANS BACK TO WORK"' ),
                            array( 'key' => 'field_pb_cs_list_bg_image',   'label' => 'Strategies List Background Image', 'name' => 'list_bg_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional. Displays behind the strategies list with a gradient overlay at 5% opacity.' ),
                            array(
                                'key'          => 'field_pb_cs_strategies',
                                'label'        => 'Strategies',
                                'name'         => 'strategies',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 1,
                                'max'          => 15,
                                'button_label' => 'Add Strategy',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_strategy_text', 'label' => 'Strategy Text', 'name' => 'text', 'type' => 'text' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Two Column Engage Section
                    // =================================================================
                    'layout_pb_engage' => array(
                        'key'        => 'layout_pb_engage',
                        'name'       => 'engage_section',
                        'label'      => 'Side-by-side Text Fields',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_engage_left_header',  'label' => 'Left Header',  'name' => 'left_header',  'type' => 'text',    'default_value' => 'HOW TO ENGAGE' ),
                            array( 'key' => 'field_pb_engage_left_content', 'label' => 'Left Content', 'name' => 'left_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_pb_engage_left_buttons',
                                'label'        => 'Left Buttons',
                                'name'         => 'left_buttons',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 5,
                                'button_label' => 'Add Button',
                                'instructions' => 'Optional buttons displayed below the left content.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_engage_left_btn_text',  'label' => 'Button Text',  'name' => 'button_text',  'type' => 'text' ),
                                    array( 'key' => 'field_pb_engage_left_btn_url',   'label' => 'Button URL',   'name' => 'button_url',   'type' => 'url' ),
                                    array( 'key' => 'field_pb_engage_left_btn_style', 'label' => 'Button Style', 'name' => 'button_style', 'type' => 'select', 'choices' => array( 'pw-btn--primary' => 'Primary (Gold)', 'pw-btn--outline' => 'Outline' ), 'default_value' => 'pw-btn--primary', 'allow_null' => 0 ),
                                ),
                            ),
                            array( 'key' => 'field_pb_engage_right_header',  'label' => 'Right Header',  'name' => 'right_header',  'type' => 'text',    'default_value' => 'WHY IT MATTERS' ),
                            array( 'key' => 'field_pb_engage_right_content', 'label' => 'Right Content', 'name' => 'right_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                            array(
                                'key'          => 'field_pb_engage_right_buttons',
                                'label'        => 'Right Buttons',
                                'name'         => 'right_buttons',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 5,
                                'button_label' => 'Add Button',
                                'instructions' => 'Optional buttons displayed below the right content.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_engage_right_btn_text',  'label' => 'Button Text',  'name' => 'button_text',  'type' => 'text' ),
                                    array( 'key' => 'field_pb_engage_right_btn_url',   'label' => 'Button URL',   'name' => 'button_url',   'type' => 'url' ),
                                    array( 'key' => 'field_pb_engage_right_btn_style', 'label' => 'Button Style', 'name' => 'button_style', 'type' => 'select', 'choices' => array( 'pw-btn--primary' => 'Primary (Gold)', 'pw-btn--outline' => 'Outline' ), 'default_value' => 'pw-btn--primary', 'allow_null' => 0 ),
                                ),
                            ),
                            array( 'key' => 'field_pb_engage_center_btn_text', 'label' => 'Centered Button Text', 'name' => 'center_button_text', 'type' => 'text', 'default_value' => 'Get Involved' ),
                            array( 'key' => 'field_pb_engage_center_btn_url',  'label' => 'Centered Button URL',  'name' => 'center_button_url',  'type' => 'url' ),
                            array( 'key' => 'field_pb_engage_section_bg',     'label' => 'Section Background Image', 'name' => 'section_bg_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional. Displays at 5% opacity behind the entire section.' ),
                        ),
                    ),

                    // =================================================================
                    // WIOA / Legislation Section
                    // =================================================================
                    'layout_pb_wioa' => array(
                        'key'        => 'layout_pb_wioa',
                        'name'       => 'wioa_section',
                        'label'      => 'Text + Image/Links',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_wioa_subheader',    'label' => 'Sub Header',       'name' => 'sub_header',  'type' => 'text', 'instructions' => 'e.g. "FEDERAL FRAMEWORK"' ),
                            array( 'key' => 'field_pb_wioa_header',       'label' => 'Header',           'name' => 'header',      'type' => 'text' ),
                            array( 'key' => 'field_pb_wioa_body',         'label' => 'Body Content',     'name' => 'body_content','type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),
                            array( 'key' => 'field_pb_wioa_image',        'label' => 'Image',            'name' => 'image',       'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Displayed alongside the body text.' ),
                            array( 'key' => 'field_pb_wioa_links_header', 'label' => 'Quick Links Header','name' => 'links_header','type' => 'text', 'default_value' => 'QUICK LINKS' ),
                            array(
                                'key'          => 'field_pb_wioa_links',
                                'label'        => 'Quick Links',
                                'name'         => 'quick_links',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 10,
                                'button_label' => 'Add Link',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_link_text', 'label' => 'Link Text', 'name' => 'text', 'type' => 'text' ),
                                    array( 'key' => 'field_pb_link_url',  'label' => 'URL',       'name' => 'url',  'type' => 'url' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Fellowship Intro Section
                    // =================================================================
                    'layout_pb_intro' => array(
                        'key'        => 'layout_pb_intro',
                        'name'       => 'intro_section',
                        'label'      => 'Text /Button + Quote',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_intro_header',       'label' => 'Header',           'name' => 'header',       'type' => 'text' ),
                            array( 'key' => 'field_pb_intro_body',         'label' => 'Body Content',     'name' => 'body_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),
                            array( 'key' => 'field_pb_intro_btn_text',     'label' => 'Button Text',      'name' => 'button_text',   'type' => 'text', 'default_value' => 'Apply for the Fellowship' ),
                            array( 'key' => 'field_pb_intro_btn_url',      'label' => 'Button URL',       'name' => 'button_url',    'type' => 'url' ),
                            array( 'key' => 'field_pb_intro_btn_align',    'label' => 'Button Alignment', 'name' => 'button_align',  'type' => 'select', 'choices' => array( 'left' => 'Left', 'center' => 'Center' ), 'default_value' => 'left' ),
                            array( 'key' => 'field_pb_intro_quote',        'label' => 'Testimonial Quote','name' => 'quote',        'type' => 'textarea', 'rows' => 4, 'instructions' => 'Featured testimonial displayed prominently.' ),
                            array( 'key' => 'field_pb_intro_quote_author', 'label' => 'Quote Author',     'name' => 'quote_author', 'type' => 'text' ),
                        ),
                    ),

                    // =================================================================
                    // Program Details Section (Fellowship)
                    // =================================================================
                    'layout_pb_program' => array(
                        'key'        => 'layout_pb_program',
                        'name'       => 'program_section',
                        'label'      => 'Program Details',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_prog_subheader',        'label' => 'Sub Header',       'name' => 'sub_header',      'type' => 'text', 'instructions' => 'e.g. "FELLOWSHIP PROGRAM"' ),
                            array( 'key' => 'field_pb_prog_header',           'label' => 'Header',           'name' => 'header',          'type' => 'text' ),
                            array( 'key' => 'field_pb_prog_body',             'label' => 'Body Content',     'name' => 'body_content',    'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),
                            array( 'key' => 'field_pb_prog_bg_image',         'label' => 'Background Image', 'name' => 'background_image','type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional. Displays as a watermark behind the section content.' ),
                            array( 'key' => 'field_pb_prog_details_header',   'label' => 'Details Sub-Heading', 'name' => 'details_header', 'type' => 'text', 'default_value' => 'Program Details', 'instructions' => 'Heading shown above the key-value details list.' ),
                            array(
                                'key'          => 'field_pb_prog_details',
                                'label'        => 'Program Details',
                                'name'         => 'details',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 8,
                                'button_label' => 'Add Detail',
                                'instructions' => 'Key-value pairs: When, Cost, Where, Application, etc.',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_detail_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
                                    array( 'key' => 'field_pb_detail_value', 'label' => 'Value', 'name' => 'value', 'type' => 'text' ),
                                ),
                            ),
                            array( 'key' => 'field_pb_prog_sched_header', 'label' => 'Schedule Header', 'name' => 'schedule_header', 'type' => 'text' ),
                            array(
                                'key'          => 'field_pb_prog_schedule',
                                'label'        => 'Schedule Items',
                                'name'         => 'schedule',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 12,
                                'button_label' => 'Add Schedule Item',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_sched_date', 'label' => 'Date',        'name' => 'date',        'type' => 'text', 'instructions' => 'e.g. "October 7-8"' ),
                                    array( 'key' => 'field_pb_sched_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'text' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Expectations & Requirements Section (Fellowship)
                    // =================================================================
                    'layout_pb_expectations' => array(
                        'key'        => 'layout_pb_expectations',
                        'name'       => 'expectations_section',
                        'label'      => 'Multiple Lists',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'          => 'field_pb_exp_lists',
                                'label'        => 'Content Lists',
                                'name'         => 'content_lists',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 5,
                                'button_label' => 'Add List Section',
                                'instructions' => 'Each entry becomes a section, e.g. "Fellows Can Expect:", "Who Should Apply".',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_exp_list_header', 'label' => 'Section Header', 'name' => 'header', 'type' => 'text' ),
                                    array(
                                        'key'          => 'field_pb_exp_list_items',
                                        'label'        => 'Items',
                                        'name'         => 'items',
                                        'type'         => 'repeater',
                                        'layout'       => 'table',
                                        'min'          => 1,
                                        'max'          => 15,
                                        'button_label' => 'Add Item',
                                        'sub_fields'   => array(
                                            array( 'key' => 'field_pb_exp_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0, 'instructions' => 'Bold the first few words for a label effect, e.g. <strong>Exclusive Training:</strong> Fellows receive...' ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Meet the Fellows Section
                    // =================================================================
                    'layout_pb_meet_fellows' => array(
                        'key'        => 'layout_pb_meet_fellows',
                        'name'       => 'meet_fellows_section',
                        'label'      => 'Meet the Fellows (Video + Content)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_meet_subheader', 'label' => 'Sub Header',        'name' => 'sub_header',     'type' => 'text',  'instructions' => 'e.g. "2024 PWDA FELLOWS"' ),
                            array( 'key' => 'field_pb_meet_header',    'label' => 'Header',            'name' => 'header',         'type' => 'text',  'default_value' => 'MEET THE FELLOWS' ),
                            array( 'key' => 'field_pb_meet_video',     'label' => 'Video URL',         'name' => 'video_url',      'type' => 'url',   'instructions' => 'YouTube or Vimeo URL. Embedded automatically.' ),
                            array( 'key' => 'field_pb_meet_thumb',     'label' => 'Video Thumbnail',   'name' => 'video_thumbnail','type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'Optional custom thumbnail.' ),
                            array( 'key' => 'field_pb_meet_body',      'label' => 'Additional Content','name' => 'body_content',   'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0 ),
                        ),
                    ),

                    // =================================================================
                    // Logo Carousel Section
                    // =================================================================
                    'layout_pb_logo_carousel' => array(
                        'key'        => 'layout_pb_logo_carousel',
                        'name'       => 'logo_carousel_section',
                        'label'      => 'Scrolling Carousel',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_lc_header', 'label' => 'Header', 'name' => 'header', 'type' => 'text', 'instructions' => 'Optional heading above the carousel.' ),
                            array(
                                'key'          => 'field_pb_lc_logos',
                                'label'        => 'Logos',
                                'name'         => 'logos',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 20,
                                'button_label' => 'Add Logo',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_lc_image',        'label' => 'Logo / Photo', 'name' => 'image',        'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'Organization logo or headshot.' ),
                                    array( 'key' => 'field_pb_lc_organization', 'label' => 'Organization', 'name' => 'organization', 'type' => 'text' ),
                                    array( 'key' => 'field_pb_lc_name',         'label' => 'Name',         'name' => 'name',         'type' => 'text' ),
                                    array( 'key' => 'field_pb_lc_title',        'label' => 'Title',        'name' => 'title',        'type' => 'text' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Sponsors Carousel Section
                    // =================================================================
                    'layout_pb_sponsors' => array(
                        'key'        => 'layout_pb_sponsors',
                        'name'       => 'sponsors_section',
                        'label'      => 'Sponsors Carousel (Flip Cards)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_sponsors_subheader', 'label' => 'Sub Header', 'name' => 'sub_header', 'type' => 'text', 'default_value' => 'OUR SPONSORS', 'instructions' => 'Small label above the heading.' ),
                            array( 'key' => 'field_pb_sponsors_header',    'label' => 'Header',     'name' => 'header',     'type' => 'text', 'default_value' => 'THANK FOR THE SUPPORT OF:' ),
                            array( 'key' => 'field_pb_sponsors_body',      'label' => 'Body Text',  'name' => 'body_text',  'type' => 'textarea', 'rows' => 2, 'instructions' => 'Text displayed above the carousel.' ),
                            array(
                                'key'          => 'field_pb_sponsors_items',
                                'label'        => 'Sponsors',
                                'name'         => 'sponsors',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 60,
                                'button_label' => 'Add Sponsor',
                                'sub_fields'   => array(
                                    array( 'key' => 'field_pb_sponsor_logo',    'label' => 'Logo',         'name' => 'logo',    'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail' ),
                                    array( 'key' => 'field_pb_sponsor_company', 'label' => 'Company Name', 'name' => 'company', 'type' => 'text' ),
                                    array( 'key' => 'field_pb_sponsor_url',     'label' => 'URL',          'name' => 'url',     'type' => 'url', 'instructions' => 'Opens in a new tab when the card is clicked.' ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // Quote Section
                    // =================================================================
                    'layout_pb_quote' => array(
                        'key'        => 'layout_pb_quote',
                        'name'       => 'quote_section',
                        'label'      => 'Quote (Centered Blockquote)',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_quote_text', 'label' => 'Quote Text', 'name' => 'quote_text', 'type' => 'textarea', 'rows' => 4, 'instructions' => 'The quote content (quotation marks are added automatically).' ),
                            array( 'key' => 'field_pb_quote_name', 'label' => 'Attribution Name', 'name' => 'quote_name', 'type' => 'text', 'instructions' => 'Name shown below the quote.' ),
                            array( 'key' => 'field_pb_quote_role', 'label' => 'Attribution Role / Organization', 'name' => 'quote_role', 'type' => 'text', 'instructions' => 'Optional title or organization shown under the name.' ),
                            array( 'key' => 'field_pb_quote_avatar', 'label' => 'Avatar Image', 'name' => 'quote_avatar', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => 'Optional circular photo/icon shown overlapping the top-left corner of the quote box.' ),
                        ),
                    ),

                    // =================================================================
                    // WYSIWYG Section (Free-form Content)
                    // =================================================================
                    'layout_pb_wysiwyg' => array(
                        'key'        => 'layout_pb_wysiwyg',
                        'name'       => 'wysiwyg_section',
                        'label'      => 'WYSIWYG',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array( 'key' => 'field_pb_wysiwyg_header',  'label' => 'Header', 'name' => 'header', 'type' => 'text', 'instructions' => 'Optional heading displayed above the content.' ),
                            array( 'key' => 'field_pb_wysiwyg_content', 'label' => 'Content', 'name' => 'content', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 1 ),
                        ),
                    ),

                ), // end layouts
            ), // end field_pb_sections
        ), // end fields
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-templates/template-page-builder.php',
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
