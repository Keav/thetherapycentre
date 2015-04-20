<?php 
	$file = dirname(__FILE__);
	$file = substr($file,0,stripos($file, "wp-content"));
	require($file . "/wp-load.php");
	$service_id = trim($_REQUEST['ser_id']);
	global $wpdb;
	if(isset($_REQUEST['date_id']) && $_REQUEST['date_id'] != '')
	{
	$date_id1 = explode('q',trim($_REQUEST['date_id']));
	$date_id1 = $date_id1[0];
	$day = explode("/",$date_id1);
	$m = $day[1];
	$d = $day[0];
	$y = $day[2];
	$date_id = date('l',mktime(0,0,0,$m,$d,$y));
	
	
	$appointment_availability_table = $wpdb->prefix . "appointment_closinghours";;
	$avilable_time = "select * from $appointment_availability_table where sid='no' and day='".strtolower($date_id)."' and isclosed = '0'";
	$avilable_time_obj = $wpdb->get_row($avilable_time);
	} 
	$templatic_appointment_table = $wpdb->prefix . "appointment_dbuser_data";
//	echo $templatic_booked_time = "select * from $templatic_appointment_table where services='".$service_id."' and date = '".$date_id."'";
 	$templatic_booked_time = "select * from $templatic_appointment_table where service ='".$service_id."' and date LIKE '%".$date_id1."%' and status = '1'";
	$templatic_booked_obj = $wpdb->get_results($templatic_booked_time);
	 
	
	if(isset($_REQUEST['ser_id']))
	{ 
		$appointment_cdate_table = $wpdb->prefix . "appointment_closed_date";;
	    $close_time = "select * from $appointment_cdate_table where close_date = '".$date_id1."'";
	   	$close_time_obj = $wpdb->get_row($close_time);
	   	$result = "";
	 	$result .="<select name='templatic_time' id='templatic_time'>";
		if(mysql_affected_rows() > 0 || $avilable_time_obj == '')
		{ 
			 $result .="<option value='--Not Available --' >--Not Available--</option>";
		}
		else
		{
			$sep =  ",";
			for( $j = 0; $j < count($templatic_booked_obj) ; $j++)
			{ 
				$t .= $templatic_booked_obj[$j]->Time;
			}
			
			$date1 = explode(',',$t);
			for( $k = 0; $k < (count($date1)-1) ; $k++)
			{ 
				$l .= $date1[$k].$sep;
			}
			$date = explode(',',$l);
			$closedate1 = explode(',',$avilable_time_obj->time_available);
			$closedate = array_diff($closedate1,$date);
	
			$counter= 0;
			
			for($i = 0 ; $i <count($closedate1) ; $i++)
			{ 
				if($closedate[$i] != '')
				{
					$result .="<option value=".$closedate[$i]." >".$closedate[$i]."</option>";
					$counter ++ ;
				}
			}
			$result .="</select>";
		}
		
		print_r($result);exit;
	}
	
	
	if(isset($_REQUEST['close_id']))
	{
	$templatic_service_id = $_REQUEST['close_id'];
	if($templatic_service_id !=0)
	{
		$appointment_bhours_table = $wpdb->prefix . "appointment_bhours";
		$closehour_time = "select * from $appointment_bhours_table where sid='".$templatic_service_id."' and (isclosed = '1' or timefrom != '00:00' or timeto !='00:00' ) order by bid";
		$available_closehour_obj = $wpdb->get_results($closehour_time);
		
		if(mysql_affected_rows()>0)
		{
			foreach($available_closehour_obj as $available_closehour_obj_data)
			{
				if($available_closehour_obj_data->isclosed == '1')
				{
					_e("<p class=\"services_close\">This service is unavailable on "."".ucfirst($available_closehour_obj_data->day)."."."",'templatic')."<p/>";
				}else
				{
				 _e("<p class=\"services_close\">On ".ucfirst($available_closehour_obj_data->day."s"),'templatic'); echo ", this service is unavailable from "; _e("".$available_closehour_obj_data->timefrom."",'templatic'); _e(" to "."".$available_closehour_obj_data->timeto.".</p>",'templatic');
				}
			}
		}
	}
}
?>
<?php
if(isset($_REQUEST['fees_id']))
{
		
	if($_REQUEST['fees_id'] != "")
	{
		    $table_name = $wpdb->prefix . "appointment_services";
			$appointment_fees = "SELECT * FROM $table_name where sid='".$_REQUEST['fees_id']."' ";
			$appointmet_fees =  $wpdb->get_row($appointment_fees);
			$currencysym = get_option('ptttheme_currency_symbol');
			$a = "";
			if($appointmet_fees->apt_fees != "")
			{ 
			$a .= "<p class='app_fees' >";_e('Appointment fees for this service is  ','templatic');  echo $currencysym.$appointmet_fees->apt_fees; $a .= "</p>";
            
			}else{ 
			$a .= "<p class='app_fees' > "; _e('Appointment fees for this service is ','templatic'); echo $currencysym.'0'; $a .= "</p>"; 
			}
			
			print_r($a);exit;
	}
}else{
	
}
	if(isset($_REQUEST['close_date']))
	{
		
		global $wpdb;
		$cdate = $_REQUEST['close_date'];
		$table_closedate = $wpdb->prefix."appointment_closed_date";
		$datainsert = $wpdb->query("INSERT INTO $table_closedate (date_id,close_date,isclosed) values('','".$cdate."','1')");
		
		$max_did = $wpdb->query("select max(date_id) as date_id from $table_closedate");
		$max_did_obj = $wpdb->get_row("select max(date_id) as date_id from $table_closedate");
					
		$dataselect = $wpdb->get_results("select * from $table_closedate order by date_id asc");
		
		
		foreach($dataselect as $dataselect_obj)
		{
		echo "<tr><td id='deletedate'>";
		
	    echo 	"Closed on ".$dataselect_obj->close_date;
		?>
        </td><td><a href="#" onclick="deleteDate('<?php echo $dataselect_obj->date_id; ?>')">Cancel</a></td></tr>
        <?php
		}
	}
	
	?>