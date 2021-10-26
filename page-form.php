<?php
/*
  * Template Name: Reservation Form
  */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
<!--    --><?php //get_template_part('templates/reservation', 'form'); ?>
<?php endwhile; ?>

<?php get_footer(); ?>