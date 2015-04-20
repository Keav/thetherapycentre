<script>
function deleteDate(str)
{ 

	if (str=="")
	  {
	  document.getElementById("deletedate").innerHTML="";
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
		document.getElementById("deletedate").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_date.php?cdid="+str+"&date_id="+str
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}
</script>
<script>

function showDate(str)
{ 
	var close_date = document.getElementById('templatic_closedate').value;
	var ondate = document.getElementById('templatic_closedate').value;
	
	if (str=="")
	  {
	  document.getElementById("templaticclosedatediv").innerHTML="";
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
		document.getElementById("templaticclosedatediv").innerHTML=xmlhttp.responseText;
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_appointment_time.php?close_date="+close_date+"&date_id="+ondate
	 
	  xmlhttp.open("GET",url+"q=1"+str,true);
	  xmlhttp.send();
}


function appointmentChours(str,day,dayname)
{ 
	var dayvalue = document.getElementById(day).options.length;
	var dayof = document.getElementById(day);
	var serid = document.getElementById('txtcategory').value;
	i = 0;
	chosen = "";
	
	for (i = 0; i < dayvalue; i++) 
	{ 
		if (dayof.options[i].selected) {
		chosen = chosen + dayof.options[i].value + ",";
		}
	}

	  if (str=="")
	  {
	  document.getElementById("chourtypeDiv").innerHTML="";
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
			if(day == "sun_chours")
			{
			document.getElementById("sunclosehours").style.display="block";
			document.getElementById("sunclosehours").innerHTML=xmlhttp.responseText;
			}else if(day == "mon_chours"){
				document.getElementById("monclosehours").style.display="block";
			document.getElementById("monclosehours").innerHTML=xmlhttp.responseText;
			}else if(day == "tues_chours"){
			document.getElementById("tuesclosehours").style.display="block";	
			document.getElementById("tuesclosehours").innerHTML=xmlhttp.responseText;	
			}else if(day == "wed_chours"){
			document.getElementById("wedclosehours").style.display="block";		
			document.getElementById("wedclosehours").innerHTML=xmlhttp.responseText;	
			}else if(day == "thur_chours"){
			document.getElementById("thurclosehours").style.display="block";		
			document.getElementById("thurclosehours").innerHTML=xmlhttp.responseText;	
			}else if(day == "fri_chours"){
				document.getElementById("friclosehours").style.display="block";
			document.getElementById("friclosehours").innerHTML=xmlhttp.responseText;	
			}else if(day == "sat_chours"){
				document.getElementById("satclosehours").style.display="block";
			document.getElementById("satclosehours").innerHTML=xmlhttp.responseText;	
			}		
		}
	  }
	  url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_set_bhours.php?chours_day="+chosen+"&cday="+dayname+"&service_id="+serid
	  xmlhttp.open("GET",url+"&q=1",true);
	  xmlhttp.send();
}


function chkclose(closeon,closeday)
{ 

	if(document.getElementById(closeon).value == "sundayclose")
	{
		 if(document.getElementById(closeon).checked == true)
		 {
			 var close_id = document.getElementById(closeon).value;
		 	 document.getElementById("sun_chours").disabled = 1;
			 document.getElementById("sun_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("sunclosehours").style.display="block";
			
		 }else{
			 var close_id = document.getElementById(closeon).value;
			document.getElementById("sun_chours").style.backgroundColor = "#FFFFFF";
			document.getElementById("sun_chours").disabled = 0;
		 }

	}else if(document.getElementById(closeon).value == "mondayclose")
	 {
		  if(document.getElementById(closeon).checked == true)
		 {  
			  var close_id = document.getElementById(closeon).value;
			 document.getElementById("mon_chours").disabled = 1;
			 document.getElementById("mon_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("monclosehours").style.display="block";
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("mon_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("mon_chours").disabled = 0;
			
		 }
	 }else if(document.getElementById(closeon).value == "tuesdayclose")
	 {
		
		 if(document.getElementById(closeon).checked == true)
		 {
			  var close_id = document.getElementById(closeon).value;
			 document.getElementById("tues_chours").disabled = 1;
			 document.getElementById("tues_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("tuesclosehours").style.display="block";
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("tues_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("tues_chours").disabled = 0;
			
		 }
	 }else if(document.getElementById(closeon).value == "wednesdayclose")
	 {
		
		 if(document.getElementById(closeon).checked == true)
		 {
			 	 var close_id = document.getElementById(closeon).value;
			 document.getElementById("wed_chours").disabled = 1;
			 document.getElementById("wed_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("wedclosehours").style.display="block";
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("wed_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("wed_chours").disabled = 0;
			
		 }
	 }else if(document.getElementById(closeon).value == "thursdayclose")
	 {
		
		 if(document.getElementById(closeon).checked == true)
		 {
			  var close_id = document.getElementById(closeon).value;
			 document.getElementById("thur_chours").disabled = 1;
			 document.getElementById("thur_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("thurclosehours").style.display="block";
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("thur_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("thur_chours").disabled = 0;
			
		 }
		 
	 }else if(document.getElementById(closeon).value == "fridayclose")
	 {

		 if(document.getElementById(closeon).checked == true)
		 {
			  var close_id = document.getElementById(closeon).value;
			 document.getElementById("fri_chours").disabled = 1;
			 document.getElementById("fri_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("friclosehours").style.display="block";
			 
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("fri_chours").style.backgroundColor = "#FFFFFF";
			 
			 document.getElementById("fri_chours").disabled = 0;
			
		 }
	 }else if(document.getElementById(closeon).value == "saturdayclose")
	 {
		 if(document.getElementById(closeon).checked == true)
		 {
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("sat_chours").disabled = 1;
			 document.getElementById("sat_chours").style.backgroundColor = "#bcbcbc";
			 document.getElementById("satclosehours").style.display="block";
			 
		 }else if(document.getElementById(closeon).checked == false){
			 var close_id = document.getElementById(closeon).value;
			 document.getElementById("sat_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("sat_chours").disabled = 0;
			
		 }
	 }
	   if (closeon == "")
	  {
	  document.getElementById("chourtypeDiv").innerHTML="";
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
			if(closeon == "sundayclose")
			{
			document.getElementById("sunclosehours").style.display="block";
			document.getElementById("sunclosehours").innerHTML=xmlhttp.responseText;
			}else if(closeon == "mondayclose"){
				document.getElementById("monclosehours").style.display="block";
			document.getElementById("monclosehours").innerHTML=xmlhttp.responseText;
			}else if(closeon == "tuesdayclose"){
				document.getElementById("tuesclosehours").style.display="block";
			document.getElementById("tuesclosehours").innerHTML=xmlhttp.responseText;	
			}else if(closeon == "wednesdayclose"){
				document.getElementById("wedclosehours").style.display="block";
			document.getElementById("wedclosehours").innerHTML=xmlhttp.responseText;	
			}else if(closeon== "thursdayclose"){
				document.getElementById("thurclosehours").style.display="block";
			document.getElementById("thurclosehours").innerHTML=xmlhttp.responseText;	
			}else if(closeon == "fridayclose"){
				document.getElementById("friclosehours").style.display="block";
			document.getElementById("friclosehours").innerHTML=xmlhttp.responseText;	
			}else if(closeon == "saturdayclose"){
				document.getElementById("saturdayclose").style.display="block";
			document.getElementById("satclosehours").innerHTML=xmlhttp.responseText;	
			}		
		}
	  }
	   if(document.getElementById(closeon).checked == true)
		{
	  		url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_set_bhours.php?close_day="+close_id+"&cday="+closeday
		}else
		{
			 url = "<?php echo get_template_directory_uri(); ?>/modules/Manage_appointments/ajax_set_bhours.php?con_day="+close_id+"&cday="+closeday
		}
	  xmlhttp.open("GET",url+"&q=1",true);
	  xmlhttp.send();
	
}


function foronload()
{
		
		if(document.getElementById('paypal_active').checked == true)
		{
			document.getElementById('paypal_settings').style.display = "block"; 
			
		}else if(document.getElementById('paypal_active').checked == false)
		{
			document.getElementById('paypal_settings').style.display = 'none';
		}
	
	
		 if(document.getElementById("sundayclose").checked == true)
		 {
		 	 document.getElementById("sun_chours").disabled = 1;
			 document.getElementById("sun_chours").style.backgroundColor = "#bcbcbc";
			
		 }else{
			 var close_id = document.getElementById(closeon).value;
			document.getElementById("sun_chours").style.backgroundColor = "#FFFFFF";
			document.getElementById("sun_chours").disabled = 0;
		 }

	
		  if(document.getElementById("mondayclose").checked == true)
		 { 
	
			 document.getElementById("mon_chours").disabled = 1;
			 document.getElementById("mon_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){
			 document.getElementById("mon_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("mon_chours").disabled = 0;
			
		 }
	
		
		 if(document.getElementById("tuesdayclose").checked == true)
		 {
			 document.getElementById("tues_chours").disabled = 1;
			 document.getElementById("tues_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){

			 document.getElementById("tues_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("tues_chours").disabled = 0;
			
		 }
	
		 if(document.getElementById("wednesdayclose").checked == true)
		 {
			 document.getElementById("wed_chours").disabled = 1;
			 document.getElementById("wed_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){
			 document.getElementById("wed_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("wed_chours").disabled = 0;
			
		 }
	
		
		 if(document.getElementById("thursdayclose").checked == true)
		 {
			 document.getElementById("thur_chours").disabled = 1;
			 document.getElementById("thur_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){
			 document.getElementById("thur_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("thur_chours").disabled = 0;
			
		 }
	

		 if(document.getElementById("fridayclose").checked == true)
		 {
			 document.getElementById("fri_chours").disabled = 1;
			 document.getElementById("fri_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){
			 document.getElementById("fri_chours").style.backgroundColor = "#FFFFFF";
			 
			 document.getElementById("fri_chours").disabled = 0;
			
		 }
		 if(document.getElementById("saturdayclose").checked == true)
		 {
			 document.getElementById("sat_chours").disabled = 1;
			 document.getElementById("sat_chours").style.backgroundColor = "#bcbcbc";
		 }else if(document.getElementById(closeon).checked == false){
			 document.getElementById("sat_chours").style.backgroundColor = "#FFFFFF";
			 document.getElementById("sat_chours").disabled = 0;
			
		 }
	
}
</script>
<div class='headerdivh3'>
	<h3><?php _e('Business Closing Hour Setup','templatic');?></h3>           
     <p><?php _e('Here you can set the closing hours based on your availability.','templatic');?></p>    
     <p><b><?php _e('Selected = Available time, Not Selected = Unavailable time','templatic');?></b></p>          
</div> 

 
<?php echo admin_form_close();
function admin_form_close(){
			global $wpdb;
			global $onday;
			$table_bhours = $wpdb->prefix . "appointment_bhours";
			$sqlbhours ="SELECT * FROM $table_bhours";	
			$sqleditbhours = $wpdb->get_row($sqlbhours);

			 if(isset($_REQUEST['success']))
			 { ?>
			 	<?php	switch ($_REQUEST['success'])
					{
					 case "chourupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Changes have been saved
                     </div>";
					 break;
					  case "chourinserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Inserted successfully
                     </div>";
					 break;
					}
			}?> 
<body onLoad="foronload()">
<form name="frm_chour" id="frm_chour" method="post" action="">
<input name="txtcategory" id="txtcategory" type="hidden" border="0" value="No" >
<table width="90%" border="0">
<tr>   
    	<td class="dayback" colspan="3"><?php _e('Sunday','templatic');?></td>
    </tr>
    <tr>
      <td colspan="3" class="dayfrom"> <span class="spannote"><?php _e('Set closing hours on Sunday','templatic'); ?></span>
       </td>
    </tr>
    <tr>
        <td width="746" style="width:100px;">
     
          <select name="sun_chours" size="4"  multiple="multiple" id="sun_chours" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'sun_chours','sunday')">
           
          <?php  _e(bhours("sunday"),'templatic'); ?>
          </select>
          
          <?php ?>
          </td>
        <td width="746" style="width:100px;">
        <label>
       </label>
        <?php  chkis_close('sunClose','sundayclose','sunday'); ?>
        <div id="closeonsunday">
       
         
        </div>
        </td>
          <td width="746" style="width:100px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries.','templatic'); ?> </span></td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;<div id="sunclosehours" class="close_message"></div></td>
    </tr>
    <tr>
     <td class="dayback" colspan="3"><?php _e('Monday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Monday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td class="dayfrom">
         <select name="mon_chours[]" id="mon_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'mon_chours','monday')">
          <?php  _e(bhours("monday"),'templatic'); ?>
          </select>
          </td>
        <td class="dayfrom"><label>         <?php  chkis_close('monClose','mondayclose','monday'); ?></label></td>
          <td class="dayfrom"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
    
    <tr>
      <td colspan="3">  <div id="monclosehours" class="close_message"></div></td>
    </tr>
    <tr>
    <td class="dayback" colspan="3"><?php _e('Tuesday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Tuesday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
      <td style="width:100px;">
        <select name="tues_chours[]" id="tues_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'tues_chours','tuesday')">
          <?php  _e(bhours("tuesday"),'templatic'); ?>
      </select>
      
      </td>
      <td style="width:100px;"><label> <?php  chkis_close('tueClose','tuesdayclose','tuesday'); ?></label></td>
      <td style="width:100px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
    
	<tr>
	  <td colspan="3">&nbsp;  <div id="tuesclosehours" class="close_message"></div></td>
    </tr>
	<tr>
    <td class="dayback" colspan="3"><?php _e('Wednesday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Wednesday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td style="width:100px;">
         <select name="wed_chours" id="wed_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'wed_chours','wednesday')">
          <?php  _e(bhours("wednesday"),'templatic'); ?>
          </select>
           
          </td>
        <td style="width:100px;"><label> <?php  chkis_close('wedClose','wednesdayclose','wednesday'); ?></label></td>
          <td style="width:100px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
     
	<tr>
	  <td colspan="3">&nbsp; <div id="wedclosehours" class="close_message"></div></td>
    </tr>
	<tr>
    	<td class="dayback" colspan="3"><?php _e('Thursday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Thursday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
          <td style="width:100px;">
         <select name="thur_chours[]" id="thur_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'thur_chours','thursday')">
          <?php  _e(bhours("thursday"),'templatic'); ?>
          </select>
          </td>
          <td style="width:100px;"><label> <?php  chkis_close('thursClose','thursdayclose','thursday'); ?></label></td>
          <td style="width:100px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
        
    <tr>
      <td colspan="3">&nbsp;   <div id="thurclosehours" class="close_message"></div></td>
    </tr>
    <tr>
   		 <td class="dayback" colspan="3"><?php _e('Friday','templatic');?></td>
    </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Friday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
   	  <td style="width:100px;">
        <select name="fri_chours[]" id="fri_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'fri_chours','friday')">
          <?php  _e(bhours("friday"),'templatic'); ?>
      </select>
      
      </td>
   	  <td style="width:100px;"><label>  <?php  chkis_close('friClose','fridayclose','friday'); ?></label></td>
      <td style="width:100px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
        
    <tr>
      <td colspan="3"> <div id="friclosehours" class="close_message"></div></td>
    </tr>
    <tr>
    <td class="dayback" colspan="3"><?php _e('Saturday','templatic');?></td>
   </tr>
    
    <tr>
      <td colspan="3" class="dayfrom"><span class="spannote">
        <?php _e('Set closing hours on Saturday','templatic'); ?>
      </span></td>
    </tr>
    <tr>
        <td style="width:300px;">
         <select name="sat_chours" id="sat_chours" multiple="multiple" style="width:150px; height:100px; overflow:scroll;" onChange="appointmentChours(this.value,'sat_chours','saturday')">
          <?php  _e(bhours("saturday"),'templatic'); ?>
          </select>
          
          </td>
        <td style="width:300px;"><label> <?php  chkis_close('satClose','saturdayclose','saturday'); ?></label></td>
          <td style="width:300px;"><span class="spannote"><?php _e('Use CTRL+Click (or CMD+Click on Mac) to set multiple entries','templatic'); ?> </span></td>
    </tr>
    <tr>
      <td colspan="3" style="width:300px;">&nbsp;  <div id="satclosehours" class="close_message"></div></td>
    </tr>
   
  
</table>
</form>
<form id="frmclosedate" name="frmclosedate" action="#" method="post">
<div style="padding-top:40px;"><h3> <?php _e('Closing hour setup according to date','templatic');?></h3> </div>

<table>
<tr>
<td>
<?php _e('Select date :','templatic'); ?>

</td>
<td>
<?php
	echo "<div class=\"left\">";
    echo  "\t\t".'<div id="calender_app" class="cal_img left" >';
	echo "<input size='40'  type='text'  name='templatic_closedate' id='templatic_closedate' value='Select Date'/>";
	echo '<img src="'.get_template_directory_uri().'/images/cal.gif" alt="Calendar" onclick="displayCalendar(document.frmclosedate.templatic_closedate,\'dd/mm/yyyy\',this)" style="cursor: pointer;" border="0" height="16" width="16" /></div>'."";
	
	echo "&nbsp;&nbsp;<a href='#' class='button-primary' style='position:relative; top:5px;' onclick ='showDate(this.value)'>Add</a>";

?>

<table  id="templaticclosedatediv">
</table>

</td>
</tr>
</table>
</form>
</body>
<?php } 

function bhours($day)
{ 
	global $wpdb;
	$appointment_availability_table = $wpdb->prefix . "appointment_bhours";;
	$avilable_time = "select * from $appointment_availability_table where sid='No' and day = '".$day."'";
	$avilable_time_obj = $wpdb->get_row($avilable_time);
	
	$appointment_closinghour_table = $wpdb->prefix . "appointment_closinghours";;
	$avilable_close = "select * from $appointment_closinghour_table where sid='No' and day = '".$day."'";
	$avilable_close_obj = $wpdb->get_row($avilable_close);
	$bhours_explode = explode(',',$avilable_close_obj->time_available);
  ?>

  <?php 
	if($avilable_time_obj->timefrom != "")
	{ 
				$timefrom = $avilable_time_obj->timefrom;
				$timeto = $avilable_time_obj->timeto;
				
				$timef = explode(':',$timefrom);
				$timet = explode(':',$timeto);
				$hourf= $timef[0];
				$hourt = $timet[0];
				
				$mintf = $timef[1];
				$mintt = $timet[1];
				$ar = 0;
				$count = 0;
				for($id = $hourf ; $id <= $hourt ; $id++ )
				{
					 
					for($mid = 60 ; $mid >= 0; $mid-=30)
					{ 	
					$dttime = $bhours_explode[$ar];	
						if($mid == 60 )
						{
							if($count <= 8 & $count != ""){ 
							$a_time= "0".$id.":"."00";
									$chkclosed =  $wpdb->query("select * from $appointment_closinghour_table where day= '".$day."' and time_available LIKE '%$a_time%'");
									if(mysql_affected_rows() >0 )
									{
									?><option value="<?php _e($a_time,'templatic'); ?>" selected><?php  _e($a_time,'templatic');?></option>
									<?php							
									}else{ ?>
									<option value="<?php _e($a_time,'templatic'); ?>"><?php  _e($a_time,'templatic');?></option>	
							<?php		}
							}else{ 
							$a_time =  $id.":"."00";
								$chkclosed =  $wpdb->query("select * from $appointment_closinghour_table where day= '".$day."' and time_available LIKE '%$a_time%'");
									if(mysql_affected_rows() >0 )
									{
									?><option value="<?php _e($a_time,'templatic'); ?>" selected><?php  _e($a_time,'templatic');?></option>
									<?php							
									}else{ ?>
									<option value="<?php _e($a_time,'templatic'); ?>"><?php  _e($a_time,'templatic');?></option>	
							<?php		}
												
							} 
						
						}elseif($mid == 30){ 
							if($count <= 8 & $count !="" ){				
							 $a_time = "0".$id.":".$mid; 
								$chkclosed =  $wpdb->query("select * from $appointment_closinghour_table where day= '".$day."' and time_available LIKE '%$a_time%'");
									if(mysql_affected_rows() >0 )
									{
									?><option value="<?php _e($a_time,'templatic'); ?>" selected><?php  _e($a_time,'templatic');?></option>
									<?php							
									}else{ ?>
									<option value="<?php _e($a_time,'templatic'); ?>"><?php  _e($a_time,'templatic');?></option>	
							<?php		}
							
							}else{ 
								$a_time =  $id.":".$mid;
								$chkclosed =  $wpdb->query("select * from $appointment_closinghour_table where day= '".$day."' and time_available LIKE '%$a_time%'");
									if(mysql_affected_rows() >0 )
									{
									?><option value="<?php _e($a_time,'templatic'); ?>" selected><?php  _e($a_time,'templatic');?></option>
									<?php							
									}else{ ?>
									<option value="<?php _e($a_time,'templatic'); ?>"><?php  _e($a_time,'templatic');?></option>	
							<?php		}
								
							}
						}
													
					}
					
					
					if( $count != $id){
							   $count = $id;
						}	
				$ar ++;
				
				}
		}else{ ?>
		 <option value="0" selected><?php _e('Not Available','templatic'); ?></option>	
		<?php
		}
}

function chkis_close($name,$idname,$dayname)
{
		global $wpdb;
		$appointment_closinghour_table = $wpdb->prefix . "appointment_closinghours";
		$avilable_close = "select * from $appointment_closinghour_table where sid='No' and day = '".$dayname."' and isclosed ='1' ";
		$avilable_close_obj = $wpdb->get_row($avilable_close);
		
		if(mysql_affected_rows() > 0)
		{ ?>
			<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $idname; ?>" value="<?php echo $idname; ?>" onClick="chkclose('<?php echo $idname; ?>','<?php echo $dayname; ?>')" checked="checked">Closed
		<?php }else{	?>
			<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $idname; ?>" value="<?php echo $idname; ?>" onClick="chkclose('<?php echo $idname; ?>','<?php echo $dayname; ?>')">Closed
		<?php }
	}

?>