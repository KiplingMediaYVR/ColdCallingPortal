<?php
/**
 * Created by PhpStorm.
 * User: yashthakur
 * Date: 05/01/18
 * Time: 12:16 AM
 */

/*
Template Name: MyRefferal Listing
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
            <h2 class="center">My Refferals </h2>
            <hr>
            <div class="main-content">
                <div class="calling-wrap">
                    <ul class="call-list call-list-full">
                        <?php
                        $current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
                        $users_per_page = 4; // RAISE THIS AFTER TESTING ;)
                        if(isset($_GET['paged'])){
                            $paged_id = $_GET['paged'];
                        }else{
                            $paged_id = 1;
                        }
                        $start_point = ($paged_id-1)*$users_per_page;

                        $query_get_data_temp = "SELECT * FROM wp_customuserlist where list_user_id=".get_current_user_id()." order by ID desc ";
                        $users_list_temp = $wpdb->get_results($query_get_data_temp);
                        $total_users = count($users_list_temp); // How many users we have in total (beyond the current page)
                        $num_pages = ceil($total_users / $users_per_page); 

                        $query_get_data = "SELECT * FROM wp_customuserlist where list_user_id=".get_current_user_id()." order by ID desc limit ".$start_point.",".$users_per_page;
                        //echo "query : ".$query_get_data;
                        $users_list = $wpdb->get_results($query_get_data);
                        // Looping managers
                        if (!empty($users_list)) {
                            foreach ($users_list as $user)
                            {
                                // get all the user's data
                               $user_info = get_userdata($user->current_user_id);
                                $get_author_gravatar = get_avatar_url($user_info->user_email);
                            ?>
                        <li>
                            <div class="call-user-media">
                                <?php echo '<img src="'.$get_author_gravatar.'" alt="" />'; ?>
                            </div>
                            <div class="call-dtc">
								<h2> 
									<a href="<?php echo site_url(); ?>/myrefferal-details?listuser_id=<?php echo $user->ID; ?>"><?php echo $user->subject; ?></a>
								</h2> 
                                <!--  <h2><a href="<?php echo site_url(); ?>/myrefferal-details?listuser_id=<?php echo $user->ID; ?>"> <?php echo $user_info->first_name.' '. $user_info->last_name ;?></a></h2>
                                 <h3><?php echo $user_info->billing_company; ?><br/><?php echo $user_info->billing_city; ?> | <?php echo $user_info->billing_state; ?> | <?php echo $user_info->billing_postcode; ?> | <?php echo $user_info->billing_country; ?></h3>
                                <ul class="calling-phone-list">
                                    <li><a href="tel:<?php echo $user_info->billing_phone; ?>"><i aria-hidden="true" class="fa fa-phone"></i> <?php echo $user_info->billing_phone; ?></a></li>
                                </ul>-->
                                <!--<p style="color:#cd2026;"><strong>Request Status : <?php echo $user->status; ?></strong></p>-->
                                <p>
								<?php 
									if(strlen($user->message) > 400)
									{
										echo substr($user->message, 0,400).' ...'; 
									}
									else 
									{
										echo $user->message; 
									}
								?>
								</p>

                                <a href="#" class="trash">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <div class="colling-bottom-bar">
							<div class="bottombar-left" style="font-size:18px;"><?php echo strtoupper($user_info->first_name.' '. $user_info->last_name);?></div>
                                <!--<div class="bottombar-left"><?php echo $user_info->billing_address_1.' '. $user_info->billing_address_2 ?>,<br/><?php echo $user_info->billing_city; ?>, <?php echo $user_info->billing_state; ?>, <?php echo $user_info->billing_postcode; ?></div>-->
                                <div class="bottombar-right">
                                    <ul class="calling-user-social">
										<?php 
										$filedata = unserialize($user->upload_path);
										if(count($filedata)!=0){
										$zip = new ZipArchive(); // Load zip library 
										$tmp_file = "zipfiles/".md5(time().rand(0,99999)).".zip";
										$zip->open($tmp_file, ZipArchive::CREATE);
										for($i=0;$i<count($filedata);$i++){
											$download_file = file_get_contents($filedata[$i]);
											$zip->addFromString(basename($filedata[$i]), $download_file);
										}
										$zip->close();												
										?> 
										<li>
                                            <a href="<?php echo get_site_url().'/'.$tmp_file; ?>" target="_blank"><i aria-hidden="true" class="fa fa-paperclip"></i></a>
										</li> 
										<?php 
											} 
										?>
										 
                                         <!--  <li>
                                            <a href="mailto:<?php echo $user_info->author_email; ?>" target="_blank"><i aria-hidden="true" class="fa fa-envelope"></i></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $user_info->author_facebook; ?>" target="_blank"><i aria-hidden="true" class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $user_info->author_linkedin; ?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin-square"></i></a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php }} ?>
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
                            for($i=1,$j=1;$i<=$num_pages;$i++,$j++){ 
                            if(($i<=3) || ($num_pages==$current_page)){
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
