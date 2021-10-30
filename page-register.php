<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <p class="text-center"><?php the_content(); ?></p>
<?php endwhile; ?>

<?php get_footer(); ?>