<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
<?php the_time('F jS, Y') ?>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>