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
		var logged = $('#keep-logged');
		if(logged.is(':checked'))
		{
			var keeplogged = $('#keep-logged').val();
		}
		else
		{
			var keeplogged = 0;
		}
		
		if (!login || login.length == 0)
		{
			$('#login-block').removeBlockMessages().blockMessage('Por favor ingresa tu Email', {type: 'warning'});
		}
		else if (!pass || pass.length == 0)
		{
			$('#login-block').removeBlockMessages().blockMessage('Por favor ingresa tu Contrase&ntilde;a', {type: 'warning'});
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
				pass: pass,
				keep_logged: keeplogged,
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
						var message = ''
						$.each(data.error, function(e, b)
						{
							message = b;
						});
						$('#login-block').removeBlockMessages().blockMessage(message, {type: 'error'});
						
						submitBt.enableBt();
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
					// Message
					$('#login-block').removeBlockMessages().blockMessage('Error  al contactar al servidor, por favor intenta de nuevo', {type: 'error'});
					
					submitBt.enableBt();
				}
			});
			
			// Message
			$('#login-block').removeBlockMessages().blockMessage('Please wait, cheking login...', {type: 'loading'});
		}
	});
});
