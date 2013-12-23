<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>{{ isset($ptitle) ? $ptitle.' |':'' }} Administrator Portal v1.0.0</title>

<link href="{{ URL::to('/') }}/adminpublic/css/styles.css" rel="stylesheet" type="text/css" />
<!--[if IE]> <link href="{{ URL::to('/') }}/adminpublic/css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->
<link href="{{ URL::to('/') }}/adminpublic/customstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/ui.spinner.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.mousewheel.js"></script>
<script type="text/javascript">
    var BaseUrl = "{{ URL::to('/') }}";

    function _Redirect (url)
    {
        if (navigator.userAgent.match(/MSIE\s(?!9.0)/))
        {
            var referLink = document.createElement('a');
            referLink.href = url;
            document.body.appendChild(referLink);
            referLink.click();
        } 
        else
        {
            window.location.href = url;
        }
    }
</script>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/excanvas.min.js"></script>
<!-- <script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/jquery.flot.resize.js"></script> -->
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/tables/jquery.sortable.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/tables/jquery.resizable.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.uniform.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.autotab.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.chosen.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.ibutton.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/forms/jquery.validationEngine.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/wizards/jquery.form.wizard.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/wizards/jquery.validate.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/wizards/jquery.form.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.fileTree.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/others/jquery.fullcalendar.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/others/jquery.elfinder.js"></script>

<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/plugins/ui/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/files/bootstrap.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/files/functions.js"></script>

@if(isset($js))
    @if(is_array($js))
        @foreach($js as $val)
            {{ HTML::script('adminpublic/js/'.$val) }}
        @endforeach
    @else
        {{ HTML::script('adminpublic/js/'.$js) }}
    @endif
@endif

<!-- <script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/charts/chart.js"></script> -->
<!-- <script type="text/javascript" src="{{ URL::to('/') }}/adminpublic/js/charts/hBar_side.js"></script> -->


</head>

<body>

<!-- Top line begins -->
@include('admin.includes.top-line')
<!-- Top line ends -->


<!-- Sidebar begins -->
<div id="sidebar">
    <!-- Main Navigator -->
    @include('admin.includes.main-nav')
    
    <!-- Secondary nav -->
    @include('admin.includes.second-nav')
</div>
<!-- Sidebar ends -->
    
    
<!-- Content begins -->
<div id="content">
    <!-- Content Top -->
    @include('admin.includes.content-top')
    
    <!-- Breadcrumbs line -->
    @include('admin.includes.breadcrumbs-line')
    
    <!-- Main content -->
    <div class="wrapper">
        <!-- Middle Nav Circles -->
        @include('admin.includes.nav-circle')

        @yield('content')
    </div>
    <!-- Main content ends -->
    
</div>
<!-- Content ends -->
</body>
</html>
