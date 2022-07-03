<?php get_header(); ?>
    <main>
        <div id="main-wrapper" class="wrapper">
            <div class="page-wrapper">
                <div class="about-us-logo">
                    <img src="<?php echo get_template_directory_uri() . "/template-parts/assets/img/Logo-Header.svg" ?>" alt="انتشارات میراث اهل قلم"/>
                </div>
                <div class="about-us-title">
                    <h1>
                        انتشارات میراث اهل قلم
                    </h1>
                </div>
                <div class="about-us-text">
                    <p><?php echo the_content(); ?></p>
                </div>
            </div>
        </div>
    </main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>