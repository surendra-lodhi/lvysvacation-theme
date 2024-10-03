<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage LVYSVACATIONRENTALS
 * @since Lvys Vacation Rentals 1.0
 */

get_header(); 
if (have_rows('flexible_content')):
    while (have_rows('flexible_content')) : the_row();
        include locate_template('flexible-content/' . str_replace('_', '-', get_row_layout()) . '.php');
    endwhile;
endif; 
get_footer(); ?>