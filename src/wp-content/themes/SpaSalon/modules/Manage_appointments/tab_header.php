<?php include TT_ADMIN_TPL_PATH.'header.php'; ?>
<div class="info top-info"></div>
<div class="ajax-message<?php if ( isset( $message ) ) { echo ' show'; } ?>">
	<?php if ( isset( $message ) ) { echo $message; } ?>
</div>
	<div id="content">
		<div id="options_tabs">
			<ul class="options_tabs">
            	<li><a href="#appointment_services">Services Setup</a><span></span></li>
            	<li><a href="#availability_setup">Availability Setup</a><span></span></li>
                <li><a href="#closedhour_setup">Closing Hour Setup</a><span></span></li>	
            	<li><a href="#all_appointments">Manage Booking</a><span></span></li>
           		<!--<li><a href="#add_appointment">Add Appointment</a><span></span></li>-->
				<li><a href="#appointment_fields">Add/Edit Fields</a><span></span></li>
				<li><a href="#email_setups">Email Setup</a><span></span></li>	
                <li><a href="#payment_setups">Payment Setup</a><span></span></li>	
			</ul> 