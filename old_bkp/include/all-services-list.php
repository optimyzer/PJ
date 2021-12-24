<?php
//function get_all_services_list(){
	require_once('connection.php');
	$query = "select * from HOMEPROTASKS ";
	
	if(!empty($lead_type)){
		$query .= "where LEADTYPE='$lead_type'";
	}
	$results = oci_parse($conn,$query);
	$result = oci_execute($results);
	$all_services_list = array();
	while ($rows = oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$all_services_list[$rows['LEADTYPE']][$rows['NATURE']][] = $rows['SCOPE'];	
	}
	return $all_services_list;
//}
?>
