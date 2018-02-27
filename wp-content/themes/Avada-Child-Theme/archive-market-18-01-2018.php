<?php get_header();
if (!is_user_logged_in()) {
    wp_redirect(home_url('/my-account'));
} else {
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$postsPerPage = 6;
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
        <?php
        $args = [
            'post_type' => 'market',
            'posts_per_page' => $postsPerPage,
            'paged' => $paged,
            'page' => $paged
        ];
        $loop = new WP_Query($args);
        // allPostCount, searchedPostCount,
        $count_posts = wp_count_posts('market');
        $totalCount = $loop->found_posts;
        $totalPages = ceil($totalCount / $postsPerPage);
        $totalPages = $totalPages <= 0 ? 1 : $totalPages;


        $startNum = ($paged - 1) * $postsPerPage + 1;
        $endNum = $totalCount;
        if (intval($paged) < $totalPages) {
            $endNum = $paged * $postsPerPage;
        }
        $currentPage = $paged;
        if ($totalPages > 5) {
            $firstPage = $paged - 2;
            $lastPage = $paged + 2;
            if ($firstPage <= 0) {
                $lastPage = $lastPage - $firstPage + 1;
                $firstPage = 1;
            }
            if ($lastPage > $totalPages) {
                $firstPage = $firstPage - ($lastPage - $totalPages);
                $lastPage = $totalPages;
            }
        } else {
            $firstPage = 1;
            $lastPage = $totalPages;
        }
        ?>

        <div class="main-sidebar">
            <div class="pagination-wrap">
                <?php $t = get_cpt_archives('market'); ?>
                <div class="pagination-right">
                    <select name="archive-dropdown"
                            onchange="document.location.href=this.options[this.selectedIndex].value;">
                        <option value=""><?php echo esc_attr(__('Archive')); ?></option>
                        <?php foreach ($t as $ta) : ?>
                            <option value="<?php echo $ta['link']; ?>"><?php echo $ta['month'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><br><br>
            </div>
            <?php
            while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="main-content">
                    <div class="coaching-wrap">
                        <ul class="coaching-list">
                            <li>
                                <div class="coaching-media">
                                    	<?php if(the_field('video')==null){ 
                                    	the_post_thumbnail(); 
									 }else{ 
										the_field('video'); 
									 } ?>
                                </div>
                                <div class="coaching-dtc">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                    <?php
                                    $post_date = get_the_date('d/m/y');
                                    ?>
                                    <h3><?php the_author(); ?> | <?php echo $post_date; ?></h3>
                                    <?php the_excerpt(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_query();
            wp_reset_postdata(); ?>

            <div class="pagination-wrap pagination-bottom">
                <div class="pagination-block">
                    <ul class="pagination-list">
                        <?php //if (!$lastPage) : ?>
                            <li>
                                <a href="<?php echo add_query_arg(array('page' => $firstPage)); ?>"><i aria-hidden="true"
                                                                                         class="fa fa-backward"></i></a>
                            </li>
                        <?php //endif; ?>
						<li>
                         <?php if($currentPage==1){?>
                            <?php echo '<a href="'. add_query_arg(array('page' => $currentPage)) .'"><i aria-hidden="true" class="fa fa-step-backward"></i></a>';?>
                         <?php }else{ ?>
                            <?php echo '<a href="'. add_query_arg(array('page' => $currentPage-1)) .'"><i aria-hidden="true" class="fa fa-step-backward"></i></a>';?>
                         <?php } ?>
                        </li>
                        <?php
                        for ($i = $firstPage; $i <= $lastPage; $i++) {
                            ?>
                            <li>
                                <a href="<?php echo add_query_arg(array('page' => $i)) ?>" class="meta"><span><?php echo $i ?></span></a>
                            </li>
                        <?php } ?>
						<li>
                         <?php if($currentPage==$totalPages){?>
                            <?php echo '<a href="'. add_query_arg(array('page' => $currentPage)) .'"><i aria-hidden="true" class="fa fa-step-forward"></i></a>';?>
                         <?php }else{ ?>
                             <?php echo '<a href="'. add_query_arg(array('page' => $currentPage+1)) .'"><i aria-hidden="true" class="fa fa-step-forward"></i></a>';?>
                         <?php } ?>
                        </li>
						<?php // if (!$firstPage) : ?>
                            <li>
                                <a href="<?php echo get_pagenum_link($lastPage); ?>"><i aria-hidden="true"
                                                                                        class="fa fa-forward"></i></a>
                            </li>
                        <?php // endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
