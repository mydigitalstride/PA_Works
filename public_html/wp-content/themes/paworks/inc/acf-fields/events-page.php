<?php
/**
 * ACF Field Registration: Events Page Flexible Content
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
        'key'      => 'group_events_page',
        'title'    => 'Events Page Builder',
        'fields'   => array(
            array(
                'key'        => 'field_events_sections',
                'label'      => 'Page Sections',
                'name'       => 'events_sections',
                'type'       => 'flexible_content',
                'button_label' => 'Add Section',
                'layouts'    => array(

                    // =================================================================
                    // LAYOUT: Hero Section
                    // =================================================================
                    'layout_hero' => array(
                        'key'        => 'layout_events_hero',
                        'name'       => 'hero_section',
                        'label'      => 'Hero Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'           => 'field_events_hero_bg_image',
                                'label'         => 'Background Image',
                                'name'          => 'background_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'medium',
                            ),
                            array(
                                'key'   => 'field_events_hero_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_events_hero_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_events_hero_body',
                                'label' => 'Body Text',
                                'name'  => 'body_text',
                                'type'  => 'textarea',
                                'rows'  => 3,
                                'new_lines' => 'br',
                            ),
                            array(
                                'key'   => 'field_events_hero_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_events_hero_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
                            ),
                            array(
                                'key'           => 'field_events_hero_btn_target',
                                'label'         => 'Open in New Tab',
                                'name'          => 'button_target',
                                'type'          => 'true_false',
                                'default_value' => 0,
                                'ui'            => 1,
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: Upcoming Events Section
                    // =================================================================
                    'layout_upcoming' => array(
                        'key'        => 'layout_events_upcoming',
                        'name'       => 'upcoming_events_section',
                        'label'      => 'Upcoming Events Section',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_events_upcoming_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                                'instructions' => 'e.g., "WHAT\'S HAPPENING"',
                            ),
                            array(
                                'key'   => 'field_events_upcoming_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                                'default_value' => 'UPCOMING EVENTS',
                            ),
                            array(
                                'key'   => 'field_events_upcoming_calendar_shortcode',
                                'label' => 'Calendar Shortcode',
                                'name'  => 'calendar_shortcode',
                                'type'  => 'text',
                                'instructions' => 'If using a calendar plugin, paste its shortcode here (e.g., [events_calendar]). Leave blank to use the manual events list below.',
                            ),
                            array(
                                'key'          => 'field_events_upcoming_events',
                                'label'        => 'Manual Events List',
                                'name'         => 'events_list',
                                'type'         => 'repeater',
                                'layout'       => 'block',
                                'min'          => 0,
                                'max'          => 20,
                                'button_label' => 'Add Event',
                                'instructions' => 'Only used if Calendar Shortcode is empty.',
                                'sub_fields'   => array(
                                    array(
                                        'key'   => 'field_events_event_title',
                                        'label' => 'Event Title',
                                        'name'  => 'title',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'           => 'field_events_event_date',
                                        'label'         => 'Date',
                                        'name'          => 'date',
                                        'type'          => 'date_picker',
                                        'display_format' => 'F j, Y',
                                        'return_format'  => 'F j, Y',
                                    ),
                                    array(
                                        'key'   => 'field_events_event_time',
                                        'label' => 'Time',
                                        'name'  => 'time',
                                        'type'  => 'text',
                                        'instructions' => 'e.g., "11:00 AM - 12:30 PM EST"',
                                    ),
                                    array(
                                        'key'   => 'field_events_event_description',
                                        'label' => 'Description',
                                        'name'  => 'description',
                                        'type'  => 'textarea',
                                        'rows'  => 3,
                                    ),
                                    array(
                                        'key'   => 'field_events_event_presenter',
                                        'label' => 'Presenter / Host',
                                        'name'  => 'presenter',
                                        'type'  => 'text',
                                    ),
                                    array(
                                        'key'   => 'field_events_event_register_url',
                                        'label' => 'Register URL',
                                        'name'  => 'register_url',
                                        'type'  => 'url',
                                    ),
                                    array(
                                        'key'           => 'field_events_event_featured',
                                        'label'         => 'Featured Event',
                                        'name'          => 'featured',
                                        'type'          => 'true_false',
                                        'default_value' => 0,
                                        'ui'            => 1,
                                        'instructions'  => 'Featured events get a larger, highlighted display.',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // =================================================================
                    // LAYOUT: CTA Section
                    // =================================================================
                    'layout_cta' => array(
                        'key'        => 'layout_events_cta',
                        'name'       => 'cta_section',
                        'label'      => 'Call to Action',
                        'display'    => 'block',
                        'sub_fields' => array(
                            array(
                                'key'   => 'field_events_cta_subheader',
                                'label' => 'Sub Header',
                                'name'  => 'sub_header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_events_cta_header',
                                'label' => 'Header',
                                'name'  => 'header',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_events_cta_btn_text',
                                'label' => 'Button Text',
                                'name'  => 'button_text',
                                'type'  => 'text',
                                'default_value' => 'Sign up for Membership',
                            ),
                            array(
                                'key'   => 'field_events_cta_btn_url',
                                'label' => 'Button URL',
                                'name'  => 'button_url',
                                'type'  => 'url',
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
                    'value'    => 'page-templates/template-events.php',
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
