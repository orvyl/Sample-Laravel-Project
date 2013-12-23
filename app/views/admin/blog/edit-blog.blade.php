@extends('admintemplate')

@section('content')

@if(Session::get('msg'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('msg') }}</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>Edit Form</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/blog/editblog') }}" id="frmnewproduct" enctype="multipart/form-data">
        		<div class="formRow">
                    <div class="grid3"><label>Title:</label></div>
                    <div class="grid9"><input type="text" name="btitle" value="{{ $blog->title }}" class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Content:</label></div>
                    <div class="grid9" style="border: 1px solid #d7d7d7">
                        <textarea id="editor" name="bcontent" rows="" cols="16">{{ $blog->content }}</textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">    
                    <div class="grid3"><label>Upload image: </label></div>
                    <div class="grid9">
                        <div class="floatL mr10"><input type="file" name="img" class="upl" /></div>
                        <span class="num-file"></span>
                    </div>
                    <div class="clear"></div>               
                </div>
                <div class="formRow">
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                    <input type="submit" class="buttonL bGreen floatR" value="Update Blog" />
                    <div class="clear"></div>
                </div>

        	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#frmnewproduct').validate();

    $('.upl').change(function(){
        var n = $("input:file")[0].files.length;
        $('.num-file').text(n+' file(s)');
    });
});
</script>

@endsection

@section('subnav')

    @include('admin.blog.bsubnav')

@endsection