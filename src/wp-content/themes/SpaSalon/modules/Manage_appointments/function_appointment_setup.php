<?php
function upcoming_appointment_add_dashboard_widgets() {
	wp_add_dashboard_widget('templatic_upcoming_appointments', 'Upcoming Booking', 'upcoming_appointment_dashboard_widget');

	global $wp_meta_boxes;

	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$example_widget_backup = array('templatic_upcoming_appointments' => $normal_dashboard['templatic_upcoming_appointments']);
	unset($normal_dashboard['templatic_upcoming_appointments']);

	$sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);

	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'upcoming_appointment_add_dashboard_widgets' );

function Appointment_settings_add_admin_menu()
{
	$user_role_plugin = get_option("appointment_security_plugin") ;
	$user_role_settings = get_option("appointment_security_settings") ;
	add_submenu_page('templatic_wp_admin_menu', __("Appointment",'templatic'), __("Booking Setup",'templatic'), TEMPL_ACCESS_USER, 'Appointment', 'Appointment');

}
			   global $jal_db_version;
			   global $wpdb;

			   $table_name = $wpdb->prefix . "appointment_fields";

			   if($wpdb->get_var("SHOW TABLES LIKE \"$table_name\"") != $table_name)
			  {

				   $sql = "CREATE TABLE " . $table_name . " (
					  fid mediumint(9) NOT NULL AUTO_INCREMENT,
					  fieldname varchar(200) NOT NULL,
					  field_backname varchar(200) NOT NULL,
					  field_variablename varchar(200) NOT NULL,
					  fieldtype varchar(100) NOT NULL,
					  default_value varchar(500),
					  fldvalues varchar(1000),
					  description varchar(1000) NOT NULL,
					  isoptional int NOT NULL,
					  position int NOT NULL,
					  validation_type varchar(100) NOT NULL,
					  PRIMARY KEY fid (fid)
					);";
				   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				   dbDelta($sql);

					$sqlinsert_fld = $wpdb->query("INSERT INTO " . $table_name . "(fid,fieldname,field_backname,field_variablename,fieldtype,default_value,fldvalues,description,position,isoptional,validation_type) VALUES('','Service','Service','tmplallservices','3','','yes','Select desired service','1','1','require'),('','Date','Date','templatic_date', '6','','','Select from available dates','2','1','require'),('','Time','Time','templatic_time', '3','','','Select from available time slots','3','1','require'),('','Email','Email','templatic_email', '1','','','Notifications will be sent to this email','4','1','email'),('','Phone','Phone_number','templatic_dphone','1','','','May be used for notifications purpose','5','0','phone_no'),('','Notes/Comments','Description','templatic_comments', '2','','','','6','0','require');");
				  // dbDelta($sqlinsert_fld);

			  }
			  $table_service = $wpdb->prefix . "appointment_services";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$table_service\"") != $table_service)
			  {
			   $sqlservices = "CREATE TABLE " . $table_service . " (
				  sid mediumint(9) NOT NULL AUTO_INCREMENT,
				  servicename varchar(200) NOT NULL,
				  ser_description varchar(255) NOT NULL,
				  ser_position int NOT NULL,
				  apt_fees varchar(100) NOT NULL,
				  PRIMARY KEY sid (sid)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlservices);

			   $sql1 = "INSERT INTO " . $table_service . "(sid,servicename,ser_description,ser_position,apt_fees ) VALUES('','Hair Care', 'Hair Care', '1',''),('','Massages', 'Massages', '1',''),('','Skin Care', 'Skin Care', '1',''),('','Nail Care', 'Nail Care', '1','');";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sql1);
			  }
			   $table_email = $wpdb->prefix . "appointment_email";


			  if($wpdb->get_var("SHOW TABLES LIKE \"$table_email\"") != $table_email)
			  {


				$reqemail = "Hi "."[USER_NAME]"."<br/><p>Thank you for submitting the booking request. We will contact you soon once your request is approved or rejected. Thank you,your b request is sent successfully,we will contact you soon for confirmation.</p><p>In case you want to cancel your request, click the following link.</p>[CANCEL_URL]<br/><br/>Thank you,<br/>"."[ADMIN_NAME]";

				$activateemail = "Hi "."[USER_NAME]".",<br/><p>Your booking has been confirmed.<br/>Your booking is set on" . "[DATE] [TIME]" . "<br/>In case you want to cancel your request, click the following link.</p>[CANCEL_URL]<br/>Thank you,<br/>"."[ADMIN_NAME]";

				$cancelemail = "Hi "."[USER_NAME]".",<br/><p>Sorry, your booking was not confirmed. You can request again at any other time.</p><br/>Thank you,<br/>"."[ADMIN_NAME]";


				$templatic_admin_record = $wpdb->prefix."users";
				$templatic_users_table = $wpdb->get_var("show tables like $templatic_admin_record'");
				if($templatic_users_table == "")
				{
				$templatic_users_table = $wpdb->get_var("show tables like '%users'");
				}
				$templatic_request_usermail = $wpdb->get_row("select * from $templatic_users_table where user_login = 'admin'");
				$emailid = $templatic_request_usermail->user_email;

				$request_email_sub = "Appointment- Email Confirmation";
				$active_email_sub = "Appointment-Confirm";
				$cancel_email_sub = "Appointment- Could not confirm";
			   $sqlemail = "CREATE TABLE " . $table_email . " (
				  eid mediumint(9) NOT NULL AUTO_INCREMENT,
				  email varchar(200) NOT NULL,
				  request_email_sub varchar(250) NOT NULL,
				  request_email varchar(1000) NOT NULL,
				  active_email_sub varchar(250) NOT NULL,
				  active_email varchar(1000) NOT NULL,
				  cancel_email_sub varchar(250) NOT NULL,
				  cancel_email varchar(1000) NOT NULL,
				  PRIMARY KEY eid (eid)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlemail);

			 $table_email = $wpdb->prefix . "appointment_email";
			 $sqlemailin = "INSERT INTO " . $table_email . "(eid,email, request_email_sub,request_email,active_email_sub,active_email,cancel_email_sub,cancel_email) VALUES('','".$emailid."','".$request_email_sub."','".$reqemail."','".$active_email_sub."', '".$activateemail."','".$cancel_email_sub."','".$cancelemail."')";

			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlemailin);
			  }

			  $table_availability = $wpdb->prefix . "appointment_availability";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$table_availability\"") != $table_availability)
			  {
			   $sqlavailability = "CREATE TABLE " . $table_availability . "(
				  aid mediumint(9) NOT NULL AUTO_INCREMENT,
				  sid varchar(200) NOT NULL,
				  average_time varchar(200) NOT NULL,
				  timefrom varchar(10) NOT NULL,
				  timeto varchar(1000) NOT NULL,
				  status varchar(10) NOT NULL,
				  PRIMARY KEY aid (aid)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlavailability);

			  $sqlavailability = $wpdb->query("INSERT INTO " . $table_availability."(aid,sid,average_time,timefrom,timeto,status) VALUES('','1','1','09:00','18:00','1')");

			  }


			  $tablechours = $wpdb->prefix . "appointment_closinghours";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$tablechours\"") != $tablechours)
			  {
			   $sqlchours = "CREATE TABLE " . $tablechours . "(
				  bid mediumint(9) NOT NULL AUTO_INCREMENT,
				  sid varchar(200) NOT NULL,
				  day varchar(200) NOT NULL,
				  time_available varchar(5000) NOT NULL,
				  isclosed varchar(10) NOT NULL,
				  PRIMARY KEY bid (bid)

				);";
				   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				   dbDelta($sqlchours);

				   $sqlchoursin = "INSERT INTO " .$tablechours."(bid,sid,day, time_available,isclosed) VALUES('','No','sunday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00,18:30,19:00,19:30,20:00,20:30,21:00,21:30,22:00,22:30,23:00,23:30','1'),('','No','Monday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0'),('','No','Tuesday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0'),('','No','Wednesday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0'),('','No','Thursday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0'),('','No','Friday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0'),('','No','Saturday','09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00','0')";

				   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				   dbDelta($sqlchoursin);

			  }



			  $tablebhours = $wpdb->prefix . "appointment_bhours";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$tablebhours\"") != $tablebhours)
			  {
			   $sqlbhours = "CREATE TABLE " . $tablebhours . "(
				  bid mediumint(9) NOT NULL AUTO_INCREMENT,
				  sid varchar(200) NOT NULL,
				  day varchar(200) NOT NULL,
				  timefrom varchar(10) NOT NULL,
				  timeto varchar(1000) NOT NULL,
				  isclosed varchar(10) NOT NULL,
				  PRIMARY KEY bid (bid)

				);";
				   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				   dbDelta($sqlbhours);

				   $sqlbhoursin = "INSERT INTO " .$tablebhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','No','sunday','09:00','18:00','1'),('','No','Monday','09:00','18:00','0'),('','No','Tuesday','09:00','18:00','0'),('','No','Wednesday','09:00','18:00','0'),('','No','Thursday','09:00','18:00','0'),('','No','Friday','09:00','18:00','0'),('','No','Saturday','09:00','18:00','0')";

				   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				   dbDelta($sqlbhoursin);

			  }

			  $table_payment = $wpdb->prefix . "appointment_payment";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$table_payment\"") != $table_payment)
			  {
			     $sqlpayment = "CREATE TABLE " . $table_payment . " (
				  pid mediumint(9) NOT NULL AUTO_INCREMENT,
				  pay_amount varchar(200) NOT NULL,
				  return_url varchar(255) NOT NULL,
				  cancel_url varchar(200) NOT NULL,
				  notify_url varchar(200) NOT NULL,
				  post_title varchar(200) NOT NULL,
				  marchant_id varchar(200) NOT NULL,
				  currency varchar(10) NOT NULL,
				  is_active varchar(10) NOT NULL,
				  PRIMARY KEY pid (pid)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlpayment);

			   $sqlpaymentin = "INSERT INTO ".$table_payment."(pid,pay_amount,return_url,cancel_url,notify_url,post_title,marchant_id,currency,is_active) VALUES ('1001', '', '', '', '', '', '', '', '0')";
			    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sqlpaymentin);
			  }

			  $table_pay = $wpdb->prefix . "appointment_pay_details";
			  // if($wpdb->get_var("SHOW TABLES LIKE \"$table_availability\"") != $table_pay) << Is this "$table_availability" causing errors? Shouldn't it be "$table_pay"?
        if($wpdb->get_var("SHOW TABLES LIKE \"$table_pay\"") != $table_pay)
			  {
			   $sqlpayfees = "CREATE TABLE " . $table_pay . " (
				  pay_id mediumint(9) NOT NULL AUTO_INCREMENT,
				  user_id varchar(200) NOT NULL,
				  fees_amount varchar(200) NOT NULL,
				  f_status varchar(100) NOT NULL,
				  PRIMARY KEY pay_id (pay_id)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlpayfees);
			  }

			  $table_closedate = $wpdb->prefix . "appointment_closed_date";
			  if($wpdb->get_var("SHOW TABLES LIKE \"$table_closedate\"") != $table_closedate)
			  {
			   $sqlclosedate = "CREATE TABLE " . $table_closedate . "(
				  date_id mediumint(9) NOT NULL AUTO_INCREMENT,
				  close_date varchar(200) NOT NULL,
				  isclosed varchar(200) NOT NULL,
				  PRIMARY KEY date_id (date_id)
				);";
			   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			   dbDelta($sqlclosedate);
			  }

        add_option("appointment_db_version", "2.0");
				add_option("appointment_security_plugin","5");
				add_option("appointment_security_settings","14");
        if (isset($sql)) { // Fix for undefined variable "sql"
				$wpdb->query($sql); // Above was also causing empty query errors
        }
				update_option("appointment_db_version", "2.0");

function Appointment()
{
	global $templ_module_path;
	if($_REQUEST['page']=='Appointment')
	{
		//include_once(PLUGIN_URL_APPOINTMENT.'wp-allappointment.php');
		include 'appointment_main.php';
	}else
	{
		//include_once(PLUGIN_URL_APPOINTMENT.'wp-allappointment.php');
	}
}
/////////admin menu settings end////////////////


function templ_get_appointment_settings_info($appointment_settings)
{
	if($appointment_settings!='')
	{
		$appointment_settingsinfo = get_option('discount_appointment_settingss');
		if($appointment_settingsinfo)
		{
			foreach($appointment_settingsinfo as $key=>$value)
			{
				if($value['appointment_settingscode'] == $appointment_settings)
				{
					return $value;
				}
			}
		}
	}
	return false;
}

add_filter('templ_submit_form_emsg_filter','templ_submit_form_emsg_appointment_fun');
function templ_submit_form_emsg_appointment_fun($msg)
{
	if($_REQUEST['emsg']=='invalid_appointment_settings')
	{
		return $msg.=__('Invalid appointment_settings','templatic');
	}
}
function fetch_appointment_field_type($fieldtype){
		$field_type_array = array("0"=>"Select your field type","1"=>"Text","2"=>"Text area","3"=>"Select Box","4"=>"Check box","5"=>"Radio button","6"=>"Date");
		if($fieldtype == '1'){
			return 'Text';
		} else if($fieldtype == '2'){
			return 'Text area';
		} else if($fieldtype == '3'){
			return 'Select Box';
		} else if($fieldtype == '4'){
			return 'Check box';
		} else if($fieldtype == '5'){
			return 'Radio button';
		} else if($fieldtype == '6'){
			return 'Date';
		}
		else{
			return false;
		}
	}

function appointment_field_type_cmb($fieldtype = ''){
		$field_display = '';
		$field_type_array = array("0"=>"Select your field type","1"=>"Text","2"=>"Text area","3"=>"Select Box","4"=>"Check box","5"=>"Radio button","6"=>"Date");
		foreach($field_type_array as $fieldkey => $fieldvalue){
			if($fieldtype == $fieldkey){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			$field_display .= '<option value="'.$fieldkey.'" '.$selected.'>'.$fieldvalue.'</option>';
		}
		return $field_display;
	}

	/*-------------MODULE AUTO UPDATE START------------------------------*/
function templ_module_auto_update_appointment_settings_fun()
{
	$curversion = TEMPL_APPOINTMENT_SETTINGS_CURRENT_VERSION;
	$liveversion = tmpl_current_framework_version(TEMPL_APPOINTMENT_SETTINGS_LOG_PATH);
	$is_update = templ_is_updated( $curversion, $liveversion);
	if($is_update)
	{
?>
<table border="0" cellpadding="0" cellspacing="0" style="border:0px; padding:10px 0px;">
<thead>
	<tr>
		<td class="module"><h3><?php echo TEMPL_APPOINTMENT_SETTINGS_MODULE;?></h3></td>
	</tr>
	<tr>
		<td>
			<form method="post"  name="framework_update" id="framework_update">
			<input type="hidden" name="action" value="<?php echo TT_APPOINTMENT_SETTINGS_FOLDER;?>" />
			<input type="hidden" name="zip" value="<?php echo TEMPL_APPOINTMENT_SETTINGS_ZIP_FOLDER_PATH;?>" />
			<input type="hidden" name="log" value="<?php echo TEMPL_APPOINTMENT_SETTINGS_LOG_PATH;?>" />
			<input type="hidden" name="path" value="<?php echo TT_APPOINTMENT_SETTINGS_MODULES_PATH;?>" />
			<?php wp_nonce_field('update-options'); ?>

			<?php echo sprintf(__('<h4>A new version of Manage Appointment settings Module is available.</h4>
			<p>This updater will collect a file from the templatic.com server. It will download and extract the files to your current theme&prime;s functions folder.
			<br />We recommend backing up your theme files before updating. Only upgrade related module files if necessary.
			<br />If you are facing any problem in auto updating the framework, then please download the latest version of the theme from members area and then just overwrite the "<b>%s</b>" folder.
			<br /><br />&rArr; Your version: %s
			<br />&rArr; Current Version: %s </p>','templatic'),TT_APPOINTMENT_SETTINGS_MODULES_PATH,$curversion,$liveversion);?>

			<input type="submit" class="button" value="<?php _e('Update','templatic');?>" onclick="document.getElementById('framework_upgrade_process_span_id').style.display=''" />
			</form>
		</td>
	</tr>
	<tr>
		<td style="border-bottom:5px solid #dedede;">&nbsp;</td>
	</tr>
    </thead>
</table>
<?php
	}
}

//----------------------------------------------
     //MODULE AUTO UPDATE END//
//----------------------------------------------
add_action('templ_admin_menu', 'Appointment_settings_add_admin_menu');

function upcoming_appointment_dashboard_widget() {

	global $wpdb;
	$table_dbuserdata = $wpdb->prefix ."appointment_dbuser_data";
	?>
    <table class="widefat"  width="95%" style="font-size:12px;">
    <thead>
    <?php
	$templatic_upcoming_appointment = $wpdb->get_results("select uid,status,Service,Date,Time,Email from $table_dbuserdata where status=1 or status=0");

	$date1 = date('d/m/Y');
	$date2 = explode(" ",$templatic_upcoming_appointment_obj->Date);
	if(mysql_affected_rows() > 0)
	{
	foreach($templatic_upcoming_appointment as $templatic_upcoming_appointment_obj)
	{
			$date2 = $templatic_upcoming_appointment_obj->Date;
            $upcoming = compareDates($date1,$date2);
			if($upcoming == "yes")
			{?>

					<tr>
					<td><?php
					global $wpdb;
					$table_name = $wpdb->prefix . "appointment_services";
					$sqlservice=$wpdb->get_row("SELECT * FROM $table_name where sid ='".$templatic_upcoming_appointment_obj->Service."' ");

					_e($sqlservice->servicename,'templatic');?></td>
					<td><a href="<?php _e($_SERVER['PHP_SELF'],'templatic');?>/wp-admin/admin.php?page=Appointment"><?php _e($templatic_upcoming_appointment_obj->Date,'templatic'); ?></a></td>
					<td><?php _e($templatic_upcoming_appointment_obj->Time,'templatic');?></td>
					<td><?php _e($templatic_upcoming_appointment_obj->Email,'templatic');?></td>
                    <td><?php
					$status = $templatic_upcoming_appointment_obj->status;
					if($status == 1)
					{
						?><a href="<?php echo "admin.php?page=Appointment#all_appointments"; ?>"><?php _e('<span style="color:green;">Accepted</span>','templatic'); ?></a>
					<?php }elseif($status == 0){ ?>
						<a href="<?php echo "admin.php?page=Appointment#all_appointments"; ?>"><?php _e('<span style="color:#FF8000;">Pending</span>','templatic'); ?></a>
					<?php }else{ ?>
					  <a href="<?php echo "admin.php?page=Appointment#all_appointments"; ?>"><?php  _e('<span style="color:red;">Rejected</span>','templatic'); ?></a>
					<?php }

					?></td>
					</tr>


					<?php
			}
	}
	}else{
	?>
   	<tr><td><?php _e('No Upcoming booking','templatic'); ?></td></tr>
    <?php } ?>
    	</thead>
    </table>
    <div style="margin:5px; text-align:right">
        <a class="button rbutton" href="<?php echo "admin.php?page=Appointment#all_appointments"; ?>">View all</a>
    </div>
<?php
}

function dateDifference($startDate, $endDate)
{
            $startDate = strtotime($startDate);
            $endDate = strtotime($endDate);
            if ($startDate === false || $startDate < 0 || $endDate === false || $endDate < 0 || $startDate > $endDate)
                return false;

            $years = date('Y', $endDate) - date('Y', $startDate);

            $endMonth = date('m', $endDate);
            $startMonth = date('m', $startDate);

            // Calculate months
            $months = $endMonth - $startMonth;
            if ($months <= 0)  {
                $months += 12;
                $years--;
            }
            if ($years < 0)
                return false;

            // Calculate the days
            $measure = ($months == 1) ? 'month' : 'months';
            $days = $endDate - strtotime('+' . $months . ' ' . $measure, $startDate);
            $days = date('z', $days);

            return array($years, $months, $days);
}

function compareDates($date1,$date2) {
	$date1_array = explode("/",$date1);
	$date2_array = explode("/",$date2);
	$timestamp1 =
	mktime(0,0,0,$date1_array[1],$date1_array[2],$date1_array[0]);
	$timestamp2 =
	mktime(0,0,0,$date2_array[1],$date2_array[2],$date2_array[0]);
	if ($timestamp1>$timestamp2) {
	return false;
	} else if ($timestamp1<=$timestamp2) {
	return yes;
	} else {
	print "The dates are equal.";
	}
}
add_action('templ_module_auto_update','templ_module_auto_update_appointment_settings_fun');
function validation_type_cmb($validation_type = ''){
	$validation_type_display = '';
	$validation_type_array = array("require"=>"Require","phone_no"=>"Phone No.","digit"=>"Digit","email"=>"Email");
	foreach($validation_type_array as $validationkey => $validationvalue){
		if($validation_type == $validationkey){
			$vselected = 'selected';
		} else {
			$vselected = '';
		}
		$validation_type_display .= '<option value="'.$validationkey.'" '.$vselected.'>'.$validationvalue.'</option>';
	}
	return $validation_type_display;
}
?>
