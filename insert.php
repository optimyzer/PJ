<?php
require_once('include/connection.php'); 
require_once('include/config.php');
$ref = isset($_REQUEST['ref'])?$_REQUEST['ref']:'';
$subid = isset($_REQUEST['subid'])?$_REQUEST['subid']:'';
$subid2 = isset($_REQUEST['subid2'])?$_REQUEST['subid2']:'';
$UserPhone = null;
if(strlen($_POST['UserPhone'])==10 && ctype_digit($_POST['UserPhone'])) {
	$UserPhone = trim($_POST['UserPhone']);
}
$zip = null;
if(strlen($_POST['zip'])==5 && ctype_digit($_POST['zip'])) {
	$zip = trim($_POST['zip']);
}
$UserEmail = filter_var($_POST['UserEmail'],FILTER_SANITIZE_EMAIL);
$Firstname = trim($_POST['Firstname']);
$Lastname = trim($_POST['Lastname']);
$taskid=isset($_POST['taskid'])?$_POST['taskid']:'';
$origin = $_POST['origin'];
$form = $_POST['form'];
$ip = $_SERVER['REMOTE_ADDR'];
$address = trim($_POST['address']);
$g_zip = oci_parse($conn, "SELECT city, state FROM CITYAREACODE WHERE zip='".$zip."' and rownum < 2");
$g_result = oci_execute($g_zip);
$city = null;
$state = null;
while ($zipcode = oci_fetch_array($g_zip, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $city= $zipcode['CITY'];
	$state= $zipcode['STATE'];
}
oci_free_statement($g_zip);
if(empty($Firstname) || empty($Lastname) || empty($UserPhone)  || empty($zip) || strlen($UserPhone)!=10 || empty($origin) || empty($UserEmail)) {
	header("Location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
$strSQL = "INSERT INTO HOMEPROLEADSSTAGE ";
$strSQL .="(CUSTEMAIL,FIRSTNAME,LASTNAME,PHONE1,ADDRESS,CITY,STATE,ZIPCODE,IPADDRESS,ORIGIN,REFERER,SUBID,SUBID2,TASKID)";
$strSQL .="VALUES";
$strSQL .="('".$UserEmail."','".$Firstname."','".$Lastname."','".$UserPhone."','".$address."','".$city."','".$state."','".$zip."','".$ip."','".$origin."','".$ref."','".$subid."','".$subid2."','".$taskid."')";
$objParse = oci_parse($conn, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute){
	setcookie("ref", "", time()-3600);
	setcookie("subid", "", time()-3600);
	setcookie("subid2", "", time()-3600);
	oci_commit($conn); 
	unset($_COOKIE['ref']);
	unset($_COOKIE['subid']);
	unset($_COOKIE['subid2']);
	header("Location: thankyou"); 
} else {	
	oci_rollback($conn); 
	$m = oci_error($objParse);
	echo "Error Save [".$m['message']."]";
}