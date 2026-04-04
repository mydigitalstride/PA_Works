<?php
/**
 * Template Name: Page Builder
 * Template Post Type: page
 *
 * Universal template. Assign this to any page to get access to every
 * available section layout via the Page Builder field group.
 *
 * @package PAWorks
 */

get_header();

if ( have_rows( 'page_sections' ) ) :
    while ( have_rows( 'page_sections' ) ) : the_row();
        $layout = get_row_layout();
        paworks_get_section( $layout, 'shared' );
    endwhile;
endif;

get_footer();
