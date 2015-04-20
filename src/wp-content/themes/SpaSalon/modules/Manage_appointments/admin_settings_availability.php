<?php
	echo admin_availability_setup();

	
	
function admin_availability_setup()
{ 

			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_availability";
			$sqlavailable ="SELECT * FROM $table_name where aid='1'";	
			$sqleditavailable = $wpdb->get_row($sqlavailable);

?>

<?php if(isset($_REQUEST['success']))
			 { 
			 		switch ($_REQUEST['success'])
					{
					 case "aupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					  case "ainserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Record Inserted successfully
                     </div>";
					 break;
					  case "adeleted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Information Deleted successfully
                     </div>";
					 break;}
			}?>  
             <div class='headerdivh3'>
						<h3><?php _e('Set Availability/day','templatic');?></h3>
                        
                     <p>Here you can specify the availability of the booking.</p>
			</div>

 <form action="#" method="post" id="frm_availability" name="frm_availability">         
  <table width="80%" border="0">
  <thead>
  <tr>
    <td colspan="6"></a>        
      </td>
  </tr>
  <tr>
    <td width="20%"><?php _e('Time Interval :','templatic'); ?></td>
    <td colspan="4">
      <input type="text" name="txtavaragetime" id="txtaveragetime" value="<?php _e($sqleditavailable->average_time,'templatic'); ?>" /> 
      <span class="spannote"><?php _e('Set average time of each appointment (eg. 1, 2, 3...). Default time is 1 hour.','templatic'); ?></span>  
      </td>
    
  </tr>
  <tr>
    <td><?php _e('Time : ','templatic'); ?></td>
    <td style="width:30px;">
      <?php _e('From:','templatic');?></td>
      <td style="width:100px;">
	 <select name="openingtime" id="openingtime" style="width:70px;">
      <?php  _e(time_format($sqleditavailable->timefrom),'templatic'); ?>
	  </select></td>
      <td style="width:30px;">       
	 <?php _e('To:','templatic'); ?></td>
     <td>
     <select name="closingtime" id="closingtime" style="width:70px;">
     <?php  _e(time_format($sqleditavailable->timeto),'templatic') ?> 
     </select>  
    
     </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><span class="spannote"><?php _e('Set availability time.','templatic'); ?></span></td>
    <td>
    </td>
  </tr>
  <tr>
    <td colspan="6"><span class="button_spacer5"> <?php if($_REQUEST['edit_availability']) {?>
                           <input type="hidden" name="txtupdateaid" id="txtupdateaid" accept="" value="<?php echo $_REQUEST['edit_availability']; ?>">
                           <input type="submit" name="updateavailability" id="updateavailability" value="Update" class="button-framework-imp" />&nbsp;
                            <input type="submit" name="cancelavailability" id="cancelavailability" value="Cancel" class="button-framework">
                     <?php }else{ ?> 
                    <input type="submit" name="saveavailability" id="saveavailability" value="Save All Changes" class="button-framework-imp" onclick="update_closebox()">
                     <input type="submit" name="cancelavailability" id="cancelavailability" value="Cancel" class="button-framework">
                    <?php } ?></span> </td>
  			</tr>
  	</thead>
</table>
</form>
<?php }

register_activation_hook(_FILE_, "admin_availability_setup");
register_activation_hook(_FILE_, "time_format");

function appointment_availability_list()
{
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_availability";
			$sqlselectser="SELECT * FROM $table_name order by sid ";	
			$sqlselectser1 = $wpdb->get_results($sqlselectser);
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
					 
					 break;}
			} 
              if(isset($_REQUEST['error']))
			 { ?>
			 	<?php switch ($_REQUEST['error'])
					{
					 case "service" : echo "<div id='submitedsuccess' class='error'>Please select services
                     </div>";
					 break;
					}
					
			}?>
            <div class='headerdivh3'>
						<h3><?php _e('List of Availability of Services','templatic');?></h3>
                        <div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
						 <a href="?page=Appointment&addavailability=true#availability_setup"  class="button-primary"> <?php _e('Add Availability','templatic'); ?></a>
                     </div>
                     <p>Here you can manage the date and time when the particular services are available.  </p>
			</div>
<?php }

function selectservices($serviceid)
{
			global $wpdb;
			$table_services = $wpdb->prefix . "appointment_services";
			$editdata = "SELECT * FROM $table_services where sid='".$serviceid."' ";
			$sqledit	 =  $wpdb->get_row($editdata);
			_e($sqledit->servicename,'templatic');
	
}
if(isset($_REQUEST['saveavailability']))
{
	global $wpdb;
	
	$averagetime = $_POST['txtavaragetime'];
	$timefrom = $_POST['openingtime'];
	$timeto = $_POST['closingtime'];
	$status = "1";
	$table_availability = $wpdb->prefix."appointment_availability";
	$sqlupdate= $wpdb->query("Update $table_availability SET average_time='".$averagetime."',timefrom ='".$timefrom."',timeto ='".$timeto."',status='1' WHERE aid='1'"); 
	$table_bhours = $wpdb->prefix."appointment_bhours";
	$sqlupdate_bhours= $wpdb->query("Update $table_bhours SET timefrom='".$timefrom ."',timeto='".$timeto."' WHERE  bid='1' or bid='2' or bid= '3' or bid='4' or bid='5' or bid='6' or bid='7'"); 
	$sqlupdate_chours = $wpdb->query("Update $table_bhours SET timefrom='".$timefrom ."',timeto='".$timeto."' WHERE  bid='1' or bid='2' or bid= '3' or bid='4' or bid='5' or bid='6' or bid='7'"); 
	
	if(mysql_affected_rows() >0)
	{
		 echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=aupdated#availability_setup';</script>";	
	}
}

if(isset($_POST['cancelavailability']))
{
	global $wpdb;
	echo "<script language='javascript'> location.href='admin.php?page=Appointment&addavailability=true#availability_setup';</script>";
}
?>

<script language="javascript">
function delete_aid(aid)
{
	if(confirm("Are you sure you wanr to delete?"))
	{
		location.href ="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=Appointment&daid='?>"+aid+"<?php _e('#availability_setup','templatic'); ?>";
		return true;
	}else
	{
		return false;
	}
}

function delete_fid(fid)
{
	if(confirm("Are you sure you wanr to delete?"))
	{
		location.href ="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=Appointment&deletepage='?>"+fid+"<?php _e('#appointment_fields','templatic'); ?>";
		return true;
	}else
	{
		return false;
	}
}
</script>

<script type="text/javascript">
function showdetail(details_id)
{
	if(document.getElementById('detail_'+details_id).style.display=='none')
	{
		document.getElementById('detail_'+details_id).style.display='';
	}else
	{
		document.getElementById('detail_'+details_id).style.display='none';	
	}
}
function showavailability(a_id)
{ 
	if(document.getElementById('availability_'+a_id).style.display=='none')
	{
		document.getElementById('availability_'+a_id).style.display='';
	}else
	{
		document.getElementById('availability_'+a_id).style.display='none';	
	}
}

function showservice(sid)
{ 
	if(document.getElementById('service_'+sid).style.display=='none')
	{
		document.getElementById('service_'+sid).style.display='';
	}else
	{
		document.getElementById('service_'+sid).style.display='none';	
	}
}

function showappointment(appointment_id)
{ 
	if(document.getElementById('appointment_'+appointment_id).style.display=='none')
	{
		document.getElementById('appointment_'+appointment_id).style.display='';
	}else
	{
		document.getElementById('appointment_'+appointment_id).style.display='none';	
	}
}
</script>