<?php
header('content-type:text/xml');
$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

$xml .= '<url><loc>http://painterjunction.com</loc></url>';
$xml .= '<url><loc>http://painterjunction.com/painting-quotes</loc></url>';
$xml .= '<url><loc>http://painterjunction.com/about</loc></url>';
$xml .= '<url><loc>http://painterjunction.com/privacy-policy</loc></url>';
$xml .='</urlset>';	
echo $xml;			
$myfile = fopen("sitemap.xml", "w") or die("Unable to open file!");
fwrite($myfile, $xml);
fclose($myfile);		

