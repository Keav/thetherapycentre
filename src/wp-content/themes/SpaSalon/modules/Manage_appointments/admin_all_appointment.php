<script> 
function active_appointment(aptid)
{ 
	if (aptid=="")
	  {
	  document.getElementById("deleteappointment").innerHTML="";
	  return;
	  }
		if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
		else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("deleteappointment").innerHTML=xmlhttp.responseText;
		
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_status.php?appointment_accept_id="+aptid+"&myid="+aptid
	  xmlhttp.open("GET",url+"q=1"+aptid,true);
	  xmlhttp.send();
}

function reject_appointment(aptid)
{    
	  if (aptid=="")
	  {
	  document.getElementById("deleteappointment").innerHTML="";
	  return;
	  }
		if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
		else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("deleteappointment").innerHTML=xmlhttp.responseText;
	
		}
	  }
	  urlu = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_status.php?appointment_reject_id="+aptid+"&myid="+aptid
	  xmlhttp.open("GET",urlu+"q=1"+aptid,true);
	  xmlhttp.send();
}

function delete_appointment(aptid)
{    
	  if (aptid=="")
	  {
	  document.getElementById("deleteappointment").innerHTML="";
	  return;
	  }
		if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
		else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("deleteappointment").innerHTML=xmlhttp.responseText;
		
		}
	  }
	    url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_status.php?appointment_delete_id="+aptid+"&myid="+aptid
	 	xmlhttp.open("GET",url+"q=1"+aptid,true);
	  	xmlhttp.send();
}

function showDiv()
{
	document.getElementById('deleteappointment').style.display = "none";
	document.getElementById('addappointment').style.display = "block";
}

function hideDiv()
{
	document.getElementById('deleteappointment').style.display = "block";
	document.getElementById('addappointment').style.display = "none";
}
</script>



<div id="addappointment" style="display:none;">
<?php
	include('admin_appointment_add.php');
?>
</div>

<div id="deleteappointment" name="deleteappointment" >
<?php
    global $wpdb;
	$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
	$templatic_all_appointments = $wpdb->get_results("select * from $templatic_appointment_listing order by uid desc"); 
?>
<div class='headerdivh3'>
<h3><?php _e('Manage Appointments Request','templatic');?></h3>
	<div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
		<a href="#" onclick="showDiv()" class="button-primary"> 
         <?php _e('Add Appointment','templatic'); ?></a>
   </div>
 <p>You can accept, reject and manage appointment requests from here. </p>                       
</div>
<table class="widefat">
<thead>
<tr>
    <th><?php _e('Services','templatic'); ?></th>
    <th><?php _e('Date','templatic'); ?></th>
    <th><?php _e('Time','templatic'); ?></th>
    <th><?php _e('Email','templatic'); ?></th>
    <th><?php _e('Status','templatic'); ?></th>
    <th><?php _e('Action','templatic'); ?></th>
</tr>
<?php 
	foreach($templatic_all_appointments as $templatic_all_appointments_obj)
	{
?>
<tr>
	<td><?php 
					global $wpdb;
					$table_name = $wpdb->prefix . "appointment_services";
					$sqlservice=$wpdb->get_row("SELECT * FROM $table_name where sid ='".$templatic_all_appointments_obj->Service."' ");	
					echo $sqlservice->servicename;
	?></td>
    <td><?php _e($templatic_all_appointments_obj->Date,'templatic');?></td>
    <td><?php 
	if($templatic_all_appointments_obj->Time != "") {
	$time = explode(',',$templatic_all_appointments_obj->Time);
	$i= count($time);
	for($t=0; $t<=count($time) ; $t++)
	{
		$tm = $time[0]." to ". $time[($i-1)];
	}
	if($i > 1)
	echo $tm;
	else
	{
		echo $templatic_all_appointments_obj->Time;
	}
	}?></td>
    <td><?php _e($templatic_all_appointments_obj->Email,'templatic');?></td>
    <td>
	<?php
    				$status_user = $templatic_all_appointments_obj->status;
					if($templatic_all_appointments_obj->status ==1)
					{
						_e('<span style="color:green;">Accepted</span>','templatic');
					}elseif($templatic_all_appointments_obj->status ==0){
						_e('<span style="color:#FF8000;">Pending</span>','templatic');
					}elseif($templatic_all_appointments_obj->status ==3){
						_e('<span style="color:red;"><b>Cancel</b></span>','templatic');
					}else{
					    _e('<span style="color:red;">Rejected</span>','templatic');	
					}
	?>
	</td>
    <td>
     			<a href="#" title="Accept"  onclick="active_appointment(<?php _e($templatic_all_appointments_obj->uid,'templatic'); ?>)"><img src="<?php echo get_template_directory_uri(); ?>/images/active.png" alt="accept" border="0"/></a>
                <a href="#" title="Reject" onclick="reject_appointment(<?php _e($templatic_all_appointments_obj->uid,'templatic'); ?>)"><img src="<?php echo get_template_directory_uri(); ?>/images/reject.png" alt="reject" border="0" style="padding-left:5px;" /></a>
                <a href="#" title="Delete" onclick="javascript:void(0);delete_appointment('<?php _e($templatic_all_appointments_obj->uid,'templatic'); ?>');"><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:5px;" /></a>
                <a href="#" title="Details" onclick="javascript:void(0);showappointment('<?php _e($templatic_all_appointments_obj->uid,'templatic'); ?>');"><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-left:5px;" /></a>
    
    </td>
</tr>
<tr style=" display:none" id="appointment_<?php _e($templatic_all_appointments_obj->uid,'templatic');?>">
<td colspan="6"> 
<table class="widefat" style="background-color:#eee;">
 <?php 
	global $wpdb;
	$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
	$templatic_all_appointments = mysql_query("select * from $templatic_appointment_listing where uid = '".$templatic_all_appointments_obj->uid."'order by uid desc"); 
	$total_rows =  mysql_affected_rows();
	global $wpdb;
	$templatic_appointment_fields = $wpdb->prefix."appointment_fields";
	$templatic_all_appointment_fields = $wpdb->get_results("select * from $templatic_appointment_fields"); 
    $total_fields = mysql_affected_rows(); 
	 mysql_num_fields($templatic_all_appointments);
	$templatic_apt_fieldname=0;
	while($templatic_apt_fieldname < mysql_num_fields($templatic_all_appointments))
	{ 	if($templatic_apt_fieldnameobj > 5)
		{	echo "<tr><td>";
			$apt_field_dat_obj = mysql_fetch_array($templatic_all_appointments);
			$aptfielddata = mysql_field_name($templatic_all_appointments,$templatic_apt_fieldname );
							 
		
			global $wpdb;
			$apt_field_dat_obj_for = $wpdb->get_results("select * from $templatic_appointment_listing where uid='".$templatic_all_appointments_obj->uid."'");
			foreach($apt_field_dat_obj_for as $apt_field_dat_obj_for_obj)
			{
				if($apt_field_dat_obj_for_obj->$aptfielddata !=""){
					echo "<strong>" .$aptfielddata."</strong>";		
				    echo " : ".$apt_field_dat_obj_for_obj->$aptfielddata."<br/>";
					}
			}
			echo "<td></td>";
		}
		$templatic_apt_fieldnameobj= $templatic_apt_fieldname ++;
	}
?>
</table>    
</td>
</tr>
<?php } ?>

</thead>
</table>


</div>
<div style="margin:10px 0;">
<table border="0">
 <tr>
            	<td colspan="2" style="border-bottom:1px solid #ccc;"><strong>Legend:</strong> </td>
            </tr>
            <tr>
            	<td></td>
            </tr>
<tr><td width="30px"><img src="<?php echo get_template_directory_uri(); ?>/images/active.png" alt="accept" border="0" style=" margin-left:5px;"/></td><td><?php _e('Accept request','templatic'); ?></td></tr>
<tr><td><img src="<?php echo get_template_directory_uri(); ?>/images/reject.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('Reject request','templatic'); ?></td></tr>
<tr><td><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('Delete request','templatic'); ?></td></tr>
<tr><td><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('View details of request','templatic'); ?></td></tr>

</table>
</div>
 
	