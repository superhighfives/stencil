<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	
	<title><?php echo $title; ?><?php if(isset($section)): ?> - <?php echo $section; ?><?php endif; ?></title>
	<meta name="description" content="<?php echo Config::get("description"); ?>">
	<meta name="author" content="<?php echo Config::get("author"); ?>">
	
	<?php $asset->link("favicon.ico", array("rel" => "shortcut icon")); ?>
	<?php $asset->link("apple-touch-icon.png", array("rel" => "apple-touch-icon")); ?>
	
	<?php $asset->stylesheet("css/style"); ?>
	<?php $asset->javascript("js/libs/modernizr-1.7.min"); ?>
	
</head>
<body>
	<div id="container">
		
		<header>

		</header>
		
		<div id="main" role="main">			


				
		</div>
		
		<footer>

		</footer>

	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
		
	<script src="js/script.js"></script>
	
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
	
	<?php if(Config::get("analytics") != ""): ?>
		<script>
			var _gaq=[['_setAccount','<?php echo Config::get("analytics"); ?>'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	<?php endif; ?>
	
</body>
</html>