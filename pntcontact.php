<?php 
require_once('include/connection.php');
require_once('include/config.php');

//---if get and post method is empty-----
if(empty($_POST) && empty($_GET)){
	$rUrl=BASEURL;
	echo "<script>window.location='{$rUrl}'</script>";	
}
//---------for post method--------------
if(!empty($_POST)){
	
	$formname= $_POST['form'];
	$zip = trim($_POST['fromzip']);
	$nature = $_POST['nature'];
	$scope = $_POST['scope'];
	$UserEmail = isset($_POST['UserEmail']) ? trim($_POST['UserEmail']) : '';
	$leadtype = $_POST['leadtype'];
	$ref = isset($_REQUEST['ref'])?$_REQUEST['ref']:'';
	$subid = isset($_REQUEST['subid'])?$_REQUEST['subid']:'';
	$subid2 = isset($_REQUEST['subid2'])?$_REQUEST['subid2']:'';
	$origin=$_POST['origin'];
	$taskid=$_POST['task_id'];
	if(empty($zip) || empty($nature) || empty($scope) || empty($UserEmail) || empty($leadtype) || empty($origin)){
		if(!empty($_SERVER["HTTP_REFERER"])) {
			$rUrl = $_SERVER["HTTP_REFERER"];
		} else {
			$rUrl = BASEURL;
		}
		header("Location:{$rUrl}");
		exit;
	}	
	
}
//---------for Get method--------------
if(!empty($_GET['id'])){
	$id=$_GET['id'];
	

	$subid = $id;
	$countSql = "SELECT count(*) as total FROM HOMEPROLEADSTEMP where ID='".$id."' and rownum < 2";
	
	$countdata = oci_parse($conn,$countSql);
	$rownumber = oci_execute($countdata);
	$data = oci_fetch_array($countdata, OCI_ASSOC+OCI_RETURN_NULLS);
	$totalRow=$data['TOTAL'];
	
	if($totalRow > 0){
		
		$query="select ID,DTSTAMP,ZIPCODE,LEADTYPE,NATURE,SCOPE,EMAIL,TASKID from HOMEPROLEADSTEMP WHERE ID='".$id."' and rownum < 2";
		
		$gdata = oci_parse($conn, $query);
		
		$result = oci_execute($gdata);
		$data = oci_fetch_array($gdata, OCI_ASSOC+OCI_RETURN_NULLS);
	
			$zip= $data['ZIPCODE'];
			$taskid=$data['TASKID'];
			$date=date('m/d/Y',strtotime($data['DTSTAMP']));
			$UserEmail=$data['EMAIL'];
			$origin="pj-temp";
			$formname = "pj_e_form";
			
		//---- to get Leadtype, scope and nature of selected task id------	
		$Query=" select LEADTYPE,NATURE,SCOPE from HOMEPROTASKS where TASKID='$taskid' and rownum < 2";
		$data = oci_parse($conn, $Query);
		$result = oci_execute($data);
		$row = oci_fetch_array($data, OCI_ASSOC+OCI_RETURN_NULLS);
		
			$nature=$row['NATURE'];
			$scope=$row['SCOPE'];
			$leadtype=$row['LEADTYPE'];
			//echo $nature; exit;
		//---------------------over here------------------------
		
		 if(empty($zip) || empty($nature) || empty($scope) || empty($date) || empty($UserEmail) || empty($leadtype))
			{
				
					$rUrl = BASEURL;	
					echo "<script>window.location='{$rUrl}'</script>";
			} else {
				if(!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
					$rUrl = BASEURL;
					echo "<script>window.location='{$rUrl}'</script>";
				}
				if(!preg_match("/^[0-9]{5}$/",$zip)) {
					$rUrl=BASEURL;	
					echo "<script>window.location='{$rUrl}'</script>";
				}	
			}
	}else{
		$rUrl = BASEURL;	
		echo "<script>window.location = '{$rUrl}'</script>";	 
	}
}

   $title = 'HomePro Details';
   ?>
<!DOCTYPE html> 
<html lang="en">
	<head>
	<?php include("include/head.php"); ?>
	</head>
	<body class="<?php echo $body_class; ?>">
	<?php include("include/header.php"); ?>
		<section id="ContentForm">
			<div class="container">
				<div class="">
					<div class="MarginBottom widthform movcontact">
						<div class="criteria col-md-8 col-sm-6">
						   <div class="fstep">
							  <h3>You Are Almost Done!</h3>
						   </div>
						   <p>
							  <span>We've found professional, top rated painters that match your criteria. Please complete the next step so we can get your FREE Painting Quotes. </span>
						   </p>
						</div>
						<div class="detailBox col-md-4 col-sm-6">
							<?php $leadtype_arr = array("HVC" => "HVAC", "PNT" => "Painting", "PLB" => "Plumbing", "ROF" => "Roofing"); ?>
							<ul class="row">
								<li class="clearfix cont-head">Your Project Details</li>
								<li class="clearfix">
									<cite>Service:</cite>
									<span><?php echo $leadtype_arr[$leadtype]; ?></span>
								</li>
								<li class="clearfix">
									<cite>Nature:</cite>
									<span><?php echo $nature; ?></span>
								</li>
								<li class="clearfix">
									<cite>Scope:</cite>
									<span><?php echo $scope; ?></span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 MarginBottom color rescontact stepdetail">
						<div class="col-sm-12 connecttion">
							<h2 class="MarginBottom_top">Final Step: Contact Details</h2>
							<div class="ContactForm">
								<form id="hpcontact" method="post" action="insert" >
									<ul>
										<li>
											<div class="my_zippara">
												<label>First Name:<span>*</span></label>
												<input type="text" class="FullContactFields form-control" name="Firstname" title="Specify your first name" placeholder="First Name" value="">
												<div class="error_text">Please enter your FIRSTNAME</div>
											</div>
										</li>
										<li>
											<div class="my_zippara">
												<label>Last Name:<span>*</span></label>
												<input type="text" class="FullContactFields form-control" name="Lastname"  title="Specify your last name" placeholder="Last Name" value="">
												<div class="error_text">Please enter your LASTNAME</div>
											</div>
										</li> 
										<li>
											<div class="my_zippara">
												<label>Phone:<span>*</span></label>
												<input type="tel"  title="Enter your correct 10 digit phone number" class="FullContactFields form-control phnclass" name="UserPhone" placeholder="Phone number(2345678901)" value=""/>
												<div class="error_text">Please enter a 10 digit number</div>
											</div>
										</li>
										 <li>
											<div class="my_zippara">
												<label>Email:<span>*</span></label>
												<input type="text" id="myText" class="FullContactFields form-control emailclass" name="UserEmail" title="Specify your correct email address." placeholder="" value="<?php echo $UserEmail; ?>" readonly>
												<span class="enable" onclick="myFunction1()"><i class="fa fa-pencil" aria-hidden="true"></i></span>
												<div class="error_text">Please enter a valid EMAIL</div>
											</div>	
										</li>
										<li>
											<div class="my_zippara">
												<label>Address:<span>*</span></label>
												<input  class="FullContactFields form-control"  id="addressfield" name="address" title="Enter your address" placeholder ="123 Example Street">
												<div class="error_text">Please enter your address</div>
											</div>
										</li>
										<?php
										
										$g_zip = oci_parse($conn, "SELECT city, state FROM CITYAREACODE WHERE zip='".$zip."' and rownum < 2");
										$g_result = oci_execute($g_zip);
										$city = null;
										$state = null;
										while ($zipcode = oci_fetch_array($g_zip, OCI_ASSOC+OCI_RETURN_NULLS)) {
											$city= $zipcode['CITY'];
											$state= $zipcode['STATE'];
										}
										if(empty($city) ||  empty($state)){
										 $str =  $zip ;	
										}else{
										 $str = (!empty($state) && !empty($city)) ? $city.", ".$state . " " . $zip : '';	
										}
										?>
									
										<li>
										   <label class="filedAddres">City, State Zip Code</label>
										   <span class="filedAddres-box"> <?php echo $str; ?></span>
										</li>
									 </ul>
									 <input type="hidden" name ="taskid" value="<?php echo $taskid; ?>">
									 <input type="hidden" name ="subid" value="<?php echo $subid; ?>">
									 <input type="hidden" name ="subid2" value="<?php echo $subid2; ?>">
									 <input type="hidden" name ="zip" value="<?php echo $zip; ?>">
									 <input type="hidden" name ="ref" value="<?php echo $ref; ?>">
									 <input type="hidden" name ="origin" value="<?php echo $origin; ?>">
									 <input type="hidden" name ="form" value="<?php echo $formname; ?>">
									 
									 <img src="images/loader.gif" style="width: 45px; display: none; text-align: center; margin: 0px auto;" class="loading" />
									 <input type="button" class="OrangeButton submit_btn" name ="hpcontactform" value="START YOUR FREE QUOTE" id="submitbtn" onclick="validationFunction()">
								</form>
								<div class="disclaimer">	
								 By clicking the submit button, I represent that I am 18+ years of age. I hereby consent to be contacted via phone and/or email by MoverJunction.comÂ® and its service and marketing partners in connection with my project estimate request at the phone number provided (which may include cellular). I understand that I may receive autodialed and/or pre-dialed calls in regards to my request. I understand that my consent is not a condition of purchase.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		   <!--/.row-->
		   <!--/.container-->
		</section>
<?php include("include/awards.php"); ?>
<?php include("include/footer.php"); ?>
	</body>
</html>
<?php oci_close($conn); ?>

<script>

function validationFunction()
{
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
			}
			else
			{
				$(this).parents('.my_zippara').removeClass('zippara');
				if($(this).hasClass('phnclass'))
				{
					var phn_val = $(this).val();
					for(var i = 0 ; i < phn_val.length ; i++) {
						phn_val = phn_val.replace("-", "");
						phn_val = phn_val.replace(" ", "");
						phn_val = phn_val.replace("(", "");
						phn_val = phn_val.replace(")", "");
					}
					$('.phnclass').val(phn_val);
					var attr_pattern = "^[0-9]{10}$";
					attr_pattern = new RegExp(attr_pattern);
					if(!attr_pattern.test($(this).val()))
					{
						temp_error = 1;
						$(this).parents('.my_zippara').addClass('zippara');
					}
					else
					{
						$(this).parents('.my_zippara').removeClass('zippara');
					}
				}
				if($(this).hasClass('emailclass'))
				{
					var attr_pattern_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					attr_pattern_email = new RegExp(attr_pattern_email);
					if(!attr_pattern_email.test($(this).val()))
					{
						temp_error = 1;
						$(this).parents('.my_zippara').addClass('zippara');
					}
					else
					{
						$(this).parents('.my_zippara').removeClass('zippara');
					}
				}
			}
	});	
	 if(!temp_error)
	{
		$('.submit_btn').hide();
		$('.loading').css("display", "block");
		$('#hpcontact').submit();
	}
}
	
$(document).ready(function () 
{
	$('body').on('blur', '.my_zippara :input',function(){
			if($(this).val() == "")
			{
				$(this).parents('.my_zippara').addClass('zippara');
			}
			else
			{
				$(this).parents('.my_zippara').removeClass('zippara');
				if($(this).hasClass('phnclass'))
				{
					var phn_val = $(this).val();
					for(var i = 0 ; i < phn_val.length ; i++) {
						phn_val = phn_val.replace("-", "");
						phn_val = phn_val.replace(" ", "");
						phn_val = phn_val.replace("(", "");
						phn_val = phn_val.replace(")", "");
					}
					$('.phnclass').val(phn_val);
					var attr_pattern = "^[0-9]{10}$";
					attr_pattern = new RegExp(attr_pattern);
					if(!attr_pattern.test($(this).val()))
					{
						$(this).parents('.my_zippara').addClass('zippara');
					}
					else{
						$(this).parents('.my_zippara').removeClass('zippara');
					}
				}
				if($(this).hasClass('emailclass'))
				{
					var attr_pattern_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					attr_pattern_email = new RegExp(attr_pattern_email);
					if(!attr_pattern_email.test($(this).val()))
					{
						$(this).parents('.my_zippara').addClass('zippara');
					}
					else
					{
						$(this).parents('.my_zippara').removeClass('zippara');
					}
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
});
</script>

<script>
function myFunction1() {
    if ( $('#myText').is('[readonly]') ) { 
		$('#myText').attr("readonly", false);
	}
	else{
		$('#myText').attr("readonly", true);	
	}
}
</script>