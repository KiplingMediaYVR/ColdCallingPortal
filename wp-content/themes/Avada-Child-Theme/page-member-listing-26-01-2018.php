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
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
} 
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
        <?php include("sidebar2.php"); ?>
        <div class="main-sidebar">
            <div class="main-content">
                <div class="calling-wrap">
                    <ul class="call-list call-list-full">
                        <?php
                        // Pagination vars
                        $current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
                        $users_per_page = 4; // RAISE THIS AFTER TESTING ;)
                        $args = array(
                            'number' => $users_per_page, // How many per page
                            'order' => 'ASC',
                            'paged' => $current_page, // What page to get, starting from 1.
                            'exclude' => get_current_user_id()

                        );
                        $wp_user_query = new WP_User_Query( $args );
                        //print_r($wp_user_query);
                        $total_users = $wp_user_query->get_total(); // How many users we have in total (beyond the current page)
                        $num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need

                        // Get the results
                        $users = $wp_user_query->get_results();
                        
                        // Looping managers
                        if (!empty($users)) {
                            foreach ($users as $user)
                            {
                                // get all the user's data
							if(get_current_user_id()!=$user->ID):
                                $user_info = get_userdata($user->ID);
                                $get_author_gravatar = get_avatar_url($user_info->user_email);
                            ?>
                        <li>
                            <div class="call-user-media">
                                <?php echo '<img src="'.$get_author_gravatar.'" alt="" />'; ?>
                            </div>
                            <div class="call-dtc">
                                <h2><a href="<?php echo site_url(); ?>/member-details?user_id=<?php echo $user_info->ID; ?>"> <?php echo $user_info->first_name.' '. $user_info->last_name ;?></a></h2>
                                <h3><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></h3>
                                <ul class="calling-phone-list">
                                 	<li><a href="tel:<?php echo $user_info->billing_phone; ?>"><i aria-hidden="true" class="fa fa-phone"></i> <?php echo $user_info->billing_phone; ?></a></li>
								</ul>
                                <p><?php echo $user_info->description; ?></p>
                            </div>
                            <div class="colling-bottom-bar">
                                <div class="bottombar-left"><?php echo $user_info->billing_address_1.' '. $user_info->billing_address_2 ?>,<br/><?php echo $user_info->billing_city; ?>, <?php echo $user_info->billing_state; ?>, <?php echo $user_info->billing_postcode; ?></div>
                                <div class="bottombar-right">
                                    <ul class="calling-user-social">
                                        <li>
                                            <a href="#" target="_blank"><i aria-hidden="true" class="fa fa-globe"></i></a>
                                        </li>
                                        <li>
                                            <a href="mailto:<?php echo $user_info->author_email; ?>" target="_blank"><i aria-hidden="true" class="fa fa-envelope"></i></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $user_info->author_facebook; ?>" target="_blank"><i aria-hidden="true" class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $user_info->author_linkedin; ?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php endif; }} ?>
                    </ul>
                </div>
            </div>
            <div class="pagination-wrap pagination-bottom">
                <div class="pagination-block">
                    <ul class="pagination-list">
                        <li>
                            <?php echo '<a href="'. add_query_arg(array('paged' => 1)) .'"><i aria-hidden="true" class="fa fa-backward"></i></a>';?>
                        </li>
                        <li>
                         <?php if($current_page==1){?>
                            <?php echo '<a href="'. add_query_arg(array('paged' => $current_page)) .'"><i aria-hidden="true" class="fa fa-step-backward"></i></a>';?>
                         <?php }else{ ?>
                            <?php echo '<a href="'. add_query_arg(array('paged' => $current_page-1)) .'"><i aria-hidden="true" class="fa fa-step-backward"></i></a>';?>
                         <?php } ?>
                        </li>
                        <?php 
                            for($i=$current_page,$j=1;$i<=$num_pages;$i++,$j++){ 
                            if(($j<=3) || ($num_pages==$current_page)){
                        ?>
                            <li>
                                <?php echo '<a href="'. add_query_arg(array('paged' => $i)) .'"><span>'.$i.'</span></a>';?>
                            </li>
                        <?php
                             }
                         } 
                        ?>
                        <li>
                         <?php if($current_page==$num_pages){?>
                            <?php echo '<a href="'. add_query_arg(array('paged' => $current_page)) .'"><i aria-hidden="true" class="fa fa-step-forward"></i></a>';?>
                         <?php }else{ ?>
                             <?php echo '<a href="'. add_query_arg(array('paged' => $current_page+1)) .'"><i aria-hidden="true" class="fa fa-step-forward"></i></a>';?>
                         <?php } ?>
                        </li>
                        <li>
                            <?php echo '<a href="'. add_query_arg(array('paged' => $num_pages)) .'"><i aria-hidden="true" class="fa fa-forward"></i></a>';?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>