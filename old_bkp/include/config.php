<?php
error_reporting(0);
$isAjax = false;
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
		$isAjax = true;
}
if(!$isAjax) {
	if(strstr($_SERVER['HTTP_HOST'],'dev.moverjunction.com')) {
		$protocol = "http://";
	} else { 
		$protocol = "https://";
		//$protocol = "http://";
	}
	if(strstr($_SERVER['REQUEST_URI'],'.php')) {
		$req_uri = str_replace(".php", "", $_SERVER['REQUEST_URI']);
		$redirect_url = $protocol.$_SERVER['HTTP_HOST'].$req_uri;
		header("HTTP/1.1 301 Moved Permanently");
		header("location: ".$redirect_url);
		exit;
	}
}
define("BASEURL", "https://www.painterjunction.com/");
define("SERVERMODE", 'PROD'); //DEV,PROD
define("CSSPATH", BASEURL."css");
define("JSPATH", BASEURL."js");
define("IMGPATH", BASEURL."images");
define("ORIGIN", "pj-pnt");
define("FORMNAME", "pj_e_form");
define("SITEVERSION", 1.0);
$title = "Painter Junction";
$meta_keywords = "Meta Keyword";
$meta_description = "Meta Desc";
$body_class = 'pj_homepage';
//$ref=isset($_GET['ref'])?$_GET['ref']:$_COOKIE['ref'];
$origin = 'pj-home';
$subid = '';
$subid2 = '';
?>