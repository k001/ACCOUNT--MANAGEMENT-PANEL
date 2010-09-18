<?php
	
	// Lib
	require('libError.php');
	
	// If report data
	if (isset($_POST['report']) and strlen($_POST['report']) > 0)
	{
		$success = true;
		$historyGo = -2;
		
		// Session identifier
		if (session_id() == '')
		{
			session_start();
		}
		
		// Retrieve and decode error report
		$report = json_decode(decode($_POST['report'], session_id()));
		
		/*
		 * Do anything needed with the report data here: send by mail, log into database...
		 */
		 
		// Example : send by mail
		/*
		
		// Class not included in package, get it from http://sourceforge.net/projects/phpmailer/
		require('class.phpmailer.php');
		
		$from = (isset($_POST['sender']) and strlen($_POST['sender']) > 0) ? $_POST['sender'] : 'noreply@'.$_SERVER['HTTP_HOST'];
		
		$mail = new PHPmailer();
		$mail->IsSMTP();
		$mail->Host = 'smtp_host';
		$mail->From = $from;
		$mail->AddReplyTo($from);	
		$mail->AddAddress('quality.service@address.com');
		$mail->Subject = 'Error report from '.$_SERVER['HTTP_HOST'];
		
		// Compose message
		$mail->Body = '***** Error report from '.$_SERVER['HTTP_HOST'].' *****'."\n";
		$mail->Body .= "\n";
		$mail->Body .= 'Error type:      '.$report->type."\n";
		$mail->Body .= 'Page url:        '.$report->url."\n";
		$mail->Body .= 'Php error level: '.$report->number."\n";
		$mail->Body .= 'Error message:   '.$report->message."\n";
		$mail->Body .= 'File:            '.$report->file."\n";
		$mail->Body .= 'Line:            '.$report->line."\n";
		$mail->Body .= "\n";
		$mail->Body .= '***** Context: *****'."\n";
		$mail->Body .= strip_tags($report->line)."\n";
		$mail->Body .= "\n";
		$mail->Body .= '***** Stack backtrace: *****'."\n";
		$mail->Body .= strip_tags($report->stack)."\n";
		$mail->Body .= '***** Additional infos: *****'."\n";
		$mail->Body .= 'Host:            '.$_SERVER['HTTP_HOST']."\n";
		$mail->Body .= 'IP:              '.$_SERVER['SERVER_ADDR']."\n";
		$mail->Body .= 'Time:            '.date('r', $report->time)."\n";
		
		// User info
		if (isset($_POST['sender']) and strlen($_POST['sender']) > 0)
		{
			$mail->Body .= 'Report sent by:  '.$_POST['sender']."\n";
		}
		if (isset($_POST['description']) and strlen($_POST['description']) > 0)
		{
			$mail->Body .= 'User details:'."\n\n";
			$mail->Body .= $_POST['description']."\n";
		}
		
		// Send
		$success = $mail->Send();
		$mail->SmtpClose();
		
		*/
	}
	else
	{
		// Argh, no data...
		$success = false;
		$historyGo = -1;
	}
	
	// Check if AJAX request
	$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	if ($ajax)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: '.date('r', time()+(86400*365)));
		header('Content-type: application/json');
		
		echo json_encode(array(
			'valid' => $success
		));
		exit();
	}

?><!DOCTYPE html>
<html lang="en">
<head>

	<title>System error</title>
	<meta charset="utf-8">
	<meta name="robots" content="none">
	
	<!-- Mobile metas -->
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	
	<!-- Combined stylesheets load -->
	<link href="../css/mini.php?files=reset,common,form,standard,special-pages,simple-lists" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="icon" type="image/png" href="../favicon-large.png">
	
	<!-- Combined JS load -->
	<!-- html5.js has to be loaded before anything else -->
	<script type="text/javascript" src="../js/mini.php?files=html5,jquery-1.4.2.min,old-browsers,common,standard,jquery.tip.js,list"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="../js/standard.ie.js"></script><![endif]-->
	
</head>

<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page error-bg red dark">
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	
	<section id="error-desc">
		
		<ul class="action-tabs with-children-tip children-tip-left">
			<li><a href="javascript:history.go(<?php echo $historyGo; ?>)" title="Go back"><img src="../images/icons/fugue/navigation-180.png" width="16" height="16"></a></li>
		</ul>
		
		<div class="block-border"><div class="block-content">
				
			<h1>Admin</h1>
			<div class="block-header">Error report</div>
			
			<?php
			
			if ($success)
			{
			?><h2>Report sent</h2>
			
			<h5>Message</h5>
			<p>Thank you for sending the error report. If you provided your email address, we'll contact you as soon as the bug has been fixed.</p>
			
			<?php
			}
			else
			{
			?><h2>No report data submitted</h2>
			
			<h5>Message</h5>
			<p>There is no error report data to send. Please go back to previous page and try to submit it again.</p>
			
			<?php
			}
			
			?><p><a href="javascript:history.go(<?php echo $historyGo; ?>);" title="Return to previous page" class="button">Return to previous page</a></p>
		</div></div>
	</section>

<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
</body>
</html>