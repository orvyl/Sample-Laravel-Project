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
	
	<title>Group Gifts {{ isset($ptitle) ? '| '.$ptitle:'' }}</title>

	{{ HTML::style('css/normalize.css'); }}
	{{ HTML::style('css/style.css'); }}
	{{ HTML::style('css/combo_box.css') }}

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	{{ HTML::style('css/tablet.css', array('media'=>'only screen and (max-width: 1023px), only screen and (max-device-width : 1023px)')); }}
	{{ HTML::style('css/tablet_2.css', array('media'=>'only screen and (max-width: 950px), only screen and (max-device-width : 950px)')); }}
	{{ HTML::style('css/mobile.css', array('media'=>'only screen and (max-width: 736px), only screen and (max-device-width : 736px)')); }}
	{{ HTML::style('css/mobile_2.css', array('media'=>'only screen and (max-width: 600px), only screen and (max-device-width : 600px)')); }}
	{{ HTML::style('css/mobile_3.css', array('media'=>'only screen and (max-width: 430px), only screen and (max-device-width : 430px)')); }}
	{{ HTML::style('css/mobile_4.css', array('media'=>'only screen and (max-width: 300px), only screen and (max-device-width : 300px)')); }}
	
	@if(isset($css))
		@if(is_array($css))
			@foreach($css as $val)
				{{ HTML::style('css/'.$val) }}
			@endforeach
		@else
			{{ HTML::style('css/'.$css) }}
		@endif
	@endif
	<script type="text/javascript">var BaseUrl = "{{ URL::to('/') }}"</script>
</head>

<body class="hide">
<div class="loading"><div class="loading-logo"></div></div>
<div id="main-container">
	
	@include('includes.header')
	
	<div id="main-wrapper">
		@yield('content')
	</div>
</div>

@include('includes.footer')

{{ HTML::script('js/lib/jquery-1.8.3.min.js'); }}
{{ HTML::script('js/lib/jquery-ui.min.js'); }}
{{ HTML::script('js/lib/modernizr-2.6.2.min.js'); }}
{{ HTML::script('js/jquery.backstretch.min.js'); }}
{{ HTML::script('js/jquery.flexslider.js'); }}
{{ HTML::script('js/multiple_combo_box.js'); }}
{{ HTML::script('js/plugins.js'); }}

@if(isset($js))
	@if(is_array($js))
		@foreach($js as $val)
			{{ HTML::script('js/'.$val) }}
		@endforeach
	@else
		{{ HTML::script('js/'.$js) }}
	@endif
@endif

{{ HTML::script('js/custom.js'); }}

</body>
</html>
