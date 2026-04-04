<?php
/**
 * ACF Field Registration: Fellowship Page Flexible Content
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
        'key'      => 'group_fellowship_page',
        'title'    => 'Fellowship Page Builder',
        'fields'   => array(
            array(
                'key'        => 'field_fellowship_sections',
                'label'      => 'Page Sections',
                'name'       => 'fellowship_sections',
                'type'       => 'flexible_content',
                'button_label' => 'Add Section',
                'layouts'    => array(

                    // =================================================================
                    // LAYOUT: Fellowship Intro / Hero
                    // =================================================================
                    'layout_intro' => array(
                        'key'        => 'layout_fellow_intro',
                        'name'       => 'intro_section',
                        'label'      => 'Fellowship Intro',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_fellow_intro_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'        => 'field_fellow_intro_body',
                                'label'      => 'Body Content',
                                'name'       => 'body_content',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'full',
                                'media_upload' => 0,
                            ),
                            array(
                                'key'   => 'field_fellow_intro_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Apply for the Fellowship',
                            ),
                            array(
                                'key'   => 'field_fellow_intro_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'   => 'field_fellow_intro_quote',
                                'label' => 'Testimonial Quote',
                                'name'  => 'quote',
                                'type'  => 'textarea',
                                'rows'  => 4,
                                'instructions' => 'Featured testimonial quote displayed prominently.',
                            ),
                            array(
                                'key'   => 'field_fellow_intro_quote_author',
                                'label' => 'Quote Author',
                                'name'  => 'quote_author',
                                'type'  => 'text',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Program Details Section
                    // =================================================================
                    'layout_program' => array(
                        'key'        => 'layout_fellow_program',
                        'name'       => 'program_section',
                        'label'      => 'Program Details',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_fellow_prog_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "FELLOWSHIP PROGRAM"',
                            ),
                            array(
                                'key'   => 'field_fellow_prog_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'        => 'field_fellow_prog_body',
                                'label'      => 'Body Content',
                                'name'       => 'body_content',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'full',
                                'media_upload' => 0,
                            ),
                            // Program Details grid
                            array(
                                'key'          => 'field_fellow_prog_details',
                                'label'        => 'Program Details',
                                'name'         => 'details',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 8,
                                'button_label' => 'Add Detail',
                                'instructions' => 'Key-value pairs like When, Cost, Where, Application.',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_fellow_detail_label',
                                        'label' => 'Label',
                                        'name'  => 'label',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_fellow_detail_value',
                                        'label' => 'Value',
                                        'name'  => 'value',
                                        'type'  => 'text',
                                    ),
                                ),
                            ),
                            // Schedule
                            array(
                                'key'   => 'field_fellow_prog_schedule_header',
                                'label' => 'Schedule Header',
                                'name'  => 'schedule_header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'          => 'field_fellow_prog_schedule',
                                'label'        => 'Schedule Items',
                                'name'         => 'schedule',
                                'type'         => 'repeater',
                                'layout'       => 'table',
                                'min'          => 0,
                                'max'          => 12,
                                'button_label' => 'Add Schedule Item',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_fellow_sched_date',
                                        'label' => 'Date',
                                        'name'  => 'date',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "October 7-8"',
                                    ),
                                    array(
                                        'key'   => 'field_fellow_sched_desc',
                                        'label' => 'Description',
                                        'name'  => 'description',
                                        'type'  => 'text',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Expectations / Requirements Lists
                    // =================================================================
                    'layout_expectations' => array(
                        'key'        => 'layout_fellow_expectations',
                        'name'       => 'expectations_section',
                        'label'      => 'Expectations & Requirements',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'          => 'field_fellow_exp_lists',
                                'label'        => 'Content Lists',
                                'name'         => 'content_lists',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 1,
                                'max'          => 5,
                                'button_label' => 'Add List Section',
                                'instructions' => 'Each list becomes a section (e.g., "Fellows Can Expect:", "Fellows Will Learn:", "Who Should Apply").',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_fellow_exp_list_header',
                                        'label' => 'Section Header',
                                        'name'  => 'header',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'          => 'field_fellow_exp_list_items',
                                        'label'        => 'Items',
                                        'name'         => 'items',
                                        'type'         => 'repeater',
                                        'layout'       => 'table',
                                        'min'          => 1,
                                        'max'          => 15,
                                        'button_label' => 'Add Item',
                                        'sub_fields'   => array(
                                            array(
                                                'key'   => 'field_fellow_exp_item_text',
                                                'label' => 'Text',
                                                'name'  => 'text',
                                                'type'  => 'textarea',
                                                'rows'  => 2,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: CTA Button Section
                    // =================================================================
                    'layout_cta' => array(
                        'key'        => 'layout_fellow_cta',
                        'name'       => 'cta_section',
                        'label'      => 'Call to Action',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_fellow_cta_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Start Application Now!',
                            ),
                            array(
                                'key'   => 'field_fellow_cta_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Meet the Fellows / Video Section
                    // =================================================================
                    'layout_fellows' => array(
                        'key'        => 'layout_fellow_meet',
                        'name'       => 'meet_fellows_section',
                        'label'      => 'Meet the Fellows',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_fellow_meet_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "2024 PWDA FELLOWS"',
                            ),
                            array(
                                'key'   => 'field_fellow_meet_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'MEET THE FELLOWS',
                            ),
                            array(
                                'key'   => 'field_fellow_meet_video_url',
                                'label' => 'Video URL',
                                'name'  => 'video_url',
                                'type'  => 'url',
                                'instructions' => 'YouTube or Vimeo URL. Will be embedded automatically.',
                            ),
                            array(
                                'key'           => 'field_fellow_meet_video_thumb',
                                'label'         => 'Video Thumbnail',
                                'name'          => 'video_thumbnail',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                                'instructions'  => 'Optional custom thumbnail image for the video.',
                            ),
                            array(
                                'key'        => 'field_fellow_meet_body',
                                'label'      => 'Additional Content',
                                'name'       => 'body_content',
                                'type'       => 'wysiwyg',
                                'tabs'       => 'all',
                                'toolbar'    => 'basic',
                                'media_upload' => 0,
                                'instructions' => 'Optional content below the video.',
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
                    'value'    => 'page-templates/template-fellowship.php',
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
