$(document).ready(function()
{
$(".lfromstate").change(function()
{
	$('#loader_from').css('display','block');
var lfromdata=$(this).val();

var lfromdataString = 'lfromdata='+ lfromdata;

$.ajax
	({
	type: "POST",
	url: "/ajax_home",
	data: lfromdataString,
	cache: false,
	success: function(html)
	{
		$('#loader_from').css('display','none');	
		$(".lfromcity").html(html);
	} 
	});

});

$('.lfromcity').change(function(){
      $('#lfromzip').val( this.value );
	  $("button.close").click();
});

});
