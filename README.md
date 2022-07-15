# Writing a WordPress Custom SMTP and Custom Email
The simplest method to do this is to add it to a fresh custom SMTP with a unique email design. Download and install wordpress and start doing this.

## Step 1 - Configuration

Copy and paste below code in wp-config.php file. Give your email id in the 'SMTP_USERNAME' and 'SMTP_TO_ADDRESS' and password in the 'SMTP_PASSWORD'.

<pre>
define('SMTP_HOST', 'smtp.office365.com');

define('SMTP_USERNAME', 'xxxxxxxxxxx@xxxxx.xxx');

define('SMTP_TO_ADDRESS', 'xxxxxxxxxxx@xxxxx.xxx');

define('SMTP_PASSWORD', 'xxxxxxxxxxxx');
</pre>

I am using 'Office365'. If you want you use it as google account also. 


## Step 2 - SMTP Custom Code

Copy and paste below code in function.php

<pre>
use PHPMailer\PHPMailer\PHPMailer;
include(get_stylesheet_directory().'/contact.php');

add_action( 'phpmailer_init', 'smtp_mailer_config_new', 10, 1);
function smtp_mailer_config_new(PHPMailer $mail){
    $mail->IsSMTP();  // Telling the class to use SMTP
    $mail->SMTPDebug = 2;
    $mail->Mailer = "smtp";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = gethostbyname(SMTP_HOST);
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true; // Turn ON SMTP authentication
    $mail->Username = SMTP_USERNAME; // SMTP Username
    $mail->Password = SMTP_PASSWORD; // SMTP Password
    $mail->From = SMTP_USERNAME; // SMTP 
    $mail->Priority = 1;
}

add_action('wp_mail_failed', 'smtplog_mailer_errors', 10, 1);

function smtplog_mailer_errors( $wp_error ){ 
 print_r( $wp_error->get_error_message());
} 
add_shortcode('mailtest_sc','mailtest_code');

//add js for email contact form
function custom_schedule_js()
{    
    wp_enqueue_script( 'email_validation.js', get_stylesheet_directory_uri().'/js/email_validation.js', array( 'jquery'), '1.0.0', true );
    wp_localize_script( 'email_validation.js', 'Myajax', array(
   'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'custom_schedule_js' );
 
add_action('wp_ajax_siteWideMessage', 'siteWideMessage');
add_action( 'wp_ajax_nopriv_siteWideMessage', 'siteWideMessage' );

function get_email_body_content() {
// Below you can your email html template Code
    $body = 'Implementation of custom email
    <br>
    <br>
    From: '.$_POST["name"].'<br>
    Phone Number: '.$_POST["phone"].'<br>
    Email: '.$_POST["email"].'<br>
    Message: '.$_POST["message"].'<br>
    <br>
    -- <br>
    This e-mail was sent from a contact form on '.$site_title.' ('.$site_url.')';
    return $body;
}
function siteWideMessage() {
   
    if ( empty( $_POST["name"] ) ) {
        echo "Insert your name please";
        wp_die();
    }
 
    if ( empty( $_POST["email"]) ) {
        echo 'Insert your email please';
        wp_die();
    }

    $site_title = get_bloginfo( 'name' );
    $site_url = get_bloginfo( 'url' );
    $to = $_POST["email"]; //sendto@example.com
    $subject = 'PV Cafe';
    $body = get_email_body_content();
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: <'.SMTP_USERNAME.'>';
    wp_mail( $to, $subject, $body, $headers );
    
   
    wp_die();
}
</pre> 



## Step 3 - Creating new template page
Create Contact.php file and paste it below code. The below given is contact form which is used to show in frontend.

```php
<pre>
<?php 
/* Template Name: Contact Form */ 

function mailtest_code(){   
 ?>

<div class="contactpage-form" id="contactform1">
    <form method="post"  class=""  data-status="init" > 
        <div id="displayform" class="alert alert-info" style="display:none"> </div>       
        <div class="row mb-4">
            <div class="col-sm-12">
                <label>Name</label>
                <span class="">
                    <input type="text" name="your-name" id="name_1" class="" placeholder="Name*" >
                </span>
                <span id="name_error" class="error_msg" aria-hidden="true"></span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12">
                <label>Phone Number</label>
                <span class="">
                    <input type="tel" name="phone-number" id="phone_1" class="" placeholder="Phone Number*"  maxlength="10" >
                 </span>
                <span id="phone_error" class="error_msg" aria-hidden="true"></span>                
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 input">
                <label>Email</label>
                <span class="">
                    <input type="email" name="your-email" id="email_1" class="" placeholder="Email*" >                    
                </span> 
                <span id="email_error" class="error_msg" aria-hidden="true"></span>
            </div>
        </div>        
        <div class="row mb-4">
            <div class="col-sm-12">
                <label>Message</label>
                <span class="">
                    <textarea name="your-message" id="message_1" cols="40" rows="10" class="" placeholder="Message"></textarea>
                </span>
                <span id="message_error" class="error_msg" aria-hidden="true"></span>
            </div>
        </div>
        <input type="hidden" value="<?php echo admin_url("admin-ajax.php") ?>" id="ajaxUrl"/>
        <button type="button" name="submitinvest" class="" id="contact_submit">Submit</button>        
    </form>
</div> 
<?php
}
?>

</pre>
```php

## Step 4 - Creating one page in WP-Admin
Creating the contact us page in the wp-admin and paste the shortcode given below. Give the Contact page link to the Contact Menu.
<pre>
[mailtest_sc]
</pre>



## Step 5 - Adding validation for form
Copy and paste the below code as creating as new file email_validation.js. You to include the file in function.php, code is given in step 2.
<pre>
jQuery(document).ready(function(){ 
    jQuery("#contact_submit").click(function(e){
    e.preventDefault();
      var name =  jQuery("#name_1").val();
      var phone =  jQuery("#phone_1").val();
      var email =  jQuery("#email_1").val();
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
</pre>



## Step 6 - Sending Mail
Now you can send mail by using the frontend form.