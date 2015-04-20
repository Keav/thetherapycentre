<script type="text/javascript">
/* <![CDATA[ */
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
		document.getElementById("templatic_time1").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?ser_id="+service_id+"&date_id="+ondate
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}

function showfees(str)
{ 
	
	var service_id = document.getElementById('tmplallservices').value;
	if (str=="")
	  {
	  document.getElementById("appointment_fees").innerHTML="";
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
		document.getElementById("appointment_fees").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_status.php?fees_id="+service_id+"&date_id="+str
	  xmlhttp.open("GET",url+"q=1"+str,true);
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
	 
	  urlurl = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?close_id="+service_id+"&date_id="+ondate+"&fees_id="+service_id
	  xmlhttp.open("GET",urlurl+"q=1"+str,true);
	  xmlhttp.send();
}
 /* ]]> */
</script>
<?php
define ("PLUGIN_IMAGEPATH_APPOINTMENT",ABSPATH."wp-content/themes/Appointment/Appointment/");
						 
echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/jquery-1.4.4.js"></script>
	  <script type="text/javascript" src="'.get_template_directory_uri().'/js/widget_appointment.js"></script>';
echo '<script type="text/javascript" >var rootfolderpath = "'.get_template_directory_uri().'/images/";</script>'."\n";
echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/dhtmlgoodies_calendar.js"></script>'."\n";

/*-------Field setup-------*/

	global $wpdb;
	$custom_appointment_db_table_name = $wpdb->prefix ."appointment_fields";
	$form_fields = array();
	
	$appointment_field_info = mysql_query("select * from $custom_appointment_db_table_name  where isoptional = '1' order by position asc");
	while($res = mysql_fetch_array($appointment_field_info)){
		$title = $res['fieldname'];
		$name = $res['field_variablename'];
		$type = $res['fieldtype'];
		$option_values = $res['fldvalues'];
		$require_type = $res['validation_type'];
		if($name == 'templatic_date'){
			$form_fields['dtpid_date'] = array(
					   'title'	=> $title,
					   'name'	=> 'dtpid_date',
					   'espan'	=> 'dtpid_date_error',
					   'type'	=> $type,
					   'require_validation'	=> $require_type,
					   'text' => 'This field is required' );	
		} else {
			$form_fields[$name] = array(
					   'title'	=> $title,
					   'name'	=> $name,
					   'espan'	=> $name.'_error',
					   'type'	=> $type,
					   'require_validation'	=> $require_type,
					   'text' => 'This field is required' );
		}
		
	}

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
								  status varchar(10) NOT NULL,
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

function service_ftech($sid)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "appointment_services";
		$sqlselectservice = $wpdb->get_row("SELECT servicename FROM $table_name where sid = '".$sid."'");
		return ($sqlselectservice->servicename);
	}
	
function appointment_custom_fields_array()
{
	$appointmnet_field_info = array();
	return apply_filters('appointment_custom_field_filter',$appointmnet_field_info);
}

function appointment_custom_field_manage()
{
	
		global $wpdb;
		$custom_appointment_db_table_name = $wpdb->prefix ."appointment_fields";
    	$appointment_field_info = $wpdb->get_results("select * from $custom_appointment_db_table_name order by position asc");
$required_field = '';
		foreach($appointment_field_info  as $appointment_field)
		{  
			if($appointment_field->isoptional == '1') {

				$required_field = '<span id="'.$appointment_field->field_variablename.'_error" class="errmsg"></span>';
				
			} else {
				$required_field = '';
			}
			if($appointment_field->fieldtype == '1')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic'); if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td></tr>";
				echo "<tr><td><input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='text' value='$appointment_field->default_value' />";
				echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
				echo"</td></tr>";
		    }elseif($appointment_field->fieldtype == '2')
			{
				echo "<tr><td class=\"label2\">";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td></tr>";
				echo "<tr><td> <textarea name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' cols='' rows=''>$appointment->default_value</textarea>";
				echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
				echo"</td></tr>";
			}
			elseif($appointment_field->fieldtype == '3')
			{
				if($appointment_field->field_variablename == 'tmplallservices')
				{
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic'); 	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td></tr>";
					global $wpdb;
					$table_name = $wpdb->prefix . "appointment_services";
					$sqlselectservice="SELECT * FROM $table_name order by ser_position ";	
					$sqlselectservice1 = $wpdb->get_results($sqlselectservice); 
					echo "<tr><td><select name='tmplallservices' id='tmplallservices' onchange='showfees(this.value); closeOnday(this.value); '>";
					echo "<option value='' selected='selected'>". "Select a service"."</option>";
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
					echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
					echo"</td></tr>";
					
				}elseif($appointment_field->field_variablename == 'templatic_time')
				{
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td></tr>";
					
					echo "<tr><td>";
					echo "<div name=\"templatic_time1\" id=\"templatic_time1\">";
					echo "<select name=\"templatic_time\" id=\"templatic_time\" >";
					echo "<option selected='selected' value='0'> Select Time </option>"; 
					echo"</select>";
					echo "</div>";
					echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
					echo"</td></tr>";		
						
				}else{
					echo "<tr><td class=\"label\" >";
					_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					echo "</td></tr>";
					
					echo "<tr><td><select name='$appointment_field->field_variablename' id='$appointment_field->field_variablename'/>";
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
					echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
					echo"</td></tr>";
				}
			}elseif($appointment_field->fieldtype == '4')
			{ 
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td></tr><tr><td class=\"radio_td\">";
				
				
				if($appointment_field->fldvalues == '')
				{
					echo "<span><input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' class='radio' type='radio' value='$appointment_field->fieldname' class='radio'/>$appointment_field->default_value</span>";
				}elseif($appointment_field->fldvalues != '')
				{
					$fldvalues = explode(',',$appointment_field->fldvalues);
				
						for($j = 0; $j < count($fldvalues); $j++)
						{ 
						echo "<span><input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' class='radio' type='radio' value='$fldvalues[$j]'/>".$fldvalues[$j]."</span>";
						}
					
				}else{
					echo "<span><input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' class='radio' type='radio' value='$appointment_field->default_value'/>$appointment_field->fieldname</span>";
				}
				echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
				echo"</td></tr>";	
			}
			elseif($appointment_field->fieldtype == '5')
			{ 
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic'); if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
					if($appointment_field->isoptional == '0'){ _e('(*)','templatic'); }
				echo "</td></tr>";
				echo "<tr><td><input name='$appointment_field->field_variablename' id='$appointment_field->field_variablename' type='checkbox' value='$appointment_field->default_value'/>$appointment_field->default_value";
				if($appointment_field->fldvalues != '')
				{
				echo "<input name='opttmpl$appointment_field->fieldname' id='$appointment_field->field_variablename' type='checkbox' value='$appointment_field->fieldname'/>$appointment_field->fieldname";
				}
				echo "<div class=\"spannote\">$appointment_field->description</div>".$required_field;
				echo"</td></tr>";	
			}
			elseif($appointment_field->fieldtype == '6' & $appointment_field->field_variablename == 'templatic_date')
			{ 
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('<span>*</span>','templatic'); }
				echo "</td></tr>";
				echo "<tr><td>";
                echo  "\t\t".'<div id="calender_app" class="cal_img" >'; ?>
 
                <?php
				echo "<input size='40'  type='text'  name='templatic_date' id='dtpid_date' onblur='showTime(this.value)' onchange='showTime(this.value)' value='".$appointment_field->default_value."'/>";
				echo '<img src="'.get_template_directory_uri().'/images/cal.gif" alt="Calendar" onclick="displayCalendar(document.frm_appointment.'.$appointment_field->field_variablename.',\' dd/mm/yyyy\',this)" style="cursor: pointer;" border="0" height="16" width="16" /></div>'."";
				echo "<span class=\"spannote\">$appointment_field->description</span><span id='dtpid_date_error' class='errmsg'></span>";	
				
				echo"</td></tr>";
				
				
			}elseif($appointment_field->fieldtype == '6')
			{
				echo "<tr><td class=\"label\" >";
				_e(ucfirst($appointment_field->fieldname)." ",'templatic');	if($appointment_field->isoptional == '1'){ _e('(<span>*</span>)','templatic'); }
				echo "</td></tr>";
			?> 
                 <tr><td>
               <?php echo  "\t\t".'<div id="calender_app" class="cal_img ">';
			 	echo "<input size='40' type='text' value='".$appointment_field->default_value."' name='".$appointment_field->field_variablename."' id='".$appointment_field->field_variablename."' />"; 
				echo '<img src="'.get_template_directory_uri().'/images/cal.gif"  alt="Calendar"  onclick="displayCalendar(document.frm_appointment.'.$appointment_field->field_variablename.',\' dd/mm/yyyy\',this)" style="cursor: pointer;" align="middle" border="0" height="16" width="16" /></div>'."<br/>";
				echo "<span class=\"spannote\">$appointment_field->description</span>".$required_field;	
				echo"</td></tr>";
					
					
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
							case "afalse" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'>Please Enter all required fields.
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
<div id="payfees" class="noerrordiv">
<?php

$paymentOpts = get_payment_optins('paypal');
$merchantid = $paymentOpts['merchantid'];
$returnUrl = $paymentOpts['returnUrl'];
$cancel_return = $paymentOpts['cancel_return'];
$notify_url = $paymentOpts['notify_url'];
$currency_code = $paymentOpts['currency'];
$table_services = $wpdb->prefix ."appointment_services";
$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
$payment_getservice_price = $wpdb->get_row("select * from $table_services where sid = '". $_POST['tmplallservices']."'");
$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
$_SESSION['last_id'] = $max_id_obj->uid;
$service_id = "";
$last_postid = $_SESSION['last_id'];
if($payment_getservice_price->apt_fees != '' && $payment_getservice_price->apt_fees != 0 )
{_e('<p>To proceed for payment, click the <b>Pay Now</b> button below.  </p>','');
?>
<form name="frm_payment_method" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" value="<?php if($payment_getservice_price->apt_fees == "") { echo $payment_get_record->pay_amount; }else{ echo $payment_getservice_price->apt_fees; }?>" name="amount"/>
<input type="hidden" value="<?php echo htmlspecialchars($returnUrl);?>&amp;pid=<?php echo $last_postid;?>" name="return"/>
<input type="hidden" value="<?php echo htmlspecialchars($cancel_return);?>&amp;pid=<?php echo $last_postid;?>" name="cancel_return"/>
<input type="hidden" value="<?php echo htmlspecialchars($notify_url);?>" name="notify_url"/>
<input type="hidden" value="_xclick" name="cmd"/>
<input type="hidden" value="<?php echo service_ftech($_REQUEST['tmplallservices']); ?>" name="item_name"/>
<input type="hidden" value="<?php echo $merchantid;?>" name="business"/>
<input type="hidden" value="<?php echo $currency_code;?>" name="currency_code"/>
<input type="hidden" value="<?php echo $last_postid;?>" name="custom" />
<input type="hidden" name="no_note" value="1"/>
<input type="hidden" name="no_shipping" value="1"/>
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
</form>
<?php } 
else{ echo "An Appointment has been requested.";
}
?>
</div>

<div id="div_frm_addappointment">
<form action="#" method="post" name="frm_appointment" id="frm_appointment" >
    <div id="submitedapt" class="noerror"></div>
	<span id='container1'></span>
    <table><?php appointment_custom_field_manage(); ?>
	<tr>
	<td colspan="2">
   <span id='appointment_fees'></span>
 	<input name="save_appointment_data" id="save_appointment_data" type="submit" value="Submit" onclick=""/>
 	</td>
	</tr>
	</table>
</form>
</div>
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

			}else{
				
				appointment_submited();
				appointment_request_mail();
				
			}
	}else{
 /*?>		echo "<script type='text/javascript' language='javascript'>  frmapt_error();</script>";
<?php */		
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
          //  $_session['service_id'] = LAST_INSERT_ID();
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
						echo "<script type='text/javascript' language='javascript'>  frmapt_error();</script>";
						break;
					}else
					{ 
						if(($field_value == "") && ($templatic_custom_fields_obj->isoptional =='1'))
						{ 
							$templatic_last_appointment = $wpdb->get_row("delete from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");
							$deleteid = mysql_affected_rows();
								echo "<script type='text/javascript' language='javascript'>  frmapt_error();</script>";
							break;
						}else
						{ 
							if(($field_value != "") && ($deleteid ==0))
							{
							$wpdb->query("Update $templatic_appointment_listing  SET $templatic_appointment_field_listing ='".$field_value."' where uid = '".$templatic_last_appointment->uid."'");
							$table_payment = $wpdb->prefix ."appointment_payment";
							global $wpdb;
							$paymentupdsql = "select option_value from $wpdb->options where option_name ='payment_method_paypal'";
							$paymentupdinfo = $wpdb->get_results($paymentupdsql);
							if($paymentupdinfo){
								foreach($paymentupdinfo as $paymentupdinfoObj)	{
									$option_value = unserialize($paymentupdinfoObj->option_value);
									$isactive = $option_value['isactive'];
									$option_value_str = serialize($option_value);
								}
							}
							if($isactive == 1){	
								echo "<script type='text/javascript' language='javascript'> frm_pay();</script>";
							}else{
								
								echo "<script type='text/javascript' language='javascript'>frmapt1();</script>";
							}
							
							
						}
					
					}
				}
			
			}
	}admin_appointment_request_mail();
	}else{
		echo "<script type='text/javascript' language='javascript'>  frmapt_error();</script>";
		
	}
}


//----------  mail after submit request
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
	$cancelurl="<a href='"."http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."'>http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."</a>";
	
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
	
	$request_mail = str_replace('[CANCEL_URL]',$cancelurl,$request_usermail);
	$appointment_email = str_replace('[ADMIN_NAME]',$admin_name,$request_mail);
	 
	$to = $templatic_last_appointment->Email;
	 
	

	$templatic_appointment_message = $appointment_email;
	$templatic_email_table_obj = $wpdb->prefix."appointment_email";
	$templatic_request_mail_obj = $wpdb->get_row("select * from $templatic_email_table_obj where eid = 1");

	$subject = $templatic_request_mail_obj->request_email_sub;
	$from = $templatic_request_mail_obj->email;
	
	
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		// Additional headers
		$headers .= 'To: '.$to.' <'.$to.'>' . "\r\n";
		$headers .= 'From: '.get_option('blogname').' <'.$from.'>' . "\r\n";
	
	
	$mail_success = @mail($to,$subject,$templatic_appointment_message,$headers);
	 if($mail_success)
	 {
		 echo "<script type='text/javascript' language='javascript'>  frmapt1();</script>";
	 }
}

function admin_appointment_request_mail(){ 
		global $wpdb; 

	/*-------last record of table--------*/
	
	$table_name = $wpdb->prefix."appointment_services";
	$templatic_custom_field_listing = $wpdb->prefix."appointment_fields";
	$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
	$max_id = $wpdb->query("select max(uid) as uid from $templatic_appointment_listing");
	$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
	$templatic_last_appointment = $wpdb->get_row("select * from $templatic_appointment_listing where uid ='".$max_id_obj->uid."'");

	/*----------Fetch Email messages-----------*/
	
	$templatic_email_table = $wpdb->prefix."appointment_email";
	$templatic_request_mail = $wpdb->get_row("select * from $templatic_email_table");
	$request_email = $templatic_request_mail->request_email;
	$cancelurl="<a href='"."http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."'>http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key)."</a>";
	
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
	$from = $templatic_last_appointment->Email;	 
	
	$msg = '';
	$sqlselectservice="SELECT servicename FROM $table_name where sid = '".$templatic_last_appointment->Service."'";	
	$sqlselectservice1 = $wpdb->get_results($sqlselectservice); 
	foreach($sqlselectservice1 as $servicedata1){
		$msg .= '<strong>Service : </strong>'.$servicedata1->servicename.'<br /><br />';
	}
		$msg .= '<strong>Date Time : </strong>'.$templatic_last_appointment->Date.'&nbsp;&nbsp;'.$templatic_last_appointment->Time.'<br /><br />
		<strong>Email : </strong>'.$templatic_last_appointment->Email.'<br /><br />';
		if($templatic_last_appointment->Phone_number != ''){
			$msg .='<strong>Phone No : </strong>'.$templatic_last_appointment->Phone_number.'<br /><br />';
		}if($templatic_last_appointment->Description != ''){
			$msg .='<strong>Description : </strong>'.$templatic_last_appointment->Description.'<br /><br />';
		}
		
		global $wpdb;
		$field_table_name = $wpdb->prefix . "appointment_fields";
		$templatic_field_sql = $wpdb->get_results("select * from $field_table_name where field_backname NOT IN('Service','Date','Email','Phone_number','Description','Time') order by position");
		foreach($templatic_field_sql as $templatic_field_obj){
			$field_post_var = $templatic_field_obj->field_backname;
			if($templatic_last_appointment->$field_post_var != ''){
				$msg .='<strong>'.$templatic_field_obj->fieldname.' : </strong>'.$templatic_last_appointment->$field_post_var.'<br /><br />';
			}
		}
		
	$templatic_email_table_obj = $wpdb->prefix."appointment_email";
	$templatic_request_mail_obj = $wpdb->get_row("select * from $templatic_email_table_obj where eid = 1");
	$subject = $templatic_request_mail_obj->request_email_sub;
	
	 $to = $templatic_request_mail_obj->email;
	 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		// Additional headers
		$headers .= 'To: '.$to.' <'.$to.'>' . "\r\n";
		$headers .= 'From: '.get_option('blogname').' <'.$from.'>' . "\r\n";
 
	$mail_success = @mail($to,$subject,$msg,$headers);
	
	 if($mail_success)
	 {
		 echo "<script type='text/javascript' language='javascript'>  frmapt1();</script>";
	 }
}



$validation_info = array();
 foreach($form_fields as $key=>$val)
			{			
				$str = ''; $fval = '';
				$field_val = $key.'_val';
				$validation_info[] = array(
											   'title'	=> $val['title'],
											   'name'	=> $key,
											   'espan'	=> $key.'_error',
											   'type'	=> $val['type'],
											   'require_validation'	=> $val['require_validation'],
											   'text' => $val['text'] );
			}	
?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function(){
<?php
$js_code = '';
$cnt = count($validation_info);
//$js_code .= '//global vars ';
$js_code .= '
var frm_appointment = jQuery("#frm_appointment");'; //form Id
$jsfunction = array();
$i = 0;
for($i=0;$i<count($validation_info);$i++)
{
	$title = $validation_info[$i]['title'];
	$name = $validation_info[$i]['name'];
	$espan = $validation_info[$i]['espan'];
	$type = $validation_info[$i]['type'];
	$require_validation = $validation_info[$i]['require_validation'];
	$text = $validation_info[$i]['text'];

	$js_code .= '
	dml = document.forms[\'frm_appointment\'];
	var '.$name.' = jQuery("#'.$name.'"); ';
	$js_code .= '
	var '.$espan.' = jQuery("#'.$espan.'"); 
	';

	if($type=='selectbox' || $type=='checkbox')
	{
		$msg = sprintf($text);
	}else
	{
		$msg = sprintf($text);
	}
	
	if($type == 'multicheckbox' || $type=='checkbox' || $type=='radio')
	{
		$js_code .= '
		function validate_'.$name.'()
		{
			
			var chklength = jQuery("#'.$name.'").length;
			
			var temp	  = "";
			var i = 0;
			chk_'.$name.' = jQuery("#'.$name.'");
			
			if(chklength == 0){
			
				if ((chk_'.$name.'.checked == false)) {
					flag = 1;	
				} 
			} else {
				var flag      = 0;
				for(i=0;i<chklength;i++) {
					if ((chk_'.$name.'[i].checked == false)) { ';
						$js_code .= '
						flag = 1;	
					} else {
						flag = 0;
						break;
					}
				}
				
			}
			if(flag == 1)
			{
				'.$espan.'.text("'.$msg.'");
				'.$espan.'.addClass("message_error2");
				return false;
			}
			else{			
				'.$espan.'.text("");
				'.$espan.'.removeClass("message_error2");
				return true;
			}
			
			
		}
	';
	}else {
		$js_code .= '
		function validate_'.$name.'()
		{';
			if($require_validation == 'email') {
				$js_code .= '
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(jQuery("#'.$name.'").val() == "") { ';
					$msg = "Please provide your email address";
				$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
				return false;';
					
				$js_code .= ' } else if(!emailReg.test(jQuery("#'.$name.'").val())) { ';
					$msg = "Please provide valid email address";
					$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
					return false;';
				$js_code .= '
				} else {
					'.$name.'.removeClass("error");
					'.$espan.'.text("");
					'.$espan.'.removeClass("message_error2");
					return true;
				}';
			} if($require_validation == 'phone_no'){
				$js_code .= '
				var phonereg = /^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/;
				if(jQuery("#'.$name.'").val() == "") { ';
					$msg = $text;
					$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
				return false;';
					
				$js_code .= ' } else if(!phonereg.test(jQuery("#'.$name.'").val())) { ';
					$msg = "Enter Valid Phone No.";
					$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
					return false;';
				$js_code .= '
				} else {
					'.$name.'.removeClass("error");
					'.$espan.'.text("");
					'.$espan.'.removeClass("message_error2");
					return true;
				}';
			}if($require_validation == 'digit'){
				$js_code .= '
				var digitreg = /^[0-9.,]/;
				if(jQuery("#'.$name.'").val() == "") { ';
					$msg = $text;
				$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
				return false;';
					
				$js_code .= ' } else if(!digitreg.test(jQuery("#'.$name.'").val())) { ';
					$msg = "Enter Valid Phone No.";
					$js_code .= $name.'.addClass("error");
					'.$espan.'.text("'.$msg.'");
					'.$espan.'.addClass("message_error2");
					return false;';
				$js_code .= '
				} else {
					'.$name.'.removeClass("error");
					'.$espan.'.text("");
					'.$espan.'.removeClass("message_error2");
					return true;
				}';
			}
			$js_code .= 'if(jQuery("#'.$name.'").val() == "")';
			
		
		$js_code .= '
			{
				'.$name.'.addClass("error");
				'.$espan.'.text("'.$msg.'");
				'.$espan.'.addClass("message_error2");
				return false;
			}
			else{
				'.$name.'.removeClass("error");
				'.$espan.'.text("");
				'.$espan.'.removeClass("message_error2");
				return true;
			}
		}
		';
	}
	//$js_code .= '//On blur ';
	$js_code .= $name.'.blur(validate_'.$name.'); ';
	
	//$js_code .= '//On key press ';
	$js_code .= $name.'.keyup(validate_'.$name.'); ';
	
	$jsfunction[] = 'validate_'.$name.'()';
}

if($jsfunction)
{
	$jsfunction_str = implode(' & ', $jsfunction);	
}

//$js_code .= '//On Submitting ';
$js_code .= '	
frm_appointment.submit(function()
{
	if('.$jsfunction_str.')
	{
		return true
	}
	else
	{
		return false;
	}
});
';

$js_code .= '
});';

echo $js_code;
?>
/* ]]> */
</script>