<?php 
$lead_type="PNT";
include_once("include/all-services-list.php");
 $ref = null;
   if(isset($_COOKIE['ref'])) {
   	$ref = $_COOKIE['ref'];
   } else {
   	$ref = isset($_REQUEST['ref']) ? $_REQUEST['ref'] : '';
   }
   $subid = isset($_REQUEST['subid']) ? $_REQUEST['subid'] : '';
   if(isset($_COOKIE['subid2'])) {
   	$subid2 = $_COOKIE['subid2'];
   } else {
   	$subid2 = isset($_REQUEST['subid2']) ? $_REQUEST['subid2'] : '';
   }

?>
<link href="<?php echo CSSPATH;?>/stackbox-docs.min.css" rel="stylesheet">
<script  src="<?php echo JSPATH; ?>/stackbox-docs.js"  type="text/javascript" ></script>
<script type="text/javascript">
   var all_services_list_json = <?php echo json_encode($all_services_list); ?>;
</script>
<script  src="<?php echo JSPATH; ?>/validation_landers.js?ver=<?php echo time(); ?>"  ></script>
<div class="landingBox_pt landerform new_form_layout">
    	<div class="container">
        	<div class="center">
            	<div class="slider_title">
				  <h1>Looking for a Painter?</h1>
                  <h3>Find & Compare Top Painters in your Area. Instantly!</h3>
				</div>  
            	
<form action="pntcontact" method="post" class="HomeFormhome glb-input-class val_check_class ptclass glb-form" name="myForm" id="myForm3">
	<div class="my_zippara form_col_4_1">
      <input type="tel" tabindex="1" id="lfromzip" class="HomeFields lfromzip" placeholder="*Zip" name="fromzip" title="Enter 5 digit zip code ">
		<div class="form-img">
			<a href="#Lfromziphelp" data-stackbox="true" data-stackbox-close-button="true" data-stackbox-position="top" data-stackbox-anim-open="slow">
				<img src="images/zip.png" alt="Zip" width="20" height="20">
			</a>
		</div>
		<div class="error_text fz">Please enter a ZIP</div>
    </div>
	<div class="my_zippara forwidth form_col_4_2">  
      <select name="nature" id="nature" class="sizeform" tabindex="2">
		      <option value="">*Nature of Project</option>
		</select>
      <div class="error_text">Please select a Service/Nature of Project</div>
	</div>
   
	<div class="my_zippara forwidth form_col_4_3">  
      <select name="scope" id="scope" class="sizeform" tabindex="3">
		<option value="">*Scope of Work</option>
      </select>
      <div class="error_text">Please select a Scope of Work</div>
	</div>

	<div class="new_form_layout my_zippara form_col_4_4" id="t4">
      <input type="text" tabindex="4" id="UserEmail" class="UserEmail" placeholder="*Email" name="UserEmail" title="Enter your email">
      <div class="error_text ue">Please enter a valid Email</div>
   </div>
   <input type="hidden" name="leadtype" id="leadtype" value="PNT">	
   <input type="hidden" name="ref" id="ref" value="<?php echo $ref; ?>">
   <input type="hidden" name="origin" id="origin" value="<?php echo $origin; ?>">
   <input type="hidden" name="subid" id="subid" value="<?php echo $subid; ?>">
   <input type="hidden" name="subid2" id="subid2" value="<?php echo $subid2; ?>">
   <input type="hidden" name="form" value="pt-form"> 
   <input type="button" value="Get FREE Quotes" class="HomeSubmit"  onClick="validationFunction()">
   <div class="clearfix"></div>
</form>
  </div>
 </div>
</div>

 <?php include_once('./zip-help.php');?>


