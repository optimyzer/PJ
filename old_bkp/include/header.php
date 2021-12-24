<?php include('cookies.php'); 
$showJSONScriptCode = 1;
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $meta_keywords; ?>">
	<meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="author" content="PJ">
    <title><?php echo $title; ?></title>
	<base href="<?php echo BASEURL; ?>">
	<!--Start CSS-->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="<?php echo CSSPATH; ?>/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSSPATH; ?>/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
	<link href="<?php echo CSSPATH; ?>/mj_fonts.css" rel="stylesheet">
	<link href="<?php echo CSSPATH; ?>/fonts.css" rel="stylesheet">
	<link href="<?php echo CSSPATH; ?>/main.min.css?v=1.2" rel="stylesheet">
	<!--<link href="<?php echo CSSPATH; ?>/main.css?v=<?php echo time(); ?>" rel="stylesheet">-->
    <!--End CSS-->
    <!--Start Javascript-->
     <script src="<?php echo JSPATH; ?>/jquery.js" type="text/javascript"></script>
     <script src="<?php echo JSPATH; ?>/jquery-ui.js" type="text/javascript"></script>
     <script  src="<?php echo JSPATH; ?>/bootstrap.min.js" type="text/javascript"  ></script>
	 <!--End Javascript-->
	<?php
	//echo $showJSONScriptCode; 
	if($showJSONScriptCode == 1) {
		if( $showSchema == 1){
		?>
	<script type='application/ld+json'> 
		{
		"@context": "http://www.schema.org",
		"@type": "Organization",
		"name": "PainterJunction",
		"url": "https://www.painterjunction.com",
		"logo": "https://www.painterjunction.com/images/logo.png",
		"description": "PainterJunction is the web's premier resource to help you find and compare reliable and licensed painters. If you're looking for a painting pro to paint your house or office, PainterJunction has the largest network of professional painters waiting to assist you.",
		"address": {
		"@type": "PostalAddress",
		"streetAddress": "20130 Lakeview Center Plaza, Suite 400",
		"addressLocality": "Ashburn",
		"addressRegion": "Virginia",
		"postalCode": "20147",
		"addressCountry": "United States"
		},
		"contactPoint": {
		"@type": "ContactPoint",
		"telephone": "+1 888-901-4841",
		"contactType": "Customer Service"
		}
		}
	</script>
	<?php
		}
	if($showSchema == 2){ ?>
		<script type='application/ld+json'> 
		{
		  "@context": "http://schema.org",
		  "@type": "Organization",
		  "itemListElement": [{
			"@type": "ListItem",
			"position": 1,
			"item": {
			  "@id": "https://www.painterjunction.com",
			  "name": "PainterJunction"
			}
		  },{
			"@type": "ListItem",
			"position": 2,
			"item": {
			  "@id": "https://www.painterjunction.com/painting-quotes",
			  "name": "Painting Quotes"
			}
		  }]
		}
	</script>	
	<?php }
	if($showSchema == 3){ ?>
		<script type='application/ld+json'> 
		{
		  "@context": "http://schema.org",
		  "@type": "Organization",
		  "itemListElement": [{
			"@type": "ListItem",
			"position": 1,
			"item": {
			  "@id": "https://www.painterjunction.com",
			  "name": "PainterJunction"
			}
		  },{
			"@type": "ListItem",
			"position": 2,
			"item": {
			  "@id": "https://www.painterjunction.com/about",
			  "name": "About"
			}
		  }]
		}
	</script>
	<?php 
		}
	}
	?>
</head>
<body class="<?php echo $body_class; ?>">
<header id="header">
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					
				</div>
				<div class="col-sm-8 col-xs-12">
					<div class="top-number"><p><i class="fa fa-envelope"></i>
						<a href="mailto:info@painterjunction.com">info@painterjunction.com</a> 
						<!--&nbsp;&nbsp;&nbsp;<i class="fa fa-phone-square"></i>  <a onclick="goog_report_conversion('tel:+18889014841');" href="javascript:void(0);">888.901.4841</a>
						-->
						</p>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12 top-number_3"> 
					<div class="top-number_2"><p>Call For a FREE Quote:&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;<b><a onclick="goog_report_conversion('tel:+18889014841');" href="javascript:void(0);">888.901.4841</a></b></p>
						</div>
				</div>
				</div><!--/.container-->
			</div><!--/.top-bar-->
			<nav class="navbar navbar-inverse affix-top" role="banner" data-spy="affix" data-offset-top="37" style="top: 0px;">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo BASEURL ?>"><img src="<?php  echo IMGPATH;  ?>/logo.png" alt="logo" title="logo" width="100%" height="auto"></a>
					</div>
					
					<div class="collapse navbar-collapse navbar-right">
						<ul class="nav navbar-nav">
						<li class="truck"><a href="<?php echo BASEURL ?>painting-quotes">PAINTING QUOTES</a></li>
						<!--<li class="truck"><a href="<?php echo BASEURL ?>services">Services</a></li>-->
							<li class="truck"><a href="<?php echo BASEURL ?>about">About</a></li> 
       							<li class="labor"><a href="javascript:void(0);" onclick="goog_report_conversion('tel:+18889014841');"><i class="fa fa-phone-square"></i> 888.901.4841</a></li>              
						</ul>
					</div>
				</div><!--/.container-->
			</nav><!--/nav-->		
		</div>
</header>

