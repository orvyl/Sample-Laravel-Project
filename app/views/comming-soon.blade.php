<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->

<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="pragma" content="no-cache" /> 
	<meta http-equiv="Expires" content="-1" /> 
	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Group Gifts | Coming Soon</title>

	<link rel="stylesheet" href="{{ URL::to('/') }}/css/normalize.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">

	<link rel="stylesheet" media="only screen and (max-width: 1023px), only screen and (max-device-width : 1023px)" href="{{ URL::to('/') }}/css/tablet.css" />
	<link rel="stylesheet" media="only screen and (max-width: 950px), only screen and (max-device-width : 950px)" href="{{ URL::to('/') }}/css/tablet_2.css" />
	<link rel="stylesheet" media="only screen and (max-width: 736px), only screen and (max-device-width : 736px)" href="{{ URL::to('/') }}/css/mobile.css" />
	<link rel="stylesheet" media="only screen and (max-width: 600px), only screen and (max-device-width : 600px)" href="{{ URL::to('/') }}/css/mobile_2.css" />
	<link rel="stylesheet" media="only screen and (max-width: 430px), only screen and (max-device-width : 430px)" href="{{ URL::to('/') }}/css/mobile_3.css" />
	<link rel="stylesheet" media="only screen and (max-width: 300px), only screen and (max-device-width : 300px)" href="{{ URL::to('/') }}/css/mobile_4.css" />
	<script type="text/javascript">var BaseUrl = "{{ URL::to('/') }}"</script>
</head>

<body class="hide coming-soon">
<div class="loading"><div class="loading-logo"></div></div>
<div id="main-container">
	
	<div id="main-wrapper">
		<div class="login-main">
			<div class="login-log"><img src="{{ URL::to('/') }}/images/home/logo_main.png" width="190" height="264" alt="" title=""/></div>
			<h2>Admin Log In</h2>
			<div class="login-main-form">
			    {{ Session::get('msg') }}
			    <form method="post">
			        <ul>
					    <li>
						    <label for="">Email / Username:</label>
						    <input type="text" name="em" value="" required/>
					    </li>
					    <li>
						    <label for="">Password:</label>
						    <input type="password" name="pwd" value="" required/>
					    </li>
					    <li>
						    <div class="fr">
							    <input type="submit" name="" value="Submit"/>
						    </div>
						    <div class="clr"></div>
					    </li>
				    </ul>
			    </form>
			</div>
		</div>
		<div class="coming-bottom"><p>All Rights Reserved  © Group GIfts 2012</p></div>
	</div>
</div>
<div id="footer-wrapper" class="">
	
</div>


<script>window.jQuery || document.write('<script src="{{ URL::to('/') }}/js/lib/jquery-1.8.3.min.js"><\/script>')</script>
<script>window.jQuery || document.write('<script src="{{ URL::to('/') }}/js/lib/jquery-ui.min.js"><\/script>')</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/js/lib/modernizr-2.6.2.min.js"></script>
{{ HTML::script('js/jquery.backstretch.min.js'); }}
<script type="text/javascript" src="{{ URL::to('/') }}/js/lib/clearfield.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/js/multiple_combo_box.js"></script>
<script src="{{ URL::to('/') }}/js/plugins.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/js/custom.js"></script>

</body>
</html>
