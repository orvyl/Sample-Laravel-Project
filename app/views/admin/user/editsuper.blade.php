@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>Edit Administrator Account</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/users/edsuper/'.Request::segment(4)) }}" id="frmnewadmin">
        		<div class="formRow">
                    <div class="grid3"><label>Username:</label></div>
                    <div class="grid9"><input type="text" name="username" value="{{ $user->username }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Email:</label></div>
                    <div class="grid9"><input type="text" name="email" value="{{ $user->email }}"class="required email"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>First name:</label></div>
                    <div class="grid9"><input type="text" name="first_name" value="{{ $user->first_name }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Last name:</label></div>
                    <div class="grid9"><input type="text" name="last_name" value="{{ $user->last_name }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Old Password:</label></div>
                    <div class="grid9"><input type="password" name="oldpassword"  /></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>New Password:</label></div>
                    <div class="grid9"><input type="password" name="password" /></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Confirm Password:</label></div>
                    <div class="grid9"><input type="password" name="password_confirmation" /></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Activate Account: </label></div>
                    <div class="grid9 enabled_disabled">
                        <div class="floatL mr10"><input type="checkbox" id="check4" name="actaccount" {{ $user->active ? 'checked':'' }} /></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <input type="submit" class="buttonL bGreen floatR" value="Update" name="btn"/>
                    <div class="clear"></div>
                </div>
        	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#frmnewadmin').validate({
        messages:{
            adminname:{
                required:"Name is required.",
                min: "Name must at least 2 characters.",
            },
            email:{
                required:"Email is required.",
                email:"Invalid email."
            }
        }
    });
</script>

@endsection

@section('subnav')

    @include('admin.user.subnav')

@endsection