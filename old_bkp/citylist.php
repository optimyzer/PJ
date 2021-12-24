<?php 
header('Access-Control-Allow-Origin: *');
require_once('include/connection.php');
if($_POST['lfromdata'])
{
$fullstate=$_POST['lfromdata'];
$city=oci_parse($conn,"SELECT CITY,min(zip) ZIP FROM CITYAREACODE where UPPER(FULLSTATE) = UPPER('".$fullstate."') group by city order by city");
$city_result = oci_execute($city);
echo "<option value=''>--Select City--</option>";
while ($stateR = oci_fetch_array($city, OCI_ASSOC+OCI_RETURN_NULLS)) {

$zip = $stateR['ZIP'];
$cityy=$stateR['CITY'];
echo '<option value="'.$zip.'">'.$cityy.'</option>';

}
 unset($stateR); 
    

oci_free_statement($city);
}



?>
