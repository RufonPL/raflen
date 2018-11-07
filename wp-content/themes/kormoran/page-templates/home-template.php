<?php
/**
 * Template name: Strona Główna
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Rafał Puczel
 */

get_header(); ?>
	
<?php require_template_part('slider', 'home'); ?>    
    
<?php require_template_part('boxes', 'home'); ?>      
    
<?php get_footer(); ?>
