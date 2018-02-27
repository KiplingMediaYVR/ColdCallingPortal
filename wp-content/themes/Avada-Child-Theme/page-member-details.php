<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: Member Details
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
				<?php if(!isset($_GET['user_id'])){ $location=get_site_url()."/member-listing"; wp_redirect( $location ); exit; } ?>
				<?php 
					 $user_info = get_userdata($_GET['user_id']);
					 $get_author_gravatar = get_avatar_url($user_info->user_email);
				//print_r($user_info);  ?>
				<div class="main-content">
					<div class="calling-wrap">
						<ul class="call-list">
							<li class="noborder">
								<div class="call-user-media border2px">
								<?php $upload_dir = wp_upload_dir();
        $upload_dir = $upload_dir[baseurl];
        $imagesrc =  esc_attr( $user_info->txt_image );
        $uploaddir = $upload_dir.'/large_image/'.$imagesrc; ?>
									<?php //echo '<img src="'.$get_author_gravatar.'" alt="" />'; ?>
									<?php echo '<img src="'.$uploaddir.'" alt="" />'; ?>
								</div>
								<div class="call-dtc noborderleft">
									<h2><?php echo $user_info->first_name." ".$user_info->last_name;?></h2>
									<h3><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></h3>
									<ul class="calling-phone-list">
										<li><a href="tel:<?php echo $user_info->billing_phone; ?>"><i aria-hidden="true" class="fa fa-phone"></i> <?php echo $user_info->billing_phone; ?></a></li>
										<li><a href="mailto:<?php echo $user_info->user_email; ?>"><i aria-hidden="true" class="fa fa-mail"></i> <?php echo $user_info->user_email; ?></a></li>
									</ul>
									<p><?php //echo $user_info->description; ?></p>
									
									<p>
									<?php 
									if(strlen($user_info->txt_PersonalMessage) > 400)
									{
										echo substr($user_info->txt_PersonalMessage, 0,400).' ...'; 
									}
									else 
									{
										echo $user_info->txt_PersonalMessage; 
									}
									?>
									</p>
									
									<div class="colling-bottom-bar1">
										<div class="bottombar-left"><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></div>
										<div class="bottombar-right">
											<ul class="calling-user-social1">
												<?php if($user_info->txt_Website){ ?>
											<li>
												<a href="<?php echo addhttp($user_info->txt_Website); ?>" target="_blank"><i aria-hidden="true" class="fa fa-globe"></i></a>
											</li>
										<?php } 
										if($user_info->user_email){ ?>
                                        <li>
                                            <a href="mailto:<?php echo $user_info->user_email; ?>" target="_blank"><i aria-hidden="true" class="fa fa-envelope"></i></a>
                                        </li>
										<?php } 
										if($user_info->txt_Facebook){ ?>
                                        <li>
                                            <a href="<?php echo addhttp($user_info->txt_Facebook); ?>" target="_blank"><i aria-hidden="true" class="fa fa-facebook-square"></i></a>
                                        </li>
										<?php } 
										if($user_info->author_linkedin){ ?>
                                        <li>
                                            <a href="<?php echo addhttp($user_info->author_linkedin); ?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
                                        </li>
										<?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="details-add-form">
						<!-- <form>-->
						<?php
							$userc = wp_get_current_user();
						 ?>
							<div class="row">
								<div class="col-sm-8">
								<div id="mail-status"></div>
									<ul class="list-form">
										<li>
											<label>Subject</label>
											<input type="text" name="subject" id="cust_subject">
										</li>
										<li>
											<label>Message</label>
											<textarea type="text" name="message" id="cust_message"></textarea>
										</li>
									</ul>
								</div>
								<input type="hidden" name="userEmail" id="cust_userEmail" value="<?php echo $user_info->user_email; ?>" class="demoInputBox">
								<input type="hidden" name="c_u_id" id="cust_c_u_id" value ="<?php echo $userc->ID; ?>" class="demoInputBox">
						    	  <input type="hidden" name="l_u_id" id="cust_l_u_id" value="<?php echo $_GET['user_id']; ?>" class="demoInputBox">
						    	  
								<div class="col-sm-4">
									<div class="upload-box">
										<div class="upload-form">
						    	  			<input type = "file" name = "files[]" accept = "image/*" class = "files-data form-control" multiple/>
						    	  </div>
									</div>
								</div>
							</div>
							<div class="button-set">
								<button type="button" onClick="sendContact();" class="cust-btn">Send</button>
							</div>
					 
						
					 
					</div>
					
					
				</div> 
				
			</div>
	
    </div>
</div>
<?php 
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
?>
<?php get_footer(); ?>
