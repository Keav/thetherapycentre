
function frmsubmit()
{
		if(validateName() & validateFtype() & validateDvalue() & validatebackName())
			return true
		else
			return false;
}

function validateName(){
	//if it's NOT valid
	var fldname = $("#txtfldname");
	var fldnameInfo = $("#fldnameInfo");
	if(fldname.val().length == 0){
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("Please enter fieldname");
		fldnameInfo.addClass("ferror");
		return false;
	}else if(fldname.val().length <= 3)
	{
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("We want names with more than 3 letters!");
		fldnameInfo.addClass("ferror");
		return false;
	}else if(fldname.val().length >= 3)
	{
		fldnameInfo.removeClass("ferror");
		fldnameInfo.text("");
		fldnameInfo.removeClass("ferror");
		return true;
	}else{
		fldnameInfo.removeClass("ferror");
		fldnameInfo.text("");
		fldnameInfo.removeClass("ferror");
		return true;
	}
}

function validatebackName(){
	//if it's NOT valid
	var fldname = $("#txtfldbackname");
	var fldnameInfo = $("#fldbackInfo");
	if(fldname.val().length == 0){
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("Please enter fieldname");
		fldnameInfo.addClass("ferror");
		return false;
	}else if(fldname.val().length <= 4)
	{
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("We want names with more than 3 letters!");
		fldnameInfo.addClass("ferror");
		return false;
	}else{
		fldnameInfo.removeClass("ferror");
		fldnameInfo.text("What's your name?");
		fldnameInfo.removeClass("ferror");
		return true;
	}
}


function validateFtype(){
	var fldname = $("#sctfldtype");
	var fldnameInfo = $("#fldtypeInfo");
	if(fldname.val() == 0){
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("Please enter field Type");
		fldnameInfo.addClass("ferror");
		return false;
	}
	else{
		fldname.removeClass("ferror");
		fldnameInfo.addClass("noerror");
		return true;
	}
}

function validateDvalue(){
	
	var fldname = $("#txtfldvariablename");
	var fldnameInfo = $("#fldvariableInfo");
	if(fldname.val().length == 0){
		fldnameInfo.removeClass("noerror");
		fldnameInfo.addClass("ferror");
		fldnameInfo.text("Please enter variable");
		fldnameInfo.addClass("ferror");
		return false;
	}
	else{
		fldname.removeClass("ferror");
		fldnameInfo.addClass("noerror");
		return true;
	}
}

var decimal_char = ',';
function isvalidnumber(){
    var val=$(this).val();
    //This regex is from the jquery.numeric plugin itself
    var re=new RegExp("^\\d+$|\\d*" + decimal_char + "\\d+");
    if(!re.exec(val)){
	   fldnameInfo.removeClass("noerror");
       positionInfo.addclass("ferror");
        $(this).val("");
    }           
}
function validposition()
{ 
	var fldname = $("#txtposition");
	var fldnameInfo = $("#positionInfo");
	if(isNaN($('#txtposition').val()))
	{
	   fldnameInfo.removeClass("noerror");
       	fldnameInfo.addClass("ferror");
	}else{
		fldnameInfo.removeClass("ferror");
    fldnameInfo.addClass("noerror");
	}

}



function validserposition()
{ 
	var fldname = $("#txtserposition");
	var fldnameInfo = $("#serpositionInfo");
	if(isNaN($('#txtserposition').val()))
	{
	   fldnameInfo.removeClass("noerror");
       	fldnameInfo.addClass("ferror");
	}else{
		fldnameInfo.removeClass("ferror");
    fldnameInfo.addClass("noerror");
	}

}

function validserfees()
{ 
	var fldname = $("#txtappointmentfees");
	var fldnameInfo = $("#serfeesInfo");
	if(isNaN($('#txtappointmentfees').val()))
	{
	   fldnameInfo.removeClass("noerror");
       	fldnameInfo.addClass("ferror");
	}else{
		fldnameInfo.removeClass("ferror");
        fldnameInfo.addClass("noerror");
	}

}

function frmservicesubmit()
{
		if(validserfees() & validserposition() )
			return true
		else
					location.href='admin.php?page=Appointment&success=serror$addservice=true#appointment_services';
			$("#serpositionInfo").addClass("ferror");
			$("#serfeesInfo").addClass("ferror");
	
			return false;
			
}