<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
global $wpdb;
do_action( 'woocommerce_before_edit_account_form' ); ?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	alert("hi");
	$('#city').select2({
		maximumSelectionSize: 3
	});
	
});
</script>

<script type="text/javascript">
$(document).ready(function() {
	$(".select2-selection__rendered").append('<li class="select2-selection__choice" title="Acton Vale" data-select2-id="819"><span class="select2-selection__choice__remove" role="presentation">×</span>Acton Vale</li>');
});
</script>
<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<fieldset>
		<legend><?php _e( 'Password change', 'woocommerce' ); ?></legend>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_current"><?php _e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_1"><?php _e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
		</p>
	</fieldset>
	
	<fieldset>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_Brokerage"><?php _e( 'Brokerage', 'woocommerce' ); ?> </label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_Brokerage" name="txt_Brokerage" value="<?php echo esc_attr( $user->txt_Brokerage ); ?>"/>
		</p>
		<!--
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_Phone">Phone</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_Phone" name="txt_Phone" 
			value="<?php //echo esc_attr( $user->txt_Phone ); ?>"/>
		</p>-->
		
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_Mobile">Mobile</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_Mobile" name="txt_Mobile" value="<?php echo esc_attr( $user->txt_Mobile ); ?>"/>
		</p>
		
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_Website">Website</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_Website" name="txt_Website"
			value="<?php echo esc_attr( $user->txt_Website ); ?>"/>
		</p>
		
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_Facebook">Facebook</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_Facebook" name="txt_Facebook"
			value="<?php echo esc_attr( $user->txt_Facebook ); ?>"/>
		</p>
		
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_LinkedIn">LinkedIn</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="txt_LinkedIn" name="txt_LinkedIn" value="<?php echo esc_attr( $user->txt_LinkedIn ); ?>"/>
		</p>
		
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="txt_PersonalMessage">Personal Message</label>
			<textarea type="text" id="txt_PersonalMessage" name="txt_PersonalMessage" class="woocommerce-Input woocommerce-Input--text input-text"> <?php echo esc_attr( $user->txt_PersonalMessage ); ?> </textarea>
		</p>
		
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="city">City</label>
			 
			<select id="city" name="txt_city[]" multiple="multiple">
			       <?php 
					$query_get_searc = "SELECT CT.id,CT.name FROM countries as C  
							            RIGHT JOIN states as S ON C.id = S.country_id 
							            RIGHT JOIN cities as CT ON S.id = CT.state_id 
							            WHERE C.id = 38 
                                        ORDER BY CT.name";
					$search_list = $wpdb->get_results($query_get_searc);
					 if (!empty($search_list)) {
					  echo "<pre>";
					  print_r($search_list);
					  echo "</pre>";
					  foreach ($search_list as $search){
					?>
					  <option value="<?php echo $search->id; ?>"><?php echo $search->name; ?></option>
					<?php
					  }
					 }
				    ?>
							 
		   </select>
		</p>	
		
		
	</fieldset>
	
	
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
