<?php
/**
 * Template Name: About Us
 * Template Post Type: page
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'about_sections' ) ) :
    while ( have_rows( 'about_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'about' );
    endwhile;
endif;

get_footer();
