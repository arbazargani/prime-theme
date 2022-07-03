<?php
helper_redirect_logged_in_user(get_home_url(null, true));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_login'];
    $password = $_POST['pwd'];
    $email = $_POST['user_email'];

    $WP_array = array(
        'user_login' => $username,
        'user_email' => $email,
        'user_pass' => $password,
        'role' => 'customer',
        'meta_input' => [
            'user_email_verification_code' => str_shuffle(substr('abcdefghijklmnopqrstuvwxyz', 0, 7) . time()),
            'user_email_verified' => false,
        ]
    );

    $user = wp_insert_user($WP_array);

    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        $user = get_user_by('id', $user);
        $message = 'ثبت نام با موفقیت صورت گرفت.';
        $after = "ثبت نام شما با نام کاربری $email با موفقیت انجام شد.";
        $mail_stat = wp_mail($email, __translate_array('fa', 'register', '', '', true), __translate_array('fa', 'you registered successfully.', '', $after, true));
    }
}
get_header(); ?>
<main>
    <div id="main-wrapper" class="wrapper">
        <div class="login-wrapper">
            <div class="login-right">
                <div class="login-right-img">
                    <img src="<?php echo get_template_directory_uri() . "/template-parts/assets/img/login-banner.jpg"; ?>"
                    >
                </div>
            </div>
            <div class="login-left">
                <?php if (isset($error) && !is_null($error) && !empty($error)): ?>
                    <div class="alert-cont">
                        <div class="alert-wrap">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                <?php if (isset($message) && !is_null($message) && !empty($message)): ?>
                    <div style="width: 90%; background: #38dbae; padding: 2%; margin: auto 10%; text-align: right; direction: rtl; border-radius: 0px 5px 5px 0px; color: white">
                        <ul>
                            <li style="margin-bottom: 5px"><?php echo $message; ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="login">
                    <h2>
                        ثبت نام در سایت
                    </h2>
                    <div class="login-form">
                        <form name="registerform" id="registerform" method="post"
                              novalidate="novalidate">
                            <input type="text" name="user_login" id="user_login" class="login-username" value=""
                                   size="20" autocapitalize="off" placeholder="نام کاربری">
                            <input type="email" name="user_email" id="user_email" class="login-username" value=""
                                   size="25" placeholder="ایمیل"/>
                            <input type="password" name="pwd" id="user_pass" aria-describedby="login_error"
                                   class="login-password" placeholder="رمز عبور" size="20" value="">
                            <div>
                                <p style="font-size: 13px; margin: 20px 0px"
                                   id="reg_passmail"><span style="color: red">*</span>&nbsp; تاییدیه نام&zwnj;نویسی به
                                    شما ایمیل خواهد شد.</p>
                                <input id="rules" name="rules" type="checkbox" required>
                                <label for="rules">
                                    <a href="#">
                                        قوانین و مقررات
                                    </a>
                                    را خوانده و قبول دارم.
                                </label>
                            </div>
                            <input type="submit"
                                   name="wp-submit" id="wp-submit"
                                   style="border-radius: 10px; padding: 7px; font-size: 24px; background: var(--main-color-gold); width: 100%; color: white; border: none"
                                   class="login-btn-form" value="نام نویسی">
                            <input type="hidden" name="redirect_to" value="<?php echo get_home_url(null, true); ?>"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
