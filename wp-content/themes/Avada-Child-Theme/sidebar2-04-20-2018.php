<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $("#search").select2();                
                $("#search").change(function() {
                    //alert($(this).val());
                });
            });
        </script>
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
                        <!--<input type="text" class="text-box" placeholder="Search"/>-->
						<select id="search" name="search" class="form-control">
						 <?php 
							$query_get_searc = "SELECT CT.id,CT.name FROM countries as C  RIGHT JOIN states as S ON C.id = S.country_id RIGHT JOIN cities as CT ON S.id = CT.state_id WHERE C.id = 38 
ORDER BY CT.name";
							$search_list = $wpdb->get_results($query_get_searc);
							if (!empty($search_list)) {
								foreach ($search_list as $search)
								{ 
									if(isset($_GET['search_id']) && $_GET['search_id'] == $search->id)
								    {
											$select = ' selected="selected"';											
									}
						?>
							<option value="<?php echo $search->id; ?>" <?php echo $select; ?>><?php echo $search->name; ?></option>
							
							<?php
								}
							}
							?>
							 
						</select>
						
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
				   
				   if(isset($_GET['search_id']) && !empty($_GET['search_id'])) {
					$queryCity = $wpdb->get_results("SELECT * FROM cities WHERE id = '".$_GET['search_id']."' ");					
					$selectedCityId = $queryCity[0]->state_id;
				   }
				   
					$query_get_state = "SELECT * FROM states where country_id = 38 ORDER BY name";
					$state_list = $wpdb->get_results($query_get_state);
					if (!empty($state_list)) {
                            foreach ($state_list as $state)
                            {
								$class = '';
								if(isset($selectedCityId ) && $selectedCityId  == $state->id )
								{
									$class = ' active';
								}
								
				   ?>
                   <li class="category-parent <?php echo $class; ?>">
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
							<li><a href="<?php echo site_url(); ?>/searchmember-listing?search_id=<?php echo $city->id ?>"> <?php echo $city->name; ?> </a></li>							 
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
			
<script>
$(document).ready(function(){
	 $("#search").change(function(){
		var id = $(this).val();
		var url = '<?php echo site_url(); ?>/searchmember-listing?search_id='+id;	
		window.location = url;
	 });
});
</script>
			 