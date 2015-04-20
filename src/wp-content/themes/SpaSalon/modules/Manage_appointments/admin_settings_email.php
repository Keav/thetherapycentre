<style>
td{
 vertical-align:top;	
}
</style>
<?php 
register_activation_hook(_FILE_, "appointment_email_setup");
echo appointment_email_setup();


function appointment_email_setup()
{ 
		global $wpdb; 
		$tablename = $wpdb->prefix."appointment_email";
		$appoint_email = "select * from $tablename";
		$apppoint_emailinfo = $wpdb->get_row($appoint_email);
 	?>
<div class='headerdivh3'>
	<h3><?php _e('Email Setup','templatic');?></h3>
    <p><?php _e('Here you can set up admin email and notification mails delivered to your clients.','templatic');?></p>                     
</div>
<div style="padding:10px;">
			
			<?php  if(isset($_REQUEST['success']))
			 { ?>
			 	<?php	switch ($_REQUEST['success'])
					{
					 case "eupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					}
			}?>     
	<form action="#" method="post">
	  
		<table width="100%" border="0" class="email_setup">
        	<thead>
	     	<tr>
	        <td><?php  _e('Email :','templatic');  ?></td>
	        <td>  
            	<input name="txtadminemail" id="txtadminemail" type="text" value="<?php echo html_entity_decode($apppoint_emailinfo->email); ?>">
	          <span class="spannote" ><?php _e('Please enter the Admin email ID (Email to users will be sent through this email ID).','templatic'); ?></span>
             </td>
	        </tr>
            
            </thead>
            </table>
            
            <h4 class="dayback"><?php  _e('Booking Request Sent Notification Email ','templatic');  ?></h4>
            <table width="100%" border="0" class="email_setup">
        	<thead> <tr>
              <td width="20%"><?php _e('Subject :','templatic');  ?></td>
              <td><input name="txtrequest_mail_subject" id="txtrequest_mail_subject" type="text" value="<?php echo html_entity_decode($apppoint_emailinfo->request_email_sub); ?>" /></td>
            </tr>
            <tr>
             <td>
           <?php  _e('Email :','templatic');?>
            </td>
                <td>
               	 <textarea name="txtemailreq" id="txtemailreq" cols="60" rows="10"> <?php echo html_entity_decode($apppoint_emailinfo->request_email); ?></textarea>
                    <span class="spannote">Specify the message which user will receive after clicking on Submit button of Booking form</span>
                </td>
            </tr>
            </thead>
            </table>
            
            <h4 class="dayback"><?php  _e('Booking Accepted Acknowledgement Email  ','templatic');  ?></h4>
            <table width="100%" border="0" class="email_setup">
        	<thead>
         	<tr>
              <td width="20%"><?php _e('Subject:','templatic');  ?></td>
              <td><input name="txtactive_mail_subject" id="txtactive_mail_subject" type="text" value="<?php echo html_entity_decode($apppoint_emailinfo->active_email_sub); ?>" /></td>
            </tr>
             <tr>
            <td>
           <?php _e('Email:','templatic'); ?>
            </td>
                <td>
               	 <textarea name="txtemailactivate" id="txtemailactivate" cols="60" rows="10"><?php echo html_entity_decode($apppoint_emailinfo->active_email); ?> </textarea>
                    <span class="spannote" >Specify the message which user will get after Admin accepts his/her booking.</span>
                </td>
            </tr>
            </thead>
            </table>
            
            
            <h4 class="dayback"><?php  _e('Booking Rejected Acknowledgement Email','templatic');  ?></h4>
            <table width="100%" border="0" class="email_setup">
        	<thead>
             <tr>
              <td width="20%"><?php _e('Subject :','templatic');  ?></td>
              <td><input name="txtreject_mail_subject" id="txtreject_mail_subject" type="text" value="<?php echo html_entity_decode($apppoint_emailinfo->cancel_email_sub); ?>" /></td>
            </tr>
             <tr>
            <td>
            <?php _e('Email :','templatic'); ?>
            </td>
                <td>
               	 <textarea name="txtemailcancel" id="txtemailcancel" cols="60" rows="10"><?php echo html_entity_decode($apppoint_emailinfo->cancel_email); ?> </textarea>
                    <span class="spannote" >Specify the message which user will get after cancellation of his/her booking.</span>
                </td>
            </tr>
         
	      <tr>
	        <td colspan="2">
            
            <input name="txtupdateeid" id="txtupdateeid" type="hidden" value="<?php echo $apppoint_emailinfo->eid; ?>">
            <div class="button_spacer4"><input name="submitemailchanges" id="submitemailchanges" type="submit" class="button-framework-imp" value="Save all changes"></div></td>
	       </tr>
           </thead>
        </table>
  </form>
</diV>	
<?php }

?>
<?php
            if(isset($_POST['submitemailchanges']))
            {          
                        global $wpdb; 
                        $table_name = $wpdb->prefix . "appointment_email";
                        $email = $_POST['txtadminemail'];
						$remail_sub = $_POST['txtrequest_mail_subject'];
                        $remail = $_POST['txtemailreq'];
						$aemail_sub = $_POST['txtactive_mail_subject'];
                        $aemail = $_POST['txtemailactivate'];
						$cemail_sub = $_POST['txtreject_mail_subject'];
                        $cemail = $_POST['txtemailcancel'];
                        
                        $updateemail = $_POST['txtupdateeid'];
						 
                        $cer= "Update $table_name SET email ='".$email."',request_email='".htmlentities($remail)."',active_email ='".htmlentities($aemail)."',cancel_email='".htmlentities($cemail)."' where eid='".$_POST['txtupadteid']."'";
						
                     	$sqlupdateemail= $wpdb->query("Update $table_name SET email ='".$email."',request_email_sub='".$remail_sub."',request_email='".$remail."',active_email_sub ='".$aemail_sub."',active_email ='".$aemail."',cancel_email_sub='".$cemail_sub."',cancel_email='".$cemail."' where eid='".$updateemail."'"); 
                        echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=eupdated#email_setups';</script>";
            }
?>