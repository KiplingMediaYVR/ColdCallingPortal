<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: SearMember Listing
*/
get_header();
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
} ?>
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
                    	<?php //echo "login user id : ".get_current_user_id(); ?>
					<?php
					$query = "SELECT * FROM wp_customuserlist where status='new' and list_user_id='".get_current_user_id()."'";
					//$count_request = $wpdb->query($query);
					$count_request_1 = $wpdb->get_results($query);
					$count_request = count($count_request_1);
					if($count_request==""){ $count_request=0; }?>
					<a href="<?php echo get_site_url()."/myrefferal-listing"; ?>">New Refferals <span class="count"><?php echo $count_request; ?></span></a>
                </div>
                <div class="sidebar-search">
                    <form>
                        <input type="text" class="text-box" placeholder="Search"/>
                    </form>
                </div>
            </div>
            <div class="category-block">
                <ul class="category-list">
                    <!--
					<li class="active category-parent">
                        <a href="javascript:void(0)">Ontario</a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <ul class="sub-category">
                            <li class="category-parent">
                                <a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=toronto">Greater Toronto Area</a>
                                <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <ul class="sub-category">
                                    <li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=toronto">Toronto</a></li>
                                    <li><a href="#">Search</a></li>
                                    <li><a href="#">Markham</a></li>
                                    <li><a href="#">Scarborough</a></li>
                                    <li><a href="#">Richmond Hill</a></li>
                                    <li><a href="#">New Market</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=ottawa">Ottawa</a></li>
                            <li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=kingston">Kingston</a></li>
                            <li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=london">London</a></li>
                            <li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=jamesbay">James Bay</a></li>
                        </ul>
                    </li>-->
					<?php $get_city = $_GET['search_id']; ?>
					<li class="active category-parent">
                        <a href="javascript:void(0)">Canada</a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <ul class="sub-category">
							<?php 
							$active_class = ''; 
							?>
                            <li class="category-parent <?php if($get_city=='AB'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=AB">Alberta</a></li>	
							<li class="category-parent <?php if($get_city=='BC'){ echo 'active'; }?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=BC">British Columbia</a></li>	
							<li class="category-parent <?php if($get_city=='MB'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=MB">Manitoba</a></li>	
							<li class="category-parent <?php if($get_city=='NB'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NB">New Brunswick</a></li>	
							<li class="category-parent <?php if($get_city=='NL'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NL">Newfoundland and Labrador</a></li>	
							<li class="category-parent <?php if($get_city=='NT'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NT">Northwest Territories</a></li>	
							<li class="category-parent <?php if($get_city=='NS'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NS">Nova Scotia</a></li>	
							<li class="category-parent <?php if($get_city=='NU'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NU">Nunavut</a></li>	
							<li class="category-parent <?php if($get_city=='ON'){ echo 'active'; } ?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=ON">Ontario</a></li>
							<li class="category-parent <?php if($get_city=='PE'){ echo 'active'; }?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=PE">Prince Edward Island</a></li>
							<li class="category-parent <?php if($get_city=='QU'){ echo 'active'; }?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=QU">Quebec</a></li>
							<li class="category-parent <?php if($get_city=='SK'){ echo 'active'; }?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=SK">Saskatchewan</a></li>
							<li class="category-parent <?php if($get_city=='YT'){ echo 'active'; }?>"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=YT">Yukon Territory</a></li>
						</ul>
					</li>	
				</ul>
				<ul class="category-list">
                    <?php if (get_post_type() == 'coaching') : ?>
                <li class="active">
                <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="<?php echo get_post_type_archive_link('coaching'); ?>">Coaching</a>
                    </li>
                    <?php if (get_post_type() == 'ccw_events') : ?>
                <li class="active">
                <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="<?php echo get_post_type_archive_link('ccw_events'); ?>">Events</a>
                    </li>
                    <?php if (get_post_type() == 'scripts') : ?>
                <li class="category-parent active">
                <?php else: ?>
                    <li class="category-parent">
                        <?php endif; ?>
                    <li class="category-parent">
                        <a href="<?php echo get_post_type_archive_link('scripts'); ?>">Scripts</a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <ul class="sub-category">
                            <li><a href="<?php echo get_post_type_archive_link('phone'); ?>">Phone</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('door'); ?>">Door to Door</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('email'); ?>">Email/Direct Mail</a></li>
                        </ul>
                    </li>
                    <?php if (get_post_type() == 'liners') : ?>
                <li class="active">
                <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="<?php echo get_post_type_archive_link('liners'); ?>">Liners</a>
                    </li>
                    <?php if (get_post_type() == 'market') : ?>
                    <li class="active">
                        <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="<?php echo get_post_type_archive_link('market'); ?>">Market</a>
                    </li>
                </ul>
            </div>
            <div class="siderbar-buttons">
                <a href="<?php echo get_site_url()."/myrefferal-listing"; ?>" class="cust-btn">REFFERALS</a>
            </div>

        </div>
        <div class="main-sidebar">
            <div class="main-content">
                <div class="calling-wrap">
                    <ul class="call-list call-list-full">
                        <?php
						$get_city = $_GET['search_id'];
                        $wp_user_query = new WP_User_Query(array (
                            'order' => 'ASC'
                        ));

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
							if(strtolower($get_city)==strtolower($user_info->billing_state)):
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
                        <?php endif; endif; }} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
