<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: MyRefferal Details
*/
get_header();
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
} 
?>
<?php 
if(isset($_POST['accept'])){
	if(!isset($_GET['listuser_id'])){ $location=get_site_url()."/myrefferal-listing"; wp_redirect( $location ); exit; }
	$request_id = $_GET['listuser_id'];
	$wpdb->query("Update wp_customuserlist SET status='accept'  WHERE id = '".$request_id."'");
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
			<h2 class="center">My Refferals details</h2>
			<hr>
				
				<?php if(!isset($_GET['listuser_id'])){ $location=get_site_url()."/myrefferal-listing"; wp_redirect( $location ); exit; } ?>
				<?php 
					 $listuser_id = $_GET['listuser_id'];
					 $query_get_data = "SELECT * FROM wp_customuserlist where ID=".$listuser_id;
					 $user_data = $wpdb->get_results($query_get_data);
			         $user_info = get_userdata($user_data[0]->current_user_id);
			         $reply_user_id = $user_data[0]->current_user_id;
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
					<hr class="hr-space"/>
					<h2 class="title"><?php echo $user_data[0]->subject ?></h2>
					<div class="files-details-box">
						<div class="files-dtc cust-scrollbar">
							<?php echo $user_data[0]->message ?>
						</div>
						<?php
						$filedata = unserialize($user_data[0]->upload_path); 
						if(count($filedata)!=0){
						?>
						<div class="files-slider-wrap">
							<div class="files-slider owl-carousel owl-theme">
								  <?php if($user_data[0]->status=="new"){ ?>
								  <?php 
								  	//print_r($filedata);
								  	for($i=0;$i<count($filedata);$i++){
								  ?>
								  	<div class="item">
											<a href="#" class="file-btn" >
												<span class="icon"><i aria-hidden="true" class="fa fa-file-text"></i></span>
												<span class="file-name"><?php echo basename($filedata[$i]); ?></span>
											</a>
										</div>
								  <?php }
								  }else{ ?>
								  <?php 
								  	$zip = new ZipArchive(); // Load zip library 
									$tmp_file = "zipfiles/".time().".zip"; // Zip name
									$zip->open($tmp_file, ZipArchive::CREATE);
									for($i=0;$i<count($filedata);$i++){
									    $download_file = file_get_contents($filedata[$i]);
									    $zip->addFromString(basename($filedata[$i]), $download_file);
									}
									$zip->close();
									//header('Content-disposition: attachment; filename="file.zip"');
									//header('Content-type: application/zip');
									//readfile($tmp_file);
									//unlink($tmp_file);

								  	for($i=0;$i<count($filedata);$i++){
								  ?>
									  <div class="item">
											<a href="<?php echo $filedata[$i]; ?>" class="file-btn" target="_blank">
												<span class="icon"><i aria-hidden="true" class="fa fa-file-text"></i></span>
												<span class="file-name"><?php echo basename($filedata[$i]); ?></span>
											</a>
										</div>
								  <?php }
								   } ?>
							</div>
						</div>
					<?php } ?>	
					</div>
					<div class="buttonset-wrap">
					<?php if($user_data[0]->status=="new"){ ?>
					<form name="accept_request"	action="<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER['REQUEST_URI']; ?>" method="post">
						<button class="cust-btn" name="accept" type="submit">Accept</button>	
					</form>	
					<?php }else{ ?>
						<a href="<?php echo get_site_url()."/member-details?user_id=".$reply_user_id; ?>"class="cust-btn">Reply</a>
					<?php $filedata = unserialize($user_data[0]->upload_path);
						if(count($filedata)!=0){ ?>
						<a href="<?php echo get_site_url().'/'.$tmp_file; ?>"class="cust-btn" target="_blank">Download</a>
					<?php } } ?>	
					</div>
				
			</div>
			
				
				
			</div>
	
    </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
	  jQuery('.files-slider').owlCarousel({
			loop:true,
			nav:true,
			dots:false,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:3,
					margin:15
				},
				1025:{
					items:5,
					margin:25
				}
			}
		})
	});
</script>
<?php get_footer(); ?>
