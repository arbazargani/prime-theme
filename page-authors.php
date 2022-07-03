<?php
/**
 * The Main List of authors
 * */
$dataset = helper_get_tax_terms('authors');
get_header();
?>

    <main>
        <div id="main-wrapper" class="wrapper">
            <?php
            foreach ($dataset as $term):
                $term_id = $term->id;
                $link = get_term_link($term->slug, 'authors');
                $name = $term->name;

                $tax_cover = get_taxonomy_image($term->term_id);

                if ($tax_cover == 'Please Upload Image First!') {
                    $tax_cover = null;
                }
                ?>
                <div class="author-wrapper">
                    <div class="author-img">
                        <?php if (!empty($tax_cover) && !is_null($tax_cover)): ?>
                        <a href="<?php echo $link; ?>">
                            <img class="border-rounded" src="<?php echo esc_url($tax_cover); ?>"
                            alt="<?php echo the_title(); ?>"
                            style="border-radius: 25px"/>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo $link; ?>">
                            <img class="border-rounded" src="https://via.placeholder.com/246" style="border-radius: 25px" />
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="author-info">
                        <div class="author-name">
                            <a href="<?php echo $link; ?>">
                                <p>
                                    <?php echo $name; ?>
                                </p>
                            </a>
                        </div>
                        <div class="author-desc">
                            <p>
                                <?php echo $term->description; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

<?php get_footer(); ?>