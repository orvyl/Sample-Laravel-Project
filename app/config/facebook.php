<?php

$fb = array(
		'appId'=>'193797110821418',
		'secret'=>'0792ba16ad19e0e9ed87bf557edf0076'
	);

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
{
	$fb = array(
		'appId'=>'1440172779534359',
		'secret'=>'c1a28739945a6576fb721bc1b89673b7'
	);
}

return $fb;