$(document).ready(function(){$(".lfromstate").change(function(){$("#loader_from").css("display","block");var c="lfromdata="+$(this).val();$.ajax({type:"POST",url:"citylist",data:c,cache:!1,success:function(c){$("#loader_from").css("display","none"),$(".lfromcity").html(c)}})}),$(".lfromcity").change(function(){$("#lfromzip").val(this.value),$("button.close").click()})});