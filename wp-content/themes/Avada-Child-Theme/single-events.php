<?php
get_header();
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
} else { ?>
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
            <div class="main-sidebar">
                <div class="main-content">
                    <?php
                    if (have_posts()) : while (have_posts()) :
                        the_post(); ?>
                        <div class="coaching-wrap">
                            <div class="">
                                <div class="coaching-media">
                                    <?php the_field('video'); ?>
                                </div>
                                <div class="coaching-dtc">
                                    <h2 class="detailtitle"><?php the_title(); ?></h2>
                                    <?php
                                    $post_date = get_the_date('d/m/y');
                                    ?>
                                    <h6><?php the_author(); ?> | <?php echo $post_date; ?></h6>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>
