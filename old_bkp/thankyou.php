<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<?php
require_once('include/connection.php');
include('include/config.php');
$body_class = 'homepage';
$title = "Thank You for Submitting Your Moving Quote Request";
$meta_keywords = OTHER_PAGE_KEYWORDS;
$meta_description = "Thank you for submitting your moving quote request with MoverJunciton.com. We look forward to helping you with your move.";
include("include/header.php"); ?>
<section id="ContentForm-thanku" class="thanku-bg">
        <div class="container">
            <div class="row">
				<div class="col-sm-12 wow">
					<div class="thankValue MarginBottom text-center">
					
						<div class="FirstCheck4 get-h1">
							<h1 class="t-h1">Thank You! Your Quote Request has been Submitted.</h1>
							<span>Our Pre-Screened and Licensed service partners will reach out to you shortly.</span>
						</div>
						<div class="FirstCheck3">
							<a class="request_id">Your request ID is:<span class="font-col">
								<?php  $stid = oci_parse($conn, 'SELECT MAX(ID) as ID FROM HOMEPROLEADSSTAGE');
								oci_execute($stid);$lastID = 0;
								while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
									$lastID = $row['ID'];
								}
								echo $lastID;
								//*** Close Connection to Oracle ***//
								//oci_close($conn);
								?></span>
							</a>
						</div>
						<div class="FirstCheck1">
							<p><span><b>What's next ?</b></span> <br />Just sit tight. You will be receiving phone calls from our service partners with your quote.</p>
						</div>
						
						<div class="FirstCheck2 lightColor">
							<p>Please refrain from filling out forms on any other sites to avoid getting too many calls.</p>
						</div>	
					</div>
				</div>
				
				<!--
				  <?php
				 $saved = oci_parse($conn, "SELECT * FROM RESLEADSSTAGE where ID='".$lastID."'");
				oci_execute($saved);
				
				while ($row = oci_fetch_array($saved, OCI_ASSOC+OCI_RETURN_NULLS)) {
				   $cityFrom = $row['FROMCITY'];
				   $stateFrom = $row['FROMSTATE'];
				   $zipFrom = $row['FROMZIPCODE'];
				   $moveDate = $row['MOVEDATE'];
				   $cityTo = $row['TOCITY'];
				   $stateTo = $row['TOSTATE'];
				   $zipTo = $row['TOZIPCODE'];
				   $size = $row['WEIGHT'];
				   
				}
				//*** Close Connection to Oracle ***//
				  ?>
				<div class="col-md-6 col-sm-6 wow">
							<h2 class="Value-h2"> Your Request Details:</h2>
					<p class="Value-p">Moving From:&nbsp;<span class=orang><?php echo $cityFrom .", ". $stateFrom .", ". $zipFrom ."</span> "."Move Date:"." <span class=orang>". $moveDate ; ?></span> </br></p>
					<p class="Value-p">Moving To:&nbsp;<span class=orang>
					<?php echo $cityTo .", ". $stateTo .", ".$zipTo ."</span> ";
					if($size != '')
					{
						echo "Move Size: "." <span class=orang>". $size."</span>" ; 
					}
					?>
					</p>
					<div id="map" style="width: 100%; height: 224px; float: left;"></div> 
					<?php if(isset($cityTo)) {?>
					<script type="text/javascript"> 

					 var directionsService = new google.maps.DirectionsService();
					 var directionsDisplay = new google.maps.DirectionsRenderer();

					 var map = new google.maps.Map(document.getElementById('map'), {
					   zoom:7,
					   mapTypeId: google.maps.MapTypeId.ROADMAP
					 });

					 directionsDisplay.setMap(map);
					 directionsDisplay.setPanel(document.getElementById('panel'));

					 var request = {
					   origin: '<?php echo $cityFrom .", ". $stateFrom .", ". $zipFrom . "USA"; ?>', 
					   destination: '<?php echo $cityTo .", ". $stateTo .", ". $zipTo ." USA"; ?>',
					   travelMode: google.maps.DirectionsTravelMode.DRIVING
					 };

					 directionsService.route(request, function(response, status) {
					   if (status == google.maps.DirectionsStatus.OK) {
						 directionsDisplay.setDirections(response);
					   }
					 });
					</script> 
					<?php } else {?>
								<script type="text/javascript"> 

					 var directionsService = new google.maps.DirectionsService();
					 var directionsDisplay = new google.maps.DirectionsRenderer();

					 var map = new google.maps.Map(document.getElementById('map'), {
					   zoom:7,
					   mapTypeId: google.maps.MapTypeId.ROADMAP
					 });

					 directionsDisplay.setMap(map);
					 directionsDisplay.setPanel(document.getElementById('panel'));

					 var request = {
					   origin: '<?php echo $cityFrom .", ". $stateFrom .", ". $zipFrom . "USA"; ?>', 
					   destination: '<?php echo $cityFrom .", ". $stateFrom .", ". $zipFrom ." USA"; ?>',
					   travelMode: google.maps.DirectionsTravelMode.DRIVING
					 };

					 directionsService.route(request, function(response, status) {
					   if (status == google.maps.DirectionsStatus.OK) {
						 directionsDisplay.setDirections(response);
					   }
					 });
					</script>
					
					<?php }?>
				</div>-->
				
				
			</div>
		</div>
	</section>	
<?php 
oci_close($conn); 
include("include/footer.php"); ?>
<script type="text/javascript">
$(document).ready(function () {
	var h = $('.HomeValue').height();
	$('#map').css("height", h-26+"px"); 
});
</script>
</body>
</html>
