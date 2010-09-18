<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<title>Constellation Admin Skin</title>
	<meta charset="utf-8">	
	<!-- Global stylesheets -->
	<link href="/assets/css/reset.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/common.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/form.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/standard.css" rel="stylesheet" type="text/css">	
	<link href="/assets/css/960.gs.fluid.css" rel="stylesheet" type="text/css">
	
	<?=$_styles?>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">
	<link rel="icon" type="image/png" href="/assets/images/favicon-large.png">
	
	<!-- Generic libs -->
	<script type="text/javascript" src="/assets/js/html5.js"></script>				<!-- this has to be loaded before anything else -->
	<script type="text/javascript" src="/assets/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/assets/js/old-browsers.js"></script>		<!-- remove if you do not need older browsers detection -->
	
	<!-- Template libs -->
	<script type="text/javascript" src="/assets/js/jquery.accessibleList.js"></script>
	<script type="text/javascript" src="/assets/js/searchField.js"></script>
	<script type="text/javascript" src="/assets/js/common.js"></script>
	<script type="text/javascript" src="/assets/js/standard.js"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="/assets/js/standard.ie.js"></script><![endif]-->
	<script type="text/javascript" src="/assets/js/jquery.tip.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.hashchange.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.contextMenu.js"></script>
	
	<!-- Custom styles lib -->
	<script type="text/javascript" src="/assets/js/list.js"></script>
	
	<!-- Charts library -->
	<!--Load the AJAX API-->
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<?=$_scripts?>	

</head>

<body <?php echo (isset($login))?'class="special-page login-bg dark"': false;?>>
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	<?=$content?>
<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
</body>
</html>