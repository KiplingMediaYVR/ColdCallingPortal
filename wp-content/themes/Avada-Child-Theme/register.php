<?php
/**
* Created by PhpStorm.
* User: chiragpatel
* Date: 11/10/17
* Time: 2:20 PM
*/
?>
<?php
//Check whether the user is already logged in
if ($user_ID) {
//wp_redirect(home_url());
} else {
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Check username is present and not already in use
$username = $wpdb->escape($_REQUEST['username']);
if (empty($username)) {
$errors['username'] = "Please enter a username";
}
// Check email address is present and valid
$email = $wpdb->escape($_REQUEST['email']);
if (!is_email($email)) {
$errors['email'] = "Please enter a valid email";
} elseif (email_exists($email)) {
$errors['email'] = "This email address is already in use, Please login with your credentials!!!";
}
if (0 === preg_match("/.{6,}/", $_POST['password'])) {
$errors['password'] = "Password must be at least six characters";
}
// Check password confirmation_matches
if (0 !== strcmp($_POST['password'], $_POST['password_confirmation'])) {
$errors['password_confirmation'] = "Passwords do not match";
}
if (0 === count($errors)) {
$password = $_POST['password'];
$new_user_id = wp_create_user($username, $password, $email);
$subject = "Welcome to cold calling works";
$to = $email;
$logoUrl = get_bloginfo('stylesheet_directory') . '/images/logo.png';
$message = <<<EOT
    <table>
            <thead>
                    <tr>
                            <th><img src="$logoUrl" alt="coldcallingworks" /></th>
                    </tr>
            </thead>
            <tbody>
                    <tr>
                            <td>
                                <p>Welcome to ColdCallingWorks.</p>
                                    <br />
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    <br />
                            </td>
                    </tr>
            </tbody>
    </table>
EOT;
$headers = array('Content-Type: text/html; charset=UTF-8');
wp_mail($to, $subject, $message, $headers);
}
?>
<div id="page">
    <section>
        <div class="container">
            <h2 class="title">Registration Information</h2>
            <form method="post">
                <div class="dtc-col-wrap row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-form">
                                    <li>
                                        <label>User Name</label>
                                        <input type="text" name="username" />
                                        <span style="color: red" ;><?php echo $errors['username']; ?></span>
                                    </li>
                                    <li>
                                        <label>Password</label>
                                        <input type="text" name="password"/>
                                        <span style="color: red" ;><?php echo $errors['password']; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-form">
                                    <li>
                                        <label>Email Address</label>
                                        <input type="text" name="email" />
                                        <span style="color: red" ;><?php echo $errors['email']; ?></span>
                                    </li>
                                    <li>
                                        <label>Confirm Password</label>
                                        <input type="text" name="password_confirmation"/>
                                        <span style="color: red" ;><?php echo $errors['password_confirmation']; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <div class="button-set">
                                    <div class="btn-gap">
                                        <a href="plan.html"><button type="button" class="cust-btn" type="reset">Sign Up</button></a>
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
</div>
<!-- <main>
    <div class="container">
        <div class="form-layout mx-auto mt-5">
            <h2 class="text-center">Registration</h2>
            <form id="wp_signup_form" class="mt-4" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <span style="color: red;">*</span>
                            <input type="text" class="input-box form-control" name="firstname" id="firstname"
                            placeholder="First Name" required>
                            <span style="color: red" ;><?php echo $errors['firstname']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <span style="color: red;">*</span>
                            <input type="text" class="input-box form-control" name="lastname" id="lastname"
                            placeholder="Last Name" required>
                            <span style="color: red" ;><?php echo $errors['lastname']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label">Email Address</label>
                    <span style="color: red;">*</span>
                    <input type="email" class="input-box form-control" placeholder="Email Address" name="email"
                    id="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                    <span style="color: red" ;><?php echo $errors['email']; ?></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <span style="color: red;">*</span>
                            <input type="password" class="input-box form-control" name="password" id="password"
                            placeholder="Password" required>
                            <span style="color: red" ;><?php echo $errors['password']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <span style="color: red;">*</span>
                            <input type="password" class="input-box form-control" name="password_confirmation"
                            id="password_confirmation" placeholder="Confirm Password" required>
                            <span style="color: red" ;><?php echo $errors['password_confirmation']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="input-box form-control" placeholder="Company Name">
                </div>
                <button id="submit" type="submit" name="submit" value="Submit"
                class="btn btn-success px-4 font-weight-bold">Sign Up
                </button>
            </form>
        </div>
    </div>
</main> -->