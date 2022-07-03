<?php
    get_header();
    $offset = 3;
    if (isset($_GET['s']) && !is_null($_GET['s']) && strlen($_GET['s']) > 1) {
        $args = [
            's' => $_GET['s'],
        ];
        $s = $_GET['s'];
        $the_query = new WP_Query( $args );
        $products = $the_query->posts;
        
        foreach($products as $product) {
            $sku = wc_get_product($product->ID)->get_sku();
            $index = (empty($sku)) ? $product->ID : $sku;
            $tmp [$index] = $product;
        }
        krsort($tmp);
        $products = $tmp;
    
        $products  = array_chunk($products, $offset);
        $max_page = count($products);
        $page = (isset($_GET['page']) && !is_null($_GET['page']) && strlen($_GET['page']) != 0) ? $_GET['page'] : 1;
        $page = ($page > $max_page) ? $max_page : $page;
        $page = ($page < 1) ? 1 : $page;
        $url = trim(str_replace('index.php', '', $_SERVER['PHP_SELF']))."?s=$s";
        $next_page_url = ($page+1 <= $max_page) ? "$url&page=".($page+1) : "#";
        $prev_page_url = ($page-1 > 0) ? "$url&page=".($page-1) : "#";

        // echo "<pre>";
        // print_r($products[0]);
        // die();

    } else {
        $products = null;
    }
    
?>
    <main>
        <div id="main-wrapper" class="wrapper">
            <div class="search-wrapper">
                <div class="search-field">
                    <a onclick="submitSearch()" class="search-icon">
                        <script>
                            function submitSearch() {
                                if (document.getElementById('s').value.length != 0) {
                                    document.getElementById('search-form').submit();   
                                }
                            }
                        </script>
                        <div>
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.25 30.5C24.1201 30.5 30.5 24.1201 30.5 16.25C30.5 8.37994 24.1201 2 16.25 2C8.37994 2 2 8.37994 2 16.25C2 24.1201 8.37994 30.5 16.25 30.5Z" stroke="#292D32" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M32 32L29 29" stroke="#292D32" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </a>
                    <form id="search-form">
                        <input type="text" id="s" name="s" placeholder="<?php echo __translate_array('fa', 'search query'); ?>">
                    </form>
                </div>
            </div>
            <?php if (isset($the_query)): ?>

            <div class="search-res-wrapper">
                <div class="search-res">
                    <p>
                        <?php echo __translate_array('fa', 'showing results for: '); ?>
                    </p>
                    <h4>
                        <?php echo $_GET['s']; ?>
                    </h4>
                </div>
            </div>
            <?php if ( $the_query->have_posts() ): ?>
                <div class="book-wrapper">
                    <?php foreach ($products[$page-1] as $index => $product): ?>
                        <?php $product = wc_get_product($product->ID); ?>
                            <div class="book-item">
                                <div class="book-id">
                                    <p>
                                        <?php echo $index; ?>
                                    </p>
                                </div>
                                <div class="book-img">
                                <?php
                                    $post_attributes = [
                                            'alt' => get_the_title(),
                                            'class' => 'book-cover',
                                            'size' => 'woocommerce_single'
                                    ];
                                ?>
                                <a href="<?php echo $product->get_permalink(); ?>">
                                    <?php //echo the_post_thumbnail(null, $post_attributes); ?>
                                    <?php echo $product->get_image(null, $post_attributes); ?>
                                </a>
                                </div>
                                <div class="book-info">
                                    <?php
                                        $author = helper_get_product_taxonomies($product, 'authors');
                                        $translator = helper_get_product_taxonomies($product, 'translators');
                                    ?>
                                    <div class="book-title">
                                        <a href="<?php echo $product->get_permalink(); ?>">
                                            <h2>
                                                <?php echo $product->get_title(); ?>
                                            </h2>
                                        </a>
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
                            <a href="<?php echo "$url&page=".($page-1); ?>">
                                <?php echo str_en_to_fa($page-1); ?>
                            </a>
                            <?php endif; ?>
                            <a href="#" class="active">
                                <?php echo str_en_to_fa($page); ?>
                            </a>
                            <?php if($page+1 <= $max_page): ?>
                            <a href="<?php echo "$url&page=".($page+1); ?>">
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
                </div>
            <?php else: ?>
            <div class="woocommerce-info"
            style="
            padding: 1%;
            text-align: right;
            background: #dbc086;
            color: white;
            font-weight: bolder;
            direction: rtl;
            margin: 1%;
            width: auto;
            border-radius: 5px;
            border-right: 15px solid #fbc531;
            text-shadow: 0 0 14px #00000038;
            "
            >
            <p>متاسفیم. محصولی برای جستجوی شما پیدا نشد.</p>
            </div>
            <?php endif; ?>
            
            <?php endif; ?>
        </div>
    </main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>