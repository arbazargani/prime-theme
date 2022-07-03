<?php get_header(); ?>
    <main>
        <div id="main-wrapper" class="wrapper">
            <div class="book-wrapper">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="book-item" style="margin-bottom: 2%">
                    <div class="book-info">
                        <div class="book-title min-width-214px">
                            <p class="heading-32px">
                                <a class="heading-32px" href="<?php echo the_permalink(); ?>"><?php the_title(); echo "<br/>" . get_post_meta(get_the_id(), 'نویسنده', true); ?></a>
                            </p>
                        </div>
                        <div class="book-author min-width-214px">
                            <p class="heading-32px">
                                <?php  echo get_post_meta(get_the_id(), 'مترجم', true); ?>
                            </p>
                        </div>
                        <div class="shop-btn">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>"
                                 alt="خرید"/>
                        </div>
                    </div>
                    <div class="book-img text-align-center size-350-430">
                        <?php
                            $post_attributes = [
                                    'alt' => get_the_title(),
                                    'class' => 'book-cover',
                                    'size' => 'woocommerce_single'
                            ];
                        ?>
                        <?php echo the_post_thumbnail(null, $post_attributes); ?>
                    </div>
                    <div class="book-id">
                        <p>
                            <!-- ۱۲۰ -->
                            <?php /*the_time('F jS, Y')*/ echo get_the_id(); ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            </div>
        </div>
    </main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>