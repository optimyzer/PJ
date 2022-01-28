<?php 
if(isset($_GET['ref']) && ($_GET['ref'] != '')) {
	setcookie('ref', $_GET['ref'], time() + (86400 * 30),BASEURL);
}
if(isset($_GET['subid2']) && ($_GET['subid2'] != '')) {
	setcookie('subid2', $_GET['subid2'], time() + (86400 * 30),BASEURL);
}
?>