<?php 
include('include/config.php');
require_once('include/connection.php'); 
$formname = $_POST['form'];
$zip = trim($_POST['fromzip']);
$UserEmail = isset($_POST['UserEmail'])?trim($_POST['UserEmail']):'';
$ref = isset($_REQUEST['ref'])?$_REQUEST['ref']:'';
$subid = isset($_REQUEST['subid'])?$_REQUEST['subid']:'';
$subid2 = isset($_REQUEST['subid2'])?$_REQUEST['subid2']:'';
$origin=$_POST['origin'];
$taskid=$_POST['task_id'];
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
$task_id_check_query = "select count(*) as id_count from HOMEPROTASKS where TASKID='$taskid'";
$task_id_check_results = oci_parse($conn, $task_id_check_query);
$task_id_check_result = oci_execute($task_id_check_results);
$id_rows = oci_fetch_array($task_id_check_results, OCI_ASSOC+OCI_RETURN_NULLS);
$id_count = $id_rows['ID_COUNT'];
$sucess = 1;
if($id_count < 1) {
	$sucess = 0;
}
if($sucess != 0) {
	if(!empty($UserEmail)) {
		$sql = "INSERT INTO HOMEPROLEADSTEMP (ID, ZIPCODE,EMAIL,TASKID) values(:displayid, :zip, :email,:taskid)";
		$stmt = oci_parse($conn,$sql);
		oci_bind_by_name($stmt,':displayid',$displayid);
		oci_bind_by_name($stmt,':zip',$zip);
		oci_bind_by_name($stmt,':email',$UserEmail);
		oci_bind_by_name($stmt,':taskid',$taskid);
		oci_execute($stmt);
		$sucess=1;
	}else{
		$sucess=0;
		$display='';
	}
}
oci_close($conn); 
header("Content-Type: application/json", true);
$return=array('success'=>$sucess,'subid'=>$displayid);
echo json_encode($return);
exit;
?>
