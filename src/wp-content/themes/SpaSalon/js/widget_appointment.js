function frmapt1()
{
	var formname = $("#frm_appointment");
	var fldnameInfo = $("#submitedapt");

	fldnameInfo.removeClass('noerror');
	fldnameInfo.addClass('submitedsuccess');
	fldnameInfo.text("Sent successfully, please check your email.");
	fldnameInfo.fadeIn(100);

	
}

function frmapt_error()
{
	var formname = $("#frm_appointment");
	var fldnameInfo = $("#submitedapt");
	fldnameInfo.removeClass('noerror');
	fldnameInfo.addClass('empty_field');
	fldnameInfo.text('Please fill all required fields.');
	return false;
	
}

function frm_pay()
{
	
	var formname = $("#frm_appointment");
	var fldnameInfo = $("#payfees");
	var divfrm = $("#div_frm_addappointment");
	divfrm.addClass('noerrordiv');
	fldnameInfo.removeClass('noerrordiv');
	fldnameInfo.addClass('paypalDiv');
	
	return false;
	
}