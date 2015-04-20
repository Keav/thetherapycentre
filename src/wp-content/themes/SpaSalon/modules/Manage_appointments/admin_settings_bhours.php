<script type="text/javascript">
function appointmentClosehour(str)
{ 
	var service_id = document.getElementById('allservices').value;

	if (str=="")
	  {
	  document.getElementById("result_allservices").innerHTML="";
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
		document.getElementById("result_allservices").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_services_closehour.php?ser_id="+str+"&s_id="+str
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}

function appointmentbhourstype(str)
{  
	if(document.getElementById('bhourtype').checked == true)
	{
		var btype_id = document.getElementById('bhourtype').value;
		
	}else if(document.getElementById('bhourtype2').checked == true){
		
		var btype_id = document.getElementById('bhourtype2').value;
		
	}
	
	if (str=="")
	  {
	  document.getElementById("bhourtypeDiv").innerHTML="";
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
		document.getElementById("bhourtypeDiv").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_set_bhours.php?bhours_day="+btype_id+"&bhours_cat="+str
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}

/*function foronload(str)
{
	document.getElementById('paypal_active').checked = false;
	if(document.getElementById('bhourtype').checked == true){
		
		var btype_id = document.getElementById('bhourtype').value;
	}
	if (str=="")
	  {
	  document.getElementById("bhourtypeDiv").innerHTML="";
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
		document.getElementById("bhourtypeDiv").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_set_bhours.php?bhours_day="+btype_id+"&bhours_cat="+str
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}*/

</script>

<div class='headerdivh3'>
	<h3><?php _e('Business Closing Hour Setup','templatic');?></h3>       
     <p><?php _e('Here you can set the closing hours based on your availability.','templatic');?></p>             
</div> 
 <?php _e('How do you want to set business closing hours ?','templatic');?> <br /> <br />
<p>
  <label>
    <input type="radio" name="bhourtype" value="day" id="bhourtype" checked="CHECKED" onClick="appointmentbhourstype(this.value)" />
    <?php _e('Set day-wise','templatic');?></label>
  <br /> <br />
  <label>
    <input type="radio" name="bhourtype" value="apCat" id="bhourtype2" onClick="appointmentbhourstype(this.value)"  />
    <?php _e('Set category-wise','templatic');?></label>
  <br />
</p>
 
<?php echo admin_form_bhours();
function admin_form_bhours(){
			global $wpdb;
			$table_bhours = $wpdb->prefix . "appointment_bhours";
			$sqlbhours ="SELECT * FROM $table_bhours";	
			$sqleditbhours = $wpdb->get_row($sqlbhours);

			 if(isset($_REQUEST['success']))
			 { ?>
			 	<?php	switch ($_REQUEST['success'])
					{
					 case "bhourupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					  case "bhourinserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Inserted successfully
                     </div>";
					 break;
					}
			}?> 
<body onLoad="foronload(this.value)">
<form name="form1" method="post" action="">
<table width="90%" border="0">
<tr id="bhourtypeDiv">
 
</tr>
<tr>   
    <td class="dayback" colspan="6"><?php _e('Sunday','templatic');?></td>
    </tr>
    <tr>
      <td colspan="6" class="dayfrom"> <span class="spannote"><?php _e('Select closing hours on Sunday','templatic'); ?></span> </td>
    </tr>
    <tr>
        <td class="dayfrom">
          <?php _e('From:','templatic');?></td>
          <td style="width:100px;">
         <select name="sun_openingtime" id="sun_openingtime" style="width:70px;">
          <?php  _e(time_format(),'templatic'); ?>
          </select></td>
          <td class="dayfrom" style="width:20px;">       
         <?php _e('To:','templatic'); ?></td>
         <td>
         <select name="sun_closingtime" id="sun_closingtime" style="width:70px;">
         <?php  _e(time_format(),'templatic') ?> 
         </select> 
         
         </td>
         <td colspan="2"><input name="sunclose" id="sunclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
             <input type="hidden" name="txtsunday" id="txtsunday" value="sunday" />
            
         </td>
   </tr>
    
    <tr>
     <td class="dayback" colspan="6"><?php _e('Monday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Monday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td class="dayfrom">
          <?php _e('From:','templatic');?></td>
          <td class="dayfrom">
         <select name="mon_openingtime" id="mon_openingtime" style="width:70px;">
          <?php  _e(time_format(),'templatic'); ?>
          </select></td>
          <td class="dayfrom">       
         <?php _e('To:','templatic'); ?></td>
         <td>
         <select name="mon_closingtime" id="mon_closingtime" style="width:70px;">
         <?php  _e(time_format(),'templatic') ?> 
         </select>  
         </td>
         <td colspan="2"><input name="monclose" id="monclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
          <input type="hidden" name="txtmonday" id="txtmonday" value="monday" /></td>
    </tr>
    
    <tr>
    <td class="dayback" colspan="6"><?php _e('Tuesday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Tuesday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
      <td class="dayfrom">
      <?php _e('From:','templatic');?></td>
      <td style="width:100px;">
	 <select name="tues_openingtime" id="tues_openingtime" style="width:70px;">
      <?php  _e(time_format(),'templatic'); ?>
	  </select></td>
      <td class="dayfrom">       
	 <?php _e('To:','templatic'); ?></td>
     <td>
     <select name="tues_closingtime" id="tues_closingtime" style="width:70px;">
     <?php  _e(time_format(),'templatic') ?> 
     </select>  
     </td>
     <td colspan="2"><input name="tueclose" id="tueclose" type="checkbox" class="hours_close" value="1" ><?php _e('Check if closed for full day.','templatic'); ?>
      <input type="hidden" name="txttuesday" id="txttuesday" value="tuesday"/></td>
    </tr>
    
	<tr>
    <td class="dayback" colspan="6"><?php _e('Wednesday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Wednesday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td class="dayfrom">
          <?php _e('From:','templatic');?></td>
          <td style="width:100px;">
         <select name="wed_openingtime" id="wed_openingtime" style="width:70px;">
          <?php  _e(time_format(),'templatic'); ?>
          </select></td>
          <td class="dayfrom">       
         <?php _e('To:','templatic'); ?></td>
         <td>
         <select name="wed_closingtime" id="wed_closingtime" style="width:70px;">
         <?php  _e(time_format(),'templatic') ?> 
         </select>  
         </td>
         <td  colspan="2"><input name="wedclose" id="wedclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
          <input type="hidden" name="txtwednesday" id="txtwednesday" value="wednesday" /></td>
   </tr>
     
	<tr>
    	<td class="dayback" colspan="6"><?php _e('Thursday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Thursday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
          <td class="dayfrom">
          <?php _e('From:','templatic');?></td>
          <td style="width:100px;">
         <select name="thur_openingtime" id="thur_openingtime" style="width:70px;">
          <?php  _e(time_format(),'templatic'); ?>
          </select></td>
          <td class="dayfrom">       
         <?php _e('To:','templatic'); ?></td>
         <td>
         <select name="thur_closingtime" id="thur_closingtime" style="width:70px;">
         <?php  _e(time_format(),'templatic') ?> 
         </select>  
         </td>
         <td colspan="2"><input nname="thurclose" id="thurclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
          <input type="hidden" name="txtthursday" id="txtthursday" value="thursday" /></td>
   </tr>
        
    <tr>
   		 <td class="dayback" colspan="6"><?php _e('Friday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Friday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
   	  <td class="dayfrom">
      <?php _e('From:','templatic');?></td>
      <td style="width:100px;">
	 <select name="fri_openingtime" id="fri_openingtime" style="width:70px;">
      <?php  _e(time_format(),'templatic'); ?>
	  </select></td>
      <td class="dayfrom">       
	 <?php _e('To:','templatic'); ?></td>
     <td>
     <select name="fri_closingtime" id="fri_closingtime" style="width:70px;">
     <?php  _e(time_format(),'templatic') ?> 
     </select>  
     </td>
     <td colspan="2"><input name="friclose" id="friclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
      <input type="hidden" name="txtfriday" id="txtfriday" value="friday"/></td>
   </tr>
        
   <tr>
    <td class="dayback" colspan="6"><?php _e('Saturday','templatic');?></td>
   </tr>
    
    <tr>
      <td colspan="6" class="dayfrom"><span class="spannote">
        <?php _e('Select closing hours on Saturday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td class="dayfrom">
          <?php _e('From:','templatic');?></td>
          <td style="width:100px;">
         <select name="sat_openingtime" id="sat_openingtime" style="width:70px;">
          <?php  _e(time_format(),'templatic'); ?>
          </select></td>
          <td class="dayfrom">       
         <?php _e('To:','templatic'); ?></td>
         <td>
         <select name="sat_closingtime" id="sat_closingtime" style="width:70px;">
         <?php  _e(time_format(),'templatic') ?> 
         </select>  
         </td>
         <td colspan="2"><input name="satclose" id="satclose" type="checkbox" value="1" class="hours_close" ><?php _e('Check if closed for full day.','templatic'); ?>
          <input type="hidden" name="txtsaturday" id="txtsaturday" value="saturday" /></td>
   </tr>
   
  <tr>
    <td colspan="6">
	
        <input type="submit" name="btnsaveclose_hours" class="button-framework-imp" id="btnsaveclose_hours" value="Save All Changes">
 
    </td>
  </tr>
</table>
</form>
</body>
<?php } 
if(isset($_POST['btnsaveclose_hours']))
{ 	
	if($_POST['allservices'] != "")
	{
		global $wpdb;
		if(isset($_POST['txtsunday']))
		{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtsunday'];
			$sunopening = $_POST['sun_openingtime'];
			$sunclosing = $_POST['sun_closingtime'];
			if(isset($_POST['sunclose']))
			{
			$isclose = $_POST['sunclose'];
			}else
			{
				$isclose='0';
			}
			$table_bhours = $wpdb->prefix."appointment_bhours";
			$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
			$bhoursupadte =$wpdb->get_row($checkrecord);
			if(mysql_affected_rows() > 0)
			{
				$bhoursupadte = $wpdb->get_row($checkrecord);
				$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$sunopening."', timeto = '".$sunclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
			}else{
				$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$sunopening."','".$sunclosing."','".$isclose."')");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
			}
			
		}
		if(isset($_POST['txtmonday']))
		{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtmonday'];
			$monopening = $_POST['mon_openingtime'];
			$monclosing = $_POST['mon_closingtime'];
			if(isset($_POST['monclose']))
			{
			$isclose = '1';
			}else
			{
				$isclose='0';
			}
			$table_bhours = $wpdb->prefix."appointment_bhours";
			$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
			$bhoursupadte =$wpdb->get_row($checkrecord);
			if(mysql_affected_rows() > 0)
			{
				$bhoursupadte = $wpdb->get_row($checkrecord);
				$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$monopening."', timeto = '".$monclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
			}else{
				$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$monopening."','".$monclosing."','".$isclose."')");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
			}
			
		}
		if(isset($_POST['txttuesday']))
		{
			$forservice = $_POST['allservices'];
			$day = $_POST['txttuesday'];
			$tuesopening = $_POST['tues_openingtime'];
			$tuesclosing = $_POST['tues_closingtime'];
				if(isset($_POST['tuesclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$tuesopening."', timeto = '".$tuesclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$tuesopening."','".$tuesclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtwednesday']))
			{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtwednesday'];
			$wedopening = $_POST['wed_openingtime'];
			$wedclosing = $_POST['wed_closingtime'];
				if(isset($_POST['wedclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$wedopening."', timeto = '".$wedclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$wedopening."','".$wedclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtthursday']))
			{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtthursday'];
			$thuropening = $_POST['thur_openingtime'];
			$thurclosing = $_POST['thur_closingtime'];
				if(isset($_POST['thurclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$thuropening."', timeto = '".$thurclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$thuropening."','".$thurclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtfriday']))
			{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtfriday'];
			$friopening = $_POST['fri_openingtime'];
			$friclosing = $_POST['fri_closingtime'];
				if(isset($_POST['friclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$friopening."', timeto = '".$friclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$friopening."','".$friclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			
			if(isset($_POST['txtsaturday']))
			{
			$forservice = $_POST['allservices'];
			$day = $_POST['txtsaturday'];
			$satopening = $_POST['sat_openingtime'];
			$satclosing = $_POST['sat_closingtime'];
				if(isset($_POST['satclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
			$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$satopening."', timeto = '".$satclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$satopening."','".$satclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
	}else{
		if(isset($_POST['txtsunday']))
		{
			$forservice = 'No';
			$day = $_POST['txtsunday'];
			$sunopening = $_POST['sun_openingtime'];
			$sunclosing = $_POST['sun_closingtime'];
			if(isset($_POST['sunclose']))
			{
			$isclose = $_POST['sunclose'];
			}else
			{
				$isclose='0';
			}
			$table_bhours = $wpdb->prefix."appointment_bhours";
			$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
			$bhoursupadte =$wpdb->get_row($checkrecord);
			if(mysql_affected_rows() > 0)
			{
				$bhoursupadte = $wpdb->get_row($checkrecord);
				$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$sunopening."', timeto = '".$sunclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
			}else{
				$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$sunopening."','".$sunclosing."','".$isclose."')");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
			}
			
		}
		if(isset($_POST['txtmonday']))
		{
			$forservice = 'No';
			$day = $_POST['txtmonday'];
			$monopening = $_POST['mon_openingtime'];
			$monclosing = $_POST['mon_closingtime'];
			if(isset($_POST['monclose']))
			{
			$isclose = '1';
			}else
			{
				$isclose='0';
			}
			$table_bhours = $wpdb->prefix."appointment_bhours";
			$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
			$bhoursupadte =$wpdb->get_row($checkrecord);
			if(mysql_affected_rows() > 0)
			{
				$bhoursupadte = $wpdb->get_row($checkrecord);
				$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$monopening."', timeto = '".$monclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
			}else{
				$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$monopening."','".$monclosing."','".$isclose."')");
				echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
			}
			
		}
		if(isset($_POST['txttuesday']))
		{
			$forservice = 'No';
			$day = $_POST['txttuesday'];
			$tuesopening = $_POST['tues_openingtime'];
			$tuesclosing = $_POST['tues_closingtime'];
				if(isset($_POST['tuesclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$tuesopening."', timeto = '".$tuesclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$tuesopening."','".$tuesclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtwednesday']))
			{
			$forservice = 'No';
			$day = $_POST['txtwednesday'];
			$wedopening = $_POST['wed_openingtime'];
			$wedclosing = $_POST['wed_closingtime'];
				if(isset($_POST['wedclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$wedopening."', timeto = '".$wedclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$wedopening."','".$wedclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtthursday']))
			{
			$forservice = 'No';
			$day = $_POST['txtthursday'];
			$thuropening = $_POST['thur_openingtime'];
			$thurclosing = $_POST['thur_closingtime'];
				if(isset($_POST['thurclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$thuropening."', timeto = '".$thurclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$thuropening."','".$thurclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			if(isset($_POST['txtfriday']))
			{
			$forservice = 'No';
			$day = $_POST['txtfriday'];
			$friopening = $_POST['fri_openingtime'];
			$friclosing = $_POST['fri_closingtime'];
				if(isset($_POST['friclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
				$table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$friopening."', timeto = '".$friclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$friopening."','".$friclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
			
			if(isset($_POST['txtsaturday']))
			{
			$forservice = 'No';
			$day = $_POST['txtsaturday'];
			$satopening = $_POST['sat_openingtime'];
			$satclosing = $_POST['sat_closingtime'];
				if(isset($_POST['satclose']))
				{
				$isclose = '1';
				}else
				{
					$isclose='0';
				}
			    $table_bhours = $wpdb->prefix."appointment_bhours";
				$checkrecord = "select * from $table_bhours where sid ='".$forservice."' and day='".$day."'";
				$bhoursupadte =$wpdb->get_row($checkrecord);
				if(mysql_affected_rows() > 0)
				{
					$bhoursupadte = $wpdb->get_row($checkrecord);
					$sqlbhoursupdate = $wpdb->query("UPDATE ".$table_bhours." SET sid='".$forservice."',day ='".$day."', timefrom='".$satopening."', timeto = '".$satclosing."', isclosed='".$isclose."' where bid='".$bhoursupadte->bid."' ");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourupdated#bhour_setup';</script>";
				}else{
					$sqlbhoursin = $wpdb->query("INSERT INTO " .$table_bhours."(bid,sid,day,timefrom,timeto,isclosed) VALUES('','".$forservice."','".$day."','".$satopening."','".$satclosing."','".$isclose."')");
					echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=bhourinserted#bhour_setup';</script>";
				}
			
			}
	}
		
}
?>