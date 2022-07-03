<?php
/*
Template Name: most-viewed
*/
?>

<?php get_header(); ?>
<div id="content">
<?php get_sidebar(); ?>
<div id="text">
<!-- WP Loop -->
<!-- custom WP query -->
<?php if (have_posts()) : ?>
<?php $mv_query = new WP_Query('v_sortby=views&v_orderby=desc&showposts=7'); ?>
<?php while($mv_query->have_posts()) : $mv_query->the_post(); ?>
<div class="post clearfix">
<div class="post_left">
<div class="date">
<?php the_time('F'); ?>
<p class="date-month"><?php the_time('j'); ?></p>
</div>
<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<p class="post_info">                                    
<img src="<?php bloginfo('url'); ?>/wp-content/themes/prime/img/lightbulb.png" class="post_icon_1" alt="Views" /><?php if(function_exists('the_views')) { the_views(); } ?>
</p>
<?php the_excerpt(); ?>
<p class="post_info">Published in <?php the_category(', '); ?></p>
</div>
<div class="post_right">
<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php post_image(); ?></a>
</div>
</div>
<?php endwhile; ?>
<?php posts_nav_link('','','&laquo; Previous Entries') ?> <?php posts_nav_link('','Next Entries &raquo;','') ?>
<?php else : ?>
<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
</div>
<div id="tag_cloud">
<?php wp_tag_cloud(''); ?>
</div>
</div>
<?php get_footer(); ?>
