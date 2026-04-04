<?php
/**
 * Template Name: Events
 * Template Post Type: page
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'events_sections' ) ) :
    while ( have_rows( 'events_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'events' );
    endwhile;
endif;

get_footer();
