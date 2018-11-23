<?php 
/**
 * Template Name: Home Page
 * @package Tastybite
*/

get_header();
get_template_part( 'template-parts/front-page-intro' );
get_template_part( 'template-parts/front-page-aboutus');
get_template_part( 'template-parts/front-page-thecontent');
get_template_part( 'template-parts/front-page-services' );
get_template_part( 'template-parts/front-page-blogpost' );
get_footer(); 
?>