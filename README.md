#PHPWhitme

##Info
PHPWhitme is a PHP library to interact with the http://whit.me url shortening service.
The code is working but still needs some tuning.

##Usage examples

###Shorten url with a note:

	require_once ('PHPWhitme.php');
	
	$whitme = new PHPWhitme();
	$url = 'http://rogeriopvl.com';
	$note = 'my personal website';
	
	print_r($whitme->short($url, $note));

###Shorten url with a personalized alias:

	require_once ('PHPWhitme.php');
	
	$whitme = new PHPWhitme();
	$url = 'http://rogeriopvl.com';
	$note = 'my personal website';
	$alias = 'mysite';
	
	print_r($whiteme->short($url, $note, null, $alias));

###Expand url:

	require_once ('PHPWhitme.php');
	
	$whitme = new PHPWhitme();
	$hash = 'nxUW8K';
	
	print_r($whitme->expand($hash));
