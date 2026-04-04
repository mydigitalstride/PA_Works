<?php
/**
 * Template Name: Advocacy
 * Template Post Type: page
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'advocacy_sections' ) ) :
    while ( have_rows( 'advocacy_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'advocacy' );
    endwhile;
endif;

get_footer();
