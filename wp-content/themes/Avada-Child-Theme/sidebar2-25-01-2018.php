<div class="sidebar-left">
            <div class="sidebar-box">
                <div class="refferals-btn">                    
                    <?php
                    $query = "SELECT * FROM wp_customuserlist where status='new' and list_user_id='".get_current_user_id()."'";
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
                
                <div class="category-block">
                <ul class="category-list" style="border-top: 1px solid #ccc;
    padding-top: 10px;">
                   <?php 
					$query_get_state = "SELECT * FROM states where country_id = 38 ORDER BY name";
					$state_list = $wpdb->get_results($query_get_state);
					if (!empty($state_list)) {
                            foreach ($state_list as $state)
                            {
				   ?>
                   <li class="category-parent">
                        <a href="javascript:void(0)"><?php echo $state->name; ?></a>
                        <span class="sub-arrow"><i class="fa fa-plus" aria-hidden="true"></i></span>
						<?php 
						$query_get_city = "SELECT * FROM cities where state_id = '".$state->id."' ORDER BY name";
						$city_list = $wpdb->get_results($query_get_city);
						if (!empty($city_list)) {
								foreach ($city_list as $city)
								{
					   ?>
						<ul class="sub-category">
							<li><a href="<?php //echo site_url(); ?>/searchmember-listing?search_id=toronto"> <?php echo $city->name; ?> </a></li>							 
						</ul>
					<?php 
						}
					}
				?>	
				  </li>	
					<?php 
						}
					}
				?>
                </ul>

        </div>
                
            </div>