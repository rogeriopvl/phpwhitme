<?php 
	require_once ('../PHPWhitme.php');

	$pwm = new PHPWhitme();

	$urls = array (
		'http://google.com',
		'http://php.net'
	);

	$urlnotes = array();

	//print_r($pwm->short($urls, $urlnotes));

	$hash = 'nxUW8K';
	print_r($pwm->expand($hash));
?>
