<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <h1><?php the_title(); ?> single.js</h1>
<?php endwhile; ?>

<?php get_footer(); ?>