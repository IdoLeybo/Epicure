<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <h1 class="text-center text-primary">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>

<?php endwhile; ?>

<?php get_footer(); ?>
