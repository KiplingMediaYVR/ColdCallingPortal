<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: Member Listing
*/
get_header();
?>
<div id="page">
    <div class="mobile-acc-header">
        <div class="mobacc-left">
            <div class="mobile-category">
                <a href="javascript:void(0)">Category</a>
            </div>
        </div>
    </div>
    <div class="account_main">
        <div class="sidebar-left">
            <div class="sidebar-box">
                <div class="refferals-btn">
                    <a href="">New Refferals <span class="count">2</span></a>
                </div>
                <div class="sidebar-search">
                    <form>
                        <input type="text" class="text-box" placeholder="Search"/>
                    </form>
                </div>
            </div>
            <div class="category-block">
                <ul class="category-list">
                    <li class="active category-parent">
                        <a href="javascript:void(0)">Ontario</a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <ul class="sub-category">
                            <li class="category-parent">
                                <a href="#">Greater Toronto Area</a>
                                <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <ul class="sub-category">
                                    <li><a href="#">Toronto</a></li>
                                    <li><a href="#">Search</a></li>
                                    <li><a href="#">Markham</a></li>
                                    <li><a href="#">Scarborough</a></li>
                                    <li><a href="#">Richmond Hill</a></li>
                                    <li><a href="#">New Market</a></li>
                                    <li><a href="#">North York</a></li>
                                    <li><a href="#">Etobicoke</a></li>
                                    <li><a href="#">Mississauga</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Ottawa</a></li>
                            <li><a href="#">Kingston</a></li>
                            <li><a href="#">London</a></li>
                            <li><a href="#">James Bay</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">British Columbia</a>
                    </li>
                    <li>
                        <a href="#">Alberta</a>
                    </li>
                </ul>
            </div>
            <div class="siderbar-buttons">
                <a href="#" class="cust-btn">REFFERALS</a>
            </div>

        </div>
        <div class="main-sidebar">
            <div class="pagination-wrap">
                <div class="pagination-block">
                    <ul class="pagination-list">
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-backward"></i></a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-step-backward"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>...</li>
                        <li>
                            <a href="#">10</a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-step-forward"></i></a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-forward"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="calling-wrap">
                    <ul class="call-list call-list-full">
                        <?php
                        $users = get_users( array( 'fields' => array( 'ID' ) ) );
                        foreach($users as $user_id) {
                        $user = get_user_meta ( $user_id->ID); ?>
<!--                        var_dump($user["first_name"]); die;-->
                        <li>
                            <div class="call-user-media">
                                <img src="images/user-change-pic.jpg" alt="" />
                            </div>
                            <div class="call-dtc">
                                <h2><?php echo $user["firstname"] . $user["last_name"] ?></h2>
                                <h3>Royal LePage-Comox Valley (Cv) <br/>Courtney | Coquitlum | Surrey | Burnaby</h3>
                                <ul class="calling-phone-list">
                                    <li><i aria-hidden="true" class="fa fa-phone"></i> (250) 334-3124</li>
                                    <li><i aria-hidden="true" class="fa fa-phone"></i> (250) 334-1901</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper</p>
                            </div>
                            <div class="colling-bottom-bar">
                                <div class="bottombar-left">#121 - 750 Comox Road,<br/>Courtenay, BC, V9N 3P6</div>
                                <div class="bottombar-right">
                                    <ul class="calling-user-social">
                                        <li>
                                            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-globe"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-envelope"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="pagination-wrap pagination-bottom">
                <div class="pagination-block">
                    <ul class="pagination-list">
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-backward"></i></a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-step-backward"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>...</li>
                        <li>
                            <a href="#">10</a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-step-forward"></i></a>
                        </li>
                        <li>
                            <a href="#"><i aria-hidden="true" class="fa fa-forward"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
