<link rel="stylesheet" href="css_sitemap/style.css?v=1.2">
<?php
include_once("include/config.php");
include("include/header.php");
$origin = 'pj-sitemap';
include("include/forms/pj_e_form.php");
include("include/awards.php");
?>

<div class="custom_sitemap">
	<div class="container">
	  <div class="heading-primary">PainterJunction Sitemap</div>
	  <div class="accordion">
		<dl>
		  <dt>
			<a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Home</a>
		  </dt>
		  <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
			<div class="col-sm-12">
				<p><a href="<?php echo $base_url; ?>">Home</a></p>
			</div>
		  </dd>
		  <dt>
			<a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">
			 Painting Quotes</a>
		  </dt>
		  <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
			<div class="col-sm-4">
				<p><a href="<?php echo $base_url; ?>painting-quotes"> Painting Quotes</a></p>
			</div>
		  </dd>
		    <dt>
			<a href="#accordion5" aria-expanded="false" aria-controls="accordion5" class="accordion-title accordionTitle js-accordionTrigger">
			About
			</a>
		  </dt>
		  <dd class="accordion-content accordionItem is-collapsed" id="accordion5" aria-hidden="true">
			<div class='col-sm-12'><p><a href="<?php echo $base_url; ?>about" >About</a></p></div>
		  </dd>
		  <dt>
			<a href="#accordion6" aria-expanded="false" aria-controls="accordion5" class="accordion-title accordionTitle js-accordionTrigger">
			Privacy Policy
			</a>
		  </dt>
		  <dd class="accordion-content accordionItem is-collapsed" id="accordion6" aria-hidden="true">
			<div class='col-sm-12'><p><a href="<?php echo $base_url; ?>privacy-policy" >Privacy Policy</a></p></div>
		  </dd>
		</dl>
	  </div>
	</div>
</div>

<?php
include("include/footer.php");
?>
 <!--<script src="js/bootstrap.min.js"></script>-->
    <!--<script src="js/jquery.isotope.min.js"></script>-->
    <!--<script src="js/main.js"></script>-->
	<script src="js_sitemap/index.js"></script>
	<!--<script type="text/javascript" src="js/stackbox-docs.js"></script>-->
	<script>
		$(document).ready(function () {
			$('[class^=state_slide]').click(function () { 
				//$('.'+this.className+'_child').slideToggle();
			});
		});
	</script>