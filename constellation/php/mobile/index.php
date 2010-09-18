<!DOCTYPE html>
<html lang="en">
<head>

	<title>Constellation Admin Skin</title>
	<meta charset="utf-8">
	
	<!-- Mobile metas -->
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	
	<!-- Those meta will turn your website into an app on the iPhone -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="apple-touch-startup-image" href="../images/iphone_startup.png">
	
	<!-- Combined stylesheets load -->
	<link href="../css/mini.php?files=reset,common,form,mobile,block-lists" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="icon" type="image/png" href="../favicon-large.png">
	<link rel="apple-touch-icon" href="../apple-touch-icon.png"/>
	
	<!-- Combined JS load -->
	<!-- html5.js has to be loaded before anything else -->
	<script type="text/javascript" src="../js/mini.php?files=jquery-1.4.2.min,common,mobile,jquery.tip.js"></script>
	
</head>

<body class="dark">
	
	<header>
		<h1>Dashboard</h1>
	</header>
	
	<a href="javascript:history.back();" id="back">Back</a>
	<div id="menu">
		<a href="#">Menu</a>
		
		<ul>
			<li><a href="#">Write</a>
				<ul>
					<li><a href="#">Articles</a></li>
					<li><a href="#">Add article</a></li>
					<li><a href="#">Posts</a></li>
					<li><a href="#">Add post</a></li>
				</ul>
			</li>
			<li><a href="#">Stats</a>
				<ul>
					<li><a href="#">Global stats</a>
						<ul>
							<li><a href="#">Views</a></li>
							<li><a href="#">Unique visitors</a></li>
							<li><a href="#">Sources</a></li>
						</ul>
					</li>
					<li><a href="#">Server load</a></li>
					<li><a href="#">Website stats</a></li>
					<li><a href="#">Reports</a></li>
					<li><a href="#">logs</a></li>
					<li><a href="#">Settings</a></li>
				</ul>
			</li>
			<li><a href="#">Users</a>
				<ul>
					<li><a href="#">List</a></li>
					<li><a href="#">Add user</a></li>
					<li><a href="#">Settings</a></li>
				</ul>
			</li>
			<li><a href="#">System settings</a>
				<ul>
					<li><a href="#">General</a></li>
					<li><a href="#">Server config</a></li>
					<li><a href="#">User groups</a></li>
				</ul>
			</li>
			<li><a href="#">My profile</a></li>
			<li class="red"><a href="#">Logout</a></li>
		</ul>
	</div>
	
	<div id="status-bar">
		Logged as: <strong>Admin</strong>
		
		<ul id="status-infos">
			<li><a href="#" class="button" title="5 messages"><img src="../images/icons/fugue/mail.png" width="16" height="16"> <strong>5</strong></a></li>
		</ul>
	</div>
	<div id="header-shadow"></div>
	
	<article>
		
		<ul class="shortcuts-list">
			<li><a href="#">
				<img src="../images/icons/web-app/48/Loading.png" width="48" height="48"> Dashboard
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Modify.png" width="48" height="48"> Write
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Comment.png" width="48" height="48"> Comments
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Picture.png" width="48" height="48"> Images
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Profile.png" width="48" height="48"> Users
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Pie-Chart.png" width="48" height="48"> Stats
			</a></li>
			<li><a href="#">
				<img src="../images/icons/web-app/48/Info.png" width="48" height="48"> Settings
			</a></li>
		</ul>
		
		<p><button class="big full-width" onClick="document.location.href='tour-favourites.html'">Favourites</button></p>
		
		<p class="message info">Want to see more? <a href="tour.html">Click here</a> to take the tour</p>
	
	</article>
	
</body>
</html>