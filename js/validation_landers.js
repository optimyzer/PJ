
function validationFunction(){
   	var temp_error = 0;
   	 $( ".my_zippara :input" ).each(function(index) {
   	
   		if(!$(this).is(":visible"))
   		{
   	
   			return;
   		}
   			if($(this).val() == "")
   			{
   				$(this).parents('.my_zippara').addClass('zippara');
   				temp_error = 1;
   					if($(this).hasClass('lfromzip'))
   					{
   						$(this).parents('.my_zippara').find('.fz').text("Please enter a valid ZIP");
   					}
   					
   					if($(this).hasClass('UserEmail'))
   					{
   						$(this).parents('.my_zippara').find('.ue').text("Please enter a valid email");
   					}
   			}
   			else
   			{
   				if($(this).hasClass('lfromzip'))
   				{
   					var attr_pattern = "^[0-9]{5}$";
   					attr_pattern = new RegExp(attr_pattern);
   					if(!attr_pattern.test($(this).val()))
   					{
   						temp_error = 1;
   						$(this).parents('.my_zippara').addClass('zippara');
   						if($(this).hasClass('lfromzip'))
   						{
   							$(this).parents('.my_zippara').find('.fz').text("FROM ZIP must be 5 digits");
   						}
   						
   					}
   					else{	
   						$(this).parents('.my_zippara').removeClass('zippara');
   					}
   					
   				}
   				else if($(this).hasClass('UserEmail'))
   				{
   					var attr_pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   					attr_pattern = new RegExp(attr_pattern);
   					
   					if(!attr_pattern.test($(this).val()))
   					{
   						temp_error = 1;
   						$(this).parents('.my_zippara').addClass('zippara');
   						if($(this).hasClass('UserEmail'))
   						{
   							$(this).parents('.my_zippara').find('.ue').text("Entered Email is not valid");
   						}
   					}
   					else{	
   						$(this).parents('.my_zippara').removeClass('zippara');
   					}
   					
   				}
   				else
   				{
   					$(this).parents('.my_zippara').removeClass('zippara');
   				}
   			}
   			
   	 });
   	 if(!temp_error)
   		{
   			var data=$('#myForm3').serializeArray();
            $('body').find('.HomeSubmit').attr("disabled","disabled");
   			$.ajax({
				url : "lookupclients.php",
				type: "POST",
				data : data,
				dataType:"json",
				success:function(data)
				 { 
					 
					 $('body').find('.HomeSubmit').removeAttr("disabled");
					 if(data.success==1){
						 var displayid=data.subid;
						 $('body').find('#subid').val(displayid); 
						 $('#myForm3').submit();
					 } else {
						 window.location = "index";
					 }
					
				 
				 }
				});
				
				return false;
   			
   		}
   		
}  

function setNature(){
	var val = $('#leadtype').val();
	nature = '<option value="">*Nature of Project</option>';
	$.each(all_services_list_json, function(key, value){
		if(key === val){
			$.each(value, function(key1, value1){
			nature += '<option value="'+key1+'">'+key1+'</option>';
			});
		}
	});	
	$("#nature").html(nature);
}

$(document).ready(function(){
	
	$('body').on('blur', '.my_zippara :input',function(){
			if($(this).val() == "")
			{
				$(this).parents('.my_zippara').addClass('zippara');
   				temp_error = 1;
   					if($(this).hasClass('lfromzip'))
   					{
   						$(this).parents('.my_zippara').find('.fz').text("Please enter a valid ZIP");
   					}
   					
   					if($(this).hasClass('UserEmail'))
   					{
   						$(this).parents('.my_zippara').find('.ue').text("Please enter a valid email");
   					}
			}
			else
			{
				if($(this).hasClass('lfromzip'))
   				{
   					var attr_pattern = "^[0-9]{5}$";
   					attr_pattern = new RegExp(attr_pattern);
   					if(!attr_pattern.test($(this).val()))
   					{
   						temp_error = 1;
   						$(this).parents('.my_zippara').addClass('zippara');
   						if($(this).hasClass('lfromzip'))
   						{
   							$(this).parents('.my_zippara').find('.fz').text("FROM ZIP must be 5 digits");
   						}
   						
   					}
   					else{	
   						$(this).parents('.my_zippara').removeClass('zippara');
   					}
   					
   				}
   				else if($(this).hasClass('UserEmail'))
   				{
   					var attr_pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   					attr_pattern = new RegExp(attr_pattern);
   					
   					if(!attr_pattern.test($(this).val()))
   					{
   						temp_error = 1;
   						$(this).parents('.my_zippara').addClass('zippara');
   						if($(this).hasClass('UserEmail'))
   						{
   							$(this).parents('.my_zippara').find('.ue').text("Entered Email is not valid");
   						}
   					}
   					else{	
   						$(this).parents('.my_zippara').removeClass('zippara');
   					}
   					
   				}
   				else
   				{
   					$(this).parents('.my_zippara').removeClass('zippara');
   				}
			}
	});
	$('body').on('change', '.my_zippara :input',function(){
			if($(this).val() == "")
			{
				$(this).parents('.my_zippara').addClass('zippara');
			}
			else
			{
				$(this).parents('.my_zippara').removeClass('zippara');
			}
	});
	
	$("#nature").on("change", function(){
		var nature = $("#nature option:selected").val();
		var scope = '<option value="">*Scope of Work</option>';
		$.each(all_services_list_json, function(key,value) {
			$.each(value, function(key1, value1){
				if(key1 === nature){ 
					$.each(value1, function(key2, value2){
						scope += '<option value="'+key2+'">'+key2+'</option>';
				});
				}
			});
		});
		$("#scope").html(scope);
	});
	
	$("#scope").on("change", function(){
		var nature = $("#nature option:selected").val();
		var scope = $("#scope option:selected").val();
		$.each(all_services_list_json, function(key,value) {
			$.each(value, function(key1, value1){
				if(key1 === nature){ 
					$.each(value1, function(key2, value2){
						if(key2 === scope){
							TaskID = value2;
						}
					});
				}
			});
		});
		$("#TaskID").val(TaskID);
	});
	
	setNature();
});