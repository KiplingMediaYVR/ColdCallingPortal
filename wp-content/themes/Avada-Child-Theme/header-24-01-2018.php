    <?php
    /**
     * Header template.
     *
     * @author     ThemeFusion
     * @copyright  (c) Copyright by ThemeFusion
     * @link       http://theme-fusion.com
     * @package    Avada
     * @subpackage Core
     */
    // Do not allow directly accessing this file.
    if (!defined('ABSPATH')) {
        exit('Direct script access denied.');
    }
    wp_head();
    ?>
    <!DOCTYPE html>
    <html lang="en-US"><!--<![endif]--><head>
        <meta charset="utf-8">
        <title>Cold Calling Works | My Portal Page</title>

        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script>
    <!-- custom js -->
    <script>
    function sendContact() {
        var valid;
        valid = validateContact();
        if(valid) {

            // for upload
            // jQuery.ajax({
            // url: "http://youmewebs.com/demo/cold-calling/wp-content/themes/Avada-Child-Theme/contact_mail.php",
            // data:'luid='+$("#cust_l_u_id").val()+'&cuid='+$("#cust_c_u_id").val()+'&userEmail='+$("#cust_userEmail").val()+'&subject='+$("#cust_subject").val()+'&message='+$('#cust_message').val(),
            // type: "POST",
            // success:function(data){
            // $("#mail-status").html(data);
            // },
            // error:function (){}
            // });
                var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
                var luid = jQuery("#cust_l_u_id").val();
                var cuid = jQuery("#cust_c_u_id").val();
                var userEmail = jQuery("#cust_userEmail").val();
                var subject = jQuery("#cust_subject").val();
                var message = jQuery("#cust_message").val();

                // add for upload
                 var fd = new FormData();
            var files_data = jQuery('.upload-form .files-data'); // The <input type="file" /> field
            //console.log(files_data);


            // Loop through each data and create an array file[] containing our files data.
            jQuery.each(jQuery(files_data), function(i, obj) {
                jQuery.each(obj.files,function(j,file){
                    fd.append('files[' + j + ']', file);
                })
            });

            // our AJAX identifier
           fd.append('action', 'eis_infinite_scroll');
           fd.append('luid', jQuery("#cust_l_u_id").val());
           fd.append('cuid', jQuery("#cust_c_u_id").val());
           fd.append('userEmail', jQuery("#cust_userEmail").val());
           fd.append('subject', jQuery("#cust_subject").val());
           fd.append('message', jQuery('#cust_message').val());

            // Remove this code if you do not want to associate your uploads to the current page.
           //fd.append('post_id', <?php echo $post->ID; ?>);
                // end upload

                jQuery.ajax({
                url: ajaxurl,
                type:'POST',
                //async: true,
                // data: 'action=eis_infinite_scroll&luid='+$("#cust_l_u_id").val()+'&cuid='+$("#cust_c_u_id").val()+'&userEmail='+$("#cust_userEmail").val()+'&subject='+$("#cust_subject").val()+'&message='+$('#cust_message').val()+'&'+fd,

                data: fd,
                contentType: false,
                processData: false,

                // beforeSend: function(){
                //     $('.loadMore_btn').hide();
                //     $(".no_data").text('');
                //     $('.loader_img').css('display','block');
                // },
                success: function(response){
                    if( response.length ){
                        //$("#mail-status").html(response);
                        window.location.href = "<?php echo site_url(); ?>/member-listing";
                    }

                }
            });
        }
    }

    function validateContact() {
        var valid = true;
        jQuery(".demoInputBox").css('background-color','');
        jQuery(".info").html('');

        // if(!$("#userName").val()) {
        //     $("#userName-info").html("(required)");
        //     $("#userName").css('background-color','#FFFFDF');
        //     valid = false;
        // }
        if(!jQuery("#cust_userEmail").val()) {
            jQuery("#userEmail-info").html("(required)");
          jQuery("#cust_userEmail").css('background-color','#FFFFDF');
            valid = false;
        }
        if(!jQuery("#cust_userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            jQuery("#userEmail-info").html("(invalid)");
            jQuery("#cust_userEmail").css('background-color','#FFFFDF');
            valid = false;
        }
        if(!jQuery("#cust_subject").val()) {
            jQuery("#subject-info").html("(required)");
            jQuery("#cust_subject").css('background-color','#FFFFDF');
            valid = false;
        }
        if(!jQuery("#cust_message").val()) {
            jQuery("#content-info").html("(required)");
            jQuery("#cust_message").css('background-color','#FFFFDF');
            valid = false;
        }

        return valid;
    }
    </script>
    <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery(".menu_trigger_icon").click(function(){
                jQuery(".header-nav").toggleClass("active");
            });  
        });
    </script>
    <!-- custom js -->
    </head>

    <body class="account-page">
    <header>
        <div class="container">
            <div class="top_head">
                <div class="main-logo">
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_site_url(); ?>/images/main-logo.jpg" alt="Cold Calling Works"/></a>
                </div>
                <div class="header-right">
                    <div class="menu_tog">
                        <div class="trigger_icon">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                   
                    <div class="header-ptofile">
                        <div class="user_profile">
                            <div class="act_user">
                                <ul class="list-inline">
                                    <li class="dropdown">
                                        User_Name <span class="user-icon"><i aria-hidden="true" class="fa fa-user-circle-o"></i></span>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#"> My Profile</a>
                                            </li>
                                            <li>
                                                <a href="#">Logout </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                    


                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>    
            
            <div class="btm_head">
                 <div class="header-nav">
                    <ul class="nav"> 
                        <li>
                            <a href="https://coldcallingworks.ca/events/">BOOTCAMPS</a>
                        </li>
                        <li>
                            <a href="https://coldcallingworks.ca/testimonials/">TESTIMONIALS</a>
                        </li>
                        <li>
                            <a href="https://coldcallingworks.ca/about-us/">ABOUT US</a>
                        </li>
                        <li>
                            <a href="https://coldcallingworks.ca/contact/">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>    
        
        <div class="menu-toggle">
            <h2>Menu</h2>
            <div class="menu_trigger_icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </header>
