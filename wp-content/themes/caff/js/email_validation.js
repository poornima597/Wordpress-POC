jQuery(document).ready(function(){ 
    jQuery("#contact_submit").click(function(e){
    e.preventDefault();
      var name =  jQuery("#name_1").val();
      var phone =  jQuery("#phone_1").val();
      var email =  jQuery("#email_1").val();
      var city =  jQuery("#city_1").val();
      var company =  jQuery("#company_1").val();
      var message =  jQuery("#message_1").val();
      var ajaxUrl =  jQuery("#ajaxUrl").val();
      var select_type =  "test select sdfsdf";
      
      var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
      var phonepattern = /^[0-9]*$/;
      console.log(phone,phonepattern.test(phone));
      console.log(email,pattern.test(email));
      if(name !="" && phone!="" && email!=""){
        jQuery('#name_error').text('');
        jQuery('#email_error').text('');
        jQuery('#phone_error').text('');
        if(pattern.test(email) && phonepattern.test(phone)){
            jQuery('#name_error').text('');
            jQuery('#email_error').text('');
            jQuery('#phone_error').text('');
            var data = {
                'action': 'siteWideMessage',
                'name': name,
                'email': email,
                'phone': phone,
                'select_type': select_type,
                'message': message,
                
            };

            
            jQuery.post(ajaxUrl, data, function(response) {
                jQuery("#displayform").text('Your message has been sent successfully to your email id.');
                jQuery("#displayform").css("display","block");
                jQuery("#name_1").val('');
                jQuery("#phone_1").val('');
                jQuery("#email_1").val('');
                jQuery("#message_1").val('');
            });
           
        }else{
            if(!pattern.test(email)){
                jQuery('#email_error').text('The e-mail address entered is invalid.');
            }
            if(!phonepattern.test(phone)){
                jQuery('#phone_error').text('The phone entered is invalid.');
            }
        }
      }else{
        if(name ==""){
            jQuery('#name_error').text('The field is required.');
        }
        if(phone ==""){
            jQuery('#phone_error').text('The field is required.');
        }
        if(email ==""){
            jQuery('#email_error').text('The field is required.');
        }
      }

    });

});