<?php
			$file = dirname(__FILE__);
			$file = substr($file,0,stripos($file, "wp-content"));
			require($file . "/wp-load.php");			
			
			global $wpdb;
			$templatic_bhours = $wpdb->prefix . "appointment_bhours";
			if($_REQUEST['ser_id'] != 0)
			{
				$templatic_service_id = $_REQUEST['ser_id'];
				$templatic_bhours_data = $wpdb->get_results("SELECT * FROM $templatic_bhours where sid = '".$templatic_service_id ."' order by bid ");	
				mysql_affected_rows(); ?>
				<table class="submitedsuccess">
				<?php foreach($templatic_bhours_data as $templatic_bhours_data_obj)
				{ ?><tr>
					<td> <?php _e(ucfirst($templatic_bhours_data_obj->day),'templatic'); ?></td>  
					<td> <?php _e("  ".$templatic_bhours_data_obj->timefrom,'templatic'); ?></td>
					<td> <?php _e("  ".$templatic_bhours_data_obj->timeto,'templatic'); ?></td>
					<td> <?php
					if($templatic_bhours_data_obj->isclosed == 1)
					{
							_e("<span style='color:red;'>Close</span><br/>",'templatic');
					}elseif(($templatic_bhours_data_obj->timefrom != "00:00") || ($templatic_bhours_data_obj->timeto != "00:00" )){
						_e("<span style='color:red;'>Close</span><br/>",'templatic');
						
					}elseif(($templatic_bhours_data_obj->timeto != "0")  || ($templatic_bhours_data_obj->timeto != "0")){
						_e("<span style='color:green;'>Open</span><br/>",'templatic');
					}
					else{
						_e("<span style='color:green;'>Open</span><br/>",'templatic');
					}
					
				?>
                </td>
                </tr>
			<?php }
			}else{
				_e("No Bussiness hour setup for this category",'templatic');
			}

?></table>