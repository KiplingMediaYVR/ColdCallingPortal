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
        <?php  include('sidebar1.php'); ?>
        <?php
        $args = [
            'post_type' => 'phone',
            'posts_per_page' => $postsPerPage,
            'paged' => $paged,
            'page' => $paged
        ];
        $loop = new WP_Query($args);
        // allPostCount, searchedPostCount,
        $count_posts = wp_count_posts('phone');
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
                <?php $t = get_cpt_archives('phone'); ?>
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
