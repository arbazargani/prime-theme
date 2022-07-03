<?php
//die('here is tag archive');
$tag = get_queried_object();
//echo "<pre>";
//var_dump($tag);
//die();
get_header();
?>

<main>
    <div id="main-wrapper" class="wrapper">
        <div class="book-wrapper">
            <div class="contact-us-title" style="direction: rtl">
                <h1>
                    <?php echo __translate_array('fa', 'archive:', null, " " . $tag->name); ?>
                </h1>
            </div>
                <?php if (have_posts()) : while (have_posts()) :
                    the_post(); ?>
                    <div class="book-item" style="margin-bottom: 2%">
                        <div class="book-id">
                            <p>
                                <?php echo str_en_to_fa($product->get_id()); ?>
                            </p>
                        </div>
                        <div class="book-img text-align-center">
                            <a href="<?php echo $product->get_permalink(); ?>">
                                <?php echo $product->get_image('woocommerce_thumbnail'); ?>
                            </a>
                        </div>
                        <div class="book-info">
                            <div class="book-title">
                                <a href="<?php echo $product->get_permalink(); ?>"><h2><?php echo $product->get_name(); ?></h2></a>
                                <?php
                                $author = helper_get_product_taxonomies($product, 'authors');
                                $translator = helper_get_product_taxonomies($product, 'translators');
                                ?>
                                <!--                            <a href="--><?php //echo $author['link']; ?><!--">--><?php //echo $author['name']; ?><!--</a>-->
                            </div>
                            <div class="book-author">
                                <a href="<?php echo $author['link']; ?>">
                                    <h3>
                                        <?php echo $author['name']; ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <div class="shop-btn" <?php if (!helper_is_product_purchasable($product)): ?> style="background-color: #b1b1b1 !important;" <?php endif; ?>>
                            <?php if (helper_is_product_purchasable($product)) : ?>
                                <a href="<?php echo $product->add_to_cart_url(); ?>" target="_blank">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                                </a>
                            <?php else: ?>
                                <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
                endif; ?>
        </div>
    </div>
</main>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
