
jQuery(document).ready(function () {
	
	 jQuery('.submit').click(function(){
		  var validflag = true;
	
		//Name 
				
				if(jQuery('#name').val().trim()=="" ){
					$('#name').css({'border':'1px solid #FC5F1B'});
					$("#error").show();
					validflag = false;
				}
				else{
					$('#name').css({'color':'#fff'});
					$("#error").hide();
				}
				
		//Email
		
				if(jQuery('#email').val().trim() == ''){
					$('#email').css({'border':'1px solid #FC5F1B'});
					$("#error").show();
					validflag = false;
				}
				else{
					if(jQuery('#email').val()){
						var email=$("#email").val();
						if(!(email.match( /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/) )){
							$('#email').css({'border':'1px solid #FC5F1B'});
							validflag = false;
						}else{
							$('#email').css({'color':'#fff'});
							$("#error").hide();
						}
					}
				}	
		//Phone
				
				if(jQuery('#phone').val().trim()=="" ){
					$('#phone').css({'border':'1px solid #FC5F1B'});
					$("#error").show();
					validflag = false;
				}
				else{
					$('#phone').css({'color':'#fff'});
					$("#error").hide();
				}
				
					
		//Message
				if(jQuery('#message').val().trim()=="" ){
					$('#message').css({'border':'1px solid #FC5F1B'});
					$("#error").show();
					validflag = false;
				}
				else{
					$('#message').css({'color':'#fff'});
					$("#error").hide();
				}
		

					
				if(!validflag){
					return validflag;
				}else{
					jQuery('#ajaxLoader').show();
					sendquickMailFunc();
					return false;
				}	
	});
			 
			 // Focus and blure 
				jQuery('#name').focus(function(){
						$(this).css({'border-color':'#000000'});
						$("#error").hide();
				});
				
				jQuery('#name').blur(function(){
					
						$(this).css({'border-color':'#e2e2e2'});
					
				});
				
	
								
				jQuery('#email').focus(function(){
					
						$(this).css({'border-color':'#000000'});
						$("#error").hide();
				});
				jQuery('#email').blur(function(){
						$(this).css({'border-color':'#e2e2e2'});
					
				});
				
				jQuery('#phone').focus(function(){
					
						$(this).css({'border-color':'#000000'});
						$("#error").hide();
				});
				jQuery('#phone').blur(function(){
						$(this).css({'border-color':'#e2e2e2'});
					
				});
				
			 
				jQuery('#message').focus(function(){
						$(this).css({'border-color':'#000000'});
						$("#error").hide();
				});
				
				jQuery('#message').blur(function(){
					
						$(this).css({'border-color':'#e2e2e2'});
					
				});									
});


function sendquickMailFunc(){
	
				var data = $("#contact-form").serialize()+'&contactform=submit';
				$.post('quick_enquiry.php', data).done(function(response) {	
					if(response == 1) {
						//alert("Thank you for Enquiry");
						$("#contact-form")[0].reset();
						 var oldcolor = $("#quicksubmit").css('color');
						 $("#result").css({'display':'block','color':'#008000'});
						 $("#result").text('Thank you for your message. It has been sent.');
						 jQuery('#ajaxLoader').hide();
						 setTimeout(function(){ $("#quicksubmit").val('Submit');
						 $("#quicksubmit").css('color',oldcolor);
						 $("#result").css('display','none');}, 10000);
					}
					else {
						$("#contact-form")[0].reset();
						var oldcolor = $("#quicksubmit").css('color');
						$("#result").css({'display':'block','color':'#ff0000'});
						$("#result").text('One or more fields have an error. Please check and try again.');
						jQuery('#ajaxLoader').hide();
						 setTimeout(function(){ $("#quicksubmit").val('Submit');
						 $("#quicksubmit").css('color',oldcolor);
						  $("#result").css('display','none');}, 2000);		
						}
				});
																						
			}

