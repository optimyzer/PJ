<?php require_once('connection.php'); ?>
<div id="Lfromziphelp" style="display:none">
<div class="stackbox-body">
<select name="lfromstate" class="lfromstate">
<option selected="selected">--Select State--</option>
<?php
// GENRIC FROM ZIP
$lfromstate = oci_parse($conn, "SELECT fullstate FROM CITYAREACODE group by fullstate order by fullstate ASC");
$state_result = oci_execute($lfromstate);
while ($stateR = oci_fetch_array($lfromstate, OCI_ASSOC+OCI_RETURN_NULLS)) {
		// Use the uppercase column names for the associative array indices 
	$lfromdata=$stateR['FULLSTATE'];
	echo '<option value="'.$lfromdata.'">'.$lfromdata.'</option>';
 } 
 unset($stateR); 
oci_free_statement($lfromstate);
?>
</select><div id="loader_from" class="loader"><img src="images/loader.gif" width="auto" height="auto"></div><br/><br/>
     <select name="lfromcity" class="lfromcity">
<option selected="selected">--Select City--</option>

</select>

     </div>
</div>

<div id="Ltoziphelp" style="display:none">
 <div class="stackbox-body">
   <select name="ltostate" class="ltostate">
<option selected="selected">--Select State--</option>
<?php

// GENRIC FROM ZIP
$ltostate = oci_parse($conn, "SELECT fullstate FROM CITYAREACODE group by fullstate order by fullstate ASC");
$state_result = oci_execute($ltostate);

while ($stateR = oci_fetch_array($ltostate, OCI_ASSOC+OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
    
$ltodata=$stateR['FULLSTATE'];
echo '<option value="'.$ltodata.'">'.$ltodata.'</option>';
 } 
 
 unset($stateR); 
    

oci_free_statement($ltostate);
?>
</select>
<div id="loader_to" class="loader custom_loader">
	<img src="images/loader.gif" width="auto" height="auto">
</div><br/><br/>
     <select name="ltocity" class="ltocity">
<option selected="selected">--Select City--</option>
</select>
     </div>
</div>
