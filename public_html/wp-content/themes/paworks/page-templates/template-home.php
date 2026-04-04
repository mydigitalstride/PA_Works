<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'home_sections' ) ) :
    while ( have_rows( 'home_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'home' );
    endwhile;
endif;

get_footer();
