<!-- WP Loop -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post clearfix">
<div class="post_left">
<div class="date">
<?php the_time('F'); ?>
<p class="date-month"><?php the_time('j'); ?></p>
</div>
<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<p class="post_info">                                    
<img src="<?php bloginfo('url'); ?>/wp-content/themes/prime/img/comments.png" class="post_icon_1" alt="Comments" /><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
<img src="<?php bloginfo('url'); ?>/wp-content/themes/prime/img/lightbulb.png" class="post_icon" alt="Category" /><?php the_category(', '); ?>
</p>
<?php the_excerpt(); ?>
<p class="post_info">
<?php the_tags('Tags: ', ', ', ''); ?>
</p>
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
