<script>
function paypalsetting(str)
{ 
	if(document.getElementById('paypal_active').checked == true)
	{ 
		document.getElementById('manual_payment').checked = false;
		document.getElementById('paypal_settings').style.display = 'block';
		
	}else if(document.getElementById('paypal_active').checked == false)
	{
		document.getElementById('paypal_active').checked = false;
		document.getElementById('paypal_settings').style.display = 'none';
	}
	
}

function manualpayment(str)
{
	if(document.getElementById('manual_payment').checked == true)
	{
		document.getElementById('paypal_active').checked = false;
		document.getElementById('paypal_settings').style.display = 'none';
	}	
}


</script>

<h3>Payment Setup</h3>
<p>Here you can activate & setup payment options.</p>
<?php
 if(isset($_REQUEST['success']))
			 { ?>
			 	<?php	switch ($_REQUEST['success'])
					{
					 case "pay_updated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					 
					}
			}
			
$table_payment = $wpdb->prefix . "appointment_payment";
$payment_get_record = $wpdb->get_row("select * from $table_payment where pid ='1001'");
			

?>

<form action="#" method="post" name="payoptsetting_frm">
<table class="">
<tr>
<td>
<h4 class="dayback"><?php _e('Select the payment options','templatic');?> </h4>
<label class="payment_option">
 <input name="manual_payment" id="manual_payment" type="radio" value="0" onclick="manualpayment(this.value)" <?php if($payment_get_record->is_active == 0) {?> checked="checked" <?php } ?>/>  
 Manual Payment  </label>
     
 <label class="payment_option">
 <input name="paypal_active" id="paypal_active" type="radio" value="1" onclick="paypalsetting(this.value)" <?php if($payment_get_record->is_active == 1) {?> checked="checked"  /<?php } ?>/> 	 Paypal </label>

</td>
</tr>
<tr id="paypal_settings" style="display:none;">
<td>
	
	 <style>
    h2 { color:#464646;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
    font-size:24px;
    font-size-adjust:none;
    font-stretch:normal;
    font-style:italic;
    font-variant:normal;
    font-weight:normal;
    line-height:35px;
    margin:0;
    padding:14px 15px 3px 0;
    text-shadow:0 1px 0 #FFFFFF;  }
    </style>
  	<h2>Paypal Settings</h2>
	  <input type="text" name="payment_amount" id="payment_amount" value=" " size="50" style="visibility:hidden; display:none;" />
    <table cellpadding="5" class="widefat" width="100%" >
    <thead>
    <tr>
        <td width="35%">&nbsp;<?php _e('Paypal email address :','templatic'); ?></td>

        <td width="352"><input type="text" name="merchantid" id="merchantid" value="<?php _e($payment_get_record->marchant_id,'templatic');?> " size="50"  />
         <span class="spannote">  <?php _e('eg.: youraccount@gmail.com','templatic'); ?></span> </td>
      </tr>
      
   	<tr>
        <td>&nbsp;<?php _e('Currency :','templatic'); ?> </td>
        <td><input type="text" name="currency" id="currency" value="<?php _e($payment_get_record->currency,'templatic');?> " size="50"  />
         <span class="spannote"> <?php _e(' Example : USD, AUD, CAD, EUR','templatic'); ?></span> </td>
      </tr>
      
       
      <tr style="visibility:hidden; display:none;">
        <td><strong><?php _e('Status : ','templatic'); ?></strong></td>

        <td>
        <input type="text" name="paypal_isactive" id="paypal_isactive" value="1">
            
        </td>
      </tr>
      
      <tr>
        <td>&nbsp;<?php _e('Cancel URL :','templatic'); ?>   </td>
        <td><input type="text" name="cancel_url" id="cancel_url" value="<?php _e($payment_get_record->cancel_url,'templatic');?>" size="50"  />
        <span class="spannote">  <?php _e('eg. : http://mydomain.com/cancel_return.php ','templatic'); ?></span></td>

      </tr>
            <tr>
        <td>&nbsp;<?php _e('Return URL :','templatic'); ?> </td>
        <td><input type="text" name="return_url" id="rreturn_url" value="<?php _e($payment_get_record->return_url,'templatic');?> " size="50"  />
         <span class="spannote">  <?php _e('eg. : http://mydomain.com/return.php  ','templatic'); ?></span></td>
      </tr>
      <tr>

        <td><?php _e('Notify URL :','templatic'); ?>  </td>
        <td><input type="text" name="notify_url" id="notify_url" value="<?php _e($payment_get_record->notify_url,'templatic');?> " size="50"  />
        <span class="spannote">  <?php _e('eg. : http://mydomain.com/notifyurl.php','templatic'); ?></span> </td>
      </tr>
      
      
      <tr style="display:none;">

        <td>&nbsp;<?php _e('Payment done to name :','templatic'); ?></td>
        <td><input type="text" name="post_title" id="post_title" value="<?php _e($payment_get_record->post_title,'templatic');?> " size="50"  />
        <span class="spannote">  <?php _e('This name will appear on Paypal statement.','templatic'); ?></span> </td>
      </tr>
      
     
      
    </thead>
  </table>
</td>
</tr>

        <tr>
        <td> <span class="button_spacer6"><input type="submit" name="btn_payment" value="Save All Changes" class="button-framework-imp" />
 
          &nbsp;
          <input type="button" name="cancel" value="Cancel" class="button-framework action" /> </span></td>
      </tr>
</table>
	</form>

<?php
if(isset($_POST['btn_payment']))
{
	if(isset($_REQUEST['manual_payment']))
	{ $var = "";
		$payment_qry = $wpdb->query("UPDATE $table_payment SET `pay_amount` = '".$var."', `return_url` = '".$var."', `cancel_url` = '".$var."', `notify_url` = '".$var."', `post_title` = '".$var."', `marchant_id` = '".$var."', `currency` = '".$var."', `is_active` = '0' WHERE pid = 1001");
		if(mysql_affected_rows()> 0 )
		{
		echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=pay_updated#payment_setups';</script>";
		}
		
	}else if(isset($_REQUEST['paypal_active']) )
	{
		$table_payment = $wpdb->prefix . "appointment_payment";
		$amount = $_POST['payment_amount'];
		$rurl = $_POST['return_url'];
		$curl = $_POST['cancel_url'];
		$nurl = $_POST['notify_url'];
		$ptitle = $_POST['post_title'];
		$mer_id = $_POST['merchantid'];
		$isactive = $_POST['paypal_isactive'];
		$currency = $_POST['currency'];
		$payment_qry = $wpdb->query("UPDATE $table_payment SET `pay_amount` = '".$amount."', `return_url` = '".$rurl ."', `cancel_url` = '".$curl."', `notify_url` = '".$nurl."', `post_title` = '".$ptitle."', `marchant_id` = '".$mer_id."', `currency` = '".$currency."', `is_active` = '".$isactive."' WHERE pid = 1001");
		
		if(mysql_affected_rows()> 0 )
		{
		echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=pay_updated#payment_setups';</script>";
		}
		echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=pay_updated#payment_setups';</script>";
	}
}
?>