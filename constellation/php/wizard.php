<!DOCTYPE html>
<html lang="en">
<head>

	<title>Constellation Admin Skin</title>
	<meta charset="utf-8">
	
	<!-- Combined stylesheets load -->
	<link href="css/mini.php?files=reset,common,form,standard,special-pages,wizard" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
	
	<!-- Combined JS load -->
	<!-- html5.js has to be loaded before anything else -->
	<script type="text/javascript" src="js/mini.php?files=html5,jquery-1.4.2.min,old-browsers,common,standard"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
	
</head>

<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page wizard-bg">
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie, .ie7 or .ie6 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	
	<section>
		<div class="block-border"><form class="block-content form inline-medium-label" name="login-form" id="login-form" method="post" action="">
				
			<h1>Easy setup wizard</h1>
			
			<ol class="wizard-steps no-margin">
				<li>
					<a href="#">
						<span class="number">1<span class="status-ok"></span></span>
						Database
					</a>
				</li>
				<li>
					<a href="#">
						<span class="number">2</span>
						Name
					</a>
				</li>
				<li class="disabled">
					<span class="number">3</span>
					Options
				</li>
			</ol>
			
			<span class="number bigger">2</span>
			<small>Setup wizard</small>
			<h2 class="bigger">Website name</h2>
			
			<p class="required">
				<label for="name"><span class="big">Website name</span></label>
				<input type="text" name="name" id="name" class="full-width" value="">
			</p>
			<p class="required">
				<label for="pass"><span class="big">Description</span><br>
				<small>For search engines</small></label>
				<textarea name="description" id="description" class="full-width" rows="8"></textarea>
			</p>
			
			<p>
				<input type="checkbox" name="index" id="index" value="1" class="switch" checked="checked"> &nbsp;
				<label for="index" class="inline grey">Allow search engines to index this site</label>
			</p>
			
			<p style="text-align:right;">
				<button type="submit">Next</button>
				<button type="button" class="grey">Need help?</button>
			</p>
		</form></div>
	</section>

<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
</body>
</html>
