@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>Occasion Type Form</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/occasions/create') }}" id="frmcreateocctype">
        		<div class="formRow">
                    <div class="grid3"><label>Occasion Type:</label></div>
                    <div class="grid9"><input type="text" name="occasion_type" value="{{ Input::old('occasion_type') }}" class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Description:</label></div>
                    <div class="grid9">
                        <textarea rows="8" name="description" class="required">{{ Input::old('description') }}</textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <input type="submit" class="buttonL bGreen floatR" value="+ Occasion Type" />
                    <div class="clear"></div>
                </div>

        	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#frmcreateocctype').validate();
</script>

@endsection

@section('subnav')

    @include('admin.occasions.osubnav')

@endsection