<?php
/**
 * Template Name: Login
 */
get_header();

if ($_POST) {
    global $wpdb;

    //We shall SQL escape all inputs
    $useremail = $wpdb->escape($_REQUEST['useremail']);
    $password = $wpdb->escape($_REQUEST['password']);

    $login_data = array();
    $login_data['user_login'] = $useremail;
    $login_data['user_password'] = $password;


    //pp_redirect_by_role($login_data);

    $user_verify = wp_signon($login_data, false);
    if (!is_wp_error($user_verify)) {
        wp_redirect(home_url('/coaching'));
        exit;
    } else {
        $error = "Invalid email address or password !!!";
        wp_logout();

    }
}
?>
    <div id="page">
    <section>
        <div class="container">
            <h2 class="title">Login :</h2>
            <form method="post">
                <div class="dtc-col-wrap row">
                    <div class="col-sm-8 col-md-offset-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-form">
                                    <span style="color: red;"><?php echo $error; ?></span>
                                    <li>
                                        <label>Email Address</label>
                                        <input type="email" name="useremail"/>
                                    </li>
                                    <li>
                                        <label>Password</label>
                                        <input type="Password" name="password"/>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-3 col-xs-6 m-t-20 register-login">
                                <a href="<?php echo site_url('/register');  ?>">Sign Up</a>
                            </div>
                            <div class="col-md-3 col-xs-6 m-t-20 taright forgot-login">
                                <a href="#" style="text-align:right;">Forgot Password?</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6" style="text-align: center;">
                                <div class="button-set">
                                    <div class="btn-gap">
                                        <button class="cust-btn" id="submit" type="submit" name="submit">Login</button>
                                    </div>
                                    <div class="btn-gap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php get_footer(); ?>