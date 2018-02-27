<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<style type="text/css">
	.woocommerce-MyAccount-navigation ul li.is-active a,.woocommerce-MyAccount-navigation ul li.is-active a:hover{
		    background: #CD2026 !important;
   		 color: #fff;
	}
	.fusion-read-more:hover:after{
	 color: #fff !important;	
	}
	.woocommerce-MyAccount-navigation ul li a{
		padding: 10px !important;
	}
	.view-cart{    background: #b50c0c;
    color: #fff;
    padding: 10px;
    border-radius: 5px;}
    .view-cart a{
    color: #fff !important;
    }
</style>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
