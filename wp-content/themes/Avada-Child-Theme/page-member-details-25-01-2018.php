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
					<li class="active category-parent">
                        <a href="javascript:void(0)">Canada</a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <ul class="sub-category">
                            <li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=AB">Alberta</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=BC">British Columbia</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=MB">Manitoba</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NB">New Brunswick</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NL">Newfoundland and Labrador</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NT">Northwest Territories</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NS">Nova Scotia</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=NU">Nunavut</a></li>	
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=ON">Ontario</a></li>
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=PE">Prince Edward Island</a></li>
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=QU">Quebec</a></li>
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=SK">Saskatchewan</a></li>
							<li class="category-parent"><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=YT">Yukon Territory</a></li>
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
				<!--<div class="pagination-wrap">
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
				</div>-->
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
									<?php echo '<img src="'.$get_author_gravatar.'" alt="" />'; ?>
								</div>
								<div class="call-dtc noborderleft">
									<h2><?php echo $user_info->first_name." ".$user_info->last_name;?></h2>
									<h3><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></h3>
									<ul class="calling-phone-list">
										<li><a href="tel:<?php echo $user_info->billing_phone; ?>"><i aria-hidden="true" class="fa fa-phone"></i> <?php echo $user_info->billing_phone; ?></a></li>
										<li><a href="mailto:<?php echo $user_info->user_email; ?>"><i aria-hidden="true" class="fa fa-mail"></i> <?php echo $user_info->user_email; ?></a></li>
									</ul>
									<p><?php echo $user_info->description; ?></p>
									<div class="colling-bottom-bar1">
										<div class="bottombar-left"><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></div>
										<div class="bottombar-right">
											<ul class="calling-user-social1">
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
						<!--</form> -->
						<?php //echo do_shortcode('[contact-form-7 id="102" title="Contact form 1"]'); ?>
						<!-- add demo -->
						
						<!-- <div id="frmContact">
						    <div id="mail-status"></div>
						    
						    <div>
						        <label>Email</label><span id="userEmail-info" class="info"></span><br/>
						        <input type="hidden" name="userEmail" id="cust_userEmail" value="<?php echo $user_info->user_email; ?>" class="demoInputBox">
						    </div>
						    <div>
						        <label>Subject</label><span id="subject-info" class="info"></span><br/>
						        <input type="text" name="subject" id="cust_subject" class="demoInputBox">
						    </div>
						    <div>
						        <label>Message</label><span id="content-info" class="info"></span><br/>
						        <textarea name="message" id="cust_message" class="demoInputBox" cols="60" rows="6"></textarea>
						    </div>
						    <div>
						    </div>
						    <div>
						    	 <input type="hidden" name="c_u_id" id="cust_c_u_id" value ="<?php echo $userc->ID; ?>" class="demoInputBox">
						    	  <input type="hidden" name="l_u_id" id="cust_l_u_id" value="<?php echo $_GET['user_id']; ?>" class="demoInputBox">
						        <button name="submit" class="btnAction" onClick="sendContact();">Send</button>
						        <?php// echo get_template_directory_uri(); ?>
						    </div>

						</div> -->
						<!-- end demo -->
					</div>
					
					
				</div>
				
				
				<!--<div class="pagination-wrap pagination-bottom">
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
				</div>-->
				
				
			</div>
	
    </div>
</div>

<?php get_footer(); ?>
