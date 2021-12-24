<?php 
include('include/config.php');
require_once('include/connection.php'); 
$formname = $_POST['form'];
$zip = trim($_POST['fromzip']);
$nature = $_POST['nature'];
$scope = $_POST['scope'];
$UserEmail = isset($_POST['UserEmail'])?trim($_POST['UserEmail']):'';
$leadtype = $_POST['leadtype'];
$ref = isset($_REQUEST['ref'])?$_REQUEST['ref']:'';
$subid = isset($_REQUEST['subid'])?$_REQUEST['subid']:'';
$subid2 = isset($_REQUEST['subid2'])?$_REQUEST['subid2']:'';
$origin=$_POST['origin'];

function alphaidfunc($num){
	$alpha = null;
	for($i=0; $i<$num; $i++){
		$alpha .= chr(rand(97,122));	
	}
	return $alpha;
}
$alphaid = alphaidfunc(8);
$numericid = mt_rand(1000000000, 9999999999);
$displayid = $alphaid.$numericid;

 // for get task id on the basis of nature and scope of task--//
$scopes=oci_parse($conn,"select TASKID from HOMEPROTASKS where LEADTYPE='$leadtype' and NATURE='$nature' and SCOPE='$scope'");
$scopes_result = oci_execute($scopes);
$rows = oci_fetch_array($scopes, OCI_ASSOC+OCI_RETURN_NULLS);
$taskid=$rows['TASKID'];

// end here---------
if(!empty($UserEmail)) {
	$sql = "INSERT INTO HOMEPROLEADSTEMP (ID, ZIPCODE, LEADTYPE, NATURE, SCOPE, EMAIL,TASKID) values(:displayid, :zip, :leadtype, :nature, :scope, :email,:taskid)";
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':displayid',$displayid);
	oci_bind_by_name($stmt,':zip',$zip);
	oci_bind_by_name($stmt,':leadtype',$leadtype);
	oci_bind_by_name($stmt,':nature',$nature);
	oci_bind_by_name($stmt,':scope',$scope);
	oci_bind_by_name($stmt,':email',$UserEmail);
	oci_bind_by_name($stmt,':taskid',$taskid);
	oci_execute($stmt);
	$sucess=1;
}

else{
	
	$sucess=0;
	$display='';
}
oci_close($conn); 
header("Content-Type: application/json", true);
$return=array('success'=>1,
			'subid'=>$displayid);
echo json_encode($return);
exit;
?>
