jQuery(document).ready(function($){

	$.extend({
		getParameterByName: function(name) {
			name = name.replace(/[\[]/, '\\\[').replace(/[\]]/, '\\\]');
			var regexS = '[\\?&]' + name + '=([^&#]*)';
			var regex = new RegExp(regexS);
			var results = regex.exec(window.location.search);
			if(results == null) {
				return '';
			} else {
				return decodeURIComponent(results[1].replace(/\+/g, ' '));
			}
		},
		showHideSubscriptionMeta: function(){
			if ($('select#product-type').val()==WCSubscriptions.productType) {
				$('.show_if_simple').show();
				$('.grouping_options').hide();
				$('.options_group.pricing ._regular_price_field').hide();
				$('#sale-price-period').show();
				$('.hide_if_subscription').hide();
				$( 'input#_manage_stock' ).change();

				if('day' == $('#_subscription_period').val()) {
					$('.subscription_sync').hide();
				}
			} else {
				$('.options_group.pricing ._regular_price_field').show();
				$('#sale-price-period').hide();
			}
		},
		showHideVariableSubscriptionMeta: function(){
			if ($('select#product-type').val()=='variable-subscription') {

				$( 'input#_downloadable' ).prop( 'checked', false );
				$( 'input#_virtual' ).removeAttr( 'checked' );

				$('.show_if_variable').show();
				$('.hide_if_variable').hide();
				$('.show_if_variable-subscription').show();
				$('.hide_if_variable-subscription').hide();
				$( 'input#_manage_stock' ).change();

				// Make the sale price row full width
				$('.sale_price_dates_fields').prev('.form-row').addClass('form-row-full').removeClass('form-row-last');

			} else {

				if ($('select#product-type').val()=='variable') {
					$('.show_if_variable-subscription').hide();
					$('.show_if_variable').show();
					$('.hide_if_variable').hide();
				}

				// Restore the sale price row width to half
				$('.sale_price_dates_fields').prev('.form-row').removeClass('form-row-full').addClass('form-row-last');
			}
		},
		setSubscriptionLengths: function(){
			$('[name^="_subscription_length"], [name^="variable_subscription_length"]').each(function(){
				var $lengthElement = $(this),
					selectedLength = $lengthElement.val(),
					hasSelectedLength = false,
					matches = $lengthElement.attr('name').match(/\[(.*?)\]/),
					periodSelector,
					interval;

				if (matches) { // Variation
					periodSelector = '[name="variable_subscription_period['+matches[1]+']"]';
					billingInterval = parseInt($('[name="variable_subscription_period_interval['+matches[1]+']"]').val());
				} else {
					periodSelector = '#_subscription_period';
					billingInterval = parseInt($('#_subscription_period_interval').val());
				}

				$lengthElement.empty();

				$.each(WCSubscriptions.subscriptionLengths[ $(periodSelector).val() ], function(length,description) {
					if(parseInt(length) == 0 || 0 == (parseInt(length) % billingInterval)) {
						$lengthElement.append($('<option></option>').attr('value',length).text(description));
					}
				});

				$lengthElement.children('option').each(function(){
					if (this.value == selectedLength) {
						hasSelectedLength = true;
						return false;
					}
				});

				if(hasSelectedLength){
					$lengthElement.val(selectedLength);
				} else {
					$lengthElement.val(0);
				}

			});
		},
		setTrialPeriods: function(){
			$('[name^="_subscription_trial_length"], [name^="variable_subscription_trial_length"]').each(function(){
				var $trialLengthElement = $(this),
					trialLength = $trialLengthElement.val(),
					matches = $trialLengthElement.attr('name').match(/\[(.*?)\]/),
					periodStrings;

				if (matches) { // Variation
					$trialPeriodElement = $('[name="variable_subscription_trial_period['+matches[1]+']"]');
				} else {
					$trialPeriodElement = $('#_subscription_trial_period');
				}

				selectedTrialPeriod = $trialPeriodElement.val();

				$trialPeriodElement.empty();

				if( parseInt(trialLength) == 1 ) {
					periodStrings = WCSubscriptions.trialPeriodSingular;
				} else {
					periodStrings = WCSubscriptions.trialPeriodPlurals;
				}

				$.each(periodStrings, function(key,description) {
					$trialPeriodElement.append($('<option></option>').attr('value',key).text(description));
				});

				$trialPeriodElement.val(selectedTrialPeriod);
			});
		},
		setSalePeriod: function(){
			$('#sale-price-period').fadeOut(80,function(){
				$('#sale-price-period').text($('#_subscription_period_interval option:selected').text()+' '+$('#_subscription_period option:selected').text());
				$('#sale-price-period').fadeIn(180);
			});
		},
		setSyncOptions: function(periodField) {

			if ( typeof periodField != 'undefined' ) {

				if ($('select#product-type').val()=='variable-subscription') {
					var $container = periodField.closest('.woocommerce_variable_attributes').find('.variable_subscription_sync');
				} else {
					$container = periodField.closest('#general_product_data').find('.subscription_sync')
				}

				var $syncWeekMonthContainer = $container.find('.subscription_sync_week_month'),
					$syncWeekMonthSelect = $syncWeekMonthContainer.find('select'),
					$syncAnnualContainer = $container.find('.subscription_sync_annual'),
					$varSubField = $container.find('[name^="variable_subscription_payment_sync_date"]'),
					billingPeriod;

				if ($varSubField.length > 0) { // Variation
					var matches = $varSubField.attr('name').match(/\[(.*?)\]/);
					$subscriptionPeriodElement = $('[name="variable_subscription_period['+matches[1]+']"]');
				} else {
					$subscriptionPeriodElement = $('#_subscription_period');
				}

				billingPeriod = $subscriptionPeriodElement.val();

				if('day'==billingPeriod) {
					$syncWeekMonthSelect.val(0);
					$syncAnnualContainer.find('input[type="number"]').val(0);
				} else {
					if('year'==billingPeriod) {
						// Make sure the year sync fields are reset
						$syncAnnualContainer.find('input[type="number"]').val(0);
						// And the week/month field has no option selected
						$syncWeekMonthSelect.val(0);
					} else {
						// Make sure the year sync value is 0
						$syncAnnualContainer.find('input[type="number"]').val(0);
						// And the week/month field has the appropriate options
						$syncWeekMonthSelect.empty();
						$.each(WCSubscriptions.syncOptions[billingPeriod], function(key,description) {
							$syncWeekMonthSelect.append($('<option></option>').attr('value',key).text(description));
						});
					}
				}
			}
		},
		showHideSyncOptions: function(){
			if($('#_subscription_payment_sync_date').length > 0 || $('.wc_input_subscription_payment_sync').length > 0){
				$('.subscription_sync, .variable_subscription_sync').each(function(){ // loop through all sync field groups
					var $syncWeekMonthContainer = $(this).find('.subscription_sync_week_month'),
						$syncWeekMonthSelect = $syncWeekMonthContainer.find('select'),
						$syncAnnualContainer = $(this).find('.subscription_sync_annual'),
						$varSubField = $(this).find('[name^="variable_subscription_payment_sync_date"]'),
						$slideSwitch = false, // stop the general sync field group sliding down if editing a variable subscription
						billingPeriod;

					if ($varSubField.length > 0) { // Variation
						var matches = $varSubField.attr('name').match(/\[(.*?)\]/);
						$subscriptionPeriodElement = $('[name="variable_subscription_period['+matches[1]+']"]');
						if ($('select#product-type').val()=='variable-subscription') {
							$slideSwitch = true;
						}
					} else {
						$subscriptionPeriodElement = $('#_subscription_period');
						if ($('select#product-type').val()==WCSubscriptions.productType) {
							$slideSwitch = true;
						}
					}

					billingPeriod = $subscriptionPeriodElement.val();

					if('day'==billingPeriod) {
						$(this).slideUp(400);
					} else {
						if ( $slideSwitch ) {
							$(this).slideDown(400);
							if('year'==billingPeriod) {
								// Make sure the year sync fields are visible
								$syncAnnualContainer.slideDown(400);
								// And the week/month field is hidden
								$syncWeekMonthContainer.slideUp(400);
							} else {
								// Make sure the year sync fields are hidden
								$syncAnnualContainer.slideUp(400);
								// And the week/month field is visible
								$syncWeekMonthContainer.slideDown(400);
							}
						}
					}
				});
			}
		},
		moveSubscriptionVariationFields: function(){
			$('#variable_product_options .variable_subscription_pricing').not('wcs_moved').each(function(){
				var $regularPriceRow = $(this).siblings('.variable_pricing'),
					$trialSignUpRow  = $(this).siblings('.variable_subscription_trial_sign_up'),
					$saleDatesRow;

				$saleDatesRow = $(this).siblings('.variable_pricing');

				// Add the subscription price fields above the standard price fields
				$(this).insertBefore($regularPriceRow);

				$trialSignUpRow.insertBefore($(this));

				// Replace the regular price field with the trial period field
				$regularPriceRow.children(':first').addClass('hide_if_variable-subscription');

				$(this).addClass('wcs_moved');
			});
		},
		getVariationBulkEditValue: function(variation_action){
			var value;

			switch( variation_action ) {
				case 'variable_subscription_period':
				case 'variable_subscription_trial_period':
					value = prompt( WCSubscriptions.bulkEditPeriodMessage );
					break;
				case 'variable_subscription_period_interval':
					value = prompt( WCSubscriptions.bulkEditIntervalhMessage );
					break;
				case 'variable_subscription_trial_length':
				case 'variable_subscription_length':
					value = prompt( WCSubscriptions.bulkEditLengthMessage );
					break;
				case 'variable_subscription_sign_up_fee':
					value = prompt( woocommerce_admin_meta_boxes_variations.i18n_enter_a_value );
					value = accounting.unformat( value, woocommerce_admin.mon_decimal_point );
					break;
			}

			return value;
		},
		disableEnableOneTimeShipping: function() {
			var is_synced_or_has_trial = false;

			if ( 'variable-subscription' == $( 'select#product-type' ).val() ) {
				var variations = $( '.woocommerce_variations .woocommerce_variation' ),
					variations_checked = {},
					number_of_pages = $( '.woocommerce_variations' ).attr( 'data-total_pages' );

				$(variations).each(function() {
					var period_field = $( this ).find( '.wc_input_subscription_period' ),
						variation_index = $( period_field ).attr( 'name' ).match(/\[(.*?)\]/),
						variation_id = $( '[name="variable_post_id['+variation_index[1]+']"]' ).val(),
						period = period_field.val(),
						trial  = $( this ).find( '.wc_input_subscription_trial_length' ).val(),
						sync_date = 0;

					if ( 0 != trial ) {
						is_synced_or_has_trial = true;

						// break
						return false;
					}

					if ( $( this ).find( '.variable_subscription_sync' ).length ) {
						if ( 'month' == period || 'week' == period ) {
							sync_date = $( '[name="variable_subscription_payment_sync_date['+variation_index[1]+']"]' ).val();
						} else if ( 'year' == period ) {
							sync_date = $( '[name="variable_subscription_payment_sync_date_day['+variation_index[1]+']"]' ).val();
						}

						if ( 0 != sync_date ) {
							is_synced_or_has_trial = true;

							// break
							return false;
						}
					}

					variations_checked[ variation_index[1] ] = variation_id;
				});

				// if we haven't found a variation synced or with a trial at this point check the backend for other product variations
				if ( ( number_of_pages > 1 ||  0 == variations.size() ) && false == is_synced_or_has_trial ) {

					var data = {
						action:    'wcs_product_has_trial_or_is_synced',
						product_id: woocommerce_admin_meta_boxes_variations.post_id,
						variations_checked: variations_checked,
						nonce:      WCSubscriptions.oneTimeShippingCheckNonce,
					};

					$.ajax({
						url:  WCSubscriptions.ajaxUrl,
						data: data,
						type: 'POST',
						success : function( response ) {
							$( '#_subscription_one_time_shipping' ).prop( 'disabled', response.is_synced_or_has_trial );
							// trigger an event now we have determined the one time shipping availability, in case we need to update the backend
							$( '#_subscription_one_time_shipping' ).trigger( 'subscription_one_time_shipping_updated', [ response.is_synced_or_has_trial ] );
						}
					});
				} else {
					// trigger an event now we have determined the one time shipping availability, in case we need to update the backend
					$( '#_subscription_one_time_shipping' ).trigger( 'subscription_one_time_shipping_updated', [ is_synced_or_has_trial ] );
				}
			} else {
				var trial = $( '#general_product_data #_subscription_trial_length' ).val();

				if ( 0 != trial ) {
					is_synced_or_has_trial = true;
				}

				if ( $( '.subscription_sync' ).length && false == is_synced_or_has_trial ) {
					var period = $( '#_subscription_period' ).val(),
						sync_date = 0;

					if ( 'month' == period || 'week' == period ) {
						sync_date = $( '#_subscription_payment_sync_date' ).val();
					} else if ( 'year' == period ) {
						sync_date = $( '#_subscription_payment_sync_date_day' ).val();
					}

					if ( 0 != sync_date ) {
						is_synced_or_has_trial = true;
					}
				}
			}

			$( '#_subscription_one_time_shipping' ).prop( 'disabled', is_synced_or_has_trial );
		},
		showHideSubscriptionsPanels: function() {
			var tab = $( 'div.panel-wrap' ).find( 'ul.wc-tabs li' ).eq( 0 ).find( 'a' );
			var panel = tab.attr( 'href' );
			var visible = $( panel ).children( '.options_group' ).filter( function() {
				return 'none' != $( this ).css( 'display' );
			});
			if ( 0 != visible.length ) {
				tab.click().parent().show();
			}
		},
	});

	$('.options_group.pricing ._sale_price_field .description').prepend('<span id="sale-price-period" style="display: none;"></span>');

	// Move the subscription pricing section to the same location as the normal pricing section
	$('.options_group.subscription_pricing').not('.variable_subscription_pricing .options_group.subscription_pricing').insertBefore($('.options_group.pricing:first'));
	$('.show_if_subscription.clear').insertAfter($('.options_group.subscription_pricing'));

	// Move the subscription variation pricing section to a better location in the DOM on load
	if($('#variable_product_options .variable_subscription_pricing').length > 0) {
		$.moveSubscriptionVariationFields();
	}
	// When a variation is added
	$('#woocommerce-product-data').on('woocommerce_variations_added woocommerce_variations_loaded',function(){
		$.moveSubscriptionVariationFields();
		$.showHideVariableSubscriptionMeta();
		$.showHideSyncOptions();
		$.setSubscriptionLengths();
	});

	if($('.options_group.pricing').length > 0) {
		$.setSalePeriod();
		$.showHideSubscriptionMeta();
		$.showHideVariableSubscriptionMeta();
		$.setSubscriptionLengths();
		$.setTrialPeriods();
		$.showHideSyncOptions();
		$.disableEnableOneTimeShipping();
		$.showHideSubscriptionsPanels();
	}

	// Update subscription ranges when subscription period or interval is changed
	$('#woocommerce-product-data').on('change','[name^="_subscription_period"], [name^="_subscription_period_interval"], [name^="variable_subscription_period"], [name^="variable_subscription_period_interval"]',function(){
		$.setSubscriptionLengths();
		$.showHideSyncOptions();
		$.setSyncOptions( $(this) );
		$.setSalePeriod();
		$.disableEnableOneTimeShipping();
	});

	$('#woocommerce-product-data').on('propertychange keyup input paste change','[name^="_subscription_trial_length"], [name^="variable_subscription_trial_length"]',function(){
		$.setTrialPeriods();
	});

	$('body').bind('woocommerce-product-type-change',function(){
		$.showHideSubscriptionMeta();
		$.showHideVariableSubscriptionMeta();
		$.showHideSyncOptions();
		$.showHideSubscriptionsPanels();
	});

	$('input#_downloadable, input#_virtual').change(function(){
		$.showHideSubscriptionMeta();
		$.showHideVariableSubscriptionMeta();
	});

	// Make sure the "Used for variations" checkbox is visible when adding attributes to a variable subscription
	$('body').on('woocommerce_added_attribute', function(){
		$.showHideVariableSubscriptionMeta();
	});

	if($.getParameterByName('select_subscription')=='true'){
		$('select#product-type option[value="'+WCSubscriptions.productType+'"]').attr('selected', 'selected');
		$('select#product-type').select().change();
	}

	// Before saving a subscription product, validate the trial period
	$('#post').submit(function(e){
		if ( WCSubscriptions.subscriptionLengths !== undefined ){
			var trialLength = $('#_subscription_trial_length').val(),
				selectedTrialPeriod = $('#_subscription_trial_period').val();

			if ( parseInt(trialLength) >= WCSubscriptions.subscriptionLengths[selectedTrialPeriod].length ) {
				alert(WCSubscriptions.trialTooLongMessages[selectedTrialPeriod]);
				$('#ajax-loading').hide();
				$('#publish').removeClass('button-primary-disabled');
				e.preventDefault();
			}
		}
	});

	// Notify store manager that deleting an order via the Orders screen also deletes subscriptions associated with the orders
	$('#posts-filter').submit(function(){
		if($('[name="post_type"]').val()=='shop_order'&&($('[name="action"]').val()=='trash'||$('[name="action2"]').val()=='trash')){
			var containsSubscription = false;
			$('[name="post[]"]:checked').each(function(){
				if(true===$('.contains_subscription',$('#post-'+$(this).val())).data('contains_subscription')){
					containsSubscription = true;
				}
				return (false === containsSubscription);
			});
			if(containsSubscription){
				return confirm(WCSubscriptions.bulkTrashWarning);
			}
		}
	});

	$('.order_actions .submitdelete').click(function(){
		if($('[name="contains_subscription"]').val()=='true'){
			return confirm(WCSubscriptions.trashWarning);
		}
	});

	// Notify the store manager that trashing an order via the admin orders table row action also deletes the associated subscription if it exists
	$( '.row-actions .submitdelete' ).click( function() {
		var order = $( this ).closest( '.type-shop_order' ).attr( 'id' );

		if ( true === $( '.contains_subscription', $( '#' + order ) ).data( 'contains_subscription' ) ) {
			return confirm( WCSubscriptions.trashWarning );
		}
	});

	$(window).load(function(){
		if($('[name="contains_subscription"]').length > 0 && $('[name="contains_subscription"]').val()=='true'){
			// Show the Recurring Order Totals meta box in WC 2.2
			$('#woocommerce-order-totals').show();
		} else {
			$('#woocommerce-order-totals').hide();
		}
	});

	// Editing a variable product
	$('#variable_product_options').on('change','[name^="variable_regular_price"]',function(){
		var matches = $(this).attr('name').match(/\[(.*?)\]/);

		if (matches) {
			var loopIndex = matches[1];
			$('[name="variable_subscription_price['+loopIndex+']"]').val($(this).val());
		}
	});

	// Editing a variable product
	$('#variable_product_options').on('change','[name^="variable_subscription_price"]',function(){
		var matches = $(this).attr('name').match(/\[(.*?)\]/);

		if (matches) {
			var loopIndex = matches[1];
			$('[name="variable_regular_price['+loopIndex+']"]').val($(this).val());
		}
	});

	// Update hidden regular price when subscription price is update on simple products
	$('#general_product_data').on('change', '[name^="_subscription_price"]', function() {
		$('[name="_regular_price"]').val($(this).val());
	});

	// Notify store manager that deleting an user via the Users screen also removed them from any subscriptions.
	$('.users-php .submitdelete').on('click',function(){
		return confirm(WCSubscriptions.deleteUserWarning);
	});

	// WC 2.4+ variation bulk edit handling
	$('select.variation_actions').on('variable_subscription_sign_up_fee_ajax_data variable_subscription_period_interval_ajax_data variable_subscription_period_ajax_data variable_subscription_trial_period_ajax_data variable_subscription_trial_length_ajax_data variable_subscription_length_ajax_data', function(event, data) {
		bulk_action = event.type.replace(/_ajax_data/g,'');
		value = $.getVariationBulkEditValue( bulk_action );

		if ( 'variable_subscription_trial_length' == bulk_action ) {
			// After variations have their trial length bulk updated in the backend, flag the One Time Shipping field as needing to be updated
			$( '#_subscription_one_time_shipping' ).addClass( 'wcs_ots_needs_update' );
		}

		if ( value != null ) {
			data.value = value;
		}
		return data;
	});

	// We're on the Subscriptions settings page
	if($('#woocommerce_subscriptions_allow_switching').length > 0 ){
		var allowSwitching = $('#woocommerce_subscriptions_allow_switching').val(),
			$switchSettingsRows = $('#woocommerce_subscriptions_allow_switching').parents('tr').siblings('tr'),
			$syncProratationRow = $('#woocommerce_subscriptions_prorate_synced_payments').parents('tr'),
			$suspensionExtensionRow = $('#woocommerce_subscriptions_recoup_suspension').parents('tr');

		if('no'==allowSwitching){
			$switchSettingsRows.hide();
		}

		$('#woocommerce_subscriptions_allow_switching').on('change',function(){
			if('no'==$(this).val()){
				$switchSettingsRows.children('td, th').animate({paddingTop:0, paddingBottom:0}).wrapInner('<div />').children().slideUp(function(){
					$(this).closest('tr').hide();
					$(this).replaceWith($(this).html());
				});
			} else if('no'==allowSwitching) { // switching was previously disable, so settings will be hidden
				$switchSettingsRows.fadeIn();
				$switchSettingsRows.children('td, th').css({paddingTop:0, paddingBottom:0}).animate({paddingTop:'15px', paddingBottom:'15px'}).wrapInner('<div style="display: none;"/>').children().slideDown(function(){
					$switchSettingsRows.children('td, th').removeAttr('style');
					$(this).replaceWith($(this).html());
				});
			}
			allowSwitching = $(this).val();
		});


		// Show/hide suspension extension setting
		if ($('#woocommerce_subscriptions_max_customer_suspensions').val() > 0) {
			$suspensionExtensionRow.show();
		} else {
			$suspensionExtensionRow.hide();
		}

		$('#woocommerce_subscriptions_max_customer_suspensions').on('change', function(){
			if ($(this).val() > 0) {
				$suspensionExtensionRow.show();
			} else {
				$suspensionExtensionRow.hide();
			}
		});

		// Show/hide sync proration setting
		if ($('#woocommerce_subscriptions_sync_payments').is(':checked')) {
			$syncProratationRow.show();
		} else {
			$syncProratationRow.hide();
		}

		$('#woocommerce_subscriptions_sync_payments').on('change', function(){
			if ($(this).is(':checked')) {
				$syncProratationRow.show();
			} else {
				$syncProratationRow.hide();
			}
		});
	}

	// Don't display the variation notice for variable subscription products
	$( 'body' ).on( 'woocommerce-display-product-type-alert', function(e, select_val) {
		if (select_val=='variable-subscription') {
			return false;
		}
	});

	$('.wcs_payment_method_selector').on('change', function() {

		var payment_method = $(this).val();

		$('.wcs_payment_method_meta_fields').hide();
		$('#wcs_' + payment_method + '_fields').show();
	});

	// After variations have been saved/updated in the backend, flag the One Time Shipping field as needing to be updated
	$( '#woocommerce-product-data' ).on( 'woocommerce_variations_saved', function() {
		$( '#_subscription_one_time_shipping' ).addClass( 'wcs_ots_needs_update' );
	});

	// After variations have been loaded and if the One Time Shipping field needs updating, check if One Time Shipping is still available
	$( '#woocommerce-product-data' ).on( 'woocommerce_variations_loaded', function() {
		if ( $( '.wcs_ots_needs_update' ).length ) {
			$.disableEnableOneTimeShipping();
		}
	});

	// Triggered by $.disableEnableOneTimeShipping() after One Time shipping has been enabled or disabled for variations.
	// If the One Time Shipping field needs updating, send the ajax request to update the product setting in the backend
	$( '#_subscription_one_time_shipping' ).on( 'subscription_one_time_shipping_updated', function( event, is_synced_or_has_trial ) {

		if ( $( '.wcs_ots_needs_update' ).length ) {
			var data = {
				action: 'wcs_update_one_time_shipping',
				product_id: woocommerce_admin_meta_boxes_variations.post_id,
				one_time_shipping_enabled: ! is_synced_or_has_trial,
				one_time_shipping_selected: $( '#_subscription_one_time_shipping' ).prop( 'checked' ),
				nonce: WCSubscriptions.oneTimeShippingCheckNonce,
			};

			$.ajax({
				url:  WCSubscriptions.ajaxUrl,
				data: data,
				type: 'POST',
				success : function( response ) {
					// remove the flag requiring the one time shipping field to be updated
					$( '#_subscription_one_time_shipping' ).removeClass( 'wcs_ots_needs_update' );
					$( '#_subscription_one_time_shipping' ).prop( 'checked', response.one_time_shipping == 'yes' ? true : false );
				}
			});
		}
	});

	$( '#general_product_data, #variable_product_options' ).on( 'change', '[class^="wc_input_subscription_payment_sync"], [class^="wc_input_subscription_trial_length"]', function() {
		$.disableEnableOneTimeShipping();
	});
});
