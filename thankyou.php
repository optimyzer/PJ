<!-- <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script> -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('include/connection.php');

include('include/config.php');

$body_class = 'homepage';
$title = "Thank You for Submitting Your Moving Quote Request";
$meta_keywords = 'Thank You';
$meta_description = "Thank you for submitting your moving quote request with MoverJunciton.com. We look forward to helping you with your move.";
// echo "hi";
?>
<!DOCTYPE html> 
<html lang="en">
	<head>
	<?php  include("include/head.php"); ?>
	</head>
	<body class="<?php echo $body_class; ?>">


<?php  include("include/header.php"); ?>
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
				</div>
			</div>
		</section>	
<?php 
oci_close($conn); 
include("include/footer.php"); ?>
	</body>
</html>
<script type="text/javascript">
$(document).ready(function () {
	var h = $('.HomeValue').height();
	$('#map').css("height", h-26+"px"); 
});
</script>
</body>
</html>
