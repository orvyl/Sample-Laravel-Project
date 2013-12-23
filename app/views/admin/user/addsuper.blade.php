@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>Add Administrator Account</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/users/addsuper') }}" id="frmnewadmin">
        		<div class="formRow">
                    <div class="grid3"><label>Username:</label></div>
                    <div class="grid9"><input type="text" name="username" value="{{ Input::old('email') }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Email:</label></div>
                    <div class="grid9"><input type="text" name="email" value="{{ Input::old('email') }}"class="required email"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>First name:</label></div>
                    <div class="grid9"><input type="text" name="first_name" value="{{ Input::old('adminname') }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Last name:</label></div>
                    <div class="grid9"><input type="text" name="last_name" value="{{ Input::old('adminname') }}"class="required"/></div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="grid3"><label>Password:</label></div>
                    <div class="grid9"><input type="password" name="password" class="required" id="pwd"/></div>
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
                        <div class="floatL mr10"><input type="checkbox" id="check4" name="actaccount" /></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <input type="submit" class="buttonL bGreen floatR" value="+ Adminsitrator" name="btn"/>
                    <div class="clear"></div>
                </div>
        	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#frmnewadmin').validate({
        rules:{
            password_confirmation: {
                equalTo: "#pwd"
            }
        },
        messages:{
            password_confirmation:{
                equalTo: "Password Mismatch.",
                required:"Confirm password is required."
            },
            password:{
                min: "Password must at least 6 characters.",
                required: "Password is required."
            },
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