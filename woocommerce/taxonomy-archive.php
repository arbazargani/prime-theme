<?php
$terms = get_terms([
    'taxonomy' => 'authors',
    'hide_empty' => false,
]);
//echo "<pre>";
//var_dump($terms[0]);
//die();
get_header();
?>
<main>
    <div id="main-wrapper" class="wrapper">
        <?php if (count($terms)) : foreach ($terms as $term): ?>
            <div class="author-wrapper">
                <div class="author-img">
                    <?php
                    $tax_cover = get_taxonomy_image($term->term_id);
                    die($tax_cover);

                    if ($tax_cover == 'Please Upload Image First!') {
                        $tax_cover = null;
                    }
                    if (!empty($tax_cover) && !is_null($tax_cover)):
                    ?>
                        <img class="border-rounded" src="<?php echo esc_url($tax_cover); ?>"
                             alt="<?php echo the_title(); ?>"/>
                    <?php else: ?>
                        <img class="border-rounded" src="https://via.placeholder.com/246"/>
                    <?php endif; ?>
                </div>
                <div class="author-info">
                    <div class="author-name">
                        <p>
                            <a href="<?php echo get_term_link($term); ?>">
                                <?php echo $term->name; ?>
                            </a>
                        </p>
                    </div>
                    <div class="author-desc">
                        <p>
                            <?php echo $term->description; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; else: ?>
            <p>نویسنده‌ای ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</main>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
