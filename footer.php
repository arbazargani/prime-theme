<footer>
    <div id="footer-wrapper" class="wrapper">
        <div class="footer-logo-wrap footer-col">
            <div class="footer-logo">
                <img alt="لوگو انتشارات میراث اهل قلم" style="filter: invert(1)" src="<?php echo get_stylesheet_directory_uri().'/template-parts/assets/img/logo-miraspub.png'; ?>" />
            </div>
            <p>
                انتشارات میراث اهل قلم
            </p>
        </div>
        <div class="footer-about-wrap footer-col">
            <div class="footer-about-us">
                <h4>درباره ما</h4>
                <p>انتشارات میراث اهل قلم در سال 1380 تاسیس و تاکنون بیش از 150 عنوان کتاب در حوزه‌های عمومی منتشر کرده است.</p>
            </div>
        </div>
        <div class="footer-contact-wrap footer-col">
            <div class="footer-contact-us">
                <div>
                    <h4>تماس با ما</h4>
                    <p>
                        تلفن:  ۰۹۳۷۰۷۷۰۳۰۳ |   ۳۳۳۵۵۵۷۷ - ۰۲۱
                        <br>
                        صندوق پستی: ۳۳۸ -۱۷۱۸۵
                    </p>
                </div>
                <div>
                    <h4>آدرس</h4>
                    <p>
	                    خیابان 17 شهریور، نرسیده به میدان شهدا، بن بست صادقی، پ 15
                    </p>
                </div> 
            </div>
        </div>
    </div>
    <div class="footer-bottom">
       <div class="footer-bottom-wrapper wrapper">
           <img alt="آیکون کپی رایت" src="<?php echo get_stylesheet_directory_uri().'/template-parts/assets/img/Copyright-icon.svg';?>" />
            <p>۱۴۰۱ تمامی حقوق برای انتشارات میراث اهل قلم محفوظ می باشد.</p>
       </div>
    </div>
</footer>
<?php //echo get_current_template(true); ?>
<?php if(isset($_GET['add-to-cart']) && !is_null($_GET['add-to-cart'])): ?>
    <?php
    $product = wc_get_product( $_GET['add-to-cart'] );
    ?>
    <script>
        Swal.fire({
            title: '<?php echo __translate_array('fa', 'added to cart.', $product->name . " ");?>',
            icon: 'success',
            confirmButtonText: '<?php __translate_array('fa', 'close'); ?>',
            showCloseButton: true
        })
    </script>
<?php endif; ?>
<script>
    let e2p = s => s.toString().replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹'[d]);
    let e2a = s => s.toString().replace(/\d/g, d => '٠١٢٣٤٥٦٧٨٩'[d]);

    let p2e = s => s.toString().replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));
    let a2e = s => s.toString().replace(/[٠-٩]/g, d => '٠١٢٣٤٥٦٧٨٩'.indexOf(d));

    let p2a = s => s.toString().replace(/[۰-۹]/g, d => '٠١٢٣٤٥٦٧٨٩'['۰۱۲۳۴۵۶۷۸۹'.indexOf(d)]);
    let a2p = s => s.toString().replace(/[٠-٩]/g, d => '۰۱۲۳۴۵۶۷۸۹'['٠١٢٣٤٥٦٧٨٩'.indexOf(d)]);

    function ajax_add_product_to_cart(pid) {
        var id = pid;
        var url = window.location + '?post_type=product&add-to-cart=' + id;
        fetch( url )
            .then(response => response.text())
            .then(text => {
                document.getElementById("main-wrapper").style.filter = "blur(1px)";
                document.getElementById('doc').innerHTML = '';
                document.write(text);
            })
            .catch(e=>console.error('failed to add to cart. - ' + e));
    }
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(). '/template-parts/assets/js/main.js'; ?>"></script>
</body>
</html>