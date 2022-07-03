<?php
helper_redirect_logged_in_user(get_home_url(null, true));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_status = wp_signon();
    if (is_wp_error($login_status)) {
        $error = $login_status->get_error_message();
    } else {
        header('Refresh: 0');
    }
}
get_header(); ?>
<main>
    <div id="main-wrapper" class="wrapper">
        <div class="login-wrapper">
            <div class="login-right">
                <div class="login-right-img">
                    <img src="<?php echo get_template_directory_uri() . "/template-parts/assets/img/login-side.jpg"; ?>"
                         >
                </div>
            </div>
            <div class="login-left">
                <?php if (isset($error) && !is_null($error) && !empty($error)): ?>
                    <div class="alert-cont" style="width: 80%">
                        <div class="alert-wrap" style="padding: 3% 10%; border-radius: 6px;">
                            <svg width="50" height="50" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.9998 23.8337C18.9582 23.8337 23.8332 18.9587 23.8332 13.0003C23.8332 7.04199 18.9582 2.16699 12.9998 2.16699C7.0415 2.16699 2.1665 7.04199 2.1665 13.0003C2.1665 18.9587 7.0415 23.8337 12.9998 23.8337Z" stroke="white" stroke-width="1.625" stroke-linecap="round" stroke-linejoin="round"/>
                                <g opacity="0.4">
                                    <path d="M9.93408 16.0662L16.0657 9.93457" stroke="white" stroke-width="1.625" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0657 16.0662L9.93408 9.93457" stroke="white" stroke-width="1.625" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                            <p>
                                <?php echo $error; ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="login">
                    <h2>
                        ورود به سایت
                    </h2>
                    <div class="login-form">
                        <form name="loginform" id="loginform" method="post">
                        <!-- <form name="loginform" id="loginform" method="post"> -->
                            <input type="text" name="log" id="user_login" aria-describedby="login_error" class="login-username" value="" autocapitalize="off" size="20" placeholder="نام کاربری">
                            <input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="login-password" placeholder="رمز عبور" size="20" value="">
                            <div>
                                <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                                <label for="remembermer">
                                    مرا به خاطر بسپار.
                                </label>
                            </div>
                            <input type="submit"
                                   name="wp-submit" id="wp-submit"
                                   style="border-radius: 10px; padding: 7px; font-size: 24px; background: var(--main-color-gold); width: 100%; color: white; border: none"
                                   class="login-btn-form" value="ورود">
                            <input type="hidden" name="redirect_to" value="<?php echo get_home_url(null, true); ?>" />
                            <input type="hidden" name="testcookie" value="1" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
