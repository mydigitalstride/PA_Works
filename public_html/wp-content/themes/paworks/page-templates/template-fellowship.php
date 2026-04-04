<?php
/**
 * Template Name: Fellowship
 * Template Post Type: page
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'fellowship_sections' ) ) :
    while ( have_rows( 'fellowship_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'fellowship' );
    endwhile;
endif;

get_footer();
