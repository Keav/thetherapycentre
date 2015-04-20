<?php	
$file = dirname(__FILE__);
	$file = substr($file,0,stripos($file, "wp-content"));
	require($file . "/wp-load.php");
	
	if(isset($_REQUEST['cdid']))
	{
		global $wpdb;
	    $table_closedate = $wpdb->prefix ."appointment_closed_date";
		$wpquery = $wpdb->query("delete from $table_closedate where date_id = '".$_REQUEST['cdid']."'");
		echo "delete from $table_closedate where date_id = '".$_REQUEST['cdid']."'";
		if(mysql_affected_rows() > 0)
		{
			$dataselect = $wpdb->get_results("select * from $table_closedate order by date_id asc");
			foreach($dataselect as $dataselect_obj)
			{
			echo "<tr><td id='deletedate'>";
			
			echo 	"Closed on ".$dataselect_obj->close_date;
			?>
			</td><td><a href="#" onclick="deleteDate('<?php echo $dataselect_obj->date_id; ?>')">Delete</a></td></tr>
			<?php
			}
		}
	}else{
		echo "Could not delete";	
	}
?>