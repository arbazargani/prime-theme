<?php
	get_header();
    $product = wc_get_product();
    $author = helper_get_product_taxonomies($product, 'authors');
    $translator = helper_get_product_taxonomies($product, 'translators');
    $pages_count = helper_get_product_terms($product, 'تعداد-صفحات', 'name');
    $print_serie = helper_get_product_terms($product, 'چاپ', 'name');
    $print_year = helper_get_product_terms($product, 'سال-چاپ', 'name');
    $tags = wp_get_post_terms( get_the_id(), 'product_tag' );
?>
<main>
	<div id="main-wrapper" class="wrapper">
        <div class="single-book-wrapper">
            <div class="book-id">
                <p>
                    <?php echo (empty($product->get_sku())) ? str_en_to_fa($product->get_id()) : str_en_to_fa($product->get_sku()); ?>
                </p>
            </div>
            <div class="single-book-cover">
                <?php echo $product->get_image('woocommerce_single', ['alt' => get_the_title(), 'style' => 'height: unset !important;']); ?>
            </div>
            <div class="single-book-info">
                <div class="single-book-title-and-shop">
                    <div class="single-book-title">
                        <h4>
                            <?php echo the_title(); ?>
                        </h4>
                        <p>
                            <a href="<?php echo $author['link']; ?>" target="_blank"><?php echo $author['name']; ?></a>
                        </p>
                    </div>
                    <div class="shop-btn" <?php if (!helper_is_product_purchasable($product)): ?> style="background-color: #b1b1b1 !important;" <?php endif; ?>>
                        <?php if (helper_is_product_purchasable($product)) : ?>
                        <a <?php //echo $product->add_to_cart_url(); ?> onclick="ajax_add_product_to_cart(<?php echo get_the_id(); ?>)">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                        </a>
                        <?php else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(!is_wp_error($translator['link'])): ?>
                <div class="single-book-meta book-translator">
                    <p>
                        مترجم: <a href="<?php echo $translator['link'];?>" target="_blank"><?php echo $translator['name']; ?></a>
                    </p>
                </div>
                <?php endif; ?>
                <div class="single-book-meta book-pages">
                    <p>
                        <?php echo str_en_to_fa($pages_count) . " صفحه"; ?>
                    </p>
                </div>
                <div class="single-book-meta book-print">
                    <p>
                        <?php echo "چاپ " . str_en_to_fa($print_serie) . " | " . str_en_to_fa($print_year) ?>
                    </p>
                </div>
                <?php if(helper_is_product_purchasable($product)): ?>
                <div class="single-book-meta book-price <?php if($product->is_on_sale()): ?> sale-active <?php endif; ?>">
                    <?php if($product->is_on_sale()): ?>
                    <p>
                        <?php echo str_en_to_fa(number_format($product->get_regular_price())); ?> <span>تومان</span>
                    </p>
                    <?php endif; ?>
                    <p class="book-sale">
                        <?php echo str_en_to_fa(number_format($product->get_price())); ?> <span>تومان</span>
                    </p>
                </div>
                <?php else: ?>
                <div class="single-book-meta book-price">
                    <p style="color: #CB4444; font-size: 90%">
                        <?php __translate_array('fa', 'product out of stock.'); ?>
                    </p>
                </div>
                <?php endif; ?>
                <div class="single-book-tag">
                    <div class="single-book-tag-title">
                        <p>
                            <?php __translate_array('fa', 'tags', null, ': '); ?>
                        </p>
                    </div>
                    <?php if( count($tags) > 0 ): ?>
                        <div class="single-book-tag-box">
                        <?php foreach($tags as $tag):
                            $tag_id = $tag->tag_id; // Product tag Id
                            $tag_name = $tag->name; // Product tag Name
                            $tag_slug = $tag->slug; // Product tag slug
                            $tag_link = get_term_link( $tag, 'product_tag' ); // Product tag link
                        ?>
                        <a href="<?php echo $tag_link; ?>" target="_blank">
                            <span class="tag-item">
                                <?php echo $tag_name; ?>
                            </span>
                        </a>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(strlen($product->description) > 0): ?>
            <div class="single-book-des-wrapper">
                <div class="single-book-des">
                    <h2>
                        <?php
                            echo __translate_array('fa', 'book introduction', null, ' ') . ": " .  the_title()
                        ?>
                    </h2>
                    <p>
                        <?php
                            echo $product->description;
                        ?>
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>