<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: MyRefferal Details new
*/
get_header();
?>
<?php 
/*
if(isset($_POST['accept'])){
	if(!isset($_GET['listuser_id'])){ $location=get_site_url()."/myrefferal-listing"; wp_redirect( $location ); exit; }
	$request_id = $_GET['listuser_id'];
	$wpdb->query("Update wp_customuserlist SET status='accept'  WHERE id = '".$request_id."'");
}
*/
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
				<?php if(!isset($_GET['listuser_id'])){ $location=get_site_url()."/myrefferal-listing"; wp_redirect( $location ); exit; } ?>
				<?php 
					 $listuser_id = $_GET['listuser_id'];
					 $query_get_data = "SELECT * FROM wp_customuserlist where ID=".$listuser_id;
					 $user_data = $wpdb->get_results($query_get_data);
			         $user_info = get_userdata($user_data[0]->current_user_id);
					 $get_author_gravatar = get_avatar_url($user_info->user_email);
				//print_r($user_info);  ?>
				<div class="main-content">
					<div class="calling-wrap">
						<ul class="call-list">
							<li class="noborder">
								<div class="call-user-media border2px">
									<?php echo '<img src="'.$get_author_gravatar.'" alt="" />'; ?>
								</div>
								<div class="call-dtc noborderleft">
									<h2><?php echo $user_info->first_name." ".$user_info->last_name;?></h2>
									<h3><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></h3>
									<ul class="calling-phone-list">
										<li><i aria-hidden="true" class="fa fa-phone"></i> <?php echo $user_info->billing_phone; ?></li>
										<li><i aria-hidden="true" class="fa fa-mail"></i> <?php echo $user_info->user_email; ?></li>
									</ul>
									<p style="color:#cd2026;"><strong>Request Status : <?php echo $user_data[0]->status; ?></strong></p>
									<p><?php echo $user_info->description; ?></p>
									<div class="colling-bottom-bar1">
										<div class="bottombar-left"><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></div>
										<div class="bottombar-right">
											<ul class="calling-user-social1">
												<li>
													<a href="#" target="_blank"><i aria-hidden="true" class="fa fa-globe"></i></a>
												</li>
												<li>
													<a href="<?php echo $user_info->author_email; ?>" target="_blank"><i aria-hidden="true" class="fa fa-envelope"></i></a>
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
								</div>
							</li>
						</ul>
					</div>
					<hr class="hr-space"/>
					<h2 class="title"><?php echo $user_data[0]->subject ?></h2>
					<div class="files-details-box">
						<div class="files-dtc cust-scrollbar">
							<?php echo $user_data[0]->message ?>
						</div>
						<div class="files-slider-wrap">
							<div class="files-slider owl-carousel owl-theme">
							  <?php if($user_data[0]->status=="new"){ ?>
							  	<div class="item">
										<a href="#" class="file-btn">
											<span class="icon"><i aria-hidden="true" class="fa fa-file-text"></i></span>
											<span class="file-name">Filename.ext</span>
										</a>
									</div>
							  <?php }else{ ?>
								  <div class="item">
										<a href="#" class="file-btn">
											<span class="icon"><i aria-hidden="true" class="fa fa-file-text"></i></span>
											<span class="file-name">Filename.ext</span>
										</a>
									</div>
							  <?php } ?>
							</div>
						</div>
					</div>
					<div class="buttonset-wrap">
					<?php if($user_data[0]->status=="new"){ ?>
					<form name="accept_request"	action="<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER['REQUEST_URI']; ?>" method="post">
						<button class="cust-btn" name="accept" type="submit">Accept</button>	
					</form>	
					<?php }else{ ?>
						<button class="cust-btn" name="reply" type="submit">Accept</button>	
						<a href="#"class="cust-btn">Download</a>
					<?php } ?>	
					</div>
				
			</div>
			</div>
	
    </div>
</div>
<?php get_footer(); ?>
