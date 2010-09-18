<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Your browser is too old</title>
	<style type="text/css">
		
		body {
			background: #d5d8db;
			padding: 100px 0 0 0;
			margin: 0;
			text-align: center;
			font-family: Verdana, Arial, Helvetica, sans-serif;
		}
		body.dark {
			background: #70828f;
		}
		body, h2 {
			font-size: 12px;
			line-height: 15px;
		}
		a {
			text-decoration: none;
		}
		
		.block {
			width: 428px;
			margin: 0 auto;
			text-align: left;
		}
		#head {
			background: url(images/old-browsers-screen/head.jpg) no-repeat center bottom;
			padding: 22px 22px 0 22px;
			}
			body.dark #head {
				background-image: url(images/old-browsers-screen/head-dark.jpg);
			}
			#head h1 {
				height: 74px;
				line-height: 74px;
				text-align: center;
				color: white;
				font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Sans", Arial, Helvetica, sans-serif;
				font-size: 24px;
				font-weight: bold;
				padding: 0;
				margin: 0;
			}
		#body {
			background: url(images/old-browsers-screen/body.jpg) no-repeat center bottom;
			padding: 20px 42px 42px 42px;
			}
			body.dark #body {
				background-image: url(images/old-browsers-screen/body-dark.jpg);
			}
			#body p {
				padding: 0;
				margin: 0 0 15px;
			}
			#body h2 {
				font-weight: bold;
				padding: 0;
				margin: 0 0 15px;
			}
		
		#links {
			height: 120px;
			position: relative; /* Absolute positioning is used to prevent floating issues */
			list-style-type: none;
			padding: 0;
			margin: 0;
			}
			#links li {
				position: absolute;
				width: 114px;
				height: 50px;
				}
				#links li a {
					display: block;
					height: 50px;
					padding-left: 54px;
					background-repeat: no-repeat;
					color: #666666;
					font-size: 10px;
					line-height: 12px;
				}
				#links li a strong {
					color: #000000;
				}
				#links li a span {
					display: block;
					padding-top: 12px;
				}
				#links li a:hover {
					color: #999999;
					}
					#links li a:hover strong {
						color: #666666;
					}
			
			#links li#link-chrome a {
				background-image: url(images/icons/browsers/chrome.jpg);
			}
			#links li#link-firefox {
				left: 115px;
				}
				#links li#link-firefox a {
					background-image: url(images/icons/browsers/firefox.jpg);
				}
			#links li#link-safari {
				left: 230px;
				}
				#links li#link-safari a {
					background-image: url(images/icons/browsers/safari.jpg);
				}
			#links li#link-ie {
				top: 70px;
				}
				#links li#link-ie a {
					background-image: url(images/icons/browsers/ie.jpg);
					}
					#links li#link-ie a span {
						padding-top: 6px;
					}
			#links li#link-opera {
				top: 70px;
				left: 115px;
				}
				#links li#link-opera a {
					background-image: url(images/icons/browsers/opera.jpg);
					}
					#links li#link-opera a span {
						padding-top: 18px;
					}
			
			#skip {
				background: url(images/old-browsers-screen/skip.jpg) no-repeat;
				padding: 22px;
				}
				body.dark #skip {
					background-image: url(images/old-browsers-screen/skip-dark.jpg);
				}
				#skip a {
					display: block;
					padding: 20px;
					color: #dadada;
					}
					#skip a:hover {
						color: #ffffff;
					}
					#skip a img {
						border: 0;
						margin-bottom: -4px;
						filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/icons/fugue/navigation.png', sizingMethod='scale');
					}
	
	</style>
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
</head>

<body>
	
	<!-- Main block -->
	<div class="block">
		<div id="head">
			
			<h1>Your browser is outdated</h1>
			
		</div>
		<div id="body">
			
			<p>Your browser is too old to handle this web application, or may not display it correctly.</p>
			
			<h2>Please upgrade to a modern browser:</h2>
			
			<ul id="links">
				<li id="link-chrome"><a href="http://www.google.com/chrome" title="Download Chrome"><span>Google<br /><strong>Chrome</strong></span></a></li>
				<li id="link-firefox"><a href="http://www.mozilla.com" title="Download Firefox"><span>Mozilla<br /><strong>Firefox</strong></span></a></li>
				<li id="link-safari"><a href="http://www.apple.com/safari/" title="Download Safari"><span>Apple<br /><strong>Safari</strong></span></a></li>
				<li id="link-ie"><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx" title="Download Internet Explorer"><span>Microsoft<br /><strong>Internet<br />Explorer</strong></span></a></li>
				<li id="link-opera"><a href="http://www.opera.com" title="Download Opera"><span><strong>Opera</strong></span></a></li>
			</ul>
			
		</div>
	</div>
	<!-- Main block end -->
	
	<!-- Skip link -->
	<div class="block">
		<div id="skip">
			<a href="<?php
			
			// Check if redirection page is set
			if (isset($_GET['redirect']))
			{
				$redirect = $_GET['redirect'];
				$redirect .= (strpos($redirect, '?') === false) ? '?' : '&';
			}
			else
			{
				// Default page
				$redirect = 'index.php?';
			}
			
			echo $redirect.'forceAccess=yes';
			
			?>" title="Click only if you are sure of your browser">
				<img src="images/icons/fugue/navigation.png" width="16" height="16" /> I'm warned, <strong>let me in anyway</strong>
			</a>
		</div>
	</div>
	<!-- Skip link end -->
</body>
</html>
