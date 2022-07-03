<?php
/**
 * The author's single page
 * */
get_header();
?>
    <main>
        <div id="main-wrapper" class="wrapper">
            <div class="author-wrapper">
                <div class="author-img">
                    <?php
                    // $tax_cover = get_taxonomy_image( get_the_id() );
                    $tax_cover = get_taxonomy_image(get_queried_object()->term_id);

                    if ($tax_cover == 'Please Upload Image First!') {
                        $tax_cover = null;
                    }

                    if (!empty($tax_cover) && !is_null($tax_cover)):
                        ?>
                        <img class="border-rounded" style="border-radius: 25px" src="<?php echo esc_url($tax_cover); ?>"
                             alt="<?php echo the_title(); ?>"/>
                    <?php else: ?>
                        <img class="border-rounded" src="https://via.placeholder.com/246"/>
                    <?php endif; ?>
                </div>
                <div class="author-info">
                    <div class="author-name">
                        <p>
                            <?php woocommerce_page_title(); ?>
                        </p>
                    </div>
                    <div class="author-desc">
                        <p>
                            <?php echo term_description(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="author-bibliography-wrapper">
                <div class="author-bibliography-title">
                    <h4>
                        لیست آثار
                    </h4>
                </div>
                <div class="author-bibliography-items">
                    <?php if (have_posts()) : while (have_posts()) :the_post(); ?>
                        <div class="author-bibliography-item">
                            <div class="author-book-title">
                                <a href="<?php the_permalink(); ?>">
                                    <h5>
                                        <?php echo the_title(); ?>
                                    </h5>
                                </a>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="shop-btn">

                                    <img src="<?php echo get_stylesheet_directory_uri() . "/template-parts/assets/img/shopping-cart.svg" ?>"
                                         alt="آیکون خرید"/>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>