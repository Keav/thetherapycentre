<?php get_header(); ?>
<?php templ_home_page_slider(); //HOME SLIDER
$templatic_appointment_listing_accept = $wpdb->prefix."appointment_dbuser_data";
 ?>


 <div class="content right" >
	
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('index_page_content')){?><?php } else {?>  <?php }?>
   
        <?php if($_REQUEST['templ_appointment_cancel'] !="" && $_REQUEST['uid'] !="") { 
			$templatic_appointment_cancel1 = $wpdb->get_row("select * from $templatic_appointment_listing_accept where uid = '".$_REQUEST['uid']."'");
			$msg = '<h4>Appointment has been canceled</h4>';
			$msg .= htmlspecialchars_decode($t.'<br/>your appointment request has been canceled successfully.<br/>');
			
			$from = $templatic_appointment_cancel1->Email;
			$time = explode(",",$templatic_appointment_cancel1->Time);
			$msg .= $from.' has cancel an appointment on date: '.$templatic_appointment_cancel1->Date .' at time :'.$time[0];
			$msg .= "<p>Thanks for using , <a href=".site_url().">".get_option('blogname')."</a></p>";	
			$templatic_appointment_message = $appointment_email;
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
			$wpdb->query("delete from $templatic_appointment_listing_accept where uid='".$_REQUEST['uid']."'");
		
	       }else if($_REQUEST['ptype'] == 'return'){ 
		   
		   $templatic_appointment_average_time = $wpdb->prefix . "appointment_availability";
			$templatic_appointment_average = $wpdb->get_row("select * from $templatic_appointment_average_time where aid = '1'");
			$templatic_appointment_accept_ckeck = $wpdb->get_row("select * from $templatic_appointment_listing_accept where status =1 and uid = '".$_REQUEST['pid']."'");
			
			$templatic_appointment_accept_ckeck = $wpdb->get_row("select * from $templatic_appointment_listing_accept where status =1 and uid = '".$_REQUEST['pid']."'");
	
			$templatic_appointment_accept_ckeck1 = $wpdb->get_row("select * from $templatic_appointment_listing_accept where uid='".$_REQUEST['pid']."'");
	
			/*--- code to update time in backend BOF -------*/
			
			if($templatic_appointment_average->average_time == 1 )
			{
			if(strpos($templatic_appointment_accept_ckeck1->Time,",") == false)
			{ 
			$time1 = $templatic_appointment_accept_ckeck1->Time;
			$a = explode(":",$time1);
			$count = $a[1];
			$min = 0;
			$hour = 0;
			$t = "00";
			$date = str_replace('/','-',$templatic_appointment_accept_ckeck1->Date); 
		    $ti = date('H:m',strtotime($date." ". $templatic_appointment_accept_ckeck1->Time)+3600);
		    $time = $ti;
			
			$timezone1 = explode(":",$time1);
			$timezone2 = explode(":",$time);
				if($timezone1[1] == 00 && $timezone2[1] == 00){
				  $time = $timezone1[0].":30".",".$time;
				}else if($timezone1[1] > 30){
					$time =  ($timezone1[0]+1).":"."00".",".$timezone2[0].":"."30";
				}else if($timezone1[1] == 30){
					$time =  ($timezone1[0]+1).":"."00".",".$timezone2[0].":"."30";
				}else if($timezone2[1] >= 00 &&  $timezone2[1] <= 30)
				{
				  $time = $timezone2[0].":"."00";
				  $time = $timezone1[0].":30".",".$time;
				}
			}else{
			$time = $templatic_appointment_accept_ckeck1->Time;
			}
		}else{
			if(strpos($templatic_appointment_accept_ckeck1->Time,",") == false)
			{
			$time = $templatic_appointment_accept_ckeck1->Time;
			$a = explode(":",$time);
			$count = $a[1];
			$min = 0;
			$hour = 0;
			$t = "00";
			$date = str_replace('/','-',$templatic_appointment_accept_ckeck1->Date); 
			for($i=0;$i<($templatic_appointment_average->average_time*2)-1;$i++)
			{
				for($j=0;$j<count($a);$j++)
				{
					if($count == "00")
					{
						$count = "30";
						if($a[0]+$min < 10)
						$time .= ",0".($a[0]+$min).":"."30";
						else
							$time .= ",".($a[0]+$min).":"."30";
						$min++;
						break;
					}
					else
					{
						if($min == 0)
						{
							$min++;
						}
						$count = "00";
						
							
						if($a[0]+$hour+1 < 10)
							$time .= ",0".($a[0]+$hour+1).":".$t;
						else
							$time .= ",".($a[0]+$hour+1).":".$t;
												
						$hour++;
						break;
					}
				}
			} 
			}else{
			$time = $templatic_appointment_accept_ckeck1->Time;
			}
			$ti = date('H:m',strtotime($date." ". $templatic_appointment_accept_ckeck1->Time)+(3600*$templatic_appointment_average->average_time));
		    $time_end = $ti;
			$timestart = $templatic_appointment_accept_ckeck1->Time;
			    $timezone1 = explode(":",$timestart);
			    $timezone2 = explode(":",$time_end);
				
				if($timezone1[1] == 00 && $timezone2[1] == 00){
				  $time = $timezone1[0].":30".",".$time;
				}else if($timezone1[1] == 30){
				   $etime =  $timezone1[0]+$templatic_appointment_average->average_time;
					$time = $time.",".$etime.":"."30";
				}else if($timezone2[1] >= 00 &&  $timezone2[1] <= 30 && $timezone1[1] != 30){
				  $time_o = $timezone2[0].":"."00";
				  $time = $time.",". $time_o ;
				}
		
		}

		if($time1 != ""){
		
		$templatic_appointment_accept = $wpdb->query("Update $templatic_appointment_listing_accept set status =1 , Time = '".$time1.",".$time."' where uid = '".$_REQUEST['pid']."'");
		}else{
		
		$templatic_appointment_accept = $wpdb->query("Update $templatic_appointment_listing_accept set status =1 , Time = '".$time."' where uid = '".$_REQUEST['pid']."'");
		}
		/*--- code to update time in backend EOF-------*/
		
			$t = '<h4>Payment process completed successfully.</h4>';
			echo htmlspecialchars_decode($t.'<br/>your appointment payment has been received successfully we will contact you soon.<br/>');
			
			echo "Thanks for using , <a href=".site_url().">".get_option('blogname')."</a>";
		
	}else{ ?>
        
        <div class="pre-footer clearfix">
			<div class="leftie">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('index_pre_footer_left')){?><?php } else {?>  <?php }?>
 			</div>
			<div class="rightie">
	 			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('index_pre_footer_right')){?><?php } else {?>  <?php } ?>
        	</div>
		</div>
	<?php } ?>
 </div>

 <div class="sidebar left" >
 			 <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('index_page_sidebar'); }?>
        </div>
		<!--#end -->
 

<?php
function appointment_accept_mail() { 
	global $wpdb; 
	
	/*-------last record of table--------*/
	$templatic_custom_field_listing = $wpdb->prefix."appointment_fields";
	$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
	$max_id = $wpdb->query("select max(uid) as uid from $templatic_appointment_listing");
	$max_id_obj = $wpdb->get_row("select max(uid) as uid from $templatic_appointment_listing");
	$templatic_last_appointment = $wpdb->get_row("select * from $templatic_appointment_listing where uid ='".$_REQUEST['uid']."'");

	/*----------Fetch Email messages-----------*/
	
	$templatic_email_table = $wpdb->prefix."appointment_email";
	$templatic_request_mail = $wpdb->get_row("select * from $templatic_email_table where eid = 1");

	$request_email = $templatic_request_mail->active_email;
	$cancel="<a href='".site_url("index.php?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key))."'>".site_url("index.php?uid=".$templatic_last_appointment->uid."&templ_appointment_cancel=".base64_encode($templatic_last_appointment->activation_key))."</a>";
	
	
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
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$apt_date = $templatic_last_appointment->Date;
	$apt_time = $templatic_last_appointment->Time;
	//global $apt_time;
	$request_mail = str_replace('[CANCEL_URL]',$cancel,$request_usermail);
	$appointment_email_nodate = str_replace('[ADMIN_NAME]',$admin_name,$request_mail);
	$appointment_email_date = str_replace('[DATE]',$apt_date,$appointment_email_nodate );
	$appointment_email = str_replace('[TIME]',$apt_time,$appointment_email_date);
	 $to = $templatic_last_appointment->Email;
	 
	 
	$templatic_email_table_obj = $wpdb->prefix."appointment_email";
	$templatic_request_mail_obj = $wpdb->get_row("select * from $templatic_email_table_obj where eid = 1");

	$subject = $templatic_request_mail_obj->active_email_sub;
	$templatic_appointment_message = $appointment_email ;
	$from = $templatic_request_mail_obj->email;
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'To: '.$to.' <'.$to.'>' . "\r\n";		
		$headers .= 'From: '.get_option('blogname').' <'.$from.'>' . "\r\n";
	 
	 $mail_success = @mail($to,$subject,$templatic_appointment_message,$headers);

}
 get_footer(); ?>

