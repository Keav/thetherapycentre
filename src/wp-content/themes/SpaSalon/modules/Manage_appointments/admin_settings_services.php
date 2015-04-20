<style>
td{
 font-size:12px;
 padding:2px;
}
</style><?php

register_activation_hook(_FILE_, "appointment_services_add");


register_activation_hook(_FILE_, "appointment_services_list");


if(isset($_REQUEST['success']))
			 { ?>
			 	<?php	switch ($_REQUEST['success'])
					{
					 case "supdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					  case "sinserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Inserted successfully
                     </div>";
					 break;
					  case "sdeleted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Deleted successfully
                     </div>";
					 break;
					 
					 case "serror" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'><strong>Position :</strong>Must be Numeric<br/><strong>Appointment fees:</strong> Must be numeric<br/></div>";
					 break;
					 }
} 

echo appointment_services_add();
function appointment_services_add()
{ 
		if((!isset($_REQUEST['edit_service'])) && (!isset($_REQUEST['addservice'])))
		{							 
			echo appointment_services_list();
		}
	    if( (isset($_REQUEST['addservice']) || isset($_REQUEST['edit_service'])))
		{
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_services";
			$editdata = "SELECT * FROM $table_name where sid='".$_REQUEST['edit_service']."' ";
			$sqledit	 =  $wpdb->get_row($editdata);
?>
 		
       
 			 <div class='headerdivh3'>
						<h3><?php _e('Add new Service','templatic');?></h3>
                        <div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
						<a href="?page=Appointment#appointment_services" name="btnviewlisting" class="button-primary"/><?php _e('View Listing','templatic'); ?></a>
                     </div>
                     <p>Here you can add a new service.</p>
			</div>
            
            <form action="#" method="post" id="frm_appointment_services" onsubmit="frmservicesubmit()">
              <table width="80%" border="0">
              	<thead>
              	<tr>
                    <td><?php _e('Service :','templatic'); ?></td>
                    <td><input name="txtservices" id="txtservices" type="text" value="<?php echo $sqledit->servicename; ?>"></td>
                    </tr>
                  <tr>
                    <td><?php _e('Description :','templatic'); ?></td>
                    <td><textarea name="txtservicedescription" id="txtservicedescription" cols="60" rows=""><?php echo $sqledit->ser_description; ?> </textarea></td>
                   </tr>
                   <tr>
                    <td><?php _e('Position :','templatic'); ?></td>
                    <td><input type="text" name="txtserposition" id="txtserposition" value="<?php echo $sqledit->ser_position; ?>" onKeypress="validserposition()" > 
                      <div id="serpositionInfo" class="noerror"> <?php _e('Position Must be numeric.','templatic'); ?> </div>
                    <span class="spannote"><?php _e('Position of this service in form (eg. 1,2,3)','templatic'); ?></span>
                   
                     </td>
                   </tr>
                   <?php  $paymentupdsql = "select option_value from $wpdb->options where option_name ='payment_method_paypal'";
							$paymentupdinfo = $wpdb->get_results($paymentupdsql);
							if($paymentupdinfo){
								foreach($paymentupdinfo as $paymentupdinfoObj)	{
									$option_value = unserialize($paymentupdinfoObj->option_value);
									$isactive = $option_value['isactive'];
									$option_value_str = serialize($option_value);
								}
							}
								 ?>
                    <tr>
                    <td><?php _e('Booking fees :','templatic'); ?></td>
                    <td><input type="text" name="txtappointmentfees" id="txtappointmentfees" value="<?php echo $sqledit->apt_fees; ?>" onkeypress="validserfees()" > 
                    <div id="serfeesInfo" class="noerror"> <?php _e('Please enter numeeric values.','templatic'); ?> </div>
                    <span class="spannote"><?php if($payment_get_record->is_active == '0'){ _e('Before entering fees above, activate payment options from <b>Payment setup.</b> ','templatic'); }else{_e('Enter an amount to fix booking','templatic');} ?></span>
                    
                     </td>
                   </tr>
                  <?php ?> 
                  <tr>
                    <td colspan="2">
                     
					 <div class="button_spacer"><?php if($_REQUEST['edit_service']) {?>
                           <input type="hidden" name="txtserviceupadteid" id="txtserviceupadteid" accept="" value="<?php echo $_REQUEST['edit_service']; ?>">
                           <input type="submit" name="btnserupdate" id="btnserupdate" class="button-framework-imp" value="Update" />&nbsp;
                     <?php }else{ ?> 
                    <input name="btnsersave" id="btnsersave" type="submit" value="Save" class="button-framework-imp">
                    
                    <?php } ?>
                     <input name="btnsercancel" id="btncancel" type="submit" class="button-framework" value="Cancel"> 
                     
                     </div>
                    </td>
                </tr>
                </thead>
              </table>
          </form>
       
	
<?php }}
function appointment_services_list()
{
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_services";
			$sqlselectser="SELECT * FROM $table_name order by sid ";	
			$sqlselectser1 = $wpdb->get_results($sqlselectser);
			?>                 
            <div >
            <div class='headerdivh3'>
						<h3><?php _e('Services','templatic');?></h3>
                        <div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
						 <a href="?page=Appointment&addservice=true#appointment_services" class="button-primary"> 
                     <?php _e('Add Service','templatic'); ?></a>
                     </div>
                     <p> Here you can add, edit and manage services that you wish to offer. They will be listed in booking section. </p>
			</div>
            
            <table class="widefat" width="90%" cellspacing="5">
            	<thead>
            <tr>
                <th>
              	<?php _e('Service name','templatic'); ?>
                </th>
                 <th>
              	 <?php _e('Description','templatic'); ?>
                </th>
                  <th>
              	<?php _e('Position','templatic'); ?>
                </th>
                 <th>
                <?php _e('Action','templatic'); ?>
                
                </th>
             </tr>
            <?php
			foreach ($sqlselectser1 as $servicedata)
			{?>
				<tr>
                <td>
                <?php  _e($servicedata->servicename,'templatic'); ?>
                </td>
                <td>
                <?php _e($servicedata->ser_description,'templatic'); ?>
                </td>
                 <td>
                <?php _e($servicedata->ser_position,'templatic'); ?>
                </td>
               
                 <td>
                 <a href="javascript:void(0);showservice('<?php _e($servicedata->sid,'templatic');?>');" title="View details"><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-right:5px;" /></a>  
                 <a href="?page=Appointment&edit_service=<?php echo $servicedata->sid."#appointment_services"; ?>" title="Edit"><img src="<?php echo get_template_directory_uri(); ?>/images/edit.png" alt="reject" border="0" style="padding-left:5px;" /></a>  
                 <a href="javascript:void(0);"  onclick="return delete_ser('<?php _e($servicedata->sid,'tempaltic');?>');" title="Delete"><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:8px;" /></a></td>
                </tr>
                <tr style=" display:none" id="service_<?php _e($servicedata->sid,'templatic');?>">
                        <td colspan="4">
                            <table width="100%" style="background-color:#eee;">
                             <tbody>
                              <tr>
                                <td><?php _e('Service :','templatic')?><strong><?php _e($servicedata->servicename,'templatic') ?></strong></td>
                                <td><?php _e('Description :','templatic')?> <strong><?php _e($servicedata->ser_description,'templatic');?></strong></td>
                                <td><?php _e('Position :','templatic')?> <strong><?php _e($servicedata->ser_position,'templatic'); ?></strong></td>
                              </tr> 
                               <?php  $table_payment = $wpdb->prefix . "appointment_payment";
						 			 $payment_get_record = $wpdb->get_row("select * from $table_payment where pid ='1001'"); 
									 if($payment_get_record ->is_active == '1'){?>
                                     <tr>
                                     <td>
                                     <?php _e('Booking fees :','templatic')?><strong><?php _e($servicedata->apt_fees,'templatic'); ?></strong>
                                     </td>
                                     </tr>
                                    <?php } ?>
                             
                           </tbody>
                          </table>
                        </td>
                 </tr>
			<?php }
			?>
            	</thead>
			</table>
            
            <div style="margin:10px 0;">
            
            
            <table border="0">
            <tr>
            	<td colspan="2" style="border-bottom:1px solid #ccc;"><strong>Legend:</strong> </td>
            </tr>
            <tr>
            	<td></td>
            </tr>
            <tr><td width="30px"><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('View details of a service','templatic'); ?></td></tr>
			 <tr>
              <td><a href="?page=Appointment&amp;edit_service=<?php echo $servicedata->sid."#appointment_services"; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/edit.png" alt="reject" border="0" style="padding-left:5px;" /></a></td><td><?php _e('Edit a a service','templatic'); ?></td></tr>
             <tr><td><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('Delete a service','templatic'); ?></td></tr>
            
            </table>
            </div>
            
            </div>
<?php
}
		if(isset($_POST['btnserupdate']))
		{ 
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_services";
			$services = $_POST['txtservices'];
			$servicedescription = $_POST['txtservicedescription'];
			$serposition = $_POST['txtserposition'];
			$payfees = $_POST['txtappointmentfees'];
		    $supdate = $_POST['txtserviceupadteid'];
			if(is_numeric($payfees) || is_numeric($serposition))
			{
				$sqlupdate= $wpdb->query("Update $table_name SET servicename ='".$services."',ser_description='".$servicedescription."',ser_position ='".$serposition."',apt_fees = '".$payfees."' WHERE sid='".$supdate."'"); 
				if(mysql_affected_rows() >0)
				{
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=supdated#appointment_services';</script>";
				}
			}else{
				echo "<script language='javascript'>frmservicesubmit();</script>";
			}
		}elseif(isset($_POST['btnsersave']))
		{  
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_services";
			$services = $_POST['txtservices'];
			$servicedescription = $_POST['txtservicedescription'];
			$serposition = $_POST['txtserposition'];
			$payfees= $_POST['txtappointmentfees'];
		    $supdate = $_POST['txtserviceupadteid'];
			
			if(is_numeric($payfees) || is_numeric($serposition))
			{
			$sqlinsert="INSERT INTO $table_name(sid,servicename,ser_description,ser_position,apt_fees) VALUES('', '".$services."', '".$servicedescription."','".$serposition."','".$payfees."') ";	
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sqlinsert);
			echo "<script language='javascript'>frmservicesubmit(); location.href='admin.php?page=Appointment&success=sinserted#appointment_services';</script>";
			}else{
				echo "<script language='javascript'>frmservicesubmit();</script>";
			}
         
		}elseif(isset($_REQUEST['deleteservice']))
		{
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_services";
			$sqldelete= $wpdb->query("delete from $table_name where sid = '".$_REQUEST['deleteservice']."'");
		    echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=sdeleted#appointment_services';</script>";
		}
		
		if(isset($_POST['btnsercancel']))
		{
			echo "<script language='javascript'> location.href='admin.php?page=Appointment&addservice=true#appointment_services';</script>";
		}
?>
<script language="javascript">
function delete_ser(sid)
{
	if(confirm("Are you sure you wanr to delete this field ?"))
	{
		location.href ="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=Appointment&deleteservice='?>"+sid+"<?php _e('#appointment_services','templatic'); ?>";
		return true;
	}else
	{
		return false;
	}
}
</script>