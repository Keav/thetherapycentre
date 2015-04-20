function sctchange() {									   
	var myvalue = $('#sctfldtype').val();
	
	if(myvalue == 3 || myvalue == 4 || myvalue == 5 )
	{
	$('#optsctvalue').removeClass('optsctvalue');
	$('#optsctvalue').addClass('optsctvalue2');
	$('#optsctvalue1').removeClass('optsctvalue');
	$('#optsctvalue1').addClass('optsctvalue2');
	}else
	{
		$('#optsctvalue').addClass('optsctvalue');
		$('#optsctvalue1').addClass('optsctvalue');
	}
	
	
	$("#btnsavevalues").click(function() {
		var optvaluename1      = $('#txtvalue').attr('value');
		var optvalue2     = $('#xtoptname').attr('value');
		
	});
	
}

jQuery(document).ready( function($) { 
	$("#btnsavevalues").click(function() {
									   //alert("hi");
		var optvaluename1  = $('#txtvalue').attr('value');
		var optvalue2 = $('#txtoptname').attr('value');
		var data ={
		optvaluename1  : optvaluename1,
		optvalue2 : optvalue2 ,
		}
		var ajaxurl = $('#scripturl').attr('value');
		$.ajaxSetup({cache:false});
		jQuaery.post(ajaxurl, function(data){
		 $( "#result" ).html(data);

	});
									   });
});



