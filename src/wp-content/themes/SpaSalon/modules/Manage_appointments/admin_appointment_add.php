<?php
define ("PLUGIN_IMAGEPATH_APPOINTMENT",ABSPATH."wp-content/themes/Appointment/Appointment/");					 
						 
echo ' <link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/css/jsDatePick_ltr.min.css" />';

echo '<script>var rootfolderpath = "'.get_template_directory_uri().'/images/";</script>'."\n";
echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/dhtmlgoodies_calendar.js"></script>'."\n";
echo ' <link href="'.get_template_directory_uri().'/library/css/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />'."\n";
?>
<script>
function showTime(str)
{ 
	var service_id = document.getElementById('tmplallservices').value;
	var ondate = document.getElementById('dtpid_date').value;
	if (str=="")
	  {
	  document.getElementById("templatic_time").innerHTML="";
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
		document.getElementById("templatic_time").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?ser_id="+service_id+"&date_id="+ondate
	  xmlhttp.open("GET",url+"&q=1&"+str,true);
	  xmlhttp.send();
}

function showfees(str)
{ 
	
	var service_id = document.getElementById('tmplallservices').value;
	var ondate = document.getElementById('dtpid_date').value;
	if (str=="")
	  {
	  document.getElementById("templatic_time").innerHTML="";
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
		document.getElementById("templatic_time").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?ser_id="+service_id+"&date_id="+ondate
	  xmlhttp.open("GET",url+"&q=1&"+str,true);
	  xmlhttp.send();
}


 /* ]]> */
</script>
<script  type="text/javascript">
/* <![CDATA[ */
function closeOnday(str)
{ 
	var service_id = document.getElementById('tmplallservices').value;
	var ondate = document.getElementById('dtpid_date').value;
	if (str=="")
	  {
	  document.getElementById("closeonday").innerHTML="";
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
		document.getElementById("closeonday").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?close_id="+service_id+"&date_id="+ondate
	  xmlhttp.open("GET",url+"&q=1&"+str,true);
	  xmlhttp.send();
}
</script>

<?php

/*-------Field setup-------*/

	global $wpdb;
	$table_dbuserdata = $wpdb->prefix ."appointment_dbuser_data";
 	if($wpdb->get_var("SHOW TABLES LIKE \"$table_dbuserdata\"") != $table_dbuserdata)
	{	
		$custom_appointment_db_table_name = $wpdb->prefix ."appointment_fields";
		$appointment_field_info1 = $wpdb->get_results("select * from $custom_appointment_db_table_name order by position asc");

		$counter = 0;
		foreach($appointment_field_info1 as $appointment_user_info)
		{
			
			if($counter == 0)
			{
				$dbuserdata =   $wpdb->query("CREATE TABLE " . $table_dbuserdata."(
								  uid mediumint(9) NOT NULL AUTO_INCREMENT,
								  Status varchar(10) NOT NULL,
								  isconfirm varchar(10) NOT NULL,
								  activation_key varchar(1000) NOT NULL,
								  ".$appointment_user_info->fieldname." varchar(200) NOT NULL,
								  PRIMARY KEY uid (uid))");
			
			}
			
		}
	}else
	{
		$custom_appointment_db_table_name = $wpdb->prefix ."appointment_fields";
		$appointment_field_info1 = $wpdb->get_results("select * from $custom_appointment_db_table_name order by position asc");
		
		foreach($appointment_field_info1 as $appointment_user_info)
		{ 
			
			$field_check = $wpdb->get_var("SHOW COLUMNS FROM $table_dbuserdata LIKE '".$appointment_user_info->field_backname."'");
			
			if($appointment_user_info->field_backname != $field_check)
			{
				$dbuser_table_alter = $wpdb->query("ALTER TABLE ".$table_dbuserdata." ADD ".$appointment_user_info->field_backname." varchar(100) NOT NULL");
			}
		}
	}

echo '<script>var rootfolderpath = "'.PLUGIN_IMAGEPATH_APPOINTMENT.'images/";</script>'."\n";
function appointment_custom_fields_array()
{
	$appointmnet_field_info = array();
	return apply_filters('appointment_custom_field_filter',$appointmnet_field_info);
}
/*------- for field type-------------*/
function appointment_custom_field_manage()
{
	global $wpdb;
	$custom_appointment_db_table_name = $wpdb->prefix ."appointment_fields";
    $appointment_field_info = $wpdb->get_results("select * from $custom_appointment_db_table_name order by position asc");

		foreach($appointment_field_info  as $appointment_field)
		{  
			if($appointment_field->fieldtype == '1')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic'); if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td><td>";
				echo "<input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='text' value='$appointment_field->default_value' />";
				echo "<div class=\"spannote\">$appointment_field->description</div>";
				echo"</td></tr>";
		    }elseif($appointment_field->fieldtype == '2')
			{
				echo "<tr><td class=\"label\" colspan=\"2\">";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td></tr>";
				echo "<tr><td colspan=\"2\"> <textarea name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' cols='' rows=''>$appointment->default_value</textarea>";
				echo "<div class=\"spannote\">$appointment_field->description</div>";
				echo"</td></tr>";
			}
			elseif($appointment_field->fieldtype == '3')
			{
				if($appointment_field->field_variablename == 'tmplallservices')
				{
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic'); 	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td><td >";
					global $wpdb;
					$table_name = $wpdb->prefix . "appointment_services";
					$sqlselectservice="SELECT * FROM $table_name order by ser_position ";	
					$sqlselectservice1 = $wpdb->get_results($sqlselectservice); 
					echo "<select name='tmplallservices' id='tmplallservices' onchange='showTime(this.value); closeOnday(this.value);'>";
					echo "<option value='0' selected='selected'>". "Select a service"."</option>";
					foreach($sqlselectservice1 as $servicedata1)
					{ 	
						if($sqleditavailable->sid == $servicedata1->sid){?>
						<option value="<?php _e($servicedata1->sid,'templatic'); ?>" selected="selected"><?php _e($servicedata1->servicename,'templatic'); ?></option>
						<?php }else{ ?>
						<option value="<?php _e($servicedata1->sid,'templatic'); ?>"><?php _e($servicedata1->servicename,'templatic'); ?></option>
					 	
					<?php     }
					
					}
					echo"</select>";
					echo "<div id=\"closeonday\"></div>";
					echo "<div class=\"spannote\">$appointment_field->description</div>";
					echo"</td></tr>";
					
				}elseif($appointment_field->field_variablename == 'templatic_time')
				{	
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td><td>";
					echo "<select name=\"templatic_time\" id=\"templatic_time\" >";
					echo "<option selected='selected' value='0'> Select Time </option>"; 
					echo"</select>";
					echo "<div class=\"spannote\">$appointment_field->description</div>";
					echo"</td></tr>";		
						
				}else{
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td><td>";
					
					echo "<select name='$appointment_field->field_variablename' id='$appointment_field->field_variablename'/>";
					echo "<option value='$appointment_field->default_value' selected='selected'>$appointment_field->default_value</option>";
						if($appointment_field->fldvalues != '')
						{
							$eachvalue = explode(',',$appointment_field->fldvalues);
							for($i = 0; $i < count($eachvalue); $i++)
							{ 
								echo "<option value='$eachvalue[$i]'>"; 
								echo $eachvalue[$i]; 
								echo "</option>";
							}
						}
					echo"</select>";
					echo "<div class=\"spannote\">$appointment_field->description</div>";
					echo"</td></tr>";
				}
			}elseif($appointment_field->fieldtype == '4')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td><td>";
				
				
				if($appointment_field->fldvalues == '')
				{
					echo "<input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='radio' value='$appointment_field->fieldname'/>$appointment_field->default_value";
				}elseif($appointment_field->fldvalues != '')
				{
					$fldvalues = explode(',',$appointment_field->fldvalues);
				
						for($j = 0; $j < count($fldvalues); $j++)
						{ 
						echo "<input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='radio' value='$fldvalues[$j]'/>".$fldvalues[$j];
						}
					
				}else{
					echo "<input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='radio' value='$appointment_field->default_value'/>$appointment_field->fieldname";
				}
				echo "<div class=\"spannote\">$appointment_field->description</div>";
				echo"</td></tr>";	
			}
			elseif($appointment_field->fieldtype == '5')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic'); if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					if($appointment_field->isoptional == '0'){ _e('(*)','templatic'); }
				echo "</td><td>";
				echo "<input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='checkbox' value='$appointment_field->default_value'/>$appointment_field->default_value";
				if($appointment_field->fldvalues != '')
				{
				echo "<input name='opttmpl$appointment_field->fieldname' id='$appointment_field->field_variablename' type='checkbox' value='$appointment_field->fieldname'/>$appointment_field->fieldname";
				}
				echo "<div class=\"spannote\">$appointment_field->description</div>";
				echo"</td></tr>";	
			}
			elseif($appointment_field->fieldtype == '6' & $appointment_field->field_variablename == 'templatic_date')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td><td>";
				
				
				echo "<div class=\"left\">";
                echo  "\t\t".'<div id="calender_app" class="cal_img left" >';
				echo "<input size='40'  type='text'  name='templatic_date' id='dtpid_date' onblur='showTime(this.value)' onchange='showTime(this.value)' value='".$appointment_field->default_value."'/>";
				echo '<img src="'.get_template_directory_uri().'/images/cal.gif" alt="Calendar" onclick="displayCalendar(document.frm_appointment.'.$appointment_field->field_variablename.',\' dd/mm/yyyy\',this)" style="cursor: pointer;" border="0" height="16" width="16" /></div>'."";
				echo "<span class=\"spannote\">$appointment_field->description</span></div>";	
				echo"</td></tr>";
				echo "<span id='container1'></span>";
				
			}elseif($appointment_field->fieldtype == '6')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('(<span>*</span>)','templatic'); }
				echo "</td><td>";
			?> 
                 
                <div class="left">
              <?php echo  "\t\t".'<div id="calender_app" class="cal_img left">';
			 	echo "<input size='40' type='text' value='".$appointment_field->default_value."' name='".$appointment_field->field_variablename."' id='".$appointment_field->field_variablename."' />"; 
				echo '<img src="'.get_template_directory_uri().'/images/cal.gif"  alt="Calendar"  onclick="displayCalendar(document.frm_appointment.'.$appointment_field->field_variablename.',\' dd/mm/yyyy\',this)" style="cursor: pointer;" align="middle" border="0" height="16" width="16" /></div>'."<br/>";
				echo "<span class=\"spannote\">$appointment_field->description</span>";	
				echo"</div></td></tr>";
					
					
			}
		}
		
}

/*-------  End of for field type-------------*/
 function selectfield_type1($fieldtype)
{
	if($fieldtype == '1'){ _e('text','templatic'); 
	}elseif($fieldtype =='2'){ _e('text area','templatic'); 
	} elseif($fieldtype =="3"){ _e('Select box','templatic');
	}elseif($fieldtype =="4"){ _e('Option button','templatic');; 
	}elseif($fieldtype =="5"){ _e('Check box','templatic');
	}elseif($fieldtype =='6'){ _e('Date Picker','templatic'); }	
}

	if(isset($_REQUEST['success']))
	{ ?>
			<?php	switch ($_REQUEST['success'])
					{
							case "aptupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Change have been saved.
								</div><br/>";
								break;
							case "aptinserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Record Inserted successfully
								</div><br/>";
								 break;
							case "aptdeleted" : echo "<div id='submitedsuccess' class='submitedsuccess'> Information Deleted successfully
								</div><br/>";
								break;
							case "afalse" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'>Please Enter service type,date and time.
								 </div></br>";
								break;
							case "aifalse" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'>Please Enter values.
								 </div><br/>";
								break;
							case "emailed" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'>Appointment added, Please Check Your mail for confirmation.
								 </div></br>";
								break;
					}
	}
?>

<div class='headerdivh3'>
	<h3><?php _e('Add New Appointment','templatic');?></h3>
    <div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
		<a href="#" onclick="hideDiv()" class="button-primary"> 
         <?php _e('View Listing','templatic'); ?></a>
   </div>
    <p><?php _e('In this section, the administrator can manually add a new appointment.<font color=red> (*)</font> indicate required fields. ','templatic');?></p>                    
</div>
<form action="#" method="post" name="frm_appointment"  id="frm_appointment">
<table>
<thead>
<?php 
appointment_custom_field_manage(); ?>
<tr>
<td colspan="2">
 <div class="button_spacer2"><input name="save_appointment_data" id="save_appointment_data" type="Submit" value="Save"  class="button-framework-imp" /></div>

</td>
</tr>
</thead>
</table>
</form>

<?php
/*------------Fetch time -------------------*/

function time_format($tid)
{
		for($i=0; $i<=23; $i ++)
		{
			$count=0;	//echo $i;
			for($j=0 ; $j <=60 ; $j +=30)
			{ 
			   $mint = $j;
				if($j == 30 )
			   { 
			   		if($count <= 9)
					{
						$mint = "0".$count.":"."00";
					}else{
						$mint = $count.":"."00";
					}
					if($mint == $tid){
					?>
						<option value="<?php _e($mint,'templatic'); ?>" selected="selected"><?php _e($mint,'templatic');?></option>
                    <?php }else{ ?> 
                    	<option value="<?php _e($mint,'templatic'); ?>" ><?php _e($mint,'templatic'); ?></option>   
				<?php }  
			   }elseif($j == 60 )
			   {
				   	if($count <= 9)
					{
					 $hour = "0".$count.":"."30";
					}else{
					 $hour = $count.":"."30";
					}
				 	if($tid == $hour){
				 ?>
                 	<option value="<?php _e($hour,'templatic'); ?>" selected="selected" ><?php _e($hour,'templatic');?></option>
                 <?php }else{ ?>
                	<option value="<?php _e($hour,'templatic'); ?>" <?php if($tid == $hour){ ?>selected="selected" <?php } ?> ><?php _e($hour,'templatic');?></option>
               <?php }
			   }
				if( $count != $i){
				   $count = $i;
				
				}	
			}
		}
}


/*-------------end of fetch time------------ */

if(isset($_POST['save_appointment_data']))
{
	echo '<script src="'.get_template_directory_uri().'/js/widget_appointment.js"></script>';
	if($_POST['tmplallservices'] != "" && $_POST['templatic_date'] != "" && $_POST['templatic_time'] != "" )
	{
			global $wpdb; 
			$templatic_custom_field_listing = $wpdb->prefix."appointment_fields";
			$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
			$templatic_appointment_listing_insert = $wpdb->query("insert into $templatic_appointment_listing(uid,status,isconfirm,activation_key)values('','0','0','".mt_rand()."')");
			$templatic_custon_fields = $wpdb->get_results("select * from $templatic_custom_field_listing");
			$id =0;
			foreach($templatic_custon_fields as $templatic_custom_fields_obj)
			{	
			
				$templatic_custom_fields_obj->field_backname;
				$templatic_appointment_field_listing = $wpdb->get_var("SHOW COLUMNS FROM $templatic_appointment_listing LIKE '".$templatic_custom_fields_obj->field_backname."'");
				$templatic_custom_fields_obj->field_variablename;
				if($templatic_appointment_field_listing  != "")
				{ 	
					$max_id = $wpdb->query("select max(uid) as uid from $templatic_appointment_listing");
					$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
					$templatic_last_appointment = $wpdb->get_row("select * from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
					
					$field_value = trim($_POST[$templatic_custom_fields_obj->field_variablename]);
					$field_name =  trim($_POST[$templatic_custom_fields_obj->fieldname]);
					if(($field_value == "") && ($templatic_custom_fields_obj->isoptional =='1'))
					{ 
						$templatic_last_appointment = $wpdb->get_row("delete from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
						$deleteid = mysql_affected_rows();
						
					}
					
				}
				
			}	
			if($deleteid != 0)
			{
				echo "<script language='javascript'>  frmapt_error();</script>";
			}else{
				appointment_submited();
			}
	}else{
		echo "<script language='javascript'>  frmapt_error();</script>";
		
	}
	
}
function appointment_submited()
{
	if($_POST['tmplallservices'] != "" && $_POST['templatic_date'] != "" && $_POST['templatic_time'] != 0 )
	{
			global $wpdb; 
			$templatic_custom_field_listing = $wpdb->prefix."appointment_fields";
			$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
			//$templatic_appointment_listing_insert = $wpdb->query("insert into $templatic_appointment_listing(uid,status,isconfirm,activation_key)values('','0','0','".mt_rand()."')");
			$templatic_custon_fields = $wpdb->get_results("select * from $templatic_custom_field_listing");
			foreach($templatic_custon_fields as $templatic_custom_fields_obj)
			{	
			
				$templatic_custom_fields_obj->field_backname;
				$templatic_appointment_field_listing = $wpdb->get_var("SHOW COLUMNS FROM $templatic_appointment_listing LIKE '".$templatic_custom_fields_obj->field_backname."'");
				$templatic_custom_fields_obj->field_variablename;
				if($templatic_appointment_field_listing  != "")
				{ 	
					$max_id = $wpdb->query("select max(uid) as uid from $templatic_appointment_listing");
					$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
					$templatic_last_appointment = $wpdb->get_row("select * from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
					
					$field_value = $_POST[$templatic_custom_fields_obj->field_variablename];
					$field_name =  $_POST[$templatic_custom_fields_obj->fieldname];
					if(($field_value == "") && ($templatic_custom_fields_obj->isoptional =='1'))
					{ 
						$templatic_last_appointment = $wpdb->get_row("delete from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
						$deleteid = mysql_affected_rows();
						echo "<script language='javascript'>  frmapt_error();</script>";
						break;
					}else
					{ 
						if(($field_value == "") && ($templatic_custom_fields_obj->isoptional =='1'))
						{ 
							$templatic_last_appointment = $wpdb->get_row("delete from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
							$deleteid = mysql_affected_rows();
							echo "<script language='javascript'>  frmapt_error();</script>";
							break;
						}else
						{ 
							if(($field_value != "") && ($deleteid ==0))
							{
							$wpdb->query("Update $templatic_appointment_listing SET $templatic_appointment_field_listing ='".$field_value."' where uid = '".$templatic_last_appointment->uid."'");
							$table_payment = $wpdb->prefix ."appointment_payment";
							$payment_get_record = $wpdb->get_row("select * from $table_payment where pid ='1001' and is_active = '1'");
							if((mysql_affected_rows() > 0) && ($deleteid ==0) )
							{
							echo "<script language='javascript'> frm_pay();</script>";	
							}else{
								
							echo "<script language='javascript'> frmapt1();</script>";
							}
							
							
						}
					
					}
				}
			
			}
		$table_payment = $wpdb->prefix . "appointment_payment";
		$payment_get_record = $wpdb->get_row("select * from $table_payment where pid ='1001' and isactive = '1'");
		if(mysql_affected_rows()>0)
		{
			echo "<script language='javascript'> frm_pay();</script>";
		}else{
			appointment_request_mail();
		}
			}
	}else{
		echo "<script language='javascript'>  frmapt_error();</script>";
		
	}
}


function appointment_request_mail()
{ 
	global $wpdb; 
	
	/*-------last record of table--------*/
	
	$templatic_custom_field_listing = $wpdb->prefix."appointment_fields";
	$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
	$max_id = $wpdb->query("select max(uid) as uid from $templatic_appointment_listing");
	$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
	$templatic_last_appointment = $wpdb->get_row("select * from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");

	/*----------Fetch Email messages-----------*/
	
	$templatic_email_table = $wpdb->prefix."appointment_email";
	$templatic_request_mail = $wpdb->get_row("select * from $templatic_email_table");
	$request_email = $templatic_request_mail->request_email;
	$cancel="<a href='".$_SERVER['PHP_SELF']."?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."'>".$_SERVER['PHP_SELF']."uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."</a>";
	
	/*----------Fetch admin login-----------*/
	
	$templatic_admin_record1 = $wpdb->prefix."users";
	$templatic_users_table = $wpdb->get_var("show tables like $templatic_admin_record1'");
	if($templatic_users_table == "")
	{
		$templatic_admin_record = $wpdb->get_var("show tables like '%users'");
	}
				
	$templatic_request_mail = $wpdb->get_row("select * from $templatic_admin_record where user_login = 'admin'");
	$admin_name = $templatic_request_mail->display_name;

	$templatic_appointment_list_user = $wpdb->get_row("select * from $templatic_email_table");
	
	$templatic_request_usermail = $wpdb->get_row("select * from $templatic_admin_record where user_email = '".$templatic_last_appointment->Email."'");
	$user_name = $templatic_request_usermail ->display_name;
	if(mysql_affected_rows() > 0)
	{ 
		$request_usermail = str_replace('[USER_NAME]',$user_name,$request_email);
	}else{
	
		$request_usermail = str_replace('[USER_NAME]','Guest',$request_email);
	}
	
	$request_mail = str_replace('[CANCEL_URL]',$cancel,$request_usermail);
	$appointment_email = str_replace('[ADMIN_NAME]',$admin_name,$request_mail);
	 
	 $to = $templatic_last_appointment->Email;
	 
	 $from = $templatic_request_mail->email;
	 
	$subject = $templatic_last_appointment->request_email_sub;

	echo $templatic_appointment_message = $appointment_email ;
	 
	$headers = "From :".$from;
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	 $mail_success = mail($to,$subject,$templatic_appointment_message,$header);
	 
	 if($mail_success)
	 {
		 echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=emailed#add_appointment';</script>";
	 }
}
?>