<?php  
include_once("include/config.php");
?>
<!DOCTYPE html> 
<html lang="en">
<head>
<?php
	include("include/head.php");
	if($showJSONScriptCode) {
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
	?>
</head>
<body class="<?php echo $body_class; ?>">
<?php 	
include("include/header.php");

$origin = 'pj-home';
include_once("include/forms/pj_e_form.php");
include_once("include/awards.php");
include_once("include/explanation.php");
include_once("include/content.php");
include_once("include/customer-story.php");
include_once("include/footer.php");
?>
</body>
</html>
