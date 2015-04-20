<?php 
	$file = dirname(__FILE__);
	$file = substr($file,0,stripos($file, "wp-content"));
	require($file . "/wp-load.php");
	if(isset($_REQUEST['bhours_day']))
	{
		if($_REQUEST['bhours_day']== 'apCat')
		{
			echo  service_output();
		}else if($_REQUEST['bhours_day']== 'day')
		{
			echo "<td colspan='6'>"; 
        	global $wpdb;
			$templatic_bhours = $wpdb->prefix . "appointment_bhours";
			$templatic_bhours_data = $wpdb->get_results("SELECT * FROM $templatic_bhours where sid = 'No' order by bid ");	
			 echo "</td>";
		}
	}
	
	if(isset($_REQUEST['chours_day']))
	{ 
		$serid = $_REQUEST['service_id'];
		$onday = $_REQUEST['cday'];
		$choursday  = $_REQUEST['chours_day'];
		global $onday;
		$templatic_chours = $wpdb->prefix . "appointment_closinghours";
		$templatic_chours_data = $wpdb->get_results("SELECT * FROM $templatic_chours where sid = '".$serid."' and  day = '".$onday ."' order by bid ");	
	
		if(mysql_affected_rows() >0)
		{	
			$templatic_chours_update = $wpdb->query("update $templatic_chours set time_available = '".$choursday."' where day = '".$onday."' and sid = '".$serid."'");
			echo "<td style='border:1px solid black;'>";echo "Closing hours on ".ucfirst($onday)." are updated" ;echo "</td>";
		}else{
			$templatic_chours_insert = $wpdb->query("insert into $templatic_chours(bid,sid,day,time_available,isclosed) values('','".$serid."','".$onday."','".$choursday."','0') ");
		}
	
	}
	if(isset($_REQUEST['close_day']))
	{ 
		$onday = $_REQUEST['cday'];
		$templatic_chours = $wpdb->prefix . "appointment_closinghours";
		$templatic_chours_data = $wpdb->get_results("SELECT * FROM $templatic_chours where sid = 'No' and  day = '".$onday ."' order by bid ");	
		if(mysql_affected_rows() >0)
		{	
			$templatic_chours_update = $wpdb->query("update $templatic_chours set isclosed = '1' where day = '".$onday."' and sid = 'No'");
			echo "<td style='border:1px solid black;'>"; echo "Closed on " ; echo ucfirst($onday); echo "</td>";
		}else{
			$templatic_chours_insert = $wpdb->query("insert into $templatic_chours(bid,sid,day,time_available,isclosed) values('','".$serid."','".$onday."','".$choursday."','0') ");
		}
		
	}
	if(isset($_REQUEST['con_day']))
	{
		$onday = $_REQUEST['cday'];
		$templatic_chours = $wpdb->prefix . "appointment_closinghours";
		$templatic_chours_data = $wpdb->get_results("SELECT * FROM $templatic_chours where sid = 'No' and  day = '".$onday ."' order by bid ");	
		if(mysql_affected_rows() >0)
		{	
			$templatic_chours_update = $wpdb->query("update $templatic_chours set isclosed = '0' where day = '".$onday."' and sid = 'No'");
		}else{
			$templatic_chours_insert = $wpdb->query("insert into $templatic_chours(bid,sid,day,time_available,isclosed) values('','".$serid."','".$onday."','".$choursday."','0') ");
		}
	}

function service_output()
{
?>
	    <td><?php _e('Services','templatic'); ?></td>
        <td colspan="4"> 
                <?php global $wpdb;
                $table_name = $wpdb->prefix . "appointment_services";
                $sqlselectservice="SELECT * FROM $table_name order by ser_position ";	
                $sqlselectservice_data = $wpdb->get_results($sqlselectservice); ?>
                <select name="allservices" id="allservices" onchange="appointmentClosehour(this.value)">
                <option value="0"><?php _e('Select your service','templatic'); ?></option>
                <?php 
                
                foreach($sqlselectservice_data as $sqlselectservice_dataobj)
                {?>
                <option value="<?php _e($sqlselectservice_dataobj->sid,'templatic'); ?>"><?php _e($sqlselectservice_dataobj->servicename,'templatic'); ?></option>
                <?php	
                }
                ?>
            </select>
            <span class="spannote"><?php _e('Select service to view the available hours.','templatic'); ?></span>
            <div id="result_allservices">
        
            </div>
        </td>
        <td></td>
<?php } ?>