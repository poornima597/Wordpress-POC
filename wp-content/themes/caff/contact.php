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
