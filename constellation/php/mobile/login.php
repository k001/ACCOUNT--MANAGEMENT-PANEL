<?php

	$error = false;
	
	// If login form submitted
	if (isset($_POST['a']))
	{
		$valid = false;
		$redirect = isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : 'index.php';
		
		// Check fields
		if (!isset($_POST['login']) or strlen($_POST['login']) == 0)
		{
			$error = 'Please enter your user name';
		}
		elseif (!isset($_POST['pass']) or strlen($_POST['pass']) == 0)
		{
			$error = 'Please enter your password';
		}
		else
		{
			/*
			 * Do whatever here to check user login
			 */
			$valid = ($_POST['login'] == 'admin' and $_POST['pass'] == 'admin');
			
			if (!$valid)
			{
				$error = 'Wrong user/password, please try again';
			}
		}
		
		// Check if AJAX request
		$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
		
		// If user valid
		if ($valid)
		{
			// Handle the keep-logged option
			if (isset($_POST['keep-logged']) and $_POST['keep-logged'] == 1)
			{
				// Set cookie or whatever here
			}
			
			if ($ajax)
			{
				header('Cache-Control: no-cache, must-revalidate');
				header('Expires: '.date('r', time()+(86400*365)));
				header('Content-type: application/json');
				
				echo json_encode(array(
					'valid' => true,
					'redirect' => $redirect
				));
				exit();
			}
			else
			{
				header('Location: '.$redirect);
				exit();
			}
		}
		else
		{
			if ($ajax)
			{
				header('Cache-Control: no-cache, must-revalidate');
				header('Expires: '.date('r', time()+(86400*365)));
				header('Content-type: application/json');
				
				echo json_encode(array(
					'valid' => false,
					'error' => $error
				));
				exit();
			}
		}
	}

?><!DOCTYPE html>
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
	<link href="../css/mini.php?files=reset,common,form,mobile,special-pages" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="icon" type="image/png" href="../favicon-large.png">
	<link rel="apple-touch-icon" href="../apple-touch-icon.png"/>
	
	<!-- Combined JS load -->
	<!-- html5.js has to be loaded before anything else -->
	<script type="text/javascript" src="../js/mini.php?files=jquery-1.4.2.min,common,mobile,jquery.tip.js"></script>
	
	<!-- example login script -->
	<script type="text/javascript">
	
		$(document).ready(function()
		{
			// We'll catch form submission to do it in AJAX, but this works also with JS disabled
			$('#login-form').submit(function(event)
			{
				// Stop full page load
				event.preventDefault();
				
				// Check fields
				var login = $('#login').val();
				var pass = $('#pass').val();
				
				if (!login || login.length == 0)
				{
					$('#login-block').removeBlockMessages().blockMessage('Please enter your user name', {type: 'warning'});
				}
				else if (!pass || pass.length == 0)
				{
					$('#login-block').removeBlockMessages().blockMessage('Please enter your password', {type: 'warning'});
				}
				else
				{
					var submitBt = $(this).find('button[type=submit]');
					submitBt.disableBt();
					
					// Target url
					var target = $(this).attr('action');
					if (!target || target == '')
					{
						// Page url without hash
						target = document.location.href.match(/^([^#]+)/)[1];
					}
					
					// Request
					var data = {
						a: $('#a').val(),
						login: login,
						pass: pass
					};
					var redirect = $('#redirect');
					if (redirect.length > 0)
					{
						data.redirect = redirect.val();
					}
					
					// Start timer
					var sendTimer = new Date().getTime();
					
					// Send
					$.ajax({
						url: target,
						dataType: 'json',
						type: 'POST',
						data: data,
						success: function(data, textStatus, XMLHttpRequest)
						{
							if (data.valid)
							{
								// Small timer to allow the 'cheking login' message to show when server is too fast
								var receiveTimer = new Date().getTime();
								if (receiveTimer-sendTimer < 500)
								{
									setTimeout(function()
									{
										document.location.href = data.redirect;
										
									}, 500-(receiveTimer-sendTimer));
								}
								else
								{
									document.location.href = data.redirect;
								}
							}
							else
							{
								// Message
								$('#login-block').removeBlockMessages().blockMessage(data.error || 'An unexpected error occured, please try again', {type: 'error'});
								
								submitBt.enableBt();
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{
							// Message
							$('#login-block').removeBlockMessages().blockMessage('Error while contacting server, please try again', {type: 'error'});
							
							submitBt.enableBt();
						}
					});
					
					// Message
					$('#login-block').removeBlockMessages().blockMessage('Please wait, cheking login...', {type: 'loading'});
				}
			});
		});
	
	</script>
	
</head>

<body class="special-page login-bg">
	
	<section id="login-block" class="medium-margin">
		<div class="block-border"><form class="form block-content" name="login-form" id="login-form" method="post" action="">
			
			<div class="block-header">Please login</div>
			
			<input type="hidden" name="a" id="a" value="send">
			<p class="inline-mini-label small-margin">
				<label for="login"><span class="big">User</span></label>
				<input type="text" name="login" id="login" class="full-width" value="">
			</p>
			<p class="inline-mini-label">
				<label for="pass"><span class="big">Pass</span></label>
				<input type="password" name="pass" id="pass" class="full-width" value="">
			</p>
			
			<button type="submit" class="float-right">Login</button>
			<p class="input-height">
				<input type="checkbox" name="keep-logged" id="keep-logged" value="1" class="mini-switch" checked="checked">
				<label for="keep-logged" class="inline">Keep me logged in</label>
			</p>
			
		</form></div>
	</section>
	
	<p><button type="button" class="big full-width">Lost password?</button></p>
	
</body>
</html>