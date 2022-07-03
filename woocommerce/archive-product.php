<?php
	get_header();
    $offset = 10;
	$query = new WC_Product_Query( array(
        'post_type' => 'product',
		'orderby' => 'id',
		'order' => 'DESC',
		'status' => 'publish',
	) );
	$products = $query->get_products();


    foreach($products as $product) {
        $index = (empty($product->get_sku())) ? $product->get_id() : $product->get_sku();
        $tmp [$index] = $product;
    }
    krsort($tmp);
    $products = $tmp;

    $products  = array_chunk($products, $offset);
    $max_page = count($products);
    $page = (isset($_GET['page']) && !is_null($_GET['page']) && strlen($_GET['page']) != 0) ? $_GET['page'] : 1;
    $page = ($page > $max_page) ? $max_page : $page;
    $page = ($page < 1) ? 1 : $page;
    $url = trim(str_replace('index.php', '', $_SERVER['PHP_SELF']));
    $next_page_url = ($page+1 <= $max_page) ? "$url?page=".($page+1) : "#";
    $prev_page_url = ($page-1 > 0) ? "$url?page=".($page-1) : "#";
?>
<main>
	<div id="main-wrapper" class="wrapper">
		<div class="book-wrapper">
            <?php
                $has_products = false;
                if (isset($products->products)) {
                    $has_products = true;
                    $products = $products->products;
                } elseif (count($products)) {
                    $has_products = true;
                } else {
                    $has_products = false;
                }
            ?>
			<?php if ( $has_products ): ?>
				<?php foreach ($products[$page-1] as $index => $product): ?>
                <?php //if (($index >= $page) && ($index <= $page*$offset)): ?>
				<div class="book-item" style="margin-bottom: 2%">
                    <div class="book-id">
                        <p>
                            <?php echo (empty($product->get_sku())) ? str_en_to_fa($product->get_id()) : str_en_to_fa($product->get_sku()); ?>
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
                            <a href="<?php echo $product->add_to_cart_url(); ?>">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                            </a>
                        <?php else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-cart.svg'; ?>" alt="خرید"/>
                        <?php endif; ?>
                    </div>
                </div>
				<?php //endif; ?>
				<?php endforeach; ?>
                
                <!-- pagination -->
                <div class="pagination-wrapper">
                    <div class="pagination">
                        <div class="pagination-left-arrow" title="قبلی">
                            <a href="<?php echo $prev_page_url; ?>" title="قبلی">
                                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>     
                            </a>     
                        </div>
                        <div class="pagination-numbers transition-300">
                            <?php if($page-1 > 0): ?>
                            <a href="<?php echo "$url?page=".($page-1); ?>">
                                <?php echo str_en_to_fa($page-1); ?>
                            </a>
                            <?php endif; ?>
                            <a href="#" class="active">
                                <?php echo str_en_to_fa($page); ?>
                            </a>
                            <?php if($page+1 <= $max_page): ?>
                            <a href="<?php echo "$url?page=".($page+1); ?>">
                                <?php echo str_en_to_fa($page+1); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="pagination-right-arrow">
                            <a href="<?php echo $next_page_url; ?>" title="بعدی">
                                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.00015 1.07992L7.52016 7.59992C8.29016 8.36992 8.29016 9.62992 7.52016 10.3999L1.00016 16.9199" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end pagination -->

			<?php else: ?>
				<p><?php __translate_array('fa', 'no products found.') ?></p>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>