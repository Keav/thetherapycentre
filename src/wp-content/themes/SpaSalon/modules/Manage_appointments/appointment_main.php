<?php
	include 'tab_header.php';

?>
 <div class="block" id="all_appointments">	
 <?php include( 'admin_all_appointment.php' ); ?>	
 </div>
 
<?php /*?> <div class="block" id="add_appointment">	
 <?php include( 'admin_appointment_add.php' ); ?>	
 </div><?php */?>
 
 <div class="block" id="appointment_fields">	
 <?php include( 'admin_appointment_fields.php' ); ?>	
 </div>
 
 <div class="block" id="appointment_services">	
  <?php include( 'admin_settings_services.php' ); ?>
 </div>
 
 <div class="block" id="email_setups">	
  <?php include( 'admin_settings_email.php' ); ?>
 </div>
  <div class="block" id="availability_setup">	
  <?php include( 'admin_settings_availability.php' ); ?>
 </div>

  <div class="block" id="closedhour_setup">	
  <?php include( 'admin_settings_closedhours.php' ); ?>
 </div>
 
 <div class="block" id="payment_setups">	
  <?php if($_GET['payact']=='setting' && $_GET['id']!='')
	{
		include_once('admin_paymethods_add.php');
	} else {
		include( 'admin_paymethods_list.php' ); 
	} ?>
 </div>
 

 <?php include TT_ADMIN_TPL_PATH.'footer.php';?>
