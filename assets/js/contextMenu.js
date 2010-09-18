$(document).ready(function()
{
	// Context menu for all favorites
	$('.favorites li').bind('contextMenu', function(event, list)
	{
		var li = $(this);
		
		// Add links to the menu
		if (li.prev().length > 0)
		{
			list.push({ text: 'Move up', link:'#', icon:'up' });
		}
		if (li.next().length > 0)
		{
			list.push({ text: 'Move down', link:'#', icon:'down' });
		}
		list.push(false);	// Separator
		list.push({ text: 'Delete', link:'#', icon:'delete' });
		list.push({ text: 'Edit', link:'#', icon:'edit' });
	});
	
	// Extra options for the first one
	$('.favorites li:first').bind('contextMenu', function(event, list)
	{
		list.push(false);	// Separator
		list.push({ text: 'Settings', icon:'terminal', link:'#', subs:[
			{ text: 'General settings', link: '#', icon: 'blog' },
			{ text: 'System settings', link: '#', icon: 'server' },
			{ text: 'Website settings', link: '#', icon: 'network' }
		] });
	});
});
google.load('visualization', '1', {'packages':['corechart']});