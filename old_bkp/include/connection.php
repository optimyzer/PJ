<?php
$db ="(DESCRIPTION =  
		(ADDRESS_LIST =  
			(ADDRESS = (PROTOCOL = TCP)(HOST 
			= apex4.revion.com)(PORT = 15210))  
		)  
	(CONNECT_DATA =  
		(SID = apex4)  
		(SERVER = DEDICATED)  
	) 
 )";
 
$dbname = "APEX4";
$user = "me100rabh";
$pwd = "rabh##1";
$host = "apex4.revion.com";

// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect($user, $pwd, $db);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
